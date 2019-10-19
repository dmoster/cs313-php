<?php

require "db_connect.php";
$db = getDatabase();

$username =  $_GET['username'];

$user_row = $db->prepare("SELECT user_id FROM users WHERE username='$username' LIMIT 1");
$user_row->execute();

$user = $user_row->fetch(PDO::FETCH_ASSOC);

$user_id = $user['user_id'];


$location_row = $db->prepare("SELECT location_id, location_name FROM locations WHERE user_id=$user_id");
$location_row->execute();


$locationStr = "[ ";

while ($location = $location_row->fetch(PDO::FETCH_ASSOC)) {
  //   $location_id = $location['location_id'];
  //   $location_name = $location['location_name'];
  
  //   $locationStr += '{
    //     "building": "' . $location_name . '",
    //     "floors": [ ';
    
    //   $floor_row = $db->prepare("SELECT floor_id, floor_name FROM floors WHERE location_id=$location_id");
    //   $floor_row->execute();
    
    //   while ($floor = $floor_row->fetch(PDO::FETCH_ASSOC)) {
      //     $floor_id = $floor['floor_id'];
      //     $floor_name = $floor['floor_name'];
      
      //     $locationStr += '{ "name": "' . $floor_name . '",
        //       "devices": [ ';
        
        //     $device_row = $db->prepare("SELECT device_id, device_description, device_notes, device_address, device_type, device_canFrame FROM devices WHERE floor_id=$floor_id");
        //     $device_row->execute();
        
        //     while ($device = $device_row->fetch(PDO::FETCH_ASSOC)) {
          //       $device_id = $device['device_id'];
          //       $device_description = $device['device_description'];
          //       $device_notes = $device['device_notes'];
          //       $device_address = $device['device_address'];
          //       $device_type = $device['device_type'];
          //       $device_canFrame = $device['device_canFrame'];
          
          //       $locationStr += '{
            //         "address": "' . $device_address . '",
            //         "label": "' . $device_description . '",
            //         "notes": "' . $device_notes . '",
            //         "type": "' . $device_type . '",
            //         "canFrame": ' . $device_canFrame . '
            //       }';
            //     }
            
            //     $locationStr += '] },';
            //   }
            
            //   $locationStr += '] },';
            }
            
            $locationStr += " ]";
            
            echo $locationStr;
            echo '{ "user_id": "' . $user_id . '" }';
            
            ?>