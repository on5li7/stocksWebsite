<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="heat.js"></script>

    <title> Settings </title>
<body>
<h1>Settings</h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>


<h2>Toggle Dark/Light Mode</h2>
<p>Click the button to toggle between dark and light mode for this page.</p>

<button onclick="myFunction()">Toggle dark mode</button>
<button onclick = "newFunction()">Toggle normal</button>

<script>
    function myFunction() {
        let element = document.body;
        element.classList.toggle("dark-mode");
    }

    function newFunction(){
        let element = document.body;
        element.classList.toggle("normal-mode");
    }
</script>

</body>
</html>
