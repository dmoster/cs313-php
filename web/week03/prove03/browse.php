<?php

session_start();
require_once('items.php');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['item0']) {
    array_push($_SESSION['itemsInCart'], $items[0]);
  }
  if ($_POST['item1']) {
    array_push($_SESSION['itemsInCart'], $items[1]);
  }
  if ($_POST['item2']) {
    array_push($_SESSION['itemsInCart'], $items[2]);
  }
  if ($_POST['item3']) {
    array_push($_SESSION['itemsInCart'], $items[3]);
  }
  if ($_POST['item4']) {
    array_push($_SESSION['itemsInCart'], $items[4]);
  }
  if ($_POST['item5']) {
    array_push($_SESSION['itemsInCart'], $items[5]);
  }
}

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

      <!-- <?php

      for ($i = 0; $i < count($items); $i++) {
        echo '<div id="item' . $i . '" class="item">
                <h2 id="item' . $i . 'name">' . $items[$i]->getName() . '</h2>
                <div id="item' . $i . 'details" class="item-details">
                  <img id="item' . $i . 'img" src="' . $items[$i]->getImage() . '" alt="' . $items[$i]->getName() . '">
                  <p id="item' . $i . 'description">' . $items[$i]->getDescription() . '</p>
                  <span id="item' . $i . 'cost" class="item-cost">$' . $items[$i]->getCost() . '</span>
                  <form action="<?php echo htmlspecialchars($_SERVER[\'PHP_SELF\']); ?>" method="POST"><button name="item' . $i . '" value="item' . $i . '" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button></form>
                </div>
              </div>';
      }

      ?> -->

              <div id="item0" class="item">
                <h2 id="item0name">Apple iPhone 11</h2>
                <div id="item0details" class="item-details">
                  <img id="item0img" src="images/iphone.jpg" alt="Apple iPhone 11">
                  <p id="item0description">Apple's newest mid-tier smartphone comes with an additional wide-angle camera lense and better battery life.</p>
                  <span id="item0cost" class="item-cost">$699</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item0" value="item0" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>

              <div id="item1" class="item">
                <h2 id="item1name">AMD Ryzen 3700X</h2>
                <div id="item1details" class="item-details">
                  <img id="item1img" src="images/ryzen.jpg" alt="AMD Ryzen 3700X">
                  <p id="item1description">This blazing-fast 8-core CPU from AMD will have you wondering what you ever saw in those other guys.</p>
                  <span id="item1cost" class="item-cost">$329</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item1" value="item1" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>

              <div id="item2" class="item">
                <h2 id="item2name">Logitech G502 Lightspeed</h2>
                <div id="item2details" class="item-details">
                  <img id="item2img" src="images/mouse.jpg" alt="Logitech G502 Lightspeed">
                  <p id="item2description">Logitech has taken the world's favorite gaming mouse and cut the cord.</p>
                  <span id="item2cost" class="item-cost">$150</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item2" value="item2" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>

              <div id="item3" class="item">
                <h2 id="item3name">Samsung 970 EVO 1TB</h2>
                <div id="item3details" class="item-details">
                  <img id="item3img" src="images/ssd.jpg" alt="Samsung 970 EVO 1TB">
                  <p id="item3description">With read speeds of over 3000MB/s, you'll wonder how you ever survived on that wimpy laptop hard drive.</p>
                  <span id="item3cost" class="item-cost">$170</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item3" value="item3" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>

              <div id="item4" class="item">
                <h2 id="item4name">ASUS 27-inch 1440p Monitor</h2>
                <div id="item4details" class="item-details">
                  <img id="item4img" src="images/monitor.jpg" alt="ASUS 27-inch 1440p Monitor">
                  <p id="item4description">FreeSync at WQHD all day long with this beautiful gaming monitor.</p>
                  <span id="item4cost" class="item-cost">$439</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item4" value="item4" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>
              
              <div id="item5" class="item">
                <h2 id="item5name">Razer BlackWidow Chroma V2 Keyboard</h2>
                <div id="item5details" class="item-details">
                  <img id="item5img" src="images/keyboard.jpg" alt="Razer BlackWidow Chroma V2 Keyboard">
                  <p id="item5description">A favorite for esports hopefuls, your fingers will love this RGB keyboard.</p>
                  <span id="item5cost" class="item-cost">$133</span>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <button name="item5" value="item5" type="submit"><i class="fas fa-shopping-cart fa-2x"></i></button>
                  </form>
                </div>
              </div>
                
                

      <div id="session-caller"></div>
    </div>
  </main>
    
  <?php require 'footer.php'; ?>

  <script src="cart.js"></script>
</body>
</html>