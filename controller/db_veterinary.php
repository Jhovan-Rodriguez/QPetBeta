<?php
include('connection.php');

function debug_to_console($data)
{
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);

	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

//Funcion que cuenta los estados que se encuentran registrados en la base de datos
function get_veterinaries($duehno)
{
	global $pdo;

	$sql = "SELECT v.id as id ,v.nombre as nombre, v.calle as calle, v.telefono as telefono, v.disponible as disponible FROM veterinaria AS v 
                JOIN veterinario_mascota AS vm ON v.id = vm.id_veterinaria
                WHERE vm.id_usuario = '$duehno'";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();

	return $results;
}

function search_veterinary($id_veterinary)
{
	global $pdo;
	$sql = "SELECT CONCAT_WS(' ', u.nombre, u.apellido_p, u.apellido_m) AS nombre, v.nombre as nombre_v, u.email as correo, v.telefono as telefono, v.colonia as colonia, v.calle as calle, v.codigo_postal as codigo_postal, v.horario as horario, v.disponible as disponible 
                FROM veterinaria as v 
                JOIN usuario AS u ON v.id_usuario=u.id
                WHERE v.id = '$id_veterinary'";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetch();

	return $results;
}

function get_patients($id_owner)
{
	global $pdo;

	$sql = "SELECT m.* 
			FROM mascota AS m 
			JOIN veterinario_mascota AS vm ON m.id = vm.id_mascota 
			JOIN veterinaria AS v ON vm.id_veterinaria = v.id 
			WHERE v.id_usuario = 7";

	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetch();

	echo $results;

	return $results;
}

function get_pets($duehno)
{
	global $pdo;

	$owner = $_SESSION['user'];
	#$duehno = $_SESSION['id'];
	$sql = "SELECT * FROM mascota WHERE id_usuario='$duehno'";
	$statement = $pdo->prepare($sql);
	$statement->execute();
	$results = $statement->fetchAll();

	return $results;
}

?>