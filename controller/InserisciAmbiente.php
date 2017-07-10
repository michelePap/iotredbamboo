<?php
	include 'config.php';

	$username = $_POST['username'];
	$nomeAmbiente = $_POST['nomeAmbiente'];
	$tipoAmbiente = $_POST['tipoAmbiente'];
	
	mysql_select_db("$db_name",$connect);

	$interrogazioneAggiungiAmbiente = "INSERT INTO `ambienti` (`IdAmbiente`, `NomeAmbiente`, `TipologiaAmbiente`, `Username`)
	VALUES (NULL, '$nomeAmbiente', '$tipoAmbiente', '$username');";
	
	$Risultato = mysql_query($interrogazioneAggiungiAmbiente);
	  
	  	header('location:../view/Admin/HomeAdmin.php');
	  