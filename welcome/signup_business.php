<!DOCTYPE html>
<html ang="es">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<title>Crear una cuenta de PayPal Personal o Empresas</title>
	<link rel="icon" type="image/png" href="favicon.ico" />
    
<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../resources/css/stylesheet.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="CheckPassword.js"></script>
<!--
========================= -->
</head>
<?php
session_start();
if (isset($_SESSION['error'])) {
  $mensaje=$_SESSION['error'];
  $style= 'text-align: center; font-size: 17px; margin-top: 15px; margin-bottom: 20px; color:red;';
  unset($_SESSION['error']);
}else {
  $mensaje="Esta información debe ser precisa";
  $style= "text-align: center; font-size: 17px; margin-top: 15px; margin-bottom: 20px";
}
?>
<body>
<div id="main-wrapper" class="oxyy-login-register min-vh-100 d-flex flex-column">
  <div class="container my-auto">
    <div class="row">
      <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
        <div class="bg-white border rounded p-4 py-sm-5 px-sm-5">
          <div class="logo mb-4"> <a class="d-flex justify-content-center" title="paypal"><img src="../resources/logo192.png" alt="paypal" height="34"></a></div>
          <h5 class="display-4" style="text-align: center; font-size: 25px; margin-top: 35px">Configure el perfil de su Empresa</h5>
          <h5 class="display-4" style="<?=$style?>"><?=$mensaje?></h5>
          <form action="../Server/Registro_usuario.php" method="POST" >
            <div class="form-group">
			  <label><h5 class="display-4" style="font-size: 15px;">Ventas mensuales estimadas por internet (MXN):</h5></label>
			  <select name="selVentas" style="margin-top: -10px" class="form-control" required>
			  		<option selected>Seleccione...</option>
					<option value="1">Menos de $50,000</option>
					<option value="2">$50,000 - $150,000</option>
					<option value="3">$150,000 - $300,000</option>
					<option value="4">Más de $300,000</option>
			  </select>
			  <label><h5 class="display-4" style="font-size: 15px;">¿Actualmente ofreces pagos MSI a tus clientes?</h5></label>
			  <select name="selMSI" style="margin-top: -10px" class="form-control" required>
			  		<option selected>Seleccione...</option>
					<option value="True">Si</option>
					<option value="False">No</option>
			  </select>
              <input name="txtEmail" style="margin-top: 5px" name="txtEmail" type="email" class="form-control" required placeholder="Correo electrónico">
              <input name="txtNombre" style="margin-top: 5px" type="text" class="form-control" required placeholder="Nombre de la empresa">
              <input name="txtRFC" style="margin-top: 5px" type="text" class="form-control" required placeholder="RFC">
              <input name="txtPassword" style="margin-top: 5px" type="password" class="form-control" minlength='8'  required placeholder="Contraseña">
              <input name="txtVpassword" style="margin-top: 5px" type="password" class="form-control" minlength='8' required placeholder="Confirmar contraseña">
            </div>
            <h5 class="display-4" style="text-align: center; font-size: 25px; margin-top: 25px">Agregue la dirección de su Empresa</h5>
          	<div class="form-group" style="margin-top:15px;">
          		<input name="txtDireccion" style="margin-top: 5px" type="text" class="form-control" required placeholder="Dirección">
          		<input name="txtColonia" style="margin-top: 5px" type="text" class="form-control" required placeholder="Colonia">
          		<div class="row" style="margin-top: 5px">
          			<input name="txtCodPostal" style="margin-left: 15px" type="text" class="form-control col-4" required placeholder="Código Postal">
          			<input name="txtCiudad" style="margin-left: 34px" type="text" class="form-control col-6" required placeholder="Ciudad">
          		</div>
          		<label><h5 class="display-4" style="font-size: 15px;">Estado:</h5></label>
          		<?php include("components/stateList.php") ?>
          		<div style="margin-top: 12px" class="form-check">
          			<input name="cbAcuerdo" class="form-check-input" type="checkbox" id="aviso" required>
          			<label for="aviso"><h6 class="h6" style="font-size: 12.5px;">
          				Usted confirma que ha leído, da su consentimiento y acepta las condiciones de uso y 
          				el aviso de privacidad de PayPal. Usted da su
          				consentimiento para recibir estas políticas en linea.
          			</h6></label>
          		</div>
          	</div>
            <input type="hidden" name="txtTipoCuenta" value="2">
			<input type="text" name="Login" value="1" hidden="">
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">Aceptar y crear cuenta</button>
          </form>
      	</div>
      </div>
    </div>
  </div>
    <?php include("../components/copy.php"); ?>
</div>
</body>
</html>