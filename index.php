<?php
$conn = new mysqli("localhost", "root", "", "mart_db");
$result = $conn->query("SELECT * FROM products");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Mart</title>  
    <style>


body {
  font-family: Arial, sans-serif;
  background-color:#44444C;
  color: #fff;
  margin: 0;
  padding: 0;
}



    header {
      display: flex;
      justify-content: space-between;
      background-color:#0B0909;
      align-items: center;
      margin-bottom: 30px;
      color:rgb(255, 248, 248);
        padding: 10px 10px 0px  0px ;
      position: relative;
    }
    nav {
      color:black;
      display: flex;
      align-items: center;
    }

    nav a {
      margin-left: 24px;
      text-decoration: none;
      color:white;
      font-size: 14px;
      position: relative;
    }

.drivers-section {
  padding: 60px ;
}

.section-title {
  text-align: center;
  font-size: 2rem;
  color: #ff0000;
  margin-bottom: 10px;
}

.section-subtitle {
  text-align: center;
  margin-bottom: 40px;
  color: #aaa;
}
.drivers-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
}

.driver-card {
    color:white;
 width: 250px;
 padding: 10px;
  background-color:#0B0909;
    border-radius: 10px;

  border-radius: 10px;
  transition: 0.3s;
}

.driver-card:hover {
  border-color:rgb(174, 167, 167);
  transform: translateY(-5px);
}

.driver-card img {
    width: 250px;
  height: 270px;
  position:  center;
  border-radius: 10px 10px 0 0  ;
  
}


    </style>
</head>
<body>
<header>
    <h1>Electronic Mart</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="admin.php">Admin</a>
         <a href="login.php">login</a>
         <a href="view_cart.php">🛒 View Cart</a>

    </nav>
</header>



<section id="drivers" class="drivers-section">
  <div class="container">
    <h2 class="section-title"></h2>
    <p class="section-subtitle"></p>
    
<div class="drivers-grid">
  <?php while($row = $result->fetch_assoc()): ?>
    <form method="POST" action="cart.php" class="driver-card">
      <img src="uploads/<?php echo $row['image']; ?>" alt="Product Image">
      <p><?php echo $row['productname']; ?></p>
      <p>Brand: <?php echo $row['brand']; ?></p>
      <p>Price: $<?php echo $row['price']; ?></p>
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <input type="hidden" name="product_name" value="<?php echo $row['productname']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
      <button type="submit">Add to Cart</button>
    </form>
  <?php endwhile; ?>
</div>

  </div>


  
</section>

</body>
</html>
