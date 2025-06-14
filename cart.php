<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price']
    ];

    // Add to session cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;

    // Redirect back or to cart
    header("Location: view_cart.php");
    exit();
}
?>
