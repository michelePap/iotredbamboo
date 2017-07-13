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

$interrogazioneSensori = 'SELECT * FROM `sensori`';

$RisultatoSensori = mysql_query($interrogazioneSensori);

$NumeroRigheSensori = mysql_num_rows($RisultatoSensori);

$strDefault = '_000000000000000_in attesa di installazione';

$stringaDati = $Tipo.$Marca.$NumeroRigheSensori.$strDefault;

if (hash_equals($token, $verifica)){
$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');

$stmt = $dbh->prepare( 'INSERT INTO `sensori` (`IdSensori`, `StringaDati`, `IdAmbiente`) VALUES (NULL, :stringaDati, :ID)');
$stmt->bindParam(':stringaDati', $stringaDati);
$stmt->bindParam(':ID', $ID);
$stmt->execute();
} else{
	$str = 'token non verificato'
	echo $str;
}
header('location:../view/Admin/HomeAdmin.php');
