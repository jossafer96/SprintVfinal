<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
         require_once ("config/db.php");
		require_once ("config/conexion.php");
		
	$active_facturas="";
	$active_productos="active";
	$active_clientes="";
	if ($_SESSION['user_id']==16){
                        $active_usuarios='';
                        $click='';
                      } else {
                       $active_usuarios='disabled';
                       $click='noclick';
                      }		
	$title="Inventario | Tapices S. de R.L.";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("cabecera.php");?>
    <title><?php echo $title;?></title>
  </head>
  <body style="background-color:rgb(0, 0, 0);background-image: url(img/imagen3.jpg);background-size:cover;background-repeat: no-repeat;">
	<?php
	include("barra_navegacion.php");
	?>
	<div >
  		<canvas height="40"></canvas>
	</div>
    <div class="container">
	<div class="panel panel-info" style="border-color: #17202A; color:#af8d9d">
		<div class="panel-heading" style="background-color: #151515; color: #ffffff">
		    <div class="btn-group pull-right">
					<button type='button' class="btn btn-info" style="background-color: white; color: black; border: 1px solid #1C1C1C;" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span> Nuevo Producto</button>
				</div>
			<h4><i class='glyphicon glyphicon-search'></i>Productos en Inventario</h4>
		</div>
		<div class="panel-body">
		
			<?php
			include("modal/registro_productos.php");
			include("modal/editar_productos.php");
			?>
		
			
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Producto</label>
							<div class="col-md-5">
							<input style="border: 1px solid #9e798a;" type="text" class="form-control" id="q" placeholder="Código o nombre del producto" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" style="border: 1px solid #1C1C1C;" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span>Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
			</form>

				<div id="resultados"></div>
				<div class='outer_div'></div>
			
		
				
			
			
			
  </div>
</div>
		 
	</div>
	<hr>

	<?php
	include("pie_pagina.php");
	?>
	<script type="text/javascript" src="js/productos.js"></script>
	<script type="text/javascript" src="js/clock.js"></script>
  </body>
</html>
<script>
$( "#guardar_producto" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_productos").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_productos").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_producto" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
			var codigo_producto = $("#codigo_producto"+id).val();
			var nombre_producto = $("#nombre_producto"+id).val();
			var estado = $("#estado"+id).val();
			var precio_producto = $("#precio_producto"+id).val();
			$("#mod_id").val(id);
			$("#mod_codigo").val(codigo_producto);
			$("#mod_nombre").val(nombre_producto);
			$("#mod_precio").val(precio_producto);
		}

		 
</script>