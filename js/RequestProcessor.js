function makeRequest() {
    if (!validation()) return false;
    $.ajax({
        url: "../php/Shot.php",
        type: "POST",
        data: `x=${getXNumberValue()}&y=${getYNumberValue()}&r=${getRNumberValue()}`,
        success: function (response) {
            alert("gotcha");
            console.log("success");
            let data = JSON.parse(response);
            appendLine(data);
        }
    })
    alert("sent");
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