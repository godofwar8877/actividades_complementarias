<?php
	require_once('../conexion/conexion.php');
	$title = 'Instructores';
	$title_menu = 'INSTRUCTORES';

	$sql_actividad_comp = 'SELECT * FROM actividad_comp';
	$statement = $pdo->prepare($sql_actividad_comp);
	$statement->execute();
	$results = $statement->fetchAll();
	$show_form = FALSE;

	if($_POST)
	{
	  	//TODO:UPDATE ARTICLE
	  	$sql_update_details = 'UPDATE instructor SET RFC_instructor = ?, Nombre_instructor = ?, Apellido_p_instructor = ?, Apellido_m_instructor = ?, Actividad_comp = ? WHERE RFC_instructor = ?';
		  $RFC_instructor = isset($_GET['RFC_instructor']) ? $_GET['RFC_instructor']: '';
		  $RFC_instructor_2 = isset($_POST['Num_actividad_2']) ? $_POST['Num_actividad_2']: '';
  		$Nombre_instructor = isset($_POST['Nombre_instructor']) ? $_POST['Nombre_instructor']: '';
			$Apellido_p_instructor = isset($_POST['Apellido_p_instructor']) ? $_POST['Apellido_p_instructor']: '';
			$Apellido_m_instructor = isset($_POST['Apellido_m_instructor']) ? $_POST['Apellido_m_instructor']: '';
			$Actividad_comp = isset($_POST['Actividad_comp']) ? $_POST['Actividad_comp']: '';
	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($RFC_instructor_2,$Nombre_instructor,$Apellido_p_instructor, $Apellido_m_instructor, $Actividad_comp, $RFC_instructor));
	  	header('Location: Modificar_instructor.php');
	}
	if(isset( $_GET['RFC_instructor'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT instructor.*, actividad_comp.Nombre_actividad FROM instructor INNER JOIN actividad_comp ON actividad_comp.Num_actividad = instructor.Actividad_comp WHERE RFC_instructor = ?';
		$RFC_instructor = isset( $_GET['RFC_instructor']) ? $_GET['RFC_instructor'] : 0;
		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($RFC_instructor));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];
	}
	$sql_status = 'SELECT instructor.*, actividad_comp.Nombre_actividad FROM instructor INNER JOIN actividad_comp ON actividad_comp.Num_actividad = instructor.Actividad_comp';
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
          							<input placeholder="<?php echo $rs_details['RFC_instructor'] ?>" name="RFC_instructor_2" type="text">
        						</div>
							</div>

							<div class="row">
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
												<input placeholder="<?php echo $rs_details['Nombre_instructor'] ?>" name="Nombre_instructor" type="text">
										</div>
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
												<input placeholder="<?php echo $rs_details['Apellido_p_instructor'] ?>" name="Apellido_p_instructor" type="text">
										</div>
										<div class="input-field col s4">
											<i class="material-icons prefix">account_circle</i>
											<input placeholder="<?php echo $rs_details['Apellido_m_instructor'] ?>" name="Apellido_m_instructor" type="text">
										</div>
									</div>
									<div class="row">

									</div>
									<div class="row">
										<div class="input-field col s12">
														<select name="Actividad_comp">
															<option value="" disabled selected>ACTIVIDAD</option>
															<?php
													foreach($results as $rs) {
												?>
											<option value="<?php echo $rs['Num_actividad']?>"><?php echo $rs['Nombre_actividad']?></option>
											<?php
														}
												?>
									</select>
									<label>ACTIVIDAD</label>
								</div>
									</div>
								<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
							</form>
							<?php } ?>

				    <h3>INSTRUCTORES</h3>
				    <table class="striped">
					  <thead>
							<tr>
					    			<th>RFC INSTRUCTOR</th>
				          	<th>NOMBRE INSTRUCTOR</th>
				            <th>APELLIDO PATERNO</th>
				            <th>APELLIDO MATERNO</th>
				            <th>ACTIVIDAD COMPLEMENTARIA</th>
										<th>CAMBIAR</th>
				            <th colspan="2">CAMBIAR</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
				        	foreach($results_status as $rs2) {
				        ?>
					    <tr>
								<td><?php echo $rs2['RFC_instructor']?></td>
							<td><?php echo $rs2['Nombre_instructor']?></td>
							<td><?php echo $rs2['Apellido_p_instructor']?></td>
							<td><?php echo $rs2['Apellido_m_instructor']?></td>
							<td><?php echo $rs2['Nombre_actividad']?></td>
							<td><a class="btn waves-effect waves-light grey" href="Modificar_instructor.php?RFC_instructor=<?php echo $rs2['RFC_instructor']; ?>">CAMBIAR</a></td>
							<td><a class="btn waves-effect waves-light black" onclick="delete_instructor(<?php echo $rs2['RFC_instructor']; ?>)" href="#">ELIMINAR</a>
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
