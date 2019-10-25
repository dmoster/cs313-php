<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$username = $_SESSION['username'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["device_name"])) {
    $devNameErr = "Please enter a device name.";
  }
  else {
    $device_name = test_input($_POST["device_name"]);
  }

  if (!empty($_POST["device_description"])) {
    $device_description = test_input($_POST["device_description"]);
  }

  if (empty($_POST["device_address"])) {
    $devAddrErr = "Please enter a URL for the device.";
  }
  else {
    $device_address = test_input($_POST["device_address"]);

  }

  if (empty($_POST["floor"])) {
    $floorErr = "Please enter a URL for the device.";
  }
  else {
    $floor = test_input($_POST["floor"]);

  }

  if (empty($_POST["location"])) {
    $locationErr = "Please enter a URL for the device.";
  }
  else {
    $floor = test_input($_POST["location"]);

  }

  if (!empty($_POST["device_name"]) && !empty($_POST["device_address"]) && !empty($_POST["floor"]) && !empty($_POST["location"])) {
}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);

return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

  <link rel="icon" href="images/copier.png" type="image/gif" sizes="16x16"/>
  <link rel="stylesheet" href="pd.css"/>
  <script src="https://kit.fontawesome.com/599e60a037.js" crossorigin="anonymous"></script>

  <title>Add Devices</title>

</head>
<body id="device-adder">

  <main>
    <div class="card">
      <h1>Add a Device</h1>

      <form id="add-device" class="radius-tr" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="text" name="device_name" placeholder="Name" value="<?=$device_name;?>">
        <span class="error"><?=$devNameErr;?></span>

        <input type="text" name="device_description" placeholder="Description" value="<?=$device_description;?>">

        <input type="url" name="device_address" placeholder="https://example.com" value="<?=$device_address;?>">
        <span class="error"><?=$devAddrErr;?></span>

        <select name="device_type">
          <option value="Computer">Computer</option>
          <option value="Printer">Printer</option>
          <option value="Server">Server</option>
          <option value="Phone">Phone</option>
          <option value="Appliance">Appliance</option>
          <option value="Other">Other</option>
        </select>

        <button class="btn" type="submit">Add</button>
      </form>
    </div>
  </main>

</body>
</html>