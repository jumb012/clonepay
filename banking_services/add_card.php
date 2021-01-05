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
          <h5 class="display-4" style="text-align: center; font-size: 25px; margin-top: 35px; margin-bottom: -10px">Asociar una tarjeta para utilizarla con PayPal más adelante</h5>
          <div class="row" style="justify-content:center;">
             <img src="https://cdn0.iconfinder.com/data/icons/major-credit-cards-colored/48/JD-01-512.png" height="150">
          </div>
          <label><h6 class="display-4" style="font-size: 14px;">
          		PayPal le permite realizar pagos utilizando una variedad de formas de pago.
          </h6></label>
          <form id="AddCardForm" method="post">
            <div class="form-group">
              <input style="margin-top: 5px" type="text" class="form-control" required placeholder="N.° tarjeta débito o crédito">
              <select style="margin-top: 5px" class="form-control" required>
                <option selected>Seleccione su tipo de tarjeta</option>
                <option>Visa</option>
                <option>MasterCard</option>
                <option>American Express</option>
              </select>
              <input style="margin-top: 5px" type="text" class="form-control" required placeholder="Fecha de vencimiento">
              <div class="row">
                <div class="col-9">
                    <input style="margin-top: 5px" type="text" class="form-control" required placeholder="Código de seguridad">
                </div>
                <div class="col-2">
                    <img src="https://cdn2.iconfinder.com/data/icons/credit-cards-6/156/security_code_back-512.png" height="50">
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block shadow-none mt-4 mb-3" type="submit">Asociar tarjeta</button>
          </form>
      	</div>
      </div>
    </div>
  </div>
    <?php include("../components/copy.php"); ?>
</div>
</body>
</html>