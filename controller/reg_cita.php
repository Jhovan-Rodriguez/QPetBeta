<?php
    include("connection.php");

    global $pdo;
    $id_veterinaria=$_REQUEST['id_veterinaria'];
    $fecha=$_REQUEST['fecha'];
    $hora=$_REQUEST['hora'];
    $mascota=$_REQUEST['mascota'];
    $comentario=$_REQUEST['comentario'];

    $sql = "INSERT INTO cita(fecha, hora, comentario, id_veterinaria, id_mascota,activa) VALUES('$fecha','$hora','$comentario','$id_veterinaria','$mascota','1')";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    if (!$statement) {
        echo json_encode(array('status' => 0));
    } else {
        echo json_encode(array('status' => 1));
    }

?>