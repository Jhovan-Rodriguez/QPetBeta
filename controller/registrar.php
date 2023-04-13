<?php
    include("connection.php");
    include("db_users.php");

    global $pdo;
    $nombre=$_REQUEST['nombre'];
    $username=$_REQUEST['username'];
    $apellido_p=$_REQUEST['apellido_p'];
    $apellido_m=$_REQUEST['apellido_m'];
    $email=$_REQUEST['email'];
    $tel=$_REQUEST['telefono'];
    $genero=$_REQUEST['genero'];
    $fecha_nac=$_REQUEST['fecha_nac'];
    $password=$_REQUEST['pass'];

    $usuario=search($username);
    if(count($usuario)==0){
        $sql = "INSERT INTO usuario(username,nombre,apellido_p,apellido_m,telefono,email,fecha_nacimiento,genero,password,tipo_usuario) VALUES('$username','$nombre','$apellido_p','$apellido_m','$tel','$email','$fecha_nac','$genero','$password','1')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        if (!$statement) {
            echo json_encode(array('status' => 0));
        } else {
            $result['status'] = 1;
            echo json_encode($result);
        }
    }else{
        echo json_encode(array('status' => 0));
    }

?>