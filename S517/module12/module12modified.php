<?php

ini_set("display_errors", 1); // I want to see my mistakes
error_reporting(E_ALL); // And learn from them

require_once("../../dbconnection.php"); // Remote connection credentials
//require_once("../dbconnection.php"); // Local connection credentials

$search_feedback = ""; // Assign an empty variable to display search feedback later
$line_description = ""; // Assign an empty variable to display product line description later
$result_display = ""; // Assign an empty variable to display results later

if (isset($_POST["submit"]) && ($_POST["lines"]) == "<Choose>") { // If no product line is chosen, print error

    $search_feedback .= "<p>Please choose a product line!</p>";

} else if (isset($_POST["submit"]) && ($_POST["lines"]) != "<Choose>") { // Perform a query when the submit button is clicked and a product line is chosen

    $input = mysqli_real_escape_string($dbc, trim(strip_tags($_POST["search_value"]))); // SQL injection and tag protection
    $line = $_POST["lines"]; // Assign a variable for product line selection
    $query = "SELECT p.productName, p.productLine, l.productLine, p.productCode, p.productScale, p.productVendor, p.productDescription, l.textDescription 
    FROM products p
    INNER JOIN productlines l
    USING (productLine)
    WHERE p.productName LIKE '%$input%' AND p.productLine LIKE '$line'"; // Data to be shown when a query is performed
    $results = mysqli_query($dbc, $query); // Assign the query results to a variable

    if (mysqli_num_rows($results) == 0) { // If no results assign feedback to the $search_feedback variable

        $search_feedback .= "<p>Your search of <b>$input</b> from product line <b>$line</b> returned no results.</p>";

    } else { // If results assign feedback
         
        // Assign the number of rows returned to the $total variable
        $total = mysqli_num_rows($results);
        
        // Assign search all feedback to the $search_feedback variable
        if (empty($input)) {

            $search_feedback .= "<p>Your search of <b>all</b> from the product line <b>$line</b> returned <b>$total</b> rows.</p>";
            
        // Assign limited search feedback to the $search_feedback variable
        } else {

            $search_feedback .= "<p>Your search of <b>$input</b> from the product line <b>$line</b> returned <b>$total</b> rows.</p>";

        }

        $example_desc = mysqli_fetch_array($results);
        $line_description = "<p>{$example_desc["textDescription"]}</p>";


        /* Fetch the query results from the $results variable and assign them to the $result_display variable
        I didn't choose very compatible databases to join after all: as the textDescription row in the productlines database is full of text,
        I didn't want it to be included with every single product as well... Instead textDescription is assigned to a variable of its own
        and then printed only once before the product details */ 
        while ($row = mysqli_fetch_array($results)) {

            $result_display .= "<div class=\"flex-container\">
                                <div class=\"desc\">Product name: </div><div class=\"data\">{$row["productName"]}</div>
                                <div class=\"desc\">Product line: </div><div class=\"data\">{$row["productLine"]}</div>
                                <div class=\"desc\">Product code: </div><div class=\"data\">{$row["productCode"]}</div>
                                <div class=\"desc\">Scale: </div><div class=\"data\">{$row["productScale"]}</div>
                                <div class=\"desc\">Vendor: </div><div class=\"data\">{$row["productVendor"]}</div>
                                <div class=\"desc\">Description: </div><div class=\"data\">{$row["productDescription"]}</div>
                                </div><br>";
                             
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
        <meta name="description" content="Search for products within the Classic Models database">
        <meta name="keywords" content="Search, Product, Classic, Models">
        <meta name="author" content="Sampo Jaakkola">

        <title>Classic Models</title>

        <link href="module12styles.css" rel="stylesheet"> <!-- Link to stylesheet -->
     
    </head>

    <body>

        <header>

            <h1>Welcome to Classic Models!</h1>

        </header>

        <main>
 
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Assign form, its method and its results to the same page -->

                <fieldset>

                    <legend>Search the Classic Models product database</legend>
                    
                    <label for="search_value">Entry (leave empty for all):</label>
                    <input type="text" name="search_value" id ="search_value" value="<?php if (isset($_POST['search_value'])) { echo strip_tags($_POST['search_value']);} ?>"><br><!-- Sticky entry and XSS prevention -->
                    
                    <label for="lines">Model line:</label>
                    <select name="lines" id="lines">

                        <option>&lt;Choose&gt;</option>
                        <option>Classic Cars</option>
                        <option>Motorcycles</option>
                        <option>Planes</option>
                        <option>Ships</option>
                        <option>Trains</option>
                        <option>Trucks and Buses</option>
                        <option>Vintage Cars</option>

                    </select>

                    <input type="submit" name="submit" value="Search">

                </fieldset>

            </form>
 
            <?php

            // Display search feedback and/or form results
            echo $search_feedback;
            echo $line_description;
            echo $result_display;
    
            ?>

        </main>
 
    </body>

</html>