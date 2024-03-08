<?php include_once "../../connection.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/signup.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<?php include '../../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <div class="formContainer">
            <?php
            /*
             * If the session error isset() set the variable to "noMargin" else the variable equals ""
             *
             * This is used to remove the margin on form inputs when an error is printed to help with
             * formatting
            */
            $usernameClass = isset($_SESSION["usernameErr"]) ? 'noMargin' : '';
            $nameClass = isset($_SESSION["nameErr"]) ? 'noMargin' : '';
            $emailClass = isset($_SESSION["emailErr"]) ? 'noMargin' : '';
            $passClass = isset($_SESSION["passErr"]) ? 'noMargin' : '';
            ?>
            <div class="signupForm">
                <h2>SIGN UP</h2>
                <form action="../../auth/signup/registerUser.php" method="post">
                    <label for="signupUsername">USERNAME</label>
                    <!-- Assign class to .noMargin if an error isset() and set the value to the last attempt -->
                    <input type="text" name="username" id="signupUsername" class="<?php echo $usernameClass; ?>"
                           value="<?php echo $_SESSION['usernameAttempt'] ?? '' ?>">
                    <?php
                    if (isset($_SESSION["nameErr"])) {
                        echo '<p class="error">*' . $_SESSION["usernameErr"] . '</p>';
                    }
                    ?>
                    <label for="signupName">FULLNAME</label>
                    <!-- Assign class to .noMargin if an error isset() and set the value to the last attempt -->
                    <input type="text" name="fullName" id="signupName" class="<?php echo $nameClass; ?>"
                           value="<?php echo $_SESSION['nameAttempt'] ?? '' ?>">
                    <?php
                    if (isset($_SESSION["nameErr"])) {
                        echo '<p class="error">*' . $_SESSION["nameErr"] . '</p>';
                    }
                    ?>
                    <label for="signupEmail">EMAIL</label>
                    <!-- Assign class to .noMargin if an error isset() and set the value to the last attempt -->
                    <input type="email" name="email" id="signupEmail" class="<?php echo $emailClass; ?>"
                           value="<?php echo $_SESSION['emailAttempt'] ?? '' ?>">
                    <?php
                    if (isset($_SESSION["emailErr"])) {
                            echo '<p class="error">*' . $_SESSION["emailErr"] . '</p>';
                    }
                    ?>
                    <label for="signupPassword">PASSWORD</label>
                    <!-- Assign class to .noMargin if an error isset() and set the value to the last attempt -->
                    <input type="password" name="password" id="signupPassword" class="<?php echo $passClass; ?>">
                    <?php
                    if (isset($_SESSION["passErr"])) {
                        echo '<p class="error">*' . $_SESSION["passErr"] . '</p>';
                    }
                    ?>
                    <div>
                        <input type="submit" value="SIGN UP">
                        <?php
                        //Error message that will be echoed if the database cannot be accessed
                        if (isset($_SESSION["status"])) {
                        echo '<p class="error">*' . $_SESSION["status"] . '</p>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="sideBar">
            <div class="loginBox">
                <p>Already have an account with us?</p>
                <a href="../login/loginForm.php">LOGIN</a>
            </div>
        </div>
    </div>
</div>
<?php
include '../../components/footer.html';
$_SESSION = array();
?>
</body>
</html>
