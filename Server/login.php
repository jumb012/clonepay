<?php
	session_start(); 
	$Correo=$_POST['txtCorreo'];
	$Contraseña=$_POST['txtContraseña'];
	include("Conexion.php"); 
	//$CorreoProtegido = mysqli_real_escape_string($con,(strip_tags($Correo,ENT_QUOTES)));
	$Password_hash =  md5($Contraseña);
	$sql = "SELECT COUNT(*) as contar FROM registro_usuario WHERE Correo = '$Correo' and Contraseña='$Contraseña'";
	$query=mysqli_query($conn,$sql);
	$array=mysqli_fetch_array($query);
	if ($array['contar']>0){
		$_SESSION['Correo']=$Correo;
		header("location: ../profile"); 
	} else {
		$_SESSION['error']="Parte de su información no es correcta. Inténtelo de nuevo.";
		header("location:../signin");	
	}		

?>