<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<title>PayPal</title>

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
  if(isset($_SESSION['error'])){
    $mensaje=$_SESSION['error'];
    $style= 'text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px; color:red;';
    unset($_SESSION['error']);
  }else{
    $mensaje="Ingrese el correo electrónico que utiliza en PayPal y le ayudaremos a crear una nueva contraseña.";
    $style= 'text-align: center; font-size: 13px; margin-top: 20px; margin-bottom: 20px';
  }
?>
<body>
<div id="main-wrapper" class="oxyy-login-register min-vh-100 d-flex flex-column">
  <div class="container my-auto">
    <div class="row">
      <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
        <div class="bg-white border rounded p-4 py-sm-5 px-sm-5">
          <div class="logo mb-4"> <a class="d-flex justify-content-center" title="paypal"><img src="resources/logo192.png" alt="paypal" height="34"></a></div>
          <h5 class="display-4" style="text-align: center; font-size: 25px; margin-top: 35px">¿Necesita ayuda con su contraseña?</h5>
          <h5 class="display-4" style="<?=$style?>"><?= $mensaje?></h5>
          <form action="Server/cambio_contraseña" id="passRecoveryForm" method="post">
            <div class="form-group">
              <input name="txtCorreo" type="email" class="form-control" id="correoElectronico" required placeholder="Correo electrónico">
            </div>
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">Siguiente</button>
          </form>
          <p class="text-center text-2 mb-2"><a class="btn-link" href="pass_recovery_phone">¿Ha olvidado su correo electrónico?</a></p>
          <p class="text-center text-2 mb-2" style="margin-top: 50px"><a class="btn-link" href="signin">Volver al inicio de sesión de PayPal</a></p></div>
      </div>
    </div>
  </div>
    <?php include("components/copy.php"); ?>
</div>
</body>
</html>