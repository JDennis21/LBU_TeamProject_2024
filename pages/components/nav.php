<nav>
    <div class="left">
        <a href="/LBU_TeamProject_2024/pages/home/index.php">LOGO</a>
    </div>
    <div class="middle">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#">TOOLS</a></li>
            <li><a href="#">CONTACT</a></li>
        </ul>
    </div>
    <div class="right">
        <ul>
            <?php
            if (basename($_SERVER['PHP_SELF']) === "climateControl.php") {
                ?>
                <li><a href="/LBU_TeamProject_2024/pages/auth/signOut.php">SIGN OUT</a></li>
            <?php
            } else if (isset($_SESSION["username"])) {
            ?>
                <li><a href="/LBU_TeamProject_2024/pages/climateControl/climateControl.php">Your Account</a></li>
            <?php
            } elseif (basename($_SERVER['PHP_SELF']) === "loginForm.php") {
                ?>
                <li><a href="/LBU_TeamProject_2024/pages/auth/signup/signupForm.php">SIGNUP</a></li>
                <?php
            } elseif (basename($_SERVER['PHP_SELF']) === "signupForm.php") {
                ?>
                <li><a href="/LBU_TeamProject_2024/pages/auth/login/loginForm.php">LOGIN</a></li>
                <?php
            } else {
                ?>
                <li><a href="/LBU_TeamProject_2024/pages/auth/login/loginForm.php">LOGIN</a></li>
                <li><a href="/LBU_TeamProject_2024/pages/auth/signup/signupForm.php">SIGNUP</a></li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>
<div class="circleBackground"></div>