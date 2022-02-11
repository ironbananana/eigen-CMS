<?php

if (isset($_GET['id'])) {

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

    $userID = $_SESSION['rowid'];
    $accountID = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = '$accountID' ");
    $rowCount = mysqli_num_rows($sql);

    if ($rowCount !== 1) {
        header('Location: /adminpanel?error=nodelaccount');
        exit();
    }

    mysqli_query($conn, "DELETE FROM `users` WHERE `ID` = '$accountID' ");
    header('Location: /adminpanel?success=accountverwijderd');
    exit();
} else {
    header('Location: /inlog?error=unknownmethod');
    exit();
}
