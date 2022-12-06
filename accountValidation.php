<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK ACCOUNT VALIDATION</title>
<body>
<h1>HEAT.NET ACCOUNT VALIDATION</h1>
<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>

<br>
<br>

<?php
$name = $username = $password = "";
$nameErr = $usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        echo $nameErr;
        exit();
    }
    else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Name must only have letters and white space";
            echo $nameErr;
            exit();
        }
    }
    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
        echo $usernameErr;
        exit();
    }
    else {
        $username = test_input($_POST["username"]);
        if (!preg_match('/^\w{5,10}$/', $username)) {
            $usernameErr = "Username must be alphanumeric and between a length of 5 and 10";
            echo $nameErr;
            exit();
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
        echo $nameErr;
        exit();
    }
    else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters";
            echo $passwordErr;
        }
        if (!preg_match('@[A-Z]@', $password)) {
            $passwordErr = "Password must have at least one uppercase letter";
            echo $passwordErr;
        }
        if (!preg_match('@[0-9]@', $password)) {
            $passwordErr = "Password must have at least one number";
            echo $passwordErr;
        }
        if (!preg_match('@[a-z]@', $password)) {
            $passwordErr = "Password must have at least one lowercase letter";
            echo $passwordErr;
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}
?>
</body>
</html>

