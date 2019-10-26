<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$username = $_POST['username'];
$_SESSION['username'] = $username;

$user_row = $db->prepare("SELECT user_id FROM users WHERE username='$username' LIMIT 1");
$user_row->execute();

$user = $user_row->fetch(PDO::FETCH_ASSOC);

$user_id = $user['user_id'];
$_SESSION['user_id'] = $user_id;


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
}


function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);

return $data;
}

$username = 'dmoster';

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

  <title>Add Dev<?=$user_id;?>ices</title>

</head>
<body id="device-adder">

  <main>
    <div class="card">
      <h1>Add a Device</h1>

      <form id="add-device" class="radius-tr" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <label for="device_name">Name</label>
        <input id="device_name" type="text" name="device_name" placeholder="Mac Mini" value="<?=$device_name;?>">
        <span class="error"><?=$devNameErr;?></span>

        <label for="device_description">Description</label>
        <input id="device_description" type="text" name="device_description" placeholder="Dev box and productivity machine" value="<?=$device_description;?>">

        <label for="device_address">URL/IP Address</label>
        <input id="device_address" type="text" name="device_address" placeholder="10.20.5.41" value="<?=$device_address;?>">
        <span class="error"><?=$devAddrErr;?></span>

        <label for="device_type">Type</label>
        <select id="device_type" name="device_type">
          <option value="Computer">Computer</option>
          <option value="Printer">Printer</option>
          <option value="Server">Server</option>
          <option value="Router">Router</option>
          <option value="Switch">Switch</option>
          <option value="Phone">Phone</option>
          <option value="Appliance">Appliance</option>
          <option value="Other">Other</option>
        </select>

        <label for="location">Location</label>
        <?php

        try {
          $stmt = $db->prepare("SELECT location_id, location_name FROM locations WHERE user_id=$user_id");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $location_id = $row['location_id'];
            $location_name = $row['location_name'];

            echo "<div class=\"input-group\"><input type=\"radio\" name=\"location\" id=\"loc$location_id\" value=\"$location_id\">
                  <label for=\"loc$location_id\">$location_name</label>";
          }
        }
        catch (PDOException $e) {
          echo "Something went wrong. $e";
          die();
        }

        ?>

        <button class="btn" type="submit">Add</button>
      </form>
    </div>
  </main>

</body>
</html>