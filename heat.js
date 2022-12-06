/* Set the width of the sidebar to 250px (show it) */
function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
    document.getElementById("mySidepanel").style.width = "0";
}

function myFunction() {
    let element = document.body;
    element.classList.toggle("dark-mode");
    element.classList.toggle("default");
}