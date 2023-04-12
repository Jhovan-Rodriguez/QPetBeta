<?php
include('db_users.php');

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    
    $result = search_user($username,$password);
    $id_user = search_user_id($username);
    if (!$result) {
        echo json_encode(array('status' => 0));
    } else {
        session_start();
        $_SESSION['user'] = $username;
        $_SESSION['id'] = $id_user[0][0];
        $_SESSION['tipo_usuario'] = $result[0]['tipo_usuario'];
        $result['status'] = 1;
        echo json_encode($result);
    }
}else {
    echo json_encode(array('status' => 0));
}
?>