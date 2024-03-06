<nav>
    <div class="logo">
        <a href="/LBU_TeamProject_2024/pages/home/index.php">LOGO</a>
    </div>
    <div class="menu">
        <ul>
            <?php
            // If the user is logged in display "Your Account" link, else normal nav
            if (isset($_SESSION["username"])) {
                ?>
                <li><a href="/LBU_TeamProject_2024/pages/climateControl/climateControl.php">Your Account</a></li>
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