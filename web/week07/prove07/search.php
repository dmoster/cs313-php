<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$search = $_POST["search"];

$search_statement = $db->prepare('SELECT * FROM devices WHERE device_description=:device_description');
$search_statement->bindValue(':device_description', $search, PDO::PARAM_STR);
$search_statement->execute();
$rows = $search_statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
</head>
<body>
  <h1>Search Results</h1>
  <?php 
    foreach ( $rows as $row ) {
        $device_id = $row['device_id'];
        $device_description = $row['device_description'];
        $device_notes = $row['device_notes'];
        $device_address = $row['device_address'];

        echo "<a href=\"./details.php?device_id=$device_id\">$device_description $device_notes : $device_address</a>";
    }

  ?>
</body>
</html>