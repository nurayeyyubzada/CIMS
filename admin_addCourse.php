<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/styleAddCourse.css">
</head>
<body>
    <form method="post" action="create_course.php">
  <label for="name">Course Name:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea><br>

  <label for="cost">Cost:</label>
  <input type="number" id="cost" name="cost" min="0" step="0.01" required><br>

  <label for="subjects">Subjects:</label>
  <div id="subjects">
    <input type="text" name="subject[]" required><br>
  </div>
  <button type="button" onclick="addSubject()">Add Subject</button><br>

  <input type="submit" value="Create Course">
</form>

<script>
  function addSubject() {
    var div = document.createElement("div");
    var input = document.createElement("input");
    input.type = "text";
    input.name = "subject[]";
    input.required = true;
    div.appendChild(input);
    document.getElementById("subjects").appendChild(div);
  }
</script>
</body>
</html>