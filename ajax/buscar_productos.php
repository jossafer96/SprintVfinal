<?php

	
	include('is_logged.php');
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_producto=intval($_GET['id']);
		
			if ($delete1=mysqli_query($con,"DELETE FROM products WHERE id_producto='".$id_producto."'")){
			?>
			Datos eliminados exitosamente.
			
				<?php
				}
		}
		
		
		
	
	if($action == 'ajax'){
		
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('codigo_producto', 'nombre_producto');
		 $sTable = "products";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by id_producto desc";
		
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; 
		$adjacents  = 4;
		$offset = ($page - 1) * $per_page;
		
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './productos.php';
		
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
	
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Código</th>
					<th>Producto</th>
					<th>Estado</th>
					<th>Agregado</th>
					<th class='text-right'>Precio</th>
					<th class='text-right'>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_producto=$row['id_producto'];
						$codigo_producto=$row['codigo_producto'];
						$nombre_producto=$row['nombre_producto'];
						$status_producto=$row['status_producto'];
						if ($status_producto==1){$estado="Activo";}
						else {$estado="Inactivo";}
						$date_added= date('d/m/Y', strtotime($row['date_added']));
						$precio_producto=$row['precio_producto'];
					?>
					
					<input type="hidden" value="<?php echo $codigo_producto;?>" id="codigo_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $nombre_producto;?>" id="nombre_producto<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo $estado;?>" id="estado<?php echo $id_producto;?>">
					<input type="hidden" value="<?php echo number_format($precio_producto,2,'.','');?>" id="precio_producto<?php echo $id_producto;?>">
					<tr>
						
						<td><?php echo $codigo_producto; ?></td>
						<td ><?php echo $nombre_producto; ?></td>
						<td><?php echo $estado;?></td>
						<td><?php echo $date_added;?></td>
						<td>$<span class='pull-right'><?php echo number_format($precio_producto,2);?></span></td>
					<td ><span class="pull-right">
					<a href="#" class='btn btn-default' title='Editar producto' onclick="obtener_datos('<?php echo $id_producto;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class='btn btn-default' title='Borrar producto' onclick="eliminar('<?php echo $id_producto; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=6><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>