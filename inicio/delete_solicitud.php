<?php
require_once('../conexion/conexion.php');
$Folio = isset($_GET['Folio']) ? $_GET['Folio'] : 0 ;
$sql = 'DELETE FROM solicitud WHERE Folio = ?';
echo $Folio;
echo $sql;
$statement = $pdo->prepare($sql);
$statement->execute(array($Folio));

$results = $statement->fetchAll();
header('Location: Modificar_solicitud.php');
?>
