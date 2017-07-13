<?php

	$sensoreget = $_POST['IdSensore'];
	$CsrfToken = $_POST['CsrfToken'];
	//$pos = (string)strpos ("$sensoreget",'_');
	  
	$IdSensore = (string)substr($sensoreget,0, strpos ("$sensoreget",'_'));

	$verifica= 'token';
	
		
		
		if (hash_equals($CsrfToken, $verifica)){
		$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
		$stmt = $dbh->prepare( 'DELETE FROM `sensori` WHERE `sensori`.`IdSensori` = :IdSensore');
		$stmt->bindParam(':IdSensore', $IdSensore);
		$stmt->execute();
} else {
	$str = 'token non verificato';
	echo $str;
}

	
	  	header('location:../view/Admin/HomeAdmin.php');

	
