<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Registration</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3875a19f9.js" crossorigin="anonymous"></script>
</head>

<body class="signuppage">

    <div class="split-screen">
        <div class="left">
            <!--leftside!-->
            <h1>NCTQ</h1>
            <p>Welcome to our social media platform!</p>
        </div>
        <div class="right">
            <!--rightside!-->
            <form method="post" action="" class="registerform">
                
                    <h1>Sign up</h1>
                
                <div class="input-container vnaam">
                    <!--input firstname!-->
                    <label for="vnaam">First Name</label>
                    <input type="text" name="vnaam" required minlength="3">
                </div>

                <div class="input-container anaam">
                    <!--input lastname!-->
                    <label for="anaam">Last Name</label>
                    <input type="text" name="anaam" required minlength="3">
                </div>

                <div class="input-container email">
                    <!--input email!-->
                    <label for="email">E-mail</label>
                    <input type="email" name="emailRegisteren" required>
                </div>

                <div class="input-container phone">
                    <!--input phone!-->
                    <label for="phone">Phone number</label>
                    <input type="number" name="emailRegisteren" required>
                </div>

                <div class="input-container password">
                    <!--input password!-->
                    <label for="password">Password</label>
                    <input type="password" name="wachtwoordRegisteren" placeholder="choose a strong password" required>
                </div>

                <div class="input-container password">
                    <!--input password repeat!-->
                    <label for="password repeat">Repeat password</label>
                    <input type="password" name="wachtwoordRegisteren" placeholder="reapeat password" required>
                    <i class="fa fa-eye-slash"></i> <!-- can add functionality for user to show and hide password!-->
                </div>
               

                <div class="input-container cta">
                    <!--checkbox for email updates!-->
                    <label class="checkbox-container">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                        Sign up for email updates.
                    </label>
                </div>

                <button class="signinbtn" type="submit">
                    Sign up!
                </button>
                <section class="copy legal">
                    <p><span class="small">By continuing, you agree to accept our terms and conditions</span></p>
                </section>


            </form>
        </div>
    </div>
</body>

</html>