<?php

include("./phpFiles/db.php");
session_start();

$user_id=$_SESSION['user_id'];
$course_id=$_SESSION['course_id'];

    $stmt = $conn->prepare("SELECT * FROM course_users WHERE user_id = ? AND course_id = ?");
    $stmt->bind_param("ii", $user_id, $course_id);
    $stmt->execute();

    // Get the result of the SQL query
    $result = $stmt->get_result();


    // Check if the username exists in the users table
    if ($result->num_rows > 0) {
        echo "You already registered!";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO course_users (course_id, user_id, approved) VALUES (?, ?, ?)");
        $approved=false;
        $stmt->bind_param("iis", $course_id, $user_id, $approved);

        // Execute SQL statement
        $stmt->execute();

        // Close connection
        $stmt->close();
        $conn->close();

        header("Location: index.php");
    }
    



?>