<?php
include '../connection.php';
global $connection;

function trimString($string): string
{
    return htmlspecialchars(stripcslashes(trim($string)));
}

$_SESSION["usernameAttempt"] = trimString($_POST["username"]);
$_SESSION["emailAttempt"] = trimString($_POST["email"]);
$_SESSION["passwordAttempt"] = trimString($_POST["password"]);

function checkNotEmpty(): bool
{
    $valid = true;

    $username = $_SESSION["usernameAttempt"];
    $email = $_SESSION["emailAttempt"];
    $password = $_SESSION["passwordAttempt"];

    if (empty($username)) {
        $_SESSION["nameErr"] = "Username is required";
        $valid = false;
    }
    if (empty(filter_var($email, FILTER_SANITIZE_EMAIL))) {
        $_SESSION["emailErr"] = "Email is required";
        $valid = false;
    }
    if (empty($password)) {
        $_SESSION["passErr"] = "Password is required";
        $valid = false;
    }
    return $valid;
}

function checkConditions(): bool
{
    $valid = true;

    $username = $_SESSION["usernameAttempt"];
    $email = $_SESSION["emailAttempt"];
    $password = $_SESSION["passwordAttempt"];

    if (6 > strlen($username) || strlen($username) > 20) {
        $_SESSION["nameErr"] = "Username must be between 6 and 20 characters";
        $valid = false;
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION["nameErr"] = "No special characters allowed";
        $valid = false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emailErr"] = "Email is not valid";
        $valid = false;
    }
    if (!preg_match("/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*.{8,}$/", $password)) {
        $_SESSION["passErr"] = "Password must be greater than 8 characters and have at least 1 uppercase, lowercase
         and number ";
        $valid = false;
    }
    return $valid;
}

$check1 = checkConditions();
$check2 = checkNotEmpty();
if ($check1 && $check2) {
    $username = $_SESSION["usernameAttempt"];
    $email = $_SESSION["emailAttempt"];
    $password = md5($_SESSION["passwordAttempt"]);

    $query = "INSERT INTO teamproject.`users`
              (`username`, `userEmail`, `userPass`) 
              VALUES 
              (?, ?, ?)";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $_SESSION["username"] = $username;
        $stmt->close();
        header("location: ../../pages/climateControl.php");
    } else {
        $_SESSION["status"] = "Could not complete registration";
    }
} else {
    header("location: {$_SERVER['HTTP_REFERER']}");
}
