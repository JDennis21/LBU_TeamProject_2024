<?php
include '../connection.php';
global $connection;

$username = $_POST["username"];
$userPass = $_POST["password"];

$query = "SELECT * FROM users WHERE username = '$username' and userPass = '" . md5($userPass) . "';";

$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['username'] = $username;
    header("location: ../../pages/climateControl.php");
} else {
    $_SESSION['error'] = 'Username or password is incorrect';
    header("location: {$_SERVER['HTTP_REFERER']}");
}

