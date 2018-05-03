function generatePrices() {
    var spans = document.querySelectorAll(".dispPrice");
    var totalPrice = 0;
    var totalQty = 0;

    for (var i = 0; i < spans.length; i++)
    {
        var price = document.getElementById("artPrice" + i).getAttribute("value");
        var qty = document.getElementById("qty" + i).getAttribute("value");

        var dispPriceSpan = document.getElementById("dispPrice"+i);

        totalPrice += price*qty;
        totalQty += Number(qty);
        dispPriceSpan.innerHTML = price*qty;
    }

    document.getElementById("spanTotalPrice").innerHTML = totalPrice;
    document.getElementById("spanTotalQty").innerHTML = totalQty;
}

function updateQTY(i, qty) {
    var hiddenQTY = document.getElementById("hiddenQTY"+i);

    hiddenQTY.setAttribute("value", qty);

    console.log("oui");
}

function updatePrice(i) {
    var input = document.getElementById("qty"+i);

    input.setAttribute("value", input.value);
    var updateValue = document.getElementById("qty"+i).getAttribute("value");
    updateQTY(i, updateValue);
    console.log("oui");
    generatePrices();
}

generatePrices();