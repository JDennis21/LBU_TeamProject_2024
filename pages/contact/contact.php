<?php
include '../../pages/connection.php';
global $connection;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/contact.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<?php include '../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <?php
        /*
         * If the session error isset() set the variable to "noMargin" else the variable equals ""
         *
         * This is used to remove the margin on form inputs when an error is printed to help with
         * formatting
        */
        $inputClass = isset($_SESSION["error"]) ? 'noMargin' : '';
        ?>
        <div class="contactForm">
            <form action="../../auth/login/contact.php" method="post">
                <h2 style="font-weight: bolder;">GET IN TOUCH</h2>
                <div class="inputRow">
                    <input placeholder="NAME" type="text" name="name" id="contactName" value="<?php echo $_SESSION['nameAttempt'] ?? '' ?>">
                    <input placeholder="EMAIL" type="email" name="email" id="contactEmail" value="<?php echo $_SESSION['emailAttempt'] ?? '' ?>">
                </div>
                <textarea placeholder="MESSAGE" name="message" id="contactMessage" class="<?php echo $inputClass; ?>"><?php echo $_SESSION['messageAttempt'] ?? '' ?></textarea>
                <?php
                if (isset($_SESSION["error"])) {
                    echo '<p class="error">*' . $_SESSION["error"] . '</p>';
                }
                ?>
                <div>
                    <input type="submit" value="SUBMIT">
                </div>
            </form>
        </div>
        <div class="contactBanner">
            <h1>Contact Us</h1>
            <h3 id="address">Address</h3>
            <h3>Phone</h3>
            <h3>Email</h3>
            <h3>Website</h3>
        </div>
    </div>
</div>
<div class="banner">
    <div class="banner-text">READY FOR A QUOTE?</div>
    <a href="/LBU_TeamProject_2024/pages/contact/contact.php" class="banner-button">CONTACT</a>
</div>
<?php include '../components/footer.html'; ?>
</body>
</html>
