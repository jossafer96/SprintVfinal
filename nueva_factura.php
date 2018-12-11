<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

     require_once ("config/db.php");
	require_once ("config/conexion.php");
	$active_facturas="active";
	$active_productos="";
	$active_clientes="";
	if ($_SESSION['user_id']==16){
                        $active_usuarios='';
                        $click='';
                      } else {
                       $active_usuarios='disabled';
                       $click='noclick';
                      }	
	$title="Nueva Factura | Tapices S. de R.L.";
	
?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <?php include("cabecera.php");?>
     <title><?php echo $title;?></title>
  </head>
  <body style="background-color:rgb(0, 0, 0); background-image: url(img/imagen2.jpg);background-size:cover;background-repeat: no-repeat;">
	<?php
	include("barra_navegacion.php");
	?>  
	<div >
  		<canvas height="40"></canvas>
	</div>
    <div class="container" >
	<div class="panel panel-info" style="border-color: #17202A; color:#af8d9d">
		<div class="panel-heading" style="background-color: #151515; color: #ffffff">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Factura</h4>
		</div>
		<div class="panel-body">
			<?php 
			
			include("modal/buscar_productos.php");
			include("modal/registro_clientes.php");
			include("modal/registro_productos.php");
		?>
			<form class="form-horizontal" role="form" id="datos_factura" >
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input style=" border: 1px solid #9e798a" type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
					  <input style="border: 1px solid #9e798a" id="id_cliente" type='hidden'>	
				  </div>
				  <label for="tel1" class="col-md-1 control-label">RTN</label>
							<div class="col-md-2">
								<input style="border: 1px solid #9e798a;;"type="text" class="form-control input-sm" id="tel1" placeholder="RTN" readonly>
										</div>
					<label for="mail" class="col-md-1 control-label">E-mail</label>
							<div class="col-md-3">
								<input style="border: 1px solid #9e798a;;"type="text" class="form-control input-sm" id="mail" placeholder="E-mail" readonly>
							</div>
				 </div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Vendedor</label>
							<div class="col-md-3">
								<select style="border: 1px solid #9e798a;;"class="form-control input-sm" id="id_vendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from users order by lastname");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["user_id"];
											$nombre_vendedor=$rw["firstname"]." ".$rw["lastname"];
											if ($id_vendedor==$_SESSION['user_id']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input style="border: 1px solid #9e798a;;"type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							<label for="email" class="col-md-1 control-label">Pago</label>
							<div class="col-md-3">
								<select style=" border: 1px solid #9e798a;;"class='form-control input-sm' id="condiciones">
									<option value="1">Efectivo</option>
									<option value="2">Cheque</option>
									<option value="3">Transferencia bancaria</option>
									<option value="4">Crédito</option>
								</select>
							</div>
						</div>
				
				
				<div class="col-md-12">
					<div class="pull-right">
					<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						<span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
						<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div>
		</div>
	</div>		
		  <div class="row-fluid">
			<div class="col-md-12">
			
	

			
			</div>	
		 </div>
	</div>
	<hr>

	
	<?php
	include("pie_pagina.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<script type="text/javascript" src="js/clock.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
		$(function() {
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
								$('#tel1').val(ui.item.RTN);
								$('#mail').val(ui.item.email_cliente);
																
								
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
							$("#tel1" ).val("");
							$("#mail" ).val("");
						}
			});	
	</script>
  </body>
</html>