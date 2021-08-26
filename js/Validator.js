let form;

function setFormAndBoxes(newForm, yBoxesArray, rBoxesArray) {
    form = newForm;
    yBoxes = yBoxesArray;
    rBoxes = rBoxesArray;
    form.onsubmit = validation;
}

function validation() {
    //checking X value
    let xValue = form.elements.X.value;
    let xNumberValue = parseFloat(xValue);
    console.log(xNumberValue);
    if (xValue === "" || isNaN(xNumberValue)) {
        showMessage("Введите число X");
        return false;
    }
    if (xNumberValue <= (-5) || xNumberValue >= 3) {
        showMessage("Число Х должно принадлежать отрезку (-5 ... 3)");
        return false;
    }
    //checking y value
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
    //checking r value
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
}