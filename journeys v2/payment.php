<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Payment</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    date_default_timezone_set('Asia/Kolkata');
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');
    session_start();
    $ind = $_POST['hotInd'];
    $taxi = $_POST['taxi'];

    $sql = "select * from hotels where id = '$ind'";
    $result = $con->query($sql);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($json as $hid) {
        $hotelprice = $json[0]['price'];
        $hotelname = $json[0]['name'];
    }

    $taxi = $_POST['taxi'];
    $guestsa = $_POST['guestsa'];
    $guestsb = $_POST['guestsb'];
    $from = $_POST['fYY'] . '-' . $_POST['fMM'] . '-' . $_POST['fDD'];
    $to = $_POST['tYY'] . '-' . $_POST['tMM'] . '-' . $_POST['tDD'];
    $taxad = $_POST['taxad'];
    $total = $hotelprice + $taxi;
    
    $numbers = range(1, 99999);
    shuffle($numbers);
    $sql = "SELECT * FROM booking WHERE bookingno = $numbers[0]";
    $result = $con->query($sql);
    $count = mysqli_num_rows($result);
    $booktime = date("d/m/Y h:i:sa");

    while ($count != 0) {
        shuffle($numbers);
        $sql = "SELECT * FROM booking WHERE bookingno = $numbers[0]";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
    }

    $userid = $_SESSION["userid"];
    $sql = "INSERT INTO booking VALUES('$userid', '$ind', '$taxi', '$taxad', '$from', '$to', '$guestsa', '$guestsb', '$numbers[0]', '', '', '', '', '$booktime', '$total')";
    $result = $con->query($sql);
    mysqli_close($con);
    ?>

    <script src="valid.js"></script>
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
    <div class="cardwin">
        <form id=form action="receipt.php" method="POST" onsubmit="return cardvalid()">
        <input name=bookingno type="hidden" value=<?php echo $numbers[0]?>>
            <div class="cardleft">
                <h1>Enter your card details</h1>
                <hr>
                <br>
                <span>Card Number</span>
                <br>
                <span id=text></span>
                <br>
                <div class="cninput">
                    <input name=cardno1 id=cardno1 type="text" min="0" max="9999" step="1" pattern="[0-9]{4}" minlength=4 maxlength=4 required placeholder="XXXX">
                    <input name=cardno2 id=cardno2 type="text" min="0" max="9999" step="1" pattern="[0-9]{4}" minlength=4 maxlength=4 required placeholder="XXXX">
                    <input name=cardno3 id=cardno3 type="text" min="0" max="9999" step="1" pattern="[0-9]{4}" minlength=4 maxlength=4 required placeholder="XXXX">
                    <input name=cardno4 id=cardno4 type="text" min="0" max="9999" step="1" pattern="[0-9]{1}+" minlength=1 maxlength=4 required placeholder="XXXX">
                </div>
                <br>
                <span id=text2></span>
                <br>
                <div class="crow">
                    <span id=longspan>Expiry</span>
                    <span>CVV</span>
                </div>
                <br>
                <div class="crow">
                    <div class="cinput">
                        <input name=expm id=expM type="text" min="1" max="12" step="1" pattern="[0-9]{2}" minlength=2 maxlength=2 required placeholder="XX">
                        <input name=expy id=expY type="text" min="2023" max="9999" step="1" pattern="[0-9]{4}" minlength=4 maxlength=4 required placeholder="XXXX">
                    </div>
                    <div class="cinput">
                        <input name=cvv type="password" minlength=3 maxlength=3 pattern="[0-9]+" required placeholder="XXX">
                    </div>
                </div>
                <br>
                <div class="crow">
                    <div class="cinput">
                        <span>Name on Card</span>
                    </div>
                </div>
                <br>
                <div class="crow">
                    <div class="cinput">
                        <input name=longboi id=longboi type="text" placeholder="John Doe">
                    </div>
                </div>
            </div>
            <div class="cardright">
                <h1>Order Subtotal</h1>
                <br>
                <div class="subtotal">
                    <p id=title0>Item</p>
                    <p id=price>Price</p>
                </div>
                <hr><br>
                <div class="subtotal">
                    <p id=title0>Hotel:</p>
                    <p id=title><?php echo "$hotelname" ?></p>
                    <p id=price>Rs. <?php echo number_format($hotelprice) ?></p>
                </div>
                <br>
                <?php

                if ($taxi == 400) {
                    $taxiname = "Hatchback";
                } else if ($taxi == 500) {
                    $taxiname = "Sedan";
                } else if ($taxi == 600) {
                    $taxiname = "SUV";
                }

                if ($taxi != 0)
                    echo "
                <div class=subtotal>
                    <p id=title0>Taxi:</p>
                    <p id=title>$taxiname</p>
                    <p id=price>Rs. $taxi</p>
                </div>
                ";
                $total = number_format($hotelprice + $taxi);
                echo "
                <br><br><br><br><br><br><hr><br>
                <div class=subtotal>
                    <p id=title0>Total:</p>
                    <p id=price>Rs. $total</p>
                </div>
                ";
                ?>
                <br>
                <button id=paynow type=submit>Pay Now</button>
            </div>
        </form>
    </div>
</body>

</html>