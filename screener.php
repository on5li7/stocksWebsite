<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="heat.js"></script>

    <title> Screener </title>
<body>
<h1>Heat Screener</h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
    <a href="settings.php">Settings</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>

<?php
$key = "351008321d00cfb13885a80cb15d293b";
$url = "https://financialmodelingprep.com/api/v3/stock-screener?&betaMoreThan=1&exchange=NASDAQ,NYSE&dividendMoreThan=0&limit=100&country=US&apikey=".$key;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result, true);
echo '<pre>';
$size = count($result);
?>

<?php
if (isset($result)){
    ?>
    <table id="customers">
        <tr>
            <th> Ticker </th>
            <th> Sector </th>
            <th> Company </th>
            <th> Price </th>
            <th> Avg Volume </th>
            <th> Market Cap </th>
        </tr>

        <tr>
            <?php
            for($i=0;$i<$size;$i++) {
                $symbol = $result[$i]['symbol'];
                $sector = $result[$i]['sector'];
                $company = $result[$i]['companyName'];
                $price = $result[$i]['price'];
                $volume = $result[$i]['volume'];
                $cap = $result[$i]['marketCap'];

                echo("<td><strong>  $symbol </strong></td>");
                echo("<td><strong> $sector </strong></td>");
                echo("<td><strong> $company </strong></td>");
                echo("<td><strong> $price </strong></td>");
                echo("<td><strong> $volume </strong></td>");
                echo("<td><strong> $cap </strong></td>");
                echo("<tr></tr>");
            }
            ?>
        </tr>
    </table>

    <?php
}

else{
    echo "something went wrong";
}
?>


</body>
</html>

