<?php
	require "db.php";

	$data = $_POST;
	$errors = array();
	$auth_next = false;

	$username        = $data['username'];
	$password        = $data['password'];
	$rank            = $data['rank'];
	$ip              = $_SERVER['REMOTE_ADDR'];

	if($username == '')
	{
		$errors[] = "Username can't is empty";
	}
	if($password == '')
	{
		$errors[] = "Password can't is empty";
	}

	if(empty($errors))
	{
		$auth_next = true;

		echo $auth_next;

		$admin           = R::dispense('admin');
		$admin->username = $username;
		$admin->password = password_hash($password, PASSWORD_DEFAULT);
		$admin->rank     = $rank;
		$admin->ip       = $ip;
		R::store($admin);

		$_SESSION['logged_admin'] = $admin;
	}
	else
	{
		echo '<div><i class="far fa-times-circle"></i></div><div><p>'.array_shift($errors).'</p></div>';
	}
?>