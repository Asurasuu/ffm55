<?php

require_once("../include/db.php");

if( isset($_POST['reg']) ) {
	// Счётчик не совпадений(ошибок), надо бы сделать массив ошибок, чтобы выводить, но пока что так
	$error = 0;

	// Набор данных, полученных с формы. Они заведомо отправляются полными
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password_one = $_POST['password-one'];
	$password_two = $_POST['password-two'];

	//Проверки паролей

	$user_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");

	if( mysqli_num_rows($user_query) ) {
		$errors++;
	}

	if( strlen($password_one) >= 8 and strlen($password_two) >= 8 and $password_two == $password_one ) {
		$password = password_hash($password_one, PASSWORD_BCRYPT);
	} else {
		$error++;
	}

	if( $error != 0 ) {
		header("Location: ../registration.php");
	} else {
		$query = mysqli_query($connection, "INSERT INTO users (name, surname, lastname, email, password) VALUES ('$name', '$surname', '$lastname', '$email', '$password')");

		if( $query ) {
			if( isset($_SESSION['event']) and !empty($_SESSION['event']) ) {
				$_SESSION['id'] = mysqli_insert_id($connection);
				header("Location: ../reader.php?type=event&id=" . $_SESSION['event']);
				$_SESSION['event'] = '';
			} else {
				$_SESSION['id'] = mysqli_insert_id($connection);
				header("Location: ../user.php");
			}
		}
	}
}