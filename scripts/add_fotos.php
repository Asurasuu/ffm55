<?

require_once("../include/db.php");

if( isset($_POST['add_fotos']) ) {
	$errors = 0; // Счётчик ошибок

	// Данные
	$title = $_POST['title'];
	$link = $_POST['link'];

	// Нужно для добавления файла
	$uploadDir = "../img/covers/fotos";

	$type = pathinfo($_FILES['cover']['name']);
	$tmp_name = uniqid('files_') .'.'. $type['extension'];
    $name = $uploadDir .'/'. $tmp_name;
	move_uploaded_file($_FILES['cover']['tmp_name'], $name);

	if( $errors == 0) {
		$add_new = mysqli_query($connection, "INSERT INTO `fotos` (title, cover, link, day, month, year) VALUES ('$title', '$tmp_name', '$link', '" . date('d') . "', '" . date('m') . "', '" . date('y') . "')");

		if( $add_new ) {
			header("Location: ../adm_fotos.php");
		} else {
			header("Location: ../adm_fotos_add.php");
		}
	} else {
		header("Location: ../adm_fotos_add.php");
	}
}