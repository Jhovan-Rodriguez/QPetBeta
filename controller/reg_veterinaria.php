<?php
    include("connection.php");
    session_start();
    global $pdo;
    $nombre=$_REQUEST['nombre']; 
    $telefono = $_REQUEST['telefono']; 
    $descripcion = $_REQUEST['descripcion']; 
    $colonia = $_REQUEST['colonia']; 
    $calle = $_REQUEST['calle']; 
    $cp = $_REQUEST['cp']; 
// Crear el array asociativo
$data = array(
    "lunes_viernes" => array(
      "hora_inicio" => $_REQUEST['semana_open'],
      "hora_fin" => $_REQUEST['semana_close']
    ),
    "sabado" => array(
      "hora_inicio" => $_REQUEST['sabado_open'],
      "hora_fin" => $_REQUEST['sabado_close']
    ),
    "domingo" => array(
      "hora_inicio" => $_REQUEST['domingo_open'],
      "hora_fin" => $_REQUEST['domingo_close']
    )
  );
  
    // Convertir el array en un JSON
    $json = json_encode($data);
    $id_user = $_SESSION['id'];
    $sql = "INSERT INTO veterinaria(nombre,colonia,calle,codigo_postal,telefono,horario,disponible,activo,id_usuario) VALUES('$nombre','$colonia','$calle','$cp','$telefono','$json','1','1','$id_user')";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    $consulta ="UPDATE usuario SET tipo_usuario='2' WHERE id=$id_user";
    $proceso = $pdo->prepare($consulta);
    $proceso->execute();

    if (!$statement) {
        echo json_encode(array('status' => 0));
    } else {
        $result['status'] = 1;
        echo json_encode($result);
        $_SESSION['tipo_usuario']=2;
    }

?>