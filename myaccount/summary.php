<!DOCTYPE html>
<html lang="es">
<head>
	<title>PayPal: Resumen</title>
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
</head>
<?php 
    include("../Server/Conexion.php");
    session_start();
    $Correo=$_SESSION['Correo'];
    $Nombre=$_SESSION['Nombre'];
    if(!isset($Correo)){
        header("location: Server/login.php");
    }
    $sql="SELECT Saldo FROM registro_usuario WHERE Correo ='$Correo'";
    $resultado= mysqli_query($conn,$sql);
    $fila= $resultado->fetch_row();
    $Saldo= $fila[0];
?>   
<body>
	<header class="fijado">
	<?php include("components/navbar2.php"); ?>
    </header>
    <section class="contenedor container">
        <div class="row contenido">
            <div class="col-sm-7"> <!-- Inicia Columna 1 -->
                <label><h1 class="display-4" style="font-size: 30px; font-weight: 400">Hola, <span><?= $Nombre?></span></h1></label>
                <div class="row">
                    <div class="col-lg-11 cmp" style="padding-left: 25px; padding-right: 25px">
                        <a class="btn" href="money.php"><h5 class="h6" style="color: #0070ba; margin-top: 10px">Nuevos pagos recibidos</h5></a>
                        <br>
                        <label><h3 class="display-4" style="font-size: 50px; margin-top: -10px;margin-bottom: -7px">$ <?php echo $Saldo ?></h3></label>
                        <br>
                        <label><h1 class="h6" style="font-size: 12.5px; margin-left: 30px; color: #687173">
                            Las transferencias automáticas a su cuenta bancaria empiezan a las 12 a. m. CT.
                        </h1></label>
                    </div>
                    <div class="col-lg-11 temporal" style="color: white; padding-left: 25px; padding-right: 25px">
                        <label><h1 class="h5" style="margin-top: 10px; margin-bottom: -5px">Obtenga sus primeros 3 meses de Spotify Premium sin costo</h1></label>
                        <label><h1 class="h6" style="font-size: 15px;">Aplican términos</h1></label>
                    </div>
                </div>
                <hr class="grosor">
                <div class="row">
                    <div class="col-3">
                        <div class="icon_rebajas"></div>
                    </div>
                    <div class="col-9">
                        <label><h1 class="h4" style="font-size: 16.5px; color: #0070ba">Compra en todo el mundo de forma segura</h1></label>
                        <label><h1 class="display-4" style="font-size: 17px; margin-top: -10px; font-weight: 400;">
                            No importa lo que estés buscando, descubre grandes ofertas de millones de tiendas en línea a nivel mundial.
                        </h1></label>
                    </div>
                </div>
            </div> <!-- Termina Columna 1 -->
            <div class="col-sm-5"> <!-- Inicia Columna 2 -->
                <div class="row" style="margin-top: 20px">
                    <a href="./transfer/pay.php" style="margin-left: 20px">
                        <section style="height: 50px; width: 50px; background-color: rgb(0, 94, 166); border-radius: 50%; display: grid; align-items: center;"><div class="icon_enviar" style="margin-left: 5px"></div></section>
                        <h6 class="h6" style="margin-left: 3px; color: black">Enviar</h6>
                    </a>
                    <a href="./transfer/request.php" style="margin-left: 70px">
                        <section style="margin-left: 3px;height: 50px; width: 50px; background-color: rgb(0, 94, 166); border-radius: 50%; display: grid; align-items: center;"><div class="icon_solicitar" style="margin-left: 5px"></div></section>
                        <h6 class="h6" style="color: black">Solicitar</h6>
                    </a>
                </div>
                <h5 class="h6" style="color: #0070ba; margin-top: 25px">Movimientos recientes</h5>
                <label><h1 class="display-4" style="font-size: 18px; font-weight: 400;padding-right: 30px">
                    Consulte los pagos enviados y recibidos.<br> Aquí encontrará sus movimientos recientes con PayPal.
                </h1></label>
                <a href="#">Ver todos los movimientos</a>
            </div> <!-- Termina Columna 2 -->
        </div>
    </section>
</body>
</html>