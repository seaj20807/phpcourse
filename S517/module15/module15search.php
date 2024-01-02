<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Check the Finite Time And Space Scoreboard!">
        <meta name="keywords" content="Finite, Time, Space, Scoreboard">
        <meta name="author" content="Sampo Jaakkola">

        <!-- Title -->
        <title>Scoreboard</title>

        <!-- Link to external stylesheet and Javascript files -->
        <link href="module15styles.css" rel="stylesheet">
        <script src="module15java.js"></script>

    </head>

    <body>
        
        <!-- Top navigation bar -->
        <div class="topnav"> 

            <a href="module15functions.php">Play</a>
            <a href="module15form.php">Register</a>
            <a class="active" href="module15search.php">Scoreboard</a>

        </div>

        <!-- Header -->
        <header>

            <h1>Hall Of Fame!</h1>

        </header>

        <!-- Main content -->
        <main class="tableArea">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Assign form, its method and its results to the same page -->

                <fieldset>

                    <legend>All-time highscores</legend>

                    <label for="search_value">Search by name (leave empty for all):</label><br>
                    <input type="text" name="search_value" id ="search_value" value="<?php if (isset($_POST["search_value"])) {echo strip_tags($_POST["search_value"]);} ?>"><br><!-- Sticky entry and XSS prevention -->

                    <input type="submit" name="submit" value="Search">

                </fieldset>

            </form>

        <?php

        // Bring connection details from an external file
        require_once ("../../dbconnection.php");

        ini_set("display_errors", 1); // I want to see my mistakes
        error_reporting(E_ALL); // And learn from them
        
        $feedback = ""; // Define the feedback variable
        $query = "SELECT * FROM `php2022sampo_highscores` ORDER BY score DESC"; // Default query
        $result = mysqli_query($dbc, $query); // Default query results

        // Display and sorting of the scoreboard, by score by default
        
        if (isset($_POST["submit"])) { // If the user has provided a search term use a different query

            $input = mysqli_real_escape_string($dbc, trim(strip_tags($_POST["search_value"]))); // SQL injection and tag protection
            $query = "SELECT * FROM `php2022sampo_highscores` WHERE playerName LIKE '%$input%' ORDER BY rank";
            $result = mysqli_query($dbc, $query);

            if (mysqli_num_rows($result) == 0) {

                $feedback .= "Your search didn't provide any results, please try another search term.";

            } else {

                print "
                <table id=\"scores\">
                    <tr>
                        <th><a href=\"#\" onclick=\"sortTable.byName()\">Player name</a></th>
                        <th><a href=\"#\" onclick=\"sortTable.byScore()\">Score</a></th>
                        <th><a href=\"#\" onclick=\"sortTable.byDate()\">Date</a></th>
                        <th><a href=\"#\" onclick=\"sortTable.byScore()\">Rank</a></th>
                    </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                print "
                    <tr>
                        <td>{$row["playerName"]}</td>
                        <td>{$row["score"]}</td>
                        <td>{$row["date"]}</td>
                        <td>{$row["rank"]}</td>
                    </tr>";
    
                }
                
                print "</table>";

            }

        } else {

            print "
            <table id=\"scores\">
                <tr>
                    <th><a href=\"#\" onclick=\"sortTable.byName()\">Player name</a></th>
                    <th><a href=\"#\" onclick=\"sortTable.byScore()\">Score</a></th>
                    <th><a href=\"#\" onclick=\"sortTable.byDate()\">Date</a></th>
                    <th><a href=\"#\" onclick=\"sortTable.byScore()\">Rank</a></th>
                </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                print "
                <tr>
                    <td>{$row["playerName"]}</td>
                    <td>{$row["score"]}</td>
                    <td>{$row["date"]}</td>
                    <td>{$row["rank"]}</td>
                </tr>";
    
                }
    
            print "</table>";

        }

        mysqli_close($dbc);

        ?>
        
        </main>
        
        <?php

            // Print the no results feedback
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