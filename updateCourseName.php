<?php

    include("./phpFiles/db.php");
    
    $course_id= $_POST['id'];
    $course_name = $_POST['name'];

    echo $course_name;
    echo $course_id;

    // Prepare SQL statement
    $stmt = $conn->prepare("UPDATE subject_combinations SET name = ? WHERE id = ?");
    $stmt->bind_param("si", $course_name,$course_id);

    // Execute SQL statement
    $stmt->execute();

    // Close connection
    $stmt->close();
    $conn->close();

    // Redirect to profile page
    header("Location: admin_courses.php");
    exit();
    



?>