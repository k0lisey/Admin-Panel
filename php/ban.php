<?php
    require "db.php";

    $data = $_POST;
    $auth_next = false;
    $id = $data['id'];

    $user_ban = R::load('users', $id);
    $user_ban->ban = 1;
    R::store($user_ban);

    $auth_next = true;
    echo $auth_next;
?>
