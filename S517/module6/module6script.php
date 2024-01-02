<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
		<meta name="author" content="Sampo Jaakkola">
        <meta name="description" content="Registration form submission"> 
        <meta name="keywords" content="Registration, form, submission">

		<title>Registration submission</title>
		<link rel="stylesheet" href="module6styles.css">
	</head>

	<body>
        
        <?php

        ini_set("display_errors", 1); // I want to see my mistakes
        error_reporting(E_ALL); // And learn from them

        // This page receives the data from module6form.html

        $firstName = htmlentities($_POST["firstName"]);
        $lastName = htmlentities($_POST["lastName"]);
        $birthYear = htmlentities($_POST["birthYear"]);
        $username = htmlentities($_POST["username"]);
        $currentYear = date("Y");
        $age = $currentYear - $birthYear;
        $fullName = $firstName . ' ' . $lastName; 

        if ($age <= 16) { // Check that the user is over 16 years old, if not, print an error
            print "<fieldset><legend><h1>Registration unsuccessful!</h1></legend>
            Sorry, you are too young, $fullName!</fieldset>";

        } else if (strlen($username) < 6) { // Check that the username is longer than 6 characters, if not, print an error
            print "<fieldset><legend><h1>Registration unsuccessful!</h1></legend>
            Sorry, your username must be at least 6 characters, $fullName!</fieldset>";

        } else { // Print the received data:
            print "<fieldset><legend><h1>Registration successful!</h1></legend>
            <p>Welcome to the site, $fullName. You are $age years old, so you qualify.</p>
            <p>Your username of <u>$username</u> has been registered.</p></fieldset";
        }

		?>

	</body>

</html>