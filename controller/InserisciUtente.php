<?php

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	$csrf = 'io';
	$csrf1= 'io';
	
	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	if (hash_equals($csrf,$csrf1)){
		$stmt = $dbh->prepare( "INSERT INTO `utenti` (`Username`, `Password`, `Privilegi`) VALUES (:Username, :Password, '0')");
		$stmt->bindParam(':Username', $Username);
		$stmt->bindParam(':Password', $Password);
		$stmt->execute();
	}
	  	header('location:../view/Admin/HomeAdmin.php');
