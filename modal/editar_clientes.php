	<?php
		if (isset($con))
		{
	?>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Editar Cliente</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				    <input style="border: 1px solid #9e798a;"type="text" class="form-control" id="mod_nombre" name="mod_nombre"  placeholder="Nombre del cliente"  required pattern="[A-Za-z]{5,40}" title="Letras Mayusculas y Minusculas Tamaño mínimo: 5. Tamaño máximo: 40">
					<input style="border: 1px solid #9e798a;" type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_telefono" class="col-sm-3 control-label">Teléfono</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;" type="text" class="form-control" id="mod_telefono" name="mod_telefono" placeholder="Teléfono del cliente" >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_email" class="col-sm-3 control-label">E-mail</label>
				<div class="col-sm-8">
				 <input style="border: 1px solid #9e798a;" type="email" class="form-control" id="mod_email" name="mod_email" placeholder="E-mail del cliente" >
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_RTN" class="col-sm-3 control-label">RTN</label>
				<div class="col-sm-8">
					<input style="border: 1px solid #9e798a;" type="text" class="form-control" id="mod_RTN" name="mod_RTN"  placeholder="RTN del cliente" >
				</div>
			  </div>

			  <div class="form-group">
				<label for="mod_direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
				  <textarea style="border: 1px solid #9e798a;" class="form-control" id="mod_direccion" name="mod_direccion"  placeholder="Dirección del cliente" ></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select style="border: 1px solid #9e798a;" class="form-control" id="mod_estado" name="mod_estado" placeholder="Estado del cliente"  required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>		 
			
		  </div>
		  <div class="modal-footer">
			<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;"type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>