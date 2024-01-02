<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your Feedback</title>
	<link rel="stylesheet" href="styles2.css" type="text/css">
</head>
<body>

<?php // Script 3.3 handle_form.php 

ini_set('display_errors', 1); // Let me learn from my mistakes!
error_reporting(E_ALL); // Show all possible problems!

// This page receives the data from feedback.html.
// It will receive: title, firstName, lastName, favColor,
// favFood, email, response, comments, and submit in $_POST.

// Create shorthand versions of the variables:
$title = $_POST['title'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$favColor = $_POST['favColor'];
$favFood = $_POST['favFood'];
$email = $_POST['email'];
$response = $_POST['response'];
$comments = $_POST['comments'];

// Print the received data:
print "<fieldset><legend>Form submission response: </legend>
	<p>Thank you, $title $firstName $lastName, for your comments.</p>
	<p>You kindly let us know that your favorite color is $favColor and your favorite food is $favFood.</p>
	<p>You also stated that you found this example to be '$response' and added:<br>$comments</p>
	<p>Additionally, we've sent this response to your provided e-mail address $email.</p></fieldset>";

?>
</body>
</html>