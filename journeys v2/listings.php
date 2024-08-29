<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Listings</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');
    session_start();
    $city = $_POST['city'];
    $price = $_POST['price'];

    if (!$con) {
        die("Database connection failed." . mysqli_connect_error());
    }

    if ($price == 5000) {
        $rangea = 1000;
        $rangeb = $price;
    } elseif ($price == 10000) {
        $rangea = 5001;
        $rangeb = $price;
    } elseif ($price == 15000) {
        $rangea = 10001;
        $rangeb = $price;
    } else {
        echo "Error retrieving values.";
    }


    $sql = "SELECT * FROM hotels WHERE city = '$city' and price between '$rangea' and '$rangeb'";
    $result = $con->query($sql);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
            <a href=<?php if (isset($_SESSION["username"])) {echo 'logout.php';} else {echo 'login.php';} ?>><?php if (isset($_SESSION["username"])) {echo $_SESSION["username"];} else {echo 'Login';} ?></a>
        </div>
    </nav>
    <br>
    <h1 class="tagline">Hotels in <?php echo $city ?> between Rs. <?php echo number_format($rangea) ?> and Rs. <?php echo number_format($rangeb) ?></h1>
    <br>
    <?php
    $hindex = 0;
    foreach ($json as $hid) {
        $hotelName = $json[$hindex]['name'];
        $hotelPrice = $json[$hindex]['price'];
        $hotelAddress = $json[$hindex]['address'];
        $hotelContact = $json[$hindex]['phone'];
        $hotelImage = $json[$hindex]['img'];
        $trueIndex = $json[$hindex]['id'];

        $test = number_format("$hid[$hindex]$hotelPrice");

        if (!isset($_SESSION["username"])) {
            $action = "login.php";
        } else {
            $action = "finalization.php";
        }

        echo "
        <form action=$action method=POST>
            <div class=hotRow>
                <div class=imgcard>
                    <img src='$hid[$hindex]$hotelImage' alt=>
                </div>
                <div class=entry>
                    <div class=details>
                        <div class=detL>
                            <h2>$hid[$hindex]$hotelName</h2>
                            <br>
                            <hr>
                            <br>
                            <p><b>Address:</b> $hid[$hindex]$hotelAddress</p>
                            <br>
                            <p><b>Contact:</b> $hid[$hindex]$hotelContact</p>
                        </div>
                        <div class=detR>
                            <h2>Rs. $test</h2>
                            <br>
                            <input name=hotInd type=hidden value=$hid[$hindex]$trueIndex>
                            <input name=hotP type=hidden value=$hid[$hindex]$hotelPrice>
                            <button id=book type=submit>BOOK</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </form>
        ";
        $hindex++;
    }
    if ($hindex == 0) {
        echo "<h2 style='text-align: center;'>No hotels to display.</h2>";
    }
    ?>
    <br>
</body>

</html>