<?php
include('../data/maquinas.php');
$miMaquinas = new maquinas();
$miMaquinas->deleteMaquina($_GET['id']);
//echo "si jala";
header ('Location: ../view/menuAdmin/agregarm.php');
?>