<?php
include("connection.php");
session_start();
global $pdo;
$id_cita = $_REQUEST['id_cita'];

//$sql = "INSERT INTO mascota(nombre,especie,raza,fecha_nacimiento,peso,altura,sexo,id_usuario,descripcion) VALUES('$nombre','$especie','$raza','$fecha_nac','$peso','$altura','$sexo','$id_user','$descripcion')";

$sql = "UPDATE cita SET activa = 0 WHERE id='$id_cita';";

$statement = $pdo->prepare($sql);
$statement->execute();

header("Location:../views/mi_vet.php");

?>