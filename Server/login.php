<?php
	include("Conexion.php"); 
	session_start(); 
	$Correo=$_POST['txtEmail'];
	$Contraseña=$_POST['txtPassword'];
	$Contraseña_h = md5($Contraseña);
	$Login=$_POST['Login'];
	$sql = "SELECT COUNT(*) as contar FROM registro_usuario WHERE Correo = '$Correo' and Contraseña='$Contraseña_h'";
	$query=mysqli_query($conn,$sql);
	$array=mysqli_fetch_array($query);
	if($Login == '2'){
		$sql2= "SELECT * FROM empleados WHERE Correo = '$Correo' and Contraseña='$Contraseña_h'";
		$query2=mysqli_query($conn,$sql2);
		$datos=mysqli_fetch_array($query2);	
	}else {
		$sql2= "SELECT * FROM registro_usuario WHERE Correo = '$Correo' and Contraseña='$Contraseña_h'";
		$query2=mysqli_query($conn,$sql2);
		$datos=mysqli_fetch_array($query2);
	}
	if ($array['contar']>0){
		$_SESSION['Correo']=$Correo;
		$_SESSION['Nombre']=$datos['Nombre'];
		$_SESSION['Ap_pat']=$datos['Ap_pat'];
        $_SESSION['Id']=$datos['id'];
        $_SESSION['Summary']=TRUE;
		if ($Login == '2') {
			header("location: ../empresa/home.php"); 
		}else {
			header("location: ../myaccount/summary.php"); 
		}
	} else {
		$_SESSION['error']="Parte de su información no es correcta. Inténtelo de nuevo.";
		header("location:../signin.php");
	}		
?>