<?php
	require_once('../conexion/conexion.php');
	$title = 'Agregar un nuevo registro';

	$sql_actividad_comp = 'SELECT * FROM actividad_comp';
	$statement = $pdo->prepare($sql_actividad_comp);
	$statement->execute();
	$results = $statement->fetchAll();
	if( $_POST )
	{
  		$sql_insert = 'INSERT INTO actividad_comp ( Num_actividad, Nombre_actividad) VALUES( ?, ? )';
  		$Num_actividad = isset($_POST['Num_actividad']) ? $_POST['Num_actividad']: '';
  		$Nombre_actividad = isset($_POST['Nombre_actividad']) ? $_POST['Nombre_actividad']: '';
  		$statement_insert = $pdo->prepare($sql_insert);
  		$statement_insert->execute(array($Num_actividad, $Nombre_actividad));
	}



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
	                <a href="#" class="brand-logo right">ACTIVIDADES</a>
	                <ul id="nav-mobile" class="left side-nav">
	                    <li><a href="index.php">INICIO</a></li>
	                </ul>
	            </div>
	        </nav>
    	</div>
		<div class="container">
			<div class="row">
				<div class="col s12">
					<h2>AGREGAR NUEVA ACTIVIDAD COMPLEMENTARIA</h2>
					<hr>
				</div>
			</div>

			<div class="row">
				<form method="post" class="col s12">
					<div class="row">
						<div class="input-field col s12">
          				<input placeholder="NUMERO ACTIVIDAD" name="Num_actividad" type="text">
        				</div>
					</div>

          <div class="row">
                <div class="input-field col s4">

                  <input placeholder="NOMBRE ACTIVIDAD" name="Nombre_actividad" type="text">
                </div>

        		 <input class="btn waves-effect waves-black" type="submit" value="Agregar" />
        		</form>
      		</div>

<div class="container">
			<div class="row">
				<div class="col s12">
				    <h3>ACTIVIDADES</h3>
				    <table class="striped">
					  <thead>
					    <tr>
                <th>NUMERO</th>
					    	<th>NOMBRE</th>



				         </tr>
					  </thead>
					  <tbody>

					  	<?php
				        	foreach($results as $rs) {
				        ?>
					    <tr>

					    <td><?php echo $rs['Num_actividad']?></td>
							<td><?php echo $rs['Nombre_actividad']?></td>


					    </tr>
					    <?php
				          	}
				        ?>
					</tbody>
					</table>
				</div>
			</div>
    </div>

			<div class="col s10">
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
