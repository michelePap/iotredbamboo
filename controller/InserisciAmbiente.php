<?php

	$username = $_POST['username'];
	$nomeAmbiente = $_POST['nomeAmbiente'];
	$tipoAmbiente = $_POST['tipoAmbiente'];
	$CsrfToken = $_POST['CsrfToken'];
	$verifica= 'token';
	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	

		if (hash_equals($token, $verifica)){
		$stmt = $dbh->prepare( 'INSERT INTO `ambienti` (`IdAmbiente`, `NomeAmbiente`, `TipologiaAmbiente`, `Username`)
	VALUES (NULL, :nomeAmbiente, :tipoAmbiente, :username)');
		$stmt->bindParam(':nomeAmbiente', $nomeAmbiente);
		$stmt->bindParam(':tipoAmbiente', $tipoAmbiente);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		} else {
			$str = 'token non verificato'
			echo $str;
		}
	
	  
	  	header('location:../view/Admin/HomeAdmin.php');
	  