<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c3875a19f9.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="split-screen">
        <div class="left">
            <!--leftside!-->
            
                <h1>Welcome back!</h1>
            
        </div>
        <div class="right ">
            <!--rightside!-->
            
            <form method="post" action="" class="registerform">
            <h1>Sign in</h1>
                <div class="input-container loginemail">
                    <!--input email!-->
                    <label for="email">E-mail</label>
                    <input type="email" name="emailRegisteren" required>
                </div>
                <div class="input-container loginpassword">
                    <!--input password!-->
                    <label for="password">Password</label>
                    <input type="password" name="wachtwoordRegisteren" required>
                </div>

                <input type="submit" value="Login"  class="signinbtn">
            </form>
        </div>
    </div>
</body>

</html>