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

    <div class="registerbox">
        <div id="registerText"><b>Registeren</b></div>
        <div class="registerInputs">
            <form action="/includes/checkRegistratie.php" method="post">
                Gebruikersnaam <input type="text" name="gebruikernaam" required minlength="3">
                <br>
                <br>
                Tel Nr <input type="number" name="telnummer" required maxlength="10">
                <br>
                <br>
                Email <input type="email" name="emailadres" required>
                <br>
                <br>
                Wachtwoord <input type="password" name="wachtwoord" required>
                <br>
                <br>
                Herhaal Wachtwoord <input type="password" name="wwrepeat" required>
                <br>
                <br>
        </div>
        <button type="submit">Registeren</button>
        </form>
    </div>
    </div>
</body>

</html>