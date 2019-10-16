<?php
require "db_connect.php";
$db = getDatabase();

$search = $_POST["search"];

$search_statement = $db->prepare('SELECT * FROM scriptures WHERE book=:book');
$search_statement->bindValue(':book', $search, PDO::PARAM_STR);
$search_statement->execute();
$rows = $search_statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search results</title>
</head>
<body>
  <h1>Search Results</h1>
  <?php 
    foreach ( $rows as $row ) {
        $id = $row['id'];
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];

        echo "<a href=\"./details.php?id=$id\">$book $chapter : $verse</a>";
    }
  ?>
</body>
</html>