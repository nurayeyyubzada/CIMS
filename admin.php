<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="./owl/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="./css/adminstyle.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>

</head>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpanel.html");
    exit;
}
?>

<?php

include("./phpFiles/db.php");
// Get course count
$sql = "SELECT COUNT(*) as course_count FROM courses";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$course_count = $row['course_count'];

// Get user count
$account_type = "student";
$sql = "SELECT COUNT(*) as user_count FROM users WHERE account_type='student'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$user_count = $row['user_count'];

?>

<body>

    <section id="menu">
        <div id="logo">Course</div>
        <nav>
            <a href="#statistics"><i class="fa-solid fa-circle-info icons"></i>Statistics</a>
            <a href="./admin_courses.php"><i class="fa-solid fa-book icons"></i>Courses</a>
            <a href="./admin_users.php"><i class="fa-solid fa-book icons"></i>Students</a>
            <a href="./profile.php"><i class="fa-solid fa-user icons"></i>Profile</a>
            <a href="./logout.php"><i class="fa-solid fa-right-from-bracket icons"></i>Log-out</a>
        </nav>
    </section>

    <section id="statistics">
        <h3>Statistics</h3>
        <div><canvas id="myChart">

        </canvas>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var chart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ['Courses', 'Users'],
				datasets: [{
					label: 'Count',
					data: [<?php echo $course_count; ?>, <?php echo $user_count; ?>],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false
			}
		});
	</script>
        </div>
    </section>


</body>

</html>