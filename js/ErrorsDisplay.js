let display;

function setDisplay(item) {
    display = item;
}

function clearErrors() {
    display.innerText = "";
}

function showMessage(msg) {
    display.innerText = msg;
}