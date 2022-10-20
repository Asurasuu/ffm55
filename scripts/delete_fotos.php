<?

require_once("../include/db.php");

$foto_id = $_GET['id'];

$delete_user = mysqli_query($connection, "DELETE FROM `fotos` WHERE `id` = '$foto_id'");

header("Location: ../adm_fotos.php");