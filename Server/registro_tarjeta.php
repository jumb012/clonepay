<?php
 
include('Conexion.php');
session_start();
 
if (isset($_POST['registro'])) {
 
    $Num_tarjeta = $_POST['Num_tarjeta'];
    $Tipo_tarjeta = $_POST['Tipo_tarjeta'];
    $Vencimiento = $_POST['Vencimiento'];
    $Codigo_seguridad = $_POST['Codigo_seguridad'];
    $Direccion_tarjeta = $_POST['Direccion_tarjeta'];
    
 
        $query = $connection->prepare("INSERT INTO tarjeta_bancaria(Num_tarjeta,Tipo_tarjeta,Vencimiento,Codigo_seguridad,Direccion_tarjeta) VALUES (:Num_tarjeta, :Tipo_tarjeta, :Vencimiento, :Codigo_seguridad, :Direccion_tarjeta)");
        $query->bindParam("Num_tarjeta", $Num_tarjeta, PDO::PARAM_STR);
        $query->bindParam("Tipo_tarjeta", $Tipo_tarjeta, PDO::PARAM_STR);
        $query->bindParam("Vencimiento", $Vencimiento, PDO::PARAM_STR);
        $query->bindParam("Codigo_seguridad", $Codigo_seguridad, PDO::PARAM_STR);
        $query->bindParam("Direccion_tarjeta", $Direccion_tarjeta, PDO::PARAM_STR);
        
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Tu registro fue exitoso!</p>';
            return ;
        }
        else {
            echo '<p class="error">Algo fue mal!</p>';
        }
    }
 
?>

	