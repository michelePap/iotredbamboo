<?php

	$ambienteget = $_POST['IdAmbiente'];
	  
	$IdAmbiente = substr($ambienteget,0, (string)strpos ('$ambienteget','_'));

	
	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	

		
		$stmt = $dbh->prepare( 'DELETE FROM `ambienti` WHERE `ambienti`.`IdAmbiente` = :IdAmbiente');
		$stmt->bindParam(':IdAmbiente', $IdAmbiente);
		$stmt->execute();
		

	  	header('location:../view/Admin/HomeAdmin.php');
