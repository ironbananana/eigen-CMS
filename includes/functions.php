<?php

    function sendNewMail($userID) {

      require_once 'db_conn.php';
      
      $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = '$userID' ");
      $rowCount = mysqli_num_rows($sql);

      if ($rowCount !== 1) {
        header('Location: /registratie?error=geenaccountvoormail');
        exit();
      }
      
      $row = mysqli_fetch_assoc($sql);

        $to = $row['Emailadres'];
        $subject = 'Nieuw account';

        $message = "<h3>Dit is HTML tekst.</h3>";

        $headers = "From: Berichten Overzicht GLU-WDV1 <test@mail.nl>\r\n";
        $headers .= "Content-type: text/html\r\n";        

        $email = mail($to, $subject, $message, $headers);

        if (!$email) {
          echo 'Error!';
        }

    }