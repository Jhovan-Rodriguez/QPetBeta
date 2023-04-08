<?php
	include('connection.php');
	function debug_to_console($data) {
		$output = $data;
		if (is_array($output))
			$output = implode(',', $output);
	
		echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
	}
	
	//Funcion que cuenta los estados que se encuentran registrados en la base de datos
	function get_pets(){
		global $pdo;
        
        $owner = $_SESSION['user'];
		debug_to_console($owner);

		$sql = "SELECT nombre, tipo, raza, edad FROM mascotas WHERE dueño='$owner'";
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$results=$statement->fetchAll();

		return $results;
	}
?>

