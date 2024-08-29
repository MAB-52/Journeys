<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Finalize</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');
    session_start();
    $ind = $_POST['hotInd'];
    $sql = "select * from hotels where id = '$ind'";
    $result = $con->query($sql);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $hotel = $json[0]['id'];

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
    <script src="valid.js"></script>
    <form id=form action="payment.php" method=POST onsubmit="return finalvalidation()">
        <input type="radio" name="taxi" id="t1" value="400" required>
        <input type="radio" name="taxi" id="t2" value="500">
        <input type="radio" name="taxi" id="t3" value="600">
        <input type="radio" name="taxi" id="t4" value="0">
        <input name=hotInd type="hidden" value="<?php echo $hotel ?>">
        <div class="bookwin">
            <div class="bookleft">
                <h1>Enter booking details</h1>
                <div class="binput">
                    <span>Adults</span>
                    <input name=guestsa type="number" min=1 max=10 value=1 required>
                    <span>Children</span>
                    <input name=guestsb type="number" min=0 max=10 value=0 required>
                </div>
                <span id=text></span>
                <div class="binput">
                    <span>From</span>
                    <input id=fDD name=fDD type="number" min=1 max=31 placeholder="D" value=<?php echo date('d')+1?> required>
                    <input id=fMM name=fMM type="number" min=1 max=12 placeholder="M" value=<?php echo date('m')+0?> required>
                    <input id=fYY name=fYY type="number" min=<?php echo date('Y')?> max=2024 placeholder="YYYY" value=<?php echo date('Y')?> required>
                </div>
                <div class="binput">
                    <span>To</span>
                    <input id=tDD name=tDD type="number" min=1 max=31 placeholder="DD" value=<?php echo date('d')+1?> required>
                    <input id=tMM name=tMM type="number" min=1 max=12 placeholder="MM" value=<?php echo date('m')+0?> required>
                    <input id=tYY name=tYY type="number" min=2023 max=2024 placeholder="YYYY" value=<?php echo date('Y')?> required>
                </div>
                <div class="binput">
                    <span id=pickups>Pickup point (optional)</span>
                    <input name=taxad id=pickup type="text" maxlength="100" placeholder="Enter pickup point for cab service (if required)">
                </div>
                <button id=payment type=submit>Continue to Payment</button>
            </div>
            <div class="bookright">
                <h1>Need a cab?</h1>
                <div class="tradio">
                    <div class="tchoice1">
                        <label for="t1">Hatchback<br><span>3-4 Passengers (+Rs. 400)</span></label>
                    </div>
                    <div class="tchoice2">
                        <label for="t2">Sedan<br><span>4-5 Passengers (+Rs. 500)</span></label>
                    </div>
                    <div class="tchoice3">
                        <label for="t3">SUV<br><span>6-7 Passengers (+Rs. 600)</span></label>
                    </div>
                    <div class="tchoice4">
                        <label for="t4">No, thanks<br><span>I don't need a cab</span></label>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>