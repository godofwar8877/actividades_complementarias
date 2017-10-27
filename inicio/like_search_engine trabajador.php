<pre><?php

require_once('../conexion/conexion.php');

$titulo = 'Búsqueda';

$sql = 'SELECT * FROM trabajador WHERE 1';
$search_terms = isset($_GET['Nombre_trabajador']) ? $_GET['Nombre_trabajador'] : '';
$search_arr = explode(' ', $search_terms);
$arr_sql_terms = array();
$n = 0;
foreach ( $search_arr as $search_term) {
 $sql .= " AND Nombre_trabajador LIKE :search{$n}";
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
                <a href="#" class="brand-logo right">TRABAJADOR</a>
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
						<label>INGRESE NOMBRE DE TRABAJADOR
						<input type="text" name="Nombre_trabajador"
						placeholder="ej. Jose">
						<input class="button" type="submit" value="BUSCAR" />
							</label>
							</div>
							</div>
							</form>


          <h3>TRABAJADORES</h3>
					<hr>
					<table class="striped">
				        <thead>
				          <tr>

                    <th>RFC</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Clave presupuestal</th>

									</tr>

				        </thead>
				        <tbody>
                                                   <?php
                                                foreach($results as $rs) {
                                                     ?>
				          <tr>
                    <td><?php echo $rs['RFC_trabajador']?></td>
                    <td><?php echo $rs['Nombre_trabajador']?></td>
                    <td><?php echo $rs['Apellido_p_trabajador']?></td>
                    <td><?php echo $rs['Apellido_m_trabajador']?></td>
                    <td><?php echo $rs['clave_presupuestal']?></td>


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
