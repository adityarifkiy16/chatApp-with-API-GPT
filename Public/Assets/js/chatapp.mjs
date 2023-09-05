import today from "./utils/date.js";
import { disableSendButton, enableSendButton } from "./utils/button.js";
import combineAndSortData from "./utils/combineAndSortData.js";
import findUniqueDates from "./utils/uniqueDates.js";

export default class ChatApp {
  constructor(rootDir) {
    this.rootDir = rootDir;
    this.initializeData();
    this.initializeDOMElements();
    this.setupEventListeners();
  }
  initializeData() {
    this.dataFetch = [];
    this.dataRequest = [];
    this.dataResponse = [];
    this.dataSave = [];
  }
  initializeDOMElements() {
    this.messageInput = document.getElementById("message");
    this.bubbleContainer = document.querySelector("#bubble");
    this.formMessage = document.getElementById("messageForm");
  }

  setupEventListeners() {
    this.messageInput.addEventListener(
      "input",
      this.adjustMessageInputHeight.bind(this)
    );
    window.addEventListener("load", this.loadFromDatabase.bind(this));
    this.formMessage.addEventListener(
      "submit",
      this.handleFormSubmit.bind(this)
    );
  }

  adjustMessageInputHeight() {
    this.messageInput.style.height = "auto";
    this.messageInput.style.height = this.messageInput.scrollHeight + "px";
  }

  async loadFromDatabase() {
    try {
      const response = await fetch(`${this.rootDir}/Chat/showData`);
      if (response.ok) {
        const data = await response.text();
        const dataobj = JSON.parse(data);
        dataobj.forEach((item) => {
          if (item.type === "request") {
            this.dataRequest.push({
              type: item.type,
              content: item.chat,
              time: item.time,
            });
          } else if (item.type === "response") {
            this.dataResponse.push({
              type: item.type,
              content: item.chat,
              time: item.time,
            });
          }
        });
        const sortedData = combineAndSortData(
          this.dataRequest,
          this.dataResponse
        );
        sortedData.forEach((item) => {
          this.dataFetch.push(item);
        });
      } else {
        console.error("Terjadi kesalahan saat mengambil data dari database.");
      }
    } catch (error) {
      console.error("Terjadi kesalahan: ", error);
    } finally {
      this.renderChatData();
    }
  }

  async handleFormSubmit(event) {
    event.preventDefault();
    const userInput = this.messageInput.value;

    if (userInput) {
      disableSendButton();
      const newMessage = { type: "request", content: userInput, time: today };
      this.dataSave.push(newMessage);
      this.dataFetch.push(newMessage);
      this.renderChatBubbles(today);

      const inputValue = encodeURIComponent(userInput);
      let apiUrl = `https://api.akuari.my.id/ai/gpt?chat=${inputValue}`;
      this.messageInput.value = "";

      try {
        const response = await fetch(apiUrl);
        if (response.ok) {
          const message = await response.text();
          const dataObj = JSON.parse(message);
          const aiMessage = { type: "response", content: dataObj.respon };
          if (this.dataSave.length) {
            this.dataSave.push(aiMessage);
          }
        } else {
          this.handleErrorResponse(response);
        }
      } catch (err) {
        this.handleErrorResponse(err);
      } finally {
        enableSendButton();
        this.saveToDatabase(this.dataSave);
      }
    }
  }

  async saveToDatabase(response) {
    const dataJson = JSON.stringify(response);
    const formData = new FormData();
    formData.append("response", dataJson);

    try {
      const saveResponse = await fetch(`${this.rootDir}/Chat/saveToDatabase`, {
        method: "POST",
        body: formData,
      });

      if (saveResponse.ok) {
        this.initializeData();
        this.loadFromDatabase();
      } else {
        console.error("Terjadi kesalahan saat menyimpan data ke database.");
      }
    } catch (error) {
      console.error("Terjadi kesalahan: ", error);
    }
  }

  handleErrorResponse(error) {
    const errorMessage = {
      type: "error",
      content: error.message || "Unknown error",
    };
    this.dataFetch.push(errorMessage);
    this.renderChatData();
  }

  filterChatMessagesByDate(selectedDate) {
    return this.dataFetch.filter((item) => {
      const dateTimeString = item.time;
      const parts = dateTimeString.split(" ");
      const dateParts = parts[0];
      return dateParts === selectedDate;
    });
  }

  renderChatData() {
    this.bubbleContainer.innerHTML = "";
    const uniqueDates = findUniqueDates(this.dataFetch);

    uniqueDates.forEach((date) => {
      this.renderChatBubbles(date);
      this.renderSideContent();
    });
  }

  renderChatBubbles(selectedDate) {
    this.bubbleContainer.innerHTML = "";

    const filteredMessages = this.filterChatMessagesByDate(selectedDate);

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

      this.bubbleContainer.appendChild(bubble);
    });
  }

  renderSideContent() {
    const timerContainer = document.querySelector("#time-sidebar");
    const ul = document.createElement("ul");

    // Create an array to store unique dates
    const uniqueDates = findUniqueDates(this.dataFetch);

    // Iterate through unique dates and create date options in the sidebar
    uniqueDates.forEach((date) => {
      const li = document.createElement("li");
      li.textContent = date;
      li.classList.add("date-option");

      li.addEventListener("click", () => {
        this.renderChatBubbles(date);
      });

      ul.appendChild(li);
    });

    timerContainer.innerHTML = "";
    timerContainer.appendChild(ul);
  }
}
