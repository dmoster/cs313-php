<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$user_id;
$user;

$username = $_POST['add_to'];
$_SESSION['username'] = $username;

try {
  $user_row = $db->prepare("SELECT user_id FROM users WHERE username='$username' LIMIT 1");
  $user_row->execute();

  $user = $user_row->fetch(PDO::FETCH_ASSOC);

  $user_id = $user['user_id'];
  $_SESSION['user_id'] = $user_id;
}
catch (PDOException $e) {
  echo $e;
  die();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $device_type = $_POST['device_type'];
  $location = $_POST['location'];
  $floor = $_POST['floor'];

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

  if (!empty($_POST["device_name"]) && !empty($_POST["device_address"]) && !empty($_POST["location"]) && !empty($_POST["floor"])) {

    try {
      $q = 'INSERT INTO devices(user_id, floor_id, device_description, device_notes, device_address, device_type) VALUES(:user_id, :floor_id, :device_name, :device_description, :device_address, :device_type)';
      $stmt = $db->prepare($q);

      $stmt->bindValue(':user_id', $user_id);
      $stmt->bindValue(':floor_id', $floor);
      $stmt->bindValue(':device_name', $device_name);
      $stmt->bindValue(':device_description', $device_description);
      $stmt->bindValue(':device_address', $device_address);
      $stmt->bindValue(':device_type', $device_type);

      $stmt->execute();
    }
    catch (Exception $e) {
      echo "Something went wrong. Please try again.";
      die();
    }
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

  <title>Add Devices</title>

</head>
<body id="device-adder">

  <main>
    <div id="intro">
      <form action="pd.php" method="POST">
        <button class="btn" name="add_username" value="<?=$username;?>"><i class="fas fa-long-arrow-alt-left"></i> Back</button>
      </form>
    </div>

    <div class="card">
      <h1>Add a Device</h1>

      <form id="add-device" class="radius-tr" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <label for="device_name">Name<span class="required">*</span></label>
        <input id="device_name" type="text" name="device_name" placeholder="Mac Mini" value="<?=$device_name;?>">
        <span class="error"><?=$devNameErr;?></span>

        <label for="device_description">Description</label>
        <input id="device_description" type="text" name="device_description" placeholder="Dev box and productivity machine" value="<?=$device_description;?>">

        <label for="device_address">URL/IP Address<span class="required">*</span></label>
        <input id="device_address" type="text" name="device_address" placeholder="10.20.5.41" value="<?=$device_address;?>">
        <span class="error"><?=$devAddrErr;?></span>

        <label for="device_type">Type</label>
        <select id="device_type" name="device_type">
          <option value="Computer">Computer</option>
          <option value="Printer">Printer</option>
          <option value="Server">Server</option>
          <option value="Print Server">Print Server</option>
          <option value="Router">Router</option>
          <option value="Switch">Switch</option>
          <option value="Smartphone">Smartphone</option>
          <option value="Tablet">Tablet</option>
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
                  <label for=\"loc$location_id\">$location_name</label></div>";
          }
        }
        catch (PDOException $e) {
          echo $e;
          die();
        }

        ?>

        <label for="floor">Floor</label>
        <?php

        try {
          $stmt = $db->prepare("SELECT floor_id, floor_name FROM floors WHERE user_id=$user_id");
          $stmt->execute();

          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $floor_id = $row['floor_id'];
            $floor_name = $row['floor_name'];

            echo "<div class=\"input-group\"><input type=\"radio\" name=\"floor\" id=\"floor$floor_id\" value=\"$floor_id\">
                  <label for=\"floor$floor_id\">$floor_name</label></div>";
          }
        }
        catch (PDOException $e) {
          echo $e;
          die();
        }

        ?>

        <button class="btn" type="submit" name="add_to" value="<?=$username;?>">Add</button>
      </form>
    </div>
  </main>

  <footer>

    <form action="<?php session_unset();
                        session_destroy(); ?>">

      <button class="btn" type="submit" id="logout">Sign out <span id="username"><?=$username?></button>

    </form>

    <a href="https://github.com/dmoster" target="_blank">github.com/dmoster</a>
    <p class="copyright">&copy; 2019 Mostermind</p>

  </footer>

</body>
</html>