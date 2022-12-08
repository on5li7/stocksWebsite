<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK LOG IN</title>
<body>
<h1> LOG IN </h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>
<div class = "loginFieldSet">
<fieldset>
    <h1>Log In to HEAT.NET</h1>
    <label>
        <input type="text" name="username" placeholder="Enter Username"> </label>
    <br>
    <br>
       <label> <input type="text" name="password" placeholder="Enter Password">
    </label>
    <br>
    <br>
    <a href="">Forgot Password?</a>
    <br>
    <a href="createAccount.php">Create an Account!</a>
    <br>
    <br>
    <button type="submit" onclick="location.href='index.php'">Log In</button>
</fieldset>
</div>



</body>
</html>
