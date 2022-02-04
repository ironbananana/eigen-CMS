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
          Voornaam  <input type="text" name="vnaam" required minlength="3">
          <br>
          <br>
          Achternaam  <input type="text" name="anaam" required minlength="3">
          <br>
          <br>
          Tel Nr  <input type="number" name="anaam" required maxlength="10">
          <br>
          <br>
          Email  <input type="text" name="emailRegisteren" required>
          <br>
          <br>
          Wachtwoord  <input type="password" name="wachtwoordRegisteren" required>
          <br>
          <br>
        </div>
        <input type="submit" value="Registeren" id="registerKnop">
    </div>
    </div>
</body>
</html>