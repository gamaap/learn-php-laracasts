<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Demo</title>
    <style>
      body {
        display: grid;
        place-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
      }
    </style>
  </head>
  <body>
    <?php 
      $name = "Dark Matter";
      $read = false;

      if($read) {
        $message = "You have read \"$name\".";
      } else {
        $message = "You have NOT read \"$name\".";
      }
    ?>
    <h1>
      <?= $message ?>
    </h1>
  </body>
</html>