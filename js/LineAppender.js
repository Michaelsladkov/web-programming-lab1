function appendLine(data) {
    let line = `<td>${data.X}</td><td>${data.R}</td><td>${data.y}</td><td>`
        + `${data.now}</td><td>${data.execution}</td><td>${data.result}</td>`;
    $('#results').append(line);
}