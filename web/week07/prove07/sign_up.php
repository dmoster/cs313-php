<?php

session_start();
require 'db_connect.php';
$db = getDatabase();

$un = $pw = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['username'])) {
    $unErr = "Please enter a username.";
  }
  else {
    $un = test_input($_POST['username']);
  }

  if (empty($_POST['user_password'])) {
    $pwErr = "Please enter a password.";
  }
  else {
    $pw = test_input($_POST['user_password']);
  }
  
  if (empty($_POST['user_email'])) {
    $emailErr = "Please enter an email address.";
  }
  else {
    $email = test_input($_POST['user_email']);
  }
  
  if (empty($_POST['firstname'])) {
    $fnErr = "Please enter your first name.";
  }
  else {
    $firstname = test_input($_POST['firstname']);
  }
  
  if (empty($_POST['lastname'])) {
    $lnErr = "Please enter your last name.";
  }
  else {
    $lastname = test_input($_POST['lastname']);
  }


  if ($un != '' && $pw != '' && $email != '' && $firstname != '' && $lastname != '') {
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    try {
      $q = 'INSERT INTO users(username, user_password, user_email, firstname, lastname) VALUES(:username, :user_password, :user_email, :firstname, :lastname)';
      $stmt = $db->prepare($q);

      $stmt->bindValue(':username', $un);
      $stmt->bindValue(':user_password', $pw);
      $stmt->bindValue(':user_email', $email);
      $stmt->bindValue(':firstname', $firstname);
      $stmt->bindValue(':lastname', $lastname);

      $stmt->execute();

      $_SESSION['username'] = $un;

      header('Location: sign_in.php');
      die();
    }
    catch (PDOException $e) {
      echo "Something went wrong. Please try again.";
      echo $e;
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
  
  <link rel="stylesheet" href="pd.css">
  <script src="validate.js"></script>
  
  <title>Sign Up</title>
</head>
<body id="get-started">
  <main>
    <div class="card">
      <h1>Sign Up</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <input type="text" name="firstname" id="firstname" placeholder="First name" value="<?=$firstname;?>">
        <span class="error"><?=$fnErr;?></span>
        <input type="text" name="lastname" id="lastname" placeholder="Last name" value="<?=$lastname;?>">
        <input type="email" name="user_email" id="email" placeholder="Email" value="<?=$email;?>">
        <span class="error"><?=$emailErr;?></span>
        <span class="error"><?=$lnErr;?></span>
        <input type="text" name="username" id="username" placeholder="Username" value="<?=$un;?>">
        <span class="error"><?=$unErr;?></span>
        <input type="password" name="user_password" id="password" placeholder="Password" value="<?=$pw;?>">
        <input type="password" id="pw_verify" placeholder="Reenter password" onkeyup="comparePw()">
        <span class="error"><?=$pwErr;?></span>
        <button class="btn" type="submit" id="sign_up_btn" disabled>Sign Up</button>
      </form>
      <a href="sign_in.php" class="btn">Already a user?</a>
    </div>
  </main>

</body>
</html>