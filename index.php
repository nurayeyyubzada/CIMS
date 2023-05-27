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
    <link rel="stylesheet" type="text/css" href="./css/style.css">


</head>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpanel.html");
    exit;
}
?>

<body>

    <section id="menu">
        <div id="logo">Course</div>
        <nav>
            <a href="#banner"><i class="fa-solid fa-house icons"></i>Home</a>
            <a href="#about"><i class="fa-solid fa-circle-info icons"></i>About</a>
            <a href="#courses"><i class="fa-solid fa-book icons"></i>Courses</a>
            <a href="./mycourses.php"><i class="fa-solid fa-book icons"></i>My Courses</a>
            <a href="./profile.php"><i class="fa-solid fa-user icons"></i>Profile</a>
            <a href="./logout.php"><i class="fa-solid fa-right-from-bracket icons"></i>Log-out</a>
        </nav>
    </section>

    <section id="banner">
        <div id="black">

        </div>

        <div id="content">
            <h3 id="content-name">Course</h3>
            <hr width="200" align="left">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. In temporibus nobis sapiente debitis dolores optio
            adipisci tempore quod eum consectetur, libero itaque suscipit praesentium quas provident laboriosam
            obcaecati ducimus quidem.
        </div>
    </section>



    <section id="about">
        <h3>About us</h3>
        <div class="container">
            <div id="left">
                <h5 id="h5left">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque maxime dolorem </h5>

            </div>
            <div id="right">
                <span>L</span>
                <p id="pright">orem ipsum dolor sit amet, consectetur adipisicing elit. Omnis eveniet optio id maiores
                    eaque molestias delectus quaerat, nam, asperiores architecto aliquid facere. Corporis, suscipit
                    nobis! Eum quod porro quam odio?</p>

            </div>

            <img src="./img/about.jpg" alt="About us" class="img-fluid mt100" id="about-image">
            <p id="plast">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis illum deserunt quam nisi</p>
        </div>
    </section>

    <section id="courses">
        <div class="container">
            <h3>Courses</h3>

            <div>
                <?php
                include("./phpFiles/db.php");
                $query = "SELECT id, name,description FROM courses";

                // Execute the query
                $result = $conn->query($query);

                // Loop through the rows and create the div elements
                $url = "./img/r2.jpg";
                while ($row = $result->fetch_assoc()) {
                    echo '<a href="courses.php?id='.$row['id'].'"><div class="card"><img src="./img/r2.jpg" class="img-fluid mt-100">
                    <h5 class="headercard">'.$row['name'].'</h5>
                    <p class="pcard">'.$row['description'].'</p></div></a>';
                }

                // Close the connection
                $conn->close();

                ?>
     
            </div>

        </div>
    </section>






</body>

</html>