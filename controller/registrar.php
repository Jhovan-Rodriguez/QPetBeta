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
    $password=md5($_REQUEST['pass']);
    $password=$_REQUEST['pass'];


    $usuario=search($user);
    if(count($usuario)==0){
        $sql = "INSERT INTO usuarios(username,password) VALUES('$user','$password')";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        if (!$statement) {
            echo json_encode(array('status' => 0));
        } else {
            $result['status'] = 1;
            echo json_encode($result);
            // if (password_verify($password, $result['PASSWORD'])) {
            //     $_SESSION['user_id'] = $result['ID'];
            //     echo '<p class="success">Congratulations, you are logged in!</p>';
            // } else {
            //     echo '<p class="error">Username password combination is wrong!</p>';
            // }
        }
    }else{
        echo json_encode(array('status' => 0));
    }

?>