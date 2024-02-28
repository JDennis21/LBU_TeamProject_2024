<?php include_once "../pages/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/homePage.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<div class="main">
    <nav>
        <div class="logo">
            <a href="../pages/homePage.php">logo</a>
        </div>
        <div class="menu">
            <ul>
                <?php
                if (isset($_SESSION["username"])) {
                    echo '<li><a href="../pages/climateControl.php">Your Account</a></li>';
                } else {
                    echo '<li><a href="../pages/signup/signupForm.php">Sign Up</a></li>';
                    echo '<li><a href="../pages/login/loginForm.php">Login</a></li>';
                }
                ?>
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