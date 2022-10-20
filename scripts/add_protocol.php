<?

require_once("../include/db.php");

if( isset($_POST['add_protocol']) ) {
	$event_id = $_POST['event_id'];

	// Добавляем файл на сервер
	$uploadDir = "../img/protocols";

	$type = pathinfo($_FILES['file']['name']);
	$tmp_name = $type['basename'];
	$name = $uploadDir . '/' . $tmp_name;
	move_uploaded_file($_FILES['file']['tmp_name'], $name);

	$query = "UPDATE `events` SET `protocol` = '$tmp_name' WHERE `id` = '$event_id'";
	$add_rules = mysqli_query($connection, $query);

	header("Location: ../adm_events.php");

}