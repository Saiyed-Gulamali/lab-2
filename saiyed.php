<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Caf&eacute;!</title>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body class="bodyStyle">

	<div id="header" class="mainHeader">
		<hr>
		<div class="center"> Lastname Caf&eacute;</div>
	</div>

	<br>
	<hr>
	<div class="topnav">
		<a href="index.php">Home</a>
		<a href="#aboutUs">About Us</a>
		<a href="#contactUs">Contact Us</a>
	</div>
	<hr>

	<div id="mainContent">
		<div id="mainPictures" class="center">
			<table>
				<tr>
					<td><img src="images/Coffee-and-Pastries.jpg" width="490" alt="Coffee and Pastries"></td>
					<td><img src="images/Cake-Vitrine.jpg" width="450" alt="Cake Vitrine"></td>
				</tr>
			</table>

			<hr>
			<div id="header" class="mainHeader">
				<p>Lastname Caf&eacute; Employee List!</p>
			</div>
			<br>

			<?php
			// Database connection settings
			$connection_string = "host=saiyed.c5ywmyoi8flm.ca-central-1.rds.amazonaws.com port=5432 dbname=saiyed user=postgres password=Night0220";

			// Establish connection to PostgreSQL database
			$connection = pg_connect($connection_string);
			if (!$connection) {
				die("Could not connect to the database: " . pg_last_error());
			}

			// Query to retrieve employee data
			$query = "SELECT * FROM employee";
			$result = pg_query($connection, $query);

			if (!$result) {
				die("Error reading data: " . pg_last_error());
			}

			// Display employee data
			while ($row = pg_fetch_assoc($result)) {
				echo "<p>ID: " . htmlspecialchars($row['id']) .
					", First Name: " . htmlspecialchars($row['fname']) .
					", Last Name: " . htmlspecialchars($row['lname']) .
					", Timestamp: " . htmlspecialchars($row['created_at']) . "</p>";
			}

			// Close the database connection
			pg_close($connection);
			?>
		</div>
	</div>
</body>
</html>
