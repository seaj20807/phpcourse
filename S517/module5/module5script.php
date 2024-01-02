<!DOCTYPE html>
<html lang="en">

	<head>
		<!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
		<meta name="author" content="Sampo Jaakkola">
        <meta name="description" content="A form to contact Sampo Jaakkola"> 
        <meta name="keywords" content=" Contact, form, Sampo, Jaakkola ">

		<title>Sampo Jaakkola</title>
		<link rel="stylesheet" href="module5styles.css">
	</head>

	<body>
        
        <?php

        ini_set("display_errors", 1); // I want to see my mistakes
        error_reporting(E_ALL); // And learn from them

        // This page receives the data from module5form.html

        $firstName = htmlentities($_POST["firstName"]);
        $lastName = htmlentities($_POST["lastName"]);
        $city = htmlentities($_POST["city"]);
        $email = htmlentities($_POST["email"]);
        $education = htmlentities($_POST["education"]);

        // Print the received data:
        print "
        <fieldset>
            <legend>Contact form submission confirmation: </legend>
            <p>Welcome to the site, $firstName $lastName of <i><b>$city</b></i>.</p>
            <p>Your e-mail of $email has been registered.</p>
            <p>Your education is: </p>
            <p>$education</p>
        </fieldset>";

		?>

	</body>

</html>