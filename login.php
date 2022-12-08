<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK LOG IN</title>
<body>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>


<form action="/index.php" method="post">
    <div class="loginform">
        <h1 class="loginheading">Log In</h1>
        <label>
            <input type="text" name="username" placeholder="USERNAME"> </label>
        <br>
           <label> <input type="text" name="password" placeholder="PASSWORD">
        </label>
        <br>
        <button type="submit" class="loginbutton"> LOG IN </button>
        <br>
        <br>
        <a href="createAccount.php" class="acc">Not registered? Create an Account!</a>
    </div>

</form>

</body>
</html>
