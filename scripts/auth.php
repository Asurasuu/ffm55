<?php

require_once("../include/db.php");

if( isset($_POST['auth']) ) {
	$errors = 0; // Счётчик ошибок

	// Данные
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Делаем запрос на пользователя
	$user_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");

	if( mysqli_num_rows($user_query) > 0 ) {
		$user = mysqli_fetch_array($user_query);
		$password_hash = $user['password'];
	} else {
		$errors++;
	}

	if( password_verify($password, $password_hash) == false ) {
		$errors++;
	} 

	if( $errors != 0 ) {
		header("Location: ../login.php");
	} else {
		if( isset($_SESSION['event']) and !empty($_SESSION['event']) ) {
			$_SESSION['id'] = $user['id'];
			header("Location: ../reader.php?type=event&id=" . $_SESSION['event']);
			$_SESSION['event'] = '';
		} else {
			$_SESSION['id'] = $user['id'];
			header("Location: ../user.php");
		}
	}
}