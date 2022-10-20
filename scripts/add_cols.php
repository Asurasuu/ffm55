<?

require_once("../include/db.php");

$user_id = $_GET['user'];
$event_id = $_GET['event'];

$add_cols = mysqli_query($connection, "INSERT INTO `cols` (user_id, event_id) VALUES ('$user_id', '$event_id')");

header("Location: ../reader.php?type=event&id=$event_id");