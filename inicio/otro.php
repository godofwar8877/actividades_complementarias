<?php
 	require_once('../conexion/conexion.php');

$sql = 'SELECT * FROM estudiante ORDER BY Semestre';
$title = 'Estudiantes';
$title_menu = 'Estudiantes';

$statement = $pdo->prepare($sql);
$statement->execute(array());
// Consulta para mostrar los datos de la tabla "Carrera"
$sql_carrera = 'SELECT * FROM carrera';
$statement = $pdo->prepare($sql_carrera);
$statement->execute();
 	$results = $statement->fetchAll();

$show_form = FALSE;

if($_POST)
{
	//TODO:UPDATE ARTICLE
 $sql_update_details = 'UPDATE estudiante SET Num_control = ?, Nombre = ?, Apellido_p = ?, Apellido_m = ?, Semestre = ?, Clave_Carrera = ? WHERE Num_control = ?';

		$noControl = isset($_GET['Num_control']) ? $_GET['Num_control']: '';
		$noControl_2 = isset($_POST['Num_control_2']) ? $_POST['Num_control_2']: '';
  		$nombreEstudiante = isset($_POST['Nombre']) ? $_POST['Nombre']: '';
  		$apellido_p_Estudiante = isset($_POST['Apellido_p']) ? $_POST['Apellido_p']: '';
  		$apellido_m_Estudiante = isset($_POST['Apellido_m']) ? $_POST['Apellido_m']: '';
  		$semestre = isset($_POST['Semestre']) ? $_POST['Semestre']: '';
 		$carrera_clave = isset($_POST['Clave_Carrera']) ? $_POST['Clave_Carrera']: '';

	  	$statement_update_details = $pdo->prepare($sql_update_details);
	  	$statement_update_details->execute(array($Num_control_2,$Nombre,$Apellido_p,$Apellido_m,$semestre,$Clave_Carrera,$Num_control));
	  	header('Location: otro.php');
	}

	if(isset( $_GET['Num_control'] ) )
	{
		//TODO: GET DETAILS
		$show_form = TRUE;
		$sql_update = 'SELECT estudiante.*, carrera.Nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.clave_carreras = estudiante.Clave_Carrera WHERE Num_control = ?';
		$noControl = isset( $_GET['Num_control']) ? $_GET['Num_control'] : 0;

		$statement_update = $pdo->prepare($sql_update);
		$statement_update->execute(array($Num_control));
		$result_details = $statement_update->fetchAll();
		$rs_details = $result_details[0];

	}

 	$sql_status = 'SELECT estudiante.*, carrera.Nombre_carrera FROM estudiante INNER JOIN carrera ON carrera.clave_carreras = estudiante.Clave_Carrera';
 	$statement_status = $pdo->prepare($sql_status);
 	$statement_status->execute();
 	$results_status = $statement_status->fetchAll();
 ?>
<?php
	include('../extend/header.php');
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>PHP & SQL</title>
		<link rel="stylesheet" href="../css/materialize.min.css">
  	</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="teal lighten-2">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">Estudiantes</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">inicio</a></li>
                </ul>
            </div>
        </nav>
   </div>
 		<div class="container">
 			<div class="row">
 				<div class="col s12">
					<h2>Ejecución de una sentencia SQL</h2>
					<hr>
					<h3>Datos SQL</h3>
				<pre>

					</pre>

					<h3>Estudiantes</h3>
					<h2>Proyecto de actividades complementarias</h2>
 					<hr>
					<table class="striped">
				        <thead>
				          <tr>
				              <th>Numero de Control</th>
				              <th>Nombre</th>
				              <th>Apellido Paterno</th>
				              <th>Apellido Materno</th>
				              <th>Semestre</th>
				              <th>Clave Carrera</th>
				          </tr>
				        </thead>
				        <tbody>
				        	<?php
				        		foreach($results as $rs) {
				        	?>
				          <tr>
							<td><?php echo $rs['Num_control']?></td>
							<td><?php echo $rs['Nombre']?></td>
							<td><?php echo $rs['Apellido_p']?></td>
							<td><?php echo $rs['Apellido_m']?></td>
							<td><?php echo $rs['Semestre']?></td>
							<td><?php echo $rs['Clave_Carrera']?></td>
				          </tr>
				          <?php
				          	}
				          ?>
				        </tbody>
				    </table>
					<?php
						if( $show_form )
						{
						?>
						<form method="post">
							<div class="row">
								<div class="input-field col s12">
          							<input placeholder="<?php echo $rs_details['Num_control'] ?>" name="Num_control_2" type="text">
        						</div>
							</div>
							<div class="row">
        						<div class="input-field col s4">
        							<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['Nombre'] ?>" name="Nombre" type="text">
        						</div>
        						<div class="input-field col s4">
        							<i class="material-icons prefix">account_circle</i>
          							<input placeholder="<?php echo $rs_details['Apellido_p'] ?>" name="Apellido_p" type="text">
        						</div>
        						<div class="input-field col s4">
        					 		<i class="material-icons prefix">account_circle</i>
          						<input placeholder="<?php echo $rs_details['Apellido_m'] ?>" name="Apellido_m" type="text">
        						</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
    								<select name="Semestre">
			      						<option value="" disabled selected>Elige el semestre</option>
			      						<option value="I">I</option>
			  							<option value="II">II</option>
			  							<option value="III">III</option>
			  							<option value="IV">IV</option>
			  							<option value="V">V</option>
			  							<option value="VI">VI</option>
			  							<option value="VII">VII</option>
			  							<option value="VIII">VIII</option>
			  							<option value="IX">IX</option>
			  							<option value="X">X</option>
			  							<option value="XI">XI</option>
			  							<option value="XII">XII</option>
    								</select>
    								<label>Semestre</label>
  								</div>
        					</div>
        					<div class="row">
        						<div class="input-field col s12">
                  					<select name="carrera_clave">
                  						<option value="" disabled selected>Elige la carrera</option>
                  						<?php
				        					foreach($results as $rs) {
				        				?>
  										<option value="<?php echo $rs['clave_carreras']?>"><?php echo $rs['Nombre_carrera']?></option>
  										<?php
				          					}
				        				?>
									</select>
									<label>Carrera</label>
								</div>
        					</div>
        				<input class="btn waves-effect waves-light" type="submit" value="Modificar" />
						</form>
						<?php } ?>
 				    <h3>Estudiantes</h3>
 				    <table class="striped">
 					  <thead>

 				            <th>Apellido Materno</th>
 				            <th>Semestre</th>
 				            <th>Carrera</th>
				            <th>Acción</th>
 					    </tr>
 					  </thead>
 					  <tbody>

 							<td><?php echo $rs2['Apellido_m']?></td>
 							<td><?php echo $rs2['Semestre']?></td>
 							<td><?php echo $rs2['Nombre_carrera']?></td>
							<td><a class="btn waves-effect waves-light" href="otro.php?Num_control=<?php echo $rs2['Num_control']; ?>">Ver detalles</a></td>
 					    </tr>
 					    <?php
 				          	}
 					</table>
 				</div>
 			</div>
			<div class="col s12">
                <footer class="page-footer teal lighten-2">
                    <div class="footer-copyright">
                        <div class="container">
                         &copy; 2017 Paola Rubi Benitez
                      </div>
                  </div>
               </footer>
           </div>
		</div>
	</body>
</html>
			<?php
			include('../extend/footer.php');
			?>
