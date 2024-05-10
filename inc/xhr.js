console.log("esraaaaaaaaaaaaaaaa");

var productId = $("#editProductForm").data("product-id");

document.getElementById("editProductForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.open("POST", "/online-shop/handlers/handleEditProduct.php?id=" + productId, true);
    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    xhr.onload = function() {
        if (xhr.status === 200) {
            console.log(xhr.responseText);
        } else {
            console.error("Request failed: " + xhr.status);
        }
    };
    console.log(formData);

    xhr.send(formData);
});
