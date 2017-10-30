<?php

$dsn = 'mysql:dbname=solicitud_actividad;host=localhost';
$user = 'Hernan30';
$password = 'nWDsNfdMvMB3jtLS';

try{

	$pdo = new PDO(	$dsn,
					$user,
					$password
					);

}catch( PDOException $e ){
	echo 'Error al conectarnos: ' . $e->getMessage();
}
?>
