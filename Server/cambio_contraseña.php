<?php

include('Conexion.php');
session_start();
if (isset($_POST['txtCorreo'])) {

    $Correo = $_POST['txtCorreo'];
    $sql = "SELECT Nombre,id FROM registro_usuario WHERE Correo='$Correo'";
    $query=mysqli_query($conn,$sql);
	$array=mysqli_fetch_assoc($query);
    if (!$array) {
        $_SESSION['error']="Se ha producido un error. Inténtelo de nuevo.";
        header('Location: ../pass_recovery.php');
        die() ;
    }
    $token=md5($array['id'].time().rand(000000,999999));
    $recuperarCon=rand(100000,999999);
    $sql2   = "INSERT INTO recuperar SET Correo='$Correo',Token='$token',Fecha_alta=NOW(),RecuperarC='$recuperarCon' 
               ON DUPLICATE KEY UPDATE Token='$token',RecuperarC='$recuperarCon'";
    $query2=mysqli_query($conn,$sql2);

    $link="confirmarCambioC.php?c=$Correo&t=$token";
    $mensaje=<<<EMAIL
    <p>Hola $array[Nombre]</p>
    <p>Su nueva contraseña es: <h3>$recuperarCon</h3> Favor de ingresar al siguiente enlace: </br>
    <a href="$link">$link</a>
    </br>
    Gracias,
    </br>
    PayPal</p>
    EMAIL;
    echo $mensaje;
    /*ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "tiepaypal18@gmail.com";
    $subject = "Restablecer contraseña";
    $mensaje="
    <p>Hola $array[Nombre]</p>
    <p>Para restablecer su contraseña, ingrese el siguiente enlace: </br>
    <a>$link</a>
    </br>
    Gracias,
    </br>
    PayPal</p>";
    $headers = "From:" . $from;
    $correoEnviado=mail($Correo,$subject,$mensaje, $headers);
    if(isset($correoEnviado)){
        echo "El correo se ha enviado correctamente";
    }*/
}
?>