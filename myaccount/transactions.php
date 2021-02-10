<!DOCTYPE html>
<html lang="es">

<head>
    <title>PayPal: Resumen</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    <!-- jQuery -->
    <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        src="https://code.jquery.com/jquery-2.2.4.min.js">
    </script>
    <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="resources/navbar2/navbar2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="resources/global/global.css">
    <link rel="stylesheet" type="text/css" href="resources/navbar2/navbar2.css">
</head>

<body>
    <?php 
    include('../Server/Conexion.php');
    session_start();
    $Correo=$_SESSION['Correo'];
    $Nombre=$_SESSION['Nombre'];
    if($_POST['buscar']){
        if (empty($_POST['txtBuscar'])) {
            if(!empty($_POST['dateFechaI'])){
                $fechaInicial=$_POST['dateFechaI'];
                if ($_POST['dateFechaF']) {
                    $fechaFinal=$_POST['dateFechaF'];
                    $sql="SELECT * FROM movimientos WHERE   Fecha  BETWEEN '$fechaInicial' AND '$fechaFinal'";
                    $query=mysqli_query($conn,$sql);
                    $Count=mysqli_num_rows($query);
                    $placeHolderFec="$fechaInicial";
                    $placeHolderFec2="$fechaFinal";
                    $placeHolderMov="Buscar movimientos";
                    if(mysqli_num_rows($query)>0) {
                        $mensajeColumnas="$Count resultado(s) encontrado(s) del <b>$fechaInicial</b> al <b>$fechaFinal</b>";
                        $link="<a href='../makepdf/index.php?c=$Correo&n=$Nombre&fi=$fechaInicial&ff=$fechaFinal&b=1' target='_blank'>Descargar</a></div>";
                    }else{
                        $mensajeColumnas="No se han encontrado resultados del <b>$fechaInicial</b> al <b>$fechaFinal</b>";
                        $link="<a href='transactions.php'>Volver a todas las transacciones</a>";
                    }                    
                }else{
                    $sql="SELECT * FROM movimientos WHERE   Fecha  LIKE '%$fechaInicial%' ";     
                    $query=mysqli_query($conn,$sql);
                    $Count=mysqli_num_rows($query);
                    $placeHolderFec="$fechaInicial";
                    $placeHolderFec2="dd/mm/aaaa";
                    $placeHolderMov="Buscar movimientos";
                    if (mysqli_num_rows($query)>0){
                        $mensajeColumnas="$Count resultado(s) encontrado(s) para la fecha <b>$fechaInicial</b>";
                        $link="<a href='../makepdf/index.php?c=$Correo&n=$Nombre&fi=$fechaInicial&b=1' target='_blank'>Descargar</a></div>";
                    }else{
                        $mensajeColumnas="No se han encontrado resultados para la fecha <b>$fechaInicial</b>";
                        $link="<a href='transactions.php'>Volver a todas las transacciones</a>";
                    }    
                }
            }

        }else{
			$buscar=$_POST['txtBuscar'];
            $sql="SELECT * FROM movimientos WHERE  Tipo  LIKE  '%$buscar%' OR  Destino LIKE  '%$buscar%' OR Monto LIKE  '%$buscar%' OR Descripción LIKE  '%$buscar%' OR Fecha  LIKE  '%$buscar%'";
            $query=mysqli_query($conn,$sql);
            $Count=mysqli_num_rows($query);
            $placeHolderMov="$buscar";
            $placeHolderFec2="dd/mm/aaaa";
            $placeHolderFec="dd/mm/aaaa";
            if (mysqli_num_rows($query)>0) {
                $mensajeColumnas="$Count resultado(s) encontrado(s) para <b>$buscar</b>";
                $link="<a href='../makepdf/index.php?c=$Correo&n=$Nombre&b=$buscar' target='_blank'>Descargar</a></div>";
            }else{
                $mensajeColumnas="No se han encontrado resultados para <b>$buscar</b>";
                $link="<a href='transactions.php'>Volver a todas las transacciones</a>";
            }      
		}
    }else{
        $sql = "SELECT * FROM movimientos WHERE Origen = '$Correo' or Destino ='$Correo'"; 
        $query=mysqli_query($conn,$sql);
        $placeHolderMov="Buscar movimientos";
        $placeHolderFec2="dd/mm/aaaa";
        $placeHolderFec="dd/mm/aaaa";
        if (!mysqli_num_rows($query)>0) {
            $mensajeColumnas="<h4>NO EXISTEN MOVIMIENTOS AÚN</h4>";
            $link="";
        }else{
            $mensajeColumnas="";
            $link="<a href='../makepdf/index.php?c=$Correo&n=$Nombre' target='_blank'>Descargar</a></div>";
        }
    }
    ?>
    <script type="text/javascript">
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $('.popover-dismiss').popover({
        trigger: 'focus'
    }) 
    function validar() {
        //obteniendo el valor que se puso en el campo text del formulario
        var buscar = document.getElementById("txtBuscar").value;
        var fecha = document.getElementById("dateFechaI").value;
        //la condición
        if (buscar.length == 0 && fecha.length == 0 || /^\s+$/.test(buscar) && /^\s+$/.test(fecha) ) {
            alert('Escriba la fecha o el movimiento que desea buscar!');
            return false;
        }
    }
    </script>
    <header class="fijado">
        <?php include("components/navbar2.php"); ?>
    </header>
    <section class="contenedor container">
        <div class="row contenido">
            <div class="col-12">
                <!-- Inicia Columna 1 -->
                <form action="#" method="POST" onsubmit="return validar()">
                    <div class="row">
                        <div class="col-sm-2">
                            <label class="form-check-label">Del</label>
                            <input name="dateFechaI" id="dateFechaI" type="date" class="form-control" value="<?=$placeHolderFec?>">
                        </div>
                        <div class="col-sm-2">
                            <label class="form-check-label">Al</label>
                            <input name="dateFechaF" type="date" class="form-control" value="<?=$placeHolderFec2?>">
                        </div>
                        <div class="col-sm-7"><br>
                            <div class=" input-group mb-4">
                                <input type="text" class="form-control" name="txtBuscar" id="txtBuscar" placeholder="<?=$placeHolderMov?>"
                                    aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="summit" id="button-addon2"><i
                                            class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <br>
                            <a class="btn btn-outline-primary">Filtros</a>
                        </div>
                    </div>
                    <input type="hidden" name="buscar" value="1">
                </form>
				<div style="background-color: white; width: 100%; margin: 2px; border-radius: 10px; border: 1px solid #80808066; padding: 20px; margin-top: 30px">
                    <div class="row">   
                        <?php if (isset($_POST['buscar'])) { ?>
                        <div class="col-sm-9">
                            <p><?=$mensajeColumnas?></p>
                        </div>
                        <div class="col-sm-3 text-right">
                            <?=$link?>
                        </div>
                        <?php }else{?> 
                        <div class="col-sm-12 text-right">
                            <?=$link?>
                        </div>
                    
                    <?php } 
                    if (mysqli_num_rows($query)>0) {?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td class="align-top">Fecha</td>
                                    <td>Tipo</td>
                                    <td>Origen</td>
                                    <td>Destino</td>
                                    <td>Descripción</td>
                                    <td>Monto</td>
                                    <td>Comisión</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while($row= mysqli_fetch_assoc($query))	
                                {
                            ?>
                                <tr class="align-bottom">
                                    <td><?php echo $row['Fecha'];?></td>
                                    <td><?php echo $row['Tipo'];?></td>
                                    <td><?php echo $row['Origen'];?></td>
                                    <td><?php echo $row['Destino'];?></td>
                                    <td><?php echo $row['Descripción'];?></td>
                                    <td><?php if($Correo == $row['Origen']) {
                                        echo "- $".$row["Monto"]."\n";
                                    }else{
                                        echo "+ $".$row["Monto"]."\n";
                                    } ?></td>
                                    <td><?php echo $row['Comisión'];?></td>
                                </tr>
                                <?php 
                                }
                            ?>
                            </tbody>
                        </table>
					<?php }else{ ?> 
					<div>
                    <label>Propuestas:</label> <br>
                        <ul>
                            <li><p>Verifique que la palabra clave usada para la búsqueda es correcta.</p></li>
                            <li><p>nténtelo con otro intervalo de fechas.</p></li>
                        </ul>
                    </div>
                    </div>
					<?php }	?>
                </div>
            </div> <!-- Termina Columna 1 -->
        </div>
    </section>
</body>
</html>