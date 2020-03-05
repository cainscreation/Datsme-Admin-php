<?php


require("db_connect.php");
$id=$_GET['id'];

$query = "DELETE FROM blog WHERE bid=$id";

$result = mysqli_query($conn,$query);
// $sql = "DELETE FROM blog WHERE
//   bid=".(int)$_REQUEST["id"];
  header("Location: dashboard.php");
?>
