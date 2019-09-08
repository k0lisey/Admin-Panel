<?php
	require "db.php";

	$data = $_POST;
	$errors = array();
	$auth_next = false;

	$key_value = $data['key_value'];

	if (R::count('kluchi', 'kluch = ?', array($key_value)) > 0)
	{
		$errors[] = "Такой ключ уже есть";
	}

	if (empty($errors))
	{
		$auth_next = true;

		echo $auth_next;

		$user = R::dispense('kluchi');
		$user->kluch = $key_value;
		R::store($user);
	}
	else
	{
		echo '<div><i class="far fa-times-circle"></i></div><div><p>'.array_shift($errors).'</p></div>';
	}
?>