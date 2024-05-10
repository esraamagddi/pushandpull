console.log("esraaaaaaaaaaaaaaaa");
var productId = $("#editProductForm").data("product-id");

$(document).ready(function() {
    $("#editProductForm").submit(function(event) {
        event.preventDefault(); 

        var formData = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/online-shop/handlers/handleEditProduct.php?id=" + productId,
                        data: formData,
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    });
});
