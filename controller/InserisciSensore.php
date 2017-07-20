<?php


$IdAmbiente = $_POST['IdAmbiente'];
$MarcaSensori = $_POST['MarcaSensori'];
$TipoSensori = $_POST['TipoSensori'];
$CsrfToken = $_POST['CsrfToken'];
$verifica= 'token';

define('START_POINT', 0);
define('CHAR_LENG', 3);
define('CHAR_SING', 1);

$ID = substr($IdAmbiente, START_POINT, CHAR_SING);
$Marca = substr($MarcaSensori, START_POINT, CHAR_LENG);
$Tipo = substr($TipoSensori, START_POINT, CHAR_LENG);

if (hash_equals($CsrfToken, $verifica)){
$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');

$countSensori = $dbh->prepare('SELECT COUNT(*) AS `NumeroSensori` FROM `sensori`');
$countSensori->execute();

$Risultato = $countSensori->fetch(PDO::FETCH_NUM);
$NumeroRigheSensori = $Risultato[0] + 1;

$strDefault = '_000000000000000_in attesa di installazione';

$stringaDati = $Tipo.$Marca.$NumeroRigheSensori.$strDefault;

$stmt = $dbh->prepare( 'INSERT INTO `sensori` (`IdSensori`, `StringaDati`, `IdAmbiente`) VALUES (NULL, :stringaDati, :ID)');
$stmt->bindParam(':stringaDati', $stringaDati);
$stmt->bindParam(':ID', $ID);
$stmt->execute();
} else{
	$str = 'token non verificato';
	echo $str;
}
header('location:../view/Admin/HomeAdmin.php');
