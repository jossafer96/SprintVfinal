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
  <body style="background-color:rgb(0, 0, 0); background-image: url(img/imagen6.jpg);background-size:cover;background-repeat: no-repeat;">
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
				<a  style="background-color: white; color: black; border: 1px solid #1C1C1C;" href="nueva_factura.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Factura</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i>Buscar Facturas</h4>

		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Factura</label>
							<div class="col-md-5">
								<input style="border: 1px solid #9e798a" type="text" class="form-control" id="q" placeholder="Nombre del cliente o Nº de factura" onkeyup='load(1);'>
							</div>
							
							
							
							<div class="col-md-3">
								<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	
	<?php
	include("pie_pagina.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/clock.js"></script>
	
	<script type="text/javascript" src="js/controlador.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
	<script type="text/javascript" src="js/facturas.js"></script>
  </body>
</html>