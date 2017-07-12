<?php

	$sensoreget = $_POST['IdSensore'];
	
	//$pos = (string)strpos ("$sensoreget",'_');
	  
	$IdSensore = substr($sensoreget,0, strpos ("$sensoreget",'_'));

	$csrf = 'io';
	$csrf1= 'io';
	
		if ($csrf === $csrf1){
			
		$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');

		$stmt = $dbh->prepare( 'DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = :IdSensore');
		$stmt->bindParam(':IdSensore', $IdSensore);
		$stmt->execute();

	}else{
		}	
	  	header('location:../view/Admin/HomeAdmin.php');

	
