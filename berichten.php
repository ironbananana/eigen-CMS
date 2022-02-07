<?php 

  session_start();

  if (!$_SESSION['loggedin']) {
    header('Location: inlog?error=nietingelogd');
    exit();
  }

  $config['titel'] = "Berichten";
  include_once 'includes/header.php';

?> 

<body class="bodyBerichten">
  <div class="topnav">
    <br>
    <a class="navigation" href="#home">Home</a>
    <a href="#About">About</a>
    <a href="#Toevoegen">Bericht +</a>
  </div>
  <div class="messagetitle">
    <h1>Berichten</h1>
  </div>
  <div class="berichten">
    <div class="nummerBericht">0- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">1- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">2- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">3- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">4- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">5- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">6- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>
    <hr>
    <div class="nummerBericht">7- Bericht | Quinten | 01-02-2022 | 19:30 | Verwijder bericht</div>

    <div class="pagebuttons">
      <button class="vorigePagina">Vorige pagina</button>
      <button class="volgendePagina">Volgende Pagina</button>
    </div>
  </div>



  <!-- footer -->

  <div class="footer"></div>

</body>

</html>