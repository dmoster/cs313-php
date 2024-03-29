<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$username = $password = $dbPassword = "";
$user = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $unErr = "Please enter a username.";
  }
  else {
    $username = test_input($_POST["username"]);

    try {
      $user_row = $db->prepare("SELECT user_password FROM users WHERE username='$username' LIMIT 1");
      $user_row->execute();
  
      $user = $user_row->fetch(PDO::FETCH_ASSOC);
      $dbPassword = $user['user_password'];
    }
    catch (Exception $e) {
      $unErr = "Please enter a valid username.";
    }
  }

  if (empty($_POST["password"])) {
    $pwErr = "Please enter a password.";
  }
  else {
    $password = test_input($_POST["password"]);

    if ($password == $dbPassword) {
      $_SESSION['username'] = $username;

      header('Location: pd.php');
      die();
    }
    else {
      $pwErr = "Please enter the correct password.";
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="pd.css">

  <title>Device Management - Get Started</title>
</head>
<body id="get-started">
  <main>
    <div class="card">
      <h1>Get Started</h1>
      <p class="lead">Log in below to begin.</p>
  
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="text" name="username" placeholder="Username" value="<?=$username;?>">
        <span class="error"><?=$unErr;?></span>
        <input type="password" name="password" placeholder="Password">
        <span class="error"><?=$pwErr;?></span>
        <button class="btn" type="submit">Log In</button>
      </form>
    </div>
  </main>
</body>
</html>