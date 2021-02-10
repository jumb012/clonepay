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
                        <h2 class="h2">Administrar artículos</h2>
                        <button class="ml-auto btn btn-primary" data-toggle="modal" data-target="#modalAgregar">Agregar nuevo articulo</button>
                    </div>
                    <div class="table-responsive" style="margin-top: 20px">
                        <h6 class="h6" style="background-color: #f2f2f2; padding: 5px;margin-bottom: -1px">Tiene 1 artículo guardado</h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre del artículo</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Divisa</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Regadera</td>
                                    <td>Sirve para bañarse</td>
                                    <td>MXN</td>
                                    <td>100.00</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-primary">Editar</button>
                                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item">Eliminar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- Termina Columna 1 -->
            <!-- MODALES -->
            <!-- MODAL AGREGAR NUEVO -->
            <div class="modal fade" id="modalAgregar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar nuevo artículo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="NombreArticulo">Nombre del articulo</label>
                                <input class="form-control" type="text" id="NombreArticulo">
                            </div>
                            <div class="form-group">
                                <label for="Descripcion">Descripción</label>
                                <textarea class="form-control" type="text" id="Descripcion" rows="3"></textarea>
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label for="precio">Precio</label>
                                    <input class="form-control" type="text" id="precio">
                                </div>
                                <div class="col">
                                    <label for="divisa">Divisa</label>
                                    <input class="form-control" type="text" id="divisa" placeholder="MXN - Peso mexicano" readonly>
                                </div>
                                <div class="col">
                                    <label for="impuesto">Impuesto</label>
                                    <input class="form-control" type="number" id="impuesto" min="0">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>