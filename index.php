<?php 

  session_start();

  $config['titel'] = "Index";
  include_once 'includes/header.php';

?> 

<body class="split-container">



    <div class="left">
        <!--leftside!-->
        <h1>NCTQ</h1>
        <p>Welcome to our social media platform!</p>
    </div>

    <div class="box2">
        <!--box 2 contents-->
        <div class="button_box">
            <form method="POST" action="registratie.php">
                <input type="submit" value="Sign up" class="ibutton" />
            </form>
            <form method="POST" action="inlog.php">
                <input type="submit" value="Sign in" class="ibutton" />
            </form>
        </div>

    </div>

</body>

</html>