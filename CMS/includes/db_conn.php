<?php

$host= "web0143.zxcs.nl";
$username= "u123340p119668_periode3";
$password = "qxMfcj4J1";

$db_name = "u123340p119668_projperiode3";

$conn = mysqli_connect($host, $username, $password, $db_name);

if (!$conn) {
	echo "Er is iets fout gegaan met de database!";
}

?>