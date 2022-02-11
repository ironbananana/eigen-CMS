<?php

session_start();

$config['titel'] = "Inloggen";
include_once 'includes/header.php';

if (isset($_GET['error'])) {

    switch ($_GET['error']) {
        case "wwincorrect":
            $errorMessage = "Het ingevulde wachtwoord is incorrect!";
            break;
        case "noormoreaccounts":
            $errorMessage = "Er is geen account gevonden met het opgegeven emailadres!";
            break;
        case "unknownmethod":
            $errorMessage = "Onbekende methode gevonden!";
            break;
        case "emailuserleeg":
            $errorMessage = "Emailadres is leeg!";
            break;
        case "wwleeg":
            $errorMessage = "Het opgegeven wachtwoord was leeg!";
            break;
        case "nietingelogd":
            $errorMessage = "Je moet ingelogd zijn om die pagina te bekijken!";
            break;
    }
}

if (isset($_GET['success'])) {

    switch ($_GET['success']) {
        case "logout":
            $successMessage = "U bent succesvol uitgelogd!";
            break;
    }
}

?>

<body>
    <div class="split-screen">
        <div class="left">
            <!--leftside!-->

            <h1>Welcome back!</h1>

        </div>
        <div class="right ">
            <!--rightside!-->

            <form method="post" action="/includes/checkLogin.php" class="registerform">
                <h1>Sign in</h1>

                <?php

                if (isset($_GET['error'])) {

                ?>
                    <div class="errorMessage autoClose"><?php echo $errorMessage; ?> </div>
                <?php
                }
                if (isset($_GET['success'])) {
                ?>
                    <div class="succesMessage autoClose"><?php echo $successMessage; ?> </div>

                <?php
                }
                ?>


                <div class="input-container loginemail">
                    <!--input email!-->
                    <label for="email">E-mail</label>
                    <input type="email" name="userEmail" required>
                </div>
                <div class="input-container loginpassword">
                    <!--input password!-->
                    <label for="password">Password</label>
                    <input type="password" name="password" id="myInput" required>
                    <i class="fas fa-eye-slash" id="hide" onclick="passwordFunction()"></i>
                    <i class="fas fa-eye" id="show" onclick="passwordFunction()"></i>

                </div>


                <input type="submit" value="Login" class="signinbtn">
            </form>
        </div>
    </div>
</body>

</html>