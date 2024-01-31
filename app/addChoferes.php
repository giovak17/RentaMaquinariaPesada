<?php
include('../data/choferes.php');

$miChofer = new choferes();

//$miChofer->setCodigo($_POST['codigo']);
$miChofer->setNombre($_POST['nombre']);
$miChofer->setApPat($_POST['apPat']);
$miChofer->setApMat($_POST['apMat']);
$miChofer->setNumTel($_POST['numTel']);
$miChofer->setAlmacen($_POST['almacen']);
$miChofer->setRepRtas($_POST['reprtas']);

$newid = $miChofer->setchoferes();

header('Location: ../view/menuAdmin/agregarch.php');
?>