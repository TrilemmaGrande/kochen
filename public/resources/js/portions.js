function changeQuantity(portions) {
    let quantities = document.querySelectorAll('[name="quantity"]');
    quantities.forEach(element => {
        let portionsNow = parseFloat(switchNumSeparator(portions)).toFixed(2);
        let quantityNow = parseFloat(switchNumSeparator(element.dataset.quantity)).toFixed(2);
        if (isNaN(quantityNow)) { element.innerText = "" }
        else {
            portionsNow = portionsNow < 1.0 ? 1.0 : portionsNow;
            let quantityAfter = quantityNow * portionsNow;
            element.innerText = switchNumSeparator(quantityAfter.toLocaleString(undefined, { maximumFractionDigits: 2, minimumFractionDigits: 0 }));
        }
    });
};

function switchNumSeparator(num) {
    return num.toString().replace('.', ',').replace(',', '.');
}
