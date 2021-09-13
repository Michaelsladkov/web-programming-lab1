function makeRequest() {
    if (!validation()) return false;
    console.log(`X=${getXNumberValue()}&Y=${getYNumberValue()}&R=${getRNumberValue()}`);
    $.ajax({
        url: "../php/Shot.php",
        type: "POST",
        data: `X=${getXNumberValue()}&Y=${getYNumberValue()}&R=${getRNumberValue()}`,
        success: function (response) {
            console.log(response);
            let data = JSON.parse(response);
            appendLine(data);
        }
    })
    return false;
}
function getXNumberValue() {
    return parseFloat(form.elements.X.value);
}
function getYNumberValue() {
    return $('#y_value :checked').val();
}
function getRNumberValue() {
    return $('#r_value :checked').val();
}