<?php 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        require_once 'db_conn.php';

        // Check of Input Field "Emailadres" leeg is
        if (trim($_POST['userEmail']) == NULL) {
            header("Location: ./inlog?error=emailuserleeg");
        }
    
        // Check of Input Field "Wachtwoord" leeg is
        if (trim($_POST['password']) == NULL) {
            header("Location: ./inlog?error=wwleeg");
        }
        
        $userMail = $conn->real_escape_string($_POST['userEmail']); // Haal eventuele inject voor SQL eruit
        $wachtwoord = $conn->real_escape_string($_POST['password']); // Haal eventuele inject voor SQL eruit

        $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `Emailadres` = '$userMail' ");
        $rowCount = mysqli_num_rows($sql);

        if ($rowCount > 0) {

            $row = mysqli_fetch_assoc($sql);
            $wwDB = $row['Wachtwoord'];

            if (password_verify($wachtwoord, $wwDB)) {

                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['voornaam'] = $row['Voornaam'];
                $_SESSION['achternaam'] = $row['Achternaam'];
                $_SESSION['rowid'] = $row['ID'];

                header('Location: ./berichten?login=success');
                exit();

            } else {
                header('Location: ./inlog?error=wwincorrect');
            exit();
            }

        } else {
            header('Location: ./inlog?error=noormoreaccounts');
            exit();
        }
        
    } else {
        header('Location: ./inlog?error=optyfengauw');
        exit();
    }
