<?php
$conn = new mysqli("localhost", "root", "", "mart_db");
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="add_product.php">Add New Product</a>
        <link rel="stylesheet" href="style.css">

    <hr>
    <table border="1">
        <tr>
            <th>Image</th><th>Name</th><th>Brand</th><th>Price</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><img src="uploads/<?php echo $row['image']; ?>" width="50"></td>
            <td><?php echo $row['productname']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="delete_product.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
