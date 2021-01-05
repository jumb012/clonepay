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
          <h5 class="display-4" style=" font-size: 25px; margin-top: 35px; margin-bottom: 20px">
                Elija su forma de pago principal para sus compras en línea
          </h5>
          <label><h6 class="display-4" style="font-size: 14px;">
          		Utilizaremos estaa forma de pago cuando compre en línea o envíe 
                pagos por artículos y servicios. Sin embargo, a la hora de pagar podrá
                elegir otra forma de pago.
          </h6></label>
          <form id="VerifyCardForm" method="post">
            <div class="form-group">
              <label><h5 class="display-4" style="font-size: 15px;">Tarjetas registradas:</h5></label>
              <select style="margin-top: -10px" class="form-control" required> <!-- ESTOS DATOS SON TRAIDOS DE LA BASE DE DATOS -->
                <option selected>MasterCard<span> ••••</span></span>1234</span></p></option>
                <option>Visa ••••5678</option>
                <option>Amex ••••9012</option>
              </select>
            </div>
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">Confirmar</button>
          </form>
      	</div>
      </div>
    </div>
  </div>
    <?php include("../components/copy.php"); ?>
</div>
</body>
</html>