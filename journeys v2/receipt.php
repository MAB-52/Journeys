<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Confirmed</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');
    session_start();

    $numbers = $_POST['bookingno'];
    $cardno = $_POST['cardno1'] . $_POST['cardno2'] . $_POST['cardno3'] . $_POST['cardno4'];
    $expm = $_POST['expm'];
    $expy = $_POST['expy'];
    $cvv = $_POST['cvv'];
    $cardname = $_POST['longboi'];
    $expire = $expm . "/" . "01/" . $expy;
    $exp = date("Y-m-d", strtotime($expire));

    $sql = "UPDATE booking SET cardNum = '$cardno', expiryy = '$exp', cvv = '$cvv', cardname = '$cardname' WHERE bookingno = '$numbers'";
    $result = $con->query($sql);

    $sql = "SELECT * FROM booking WHERE bookingno = $numbers";
    $result = $con->query($sql);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $hotelid =  $json[0]['hotelid'];
    $sql = "SELECT * from hotels WHERE id = $hotelid";
    $result2 = $con->query($sql);
    $json2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    if($json[0]['taxi'] == 400)
    {
        $taxiname = "Hatchback";
    }
    else if($json[0]['taxi'] == 500)
    {
        $taxiname = "Sedan";
    }
    else if($json[0]['taxi'] == 600)
    {
        $taxiname = "SUV";
    }
    else
    {
        $taxiname = "N/A";
    }

    mysqli_close($con);
    ?>
    <nav class="navbar" class=no-print>
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
    <h1 class="tagline">Your booking is confirmed!</h1>
    <br>
    <div class="recwindow">
        <div class="recrow">
            <h2>Journeys</h2>
            <h2>Final Receipt</h2>
        </div>
        <br>
        <hr>
        <br>
        <div class="recrow">
            <p>Booking ID:</p>
            <p>#<?php echo str_pad($numbers, 7, "0", STR_PAD_LEFT) ?></p>
        </div>
        <div class="recrow">
            <p>Booked on:</p>
            <p><?php echo $json[0]['booktime'] ?></p>
        </div>
        <div class="recrow">
            <p>Hotel:</p>
            <p><?php echo $json2[0]['name'] ?></p>
        </div>
        <div class="recrow">
            <p>Reservation cost:</p>
            <p>Rs. <?php echo number_format($json2[0]['price'])?></p>
        </div>
        <div class="recrow">
            <p>Taxi type:</p>
            <p><?php echo $taxiname ?></p>
        </div>
        <div class="recrow">
            <p>Taxi fare:</p>
            <p>Rs. <?php echo $json[0]['taxi'] ?></p>
        </div>
        <div class="recrow">
            <p>Reservation for:</p>
            <p><?php echo $json[0]['adults']?> Adults, <?php echo $json[0]['children']?> Children</p>
        </div>
        <div class="recrow">
            <p>Paid with:</p>
            <p>XXXX XXXX XXXX <?php echo substr($json[0]['cardNum'], -4)?></p>
        </div>
        <div class="recrow">
            <p>From:</p>
            <p><?php echo date("d/m/Y", strtotime($json[0]['fromD']))?></p>
        </div>
        <div class="recrow">
            <p>To: </p>
            <p><?php echo date("d/m/Y", strtotime($json[0]['toD']))?></p>
        </div>
        <br>
        <hr>
        <br>
        <div class="recrow">
            <p><b>Total:</b></p>
            <p><b>Rs. <?php echo number_format($json[0]['total'])?> (Paid)</b></p>
        </div>
        <br>
        <input id=print value='Print' type='button' onclick='handlePrint()'/>
        <script type="text/javascript">
         const handlePrint = () => {
            document.querySelector(".navbar").style.display = 'none';
            window.print();
         }
      </script>
    </div>
    <br>
</body>