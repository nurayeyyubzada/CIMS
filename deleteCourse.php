<?php
include("./phpFiles/db.php");
// Get the course ID from the URL parameter
$course_id = $_GET['id'];

// Delete the row from the "courses" table
$sql = "DELETE FROM courses WHERE id = $course_id";
if ($conn->query($sql) === TRUE) {
  echo "Course deleted successfully";
  header("Location: admin_courses.php");
} else {
  echo "Error deleting course: " . $conn->error;
}

// Close the database connection
$conn->close();
?>



?>