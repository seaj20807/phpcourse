<?php

ini_set("display_errors", 1); // I want to see my mistakes
error_reporting(E_ALL); // And learn from them

require_once("../../dbconnection.php"); // Remote connection credentials
//require_once("../dbconnection.php"); // Local connection credentials

/* $dbc = mysqli_connect($localhost, $username, $password, $database);
mysqli_set_charset($dbc,"utf8"); // to ensure accents do not corrupt */
// These are already included in the dbconnection.php file?

$result_display = ""; // Assign an empty variable to display results later
$no_result_display = ""; // Assign an empty variable to display no results later

if (!empty($_POST["submit"]) && !empty($_POST["search_value"])) { // Perform a query when the submit button is clicked and the search field has a parameter

    $input = mysqli_real_escape_string($dbc, trim(strip_tags($_POST["search_value"]))); // SQL injection and tag protection
    $query = "SELECT customerName, state, country, city, addressLine1, addressLine2, phone FROM customers WHERE customerName LIKE '$input%' "; // Data to be shown when a query is performed
    $results = mysqli_query($dbc, $query); // Assign the query results to a variable

    if (mysqli_num_rows($results) == 0) { // If no results assign feedback to the $no_result_display variable

        $no_result_display .= "<p>Your search of <b>$input</b> returned no results.</p>";

        } else { // If results assign feedback
         
            // Assign the number of rows returned to the $total variable
            $total = mysqli_num_rows($results); 
 
            // Assign some text to $result_display and output the values of $input and $total
            $result_display .= "<p>Your search of <b>$input</b> returned <b>$total</b> rows.</p>"; 
 
            // Add then add even more to $result_display: the above message and the results from the while loop
            while ($row = mysqli_fetch_array($results)) {

                // I dislike seeing empty rows :D And I tried to make them look even and adjust the layout on smaller screens, but all at the cost of horrible blocks of code...
                if (isset($row["state"]) && isset($row["addressLine2"])) { // If both state and addessLine2 have data, print them

                    $result_display .= "<div class=\"flex-container\">
                                        <div class=\"desc\">Customer name: </div><div class=\"data\">{$row["customerName"]}</div>
                                        <div class=\"desc\">Country: </div><div class=\"data\">{$row["country"]}</div>
                                        <div class=\"desc\">State: </div><div class=\"data\">{$row["state"]}</div>
                                        <div class=\"desc\">City: </div><div class=\"data\">{$row["city"]}</div>
                                        <div class=\"desc\">Address: </div><div class=\"data\">{$row["addressLine1"]}, {$row["addressLine2"]}</div>
                                        <div class=\"desc\">Phone: </div><div class=\"data\">{$row["phone"]}</div>
                                        </div><br>";

                } else if (isset($row["state"]) && empty($row["addressLine2"])) { // If state has data but addressLine2 doesn't, print state

                    $result_display .= "<div class=\"flex-container\">
                                        <div class=\"desc\">Customer name: </div><div class=\"data\">{$row["customerName"]}</div>
                                        <div class=\"desc\">Country: </div><div class=\"data\">{$row["country"]}</div>
                                        <div class=\"desc\">State: </div><div class=\"data\">{$row["state"]}</div>
                                        <div class=\"desc\">City: </div><div class=\"data\">{$row["city"]}</div>
                                        <div class=\"desc\">Address: </div><div class=\"data\">{$row["addressLine1"]}</div>
                                        <div class=\"desc\">Phone: </div><div class=\"data\">{$row["phone"]}</div>
                                        </div><br>";

                } else if (empty($row["state"]) && isset($row["addressLine2"])) { // If state doesn't have data but addressLine2 does, print addressLine2

                    $result_display .= "<div class=\"flex-container\">
                                        <div class=\"desc\">Customer name: </div><div class=\"data\">{$row["customerName"]}</div>
                                        <div class=\"desc\">Country: </div><div class=\"data\">{$row["country"]}</div>
                                        <div class=\"desc\">City: </div><div class=\"data\">{$row["city"]}</div>
                                        <div class=\"desc\">Address: </div><div class=\"data\">{$row["addressLine1"]}, {$row["addressLine2"]}</div>
                                        <div class=\"desc\">Phone: </div><div class=\"data\">{$row["phone"]}</div>
                                        </div><br>";

                } else { // If both state and addressLine2 are empty, don't print them

                    $result_display .= "<div class=\"flex-container\">
                                        <div class=\"desc\">Customer name: </div><div class=\"data\">{$row["customerName"]}</div>
                                        <div class=\"desc\">Country: </div><div class=\"data\">{$row["country"]}</div>
                                        <div class=\"desc\">City: </div><div class=\"data\">{$row["city"]}</div>
                                        <div class=\"desc\">Address: </div><div class=\"data\">{$row["addressLine1"]}</div>
                                        <div class=\"desc\">Phone: </div><div class=\"data\">{$row["phone"]}</div>
                                        </div><br>";

                }
          
            }

        }
 
    }
 
mysqli_close($dbc); // Close the SQL connection

?>
 
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Search for vendors within the Classic Models database">
        <meta name="keywords" content="Search, Vendor, Classic, Models">
        <meta name="author" content="Sampo Jaakkola">

        <title>Classic Models</title>

        <link href="module11styles.css" rel="stylesheet"> <!-- Link to stylesheet -->
     
    </head>

    <body>

        <header>

            <h1>Welcome to Classic Models!</h1>

        </header>

        <main>
 
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Assign form, its method and its results to the same page -->

                <fieldset>

                    <legend>Search the Classic Models vendor database</legend>
                    
                    <label for="search_value">Entry:</label>
                    <input type="text" name="search_value" id ="search_value" value="<?php if (isset($_POST['search_value'])) { echo strip_tags($_POST['search_value']);} ?>"> <!-- XSS prevention -->

                    <input type="submit" name="submit" value="Search">

                </fieldset>

            </form>
 
            <?php

            // Display form results
            echo $result_display; 
            echo $no_result_display;
    
            ?>

        </main>
 
    </body>

</html>