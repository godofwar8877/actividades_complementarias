<pre><?php

require_once('../conexion/conexion.php');

$titulo = 'Búsqueda';

$sql = 'SELECT * FROM departamento WHERE 1';
$search_terms = isset($_GET['nombre_departamento']) ? $_GET['nombre_departamento'] : '';
$search_arr = explode(' ', $search_terms);
$arr_sql_terms = array();
$n = 0;
foreach ( $search_arr as $search_term) {
 $sql .= " AND nombre_departamento LIKE :search{$n}";
 $arr_sql_terms[":search{$n}"] = '%' . $search_term . '%';
 $n++;
}

$statement = $pdo->prepare($sql);
$statement->execute($arr_sql_terms);
$results = $statement->fetchAll();
?>
</pre>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title><?php echo $titulo ?></title>
		<link rel="stylesheet" href="../css/materialize.min.css">
		</head>

	<body>
		<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<div class="navbar-fixed">
        <nav class="black">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo right">DEPARTAMENTO</a>
                <ul id="nav-mobile" class="left side-nav">
                    <li><a href="index.php">INICIO</a></li>
                </ul>
            </div>
        </nav>
    </div>
		<div class="container">
		<div class="row">
				<div class="col s12">
					<h2>Buscador sencillo con LIKE</h2>
					<hr>
                                           <form method="get">
						<div class="row">
						<div class="col s12">
						<label>INGRESE NOMBRE DE DEPARTAMENTO
						<input type="text" name="Nombre_estudiante"
						placeholder="ej. Servicio escolares">
						<input class="button" type="submit" value="BUSCAR" />
							</label>
							</div>
							</div>
							</form>


          <h3>DEPARTAMENTOS</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>

                    <th>Clave del departamento</th>
                    <th>Nombre del departamento</th>
                    <th>rfc del trabajador</th>


									</tr>

				        </thead>
				        <tbody>
                                                   <?php
                foreach($results as $rs) {
                                                     ?>
				          <tr>
                    <td><?php echo $rs['Clave_departamento']?></td>
                    <td><?php echo $rs['nombre_departamento']?></td>
                    <td><?php echo $rs['trabajador_RFC_trabajador']?></td>


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
	</body>
</html>
