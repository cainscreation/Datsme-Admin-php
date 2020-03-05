<?php


require("db_connect.php");

$title = mysqli_real_escape_string($conn, $_POST['title']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$id = mysqli_real_escape_string($conn, $_POST['id']);


// blog(btitle, bcontent, bphoto) VALUES('" . $title . "', '" . $content . "','" . $target_name . "')
$query = "UPDATE blog SET btitle='  $title  ', bcontent=' $content ' WHERE bid=$id";
$result = mysqli_query($conn,$query);
// $sql = "DELETE FROM blog WHERE
//   bid=".(int)$_REQUEST["id"];
  header("Location: dashboard.php");
?>
