<?php
	
	function findNewPos($Stringa){
		$pos = strpos ('$Stringa','_');
		$defaultPos = 9;
		return $pos;
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

		$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT `nometipo` FROM `tiposensore` WHERE `IdTipo` = :TipoSensore");
		$stmt->bindParam(':TipoSensore', $TipoSensore);
		$stmt->execute();
		$Risultato = $stmt->fetch(PDO::FETCH_NUM);	

		$Tipo =  $Risultato[0];
		return $Tipo;
	}

	function interrogazioneMarcaSensore($stringa){
		$MarcaSensore = getMarca($stringa);

		$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
		$stmt = $dbh->prepare( "SELECT `nomemarca` FROM `marcasensore` WHERE `IdMarca` = :MarcaSensore");
		$stmt->bindParam(':MarcaSensore', $MarcaSensore);
		$stmt->execute();
		$Risultato = $stmt->fetch(PDO::FETCH_NUM);

		$Marca =  $Risultato[0];
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

