<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Play Finite Time And Space!">
        <meta name="keywords" content="Play, Finite, Time, Space">
        <meta name="author" content="Sampo Jaakkola">

        <!-- Title -->
        <title>Play</title>

        <!-- Link to the stylesheet -->
        <link href="module10styles.css" rel="stylesheet">

    </head>

    <body>
        
        <!-- Top navigation bar -->
        <div class="topnav"> 

            <a class="active" href="module10functions.php">Play</a>
            <a href="module10form.php">Register</a>
            <a href="module10view_entries.php">About</a>

        </div>

        <!-- Header -->
        <header>

            <h1>Play Finite Time And Space!</h1>

        </header>

        <!-- Main content -->
        <main>

        <?php 

        ini_set("display_errors", 1); // I want to see my mistakes
        error_reporting(E_ALL); // And learn from them
        $feedback = ""; // Define the feedback variable
        define("CURRENTYEAR", date("Y")); // Define the current year as a constant
        define("LIGHTYEAR", 9.46); // Define light-year (trillion kilometers) as a constant
        define("NEIGHBOUR", 25000); // Define the distance (light-years) to the nearest neighbouring galaxy as a constant

        ?>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">

                <fieldset>

                    <legend>Let's play!</legend>

                    <label for="yob">Enter your year of birth:</label>
                    <input type="number" name="yob" id="yob" min="1900" max="<?php echo CURRENTYEAR; ?>" required>

                    <input type="submit" name="calculate" id="calculate" value="Calculate">

                </fieldset>
                
            </form>

            <?php

            if (isset($_GET["calculate"])) {

                $birthYear = strip_tags($_GET["yob"]); // I think the strip_tags() is not required as the input is a number field, but just in case...
            
                function calculateAge() {

                    global $birthYear; // Access the variable $birthYear within the function
                    $age = CURRENTYEAR - $birthYear; // Calculate the users age
                    return $age; 

                }

                function calculateDistance() {

                    return calculateAge() * LIGHTYEAR; // Use function within a function

                }

                function calculateDistanceLeft($year) { // Use an argument for a function

                    $distance = (NEIGHBOUR - (CURRENTYEAR - $year)) * LIGHTYEAR; // Calculate distance left (trillion kilometers)
                    return $distance;

                }
                
                $feedback = "You are <b>" . calculateAge() . "</b> years old, so sunlight from your birthyear has travelled <b>" . calculateAge() . "</b> lightyears.<br>
                A lightyear is approximately " . LIGHTYEAR . " trillion kilometers, so sunlight from your birthyear has travelled <b>" . calculateDistance() . "</b> trillion kilometers.<br>
                The nearest neighbouring galaxy is approximately " . NEIGHBOUR . " lightyears away, so you still have 
                <b>" . NEIGHBOUR - calculateAge() . "</b> lightyears (<b>" . calculateDistanceLeft($birthYear) . "</b> trillion kilometers) to go!";

            }?>
        
        </main>    
        
        <?php

            // Print the form output
            echo "<div class =\"feedback\">$feedback</div>";

        ?>

        <!-- Footer -->
        <footer>
            
            <!-- Bottom "navigation" bar -->
            <div class="botnav">
                    
                &copy; Sampo Jaakkola
    
            </div>
    
        </footer>
    
    </body>
    
</html>