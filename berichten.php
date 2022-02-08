<?php


session_start();

// if (!$_SESSION['loggedin']) {
//header('Location: ./inlog?error=nietingelogd');
// exit();
//}

$config['titel'] = "Berichten";
require_once 'includes/db_conn.php';
include_once 'includes/header.php';

?>

<body class="bodyBerichten">
  <div class="topnav">
    <a href="#home">Home</a>
    <a href="#About">About</a>
    <a id="addMessage">Bericht +</a>
    <a class="messagetitle" href="#backtofirstmessagepage">Messages</a>

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
        <div class="nummerBericht" data-id="<?= $row['ID'] ?>" data-authorID="<?= $row['AuthorID'] ?>" data-timestamp="<?= $row['Timestamp'] ?>" data-bericht="<?= $row['Bericht'] ?>" data-authorName="<?= $row['AuthorName'] ?>">
          <?= $row['ID'] ?> - Bericht | <?= $row['AuthorName'] ?> | <?= date('d-m-Y', $row['Timestamp']) ?> | <?= date('H:s', $row['Timestamp']) ?> <button>DEL</button>
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
    $('#addMessage').on('click', function() {

      $.dialog({
        title: 'Bericht Toevoegen',
        theme: 'material',
        backgroundDismiss: false,
        columnClass: 'col-md-6',
        content: '' +
          '<form action="/includes/addMessage.php" method="post">' +
            '<p class="fw-bold noSpace">Bericht:</p>' +
            '<textarea name="bericht" class="editMessage" rows="15" cols="100" ></textarea>' +
            '<br>' +
            '<button type="submit" class="submitButton">Versturen</button>' +
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

    $('.nummerBericht').on('click', function(e) {

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
        messageContent += "<p class='fw-bold'>Bericht toegevoegd op:</p>";
        messageContent += "<p class=''>" + getTime(timestamp) + " " + getDate(timestamp) + "</p> </br>";
        messageContent += "<label class='fw-bold' for='bericht'>Bericht</label> <br>";
        messageContent += "<textarea class='editMessage' name='bericht'>" + bericht + "</textarea>";
        messageContent += "<br>"
        messageContent += "<button type='submit' class='submitButton'>Bericht Updaten</button>";
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