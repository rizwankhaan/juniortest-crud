// function to delete multiple selected products
function confirmDelete() {

    var toBeDeletedProducts = []
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

    for (var i = 0; i < checkboxes.length; i++) {
        toBeDeletedProducts.push(checkboxes[i].value)
    }
    if (toBeDeletedProducts.length > 0) {
        toBeDeletedProducts = toBeDeletedProducts.toString();
        document.location = window.location.href + '?deleteProductId=' + toBeDeletedProducts;
    } else {
        alert('You have not selected any checkbox to delete products.');
    }

}

// function to show/hide elements based on product type
function toggleForm() {
    selectedValue = parseInt(document.getElementById("productType").value);
    this.toggleAddFormElementRequired(selectedValue);
    switch (selectedValue) {
        case 0:
            document.getElementsByClassName("product-type-dvd")[0].classList.remove("d-none");
            document.getElementsByClassName("product-type-book")[0].classList.add("d-none");
            document.getElementsByClassName("product-type-furniture")[0].classList.add("d-none");
            break;
        case 1:
            document.getElementsByClassName("product-type-dvd")[0].classList.add("d-none");
            document.getElementsByClassName("product-type-book")[0].classList.remove("d-none");
            document.getElementsByClassName("product-type-furniture")[0].classList.add("d-none");
            break;
        case 2:
            document.getElementsByClassName("product-type-dvd")[0].classList.add("d-none");
            document.getElementsByClassName("product-type-book")[0].classList.add("d-none");
            document.getElementsByClassName("product-type-furniture")[0].classList.remove("d-none");
            break;
        default:
            alert('invalid argument');
    }
}

// toggle label on product add form based on sku exists or not
function checkSkuExists() {
    var sku = document.getElementById("sku").value;
    if (sku.length > 0) {

        var xhr = new XMLHttpRequest();
        var url = window.location.href + '?checksku=' + sku;
        xhr.open("GET", url, true);

        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'exists') {
                    document.getElementsByClassName("label-success")[0].classList.add("d-none");
                    document.getElementsByClassName("label-error")[0].classList.remove("d-none");
                    document.getElementsByClassName("save_product")[0].disabled = true;
                } else {
                    document.getElementsByClassName("label-success")[0].classList.remove("d-none");
                    document.getElementsByClassName("label-error")[0].classList.add("d-none");
                    document.getElementsByClassName("save_product")[0].disabled = false;
                }
            }
        }
        xhr.send();
    } else {
        document.getElementsByClassName("label-success")[0].classList.add("d-none");
        document.getElementsByClassName("label-error")[0].classList.add("d-none");
        document.getElementsByClassName("save_product")[0].disabled = false;
    }
}


function toggleAddFormElementRequired() {
    selectedValue = parseInt(document.getElementById("productType").value);
    console.log(selectedValue);

    switch (selectedValue) {
        case 0:
            document.getElementById("size").required = true;
            document.getElementById("weight").required = false;
            document.getElementById("height").required = false;
            document.getElementById("width").required = false;
            document.getElementById("length").required = false;
            break;
        case 1:
            document.getElementById("weight").required = true;
            document.getElementById("size").required = false;
            document.getElementById("height").required = false;
            document.getElementById("width").required = false;
            document.getElementById("length").required = false;
            break;
        case 2:
            document.getElementById("height").required = true;
            document.getElementById("width").required = true;
            document.getElementById("length").required = true;
            document.getElementById("weight").required = false;
            document.getElementById("size").required = false;
            break;
        default:
            alert('invalid argument');

    }
}