
// Using AJAX to send form details to php //

const form = document.querySelector(".login form");
const continueBtn = form.querySelector(".button input");
const errorTxt = form.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();     // preventing the form from submititng   
}


continueBtn.onclick = () => {

    let xhr = new XMLHttpRequest();     // creating xml object

    // passing method, url. async methods to xhr, (it takes many parameters)
    xhr.open("POST", "php/login.php", true);

    // when user will click continue button it will load signup.php as response without reloading page
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                
                let data = xhr.response;
                
                if (data == "SUCCESS") {
                    location.href = "users.php";
                }
                else {
                    errorTxt.innerHTML = data;
                    errorTxt.style.display = "block";
                }
            }
        }
    }

    // Sending form data using AJAX //
    let formData = new FormData(form);      // creating formData object 

    xhr.send(formData);     // sending form data to php
}