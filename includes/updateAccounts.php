<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    session_start();

    if (!$_SESSION['loggedin']) {
        header('Location: /inlog?error=nietingelogd');
        exit();
    }

    if ($_SESSION['role'] !== "ADMIN") {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=geentoegang');
        exit();
    }

    require 'db_conn.php';

    if (trim($_POST['userid']) == NULL) {
        header("Location: /adminpanel?error=editgeenuserid");
        exit();
    }
    
    if (trim($_POST['voornaam']) == NULL) {
        header("Location: /adminpanel?error=editgeenvoornaam");
        exit();
    }

    if (trim($_POST['achternaam']) == NULL) {
        header("Location: /adminpanel?error=editgeenachternaam");
        exit();
    }

    if (trim($_POST['emailadres']) == NULL) {
        header("Location: /adminpanel?error=editgeenemail");
        exit();
    }
    
    if (trim($_POST['telnummer']) == NULL) {
        header("Location: /adminpanel?error=editgeentelnummer");
        exit();
    }

    if (trim($_POST['role']) == NULL) {
        header("Location: /adminpanel?error=editgeenrol");
        exit();
    }

    $voornaam = $conn->real_escape_string($_POST['voornaam']);
    $achternaam = $conn->real_escape_string($_POST['achternaam']);
    $emailadres = $conn->real_escape_string($_POST['emailadres']);
    $role = $conn->real_escape_string($_POST['role']);
    $userID = $conn->real_escape_string($_POST['userid']);
    $telnummer = $conn->real_escape_string($_POST['telnummer']);

    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = '$userID' ");
    $rowCount = mysqli_num_rows($sql);

    if ($rowCount !== 1) {
        header("Location: /adminpanel?error=editnouser");
        exit();
    }


    mysqli_query($conn, "UPDATE `users` SET `Voornaam` = '$voornaam', `Achternaam` = '$achternaam', `Emailadres` = '$emailadres', `Role` = '$role', `Telnummer` = '$telnummer'  WHERE `ID` = '$userID' ");
    header("Location: /adminpanel?success=accountupdate");
    exit();
} else {
    header('Location: /index?error=verkeerdemethod');
    exit();
}
