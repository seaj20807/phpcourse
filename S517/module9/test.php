<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <body>
            <?php

            ini_set("display_errors", 1); // I want to see my mistakes
            error_reporting(E_ALL); // And learn from them
            define("CURRENTYEAR", date("Y"));

            ?>

            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">

                <label for="yob">Enter your year of birth:</label>
                <input type="number" name="yob" id="yob" min="1900" max="<?php echo CURRENTYEAR; ?>" required>

                <input type="submit" name="calculate" id="calculate" value="Calculate">

            </form>

            <?php

                if (isset($_GET["calculate"])) {

                    $birthYear = $_GET["yob"];

                    function calculateAge($year) {
                        $age = CURRENTYEAR - $year;
                        return $age;
                    }

                    echo "You are " . calculateAge($birthYear) . " years old.";

                }

            ?>

        </body>
    </head>
<html>