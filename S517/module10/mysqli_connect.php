<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Connect to MySQL</title>
</head>
<body>
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

} else { // Query didn't run.

    print "<p>Could not retrieve the data because:<br>" . mysqli_error($dbc) . ".</p>
    <p>The query being run was: " . $query . "</p>";

} 

mysqli_close($dbc);

?>
</body>
</html>