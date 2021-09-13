window.onload = function () {
    let form = document.forms.MainForm;
    let yBoxes = form.elements.Y;
    let rBoxes = form.elements.R;
    setYBoxes(yBoxes);
    setRBoxes(rBoxes);
    for (let rBox of rBoxes) {
        rBox.onclick = switchRAction;
    }
    for (let yBox of yBoxes) {
        yBox.onclick = switchYAction;
    }
    let errorDisplay = document.getElementById("errorDisplay");
    setDisplay(errorDisplay);
    setFormAndBoxesForValidator(form, yBoxes, rBoxes);
    form.elements.X.onclick = clearErrors;
}
