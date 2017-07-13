<?php

	$sensoreget = $_POST['IdSensore'];
	
	//$pos = (string)strpos ("$sensoreget",'_');
	  
	$IdSensore = (string)substr($sensoreget,0, strpos ("$sensoreget",'_'));

	$token = 'io';
	$verifica= 'io';
	
		$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
		
		if ($token === $verifica){
		$stmt = $dbh->prepare( 'DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = :IdSensore');
		}
		$stmt->bindParam(':IdSensore', $IdSensore);
		$stmt->execute();

	
	  	header('location:../view/Admin/HomeAdmin.php');

	
