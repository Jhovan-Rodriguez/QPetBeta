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

?>

