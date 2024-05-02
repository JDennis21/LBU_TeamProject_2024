<?php
include '../../pages/connection.php';
global $connection;

if (!isset($_SESSION['username'])) {
    header("location: ../../pages/auth/login/loginForm.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/climateControl.css" rel="stylesheet" type="text/css" />
    <title>Climate Control System</title>
</head>
<body>
<?php include '../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <div class="top">
            <div class="temperature">
                <div class="title">
                    <p>TEMPERATURE</p>
                </div>
                <div class="value">
                   <P id="temperature"></P>
                </div>
            </div>
            <div class="humidity">
                <div class="title">
                    <p>HUMIDITY</p>
                </div>
                <div class="value">
                    <p id="humidity"></p>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="speed">
                <div class="title">
                    <p>SPEED</p>
                </div>
                <div>
                    <input type="range" min="0" max="100" value="50" class="speed-slider" id="speedSlider">
                    <div class="speed-value" id="speedValue">50</div>
                    <button id="resetButton">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../components/footer.php'; ?>
<script>
    function updateTemperature() {
        $.ajax({
            type: 'POST',
            url: 'http://localhost:8081/LBU_TeamProject_2024/pages/climateControl/getData.php',
            dataType: 'json',
            success: function(result) {
                // Update the temperature display
                const temperature = result.temperature;
                const humidity = result.humidity;

                $('#temperature').text(temperature + '°C');
                $('#humidity').text(humidity + '%');
                console.log(temperature, humidity)
            },
            error: function() {
                console.log('Error fetching temperature data.');
            }
        });
    }
    updateTemperature();
    setInterval(updateTemperature, 5000);
</script>
<script src="climateControl.js"></script>
</body>
</html>
