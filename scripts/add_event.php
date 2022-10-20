<?

require_once("../include/db.php");

if( isset($_POST['add_event']) ) {
	$errors = 0; // Счётчик ошибок

	// Данные
	$title = $_POST['title'];
	$text = $_POST['text'];
	$palace = $_POST['palace'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	// Нужно для добавления файла
	if( isset($_FILES['cover']) && ($_FILES['cover']['name'] != "" or $_FILES['cover'] != null)) {
		$uploadDir = "../img/covers/events";

		$type = pathinfo($_FILES['cover']['name']);
		
		if( $type != "" ) {
			$tmp_name = uniqid('files_') .'.'. $type['extension'];
	    	$name = $uploadDir .'/'. $tmp_name;
			move_uploaded_file($_FILES['cover']['tmp_name'], $name);
		}
	}

	if( $errors == 0) {
		$add_event = mysqli_query($connection, "INSERT INTO `events` (`title`, `cover`, `text`, `palace`, `day`, `month`, `year`) VALUES ('$title', '$tmp_name', '$text', '$palace','$day', '$month', '$year')");

		if( $add_event ) {
			header("Location: ../adm_events.php");
		} else {
			header("Location: ../adm_events_add.php");
		}
	} else {
		header("Location: ../adm_events_add.php");
	}
}