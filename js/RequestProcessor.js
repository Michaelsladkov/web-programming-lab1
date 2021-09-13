function makeRequest() {
    if (!validation()) return false;
    $.ajax({
        url: "../php/Shot.php",
        type: "POST",
        data: `X=${getXNumberValue()}&X=${getYNumberValue()}&R=${getRNumberValue()}`,
        success: function (response) {
            let data = JSON.parse(response);
            appendLine(data);
        }
    })
}
function getXNumberValue() {
    return parseFloat($('#x_value > input').value);
}
function getYNumberValue() {
    return $('#y_value :checked').value;
}
function getRNumberValue() {
    return $('#r_value :checked').value;
}