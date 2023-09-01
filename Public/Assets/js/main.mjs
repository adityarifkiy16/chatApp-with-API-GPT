import today from "./date.js";

const bubbleContainer = document.querySelector("#bubble");
const formMessage = document.getElementById("messageForm");
const messageInput = document.getElementById("message");
const buttonSend = document.getElementById("send");
const sendButtonText = document.querySelector("#sendButtonText");
const sendButtonDots = document.querySelector("#sendButtonDots");
const rootDir = window.location.origin + "/ChatAI/Public";

// * variabel untuk ditampilkan
let dataFetch = [];
// * variabel untuk menyimpan data request user
let dataRequest = [];
// * variabel untuk menyimpan data response
let dataResponse = [];
// * variabel untuk menyimpan data yang akan disimpan di database
let dataSave = [];

messageInput.addEventListener("input", function () {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
});

window.addEventListener("load", loadFromDatabase);

//  * handling send button to chat API
formMessage.addEventListener("submit", handleFormSubmit);

// * fungsi load data dari database
async function loadFromDatabase() {
  try {
    const response = await fetch(`${rootDir}/Chat/showData`);
    if (response.ok) {
      const data = await response.text();

      //  *iterasi data json dari database
      const dataobj = JSON.parse(data);
      dataobj.forEach((item) => {
        if (item.type === "request") {
          dataRequest.push({
            type: item.type,
            content: item.chat,
            time: item.time,
          });
        } else if (item.type === "response") {
          dataResponse.push({
            type: item.type,
            content: item.chat,
            time: item.time,
          });
        }
      });

      // * dibandingkan dengan method sort berdasarkan propertie time
      const sortedData = [...dataRequest, ...dataResponse].sort((a, b) =>
        a.time.localeCompare(b.time)
      );
      sortedData.forEach((item) => {
        dataFetch.push(item);
      });
    } else {
      console.error("Terjadi kesalahan saat mengambil data dari database.");
    }
  } catch (error) {
    console.error("Terjadi kesalahan: ", error);
  } finally {
    const uniqueDates = [
      ...new Set(dataFetch.map((item) => item.time.split(" ")[0])),
    ];
    uniqueDates.forEach((date) => {
      renderChatBubbles(date);
      renderSideContent();
    });
  }
}

async function handleFormSubmit(event) {
  event.preventDefault();
  const userInput = messageInput.value;

  if (userInput) {
    disableSendButton();

    const newMessage = { type: "request", content: userInput, time: today };
    dataSave.push(newMessage);
    dataFetch.push(newMessage);
    renderChatBubbles(today);

    const inputValue = encodeURIComponent(userInput);
    let apiUrl = `https://api.akuari.my.id/ai/gpt?chat=${inputValue}`;
    messageInput.value = "";

    try {
      const response = await fetch(apiUrl);
      if (response.ok) {
        const message = await response.text();
        const dataObj = JSON.parse(message);
        const aiMessage = { type: "response", content: dataObj.respon };
        if (dataSave.length) {
          dataSave.push(aiMessage);
        }
      } else {
        handleErrorResponse(response);
      }
    } catch (err) {
      handleErrorResponse(err);
    } finally {
      enableSendButton();
      saveToDatabase(dataSave); // save dan load database
    }
  }
}

// * menyimpan ke database dengan method form post
async function saveToDatabase(response) {
  const dataJson = JSON.stringify(response);
  const formData = new FormData();
  formData.append("response", dataJson);

  try {
    const saveResponse = await fetch(`${rootDir}/Chat/saveToDatabase`, {
      method: "POST",
      body: formData,
    });

    if (saveResponse.ok) {
      dataSave = [];
      dataFetch = [];
      dataRequest = [];
      dataResponse = [];
      loadFromDatabase();
    } else {
      console.error("Terjadi kesalahan saat menyimpan data ke database.");
    }
  } catch (error) {
    console.error("Terjadi kesalahan: ", error);
  }
}

function handleErrorResponse(error) {
  const errorMessage = {
    type: "error",
    content: error.message || "Unknown error",
  };
  dataFetch.push(errorMessage);
}

function disableSendButton() {
  buttonSend.disabled = true;
  sendButtonText.classList.toggle("hidden");
  sendButtonDots.classList.toggle("hidden");
}

function enableSendButton() {
  buttonSend.disabled = false;
  sendButtonText.classList.toggle("hidden");
  sendButtonDots.classList.toggle("hidden");
}

function filterChatMessagesByDate(selectedDate) {
  return dataFetch.filter((item) => {
    const dateTimeString = item.time;
    const parts = dateTimeString.split(" ");
    const dateParts = parts[0];
    return dateParts === selectedDate;
  });
}

// rendering data dari database;
function renderChatBubbles(selectedDate) {
  bubbleContainer.innerHTML = "";

  const filteredMessages = filterChatMessagesByDate(selectedDate);

  filteredMessages.forEach((item) => {
    const bubble = document.createElement("div");
    bubble.classList.add("bubble-chat");
    bubble.textContent = item.content;

    if (item.type === "request") {
      bubble.classList.add("user-bubble");
    } else if (item.type === "response") {
      bubble.classList.add("response-bubble");
    } else {
      bubble.classList.add("error-bubble");
    }

    bubbleContainer.appendChild(bubble);
  });
}

function renderSideContent() {
  const timerContainer = document.querySelector("#time-sidebar");
  const ul = document.createElement("ul");

  // Create an array to store unique dates
  const uniqueDates = [
    ...new Set(dataFetch.map((item) => item.time.split(" ")[0])),
  ];

  // Iterate through unique dates and create date options in the sidebar
  uniqueDates.forEach((date) => {
    const li = document.createElement("li");
    li.textContent = date;
    li.classList.add("date-option");

    li.addEventListener("click", () => {
      renderChatBubbles(date);
    });

    ul.appendChild(li);
  });

  timerContainer.innerHTML = "";
  timerContainer.appendChild(ul);
}
