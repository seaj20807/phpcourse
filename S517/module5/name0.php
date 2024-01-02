<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Form Example</title>
  </head>
  <body>
    <p>
      <?php
      $firstName = $_GET["firstname"];
      $lastName = $_GET["lastname"];
      echo "Welcome to our website, $firstName $lastName"; 
      ?>
    </p>
  </body>
</html>
