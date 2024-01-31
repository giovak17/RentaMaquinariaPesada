<?php
include_once '../../data/conexionDB.php';

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se recibió un nuevo estado válido
    if (isset($_POST['nuevo_estado']) && !empty($_POST['nuevo_estado'])) {
        $nuevoEstado = $_POST['nuevo_estado'];
        $folioReserva = $_POST['folio_reserva'];

        // Crear instancia de la clase conexionDB
        $conexionDB = new conexionDB();

        // Verificar la conexión
        if ($conexionDB->connect()) {
            // Consulta para actualizar el estado en la base de datos
            $query = "UPDATE reservas SET estatusR = '$nuevoEstado' WHERE folio = $folioReserva";

            // Ejecutar la consulta
            if ($conexionDB->execupdate($query)) {
                echo "Estado actualizado correctamente.";
            } else {
                echo "Error al actualizar el estado.";
            }
        } else {
            echo "Error de conexión.";
        }
    } else {
        echo "Error: Nuevo estado no válido.";
    }
}
?>
