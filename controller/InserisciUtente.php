<?php

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$CsrfToken = $_POST['CsrfToken'];
	$verifica= 'token';

	
	$dbh = new PDO('mysql:dbname=iotredbamboo;host=localhost', 'root', '');
	

		if (hash_equals($CsrfToken, $verifica)){
		$stmt = $dbh->prepare( "INSERT INTO `utenti` (`Username`, `Password`, `Privilegi`) VALUES (:Username, :Password, '0')");
		$stmt->bindParam(':Username', $Username);
		$stmt->bindParam(':Password', $Password);
		$stmt->execute();
	} else {
	$str = 'token non verificato';
	echo $str;
}	

	  	header('location:../view/Admin/HomeAdmin.php');
