<!DOCTYPE html>
<html lang="es">
<head>
	<title>PayPal: enviar pago</title>
    <?php
    if(isset($_GET['guardado']))
        {

            echo "<script>alert('Datos guardados correctamente');</script>";
        }

     ?>
	<meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    
        <!-- jQuery -->
        <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" src="https://code.jquery.com/jquery-2.2.4.min.js">
        </script>
        <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="../resources/navbar2/navbar2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../resources/global/global.css">
    <link rel="stylesheet" type="text/css" href="../resources/navbar2/navbar2.css">
</head>
<body>
    <script type="text/javascript">$(function () {
  $('[data-toggle="popover"]').popover()
})</script>
	<header class="fijado">
	<?php include("components/navbar2.php"); ?>
    </header>
    <ul class="nav justify-content-center nav_eys">
        <li class="nav-item eys-op actual" style="margin-left: 0px;">
          <a class="nav-link btn" href="pay.php" style="color: #0070ba"><h4 style="font-size: 18px; margin-top: 11px;">Enviar</h4></a>
        </li>
        <li class="nav-item eys-op">
          <a class="nav-link btn" href="request.php">Solicitar</a>
        </li>
        <li class="nav-item eys-op">
          <a class="nav-link btn" href="contact-list.php">Contactos</a>
        </li>
    </ul>
    <section class="contenedor container">                
        <div class="row contenido" style="margin-top: -70px">
            <div class="col-sm-7"> <!-- Inicia Columna 1 -->
                <div class="row" style="background-color: white; height: 100%; border-radius: 5px;">
                    <div class="col" style="margin: 30px;">
                    <h5 class="h5" style="color: #333;">Enviar pagos</h5>
                    <form class="form-group" style="margin-top: 25px" method="post" action="../../Server/enviar_dinero.php">
                        <input class="form-control" style="height: 50px" type="text" placeholder="Correo electrónico" name="txtBuscar">
                        <input class="form-control" style="height: 50px" type="number" step=".01" placeholder="Monto" name="intMonto">
                        <input class="form-control" style="height: 50px" type="text" placeholder="Descripcion" name="txtDescripcion">
                        <input type="hidden" name="txtTipo" value="transferencia">
                        <input type="datetime-local" name="txtFecha" value="<?php echo date("Y-m-d");?>" hidden>
                        <div class="row" style="position: relative; margin-top: 30px;">
                            <button class="btn btn-primary" type="summit" style="margin-left: 15px; border-radius: 30px; height: 50px; width: 120px;">Siguiente</button>
                            <a 
                            class="btn"
                            tabindex="0" 
                            data-toggle="popover"
                            data-placement="bottom"
                            data-content="Envíe pagos a cualquier persona que tenga una dirección de correo electrónico o número de teléfono celular y se abonará en su cuenta de PayPal. Si el destinatario todavía no tiene una cuenta de PayPal, podrá crear una gratis en cuestión de segundos." 
                            style="position: absolute; top: 0; right: 0;">
                                <h6 class="h6" style="font-size: 12px">¿Cómo funciona?</h6>
                            

                        </div>
                    </form></div>
                    </a>
                </div>
            </div> <!-- Termina Columna 1 -->
            <div class="col-sm-5"> <!-- Inicia Columna 2 -->
            </div> <!-- Termina Columna 2 -->
        </div>
    </section>
</body>
</html>