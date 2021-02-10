<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>PayPal Empleados - Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Shreethemes" />
        <meta name="email" content="shreethemes@gmail.com" />
        <meta name="website" content="http://www.shreethemes.in" />
        <meta name="Version" content="v2.6" />
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <!-- Slider -->               
        <link rel="stylesheet" href="css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="css/owl.theme.default.min.css"/>    
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
        <link rel="stylesheet" type="text/css" href="css/elemento_flotante.css">

    </head>
    <?php
    include('../Server/Conexion.php');
    session_start();
    $Correo=$_SESSION['Correo'];
    $Nombre=$_SESSION['Nombre'];
    $Ap_pat=$_SESSION['Ap_pat'];
    if(!isset($Correo)){
        header("location: login.php");
    }?>
    <body>        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="home.php">
                        <img src="images/Logo_Azul.png" height="35" alt="">
                    </a>
                </div>                 
                <div class="buy-button">
                    <a href="index.php" class="btn btn-primary">Cerrar Sesión</a>
                </div><!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation"> 
                    <div class="buy-menu-btn d-none">
                        <a href="#" target="_blank" class="btn btn-primary">Iniciar Sesión</a>
                    </div><!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
        
        <!-- Hero Start -->
        <section class="bg-half-170  d-table w-100" id="home" style="padding: 90px 0 !important;">
            <div class="container">
                <div class="row mt-5 align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="title-heading container">
                            <h1 class="heading mb-3"> Hola! qué tal?<br> <span class="text-primary"><?=$Nombre?></span> </h1>
                            <div class="row">
                            	<div class="col-sm-4 flotante">
                            		<h6 class="h4 text-primary">Ganancias</h6>
                            		<p class="display-4 text-dark text-center" style="font-size: 25px !important; margin-top: 15px">$ 46,153 MM</p>
                            		<h6 class="h6 text-dark" style="text-align: right;margin-top: -20px; margin-right: 15px">MXN</h6>
                            	</div>
                            	<div class="col-1"></div>
                            	<div class="col-sm-4 flotante">
                            		<h6 class="h4 text-primary">Total de Movimientos</h6>
                            		<p class="display-4 text-dark text-center" style="font-size: 25px !important; margin-top: 15px">540,392</p>
                            		<h6 class="h6 text-dark text-center" style="margin-top: -20px;">movimientos</h6>
                            	</div>
                            </div>
                            <div class="mt-4" style="margin-top: 50px !important;">
                                <a href="#" class="btn btn-secondary mt-2 mr-2"  data-toggle="modal" data-target="#REmpleadosModal"><i class="mdi mdi-email"></i> Empleados</a>
                                <a href="#" class="btn btn-primary mt-2 mr-2"><i class="mdi mdi-email"></i> Chat de Ayuda</a>
                            </div>
                        </div>
                		
                    </div><!--end col-->

                    <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <img src="https://i.pinimg.com/originals/10/55/10/105510993fc605ad9f664cf75010c582.gif" alt="" style="border-radius: 30px">
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- Inicio de Modal -->
        <div class="modal fade" id="REmpleadosModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gestión de Empleados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    	<div>
                    		<ul class="nav nav-tabs" id="myTab" role="tablist">
  							<li class="nav-item" role="presentation">
    							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#alta" role="tab" aria-controls="alta" aria-selected="true">Alta</a>
  							</li>
  							<li class="nav-item" role="presentation">
    							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Generar Usuarios</a>
  							</li>
  							<li class="nav-item" role="presentation">
    							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Restablecer Contraseñas</a>
  							</li>
							</ul>
							<div class="tab-content" id="myTabContent">
  								<div class="tab-pane fade show active" id="alta" role="tabpanel" aria-labelledby="alta-tab">
  									<form>
  										<div class="form-group">
  											<div class=" row" style="margin-top: 10px">
  												<div class="col-5"><input  name="txtTelefono" id="telefono" type="text" class="form-control" required placeholder="Número de celular"></div>
              									<div class="col-7"><input  name="txtEmail" id="email" type="email" class="form-control" required placeholder="Correo electrónico"></div>
  											</div>
              								<input style="margin-top: 5px" name="txtNombre" id="nombre" type="text" class="form-control" required placeholder="Nombres">
              								<input style="margin-top: 5px" name="txtApellidoP" id="apellidoP" type="text" class="form-control" required placeholder="Primer Apellido">
              								<input style="margin-top: 5px" name="txtApellidoM" id="apellidoM" type="text" class="form-control" required placeholder="Apellido materno">
              								<div class=" row" style="margin-top: 10px">
  												<div class="col"><input  name="txtCalle" id="calle" type="text" class="form-control" required placeholder="Calle"></div>
              									<div class="col"><input  name="txtColonia" id="colonia" type="text" class="form-control" required placeholder="Colonia"></div>
              									<div class="col"><input  name="txtCiudad" id="ciudad" type="text" class="form-control" required placeholder="Ciudad"></div>
  											</div>
  											<div class="text-right" style="margin-top: 15px;"><button type="summit" class="btn btn-success">Registrar</button></div>
  										</div>
  									</form>
  								</div>
  								<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  									<form>
  										<div class="form-group container">
  											<p class="display-4" style=" margin-top: 15px; font-size: 15px !important;">Para generar las credenciales iniciales de sus empleados. Ingrese los datos que se le piden a continuación.</p>
              								<input name="txtCorreo" id="correo" type="email" class="form-control" required placeholder="Correo electrónico">
  											<div class="text-right" style="margin-top: 15px;"><button type="summit" class="btn btn-success">Generar</button></div>
  										</div>
  									</form>
  								</div>
  								<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  									<form>
  										<div class="form-group container">
  											<p class="display-4" style=" margin-top: 15px; font-size: 15px !important;">Para rstablecer las credenciales de sus empleados. Ingrese los datos que se le piden a continuación.</p>
              								<input name="txtUsuario" id="text" type="usuario" class="form-control" required placeholder="Usuario">
  											<div class="text-right" style="margin-top: 15px;"><button type="summit" class="btn btn-success">Restablecer</button></div>
  										</div>
  									</form>
  								</div>
							</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div> <!-- Fin de Modal -->

        <!-- Footer Start -->
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-left">
                            <p class="mb-0"> Copyright © <script>document.write(new Date().getFullYear())</script> Paypal. All Rights Reserved.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- SLIDER -->
        <script src="js/owl.carousel.min.js "></script>
        <script src="js/owl.init.js "></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>
</html>