export const buttonSend = document.getElementById("send");
const sendButtonText = document.querySelector("#sendButtonText");
const sendButtonDots = document.querySelector("#sendButtonDots");

export function disableSendButton() {
  buttonSend.disabled = true;
  sendButtonText.classList.remove("hidden");
  sendButtonDots.classList.add("hidden");
  sendButtonText.classList.remove("bg-pink-900", "rounded-md");
}

export function dotButton() {
  buttonSend.disabled = true;
  sendButtonDots.classList.remove("hidden");
  sendButtonText.classList.add("hidden");
}

export function enableSendButton() {
  buttonSend.disabled = false;
  sendButtonText.classList.remove("hidden");
  sendButtonDots.classList.add("hidden");
  sendButtonText.classList.add("bg-pink-900", "rounded-md");
}

export default {
  disableSendButton,
  enableSendButton,
  dotButton,
  buttonSend,
};
