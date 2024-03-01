<?php
include '../connection.php';
/* If the user is already signed in proceed to climateControl.php */
if (isset($_SESSION['username'])) {
    header("location: ../../pages/climateControl/climateControl.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/login.css" rel="stylesheet" type="text/css" />
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
                <li><a href="../signup/signupForm.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="formContainer">
            <?php
            /*
             * If the session error isset() set the variable to "noMargin" else the variable equals ""
             *
             * This is used to remove the margin on form inputs when an error is printed to help with
             * formatting
            */
            $inputClass = isset($_SESSION["error"]) ? 'noMargin' : '';
            ?>
            <div class="loginForm">
                <h2>Login</h2>
                <form action="../login/login.php" method="post">
                    <label for="loginUsername">Username</label>
                    <input type="text" name="username" id="loginUsername"
                           value="<?php echo $_SESSION['usernameAttempt'] ?? '' ?>">
                    <label for="loginPassword">Password</label>
                    <input type="password" name="password" id="loginPassword" class="<?php echo $inputClass; ?>">
                    <?php
                    if (isset($_SESSION["error"])) {
                        echo '<p class="error">*' . $_SESSION["error"] . '</p>';
                    }
                    ?>
                    <input type="submit" value="Login">
                    <div class="forgotEmail">
                        <a href="#">Forgot email?</a>
                    </div>
                </form>
            </div>
            <div class="signupBox">
                <p>Don't have an account with us? <a href="../signup/signupForm.php">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
<?php
/* Empty $_SESSION["error"] so that the error message is gone after a page refresh */
unset($_SESSION["error"]);
?>
</body>
</html>