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
    <title>Climate Control System</title>
</head>
<body>
<?php include '../components/nav.php'; ?>
<div class="main">
    <div class="content">
        <div class="formContainer">
            <div class="contactForm">
                <form>
                    <h2>GET IN TOUCH</h2>
                    <div class="inputRow">
                        <!--suppress HtmlFormInputWithoutLabel -->
                        <input placeholder="NAME" type="text" name="name" id="contactName"
                               value="<?php echo $_SESSION['nameAttempt'] ?? '' ?>">
                        <!--suppress HtmlFormInputWithoutLabel -->
                        <input placeholder="EMAIL" type="email" name="email" id="contactEmail"
                               value="<?php echo $_SESSION['emailAttempt'] ?? '' ?>">
                    </div>
                    <!--suppress HtmlFormInputWithoutLabel -->
                    <textarea placeholder="MESSAGE" name="message" id="contactMessage"></textarea>
                    <input type="submit" value="SUBMIT">
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
<?php include '../components/footer.html'; ?>
</body>
</html>
