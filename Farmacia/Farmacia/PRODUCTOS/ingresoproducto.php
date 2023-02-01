<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia</title>
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <h1>Ingreso de Productos</h1>
    <form id="frmAjax" method="POST">
        
    <label for="">IdProducto</label>
    <input type="text" name="id" id="id" >
    <br>
    <br>
    <label for="">Nombre</label>
    <input type="text" name="nombre" id="nombre" >
    <br>
    <br>
    <label for="">Stock</label>
    <input type="number" name="stock" id="stock" >
    <br>
    <br>
    <label for="">Precio</label>
    <input type="text" name="precio" id="precio" >
    <br>
    <br>
    <label for="">Fecha vencimiento</label>
    <input type="date" name="fecha" id="fecha" >
    <br>
    <br>
    <button id="btnguardar">Guardar</button>
    </form>
    <?php include("mostrarprod.php");?>
  
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var datos=$('#frmAjax').serialize();
			$.ajax({
				type:"POST",
				url:"insertarproducto.php",
				data:datos,
				success:function(p){
					if(p!=1){
						alert("Producto agregado ");
					}else{
						alert("Producto no ingresado, vuelva a intentarlo");
					}
				}
			});

			return false;
		});
	});
</script>