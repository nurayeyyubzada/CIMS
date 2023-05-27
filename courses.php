<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>
	<link rel="stylesheet" type="text/css" href="./css/style2.css">
</head>
<body>
	<div class="container">
		<h1>Courses</h1>
		<?php
			include("./phpFiles/db.php");
			// Get the ID 
			$id = $_GET['id'];
			// echo $id;

			// Retrieve data from the database
			$sql = "SELECT * FROM courses WHERE id = $id";
			$result = $conn->query($sql);

			// Display the data on the webpage
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<div class='course'>";
					echo "<h2>" . $row['name'] . "</h2>";
					echo "<p>" . $row['description'] . "</p>";
					echo "<p>Cost: $" . $row['cost'] . "</p>";
					echo "</div>";
				}
			} else {
				echo "0 results";
			}

			// Close the database connection
			$conn->close();
            session_start();
            $_SESSION["course_id"] = $id;
		?>
        <div>
                <button onclick="window.location.href='./registertocourse.php'">Register</button>
        </div>
	</div>
</body>
</html>