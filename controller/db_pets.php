<?php
	include('connection.php');

	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
	
	//Funcion que cuenta los estados que se encuentran registrados en la base de datos
	function get_pets($duehno){
		global $pdo;
        
        $owner = $_SESSION['user'];
		#$duehno = $_SESSION['id'];
		$sql = "SELECT * FROM mascota WHERE id_usuario='$duehno'";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}

	function search_pet($id_pet){
		global $pdo;
		$sql = "SELECT * FROM mascota WHERE id='$id_pet'";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}

?>

