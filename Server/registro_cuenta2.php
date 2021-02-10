<?php
 
include('Conexion.php');
session_start();
 
if (isset($_POST['registro'])) {
 
    $Nombre_banco = $_POST['Nombre_banco'];
    $Numero_cuenta = $_POST['Numero_cuenta'];
    $Estatus = $_POST['Estatus'];
    $ID = $_POST['ID'];
    
    $sql= "INSERT INTO cuenta_bancaria(Nombre_banco,Numero_cuenta,Estatus,ID) 
    VALUES ('$Nombre_banco','$Numero_cuenta','$Estatus','$ID')";
    if ($conn->query($sql)===TRUE) {
        header("Location:../myaccount/money.php");
    }else{
        $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
        header('Location:../banking_services/bank_account2.php');
    }
    }
 
?>