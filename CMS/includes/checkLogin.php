<?php 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require_once 'db_conn.php';

        // Check of Input Field "Emailadres" leeg is
        if (trim($_POST['user-mail']) == NULL) {
            header("Location: /inloggen?error=emailuserleeg");
        }
    
        // Check of Input Field "Wachtwoord" leeg is
        if (trim($_POST['password']) == NULL) {
            header("Location: /inloggen?error=wwleeg");
        }
        
        $userMail = $conn->real_escape_string($_POST['user-mail']); // Haal eventuele inject voor SQL eruit
        $wachtwoord = $conn->real_escape_string($_POST['password']); // Haal eventuele inject voor SQL eruit

        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `Emailadres` = '$userMail' OR `Gebruikersnaam` = '$userMail' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount == 1) {

            $row = mysqli_fetch_assoc($sql);
            $wwDB = $row['Wachtwoord'];

            if (password_verify($wachtwoord, $wwDB)) {

                // session_start();
                // $_SESSION['loggedin'] = true;
                // $_SESSION['username'] = $row['Gebruikersnaam'];
                // $_SESSION['rowid'] = $row['ID'];

                // header('Location: /index?login=success');
                // exit();

                echo "LOGGEDIN SUCCESFULLY!";

            } else {
                header('Location: /inloggen?error=wwincorrect');
            exit();
            }

        } else {
            header('Location: /inloggen?error=noormoreaccounts');
            exit();
        }
        
    } else {
        header('Location: /inloggen?error=optyfengauw');
        exit();
    }
