<?php

session_start();

require "db_connect.php";
$db = getDatabase();

if (!empty($_POST['add_username'])) {
  $username = $_POST['add_username'];
}

$username = $_SESSION['username'];

$user_row = $db->prepare("SELECT firstname, lastname, user_id FROM users WHERE username='$username' LIMIT 1");
$user_row->execute();

$user = $user_row->fetch(PDO::FETCH_ASSOC);

$firstname = $user['firstname'];
$lastname = $user['lastname'];
$user_id = $user['user_id'];

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
  
  <script src="device_grid.js"></script>
  <script src="device_table.js"></script>

  <title>View Devices</title>

</head>
<body>
  <div id="al-container">

    <aside id="aside-left">

      <form>
        <input id="search" type="text" onkeyup="findDevice()" placeholder="Find a device"/>
        <button id="search_reset" class="inline-btn radius-r" type="reset" onclick="clearSearch()">Clear</button>
      </form>

      <nav id="main-nav" class="radius-r"></nav>
  
      <div id="layout_toggle">
        <a href="#intro" class="inline-btn"><i class="fas fa-arrow-up"></i></a>
        <button class="aside_btn" onclick="displayDeviceGrid(locations)"><i class="fas fa-border-all"></i></button>
        <button class="aside_btn radius-r" onclick="displayDeviceTable(locations)"><i class="fas fa-list"></i></button>
      </div>

    </aside>
  </div>

  <div id="content">

    <main>
  
      <div id="intro">
        <h1><?=$firstname;?>'s Device Management</h1>
        <p class="lead">Below are all items listed in <?=$firstname;?> <?=$lastname;?>'s database.</p>

        <form action="add_devices.php" method="POST">
          <button class="btn" name="add_to" value="<?=$username;?>">Add a Device</button>
        </form>
      </div>
  
      <div id="device-list"></div>
  
    </main>
  
  
    <footer>

      <form action="<?php session_unset();
                          session_destroy(); ?>">

        <button class="btn" type="submit" id="logout">Sign out <span id="username"><?=$username?></button>

      </form>
  
      <a href="https://github.com/dmoster" target="_blank">github.com/dmoster</a>
      <p class="copyright">&copy; 2019 Mostermind</p>
  
    </footer>

  </div>

  <script src="get_device_json.js"></script>
  <script src="pd.js"></script>
  <script src="local_search.js"></script>

</body>
</html>