<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baler Nina - Login</title>
    <script src="https://kit.fontawesome.com/d8f0503c9b.js" crossorigin="anonymous"></script>
    <script src="../../JS/Login/loginScript.js"></script>
    <link rel="icon" href="../../IMAGES/Asset 7 (2)@4x.png"><!--icon tab-->
    <link rel="stylesheet" href="../../CSS/newstyle.css" />
</head>

<body>
    <div class="main-container">
        <div class="login-container">
            <img src="../../IMAGES/Asset 10@4x.png">
            <form class="login-form" id="login-form" action="login_form.php" method="post">
                <p class="login-title">Sign In</p>
                <div class="input-container">
                    <!-- <label for="username">Username / Email:</label> -->
                    <div class="username-container">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="username1" name="username" placeholder="Username or Email">
                    </div>
                </div>
                <div class="input-container">
                    <!-- <label for="password">Password:</label> -->
                    <div class="password-container">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="password1" placeholder="Password" name="password">
                        <button type="button" class="pass-visibility"><i class="fa-solid fa-eye-slash"></i></button>
                    </div>
                </div>
                <p class="note" id="error-message">Invalid</p>
                <button type="submit" class="sign-in">log in</button>
            </form>
        </div>
    </div>
</body>

</html>