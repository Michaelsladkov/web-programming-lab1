let yBoxes;
let rBoxes;

function switchRAction(eventObj) {
    clearErrors();
    validation();
    for (let s of rBoxes) {
        if (s !== eventObj.target) {
            s.checked = false;
        }
    }
}

function switchYAction(eventObj) {
    clearErrors();
    validation();
    for (let s of yBoxes) {
        if (s !== eventObj.target) {
            s.checked = false;
        }
    }
}

function setRBoxes(arrayOfBoxes) {
    rBoxes = arrayOfBoxes;
}

function setYBoxes(arrayOfBoxes) {
    yBoxes = arrayOfBoxes;
}