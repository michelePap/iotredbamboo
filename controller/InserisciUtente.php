<?php

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	
	$csrf3 = 'io';
	$csrf4= 'io';
	
	$dbh = new PDO("mysql:dbname=iotredbamboo;host=localhost", "root", "");
	

		
		$stmt = $dbh->prepare( "INSERT INTO `utenti` (`Username`, `Password`, `Privilegi`) VALUES (:Username, :Password, '0')");
		$stmt->bindParam(':Username', $Username);
		$stmt->bindParam(':Password', $Password);
		$stmt->execute();
		

	  	header('location:../view/Admin/HomeAdmin.php');
