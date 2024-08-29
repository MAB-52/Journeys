<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="contact.css">
    <title>Journeys - Support</title>
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
    <br>
    <br>
    
    <div class="container">
        <div class="text">
    <h1 style="color: white;">Support</h1>
    <br>
    <p style="color: white;">Get in touch and let us know how we can help.</p>
</div>
<br>
<br>
<br>
<div class="flex">
<div class="a-card">
    <br>
<img src="media/car.png" class="round" width="20%">
    <h1>Car Booking</h1>
    <br>
    <p>We'd love to help regarding car booking</p>
  
    <div class="buttons">
        <button id="a">Contact</button>
    </div>
</div>
 <div class="a-card">
    <br>
    <img src="media/hotel.png" class="round" width="20%">
    <h1>Hotel Booking</h1>
    <br>
    <p>We'd love to help regarding hotel booking</p>
    
    <div class="buttons">
        <button id="a">Contact</button>
    </div>
</div>
 <div class="a-card">
    <br>
    <img src="media/debit-card.png" class="round" width="20%">
    <h1>Payment</h1>
    <br>
    <p>We'd love to help regarding payment</p>
    
    <div class="buttons">
        <button id="a">Contact</button>
    </div>
</div>

</div>
   </div>

    </div>


    
    


    <div class="contact">
        <br>
        <br>
        <br>
        <br>
        <h1 >Queries</h1>
        <br>
        <p>Have some questions , drop it down and do let us know.</p>
        <br>
        <br>
        <div class="input-box">
            <input type="text" name="" id="email" placeholder="Enter your name" onkeydown="validation()">
           
        </div>
        <br>
            <div class="input-box">
                <input type="password" placeholder="Enter an email address">
            </div>
            <br>
            <div class="input-box">
                <input type="password" placeholder="Go ahead with your queries . . . . ">
            </div>
            <br>
            <div >
                <button class="button">Submit</button>
            </div>
            <br>
            <p style="font-size: 15px;">Emai : Journeys@gmail.com  <br>Contact No : 9120451512</p>
    </div>

</body>
</html>