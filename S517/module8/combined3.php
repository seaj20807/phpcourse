<!DOCTYPE html>  
<html lang="en">  
<head>  
<meta charset="utf-8"> 
<title>Form and Script: same page</title>

</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<!-- This is what a "normal" text input may look like if it has not been given a pre-defined value:
<input type="text" name="query">   -->


<input type="text" name="query" value="<?php 
 if (isset($_GET['query'])) { echo htmlspecialchars($_GET['query']); } ?>"> <!-- htmlspecialchars at work here -->

<input type="submit" name="submit" value="Submit">
</form>
    
<?php
if(isset($_GET['submit'])){
	
  if(empty($_GET['query'])){
  echo "Enter a search term";
  }

$query=$_GET['query'];
echo "<br>";
echo $query;
// echo htmlspecialchars($query); <- But remove it from here and it doesn't work?
}
?>

<img src="code.jpg" alt="Code">

</body>
</html> 
    
    
