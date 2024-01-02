<?php
require_once('../../../dbconnection3.php');

$dbc = mysqli_connect($localhost, $username, $password, $database);

mysqli_set_charset($dbc,"utf8"); // to ensure accents do not corrupt

$result_display = "";
$no_result_display = "";

if (!empty($_POST['submit']) && !empty($_POST['search_value'])) {
	
     $input = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['search_value']))); //security added
     $query = "SELECT customerName, state, country FROM customers WHERE customerName LIKE '$input%' "; 
     $results = mysqli_query($dbc, $query);
   
     if (mysqli_num_rows($results) < 1 ) {

	   $no_result_display .= "<p>Your search of <b>$input</b> returned no results.</p>";
     
     }
   
     else if (mysqli_num_rows($results) > 0)  {
		
          //Assign the number of rows returned to the $total variable
		$total = mysqli_num_rows($results); 

          //Assign some text to $result_display and output the values of $input and $total
		$result_display .= "<p>Your search of <b>$input</b> returned <b>$total</b> rows.</p>"; 

		//Add then add even more to $result_display: the above message and the results from the while loop
               while ($row = mysqli_fetch_array($results)) {

		$result_display .= "<p>Customer name: {$row['customerName']}<br>
                              State: {$row['state']}<br>
                              Country: {$row['country']}</p>";		
          }

     }

}

mysqli_close($dbc); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>mysqli procedural example</title>   
    
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="search_value" value="<?php if (isset($_POST['search_value'])) { echo strip_tags($_POST['search_value']); } ?>">
<input type="submit" name="submit" value="Search">
</form>

<?php 
     echo $result_display; 
     echo $no_result_display;
?>

</body>
</html>