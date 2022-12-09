<!DOCTYPE html>
<html lang="en" ; style = "background-image: url('thisBlue1.png');">
<head>
    <meta charset="utf-8">
    <link rel = "stylesheet" href = "heatStyle.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="heat.js"></script>

    <title> Screener </title>

    <h1 style = "position: center"> Chart </h1>

<div id="mySidepanel" class="sidePanel">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="login.php">Log in</a>
    <a href="index.php">Home</a>
    <a href="news.php">News</a>
    <a href="screener.php">Screener</a>
</div>

<button class="openbtn" onclick="openNav()">&#9776; Toggle Options</button>
<?php
$key = "351008321d00cfb13885a80cb15d293b";
$url = "https://financialmodelingprep.com/api/v3/historical-price-full/" . $_GET['ticker'] . '?serietype=line' . '&apikey=' . $key;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

$result = json_decode($result, true);
$size = count($result['historical']);
echo '<pre>';
?>

<?php


$dataPoints = array();
for($i = 0; $i < $size; $i++){
    $phpDate = date($result['historical'][$i]['date']);
    $phpTimestamp = strtotime($phpDate);
    $javaScriptTimestamp = $phpTimestamp * 1000;
    array_push($dataPoints, array("x" => $javaScriptTimestamp, "y" => $result['historical'][$i]['close']));
}

?>
        <p style = "position: center; font-size: 30px; color: lightgray" ;>
            Drag on the area you want to zoom into on the graph and refresh to zoom all the way back out.
            In the top right if you just want to drag between dates you can select the drag tool and do so.</p>
    <script>
            let data = <?php echo json_encode($dataPoints) ?>;
            window.onload = function() {
                for(let i = 0;i < <?php echo $size?>;i++){
                data[i]['x'] = new Date(data[i]['x']);
            }

            let chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark1",
                zoomEnabled: true,
                title: {
                    text: "<?php echo $_GET['ticker']?> Price"
                },
                axisY: {
                    title: "Price in USD",
                    titleFontSize: 24,
                    prefix: "$"
                },
                data: [{
                    type: "line",
                    yValueFormatString: "$#,##0.00",
                    dataPoints: data
                }]
            });
            chart.render();
        }
    </script>
</head>
<body>
<div id="chartContainer"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>