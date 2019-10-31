// Sign In
<?php

require_once 'src/meta.php';

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
      $user_row = $db->prepare("SELECT password FROM users_t7 WHERE username='$un' LIMIT 1");
      $user_row->execute();

      $user = $user_row->fetch(PDO::FETCH_ASSOC);
      $dbPw = $user['password'];

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
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In</title>
</head>
<body>
  <h1>Sign In</h1>
  <form action="<?php echo htmlspechialchars($_SERVER['PHP_SELFT']); ?>" method="POST">
    <input type="text" name="username" id="username" placeholder="Username" value="<?=$un;?>">
    <span class="error"><?=$unErr;?></span>
    <input type="password" name="password" id="password" placeholder="Password" value="<?=$pw;?>">
    <span class="error"><?=$pwErr;?></span>
    <button class="btn" type="submit">Sign In</button>
  </form>

  <a href="sign_up.php">Need to register?</a>
</body>
</html>