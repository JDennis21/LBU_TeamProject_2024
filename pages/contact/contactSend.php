<?php
include '../../pages/connection.php';
global $connection;

$nameErr = "";
$emailErr = "";
$messageErr = "";
$successMessage = "";

$name = "";
$email = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = $_POST["message"];
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $message = mysqli_real_escape_string($connection, $message);

        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

        if (mysqli_query($connection, $sql)) {
            $successMessage = "FORM SUBMITTED SUCCESSFULLY";
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }
}
?>