<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journeys - Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <?php
    error_reporting(E_ERROR | E_PARSE);
    $con = mysqli_connect('localhost', 'root', '', 'journeys');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $value = $_POST['value'];

    if (!$con) {
        die("Database connection failed." . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE email = '$email' and pass = '$password'";
    $result = $con->query($sql);
    $count = mysqli_num_rows($result);
    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    session_start();
    if (isset($email, $password)) {
        session_start();
        $_SESSION["username"] = $json[0]['name'];
        $_SESSION["userid"] = $json[0]['id'];

        if ($count == 1) {
            $success = "<p style='color:green;'>Login successful. Redirecting to homepage.</p>";
            header("refresh: 3; url=home.php");
        } else {
            $success = "<p style='color:red;'>Login failed. Invalid email address or password.</p>";
        }
    }
    //Close
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
    <form action="login.php" id="form" onsubmit="return validation()" method=POST>
        <div class="logwin">
            <div class="logleft">
                <h1>Login to your account</h1>
                <?php echo $success ?>
                <hr>
                <div class="input">
                    <span>Email address</span>
                    <br>
                    <input type="text" name="email" id="em" required>
                </div>
                <div class="input">
                    <span>Password</span>
                    <br>
                    <input type="password" name="password" id="pw" required>
                </div>
                <span style="color: white;" id="text">Validation</span>
                <div class="logbtn">
                    <button name=login type=submit id="login" value=0>Login</button>
                </div>
            </div>
            <div class="logright">
                <h1>Not a Journeys member?</h1>
                <br>
                <div class="logbtn">
                    <a id="forgor" href="register.php">Click here to Register</a>
                </div>
                <br>
                <span>Making an account is quick, easy and free. Get access to all the cool features of our service by
                    signing up!</span>
            </div>
        </div>
    </form>
</body>

</html>