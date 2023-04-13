<?php

	$dsn = 'mysql:dbname=qpet;host=localhost';
	$user = 'admin';
	$password = '509a10d50e7ed65a4a1a0c6817a67fe07f985c973d275989';

	try{
		$pdo = new PDO($dsn, $user, $password);
	}catch( PDOException $e ){
		echo 'Error al conectarnos: ' . $e->getMessage();
	}
?>
