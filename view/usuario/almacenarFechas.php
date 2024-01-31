<?php
session_start();
echo $_POST["fechaInicio"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe las fechas del formulario
    $fechaInicio = $_POST["txtFechaInicio"];
    $fechaFinal = $_POST["txtFechaFinal"];

    // Almacena las fechas en variables de sesión
    $_SESSION["fechaInicio"] = $fechaInicio;
    $_SESSION["fechaFinal"] = $fechaFinal;

    // Puedes redirigir a otra página si es necesario
    header("Location: ../view/usuario/confirmarReserva.php");
    exit();
}
?>