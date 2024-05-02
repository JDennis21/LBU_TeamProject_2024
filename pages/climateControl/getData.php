<?php
include '../../pages/connection.php';
global $connection;

$query = "SELECT temperature FROM temp";
$result = mysqli_query($connection, $query);
$totalTemp = 0;
$count = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    $totalTemp += $row['temperature'];
}

$averageTemp = $totalTemp / $count;

$query = "SELECT humidity FROM humidity";
$result = mysqli_query($connection, $query);
$totalHumid = 0;
$count = mysqli_num_rows($result);

while ($row = mysqli_fetch_assoc($result)) {
    $totalHumid += $row['humidity'];
}

$averageHumid = $totalHumid / $count;

$data = array(
    'temperature' => $averageTemp,
    'humidity' => $averageHumid
);

header('Content-Type: application/json');
echo json_encode($data);

