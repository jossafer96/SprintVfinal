	<?php
		if (isset($con))
		{
	?>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Editar Producto</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
			<div id="resultados_ajax2"></div>
			  <div class="form-group">
				<label for="mod_codigo" class="col-sm-3 control-label">Código</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;" type="text" class="form-control" id="mod_codigo" name="mod_codigo" placeholder="Código del producto" required>
					<input style="background-color: #af8d9d; color: white; border: 1px solid #9e798a;" type="hidden" name="mod_id" id="mod_id">
				</div>
			  </div>
			   <div class="form-group">
				<label for="mod_nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-8">
				  <textarea style="border: 1px solid #9e798a;" class="form-control" id="mod_nombre" name="mod_nombre" placeholder="Nombre del producto" required></textarea>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="mod_estado" class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-8">
				 <select style="border: 1px solid #9e798a;" class="form-control" id="mod_estado" name="mod_estado" required>
					<option value="">-- Selecciona estado --</option>
					<option value="1" selected>Activo</option>
					<option value="0">Inactivo</option>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label for="mod_precio" class="col-sm-3 control-label">Precio</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;" type="text" class="form-control" id="mod_precio" name="mod_precio" placeholder="Precio de venta del producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" maxlength="8">
				</div>
			  </div>	 
			
		  </div>
		  <div class="modal-footer">
			<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;" type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>