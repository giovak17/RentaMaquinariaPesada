<?php // addAlmacenes.php

include('../data/almacenes.php');
$miAlmacen = new almacenes();

$miAlmacen->setCodigo($_POST['txtCodigo']);
$miAlmacen->setNombre($_POST['txtNombre']);
$miAlmacen->setNumTel($_POST['txtNumTel']);
$miAlmacen->setColonia($_POST['txtColonia']);
$miAlmacen->setNum($_POST['Num']);
$miAlmacen->setCalle($_POST['txtCalle']);
$miAlmacen->setCiudad($_POST['txtCiudad']);

$newid = $miAlmacen->setAlmacenes();
header ('Location: ../idxAlmacenes.php'); // editar despues
?>