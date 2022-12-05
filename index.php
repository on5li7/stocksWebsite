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
    <a href="screener.php">Screener</a>
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

<div class = "floatUnderRightText">
    <p>Stock Market Heatmap</p></div>

<div class = "heatMapText">
<p>Finviz is one of the best stock market maps. This image is a link to the heatmap <br>
    Finviz provides. It allows you to view, search, and analyze market data for free <br>
    in a map or bubble format. It lets you see how a certain market, like the S&P 500, <br>
    performs. You can look at all markets in a given country or a worldview of global <br>
    markets.</p>
</div>

<a href="https://finviz.com/published_map.ashx?t=sec&st=&f=111722&i=sec_144876206">
    <img src="heatmap.png" alt="HEATMAP" class = "floatUnderRight" style = margin-top: "50px">
</a>

</body>
</html>


