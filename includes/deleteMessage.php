<?php 

    if (isset($_GET['id'])) {

        session_start();

        if (!$_SESSION['loggedin']) {
        header('Location: /inlog?error=nietingelogd');
        exit();
        }
        
        require 'db_conn.php';

        $userID = $_SESSION['rowid'];
        $messageID = $_GET['id'];

        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = '$userID' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount !== 1) {
            header('Location: /berichten?error=geenusergevonden');
            exit();
        }

        $sql2 = mysqli_query($conn, "SELECT * FROM `messages` WHERE `ID` = '$messageID' ");
        $rowCount2 = mysqli_num_rows($sql2);

        if ($rowCount2 !== 1) {
            header('Location: /berichten?error=geenberichtgevonden');
            exit();
        }

        mysqli_query($conn, "DELETE FROM `messages` WHERE `ID` = '$messageID' ");
        header('Location: /berichten?success=berichtverwijderd');
        exit();

    } else {
        header('Location: /index?error=verkeerdemethod');
        exit();    
    }
