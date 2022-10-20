<?

require_once("../include/db.php");

$user_id = $_GET['id'];

$delete_user = mysqli_query($connection, "DELETE FROM `users` WHERE `id` = '$user_id'");

header("Location: ../adm_users.php");