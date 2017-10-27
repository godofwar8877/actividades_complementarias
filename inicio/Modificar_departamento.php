<?php
	require_once('../conexion/conexion.php');
	$title = 'Departamentos';
	$title_menu = 'DEPARTAMENTOS';

	$sql_trabajador = 'SELECT * FROM trabajador';
	$statement = $pdo->prepare($sql_trabajador);
	$statement->execute();
	$results = $statement->fetchAll();
	$show_form = FALSE;
	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE departamento SET Clave_departamento = ?, nombre_departamento = ?, trabajador_RFC_trabajador = ? WHERE Clave_departamento = ?';
		  $Clave_departamento = isset($_GET['Clave_departamento']) ? $_GET['Clave_departamento']: '';
		  $Clave_departamento_2 = isset($_POST['Clave_departamento_2']) ? $_POST['Clave_departamento_2']: '';
  		$nombre_departamento = isset($_POST['nombre_departamento']) ? $_POST['nombre_departamento']: '';
  		$trabajador_RFC_trabajador = isset($_POST['trabajador_RFC_trabajador']) ? $_POST['trabajador_RFC_trabajador']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Clave_departamento_2,$nombre_departamento,$trabajador_RFC_trabajador, $Clave_departamento));
	  	header('Location: Modificar_departamento.php');
	}
	if(isset( $_GET['Clave_departamento'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT departamento.*, trabajador.Nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC_trabajador = departamento.trabajador_RFC_trabajador ORDER BY Clave_departamento';
		$Clave_departamento = isset( $_GET['Clave_departamento']) ? $_GET['Clave_departamento'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Clave_departamento));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT departamento.*, trabajador.Nombre_trabajador FROM departamento INNER JOIN trabajador ON trabajador.RFC_trabajador = departamento.trabajador_RFC_trabajador';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>
<?php
	include('../extend/header.php');
?>

		<div class="container">
			<div class="row">
				<div class="col s12">

					<hr>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['Clave_departamento'] ?>" name="Clave_departamento_2" type="text">
        						</div>
							</div>
							<div class="row">
								<div class="input-field col s12">
									<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['nombre_departamento'] ?>" name="nombre_departamento" type="text">
        						</div>
							</div>

        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="trabajador_RFC_trabajador">

                  						<option value="" disabled selected>ELIGE EL TRABAJADOR</option>
                  						<?php
				        					foreach($results as $rs) {
				        				?>
  										<option value="<?php echo $rs['RFC_trabajador']?>"><?php echo $rs['Nombre_trabajador']?></option>
  										<?php
				          					}
				        				?>
									</select>
									<label>TRABAJADOR</label>
								</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
				    <h3>DEPARTAMENTO</h3>
				    <table class="striped">
					  <thead>
					    <tr>
					    	<th>CLAVE DEPARTAMENTO</th>
				          	<th>NOMBRE DEL DEPARTAMENTO</th>
				            <th>NOMBRE DEL TRABAJADOR</th>
				            <th colspan="2">CAMBIAR</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
					    	<td><?php echo $rs2['Clave_departamento']?></td>
							<td><?php echo $rs2['nombre_departamento']?></td>
							<td><?php echo $rs2['Nombre_trabajador']?></td>
							<td><a class="btn waves-effect waves-light" href="Modificar_departamento.php?Clave_departamento=<?php echo $rs2['Clave_departamento']; ?>">CAMBIAR</a></td>
							<td><a class="btn waves-effect waves-light black" onclick="delete_departamento(<?php echo $rs2['Clave_departamento']; ?>)" href="#">ELIMINAR</a>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
			<?php
				include('../extend/footer.php');
			?>
