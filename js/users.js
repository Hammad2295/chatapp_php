
// Hiding Search Bar //

const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");

const userList = document.querySelector(".users .users-list");




// Changing Search Button icon on click //
searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}



// Searching Users //
searchBar.onkeyup = ()=> {

    let searchTerm = searchBar.value;
    let xhr = new XMLHttpRequest();     // creating xml object

    // ajax running twice once here and once for set interval
    // to avoid that adding active class here so ajax will run only for active
    if(searchTerm != "") {
        searchBar.classList.add("active");
    }
    else {
        searchBar.classList.remove("active");
    }


    // passing method, url. async methods to xhr, (it takes many parameters)
    // using get here coz we need to send data not receive 
    xhr.open("POST", "php/search.php", true);

    // when user will click continue button it will load signup.php as response without reloading page
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // sending search term to php using ajax 
    xhr.send("searchTerm=" + searchTerm);
}





// Following function will run after 500ms (to reload users i suppose) 
setInterval(() => {
    let xhr = new XMLHttpRequest();     // creating xml object

    // passing method, url. async methods to xhr, (it takes many parameters)
    // using get here coz we need to send data not receive 
    xhr.open("GET", "./php/users.php", true);

    // when user will click continue button it will load signup.php as response without reloading page
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.response;
                if(!searchBar.classList.contains("active")) {
                    userList.innerHTML = data;
                }
            }
        }
    }

    xhr.send();
}, 500);
