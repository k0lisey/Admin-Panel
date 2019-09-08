<?php
    require "db.php";

    $data = $_POST;
    $auth_next = false;
    $id = $data['id'];

    $user_delete = R::load('users', $id);
    R::trash($user_delete);

    $auth_next = true;
    echo $auth_next;
?>
