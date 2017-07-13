<?php


	$ambienteget = $_POST['IdAmbiente'];
	$CsrfToken = $_POST['CsrfToken'];
	$IdAmbiente = substr($ambienteget,0, (string)strpos ("$ambienteget",'_'));
	$verifica= 'token';
	
	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	

		if (hash_equals($token, $verifica)){
		$stmt = $dbh->prepare( 'DELETE FROM `ambienti` WHERE `ambienti`.`IdAmbiente` = :IdAmbiente');
		$stmt->bindParam(':IdAmbiente', $IdAmbiente);
		$stmt->execute();
		} else {
		$str = 'token non verificato'
		echo $str;
		}

	  	header('location:../view/Admin/HomeAdmin.php');
