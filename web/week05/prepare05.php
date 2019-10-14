<?php

try {
  $dbURL = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbURL);

  $dbHost = $dbOpts['host'];
  $dbPort = $dbOpts['port'];
  $dbUser = $dbOpts['user'];
  $dbPassword = $dbOpts['pass'];
  $dbName = ltrim($dbOpts['path'], '/');

  $db = new PDO('pgsql:host=$dbHost;port=$dbPort;dbname=$dbName', $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
  die();
}

?>