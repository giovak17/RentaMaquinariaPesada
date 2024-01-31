<?php
session_start();
include '../data/reservas.php';
include '../data/re_maq.php';
include '../data/entregas.php';

$miReserv = new reservas();
$mq = new re_maq();
$rv = new entregas();

$fecha_actual = date('Y-m-d');

$miReserv->setFechaSolicitud($fecha_actual);
$miReserv->setFechaEntrega($_POST['FechaInicio']);
$miReserv->setFechaFinal($_POST['FechaFinal']);
$miReserv->setDescripcion($_POST['txtDes']);
$miReserv->setCliente($_POST['idCl']);

$reservaID = $miReserv->setReserva();

$rv->setHoraEntrega($_POST['']);
$rv->setNombre($_POST['txtNombre']);
$rv->setApPat($_POST['txtApPa']);
$rv->setApMat($_POST['txtApMa']);
$rv->setColinia($_POST['txtColonia']);
$rv->setCalle($_POST['txtCalle']);
$rv->setNum($_POST['txtNum']);
$rv->setCp($_POST['txtCP']);
$rv->setReserva($reservaID);

$id = $rv->setEntregas();

foreach ($_SESSION['carrito'] as $indice => $producto) {
    $mq->setReserva($reservaID);
    $mq->setMaquina($producto['id']);
    $mq->setCantDias($_POST['cantDias']);
    echo $reservaID;
    echo $producto['id'];
    echo $numDias;
    $newid = $mq->setRentaMaquina();
}
unset($_SESSION['carrito']);
unset($_SESSION['fechaInicio']);
unset($_SESSION['fechaFinal']);

header('Location: ../view/usuario/index.php');
?>
