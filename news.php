<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="heat.js"></script>

    <title> NEWS </title>
<body>
<h1>HEAT.NET NEWS</h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="#">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>


<?php
$key = "NZV999OQVDUJ6N1W";
$url = "https://www.alphavantage.co/query?function=NEWS_SENTIMENT&topics=financial_markets, technology, ipo, earnings, finance&sort=LATEST&apikey=".$key;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result, true);
echo '<pre>';
$entries = $result["items"];
?>

<div class="newstable">
<table>
    <tr>
        <?php
        for($i=1;$i<$entries;$i++) {
            $title = $result["feed"][$i]["title"];
            $news_url = $result["feed"][$i]["url"];
            echo("<td><strong> <a href=$news_url> $title </a> </strong></td>");
            echo("<tr></tr>");
        }
        ?>
    </tr>
</table>
</div>