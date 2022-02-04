<?php 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (trim($_POST['gebruikernaam']) == NULL) {
            header("Location: /registratie?error=gebruikernaamleeg");
        }

        if (trim($_POST['telnummer']) == NULL) {
            header("Location: /registratie?error=telleeg");
        }

        if (trim($_POST['emailadres']) == NULL) {
            header("Location: /registratie?error=emaileeg");
        }
    
        if (trim($_POST['wachtwoord']) == NULL) {
            header("Location: /registratie?error=wwleeg");
        }
        
        if (trim($_POST['wwrepeat']) == NULL) {
            header("Location: /registratie?error=ww2leeg");
        }

        require_once 'db_conn.php';
        
        $gebruikernaam = $conn->real_escape_string($_POST['gebruikernaam']); // Haal eventuele inject voor SQL eruit
        $telnummer = $conn->real_escape_string($_POST['telnummer']); // Haal eventuele inject voor SQL eruit
        $emailadres = $conn->real_escape_string($_POST['emailadres']); // Haal eventuele inject voor SQL eruit
        $pwd = $conn->real_escape_string($_POST['wachtwoord']); // Haal eventuele inject voor SQL eruit
        $pwdRepeat = $conn->real_escape_string($_POST['wwrepeat']); // Haal eventuele inject voor SQL eruit


        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `Emailadres` = '$emailadres' OR `Gebruikersnaam` = '$gebruikernaam' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount == 0) {

            if ($pwd === $pwdRepeat) {
                
                $hasedWW = password_hash($pwd, PASSWORD_BCRYPT);
                mysqli_query($conn, "INSERT INTO `users` (`Emailadres`, `Wachtwoord`, `Gebruikersnaam`, `Telnummer`) VALUES ('$emailadres', '$hasedWW', '$gebruikernaam', '$telnummer') ");

                // Verstuur een email naar het emailadres met een uitnodiging / bevestiging.
                header('Location: /registratie?success=registratie');
                exit();

            } else {
                header('Location: /registratie?error=pwdnomatch');
                exit();
            }

        } else {
            header('Location: /registratie?error=doublemail');
            exit();
        }

    } else {
        header('Location: /registratie?error=optyfengauw');
        exit();
    }
