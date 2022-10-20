<?

require_once("../include/db.php");

$new_id = $_GET['id'];

$delete_user = mysqli_query($connection, "DELETE FROM `news` WHERE `id` = '$new_id'");

header("Location: ../adm_news.php");