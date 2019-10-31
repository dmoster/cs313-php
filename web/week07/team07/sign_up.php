<?php

require 'src/meta.php';

$un = $pw = '';

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
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    try {
      $q = 'INSERT INTO users_t7(username, password) VALUES(:username, :password)';
      $stmt = $db->prepare($q);

      $stmt->bindValue(':username', $un);
      $stmt->bindValue(':password', $pw);

      $stmt->execute();

      header('Location: sign_in.php');
      die();
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up</title>
</head>
<body>
  <h1>Sign Up</h1>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <input type="text" name="username" id="username" placeholder="Username" value="<?=$un;?>">
    <span class="error"><?=$unErr;?></span>
    <input type="password" name="password" id="password" placeholder="Password" value="<?=$pw;?>">
    <span class="error"><?=$pwErr;?></span>
    <button class="btn" type="submit">Sign Up</button>
  </form>

  <a href="sign_in.php">Already a user?</a>
</body>
</html>