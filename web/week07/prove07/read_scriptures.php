<?php

session_start();

require "db_connect.php";
$db = getDatabase();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scripture List</title>
</head>
<body>
  <h1>Scripture Resources</h1>
    <?php 
    $database_row = $db->prepare("SELECT book, chapter, verse, content FROM scriptures");
    $database_row->execute();
    
    while ($row = $database_row->fetch(PDO::FETCH_ASSOC)) {
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $content = $row['content'];

        echo '<p>';
        echo "<b> $book $chapter : $verse </b> - \" $content \"";
        echo '</p>';
    }

    ?>

    <hr>

    <h2>Scripture Search</h2>

    <form action="search.php" method="post">
      <label for="search">Search by Book</label><br>
      <input type="text" name="search" placeholder="John">

      <button type="submit">Search</button>
    </form>
</body>
</html>
