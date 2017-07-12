<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['username'] = $username;

$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
$stmt = $dbh->prepare( 'SELECT * FROM `utenti` WHERE Username = :username AND Password = :password' );
$stmt->execute( array(':username' => $username, ':password' => $password) );
$risultato = $stmt->fetch(PDO::FETCH_NUM);

if ($risultato[0] == 'admin') {
	header('location:../view/Admin/HomeAdmin.php');

} else if($risultato[0] == null) {
	header('location:../view/ErrorLogin.html');

} else {
	header('location:../view/Utente/HomeUtente.php');
}