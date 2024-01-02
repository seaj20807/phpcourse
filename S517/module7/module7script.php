<!DOCTYPE html>
<html lang="en">

	<head>

		<!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3">
		<meta name="author" content="Sampo Jaakkola">
        <meta name="description" content="Survey submission"> 
        <meta name="keywords" content="Survey, submission">

		<title>Survey submission</title>
		<link rel="stylesheet" href="module7styles.css">

	</head>

	<body>
        
        <?php

        ini_set("display_errors", 1); // I want to see my mistakes.
        error_reporting(E_ALL); // And learn from them.

        // This page receives the data from module7form.html.

        $firstName = htmlentities($_POST["firstName"]);
        $listDays = "";
        $listSeasons = "";

        // Check that $weekdays and $seasons are both not empty and are arrays.
        if (isset($_POST["weekdays"]) AND is_array($_POST["weekdays"]) 
        AND isset($_POST["seasons"]) AND is_array($_POST["seasons"])) {

            // Assign their values to a list.
            foreach($_POST["weekdays"] as $weekdays) {
                
                $listDays .= "<p>$weekdays</p>";

            }

            foreach($_POST["seasons"] as $seasons) {
                
                $listSeasons .= "<p>$seasons</p>";

            }

            // Print success and lists.
            echo "<fieldset><legend><h1>Survey complete!</h1></legend>
            Thank you for your participation, <b>$firstName</b>.<br>
            As your favorite day(s) of the week, you chose:<br>
            $listDays
            As your favorite season(s), you chose:
            $listSeasons</fieldset>";

        /* Took some liberties here to check if both are empty, just for the imaginary simple folk unable 
        to pick anything and needing instructions to check both.... I did have to battle against a few 
        warnings of an unassigned array, until I realized I don't even have to check if they're arrays!
        Applies for the simpler checks below as well :) */
        } else if (!isset($_POST["weekdays"]) AND !isset($_POST["seasons"])) { 
            
            echo "<fieldset><legend><h1>Survey incomplete!</h1></legend>
            $firstName, you need to check at least one favorite day and
            you need to check at least one favorite season.</fieldset>";

        // Check if the user left the days empty.
        } else if (!isset($_POST["weekdays"])) {
            
            echo "<fieldset><legend><h1>Survey incomplete!</h1></legend>
            $firstName, you need to check at least one favorite day.</fieldset>";

        // Check if the user left the seasons empty.
        } else if (!isset($_POST["seasons"])) {

            echo "<fieldset><legend><h1>Survey incomplete!</h1></legend>
            $firstName, you need to check at least one favorite season.</fieldset>";
        
        }
       
		?>

	</body>

</html>