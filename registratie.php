<?php 

  session_start();

  $config['titel'] = "Registreren";
  include_once 'includes/header.php';

?> 

<body class="signuppage">

    <div class="split-screen">
        <div class="left">
            <!--leftside!-->
            <h1>NCTQ</h1>
            <p>Welcome to our social media platform!</p>
        </div>
        <div class="right">
            <!--rightside!-->
            <form method="post" action="/includes/checkRegistratie.php" class="registerform">
                
                    <h1>Sign up</h1>

                    <div class="errorMessage">Signup Failed</div>
    <div class="succesMessage">Signup Succes</div>
                
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
                    <input type="email" name="emailadres" required>
                </div>

                <div class="input-container phone">
                    <!--input phone!-->
                    <label for="phone">Phone number</label>
                    <input type="number" name="telnummer" required>
                </div>

                <div class="input-container password">
                    <!--input password!-->
                    <label for="password"  class="myInput">Password</label>
                    <input type="password" name="wachtwoord" class="myInput" placeholder="choose a strong password" required>
                </div>

                <div class="input-container password">
                    <!--input password repeat!-->
                    <label for="password repeat" >Repeat password</label>
                    <input type="password" name="wwrepeat" class="myInput" placeholder="reapeat password" required>
                    <i class="fas fa-eye" id="show" onclick="passwordFunction()"></i> <!-- can add functionality for user to show and hide password!-->
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