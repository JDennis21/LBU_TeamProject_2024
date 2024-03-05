<?php include_once "../pages/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/index.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<div class="main">
    <nav>
        <div class="logo">
            <a href="/pages/index.php">logo</a>
        </div>
        <div class="menu">
            <ul>
                <?php
                // If the user is logged in display "Your Account" link, else normal nav
                if (isset($_SESSION["username"])) {
                    echo '<li><a href="climateControl/climateControl.php">Your Account</a></li>';
                } else {
                    echo '<li><a href="signup/signupForm.php">Sign Up</a></li>';
                    echo '<li><a href="login/loginForm.php">Login</a></li>';
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