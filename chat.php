<!DOCTYPE html>
<html lang="es">
<head>
	<title>Centro de mensajes</title>
	<meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/>
    	<!-- jQuery -->
        <script crossorigin="anonymous" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" src="https://code.jquery.com/jquery-2.2.4.min.js">
        </script>
        <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style>
			/* width */
			::-webkit-scrollbar {
			  width: 5px;
			}
			
			/* Track */
			::-webkit-scrollbar-track {
			  background: #f1f1f1; 
			}
			 
			/* Handle */
			::-webkit-scrollbar-thumb {
			  background: #888; 
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
			  background: #555; 
			}
		</style>
</head>
<body>
	<div class="container" style="padding: 80px">
		<div class="row">
			<h3>Centro de mensajes</h3>
			<button class="btn btn-outline-primary ml-auto" style="border-radius: 20px">Nuevo Mensaje</button>
		</div>
		<div class="row" style="margin-top: 30px">
			<div class="col-md-4" style="border-radius: 5px; border: 1px solid gray; height: 350px; background-color: white;overflow-y: scroll;"></div>
			<div class="col-1"></div>
			<div class="col-md" style=";border-radius: 5px; border: 1px solid gray; height: 350px; background-color: white;overflow-y: scroll;">
				<div class="text-center" style="display: grid; place-items:center;height: 100%">
					<div>
						<img src="resources/chat.svg">
						<h4 style="margin-top: 20px">¡Buenas tardes, Jassiel!</h4>
						<p>No hay nuevos mensajes. Ya está al día</p>
					</div>
				</div>
			</div>
		</div>
		<p class="text-center" style="margin-top: 30px">Los mensajes están disponibles en el Centro de mensajes durante 90 días contados desde el día en que se enviaron originalmente. Si desea obtener una copia de cualquiera de los mensajes antes de que se cumpla este plazo, comuníquese con nosotros.</p>
	</div>
</body>
</html>