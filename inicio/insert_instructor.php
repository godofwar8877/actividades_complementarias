<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	$sql_actividad_comp = 'SELECT * FROM actividad_comp';
	$statement = $pdo->prepare($sql_actividad_comp);
	$statement->execute();
	$results = $statement->fetchAll();
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO instructor ( RFC_instructor, Nombre_instructor, Apellido_p_instructor, Apellido_m_instructor, Actividad_comp) VALUES( ?, ?, ?, ?, ? )';
  		$RFC_instructor = isset($_POST['RFC_instructor']) ? $_POST['RFC_instructor']: '';
  		$Nombre_instructor = isset($_POST['Nombre_instructor']) ? $_POST['Nombre_instructor']: '';
  		$Apellido_p_instructor = isset($_POST['Apellido_p_instructor']) ? $_POST['Apellido_p_instructor']: '';
  		$Apellido_m_instructor = isset($_POST['Apellido_m_instructor']) ? $_POST['Apellido_m_instructor']: '';
  		$Actividad_comp = isset($_POST['Actividad_comp']) ? $_POST['Actividad_comp']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($RFC_instructor,$Nombre_instructor,$Apellido_p_instructor, $Apellido_m_instructor, $Actividad_comp));
	}
	$sql_status = 'SELECT instructor.*, actividad_comp.Nombre_actividad FROM instructor INNER JOIN actividad_comp ON actividad_comp.Num_actividad = instructor.Actividad_comp ORDER BY RFC_instructor';
	$statement_status = $pdo->prepare($sql_status);
	$statement_status->execute();
	$results_status = $statement_status->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $title?></title>
		<link rel="stylesheet" href="../css/materialize.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="../js/materialize.min.js"></script>
    	<div class="navbar-fixed">
	        <nav class="black">
	            <div class="nav-wrapper">
	                <a href="#" class="brand-logo right">INSTRUCTORES</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">Inicio</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>AGREGAR NUEVO INSTRUCTOR</h2>
					<hr>
				</div>
			</div>
			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="RFC INSTRUCTOR" name=" RFC_instructor" type="text">
        				</div>
					</div>
					<div class="row">
        				<div class="input-field col s4">
          				<input placeholder="NOMBRE INSTRUCTOR" name="Nombre_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="APELLIDO PATERNO" name="Apellido_p_instructor" type="text">
        				</div>
        				<div class="input-field col s4">
          				<input placeholder="APELLIDO MATERNO" name="Apellido_m_instructor" type="text">
        				</div>
        			</div>
        			<div class="row">
        				<div class="input-field col s12">
                  		<select name="Actividad_comp">
                  			<option value="" disabled selected>ELIGE ACTIVIDAD</option>
                  			<?php
				        	foreach($results as $rs) {
				        	?>
  							<option value="<?php echo $rs['Num_actividad']?>"><?php echo $rs['Nombre_actividad']?></option>
  							<?php
				          	}
				        ?>
						</select>
						<label>ACTIVIDAD COMPLEMENTARIA</label>
						</div>
        			</div>
        			<input class="btn waves-effect waves-light" type="submit" value="Agregar" />
        		</form>
      		</div>
			<div class="row">
				<div class="col s12">
				    <h3>Estudiantes</h3>
				    <table class="striped">
					  <thead>
					    <tr>
                <th>RFC</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>ACTIVIDAD COMPLEMENTARIA</th>
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
  							<td><?php echo $rs2['Actividad_comp']?></td>
					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>

			<div class="col s12">
                <footer class="page-footer black">
                    <div class="footer-copyright">
                        <div class="container">
                            &copy; 2017 HERNAN SANTANA BENITEZ
                        </div>
                    </div>
                </footer>
            </div>
		</div>
		<!--  Scripts-->
    	<!--Import jQuery before materialize.js-->
      	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
      	<script type="text/javascript" src="../js/materialize.min.js"></script>
      	<script>
      		$(document).ready(function() {
    		$('select').material_select();
  			});
      	</script>
	</body>
</html>
