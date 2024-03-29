<?php

try {
  $dbURL = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbURL);

  $dbHost = $dbOpts['host'];
  $dbPort = $dbOpts['port'];
  $dbUser = $dbOpts['user'];
  $dbPassword = $dbOpts['pass'];
  $dbName = ltrim($dbOpts['path'], '/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  die();
}


foreach($db->query('SELECT username, user_password FROM users') as $row) {
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['user_password'];
  echo '<br/>';
}

$id = 2;
$name = 'dmoster';
$stmt = $db->prepare('SELECT * FROM users WHERE user_id=:id AND username=:name');
$stmt->execute(array(':name' => $name, ':id' => $id));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo $rows[0];

?>