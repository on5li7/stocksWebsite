<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK ACCOUNT VALIDATION</title>
<body>
<h1>ACCOUNT VALIDATION</h1>
<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>

<br>
<br>

<?php
$name = $username = $password = "";
$nameErr = $usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "<p class='error'> Name is required</p>";
        echo $nameErr;
        exit();
    }
    else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "<p class='error'>Name must only have letters and white space</p>";
            echo $nameErr;
            exit();
        }
    }
    if (empty($_POST["username"])) {
        $usernameErr = "<p class='error'>Username is required</p>";
        echo $usernameErr;
        exit();
    }
    else {
        $username = test_input($_POST["username"]);
        if (!preg_match('/^\w{5,10}$/', $username)) {
            $usernameErr = "<p class='error'>Username must be alphanumeric and between a length of 5 and 10</p>";
            echo $nameErr;
            exit();
        }
    }
    if (empty($_POST["password"])) {
        $passwordErr = "<p class='error'>Password is required</p>";
        echo $nameErr;
        exit();
    }
    else {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 8) {
            $passwordErr = "<p class='error'>Password must be at least 8 characters</p>";
            echo $passwordErr;
            echo "<br>\n";
        }
        if (!preg_match('@[A-Z]@', $password)) {
            $passwordErr = "<p class='error'>Password must have at least one uppercase letter</p>";
            echo $passwordErr;
            echo "<br>\n";
        }
        if (!preg_match('@[0-9]@', $password)) {
            $passwordErr = "<p class='error'>Password must have at least one number</p>";
            echo $passwordErr;
            echo "<br>\n";
        }
        if (!preg_match('@[a-z]@', $password)) {
            $passwordErr = "<p class='error'>Password must have at least one lowercase letter</p>";
            echo $passwordErr;
        }
        if (strlen($password) >= 8 && preg_match('@[A-Z]@',$password) && preg_match('@[0-9]@',$password)
            && preg_match('@[a-z]@',$password)) {
            echo "<p id='accCreate'>Your account has been created! Welcome $username. You may log in now.</p>";
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

