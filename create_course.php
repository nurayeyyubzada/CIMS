<?php
include("./phpFiles/db.php");
// Get the course data from the form
$name = $_POST["name"];
$description = $_POST["description"];
$cost = $_POST["cost"];
$subjects = $_POST["subject"];

// Insert the course data into the courses table
$sql = "INSERT INTO courses (name, description, cost) VALUES ('$name', '$description', '$cost')";
if (mysqli_query($conn, $sql)) {
  $course_id = mysqli_insert_id($conn);

  // Insert the subject data into the subject_combinations table
  foreach ($subjects as $subject) {
    $sql = "INSERT INTO subject_combinations (course_id, name) VALUES ('$course_id', '$subject')";
    mysqli_query($conn, $sql);
  }

  header("Location: admin_courses.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>