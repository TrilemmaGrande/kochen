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
}

function removeIngredientRow(ingredientRow) {
    ingredientRow.parentElement.remove();
}