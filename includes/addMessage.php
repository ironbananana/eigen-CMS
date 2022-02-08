<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    session_start();

    if (!$_SESSION['loggedin']) {
    header('Location: /inlog?error=nietingelogd');
    exit();
    }

    require 'db_conn.php';

    if (trim($_POST['bericht']) == NULL) {
        header("Location: /berichten?error=geenbericht");
        exit();
    }

    $authorID = $_SESSION['rowid'];
    $authorName = $_SESSION['voornaam'] . ' ' . $_SESSION['achternaam'];
    $timestamp = time();
    $bericht = $conn->real_escape_string($_POST['bericht']);

    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = '$authorID' ");
    $rowCount = mysqli_num_rows($sql);

    if ($rowCount !== 1) {
        header('Location: /berichten?error=geengebruikergevonden');
        exit();
    }

    mysqli_query($conn, "INSERT INTO `messages` (`Bericht`, `AuthorID`, `AuthorName`, `Timestamp`) VALUES ('$bericht', '$authorID', '$authorName', '$timestamp') ");

    header('Location: /berichten?success=berichttoegevoegd');
    exit();
} else {
    header('Location: /index?error=verkeerdemethod');
    exit();
}
