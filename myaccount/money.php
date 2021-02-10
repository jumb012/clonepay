<?php  
  
  include('../Server/Conexion.php'); // 
  session_start();
  $Correo = $_SESSION['Correo'];
  $sql= "SELECT id FROM registro_usuario where Correo = '$Correo'"; 
  $resultado= mysqli_query($conn,$sql);
  $fila= $resultado->fetch_row();
  $id = $fila[0];

  $sql= "SELECT Nombre_banco,Numero_cuenta FROM cuenta_bancaria where id = '$id'AND Estatus='Activo'"; 
  $resultado= mysqli_query($conn,$sql);

  $sql2= "SELECT Tipo_tarjeta,Num_tarjeta FROM tarjeta_bancaria where id = '$id'AND Estatus='Activo'"; 
  $resultado2= mysqli_query($conn,$sql2);

?>

                

<!DOCTYPE html>
<html lang="es">
<head>
    <title>PayPal: Cartera</title>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    
        <!-- jQuery -->
        <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" src="https://code.jquery.com/jquery-2.2.4.min.js">
        </script>
        <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="resources/navbar2/navbar2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="resources/global/global.css">
    <link rel="stylesheet" type="text/css" href="resources/navbar2/navbar2.css">
    <link rel="stylesheet" type="text/css" href="resources/global/listado_tarjetas.css">
</head>
<body>
    <header class="fijado">
    <?php include("components/navbar2.php"); ?>
    </header>
    <section class="contenedor container">
        <div class="row contenido">
            <div class="col-sm-4"> <!-- Inicia Columna 1 -->
                <div class="row">
                    <a class="btn" href="../banking_services/bank_account2.php">
                        <img src="resources/icons/addBankIcon_fiList.svg">
                        <h4 class="h4" style="font-size: 13px; color: #0070ba; margin-top: 20px;">Asociar una cuenta bancaria</h4>
                    </a>
                    <a class="btn" href="../banking_services/add_card2.php">
                        <img src="resources/icons/addCardIcon.svg">
                        <h4 class="h4" style="font-size: 13px; color: #0070ba; margin-top: 20px;">Asociar tarjeta</h4>
                    </a>
                </div>
                <div style="margin-top: 50px">
                    <div class="list-group" id="list-tab" role="tablist">

                        <?php $i=0; while($ver=mysqli_fetch_row($resultado)){ ?>
                        <a class="list-group-item list-group-item-action <?php if($i==0){echo "active";} ?>" id="list-bank-list-<?php echo $i;?>" data-toggle="list" href="#list-bank-<?php echo $i;?>" role="tab" aria-controls="card">
                            <div class="row">
                                <div class="col-4" style="margin-top: 5px">
                                    <img src="resources/images/generic_bank.webp" height="30px">
                                </div>
                                <div class="col-8" style="margin-left: -30px; margin-top: 5px">
                                    <?php 
                                            $Digitos = substr($ver[1], -4);
                                            echo "<h6>BANCO <span>$ver[0]</span></h6>";
                                            echo "<p style='font-size: 11px; margin-top: -8px; margin-bottom: 2px'>Cuenta ••••$Digitos</p>";
                                    ?>
                                </div>
                            </div>
                        </a> <?php $i=$i+1; } ?>

                        <?php $i=0; while($ver2=mysqli_fetch_row($resultado2)){ ?>
                        <a class="list-group-item list-group-item-action" id="list-card-list-<?php echo $i;?>" data-toggle="list" href="#list-card-<?php echo $i;?>" role="tab" aria-controls="card">
                            <div class="row">
                                <div class="col-4" style="margin-top: 5px">
                                    <?php
                                        switch ($ver2[0]) {
                                            case 'Visa':
                                                echo "<img src='resources/images/visa.png' height='30px'>";
                                                break;
                                            case 'MasterCard':
                                                echo "<img src='resources/images/mastercard.png' height='30px'>";
                                                break;
                                            case 'American Express':
                                                echo "<img src='resources/images/amex.webp' height='30px'>";
                                                break;
                                          }  
                                    ?>
                                </div>
                                <div class="col-8" style="margin-left: -30px; margin-top: 5px">
                                    <?php
                                        $Digitos2 = substr($ver2[1], -4);
                                        echo "<h6>Tarjeta <span>$ver2[0]</span></h6>";
                                        echo "<p style='font-size: 11px; margin-top: -8px; margin-bottom: 2px'>••••$Digitos2</p>";
                                    ?>
                                </div>
                            </div>
                        </a> <?php $i=$i+1; } ?>
                    </div>
                </div>
            </div> <!-- Termina Columna 1 -->
            <div class="col-sm-8"> <!-- Inicia Columna 2 -->
                <div style="margin-top: 30px">
                    <div class="tab-content" id="nav-tabContent">
                        <?php
                            $i=0;
                            $sql4= "SELECT Nombre_banco,Numero_cuenta FROM cuenta_bancaria where id = '$id' AND Estatus='Activo'"; 
                            $aux= mysqli_query($conn,$sql4);
                            while($ver=mysqli_fetch_row($aux)){
                                echo $ver[1];
                            } 
                        ?>
                    </div>
                </div>
            </div> <!-- Termina Columna 2 -->
        </div>
    </section>
</body>
</html>