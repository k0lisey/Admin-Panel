<?php
require "db.php";

$data = $_POST;
$errors = array();
$auth = false;

$username  = $data['username'];
$password  = $data['password'];

if ($username == '')
{
	$errors[] = 'Логин не должен быть пустым';
}
if ($password == '')
{
	$errors[] = 'Пароль не должен быть пустым';
}

if (empty($errors))
{
	$admin = R::findOne('admin', 'username = ?', array($data['username']));
	$errors = array();

	if ($admin)
	{
		if(password_verify($password, $admin->password))
		{
			$auth = true;

			echo $auth;

			$_SESSION['logged_admin'] = $admin;

		}
		else
		{
			$errors[] = 'Неверный пароль';
		}
	}
	else
	{
		$errors[] = 'Пользователь не найден';
	}

	if(!empty($errors))
	{
		echo '<div><i class="far fa-times-circle"></i></div><div><p>'.array_shift($errors).'</p></div>';
	}
}
else
{
	echo '<div><i class="far fa-times-circle"></i></div><div><p>'.array_shift($errors).'</p></div>';
}
?>
