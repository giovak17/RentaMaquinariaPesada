<?php // addAlmacenes.php

include('../data/maquinas.php');
$miCiudad = new almacenes();

$miCiudad->setCodigo($_POST['txtCodigo']);
$miCiudad->setNombre($_POST['txtNombre']);

$newid = $miCiudad->setMaquinas();
header ('Location: ../idxCiudad.php'); // editar despues

?>