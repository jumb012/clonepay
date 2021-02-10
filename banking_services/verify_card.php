<?php  
  
  $id_h= $_GET["id_h"];
  include('../Server/Conexion.php'); // 
  session_start();
  
  $sql= "SELECT id FROM registro_usuario where id_h = '$id_h'"; 
  $resultado= mysqli_query($conn,$sql);
  $fila= $resultado->fetch_row();
  $id = $fila[0];

  $sql= "SELECT Tipo_tarjeta FROM tarjeta_bancaria where ID = '$id'"; 
  $resultado= mysqli_query($conn,$sql);
  $fila= $resultado->fetch_row();
  $tipo = $fila[0];

  $sql= "SELECT Num_tarjeta FROM tarjeta_bancaria where ID = '$id'"; 
  $resultado= mysqli_query($conn,$sql);
  $fila= $resultado->fetch_row();
  $numero = $fila[0];
  $cadena =strval($numero); 
?>


<!DOCTYPE html>
<html ang="es">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
	<title>PayPal: Cartera</title>
  <link rel="icon" type="image/png" href="../favicon.ico" />
<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../resources/css/stylesheet.css" />
<!--
========================= -->
</head>
<body>
<div id="main-wrapper" class="oxyy-login-register min-vh-100 d-flex flex-column">
  <div class="container my-auto">
    <div class="row">
      <div class="col-md-9 col-lg-7 col-xl-5 mx-auto my-4">
        <div class="bg-white border rounded p-4 py-sm-5 px-sm-5">
          <div class="logo mb-4"> <a class="d-flex justify-content-center" title="paypal"><img src="../resources/logo192.png" alt="paypal" height="34"></a></div>
          <h5 class="display-4" style="text-align: center; font-size: 25px; margin-top: 35px; margin-bottom: 20px">
                Confirmar tarjeta <?php echo $tipo ?> terminada en ••••<?php echo substr($cadena, -4) ?>
          </h5>
          <label><h6 class="display-4" style="font-size: 14px;">
          		Hemos cargado un monto en su tarjeta.
                Para confirmar su tarjeta, ingrese el código de 4 dígitos 
                que aparece en los movimientos de su tarjeta junto al importe cargado.
          </h6></label>
          <div class="form-group border rounded" style=" margin-top: 15px; ">
                <h6 class="text-muted" style="font-size: 14px; margin-top: 5px;text-align: center;">Estado de cuenta de ejemplo</h6>
                <hr style="margin-top: -5px">
                <div class="row" style="margin-left: 8px; margin-top: -5px">
                    <div class="col-8">
                        <label style="margin-top: 5px"><h6 style="font-size: 14px;">PP*<span style="font-size: 14px; border: 2px solid #347ab4">1234</span>CODIGO</h6></label>
                    </div>
                    <div class="col-4" style="text-align: center;">
                        <label style="margin-top: 5px;"><h6 style="font-size: 14px;">- $x,xx</h6></label>
                    </div>
                </div>
                <hr style="margin-top: -5px">
          </div>
          <form id="VerifyCardForm" action="../Server/verificar_tarjeta.php" method="post">
            <div class="form-group">
              <label><h5 class="display-4" style="font-size: 15px;">Código de 4 dígitos:</h5></label>
              <input style="margin-top: -10px" type="text" class="form-control" required value="<?php echo rand(0001,9999)?>" readonly>
            </div>
            <input type="hidden" name="ID" value="<?php echo $id?>">
            <input type="hidden" name="id_h" value="<?php echo $id_h?>">
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit" name="verificar">Confirmar</button>
          </form>
      	</div>
      </div>
    </div>
  </div>
    <?php include("../components/copy.php"); ?>
</div>
</body>
</html>