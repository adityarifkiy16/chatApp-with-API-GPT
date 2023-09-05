const buttonSend = document.getElementById("send");
const sendButtonText = document.querySelector("#sendButtonText");
const sendButtonDots = document.querySelector("#sendButtonDots");

export function disableSendButton() {
  buttonSend.disabled = true;
  sendButtonText.classList.toggle("hidden");
  sendButtonDots.classList.toggle("hidden");
}

export function enableSendButton() {
  buttonSend.disabled = false;
  sendButtonText.classList.toggle("hidden");
  sendButtonDots.classList.toggle("hidden");
}

export default { disableSendButton, enableSendButton };
