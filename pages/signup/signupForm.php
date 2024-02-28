<?php include_once "../../pages/connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../../css/signup.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<div class="main">
    <nav>
        <div class="logo">
            <a href="../homePage.php">logo</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../login/loginForm.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="formContainer">
            <?php
            $usernameClass = isset($_SESSION["nameErr"]) ? 'noMargin' : '';
            $emailClass = isset($_SESSION["emailErr"]) ? 'noMargin' : '';
            $passClass = isset($_SESSION["passErr"]) ? 'noMargin' : '';
            ?>
            <div class="signupForm">
                <h2>Sign Up</h2>
                <form action="../signup/registerUser.php" method="post">
                    <label for="signupUsername">Username</label>
                    <input type="text" name="username" id="signupUsername" class="<?php echo $usernameClass; ?>">
                    <?php
                    if (isset($_SESSION["emailErr"])) {
                        echo '<p class="error">*' . $_SESSION["nameErr"] . '</p>';
                    }
                    ?>
                    <label for="signupEmail">Email</label>
                    <input type="email" name="email" id="signupEmail" class="<?php echo $emailClass; ?>">
                    <?php
                    if (isset($_SESSION["emailErr"])) {
                            echo '<p class="error">*' . $_SESSION["emailErr"] . '</p>';
                        }
                    ?>
                    <label for="signupPassword">Password</label>
                    <input type="password" name="password" id="signupPassword" class="<?php echo $passClass; ?>">
                    <?php
                    if (isset($_SESSION["emailErr"])) {
                        echo '<p class="error">*' . $_SESSION["passErr"] . '</p>';
                    }
                    ?>
                    <input type="submit" value="Sign Up">
                </form>
            </div>
            <div class="loginBox">
                <p>Already have an account with us? <a href="../login/loginForm.php">Login</a></p>
            </div>
        </div>
    </div>
</div>
<?php
$_SESSION = array();
?>
</body>
</html>
