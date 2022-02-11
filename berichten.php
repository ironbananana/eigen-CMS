<?php


session_start();

if (!$_SESSION['loggedin']) {
  header('Location: /inlog?error=nietingelogd');
  exit();
}

$config['titel'] = "Berichten";
include_once 'includes/header.php';
require_once 'includes/db_conn.php';

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

<body class="bodyBerichten">
  <div class="topnav">
    <a href="#" class="togglebtn" onclick="hamburgerFunction()">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </a>
    <div class="navbar_links" id="navbar_links">
      <ul class="navlist" id="navlist">
        <!-- <li><a href="#home">Home</a></li>
        <li><a href="#About">About</a></li> -->
        <li><a id="addMessage">Bericht +</a></li>
        <?php if ($_SESSION['role'] == "ADMIN") { ?>
          <li><a href="/adminpanel" class="logoutbtn">Admin Panel</a></li>
        <?php } ?>
        <li><a href="/includes/logout.php" class="logoutbtn">Logout</a></li>
      </ul>

    </div>
  </div>

  <div class="berichten">

    <?php
    $sql = mysqli_query($conn, "SELECT * FROM `messages` ORDER BY `ID` DESC ");
    $rowCount = mysqli_num_rows($sql);

    if ($rowCount < 1) {
    ?>
      <div class="nummerBericht">
        Geen berichten gevonden!
      </div>
      <?php } else {

      while ($row = mysqli_fetch_assoc($sql)) {
      ?>
        <div style="position: relative" class="nummerBericht">
          <span class="viewMessage" data-id="<?= $row['ID'] ?>" data-authorID="<?= $row['AuthorID'] ?>" data-timestamp="<?= $row['Timestamp'] ?>" data-bericht="<?= $row['Bericht'] ?>" data-authorName="<?= $row['AuthorName'] ?>">
            Bericht van <?= $row['AuthorName'] ?> | <?= date('H:i:s', $row['Timestamp']) ?>
          </span>
          <?php if ($_SESSION['role'] == "ADMIN" || $row['AuthorID'] === $_SESSION['rowid']) { ?>
            <button class="delButton" data-id="<?= $row['ID'] ?>"><i class="fas fa-trash"></i></button>
          <?php } ?>
        </div>
    <?php
      }
    }
    ?>
  </div>
  <div class="pagebuttons">
    <button class="ibutton">Vorige pagina</button>
    <button class="ibutton">Volgende Pagina</button>
  </div>




  <!-- footer -->

  <div class="footer"></div>

  <script>
    $('.delButton').on('click', function(e) {

      let messageID = e.currentTarget.attributes[1].value;

      $.confirm({
        title: 'Bericht Verwijderen',
        content: 'Weet je het zeker dat je het bericht wilt verwijderen?',
        theme: 'material',
        columnClass: 'col-md-4',
        autoClose: 'cancel|8000',
        buttons: {
          cancel: function() {},
          deleteButton: {
            text: 'Bericht verwijderen',
            btnClass: 'btn-red',
            keys: ['enter'],
            action: function() {

              window.location.href = '/includes/deleteMessage?id=' + messageID;

            }
          }
        }
      })

    });

    $('#addMessage').on('click', function() {

      $.dialog({
        title: 'Bericht Toevoegen',
        theme: 'material',
        backgroundDismiss: false,
        columnClass: 'col-md-6',
        content: '' +
          '<form action="/includes/addMessage.php" method="post">' +
          '<p class="fw-bold noSpace">Bericht:</p>' +
          '<textarea name="bericht" class="editMessage w-100 form-control" rows="15" cols="100" ></textarea>' +
          '<br>' +
          '<button type="submit" class="submitButton btn fw-bold btn-block ibutton2 rounded w-100">Versturen</button>' +
          '</form>',
      });

    });

    function getTime(input) {
      let Unix = new Date(input * 1000);

      let hour = Unix.getHours();
      let minute = Unix.getMinutes();
      let second = Unix.getSeconds();

      if (hour < 10) {
        hour = '0' + hour;
      }
      if (minute < 10) {
        minute = '0' + minute;
      }
      if (second < 10) {
        second = '0' + second;
      }

      return hour + ":" + minute + ":" + second;
    }

    function getDate(input2) {
      let Unix = new Date(input2 * 1000);

      var days = Unix.getDate();
      var months = Unix.getMonth() + 1;
      var years = Unix.getFullYear();

      if (months < 10) {
        months = '0' + months;
      }

      if (days < 10) {
        days = '0' + days;
      }

      return days + '-' + months + '-' + years;
    }

    $('.viewMessage').on('click', function(e) {

      let editorMode = false;
      let messageContent = 'Error..!';
      let titel = 'Error..!';
      let userID = "<?php echo $_SESSION['rowid'] ?>";
      let userRole = "<?php echo $_SESSION['role'] ?>";

      let messageID = e.currentTarget.attributes[1].value;
      let authorID = e.currentTarget.attributes[2].value;
      let timestamp = e.currentTarget.attributes[3].value;
      let bericht = e.currentTarget.attributes[4].value;

      if (authorID === userID || userRole == "ADMIN") {
        editorMode = true;
        titel = 'Bericht bekijken / bewerken';
        messageContent = "<form action='/includes/updateMessage.php' method='post'>";
        messageContent += "<p class='fw-bold noSpace'>Bericht toegevoegd op:</p>";
        messageContent += "<p class=''>" + getTime(timestamp) + " " + getDate(timestamp) + "</p> </br>";
        messageContent += "<label class='fw-bold' for='bericht'>Bericht</label> <br>";
        messageContent += "<textarea class='editMessage w100 form-control' rows='5' name='bericht'>" + bericht + "</textarea>";
        messageContent += "<br>"
        messageContent += "<button type='submit' class='submitButton ibutton2 w-100'>Bericht Updaten</button>";
        messageContent += "<input type='hidden' name='messageID' value='" + messageID + "' />";
        messageContent += "</form>";
      } else {
        editorMode = false;
        titel = 'Bericht bekijken';
        messageContent = "<p class='fw-bold'>Bericht toegevoegd op:</p>";
        messageContent += "<p class=''>" + getTime(timestamp) + " " + getDate(timestamp) + "</p> </br>";
        messageContent += "<p class='fw-bold'>Bericht</p>";
        messageContent += "<p class='berichtView'>" + bericht + "</p>";
      }


      $.dialog({
        title: titel,
        theme: 'material',
        backgroundDismiss: true,
        columnClass: 'col-md-6',
        content: messageContent,
      });

    });
  </script>

</body>

</html>