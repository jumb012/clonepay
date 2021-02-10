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

    $sql= "SELECT Saldo FROM registro_usuario where Correo = '$Buscar'"; 
    $resultado= mysqli_query($conn,$sql);
    $fila= $resultado->fetch_row();
    $Saldo= $fila[0];

    $SaldoAct = $Saldo + $Monto;

    $sql2= "UPDATE registro_usuario set Saldo = '$SaldoAct' where Correo = '$Buscar'";
    $resultado2= mysqli_query($conn,$sql2);

    $sql3= "SELECT Saldo FROM registro_usuario where Correo = '$Correo'"; 
    $resultado3= mysqli_query($conn,$sql3);
    $fila2= $resultado3->fetch_row();
    $Saldo2= $fila2[0];

    $SaldoAct2 = $Saldo2 - $Monto;

    $sql4= "UPDATE registro_usuario set Saldo = '$SaldoAct2' where Correo = '$Correo'";
    $resultado4= mysqli_query($conn,$sql4);
    if ($conn->query($sql4)===TRUE) {
        header("Location:../myaccount/transfer/pay.php?guardado=1");

    }
    else{
        $_SESSION['error']="Ha ocurrido un error al registrar su cuenta, intentelo de nuevo.";
        header("Location:../signin.php");
    }

}

?>