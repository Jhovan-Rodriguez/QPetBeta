<?php
	include('connection.php');
	
	//Funcion que cuenta los estados que se encuentran registrados en la base de datos
	function search_user($username,$password){
		global $pdo;

		$sql = "SELECT * FROM usuario WHERE username='$username' AND password='$password'";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}

	function search($username){
		global $pdo;

		$sql = "SELECT * FROM usuarios WHERE username='$username'";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}

?>

