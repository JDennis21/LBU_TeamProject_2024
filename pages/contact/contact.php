<?php
global $nameErr, $emailErr, $messageErr, $successMessage;
include '../../pages/connection.php';
include 'contactSend.php';
global $connection;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/css/contact.css" rel="stylesheet" type="text/css" />
    <title>Contact</title>
</head>
<body>
<?php include '../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <div class="formContainer">
            <div class="contactForm">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h2>GET IN TOUCH</h2>
                    <div class="inputRow">
                        <!--suppress HtmlFormInputWithoutLabel -->
                        <input placeholder="NAME" type="text" name="name" id="contactName" value="<?php echo $_SESSION['nameAttempt'] ?? '' ?>">
                        <span class="error"><?php echo $nameErr; ?></span>
                        <!--suppress HtmlFormInputWithoutLabel -->
                        <input placeholder="EMAIL" type="email" name="email" id="contactEmail" value="<?php echo $_SESSION['emailAttempt'] ?? '' ?>">
                        <span class="error"><?php echo $emailErr; ?></span>
                    </div>
                    <!--suppress HtmlFormInputWithoutLabel -->
                    <textarea placeholder="MESSAGE" name="message" id="contactMessage"></textarea>
                    <span class="error"><?php echo $messageErr; ?></span>
                    <input type="submit" value="SUBMIT">
                    <span class="success"><?php echo $successMessage; ?></span>
                </form>

            </div>
            <div class="contactBanner">
                <div class="bannerHeader">
                    <h1>Contact Us</h1>
                </div>
                <div class="bannerContent">
                    <div class="bannerInfo">
                        <div class="circle"></div>
                        <h3>Address</h3>
                    </div>
                    <div class="bannerInfo">
                        <div class="circle"></div>
                        <h3>Phone</h3>
                    </div>
                    <div class="bannerInfo">
                        <div class="circle"></div>
                        <h3>Email</h3>
                    </div>
                    <div class="bannerInfo">
                        <div class="circle"></div>
                        <h3>Website</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../components/footer.php'; ?>
</body>
</html>
