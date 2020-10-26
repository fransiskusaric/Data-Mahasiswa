//snackbar
function success() {
    var x = document.getElementById("snackbar");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

//modal
function openModal(id) {
    // Get the modal
    var modal = document.getElementsByClassName("modal");

    if(id == "teacher") { //open the modal
        modal[1].style.display = "block";
    } else if(id == "student") {
        modal[0].style.display = "block";
    }
}

function closeModal(id) {
    // Get the modal
    var modal = document.getElementsByClassName("modal");
    if(id == "close-t") { //close the modal
        modal[1].style.display = "none";
    } else if(id == "close-s") {
        modal[0].style.display = "none";
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}