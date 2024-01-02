<!DOCTYPE html>  
<html lang="en">  
<head>  
<meta charset="utf-8"> 
<title>Form and Script: same page</title>

</head>

<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
<input type="text" name="query">
<input type="submit" name="submit" value="Submit">
</form>
    
<?php
if(isset($_GET['submit'])){
	
  if(empty($_GET['query'])){
  echo "Enter a search term";
  }

$query=$_GET['query'];
echo $query;
}
?>

</body>
</html> 
    
    
