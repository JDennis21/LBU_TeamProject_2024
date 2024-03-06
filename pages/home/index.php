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
<div class="main">
    <?php include '../components/nav.php'; ?>
    <div class="content">

    </div>
    <?php include '../components/footer.html'; ?>
</div>
</body>
</html>