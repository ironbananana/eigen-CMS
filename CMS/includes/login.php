<?php 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require_once 'db_conn.php';

        // Check of Input Field "Emailadres" leeg is
        if (trim($_POST['emailadres']) == NULL) {
            header("Location: /inloggen?error=emaileeg");
        }
    
        // Check of Input Field "Wachtwoord" leeg is
        if (trim($_POST['wachtwoord']) == NULL) {
            header("Location: /inloggen?error=wwleeg");
        }
        
        $emailadres = $conn->real_escape_string($_POST['emailadres']); // Haal eventuele inject voor SQL eruit
        $wachtwoord = $conn->real_escape_string($_POST['wachtwoord']); // Haal eventuele inject voor SQL eruit

        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `Emailadres` = '$emailadres' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount > 0) {

            $row = mysqli_fetch_assoc($sql);
            $wwDB = $row['Wachtwoord'];

            if (password_verify($wachtwoord, $wwDB)) {

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['Gebruikersnaam'];
                $_SESSION['rowid'] = $row['ID'];

                header('Location: /index?login=success');
                exit();

            } else {
                header('Location: /inloggen?error=wwincorrect');
            exit();
            }

        } else {
            header('Location: /inloggen?error=geenaccountgevonden');
            exit();
        }
        
    } else {
        header('Location: /inloggen?error=optyfengauw');
        exit();
    }
