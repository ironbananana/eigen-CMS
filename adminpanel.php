<?php


session_start();

if (!$_SESSION['loggedin']) {
    header('Location: /inlog?error=nietingelogd');
    exit();
}

if ($_SESSION['role'] !== "ADMIN") {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=geentoegang');
    exit();
}

$config['titel'] = "Admin Panel";
include_once 'includes/header.php';
require_once 'includes/db_conn.php';

?>

<body class="bodyBerichten2">
    <div class="topnav">
        <a href="#" class="togglebtn" onclick="hamburgerFunction()">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar_links" id="navbar_links">
            <ul class="navlist" id="navlist">
                <!-- <li><a href="#home">Home</a></li>
        <li><a href="#About">About</a></li> -->
                <li><a id="addMessage"><i class="fa-solid fa-arrow-left-long"></i> Berichten</a></li>
                <li><a href="/includes/logout.php" class="logoutbtn">Logout</a></li>
            </ul>
        </div>
    </div>

    <br>

    <table id="accounts">
        <thead>
            <th>#</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Emailadres</th>
            <th>Telefoonnummer</th>
            <th>Rol</th>
            <th>Acties</th>
        </thead>

        <tbody>

            <?php

            $sql = mysqli_query($conn, "SELECT * FROM `users` ORDER BY `ID` ASC ");
            $rowCount = mysqli_num_rows($sql);

            if ($rowCount < 1) {
            ?>
                <tr>
                    <td colspan="6" class="noAccounts">Geen accounts gevonden!</td>
                </tr>
                <?php   } else {

                while ($row = mysqli_fetch_assoc($sql)) {
                ?>

                    <tr>
                        <td><?= $row['ID'] ?></td>
                        <td><?= $row['Voornaam'] ?></td>
                        <td><?= $row['Achternaam'] ?></td>
                        <td><?= $row['Emailadres'] ?></td>
                        <td><?= $row['Telnummer'] ?></td>
                        <td><?= $row['Role'] ?></td>
                        <td>
                            <button class="editAccount" data-voornaam="<?= $row['Voornaam'] ?>" data-achternaam="<?= $row['Achternaam'] ?>" data-email="<?= $row['Emailadres'] ?>" data-rol="<?= $row['Role'] ?>" data-userid="<?= $row['ID'] ?>" data-telnummer="<?= $row['Telnummer'] ?>"><i class="fa-solid fa-user-pen"></i></button>
                            <button class="deleteAccount" data-id="<?= $row['ID'] ?>"><i class="fa-solid fa-user-minus"></i></button>
                        </td>
                    </tr>


            <?php }
            } ?>

        </tbody>
    </table>






    <!-- footer -->

    <div class="footer"></div>

    <script>
        $('.deleteAccount').on('click', function(e) {
            let userID = e.currentTarget.attributes[1].value;

            $.confirm({
                title: 'Account Verwijderen',
                content: 'Weet je het zeker dat je het accounts wilt verwijderen?',
                theme: 'material',
                columnClass: 'col-md-4',
                autoClose: 'cancel|8000',
                buttons: {
                    cancel: function() {},
                    deleteButton: {
                        text: 'Account verwijderen',
                        btnClass: 'btn-red',
                        keys: ['enter'],
                        action: function() {

                            window.location.href = '/includes/deleteAccount?id=' + userID;

                        }
                    }
                }
            })
        });

        $('.editAccount').on('click', function(e) {

            let voornaam = e.currentTarget.attributes[1].value;
            let achternaam = e.currentTarget.attributes[2].value;
            let emailadres = e.currentTarget.attributes[3].value;
            let rol = e.currentTarget.attributes[4].value;
            let userID = e.currentTarget.attributes[5].value;
            let telnummer = e.currentTarget.attributes[6].value;

            let options = "<option value='USER'>Gebruiker</option>";
            options += "<option value='ADMIN'>Admin</option>";

            if (rol == "USER") {
                options = "<option value='USER' selected>Gebruiker</option>";
                options += "<option value='ADMIN'>Admin</option>";
            } else if (rol == "ADMIN") {
                options = "<option value='USER'>Gebruiker</option>";
                options += "<option value='ADMIN' selected>Admin</option>";

            } else {
                options = "<option value='USER'>Gebruiker</option>";
                options += "<option value='ADMIN'>Admin</option>";

            }

            $.dialog({
                title: 'Account Bewerken',
                theme: 'material',
                columnClass: 'col-md-4',
                content: '<form action="/includes/updateAccounts.php" method="post">' +
                '<label class="editLabel noSpace" for="voornaam"></label>' +
                '<input type="text" value="'+voornaam+'" name="voornaam" class="editInput" />' +
                '<label class="editLabel noSpace" for="achternaam"></label>' +
                '<input type="text" value="'+achternaam+'" name="achternaam" class="editInput" />' +
                '<label class="editLabel noSpace" for="emailadres"></label>' +
                '<input type="text" value="'+emailadres+'" name="emailadres" class="editInput" />' +
                '<label class="editLabel noSpace" for="telnummer"></label>' +
                '<input type="number" value="'+telnummer+'" name="telnummer" class="editInput" />' +
                '<select name="role">' +
                options +
                '</select>' +
                '<input type="hidden" value="'+userID+'" name="userid" />' +
                '<button class="submitButton" type="submit">Account Updaten</button>' +
                '</form>',
            });

        });
    </script>

</body>

</html>