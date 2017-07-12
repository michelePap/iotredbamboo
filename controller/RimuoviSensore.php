<?php

	$sensoreget = $_POST['IdSensore'];
	
	$pos = strpos ("$sensoreget",'_');
	  
	$IdSensore = substr($sensoreget,0, (string)$pos);

	$csrf = 'io';
	$csrf1= 'io';
	
	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	
	if (hash_equals($csrf,$csrf1)){
	   
		$stmt = $dbh->prepare( "DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = :IdSensore");
		$stmt->bindParam(':IdSensore', $IdSensore);
		$stmt->execute();
	
	}
	  	header('location:../view/Admin/HomeAdmin.php');
	
