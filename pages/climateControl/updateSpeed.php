<?php
include_once '../../pages/connection.php';
global $connection;


$query = "DELETE FROM fan";
mysqli_execute_query($connection, $query);

$sliderValue = $_POST['sliderValue'];

$query = "INSERT INTO teamproject.`fan` (speed) VALUES (?)";

$stmt = $connection->prepare($query);
$stmt->bind_param("i",$sliderValue);

$stmt->execute();
$stmt->close();
