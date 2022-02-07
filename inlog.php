<?php 

  session_start();

  $config['titel'] = "Inloggen";
  include_once 'includes/header.php';

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
                <div class="input-container loginemail">
                    <!--input email!-->
                    <label for="email">E-mail</label>
                    <input type="email" name="userEmail" required>
                </div>
                <div class="input-container loginpassword">
                    <!--input password!-->
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>

                <input type="submit" value="Login"  class="signinbtn">
            </form>
        </div>
    </div>
</body>

</html>