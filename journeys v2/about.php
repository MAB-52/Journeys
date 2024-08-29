<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - About</title>
    <link rel="stylesheet" href="about.css">
    <link rel="icon" type="image/x-icon" href="media/logo.png">
</head>

<body>
    <?php
    session_start();
    ?>
<nav class="navbar">
        <div class="navleft">
            <a href="home.php">Journeys</a>
        </div>
        <div class="navright">
            <a href="home.php">Home</a>
            <a href="support.php">Support</a>
            <a href="about.php">About</a>
            <a href=<?php if (isset($_SESSION["username"])) {
                        echo 'logout.php';
                    } else {
                        echo 'login.php';
                    } ?>><?php if (isset($_SESSION["username"])) {
                                                                                                                echo $_SESSION["username"];
                                                                                                            } else {
                                                                                                                echo 'Login';
                                                                                                            } ?></a>
        </div>
    </nav>
    <br><br>
    <h1 class="heading">Our Team</h1>
    <br>
    <div class="members">
        <div class="student">
            <img src="media/andy.jpg" alt="Andy">
            <div class="details">
                <h1>Altamash Aziz (04)</h1>
                <br>
                <hr>
                <br>
                <h3>21102031.altamash.aziz@gmail.com</h3>
                <p>Age: 19</p>
                <p>Second Year Student</p>
                <p>A. P. Shah Institute of Technology</p>
            </div>
        </div>
        <div class="student">
            <img src="media/mustafa.jpg" alt="Mustafa">
            <div class="details">
                <h1>Mustafa Bhagat (12)</h1>
                <br>
                <hr>
                <br>
                <h3>21102032.mustafabhagat@gmail.com</h3>
                <p>Age: 19</p>
                <p>Second Year Student</p>
                <p>A. P. Shah Institute of Technology</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="members">
        <div class="student">
            <img src="media/rahul.jpg" alt="Rahul">
            <div class="details">
                <h1>Rahul Babar (03)</h1>
                <br>
                <hr>
                <br>
                <h3>21102016.rahulbabar@gmail.com</h3>
                <p>Age: 20</p>
                <p>Second Year Student</p>
                <p>A. P. Shah Institute of Technology</p>
            </div>
        </div>
        <div class="student">
            <img src="media/advait.png" alt="Teena">
            <div class="details">
                <h1>Advait Kambli</h1>
                <br>
                <hr>
                <br>
                <h3>advaitkambli@gmail.com</h3>
                <p>Age: 19</p>
                <p>Second Year Student</p>
                <p>A. P. Shah Institute of Technology</p>
            </div>
        </div>
    </div>
    <br><br>
    <br>
</body>

</html>