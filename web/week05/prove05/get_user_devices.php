<?php

require "db_connect.php";
$db = getDatabase();

$user_row = $db->prepare("SELECT * FROM users");
$user_row->execute();

$user_id = 

$location_row = $db->prepare("SELECT location_id, location_name, user_id FROM locations");
$location_row->execute();
$floor_row = $db->prepare("SELECT floor_id, location_id, floor_name, user_id FROM floors");
$floor_row->execute();
$device_row = $db->prepare("SELECT device_id, user_id, floor_id, device_description, device_notes, device_address, device_canFrame FROM devices");
$device_row->execute();

while ($row = $location_row->fetch(PDO::FETCH_ASSOC)) {
  $location_id = $row['location_id'];
  $location_name = $row['location_name'];
  $user_id = $row['user_id'];


}

?>