<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="heat.js"></script>

    <title> Screener </title>
<body>
<div class="scre">
    <h1> SCREENER </h1>
</div>
<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>

<div class="searchcontainer">
<form name="form" action="" method="get">
        <label for="search">
            <input type="text" id="search" name="search" placeholder="Search Ticker                         &#x1F50E" class="searchbox">
            <br>
            <button class="searchbutton">submit</button>
        </label>
</form>
</div>

<form name="filter" action="" method="post">
    <br>
    <label for="price">  Price:  </label>
    <select id="price" name="tickprice">
        <option value="" disabled selected>Choose option</option>
        <option value="50"> Less than 50 </option>
        <option value="200"> Less than 200 </option>
        <option value="1000"> Less than 1000 </option>
    </select>
    <br>
    <label for="volume">  Volume:  </label>
    <select id="volume" name="tickvolume">
        <<option value="" disabled selected>Choose option</option>
        <option value="100000"> Under 100k </option>
        <option value="500000"> Under 500k </option>
        <option value="1000000"> Under 1M </option>
    </select>
    <br>
    <label for="exchange">  Exchange:  </label>
    <select id="exchange" name="tickexchange">
        <option value="" disabled selected>Choose option</option>
        <option value="NASDAQ"> NASDAQ </option>
        <option value="NYSE"> NYSE </option>
    </select>
    <br>
    <label for="sector">  Sector:  </label>
    <select id="sector" name="ticksector">
        <option value="" disabled selected>Choose option</option>
        <option value="Technology"> Technology </option>
        <option value="Financial"> Financial </option>
        <option value="Healthcare"> Healthcare </option>
    </select>
    <br>
    <label for="limit">  Limit:  </label>
    <select id="limit" name="lim">
        <option value="" disabled selected>Choose option</option>
        <option value="5"> 5 </option>
        <option value="50"> 50 </option>
        <option value="100"> 100 </option>
        <option value="200"> 200 </option>
        <option value="400"> 400 </option>
        <option value="500"> 500 </option>
    </select>
    <br>
    <br>
    <button class="filbutton">submit</button>
    <br>
</form>


<?php
$key = "351008321d00cfb13885a80cb15d293b";
$sub = "";
if(!empty($_POST['tickprice'])){
    if(strlen($sub) === 0){
        $sub = '&' . 'priceLowerThan=' . $_POST['tickprice'];
    }
    else{
        $sub = $sub . '&' . 'priceLowerThan=' . $_POST['tickprice'];
    }
}
if(!empty($_POST['tickvolume'])){
    if(strlen($sub) === 0){
        $sub = '&' . 'volumeLowerThan=' . $_POST['tickvolume'];
    }
    else{
        $sub = $sub . '&' . 'volumeLowerThan=' . $_POST['tickvolume'];
    }
}
if(!empty($_POST['tickexchange'])){
    if(strlen($sub) === 0){
        $sub = '&' . 'exchange=' . $_POST['tickexchange'];
    }
    else{
        $sub = $sub . '&' . 'exchange=' . $_POST['tickexchange'];
    }
}
if(!empty($_POST['ticksector'])){
    if (strlen($sub) ===0){
        $sub = '&' . 'sector=' . $_POST['ticksector'];
    }
    else{
        $sub = $sub . '&' . 'sector=' . $_POST['ticksector'];
    }

}
if(!empty($_POST['lim'])){
    if (strlen($sub) ===0){
        $sub = '&' . 'limit=' . $_POST['lim'];
    }
    else{
        $sub = $sub . '&' . 'limit=' . $_POST['lim'];
    }

}

if(strlen($sub) === 0) {
    if (isset($_GET['search']) and strlen($_GET['search']) != 0) {
        $url = "https://financialmodelingprep.com/api/v3/profile/" . $_GET['search'] . '?apikey=' . $key;
    } else {
        $url = "https://financialmodelingprep.com/api/v3/stock-screener?&betaMoreThan=1&exchange=NASDAQ,NYSE&dividendMoreThan=0&country=US&apikey=" . $key;
    }
    curl_method($url);
}

else{
    $url = "https://financialmodelingprep.com/api/v3/stock-screener?&betaMoreThan=1" . $sub;
    $url = $url . '&dividendMoreThan=0&country=US' . '&apikey=' . $key;
    curl_method($url);
}
?>



<?php
function curl_method($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($result, true);
    $size = count($result);

    if (isset($_GET['search']) and strlen($_GET['search']) !== 0){
        display_data($size,$result, 'volAvg', 'mktCap');
    }
    else{
        display_data($size,$result, 'volume', 'marketCap');
    }
}
?>

<?php
function display_data($size, $result, $vol, $marcap)
{
    if (isset($result)){

    ?>
    <div class="stock">
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

                for ($i = 0; $i < $size; $i++) {
                    $symbol = $result[$i]['symbol'];
                    $sector = $result[$i]['sector'];
                    $company = $result[$i]['companyName'];
                    $price = $result[$i]['price'];
                    $volume = $result[$i][$vol];
                    $cap = $result[$i][$marcap];

                    echo("<td class='ticker'><strong> <a href='graph.php?ticker=$symbol'> $symbol </a> </strong></td>");
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
        </div>
    <?php
}
    else{
        echo "something went wrong";
    }
}
?>


</body>
</html>

