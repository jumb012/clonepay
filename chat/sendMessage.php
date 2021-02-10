<?php

include "../../Server/Conexion.php"; 
session_start();
if($_POST)
{
	$Nombre=$_SESSION['Nombre'];
    $Mensaje=$_POST['txtMensaje'];
	$id=$_POST['id'];
	$sql="INSERT INTO chat(id_user,Nombre, Mensaje) VALUES ('$id','$Nombre', '$Mensaje')"; 
	$query = mysqli_query($conn,$sql);
	if($query)
	{
		$_SESSION['id']=$id;
		header('Location: index.php');		
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}
?>