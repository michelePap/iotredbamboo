<?php
	include 'config.php';

	$ambienteget = $_POST['IdAmbiente'];
	
	$pos = '';

	$pos = strpos ("$ambienteget","_");
	  
	$IdAmbiente = '';

	$IdAmbiente = substr($ambienteget,0,$pos);
	
	mysql_select_db("$db_name",$connect);

	$interrogazioneRimuoviAmbiente = "DELETE FROM `ambienti` WHERE `ambienti`.`IdAmbiente` = $IdAmbiente";
	
	$Risultato = mysql_query($interrogazioneRimuoviAmbiente);
	  
	  	header('location:../view/Admin/HomeAdmin.php');
