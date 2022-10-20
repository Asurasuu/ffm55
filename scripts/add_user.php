<?

require_once("../include/db.php");

if( isset($_POST['add_user']) ) {
	$errors = 0; // Счётчик ошибок

	// Данные
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	// Проверяем e-mail
	$user_query = mysqli_query($connection, "SELECT * FROM `users` WHERE `email` = '$email'");

	if( mysqli_num_rows($user_query) > 0 ) {
		$errors++;
	}

	if( $errors == 0 ) {
		$add_user = mysqli_query($connection, "INSERT INTO `users` (name, surname, lastname, email, password) VALUES ('$name', '$surname', '$lastname', '$email', '$password')");

		if( $add_user ) {
			header("Location: ../adm_users.php");
		} else {
			header("Location: ../adm_users_add.php");
		}
	} else {
		header("Location: ../adm_users_add.php");
	}
}