<?php 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        session_start();
        require 'db_conn.php';

        if (trim($_POST['messageID']) == NULL) {
            header("Location: /berichten?error=geenmessageid");
            exit();
        }
        
        if (trim($_POST['bericht']) == NULL) {
            header("Location: /berichten?error=geenbericht");
            exit();
        }

        $messageID = $conn->real_escape_string($_POST['messageID']);
        $bericht = $conn->real_escape_string($_POST['bericht']);

        $sql = mysqli_query($conn, "SELECT * FROM `messages` WHERE `ID` = '$messageID' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount !== 1) {
            header("Location: /berichten?error=geenberichtvoorupdate");
            exit();
        }


        mysqli_query($conn, "UPDATE `messages` SET `Bericht` = '$bericht' WHERE `ID` = '$messageID' ");
        header("Location: /berichten?success=berichtupdate");
        exit();

    } else {
        header('Location: /index?error=verkeerdemethod');
        exit();
    }

?> 