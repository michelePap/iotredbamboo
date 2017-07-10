<?php
session_start();
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;

mysql_select_db("$db_name",$connect);

//$interrogazione = "SELECT * FROM `utenti` WHERE Username = '$username' AND Password = '$password'";

$interrogazione = sprintf(
  "SELECT * FROM `utenti` WHERE Username = '%s' AND Password = '%s'",
  mysql_real_escape_string($username),
  mysql_real_escape_string($password)
);

$Risultato = mysql_query($interrogazione);

$privilegi = mysql_result ($Risultato, $NumeroRighe, "Privilegi");
$NumeroRighe = mysql_num_rows($Risultato);

if($NumeroRighe==1 && $privilegi==1){
	header('location:../view/Admin/HomeAdmin.php');
} else if($NumeroRighe==1 && $privilegi==0){
	header('location:../view/Utente/HomeUtente.php');
} else {
	header('location:../view/ErrorLogin.html');
}


