<?php

include('Conexion.php');
session_start();

if (isset($_POST['seleccionar'])) {

    $Num_tarjeta= $_POST['Num_tarjeta'];
    $ID = $_POST['ID'];
    $id_h= $_POST['id_h'];
    
 
    $sql= "UPDATE tarjeta_bancaria set Preferido = 'Si' where Num_tarjeta = '$Num_tarjeta'";
    if ($conn->query($sql)===TRUE) {
        header("Location:../myaccount/summary.php?id_h=$id_h");
    }
    else{
        $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
        header('Location:../banking_services/select_pay_method.php?id_h=$id_h');
    }

}

?>