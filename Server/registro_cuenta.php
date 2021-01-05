<?php
 
include('Conexion.php');
session_start();
 
if (isset($_POST['registro'])) {
 
    $Nombre_Banco = $_POST['Nombre_Banco'];
    $Numero_Cuenta = $_POST['Numero_Cuenta'];
    $Nombre_Completo = $_POST['Nombre_Completo'];
    
 
        $query = $connection->prepare("INSERT INTO cuenta_bancaria(Nombre_Banco,Numero_Cuenta,Nombre_Completo) VALUES (:Nombre_Banco, :Numero_Cuenta, :Nombre_Completo)");
        $query->bindParam("Nombre_Banco", $Nombre_Banco, PDO::PARAM_STR);
        $query->bindParam("Numero_Cuenta", $Numero_Cuenta, PDO::PARAM_STR);
        $query->bindParam("Nombre_Completo", $Nombre_Completo, PDO::PARAM_STR);
        
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Tu registro fue exitoso!</p>';
            return ;
        }else {
            echo '<p class="error">Algo fue mal!</p>';
        }
    }
 
?>