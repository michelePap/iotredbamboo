<?php
	include 'config.php';

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	mysql_select_db((string)$db_name,$connect);
	  
	
		$interrogazioneAggiungiUtente = "INSERT INTO `utenti` (`Username`, `Password`, `Privilegi`) VALUES ('$Username', '$Password', '0')";

		$Risultato = mysql_query($interrogazioneAggiungiUtente);
	  
	  	header('location:../view/Admin/HomeAdmin.php');
