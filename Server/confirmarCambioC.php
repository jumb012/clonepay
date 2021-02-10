<?php
    include 'Conexion.php';
    session_start();
    $Correo=$_GET['c'];
    $token=$_GET['t'];
    $sql = "SELECT RecuperarC FROM recuperar WHERE Correo='$Correo' AND Token='$token'";
    $query=mysqli_query($conn,$sql);
	$array=mysqli_fetch_array($query);
    var_dump($sql); echo "</br>";
    var_dump($query);
    if (!$array) {
        $_SESSION['error']="Se ha producido un error. Inténtelo de nuevo.";
        header('Location: ../pass_recovery.php');
        die() ;
    }
    $Contraseña=$array['RecuperarC'];
    $Contraseña_h=md5($Contraseña);
    $sql2="UPDATE registro_usuario SET Contraseña='$Contraseña_h' WHERE Correo='$Correo'";
    $query2=mysqli_query($conn,$sql2);
    $sql3="DELETE FROM recuperar WHERE Correo='$Correo'";
    $query3=mysqli_query($conn,$sql3);
    $_SESSION['rpt']="La contraseña ha sido actualizada, Inicie Sesión para verificar.";
    header('Location: ../signin.php');
?>