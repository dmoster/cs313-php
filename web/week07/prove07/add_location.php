<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$user_id;
$user;

if (isset($_POST['add_to'])) {
  $_SESSION['username'] = $_POST['add_to'];
}
$username = $_SESSION['username'];

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

  if (empty($_POST["location_name"])) {
    $locNameErr = "Please enter a location name.";
  }
  else {
    $location_name = test_input($_POST["location_name"]);
  }

  if (!empty($_POST["location_name"])) {

    try {
      $q = 'INSERT INTO locations(user_id, location_name) VALUES(:user_id, :location_name)';
      $stmt = $db->prepare($q);

      $stmt->bindValue(':user_id', $user_id);
      $stmt->bindValue(':location_name', $location_name);

      $stmt->execute();

      try {
        $location_row = $db->prepare("SELECT location_id FROM locations WHERE location_name='$location_name' LIMIT 1");
        $location_row->execute();

        $location = $location_row->fetch(PDO::FETCH_ASSOC);
        $_SESSION['location_id'] = $location['location_id'];
        $_SESSION['location_name'] = $location_name;

        header('Location: add_floors.php');
        die();
      }
      catch (PDOException $e) {
        echo "Something went wrong. Please try again.";
        die();
      }

      $_SESSION['working_location'] = $location_name;
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

  <title>Add a Location</title>

</head>
<body id="device-adder">

  <main>
    <div id="intro">
      <form action="pd.php" method="POST">
        <button class="btn" type="submit" name="add_username" value="<?=$username;?>"><i class="fas fa-long-arrow-alt-left"></i> Main</button>
      </form>
    </div>

    <div class="card">
      <h1>Add a Location</h1>
      <p class="lead">Where do you keep your devices?</p>

      <form id="add-device" class="radius-tr" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <label for="location_name">Name<span class="required">*</span></label>
        <input id="location_name" type="text" name="location_name" placeholder="Home" value="<?=$location_name;?>">
        <span class="error"><?=$locNameErr;?></span>

        <button class="btn" type="submit" name="add_to" value="<?=$username;?>">Add</button>
      </form>
    </div>
  </main>

  <footer>

    <form action="sign_in.php">
      <button class="btn" type="submit" id="logout">Sign out <span id="username"><?=$username?></button>
    </form>

    <a href="https://github.com/dmoster" target="_blank">github.com/dmoster</a>
    <p class="copyright">&copy; 2019 Mostermind</p>

  </footer>

</body>
</html>