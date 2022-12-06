<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK ACCOUNT CREATION</title>
<body>
<h1>HEAT.NET CREATE AN ACCOUNT</h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>
<div class = "createFieldSet">
    <fieldset>
        <h1>Create an Account</h1>
        <label>
            <input type="text" name="name" placeholder="Enter Full Name"> </label>
        <label>
            <br>
            <br>
            <input type="text" name="username" placeholder="Enter Username"> </label>
        <br>
        <br>
        <label> <input type="text" name="password" placeholder="Enter Password">
        </label>
        <br>
        <br>
        <button type="submit" onclick="location.href='login.php'">Create Account</button>
    </fieldset>
</div>

</body>
</html>
