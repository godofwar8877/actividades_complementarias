<pre><?php

require_once('../conexion/conexion.php');

$titulo = 'Búsqueda';

$sql = 'SELECT * FROM carrera WHERE 1';
$search_terms = isset($_GET['Nombre_carrera']) ? $_GET['Nombre_carrera'] : '';
$search_arr = explode(' ', $search_terms);
$arr_sql_terms = array();
$n = 0;
foreach ( $search_arr as $search_term) {
 $sql .= " AND Nombre_carrera LIKE :search{$n}";
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
                <a href="#" class="brand-logo right">CARRERAS</a>
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
						<label>INGRESE CARRERA
						<input type="text" name="Nombre_carrera"
						placeholder="ej. Ingenieria en Informatica">
						<input class="button" type="submit" value="BUSCAR" />
							</label>
							</div>
							</div>
							</form>


          <h3>CARRERAS</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>

                    <th>Clave de la carrera</th>
                    <th>Nombre de la carrera</th>

									</tr>

				        </thead>
				        <tbody>
                                                   <?php
                                                foreach($results as $rs) {
                                                     ?>
				          <tr>
                    <td><?php echo $rs['Clave_carrera']?></td>
				            <td><?php echo $rs['Nombre_carrera']?></td>


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
