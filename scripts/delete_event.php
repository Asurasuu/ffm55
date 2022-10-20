<?

require_once("../include/db.php");

$event_id = $_GET['id'];

$delete_event = mysqli_query($connection, "DELETE FROM `events` WHERE `id` = '$event_id'");

header("Location: ../adm_events.php");