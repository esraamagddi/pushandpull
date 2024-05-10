console.log("esraaaaaaaaa");

var productId = $("#editProductForm").data("product-id");

$(document).ready(function() {
    function longPoll() {
        var formData = $("#editProductForm").serialize();

        $.ajax({
            type: "POST",
            url: "/online-shop/handlers/handleEditProduct.php?id=" + productId,
            data: formData,
            success: function(response) {
                console.log(response);
                setTimeout(longPoll, 5000);
                // longPoll();
            },
            error: function(xhr, status, error) {
                console.error("Request failed: " + error);

                setTimeout(longPoll, 5000);  //5 seconds
            }
        });
    }

    longPoll();
});
