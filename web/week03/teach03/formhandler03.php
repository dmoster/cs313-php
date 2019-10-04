<?php

define("NUM_CONTINENTS", 7);

$name = $_POST['name'];
$email = $_POST['email'];
$major = $_POST['major'];
$continents = array();
$comments = $_POST['comments'];

for ($i = 0; $i < NUM_CONTINENTS; $i++) {
  if ($_POST['continent' . $i]) {
    $continents[] = $_POST['continent' . $i];
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="teach03.css">

  <title>Form submission</title>
</head>
<body>
  <div id="submission">
    <span>Name: <?=$name;?></span>
    <span>Email: <a href="mailto:<?=$email;?>"><?=$email;?></a></span>
    <span>Major: <?=$major;?></span>
    <span>Continents:<br>
      <?php
      foreach ($continents as $continent) {
        echo "$continent <br>";
      }
      ?>
    </span>
    <span>Comments: <?=$comments;?></span>
  </div>
</body>
</html>