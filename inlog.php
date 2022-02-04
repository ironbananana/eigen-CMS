<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login/Registration</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body id="index">
    <div class="loginbox">
        <div id="loginText"><b>Login</b></div>


        <form action="/includes/checkLogin.php" method="post">

            <input type="text" name="user-email" id="user-email" placeholder="Gebruikersnaam of Emailadres.." required>

            <input type="password" name="password" id="password" placeholder="Wachtwoord.." required>

            <button class="loginButton" type="submit">Inloggen</button>

        </form>



    </div>
    </div>
</body>

</html>