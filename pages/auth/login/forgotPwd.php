<?php
include '../../connection.php';
//If the user is already signed in proceed to climateControl.php
if (isset($_SESSION['username'])) {
    header("Location: ../../climateControl/climateControl.php");
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
            $inputClass = isset($_SESSION["error"]) ? 'noMargin' : '';
            ?>
            <div class="loginForm">
                <h2>RECOVER</h2>
                <form action="../../auth/login/forgot.php" method="post">
                    <label for="forgotUsername">EMAIL OR USERNAME</label>
                    <input type="text" name="username" id="forgotUsername"
                           value="">
                    <?php
                    if (isset($_SESSION["error"])) {
                        echo '<p class="error">*' . $_SESSION["error"] . '</p>';
                    }
                    ?>
                    <div style="text-align: center">
                        <input type="submit" value="RECOVER">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include '../../components/footer.html';
//Empty $_SESSION["error"] so that the error message is gone after a page refresh
unset($_SESSION["error"]);
?>
</body>
</html>