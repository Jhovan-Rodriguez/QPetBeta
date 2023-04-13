<?php
	include('connection.php');

	function search($username){
		global $pdo;

		$sql = "SELECT LAST_INSERT_ID() as id;";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetch();

		return $results;
	}

	function get_citas($id_user){
		global $pdo;
		$sql = "SELECT m.nombre as nombre,m.especie, c.fecha as fecha, c.hora as hora, c.activa as activa, c.id as id FROM cita as c JOIN mascota as m on c.id_mascota = m.id where m.id_usuario = '$id_user';";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}

	function search_cita($id_cita){
		global $pdo;
		$sql = "SELECT * FROM cita as c JOIN mascota as m on c.id_mascota = m.id where c.id = '$id_cita';";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetch();

		return $results;
	}

?>

