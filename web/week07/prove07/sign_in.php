<?php

session_start();

require "db_connect.php";
$db = getDatabase();

$un = $pw = $dbPw = '';
$user = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['username'])) {
    $unErr = "Please enter a username.";
  }
  else {
    $un = test_input($_POST['username']);
  }

  if (empty($_POST['password'])) {
    $pwErr = "Please enter a password.";
  }
  else {
    $pw = test_input($_POST['password']);
  }

  if ($un != '' && $pw != '') {
    try {
      $user_row = $db->prepare("SELECT user_password FROM users WHERE username='$un' LIMIT 1");
      $user_row->execute();

      $user = $user_row->fetch(PDO::FETCH_ASSOC);
      $dbPw = $user['user_password'];

      if (password_verify($pw, $dbPw)) {
        $_SESSION['username'] = $un;

        header('Location: welcome.php');
        die();
      }
      else {
        $pwErr = "Invalid password. Please try again.";
      }
    }
    catch (Exception $e) {
      $unErr = "Please enter a valid username.";
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
      <h1>Sign In</h1>
      <p class="lead">Enter your username and password below to begin.</p>
  
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="text" name="username" placeholder="Username" value="<?=$un;?>">
        <span class="error"><?=$unErr;?></span>
        <input type="password" name="password" placeholder="Password" value="<?=$pw;?>">
        <span class="error"><?=$pwErr;?></span>
        <button class="btn" type="submit">Log In</button>
      </form>

      <a href="sign_up.php" class="btn">Need to register?</a>
    </div>
  </main>
</body>
</html>