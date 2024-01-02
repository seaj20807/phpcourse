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

      $firstName = htmlspecialchars($firstName);
      $lastName = htmlspecialchars($lastName); 
		  
			echo "Welcome to our website, $firstName $lastName";
		  
      ?>
      
</p>


<hr>

<!-- Here is another way to do the same thing as above! 
<p>

      <?php
	  /* 

      $firstName = htmlspecialchars($_GET["firstname"]);
      $lastName = htmlspecialchars($_GET["lastname"]);
	 
			echo "Welcome to our other website, $firstName $lastName";
	  */  
      ?>
      
</p>

-->
    
    
</body>
</html>
