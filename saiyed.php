<!DOCTYPE html>
<html>
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
					<td><img src="images/Coffee-and-Pastries.jpg" height=auto width="490"></td>
					<td><img src="images/Cake-Vitrine.jpg" height=auto width="450"></td>
				</tr>
			</table>
			<hr>
			<div id="header" class="mainHeader"><p>Gulamali Saiyed's Caf&eacute; Employee List!</p></div>
			<br>

            <?php
            // Connection details
            $connection_string = "host=saiyed-instance-1.c5ywmyoi8flm.ca-central-1.rds.amazonaws.com port=5432 dbname=saiyed user=postgres password=Night0220";

            // Try to establish a connection
            $connection = pg_connect($connection_string);

           

            // Fetch employee data (if connected successfully)
            $query = "SELECT * FROM employee";
            $result = pg_query($connection, $query);

            if ($result) {
                echo "<table border='1'>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Position</th><th>Created At</th></tr>";
                while ($row = pg_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fname'] . "</td>";
                    echo "<td>" . $row['lname'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Error fetching data: " . pg_last_error() . "</p>";
            }
            // Close the connection
            pg_close($connection);
            ?>

		</div>
	</div>
</body> 
</html>
