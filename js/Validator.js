let form;
function setFormAndBoxesForValidator(newForm, yBoxesArray, rBoxesArray) {
    form = newForm;
    yBoxes = yBoxesArray;
    rBoxes = rBoxesArray;
    form.onsubmit = makeRequest;
    form.elements.X.oninput = checkX;
}

function validation() {
    return checkX() && checkY() && checkR();
}

function checkX() {
    clearErrors();
    let xValue = form.elements.X.value;
    let xNumberValue = parseFloat(xValue);
    if (xValue === "" ||
        ((!xValue.match(/^-?[0-9]*$/)) && (!xValue.match(/^-?[0-9]*[\.,][0-9]+$/)))) {
        showMessage("Введите число X");
        return false;
    }
    if (xNumberValue <= (-5) || xNumberValue >= 3) {
        showMessage("Число Х должно принадлежать отрезку (-5 ... 3)");
        return false;
    }
    return true;
}

function checkY() {
    let ySelected = false;
    for (let yBox of yBoxes) {
        if (yBox.checked) {
            ySelected = true;
        }
    }
    if (!ySelected) {
        showMessage("Установите параметр Y");
        return false;
    }
    return true
}

function checkR() {
    let rSelected = false;
    for (let rBox of rBoxes) {
        if (rBox.checked) {
            rSelected = true;
        }
    }
    if (!rSelected) {
        showMessage("Установите параметр R");
        return false;
    }
    return true;
}