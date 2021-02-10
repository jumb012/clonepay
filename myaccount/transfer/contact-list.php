<!DOCTYPE html>
<html lang="es">

<head>
    <title>PayPal: lista de contactos</title>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    <!-- jQuery -->
    <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
        src="https://code.jquery.com/jquery-2.2.4.min.js">
    </script>
    <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="../resources/navbar2/navbar2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../resources/global/global.css">
    <link rel="stylesheet" type="text/css" href="../resources/navbar2/navbar2.css">
</head>

<body>
    <?php 
    include('../../Server/Conexion.php');
    session_start();
    $Correo=$_SESSION['Correo'];
    $Nombre=$_SESSION['Nombre'];
    $Ap_pat=$_SESSION['Ap_pat'];
    if(!isset($Correo)){
        header("location: Server/login.php");
    }
    $EliminarEspacios=str_replace(' ', '', $Nombre);
    $Usuario=$EliminarEspacios.$Ap_pat;  
    if(!$_POST['txtBuscar']){
        $sql = "SELECT DISTINCT Destino FROM movimientos WHERE Origen = '$Correo'";
        
        $texto="Buscar";
    }else{
        $buscar=$_POST['txtBuscar'];
        $texto="$buscar";
        $sql="SELECT DISTINCT Destino FROM movimientos WHERE  Destino LIKE  '%$buscar%'";
    }
    $query=mysqli_query($conn,$sql);
    
    ?>
    <header class="fijado">
        <?php include("components/navbar2.php"); ?>
    </header>
    <ul class="nav justify-content-center nav_eys" style="margin-top: 0px">
        <li class="nav-item eys-op" style="margin-left: 0px;">
            <a class="nav-link btn" href="pay.php">Enviar</a>
        </li>
        <li class="nav-item eys-op">
            <a class="nav-link btn" href="request.php">Solicitar</a>
        </li>
        <li class="nav-item eys-op actual">
            <a class="nav-link btn" href="contact-list.php" style="color: #0070ba">
                <h4 style="font-size: 18px; margin-top: 11px;margin-left: -10px">Contactos</h4>
            </a>
        </li>
    </ul>
    <section class="contenedor container">
        <div class="row contenido" style="margin-top: -70px">
            <div class="col-sm-7">
                <!-- Inicia Columna 1 -->
                <div class="row" style="background-color: white; height: 100%; border-radius: 5px;">
                    <div class="col" style="margin: 30px;">
                        <form class="form-group" action="#" method="POST" style="margin-top: 10px">
                            <table>
                                <tr>
                                    <td class="col-sm-7">
                                        <input name="txtBuscar" class="form-control" style="height: 50px" type="text"
                                            placeholder="<?=$texto?>">
                                    </td>
                                    <td><button class="btn-primary row-2 txtBuscar" id="btnBuscar"><i class="fa fa-search"  width="10" height="10"></i></button></td>
                                </tr>
                            </table>
                        </form>
                        <?php 
                            while($row= mysqli_fetch_assoc($query))	
                            {
                        ?>
                            <p>
                                <span><a href=""><?php echo $row['Destino'] ?></a></span>
                            </p>
                            <?php 
                            }
                        ?>
                    </div>
                </div>
            </div> <!-- Termina Columna 1 -->
            <div class="col-sm-4" style="margin-left: 20px">
                <!-- Inicia Columna 2 -->
                <div class="row" style="background-color: white; height: 100%; border-radius: 5px;">
                    <div class="col" style="margin: 20px">
                        <h6 class="h4" style="text-align: center; font-size: 15px">Su perfil</h6>
                        <hr>
                        <div style="display: grid; place-items:center;">
                            <img src="https://ui-avatars.com/api/?name=<?=$Nombre?>&background=random"
                                style="border-radius: 50%; margin-top: 20px">
                        </div>
                        <h4 class="display-4" style="text-align: center; font-size: 22px; margin-top: 20px"><?=$Nombre?>
                        </h4>
                        <h4 class="h4" style="color: #0070ba;text-align: center; font-size: 15px"><?='@'.$Usuario?></h4>
                        <h4 style="text-align: center; margin-top: 30px">
                            <button class="btn btn-outline-primary" style="border-radius: 30px" data-toggle="modal"
                                data-target="#PaypalMeModal">Administrar perfil</button>
                        </h4>
                    </div>
                </div>
                <div class="modal fade" id="PaypalMeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" id="lblpaypalme">Su Paypal.me</h4>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">X</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <p class="statusMsg"></p>
                                <form role="form" action="../../Server/paypalme.php" method="POST">
                                    <div class="form-group">
                                        <h5 for="inputName">paypal.me/<?=$Usuario?></h5>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary submitBtn"
                                    data-dismiss="modal">CERRAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Termina Columna 2 -->
        </div>
    </section>
</body>

</html>