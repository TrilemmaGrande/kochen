function addIngredientRow(btn) {
    let ingredientRows = document.querySelectorAll('[name=ingredientRow]');
    let position = ingredientRows.length + 1 ?? 1;
    let newIngredientRow = document.createElement('div');
    let xhr = new XMLHttpRequest();

    xhr.withCredentials = false;
    xhr.open('GET', `/recipes/renderIngredientRow/${position}`, true);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            newIngredientRow.outerHTML = data.html;
        }
    };
    xhr.send();

    btn.insertAdjacentElement("beforebegin", newIngredientRow);
    updatePositions();
}

function removeIngredientRow(ingredientRow) {
    ingredientRow.parentElement.remove();
    updatePositions();
}

function updatePositions() {
    let ingredientRows = document.querySelectorAll('[name=ingredientRow]');
    ingredientRows.forEach((row, index) => {
        row.dataset.position = index + 1;
        let inputs = row.querySelectorAll('input, select');
        inputs.forEach(input => {
            let name = input.getAttribute('name');
            input.setAttribute('name', name.replace(/\[\d+\]/, `[${index+1}]`));
        });
    });
}