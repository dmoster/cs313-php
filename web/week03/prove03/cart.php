<?php

session_start();

echo $_SESSION['test'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'; ?>

  <title>Cart - Daniel's Gadget Shop</title>
</head>
<body>
  
  <?php require 'header.php'; ?>

  <main>
    <div class="content">
      <h1>Cart</h1>


    </div>
  </main>
    
  <?php require 'footer.php'; ?>

</body>
</html>