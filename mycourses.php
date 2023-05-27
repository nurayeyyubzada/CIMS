<!DOCTYPE html>
<html>
  <head>
    <title>My Courses</title>
    <style>
      .course {
        text-align: center;
      }

      .courses {
        display: inline-block;
        text-align: left;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        max-width: 500px;
      }

      h2 {
        margin-top: 0px;
      }

      .button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .button:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
    <?php
      // Connect to the database
      include("./phpFiles/db.php");
      
      session_start();
      // Get the user's registered courses
      $user_id = $_SESSION['user_id']; // Replace this with the user's ID
      $sql = "SELECT * FROM course_users WHERE user_id = $user_id";
      $result = $conn->query($sql);
      
      // Display the user's registered courses
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $course_id = $row["course_id"];
          $sql2 = "SELECT name, description, cost FROM courses WHERE id = $course_id";
          $result2 = $conn->query($sql2);
          $row2 = $result2->fetch_assoc();
          $name = $row2["name"];
          $description = $row2["description"];
          $cost = $row2["cost"];
          
          echo "<div class='course'>";
          echo "<div class='courses'>";
          echo "<h2>$name</h2>";
          echo "<p>$description</p>";
          echo "<p>Cost: $cost</p>";
          echo "<form method='post' action='leave_course.php'>";
          echo "<input type='hidden' name='course_id' value='$course_id'>";
          echo "<input type='submit' value='Leave Course'>";
          echo "</form>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "You haven't registered for any courses yet.";
      }
      
      // Close the database connection
      $conn->close();
    ?>
  </body>
</html>