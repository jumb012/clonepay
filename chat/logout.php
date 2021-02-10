<?php
include("../../Server/Conexion.php");
$id=$_GET['i'];
$sql="DELETE FROM chat WHERE id_user = '$id'";
$query = mysqli_query($conn,$sql);
header('Location: ../../myaccount/summary.php');

?>