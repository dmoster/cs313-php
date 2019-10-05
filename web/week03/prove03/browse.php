<?php

session_start();
require_once('items.php');

$_SESSION['test'] = 521600;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'meta.php'; ?>

  <title>Browse - Daniel's Gadget Shop</title>
</head>
<body>

  <?php require 'header.php'; ?>

  <main>
    <div class="content">  
      <h1>Browse</h1>

      <?php

      for ($i = 0; $i < count($items); $i++) {
        echo '<div id="item' . $i . '" class="item">
                <h2 id="item' . $i . 'name">' . $items[$i]->getName() . '</h2>
                <div id="item' . $i . 'details" class="item-details">
                  <img id="item' . $i . 'img" src="' . $items[$i]->getImage() . '" alt="' . $items[$i]->getName() . '">
                  <p id="item' . $i . 'description">' . $items[$i]->getDescription() . '</p>
                  <span id="item' . $i . 'cost" class="item-cost">$' . $items[$i]->getCost() . '</span>
                  <button onclick="addToCartList(' . $i . ')"><i class="fas fa-shopping-cart fa-2x"></i></button>
                </div>
              </div>';
      }

      ?>

      <div id="session-caller"></div>
    </div>
  </main>
    
  <?php require 'footer.php'; ?>

  <script src="cart.js"></script>
</body>
</html>