function appendLine(data) {
    let line = `<tr><td>${data.X}</td><td>${data.Y}</td><td>${data.R}</td><td>`
        + `${data.now}</td><td>${data.execution}</td><td>${data.result}</td></tr>`;
    $('#results').append(line);
}