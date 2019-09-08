<?php
	require "db.php";

	$data = $_POST;
	$errors = array();
	$auth_next = false;

	$username        = $data['username'];
	$hwid            = $data['hwid'];
	$rank            = $data['rank'];
	$date_sub        = $data['date_sub'];

	if(strlen($username) < 5)
	{
		$errors[] = "Логин должен быть более 5 символов";
	}
	if(strlen($hwid) != 20)
	{
		$errors[] = "Введен неверный HWID";
	}
	if($rank == '')
	{
		$errors[] = "Привилегия не должна быть пустой";
	}
	if($date_sub == '')
	{
		$errors[] = "Дата не должна быть пустой";
	}
	if(R::count('users', 'username = ?', array($username)) > 0)
	{
		$errors[] = "Пользователь с таким логином уже есть";
	}

	if(empty($errors))
	{
		$auth_next = true;

		echo $auth_next;

		$user                   = R::dispense('users');
		$user->username         = $username;
		$user->hwid             = $hwid;
		$user->rank             = $rank;
		$user->date_end_sub     = $date_sub;
		R::store($user);
	}
	else
	{
		echo '<div><i class="far fa-times-circle"></i></div><div><p>'.array_shift($errors).'</p></div>';
	}
?>