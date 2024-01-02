<?php 

ini_set("display_errors", 1); // I want to see my mistakes
error_reporting(E_ALL); // And learn from them
include ("header.html"); // Include the header section
$feedback = ""; // Define the feedback variable

?>
            <!-- Registration form -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"> <!-- Form output to the same page -->

                <fieldset>

                    <legend>Contact details</legend>

                    <!-- Fields for user entries -->
                    <label class="contact" for="firstName">First name:</label>
                    <input type="text" id="firstName" name="firstName" value="<?php if (isset($_POST["firstName"])) {echo htmlspecialchars($_POST["firstName"]);} ?>"><br> <!-- Input XSS protections -->

                    <label class="contact" for="lastName">Last name:</label>
                    <input type="text" id="lastName" name="lastName" value="<?php if (isset($_POST["lastName"])) {echo htmlspecialchars($_POST["lastName"]);} ?>"><br> <!-- Input XSS protections -->

                    <!-- Submit the data -->
                    <input type="submit" value="Submit" id="submit" name="submit">

                </fieldset>

            </form>

            <?php

            // Submit the data when the button is clicked
            if (isset($_POST["submit"])) {

                // Check if both fields are empty
                if (empty($_POST["firstName"]) AND empty($_POST["lastName"])) {

                    $feedback = "Please enter your first and last names.";
                
                // Check if the first name field is empty
                } else if (empty($_POST["firstName"])) {

                    $feedback = "Please enter your first name.";
                
                // Check if the last name field is empty
                } else if (empty($_POST["lastName"])) {

                    $feedback = "Please enter your last name.";
                
                // Otherwise (both fields have data)
                } else {

                    // Output XSS protections
                    $name = htmlentities($_POST["firstName"]) . " " . htmlentities($_POST["lastName"]); // Without these the XSS protections above (input fields) do not seem to function, why? I thought they directly modify the user input...
                    $feedback = "Thank you for your registration $name!<br>
                    You're now ready to start playing!";

                }

            }
        
            ?>

        </main>

        <?php

            // Print the form output
            echo "<div class =\"feedback\">$feedback</div>";
        
        ?>
        
<?php include("footer.html"); ?> <!-- Include the footer section -->