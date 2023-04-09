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
        $result['status'] = 1;
        echo json_encode($result);
        // if (password_verify($password, $result['PASSWORD'])) {
        //     $_SESSION['user_id'] = $result['ID'];
        //     echo '<p class="success">Congratulations, you are logged in!</p>';
        // } else {
        //     echo '<p class="error">Username password combination is wrong!</p>';
        // }
    }
}else {
    echo json_encode(array('status' => 0));
}
?>