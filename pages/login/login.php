<?php
include '../connection.php';
global $connection;

$userEmail = $_POST["email"];
$userPass = $_POST["password"];

$query = "SELECT * FROM users WHERE userEmail = '$userEmail' and userPass = '" . md5($userPass) . "';";

$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['user'] = $userEmail;
    header("location: ../../pages/climateControl.php");
} else {
    $_SESSION['error'] = 'Username or password is incorrect';
    header("location: {$_SERVER['HTTP_REFERER']}");
}

