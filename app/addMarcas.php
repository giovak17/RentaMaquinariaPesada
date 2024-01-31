<?php // addMarcas.php

include('../data/marcas.php');
$miMarcas = new marcas();

$miMarcas->setCodigo($_POST['txtCodigo']);
$miMarcas->setNombre($_POST['txtNombre']);

$newid = $miMarcas->setMarcas();
//header ('Location: ../view/menuAdmin/agregarmarca.php'); // editar despues
?>