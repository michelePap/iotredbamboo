<?php
	include 'config.php';

	$IdAmbiente = $_POST['IdAmbiente'];
	$MarcaSensori = $_POST['MarcaSensori'];
	$TipoSensori = $_POST['TipoSensori'];
	
	mysql_select_db("$db_name",$connect);

	 $ID = substr($IdAmbiente,0,1);

	 $Marca = substr($MarcaSensori,0,3);

	 $Tipo = substr($TipoSensori,0,3);

	 $interrogazioneSensori = "SELECT * FROM `sensori`";
	
	 $RisultatoSensori = mysql_query($interrogazioneSensori);

	 $NumeroRigheSensori = mysql_num_rows($RisultatoSensori);
	  
	  function creaStringa($str1, $str2, $ID){
		
		$strDefault = "_000000000000000_in attesa di installazione";
		
		$StringaDati = $str1.$str2.$ID.$strDefault;
		
		return $stringaDati;		
	  }
	  
		$stringaDati = creaStringa($Tipo,$Marca, $NumeroRigheSensori);
	
		$interrogazioneAggiungiAmbiente = "INSERT INTO `sensori` (`IdSensori`, `StringaDati`, `IdAmbiente`) VALUES (NULL, '$stringaDati', '$ID')";
	
		$Risultato = mysql_query($interrogazioneAggiungiAmbiente);
	  
	  	header('location:../view/Admin/HomeAdmin.php');
		