<?php
require_once('../../dbconnection.php');

$dbc = mysqli_connect($localhost, $username, $password, $database);

mysqli_set_charset($dbc,"utf8"); 

$result_display = "";
$no_result_display = "";

if (!empty($_POST['search_value']) && !isset($POST['submit'])) {

     $input = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['search_value']))); 
     $query = "SELECT customers.customerName, orders.orderNumber, orders.shippedDate FROM customers INNER JOIN orders
ON customers.customerNumber = orders.customerNumber WHERE customerName LIKE '$input%' ";
     $results = mysqli_query($dbc, $query); 
	 
	 if (mysqli_num_rows($results) < 1 ) {
	   $no_result_display .= "<p>Your search of <span class=\"highlight\">$input</span> returned no results.</p>";
        }
else
     if (mysqli_num_rows($results) > 0) {
		  $total = mysqli_num_rows($results);
		  
		  $result_display .= "<p>Your search of <span class=\"highlight\">$input</span> returned <span class=\"highlight\">$total</span> rows.</p>"; 
          $result_display .= "<table><tr><th>Customer Name</th><th>Order Number</th><th>Shipped Date</th></tr>";
          while ($row = mysqli_fetch_array($results)) {
          $result_display .= "<tr><td>{$row['customerName']}</td><td>{$row['orderNumber']}</td><td>{$row['shippedDate']}</td></tr>"; 
		}

          $result_display .= "</table>";
}

else {
     $no_result_display .= "No results!";
   }
}

mysqli_close($dbc); 
?>

<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="utf-8">
<title>Classic Models</title>
<meta name="author" content="John Smith">
<meta name="description" content="The Classic Models Company is dedicated to providing quality models for all tastes.">
<meta name="keywords" content="models, cars, motorcycles">


<style> /* remove this stylesheet to an external file */
table, th, td
{
border-collapse: collapse; 
border: 1px solid #000;
padding: 5px;
margin-top: 10px;
}

tr:nth-child(even) {background: #ccc;}
tr:nth-child(odd) {background: #fff;}

.highlight 
{
font-weight: bold; 
color: #f00; 
font-size: larger;
} 

</style> 

</head>
<body>
<h1>Classic Models Database</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><label for="custsearch">Search the Customer Database</label></p>
<input type="text" id="custsearch" name="search_value" value="<?php if (isset($_POST['search_value'])) { echo strip_tags($_POST['search_value']); } ?>">
<input type="submit" name="submit" value="Search">
</form>

<?php 
   echo $result_display; 
   echo $no_result_display;
?>

</body>
</html>