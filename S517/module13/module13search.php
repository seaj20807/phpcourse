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

        <!-- Link to the stylesheet -->
        <link href="module13styles.css" rel="stylesheet">

    </head>

    <body>
        
        <!-- Top navigation bar -->
        <div class="topnav"> 

            <a href="module13functions.php">Play</a>
            <a href="module13form.php">Register</a>
            <a class="active" href="module13search.php">Scoreboard</a>

        </div>

        <!-- Header -->
        <header>

            <h1>All-time High Scores:</h1>

        </header>

        <!-- Main content -->
        <main class="tableArea">

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Assign form, its method and its results to the same page -->

                <fieldset>

                    <legend>Sort by:</legend>
                    
                    <div class="sortBy">

                        <input type="submit" name="name" value="Name">
                        <input type="submit" name="score" value="Score">
                        <input type="submit" name="date" value="Date">

                    </div>

                </fieldset>

            </form>

        <?php // Script 12.2 - mysqli_connect.php #2
        /* This script connects to the MySQL database. */

        // Bring connection details from an external file
        require_once ("../../dbconnection.php");

        // Display and sorting of the scoreboard, by score by default

        if (isset($_POST["name"])) {

            $query = "SELECT * FROM `php2022sampo_highscores` ORDER BY playerName";

            if ($result = mysqli_query($dbc, $query)) { // Run the query.

                print "<table><tr>
                <th>Player name</th>
                <th>Score</th>
                <th>Date</th>
                </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                    print "<tr>
                    <td>{$row["playerName"]}</td>
                    <td>{$row["score"]}</td>
                    <td>{$row["date"]}</td>
                    </tr>";
    
                }
    
                print "</table>";
    
            } else { // Query didn't run.
    
                print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
                <p>The query being run was: " . $query . "</p>";
    
            } 
    
            mysqli_close($dbc);

        } else if (isset($_POST["score"])){

            $query = "SELECT * FROM `php2022sampo_highscores` ORDER BY score DESC";

            if ($result = mysqli_query($dbc, $query)) { // Run the query.

                print "<table><tr>
                <th>Player name</th>
                <th>Score</th>
                <th>Date</th>
                </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                    print "<tr>
                    <td>{$row["playerName"]}</td>
                    <td>{$row["score"]}</td>
                    <td>{$row["date"]}</td>
                    </tr>";
    
                }
    
                print "</table>";
    
            } else { // Query didn't run.
    
                print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
                <p>The query being run was: " . $query . "</p>";
    
            } 
    
            mysqli_close($dbc);

        } else if (isset($_POST["date"])) {

            $query = "SELECT * FROM `php2022sampo_highscores` ORDER BY date DESC";

            if ($result = mysqli_query($dbc, $query)) { // Run the query.

                print "<table><tr>
                <th>Player name</th>
                <th>Score</th>
                <th>Date</th>
                </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                    print "<tr>
                    <td>{$row["playerName"]}</td>
                    <td>{$row["score"]}</td>
                    <td>{$row["date"]}</td>
                    </tr>";
    
                }
    
                print "</table>";
    
            } else { // Query didn't run.
    
                print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
                <p>The query being run was: " . $query . "</p>";
    
            } 
    
            mysqli_close($dbc);

        } else {

            $query = "SELECT * FROM `php2022sampo_highscores` ORDER BY score DESC";

            if ($result = mysqli_query($dbc, $query)) { // Run the query.

                print "<table><tr>
                <th>Player name</th>
                <th>Score</th>
                <th>Date</th>
                </tr>";
    
                // Retrieve and print every record:
                while ($row = mysqli_fetch_array($result)) {
    
                    print "<tr>
                    <td>{$row["playerName"]}</td>
                    <td>{$row["score"]}</td>
                    <td>{$row["date"]}</td>
                    </tr>";
    
                }
    
                print "</table>";
    
            } else { // Query didn't run.
    
                print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
                <p>The query being run was: " . $query . "</p>";
    
            } 
    
            mysqli_close($dbc);

        }

        ?>
        
        </main>    
        
        <!-- Footer -->
        <footer>
            
            <!-- Bottom "navigation" bar -->
            <div class="botnav">
                    
                &copy; Sampo Jaakkola
    
            </div>
    
        </footer>
    
    </body>
    
</html>