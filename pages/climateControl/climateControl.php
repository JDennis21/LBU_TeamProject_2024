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
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/climateControl.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<?php include '../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <div class="banner">
            <div class="banner-text">READY FOR A QUOTE?</div>
            <a href="/LBU_TeamProject_2024/pages/contact/contact.php" class="banner-button">CONTACT</a>
        </div>
    </div>
</div>
<?php include '../components/footer.html'; ?>
</body>
</html>
