<?php
include '../../controller/config.php';

	mysql_select_db("$db_name",$connect);
	
	function findNewPos($Stringa){
		$pos = strpos ('$Stringa','_');
		$defaultPos = 7;
		return $pos - $defaultPos;
	}

	 function getTipo($Stringa){
		$TipoSensore = substr($Stringa, 0,3);
		return $TipoSensore;
	 }
	 
	 function getMarca($Stringa){
		$MarcaSensore = substr($Stringa, 3,3);
		return $MarcaSensore;
	 }
	 
	 function interrogazioneTipoSensore($stringa){
		$TipoSensore = getTipo($stringa);
		$interrogazioneTipoSensore = "SELECT `nometipo` FROM `tiposensore` WHERE `IdTipo` = '$TipoSensore'";
		$risultato = mysql_query($interrogazioneTipoSensore);
		$riga = mysql_num_rows($risultato);
		$Tipo =  mysql_result ($risultato, $riga-1, 'nometipo');
		return $Tipo;
	}

	function interrogazioneMarcaSensore($stringa){
		$MarcaSensore = getMarca($stringa);
		$interrogazioneMarcaSensore = "SELECT `nomemarca` FROM `marcasensore` WHERE `IdMarca` = '$MarcaSensore'";
		$risultato = mysql_query($interrogazioneMarcaSensore);
		$riga = mysql_num_rows($risultato);
		$Marca =  mysql_result ($risultato, $riga-1, 'nomemarca');
		return $Marca;
	}
	 
	 function getGiorno($Stringa, $pos){
		$GiornoData = substr ($Stringa, 8 + $pos,2);
		return $GiornoData;
		
	 }
	 
	 function getMese($Stringa, $pos){
		$MeseData = substr ($Stringa, 10 + $pos,2);
		return $MeseData;
	 }
	 
	 function getAnno($Stringa, $pos){
		$AnnoData = substr ($Stringa, 12 + $pos,4);
		return $AnnoData;
	 }
	 
	 function getOra($Stringa, $pos){
		$OraSensore = substr ($Stringa, 16 + $pos,2);
		return $OraSensore;
	 }
	 
	 function getMinuti($Stringa, $pos){
		$MinutiSensore = substr ($Stringa, 18 + $pos,2);
		return $MinutiSensore;
	 }
	 
	 function getValore($Stringa, $pos){
		$ValoreSensore = substr ($Stringa, 20 + $pos,3);
		return $ValoreSensore;
	 }
	 
	 function getMessaggio($Stringa, $pos){
		$MessaggioSensore = substr ($Stringa, 24 + $pos);
		return $MessaggioSensore;
	 }

