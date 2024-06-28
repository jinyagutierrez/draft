// Assuming you're using jQuery
$(document).ready(function() {
    $(".add-to-cart").on("click", function() {
        var product = $(this).data("product");
        var price = $(this).data("price");
        addToCart(product, price);
        window.location.href = "cart.html"; // Redirect to the cart page
    });
});

function addToCart(product, price) {
    // Check if there's an existing cart in the session storage
    var cart = JSON.parse(sessionStorage.getItem("cart")) || [];

    // Add the new item to the cart
    cart.push({
        product: product,
        price: price,
        quantity: 1 // You can add a quantity input field and use that value here
    });

    // Save the updated cart to the session storage
    sessionStorage.setItem("cart", JSON.stringify(cart));
}