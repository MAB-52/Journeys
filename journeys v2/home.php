<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');

    session_start();
    //Close
    mysqli_close($con);
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
    <br>
    <h1 class="tagline">Booking hotels can be a hassle. Let us help.</h1>
    <form action="listings.php" method="POST">
        <input type="radio" name="price" id="p1" value="5000">
        <input type="radio" name="price" id="p2" value="10000">
        <input type="radio" name="price" id="p3" value="15000">
        <div class="white">
            <div class="row">
                <h1>Pick a city</h1>
                <br>
                <input name="city" class="searchbar" type="search" placeholder="Search by cities..." required>
                <br>
                <h1>Choose a price range</h1>
                <br>
                <div class="radio">
                    <div class="radiobtn1">
                        <label for="p1">1,000 to 4,999</label>
                    </div>
                    <div class="radiobtn2">
                        <label for="p2">5,000 to 9,999</label>
                    </div>
                    <div class="radiobtn3">
                        <label for="p3">10,000 to 14,999</label>
                    </div>
                </div>
                <br>
                <hr>
                <br>
                <button class="search" type="submit"><p>Search</p></button>
            </div>
        </div>
    </form>
    <!--
    <input type="radio" name="city" id="c1" value="mumbai">
    <input type="radio" name="city" id="c2" value="thane">
    <input type="radio" name="city" id="c3" value="kokata">
    <input type="radio" name="city" id="c4" value="chennai">
    <input type="radio" name="city" id="c5" value="jaipur">
    <input type="radio" name="city" id="c6" value="bengaluru">
    <input type="radio" name="city" id="c7" value="hyderabad">
    <input type="radio" name="city" id="c8" value="agra">
    <input type="radio" name="city" id="c9" value="pune">
    <div class="row2">
        <h1>Or, pick one of the popular cities listed here</h1>
        <br>
        <div class="radio">
            <div class="radiobtn4">
                <label for="c1">Mumbai</label>
            </div>
            <div class="radiobtn5">
                <label for="c2">Thane</label>
            </div>
            <div class="radiobtn6">
                <label for="c3">Kolkata</label>
            </div>
        </div>
        <br>
        <div class="radio">
            <div class="radiobtn7">
                <label for="c4">Chennai</label>
            </div>
            <div class="radiobtn8">
                <label for="c5">Jaipur</label>
            </div>
            <div class="radiobtn9">
                <label for="c6">Bengaluru</label>
            </div>
        </div>
        <br>
        <div class="radio">
            <div class="radiobtn10">
                <label for="c7">Hyderabad</label>
            </div>
            <div class="radiobtn11">
                <label for="c8">Agra</label>
            </div>
            <div class="radiobtn12">
                <label for="c9">Pune</label>
            </div>
        </div>
    </div>-->
</body>

</html>