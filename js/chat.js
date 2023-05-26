const form = document.querySelector(".typing-area");
const sendBtn = form.querySelector("button");
const inputField = form.querySelector(".input-field");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
    e.preventDefault();     // preventing the form from submititng   
}

function scrollToBottom() {
    chatBox.scrollTop = chatBox.scrollHeight;
}

sendBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();     // creating xml object

    xhr.open("POST", "php/insert_chat.php", true);
 
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                // will make input field empty after sending message each time
                inputField.value = "";
                scrollToBottom();
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}


setInterval(() => {
    let xhr = new XMLHttpRequest();     // creating xml object

    // passing method, url. async methods to xhr, (it takes many parameters)
    // using get here coz we need to send data not receive 
    xhr.open("POST", "php/get-chat.php", true);

    // when user will click continue button it will load signup.php as response without reloading page
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.response;
                chatBox.innerHTML = data;

                scrollToBottom();
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}, 500);


