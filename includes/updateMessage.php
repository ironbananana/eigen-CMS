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
        


    } else {
        header('Location: /index?error=verkeerdemethod');
        exit();
    }

?> 