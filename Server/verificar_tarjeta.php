<?php

include('Conexion.php');
session_start();

if (isset($_POST['cambio'])) {

    $Num_tarjeta = $_POST['Num_tarjeta'];
    $verificada = $_POST['cambio'];
    
 
    $query = $connection->prepare("UPDATE tarjeta_bancaria set verificada=:verificada WHERE Num_tarjeta=:Num_tarjeta");
        $query->bindParam("Num_tarjeta", $Num_tarjeta, PDO::PARAM_STR);
        $query->bindParam("verificada", $verificada, PDO::PARAM_STR);
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