<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo '<script>
        if (confirm("¿Estás seguro de que deseas eliminar esta máquina?")) {
            window.location.href = "deletemaquinas.php?id=' . $id . '";
        } else {
            window.location.href = "../view/menuAdmin/agregarm.php";
        }
    </script>';
}
?>