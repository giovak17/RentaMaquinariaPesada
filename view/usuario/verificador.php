<?php
session_start();
include('../../data/conexionDBB.php');
$idFolio = $_GET['idFolio'];
$montoPago = $_SESSION['abono'];
echo $idFolio;
//print_r($_GET);

$ClientID = "AT8KvJCPQyF9X-HcgZT8BMxVZzd30VjXV2FdE_fgHru8AUhm_V9n6VCNRSoSJmsC0v40XP_7tBi3d412";
$Secret = "EI1K9hYAb8VVCQAteUj9A_PUjxQ5D_IKsgnPS_bCPOsPGjY-RR6AMOXorf8WnWZu2opNnDyiU2kfB_7a";

$Login = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
curl_setopt($Login, CURLOPT_RETURNTRANSFER, true);
curl_setopt($Login, CURLOPT_USERPWD, $ClientID . ":" . $Secret);

curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$RS = curl_exec($Login);

$objRS = json_decode($RS);

$AccessToken = $objRS->access_token;

//print_r($AccessToken);

$abono = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/" . $_GET['paymentID']);

curl_setopt($abono, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $AccessToken));
curl_setopt($abono, CURLOPT_RETURNTRANSFER, true);

$RS = curl_exec($abono);

$objTransDetail = json_decode($RS); // Añadido un punto y coma

$statePAY = $objTransDetail->state; // Corregido aquí

//$custom =$objTransDetail->transactions[0]->custom;

echo $statePAY;
echo 'hola';
echo $montoPago;
$statePAY = $objTransDetail->state;
echo $_SESSION['abono'];
if ($statePAY == 'approved') {
    // Ejecutar la sentencia SQL solo si el estado es 'approved'
    
    $SID = session_id();
    //$correo = $_POST['email'];
    $abono = isset($_POST['abono']) ? $_POST['abono'] : 0;
    echo 'aqui todo bien';
    /*$sentencia = $pdo->prepare("INSERT INTO `pagos` (`folio`, `fecha`, `montoPago`, `concepto`, `saldo`, `reserva`) 
    VALUES (NULL, NOW(), :montoPago, 'Prueba', :saldo, " . $_GET['cod'] . ");");*/

    $sentencia = $pdo->prepare("INSERT INTO `pagos` (`montoPago`, `concepto`, `reserva`) 
    VALUES (:montoPago, 'Prueba',".$idFolio.");");
    echo $montoPago;
    $sentencia->bindParam(":montoPago", $montoPago);
    //$sentencia->bindParam(":saldo", $total);
    $sentencia->execute();
    header('Location: idxAdeudos.php'); // Cambia 
    
    exit;

} else {
    echo '<script>';
    echo 'alert("Pago no realizado. Redirigiendo a otra página.");';
    echo 'window.location.href = "idxPagos";'; // Cambia 
    echo '</script>';
    exit;
}

?>
