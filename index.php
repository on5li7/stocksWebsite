<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatstyle.css">
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


<div id="mySidepanel" class="sidepanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Log in</a>
    <a href="#">Home</a>
    <a href="#">News</a>
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



</body>
</html>


