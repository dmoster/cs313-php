<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Press+Start+2P|Roboto" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="src/prove02.css">

  <title>Home - Daniel Moster</title>
</head>
<body>
  <header id="header">
    <div class="content">
      <h1>Hi, I'm Daniel.</h1>

      <nav id="nav">
        <ul>
          <li><a href="#" class="btn">Home</a></li>
          <li><a href="assignments.php" class="btn">Assignments</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="content">
      <div id="intro">
        <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)" class="lead">I'm a developer, IT guy, mandolin player, writer, husband, and dad. Most of what I do with the first four are for the benefit of the last two.</p>

        <div class="img-container">
          <img src="images/me.jpg" alt="Handsome picture of me" width="250px">
        </div>
      </div>
    </div>
  </main>

  <article>
    <div class="content">
      <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)">Lately, I've had a particular interest in learning about programming for 8- and 16-bit devices. It's fascinating to me how much more power today's hardware is, and yet the stuff that was accomplished with those older devices was not small by any means.</p>
      <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)">I've learned that a lot of devices from pioneering days of graphical displays&#8212;like the Commodore 64, the Apple II, or the NES&#8212;ran their programs <em>close to the metal</em>, utilizing machine code to actually execute processes without even needing an operating system.</p>
      <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)">That kind of direct contact between software and hardware allowed devices with astonishingly little power to operate at seemingly incredible speeds. In fact, today you can play games written for systems built into the early 2000s using nothing more than a $5 Raspberry Pi Zero.</p>
      <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)">As it happens, this method of programming is far from dead; modern stock tycoons at Wall Street use older systems running these very kinds of programs so they can trade faster. Apple's famous optimization power, which is built in part on this idea, allows them to outclass many of the best Android devices with half the RAM (or less).</p>
      <p onmouseover="toggleColor(this)" onmouseout="toggleColor(this)">I hope that as I continue to learn and work as a developer, this is something I can implement in my work. I believe that it will allow for faster, cleaner, and less expensive technology, making important tech more accessible to a wider variety of people.</p>
    </div>
  </article>

  <?php include 'src/footer.php'; ?>

  <script src="src/prove02.js"></script>
</body>
</html>