<?php
include '../../pages/connection.php';
global $connection;

if (!isset($_SESSION['username'])) {
    header("location: ../pages/login/loginForm.php");
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
    <nav>
        <div class="logo">
            <a href="../homePage/homePage.php">logo</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../signOut.php">Sign Out</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">

    </div>
    <div class="footer">

    </div>
</div>
</body>
</html>
