<?php
	include 'config.php';

	$sensoreget = $_POST['IdSensore'];
	
	$pos = strpos ("$sensoreget",'_');
	  
	$IdSensore = substr($sensoreget,0, (string)$pos);
	
	mysql_select_db("$db_name",$connect);

	$interrogazioneRimuoviSensore = "DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = $IdSensore";
	
	$Risultato = mysql_query($interrogazioneRimuoviSensore);
	  
	  	header('location:../view/Admin/HomeAdmin.php');
