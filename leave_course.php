<?php

    include("./phpFiles/db.php");
    session_start();


    // Get user ID and course ID from form input (assuming you have a form that submits these values)
    $user_id = $_SESSION['user_id'];
    $course_id = $_POST['course_id'];

    // Prepare SQL statement
    $stmt = $conn->prepare("DELETE FROM course_users WHERE user_id = ? AND course_id = ?");
    $stmt->bind_param("ii", $user_id, $course_id);

    // Execute SQL statement
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    




?>