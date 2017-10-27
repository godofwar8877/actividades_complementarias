<?php
require_once('../conexion/conexion.php');
$Clave_departamento = isset($_GET['Clave_departamento']) ? $_GET['Clave_departamento'] : 0 ;
$sql = 'DELETE FROM departamento WHERE Clave_departamento = ?';
echo $Clave_departamento;
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute(array($Clave_departamento));

$results = $statement->fetchAll();
header('Location: Modificar_departamento.php');
?>
