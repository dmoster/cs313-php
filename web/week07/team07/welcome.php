<?php

session_start();
require 'src/db_connect.php';
$db = getDatabase();

if (empty($_SESSION['username'])) {
  header('Location: sign_in.php');
  die();
}
else {
  $un = $_SESSION['username'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome</title>
</head>
<body>
  <p>Welcome, <?=$un;?>!</p>
</body>
</html>