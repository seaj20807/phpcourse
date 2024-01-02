<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- Metadata -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Learn about Finite Time And Space!">
        <meta name="keywords" content="About, Finite, Time, Space">
        <meta name="author" content="Sampo Jaakkola">

        <!-- Title -->
        <title>About</title>

        <!-- Link to the stylesheet -->
        <link href="module10styles.css" rel="stylesheet">

    </head>

    <body>
        
        <!-- Top navigation bar -->
        <div class="topnav"> 

            <a href="module10functions.php">Play</a>
            <a href="module10form.php">Register</a>
            <a class="active" href="module10view_entries.php">About</a>

        </div>

        <!-- Header -->
        <header>

            <h1>List of employees:</h1> <!-- Let's pretend that a serious company would list all of their employees on a public webpage... -->

        </header>

        <!-- Main content -->
        <main class="tableArea">

        <?php // Script 12.2 - mysqli_connect.php #2
        /* This script connects to the MySQL database. */

        // Bring connection details from an external file
        require_once ("../../dbconnection.php");

        $query = "SELECT * FROM employees";

        if ($result = mysqli_query($dbc, $query)) { // Run the query.

            print "<table><tr>
            <th>Employee Number</th>
            <th>Last name</th>
            <th>First name</th>
            <th>Job title</th>
            </tr>";

            // Retrieve and print every record:
            while ($row = mysqli_fetch_array($result)) {

                print "<tr>
                <td>{$row["employeeNumber"]}</td>
                <td>{$row["lastName"]}</td>
                <td>{$row["firstName"]}</td>
                <td>{$row["jobTitle"]}</td>
                </tr>";

            }

            print "</table>";

        } else { // Query didn't run.

            print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
            <p>The query being run was: " . $query . "</p>";

        } 

        mysqli_close($dbc);

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