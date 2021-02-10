<?php
 
include('Conexion.php');
session_start();
 
if (isset($_POST['registro'])) {
 
    $Num_tarjeta = $_POST['Num_tarjeta'];
    $Tipo_tarjeta = $_POST['Tipo_tarjeta'];
    $Vencimiento = $_POST['Vencimiento'];
    $Codigo_seguridad = $_POST['Codigo_seguridad'];
    $ID = $_POST['ID'];
    $Estatus = $_POST['Estatus'];
    
 
        $sql= "INSERT INTO tarjeta_bancaria(Num_tarjeta,Tipo_tarjeta,Vencimiento,Codigo_seguridad,ID,Estatus) 
    VALUES ('$Num_tarjeta','$Tipo_tarjeta','$Vencimiento','$Codigo_seguridad','$ID','$Estatus')";
    if ($conn->query($sql)===TRUE) {
        header("Location:../myaccount/money.php");
    }else{
        $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
        header('Location:../banking_services/add_card2.php');
    }
}
 
?>

	