<?php
$key = "fd3afeaba51db8c6f48b9d41fb27161c";
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

<!DOCTYPE HTML>
<html lang="en"; style = "background-image: url('thisBlue1.png');">
<head>
    <title> Graph </title>
        <p style = "position: center; font-size: 30px; color: lightgray";>
            Drag on the area you want to zoom into on the graph and refresh to zoom all the way back out.
            In the top right if you just want to drag between dates you can select the drag tool and do so.</p>
    <script>
        window.onload = function() {
            let data = <?php echo json_encode($dataPoints) ?>;
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