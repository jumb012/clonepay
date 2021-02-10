<!DOCTYPE html>
<html lang="es">
<head>
	<title>Formato de pago</title>
	<meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    
        <!-- jQuery -->
        <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" src="https://code.jquery.com/jquery-2.2.4.min.js">
        </script>
        <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="../resources/navbar2/navbar2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../resources/global/global.css">
    <link rel="stylesheet" type="text/css" href="../resources/navbar2/navbar2.css">
</head>
<body>
	<script type="text/javascript">
		$(function () {
  			$('[data-toggle="popover"]').popover()
		})
		$('.popover-dismiss').popover({
  			trigger: 'focus'
		})
	</script>
	<header class="fijado">
	<?php include("components/navbar2.php"); ?>
    </header>
    <section class="contenedor container">
        <div class="row contenido">
            <div class="col-12"> <!-- Inicia Columna 1 -->
                <div style="background-color: white; width: 100%; border-radius: 5px; border: 1px solid #80808066; padding: 20px;">
                    <?php include("components/navInterno.php"); ?>
                    <div class="row" style="padding: 20px">
                        <h2 class="h2">Administrar formatos de pago</h2>
                        <button class="ml-auto btn btn-primary">Crear formato de pago</button>
                    </div>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">N.° de formato</th>
                                    <th scope="col">Destinatario</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acción</th>
                                    <th scope="col">Importe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center">No ha creado ningún formato de pago</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Termina Columna 1 -->
        </div>
    </section>
</body>
</html>