<?php
include '../connection.php';
global $connection;

/**
 * Trim a string and encode special characters
 *
 * This function trims whitespace from the beginning and end of the string,
 * removes backslashes, and then encodes special characters to HTML entities
 * to ensure that user input is safe for the database
 *
 * @param string $inputString The string that is to be cleaned
 * @return string The trimmed and encoded output string
 */
function cleanString(string $inputString): string
{
    return htmlspecialchars(stripcslashes(trim($inputString)));
}

/* Clean the user input before processing and assign it to a session so that it can be used for form memory */
$_SESSION["usernameAttempt"] = cleanString($_POST["username"]);
$_SESSION["emailAttempt"] = cleanString($_POST["email"]);
$_SESSION["passwordAttempt"] = cleanString($_POST["password"]);

/**
 * Checks if any of the user inputs have been left empty
 *
 * This function checks if any of the user inputs have been left empty. It will run
 * through each input even if the previous if statement was false and generate an error
 * message for each.
 *
 * @return bool Returns true if all inputs pass, if any are left empty, returns false
 */
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


/**
 * Checks if all the user inputs meet the required conditions
 *
 * This function checks if any of the user inputs do not meet the required conditions.
 * It will run through each input even if the previous if statement evaluated false and
 * generate an error message for each.
 *
 * @return bool Returns true if all inputs pass, if any are left empty, returns false
 */
function checkConditions(): bool
{
    $valid = true;

    $username = $_SESSION["usernameAttempt"];
    $email = $_SESSION["emailAttempt"];
    $password = $_SESSION["passwordAttempt"];

    /* Ensures length between 6 and 20 characters */
    if (6 > strlen($username) || strlen($username) > 20) {
        $_SESSION["nameErr"] = "Username must be between 6 and 20 characters";
        $valid = false;
    }
    /* Ensures that the username only contains letters and numbers */
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $_SESSION["nameErr"] = "No special characters allowed";
        $valid = false;
    }
    /* Validate the input is a valid email address */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["emailErr"] = "Email is not valid";
        $valid = false;
    }
    /* Ensures the password is of the correct length, contains 1 lowercase, uppercase and number */
    if (!preg_match("/^.*(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*.{8,}$/", $password)) {
        $_SESSION["passErr"] = "Password must be greater than 8 characters and have at least 1 uppercase, lowercase
         and number ";
        $valid = false;
    }
    return $valid;
}

/*
 * Run both functions individually so error messages are generated. checkNotEmpty() is run second to ensure that
 * empty error messages are not overwritten by conditional ones.
 */
$check1 = checkConditions();
$check2 = checkNotEmpty();
/* Checks if inputs passed both checks, if true proceed to insert data into database, else return to loginForm.php */
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

    /* If data is successfully inserted into database send the user to climateControl.php. Else set error message */
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
