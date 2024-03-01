<?php
include '../connection.php';
global $connection;

/*Set the attempted username and password*/
$username = $_SESSION["usernameAttempt"] = $_POST["username"];
$userPass = $_POST["password"];

/*Get all users from users table where the username and password match the user input*/
$query = "SELECT * FROM users WHERE username = '$username' and userPass = '" . md5($userPass) . "';";

$result = mysqli_query($connection, $query);

/*
 * If a matching user is found in the database set $_SESSION["username"] and proceed to climateControl.php,
 * else set the error message and return to loginForm.php.
*/
if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['username'] = $username;
    header("location: ../../pages/climateControl/climateControl.php");
} else {
    $_SESSION['error'] = 'Username or password is incorrect';
    header("location: {$_SERVER['HTTP_REFERER']}");
}

