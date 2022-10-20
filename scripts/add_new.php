<?

require_once("../include/db.php");

if( isset($_POST['add_new']) ) {
	$errors = 0; // Счётчик ошибок

	// Данные
	$title = $_POST['title'];
	$text = $_POST['text'];

	// Нужно для добавления файла
	$uploadDir = "../img/covers/news";

	$type = pathinfo($_FILES['cover']['name']);
	$tmp_name = uniqid('files_') .'.'. $type['extension'];
    $name = $uploadDir .'/'. $tmp_name;
	move_uploaded_file($_FILES['cover']['tmp_name'], $name);

	if( $errors == 0) {
		$add_new = mysqli_query($connection, "INSERT INTO `news` (title, cover, text, day, month, year) VALUES ('$title', '$tmp_name', '$text', '" . date('d') . "', '" . date('m') . "', '" . date('y') . "')");

		if( $add_new ) {
			header("Location: ../adm_news.php");
		} else {
			header("Location: ../adm_news_add.php");
		}
	} else {
		header("Location: ../adm_news_add.php");
	}
}