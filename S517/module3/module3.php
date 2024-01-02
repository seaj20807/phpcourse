<!DOCTYPE html>  
<html lang="en">
  
<head>  
<meta charset="utf-8">
<title>Module 3 exercise</title> 

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">

<meta name="author" content="Sam"> <!-- Too close for comfort with them multiple "x"... :D -->
<meta name="description" content="Nothing special"> <!-- As above :) -->
<meta name="keywords" content="Practice, PHP"> <!-- " -->

<link rel="stylesheet" type="text/css" href="styles/mystyles.css">

</head> 
 
<body>
<!-- In HTML comments have to be closed, not the same for PHP single line comments it seems!
It was probably explained before but only now I learned it in practice... :D -->
<h1>How I work and earn</h1>

<?php // Like I said before, no close, and it doesn't affect the rest of the code, cool!
	$day1 = "Mondays";
	$day2 = "Tuesdays";
	$day4 = "Thursdays";
	$salary = "10,000";
	print "<article><h2>My week</h2>
	I work on $day1, $day2, and $day4 and earn $salary dollars a <i><b>week</b></i>!</article>
	<br>
    My friend works only on $day4 but earns a lot more."; /* Had to add an <h2> element so I don't get a warning
	from <article> when validating */
?>

</body>  

</html>  