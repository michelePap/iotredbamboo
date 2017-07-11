<?php

	$sensoreget = $_POST['IdSensore'];
	
	$pos = strpos ("$sensoreget",'_');
	  
	$IdSensore = substr($sensoreget,0, (string)$pos);

	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = :IdSensore");
		$stmt->bindParam(':IdSensore', $IdSensore);
		$stmt->execute();
	  
	  	header('location:../view/Admin/HomeAdmin.php');
