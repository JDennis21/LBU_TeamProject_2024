<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/main.css" rel="stylesheet" type="text/css" />
    <link href="../css/login.css" rel="stylesheet" type="text/css" />
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
                <li><a href="../pages/signup.php">Sign Up</a></li>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="formContainer">
            <div class="loginForm">
                <h2>Login</h2>
                <form action="#" method="post">
                    <label for="loginEmail">Email address</label>
                    <input type="email" name="email" id="loginEmail">
                    <label for="loginPassword">Password</label>
                    <input type="password" name="password" id="loginPassword">
                    <input type="submit" value="Login">
                </form>
            </div>
            <div class="signupBox">
                <p>Don't have an account with us? <a href="../pages/signup.php">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>