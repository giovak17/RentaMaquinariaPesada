<?php
require "../data/conexionBD.php";
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../view/usuario/index.php");

?>
