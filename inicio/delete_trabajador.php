<?php
require_once('../conexion/conexion.php');
$RFC_trabajador = isset($_GET['RFC_trabajador']) ? $_GET['RFC_trabajador'] : 0 ;
$sql = 'DELETE FROM trabajador WHERE RFC_trabajador = ?';
echo $RFC_trabajador;
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute(array($RFC_trabajador));

$results = $statement->fetchAll();
header('Location: Modificar_trabajador.php');
?>
