<?php

include('Conexion.php');
session_start();

if (isset($_POST['txtBuscar'])) {

    $Buscar= $_POST['txtBuscar'];
    $Monto = $_POST['intMonto'];
    $Correo = $_SESSION['Correo'];
    $Descripcion = $_POST['txtDescripcion'];
    $Tipo = $_POST['txtTipo'];
    $Fecha = $_POST['txtFecha'];
    $Comision = 0.00;

    $sql5= "SELECT id FROM registro_usuario where Correo = '$Correo'"; 
    $resultado5= mysqli_query($conn,$sql5);
    $fila5= $resultado5->fetch_row();
    $id= $fila5[0];

    $sql6= "INSERT INTO movimientos(Id_Usuario,Origen,Destino,Monto,Descripción,Tipo,Fecha,Comisión) values('$id','$Correo','$Buscar','$Monto','$Descripcion','$Tipo','$Fecha','$Comision')";
    $resultado6= mysqli_query($conn,$sql6);

    if ($conn->query($sql6)===TRUE) {
        header("Location:../myaccount/transfer/request.php?guardado=1");

    }
    else{
        $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
        header("Location:../myaccount/transfer/request.php");
    }

}

?>