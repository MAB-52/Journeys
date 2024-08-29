<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <script src="valid.js"></script>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];

    if (isset($dob)) {
        $dob2 = date("Y-m-d", strtotime($dob));
    }

    if (isset($name, $email, $password, $dob2)) {

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $con->query($sql);
        $count = mysqli_num_rows($result);
        $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($count == 0) {
            $sql = "INSERT INTO users VALUES('$name', '$email', '$password', '$phone', '$dob2', '')";
            $result = $con->query($sql);
            $success = "<p style='color:green';>Registered successfully! Redirecting to log in.</p>";
            header("refresh: 2; url=login.php");
        } else if ($count == 1) {
            $success = "<p style='color:red;'>A user by this email address already exists.</p>";
        } else {
            $success = "Unknown error.";
        }
    }
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
    <form id="form" action="register.php" onsubmit="return regvalidation()" method=POST>
        <div class="regwin">
            <div class="regleft">
                <h1>Create a Journeys account</h1>
                <?php echo $success ?>
                <hr>
                <div class="input">
                    <span>Name</span>
                    <br>
                    <input type="text" name="name" id="na" required>
                </div>
                <div class="input">
                    <span id=text2>Email address</span>
                    <br>
                    <input type="text" name="email" id="em" required>
                </div>
                <div class="input">
                    <span>Password</span>
                    <br>
                    <input type="password" name="password" id="pw" required>
                </div>
                <div class="input">
                    <span id=text3>Phone Number</span>
                    <br>
                    <input type="number" name="phone" id="ph" max="9999999999" required>
                </div>
                <span id=text4>Date of Birth</span>
                <div class="dob">
                    <input type="date" id=dob name=dob min="1900-01-01" max="2005-12-12" required>
                </div>
                <div class="regbtn">
                    <button type=submit id="reg">Register</button>
                </div>
            </div>
            <div class="regright">
                <span id="text"></span>
                <br>
                <h1>Already have an account?</h1>
                <br>
                <div class="logbtn">
                    <a id="forgor" href="login.php">Switch to Log In</a>
                </div>
                <br>
            </div>
        </div>
    </form>
    <br>
</body>

</html>