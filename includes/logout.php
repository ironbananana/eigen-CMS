<?php 

    session_start();
    session_unset();
    session_destroy();

    header('Location: ../inlog?success=logout');
    exit();

?> 