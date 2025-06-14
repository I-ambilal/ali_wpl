<?php
session_start();
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Cart - Electronic Mart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #44444C;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            
            align-items: center;
            padding: 20px;
        }

        header a {
            text-decoration: none;
            color: #fff;
            font-size: 1.2rem;
            margin-left: 20px;
        }
       
        table {
            width: 80%;
            margin: 40px auto;
            background-color: #1e1e1e;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #333;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #2a2a2a;
        }

        tr:nth-child(even) {
            background-color: #1a1a1a;
        }

        .total {
            text-align: right;
            padding: 20px;
            margin-right: 10%;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<header>
    
    
        <a href="index.php">BACK</a>
       
  
</header>

<h2 style="text-align:center;">Your Shopping Cart</h2>

<?php if (count($cart) > 0): ?>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price ($)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cart as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>$<?= number_format($item['price'], 2) ?></td>
            </tr>
            <?php $total += $item['price']; ?>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="total">
    <strong>Total: $<?= number_format($total, 2) ?></strong>
</div>
<?php else: ?>
    <p style="text-align:center;">Your cart is empty.</p>
<?php endif; ?>

</body>
</html>
