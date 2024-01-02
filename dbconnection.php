<?php

define("dbHost", "localhost");
define("dbUser", "no_longer_hosted");
define("dbPass", "no_longer_hosted");
define("dbName", "no_longer_hosted");

$dbc = @mysqli_connect (dbHost, dbUser, dbPass, dbName) OR die ("Could not connect to MySQL");

mysqli_set_charset($dbc, "utf8");