<?php // addModelos.php

include('../data/Modelos.php');
$miModelo = new modelos();
$directorio_destino = 'img/';

//$miModelo->setNumModelo($_POST['txtNumModelo']);
$miModelo->setAnoFabricacion($_POST['txtAnoFabricacion']);
$miModelo->setCapacidadCarga($_POST['CapacidadCarga']);
$miModelo->setNombreModelo($_POST['txtNombreModelo']);
$miModelo->setDescripcion($_POST['txtDescripcion']);
$miModelo->setImg($_FILES['imagen']['name']);
$miModelo->setRutaDestino($directorio_destino . $_FILES['imagen']['name']);
//$miModelo->setPrecioDia($_POST['txtPrecioDia']);
$miModelo->setMarca($_POST['txtMarca']); //FK

$newid = $miModelo->setModelos();
header ('Location: ../view/menuAdmin/agregarmodelo.php'); // editar despues
?>