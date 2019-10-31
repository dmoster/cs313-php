<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$device_id = $_GET["device_id"];

$search_statement = $db->prepare('SELECT * FROM devices WHERE device_id=:device_id');
$search_statement->bindValue(':device_id', $device_id, PDO::PARAM_STR);
$search_statement->execute();
$row = $search_statement->fetch(PDO::FETCH_ASSOC);
$device_notes = $row['device_notes'];

function getTitle($row) {
    $device_description = $row['device_description'];
    $device_notes = $row['device_notes'];
    $device_address = $row['device_address'];
    return "$device_description $device_notes:$device_address";
}

$title = getTitle($row);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <p><?= $device_notes; ?></p>
</body>
</html>