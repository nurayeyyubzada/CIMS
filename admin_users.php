<!DOCTYPE html>
<html>
<head>
	<title>User Table</title>
	<link rel="stylesheet" type="text/css" href="./css/admin_users.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include("./phpFiles/db.php");
				// select data from the users table
				$sql = "SELECT id, name, lname FROM users";
				$result = $conn->query($sql);
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["lname"] . "</td></tr>";
				}
				$conn->close();
			?>
		</tbody>
	</table>
	<a href="./add_user.php" class="button">Add User</a>
</body>
</html>