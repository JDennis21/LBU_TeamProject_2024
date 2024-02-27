<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/signup.css" rel="stylesheet" type="text/css" />
    <title>Site Name</title>
</head>
<body>
<div class="main">
    <nav>
        <div class="logo">
            <a href="../pages/homePage.html">logo</a>
        </div>
        <div class="menu">
            <ul>
                <li><a href="../pages/login.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="formContainer">
            <div class="signupForm">
                <h2>Sign Up</h2>
                <form action="#" method="post">
                    <label for="signupName">Full name</label>
                    <input type="text" name="fullName" id="signupName">
                    <label for="signupEmail">Email</label>
                    <input type="email" name="email" id="signupEmail">
                    <label for="signupPassword">Password</label>
                    <input type="password" name="password" id="signupPassword">
                    <input type="submit" value="Sign Up">
                </form>
            </div>
            <div class="loginBox">
                <p>Already have an account with us? <a href="../pages/login.php">Login</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
