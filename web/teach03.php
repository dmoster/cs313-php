<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="src/teach03.css">

  <title>PHP Form Handling</title>
</head>
<body>

<form action="src/formhandler03.php" method="POST">
  Name
  <input type="text" placeholder="John Doe" name="name">
  Email
  <input type="text" placeholder="johndoe@example.com" name="email">
  Major
  <div class="form-group">
    <?php

    $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");

    foreach ($majors as $major) {
      echo '<div class="input-item">
              <input type="radio" name="major" value="' . $major . '"> ' . $major . '</div>';
    }

    ?>
  </div>
  Continents you've visited
    <div class="form-group">
      <div class="input-item">
        <input type="checkbox" name="continent0" value="North America"> North America
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent1" value="South America"> South America
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent2" value="Europe"> Europe
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent3" value="Asia"> Asia
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent4" value="Australia"> australia
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent5" value="Africa"> Africa
      </div>
      <div class="input-item">
        <input type="checkbox" name="continent6" value="Antarctica"> Antarctica
      </div>
    </div>
  Comments
  <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Type additional comments here..."></textarea>
  <button type="submit">Submit</button>
</form>
  
</body>
</html>