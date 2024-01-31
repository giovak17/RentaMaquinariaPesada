<?php // addMarcas.php

include('../data/maquinas.php');
$miMaquinas = new maquinas();

//$miMaquinas->setCodigo($_POST['txtmqCodigo']);
$miMaquinas->setNumSerie($_POST['txtmqNumSerie']);
$miMaquinas->setAlmacen($_POST['txtalmCodigo']);


$miMaquinas->updateMaquinas($_GET['id']);
header ('Location: ../view/menuAdmin/agregarm.php'); // editar despues
?>