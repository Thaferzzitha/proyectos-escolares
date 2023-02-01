<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../CLIENTES/ControlesClientes.js"></script>
</head>
<body>
    

    

<h1>Ingrese los siguientes datos de los Clientes</h1>

<form id="frmAjax" method="POST" >



<label for="">Cédula Cliente</label>
<input type="text" name="cedula" id="cedula" size="10" maxlength="10"  required  onchange="validarcedula()" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >



<label for="">Nombre del Cliente</label>
<input type="text" name="nombreCliente" id="nombreCliente"  maxlength="45" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"  >



<label for="">Apellido del Cliente</label>
<input type="text" name="apellidoCliente" id="apellidoCliente"  maxlength="45" required onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))" >

<label for="">Correo Eletronico</label>
<input type="email" name="correoElectronico" id="correoElectronico"  maxlength="45" required  >


<label for="">Direccion del Cliente</label>
<input type="text" name="direccion" id="direccion"  maxlength="45" required >



<button  id="btnguardar" >Guardar</button>







</form>

















<script type="text/javascript">

</script>



</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var datos=$('#frmAjax').serialize();
			$.ajax({
				type:"POST",
				url:"InsertarCliente.php",
				data:datos,
				success:function(p){
					if(p!=1){
						alert("agregado con exito");
					}else{
						alert("Producto no ingresado, vuelva a intentarlo");
					}
				}
			});

			return false;
		});
	});
</script>




