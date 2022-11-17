<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css">
    <script type="text/javascript" src="heat.js"></script>

    <title> HEAT STOCK SCANNER </title>
<body>
<h1>HEAT.NET STOCK SCREENER</h1>


<p class = "quote">
<?php
$quoteArray = file("quotes");
$quoteDisplay = array_rand($quoteArray);?>
<span><?php echo $quoteArray[$quoteDisplay];?></span>
</p>


<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="#">Screener</a>
    <a href="#">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>

<br>
<br>

<fieldset>
    <label>
        Search Ticker: <br>
        <input type="text" name="search" placeholder="search">
        <button>Submit</button>
    </label>
</fieldset>


<img src="thumb.png" alt="bull" class = "floatRight">
<img src="heatIntro.png" alt="introPic" class = "floatLeft">

<div class = "textBold">
    <p>Benefits Of Our Stock Screener</p> </div>

<div class = "textBenefits">
    <p>First and foremost, it saves you time, especially if you invest in smaller companies.<br>
        Sometimes finding information on these stocks is difficult.
        But with a stock <br> screener, you have an advantage because all information is updated as soon as it’s <br>available.</p>
</div>

</body>
</html>


