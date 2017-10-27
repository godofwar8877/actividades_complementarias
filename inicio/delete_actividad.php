<?php
require_once('../conexion/conexion.php');
$Num_actividad = isset($_GET['Num_actividad']) ? $_GET['Num_actividad'] : 0 ;
$sql = 'DELETE FROM actividad_comp WHERE Num_actividad = ?';
echo $Num_actividad;
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute(array($Num_actividad));

$results = $statement->fetchAll();
header('Location: Modificar_actividad.php');
?>
