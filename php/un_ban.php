<?php
    require "db.php";

    $data = $_POST;
    $auth_next = false;
    $id = $data['id'];

    $user_un_ban = R::load('users', $id);
    $user_un_ban->ban = 0;
    R::store($user_un_ban);

    $auth_next = true;
    echo $auth_next;
?>