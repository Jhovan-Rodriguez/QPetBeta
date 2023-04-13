<?php
    include("connection.php");
    session_start();
    global $pdo;
    $id_mascota=$_REQUEST['id_mascota'];
    $nombre=$_REQUEST['nombre'];
    $fecha_nac=$_REQUEST['fecha_nac'];
    $especie=$_REQUEST['especie'];
    $raza = $_REQUEST['raza'];
    $altura=$_REQUEST['altura'];
    $peso=$_REQUEST['peso'];
    $descripcion=$_REQUEST['descripcion'];
    $sexo = $_REQUEST['sexo'];
    $id_user = $_SESSION['id'];
    

    //$sql = "INSERT INTO mascota(nombre,especie,raza,fecha_nacimiento,peso,altura,sexo,id_usuario,descripcion) VALUES('$nombre','$especie','$raza','$fecha_nac','$peso','$altura','$sexo','$id_user','$descripcion')";

    $sql = "UPDATE mascota SET nombre = '$nombre', especie = '$especie', raza = '$raza', fecha_nacimiento = '$fecha_nac', peso = '$peso', altura = '$altura', sexo = '$sexo', id_usuario = '$id_user', descripcion = '$descripcion' WHERE id='$id_mascota';";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if (!$statement) {
        echo json_encode(array('status' => 0));
    } else {
        $result['status'] = 1;
        echo json_encode($result);
    }

?>