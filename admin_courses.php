<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin_courses.css">
</head>

<?php

include("./phpFiles/db.php");
$stmt = $conn->prepare("SELECT * FROM courses ");




// Execute SQL statement
$stmt->execute();

// Get result
$result = $stmt->get_result();



?>


<body>
       <section id="table">
            <table>
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Cost</th>
                    <th>View</th>
                    <th>Delete</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        include("./phpFiles/db.php");

                        // Select all records from the "courses" table
                        $sql = "SELECT * FROM courses";
                        $result = mysqli_query($conn, $sql);

                        // Loop through the records and display them in a table
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['description'] . "</td>";
                            echo "<td>" . $row['cost'] . "</td>";
                            echo "<td><a href='viewCourse.php?id=" . $row['id'] . "'>View</a></td>";
                            echo "<td><a href='deleteCourse.php?id=" . $row['id'] . "'>Delete</a></td>";
                            echo "</tr>";
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </tbody>
        </table>
       </section>
       <div class="container">
            <a href="./admin_addCourse.php" >
                <div id="addButton">Add course</div>
            </a>
        </div>
       <section>

       </section>
</body>
</html>