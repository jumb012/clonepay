<!DOCTYPE html>
<html lang="es">
<head>
	<title>Conoce como PayPal puede ser una ventaja para ti desde casa</title>    
    <link rel="icon" type="image/png" href="favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/index.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php 
    session_start();
    $Correo=$_SESSION['Correo'];
    if(!isset($Correo)){
        header("location: Server/login.php");
    }else
    {   
        echo "Bienvenido $Correo";
        echo "<br><br><br>";
        echo "<a href=Server/logout.php><button>Cerrar Sesión</button></a>";
    }
?>    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>