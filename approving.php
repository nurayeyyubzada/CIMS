<?php
                include("./phpFiles/db.php");
                // Update the "approved" column in the "course_users" table
                if (isset($_POST['approve'])) {
                $id = $_POST['id'];
                $approved = $_POST['approve'];
                $sql = "UPDATE course_users SET approved = $approved WHERE user_id = $id";
                $conn->query($sql);
                }
                header("Location: admin_courses.php");
?>