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
      echo "Welcome to our website, $firstName $lastName"; //This is not secure!
      ?>
    </p>
    
   <hr>
    
    
 <!-- Note how the superglobal variables -- as any variable -- can be printed/echoed without being assigned to a shorthand variable -->
    <p>
      <?php
      echo "Welcome to our website, " . $_GET["firstname"]  . " " . $_GET["lastname"]; 
      ?>
    </p>
    
    
 
</body>
</html>
