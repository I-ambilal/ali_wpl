<?php
$conn = new mysqli("localhost", "root", "", "mart_db");
$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['productname'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];

    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        $conn->query("UPDATE products SET productname='$name', brand='$brand', price='$price', image='$image' WHERE id=$id");
    } else {
        $conn->query("UPDATE products SET productname='$name', brand='$brand', price='$price' WHERE id=$id");
    }
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Edit Product</h1>
</header>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="productname" value="<?php echo $product['productname']; ?>" required>
        <input type="text" name="brand" value="<?php echo $product['brand']; ?>" required>
        <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        <input type="file" name="image">
        <button type="submit">Update Product</button>
    </form>
</div>
</body>
</html>
