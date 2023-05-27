<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/admin_courses.css">
</head>
<body>
    <section id="subjects">
    <?php
            include("./phpFiles/db.php");

            // Fetch data from the subject_combinations table
            $course_id = $_GET['id'];
            $sql = "SELECT * FROM subject_combinations WHERE course_id = '$course_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Subject Name</th><th>Update</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"] . "</td><td><button class='update-btn' data-id='" . $row["id"] . "'>Update</button></td></tr>";
            }
            echo "</table>";
            } else {
                
            }

            // Close the database connection
            
            ?>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
            // Listen for click events on the "Update" button
            $('.update-btn').click(function() {
                // Get the ID of the subject_combinations record to update
                var id = $(this).data('id');
                // Find the table row that contains the clicked button
                var $row = $(this).closest('tr');
                // Replace the course name cell with an input field
                $row.find('td:first').html('<input type="text" name="name" value="' + $row.find('td:first').text() + '">');
                // Replace the "Update" button with a "Save" button
                $(this).replaceWith('<button class="save-btn" data-id="' + id + '">Save</button>');
            });

            // Listen for click events on the "Save" button
            $(document).on('click', '.save-btn', function() {
                // Get the ID of the subject_combinations record to update
                var id = $(this).data('id');
                // Find the table row that contains the clicked button
                var $row = $(this).closest('tr');
                // Get the updated course name from the input field
                var name = $row.find('input[name="name"]').val();
                // Replace the input field with the new course name
                $row.find('td:first').text(name);
                // Replace the "Save" button with an "Update" button
                $(this).replaceWith('<button class="update-btn" data-id="' + id + '">Update</button>');
            });
            });
            </script>
        </section>
        <section id=registed-users>
        
            <?php
                

                // Retrieve the data from the "course_users" table
                $sql = "SELECT u.id AS user_id, u.name, u.lname, c.name AS course_name, cu.approved FROM course_users cu JOIN users u ON cu.user_id = u.id JOIN courses c ON cu.course_id = c.id WHERE cu.course_id = $course_id";
                $result = $conn->query($sql);

                // Display the data in an HTML table
                if ($result->num_rows > 0) {
                echo "<table><tr><th>ID</th><th>Name</th><th>First Name</th><th>Course Name</th><th>Approved</th><th>Action</th></tr>";
                while($row = $result->fetch_assoc()) {
                    $id = $row["user_id"];
                    $name = $row["name"];
                    $fname = $row["lname"];
                    $course_name = $row["course_name"];
                    $approved = ($row["approved"]==1 ? "accepted" : "pending..");
                    echo "<tr><td>$id</td><td>$name</td><td>$fname</td><td>$course_name</td><td>$approved</td><td><form action='./approving.php' method='POST'><button type='submit' name='approve' value='1'>Accept</button><button type='submit' name='approve' value='0'>Reject</button><input type='hidden' name='id' value='$id'></form></td></tr>";
                }
                echo "</table>";
                } else {
                }

                

                $conn->close();

                ?>

        </section>
</body>
</html>