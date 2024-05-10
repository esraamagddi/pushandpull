console.log("esraaaaaaaaaa");

var productId = $("#editProductForm").data("product-id");

$(document).ready(function() {
    function longPoll() {
        var formData = $("#editProductForm").serialize();

        $.ajax({
            type: "POST",
            url: "/online-shop/handlers/handleEditProduct.php?id=" + productId,
            data: formData,
            success: function(response) {

                longPoll();
            },
            error: function(xhr, status, error) {
                console.error("Request failed: " + error);

            }
        });
    }

    longPoll();
});
