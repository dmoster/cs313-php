<?php

class Item {
  private $_name;
  private $_description;
  private $_cost;
  private $_image;

  function __construct($name, $description, $cost, $image) {
    $this->_name = $name;
    $this->_description = $description;
    $this->_cost = $cost;
    $this->_image = $image;
  }

  function setName($name) { $this->_name = $name; }
  function setDescription($description) { $this->_description = $description; }
  function setCost($cost) { $this->_cost = $cost; }
  function setImage($image) { $this->_image = $image; }

  function getName() { return $this->_name; }
  function getDescription() { return $this->_description; }
  function getCost() { return $this->_cost; }
  function getImage() { return $this->_image; }
}


$iphone = new Item('Apple iPhone 11', "Apple's newest mid-tier smartphone comes with an additional wide-angle camera lense and better battery life.", 699, 'images/iphone.jpg');
$ryzen = new Item('AMD Ryzen 3700X', "This blazing-fast 8-core CPU from AMD will have you wondering what you ever saw in those other guys.", 329, 'images/ryzen.jpg');
$mouse = new Item('Logitech G502 Lightspeed', "Logitech has taken the world's favorite gaming mouse and cut the cord.", 150, 'images/mouse.jpg');
$ssd = new Item('Samsung 970 EVO 1TB', "With read speeds of over 3000MB/s, you'll wonder how you ever survived on that wimpy laptop hard drive.", 170, 'images/ssd.jpg');
$monitor = new Item('ASUS 27-inch 1440p Monitor', "FreeSync at WQHD all day long with this beautiful gaming monitor.", 439, 'images/monitor.jpg');
$keyboard = new Item('Razer BlackWidow Chroma V2 Keyboard', "A favorite for esports hopefuls, your fingers will love this RGB keyboard.", 133, 'images/keyboard.jpg');

$items = array($iphone, $ryzen, $mouse, $ssd, $monitor, $keyboard);

?>