<?php
include('../data/marcas.php');
$miMarcas = new marcas();
$miMarcas->deleteMarca($_GET['id']);
//echo "si jala";
header ('Location: ../view/menuAdmin/agregarmarca.php');
?>