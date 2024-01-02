<?php 

ini_set("display_errors", 1); // I want to see my mistakes
error_reporting(E_ALL); // And learn from them
include ("header.html"); // Include the header section
$feedback = ""; // Define the feedback variable

?>
            <!-- Registration form -->
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"> <!-- Form output to the same page -->

                <fieldset class="grid-container"> <!-- Grid container -->

                    <legend>Contact details</legend>

                    <!-- Fields for user entries -->
                    <label class="label1" for="firstName">First name:</label>
                    <input class="input1" type="text" id="firstName" name="firstName" value="<?php 
                    // Input XSS protections
                    if (isset($_POST["firstName"])) {
						echo $_POST["firstName"];
                    } ?>">
                   
                    <label class="label2" for="lastName">Last name:</label>
                    <input class="input2" type="text" id="lastName" name="lastName" value="<?php 
                    // Input XSS protections
                    if (isset($_POST["lastName"])) {
						echo $_POST["lastName"];
                    } ?>">
                    
                    <!-- Submit the data -->
                    <input class="grid-submit" type="submit" value="Submit" id="submit" name="submit">

                </fieldset> <!-- End grid -->

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

                    // Set the success feedback variable
					$name = $_POST["firstName"] . " " . $_POST["lastName"];				
                    $feedback = "Thank you for your registration $name!  You're now ready to start playing!";
				

                }

            }
        
            ?>

        </main>

        <?php

            // Print the form output
            echo "<div class =\"feedback\">" . htmlspecialchars($feedback) . "</div>";
        
        ?>
        
<?php include("footer.html"); ?> <!-- Include the footer section -->