	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Agregar Nuevo Usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
			<div id="resultados_ajax"></div>
			  <div class="form-group">
				<label for="firstname" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;" type="text" class="form-control" id="firstname" name="firstname" placeholder="Primer y segundo nombre del usuario" required pattern="[A-Za-z]{5,40}" title="Letras Mayusculas y Minusculas Tamaño mínimo: 5. Tamaño máximo: 40">
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;"type="text" class="form-control" id="lastname" name="lastname" placeholder="Primer y segundo apelido del usuario" required pattern="[A-Za-z]{5,40}" title="Letras Mayusculas y Minusculas Tamaño mínimo: 5. Tamaño máximo: 40">
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_name" class="col-sm-3 control-label">Usuario</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;"type="text" class="form-control" id="user_name" name="user_name" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario ( sólo letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_email" class="col-sm-3 control-label">E-mail</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;"type="email" class="form-control" id="user_email" name="user_email" placeholder="E-mail del usuario" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_password_new" class="col-sm-3 control-label">Contraseña</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;"type="password" class="form-control" id="user_password_new" name="user_password_new" placeholder="Ingrese contraseña" pattern=".{6,}" title="Contraseña ( min . 6 caracteres)" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_password_repeat" class="col-sm-3 control-label">Repite contraseña</label>
				<div class="col-sm-8">
				  <input style="border: 1px solid #9e798a;"type="password" class="form-control" id="user_password_repeat" name="user_password_repeat" placeholder="Repita contraseña" pattern=".{6,}" required>
				</div>
			  </div>
			 
			  

			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;" type="submit" class="btn btn-primary" id="guardar_datos">Guardar Datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>