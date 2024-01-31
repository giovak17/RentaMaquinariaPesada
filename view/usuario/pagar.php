<?php
//include('../../data/config.php');
//session_start();
include('../../data/conexionDBB.php');
include('carrito.php');
include('templates/cabecera.php');

$_SESSION['abono'] = $_POST['abono'];
$idFolio = $_GET['cod'];
$_SESSION['abono'] = $_POST['abono'];
if ($_POST) {
    
    $SID = session_id();
    $abono = isset($_POST['abono']) ? $_POST['abono'] : 0;

    $_SESSION['abono'] = $_POST['abono'];
}

?>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<style>
    /* Media query for mobile viewport */
    @media screen and (max-width: 400px) {
        #paypal-button-container {
            width: 100%;
        }
    }

    /* Media query for desktop viewport */
    @media screen and (min-width: 400px) {
        #paypal-button-container {
            width: 250px;
            display: inline-block;
        }
    }
</style>

<div class="jumbotron text-center">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estás a punto de pagar con PayPal la cantidad de:
        <h4>$<?php echo number_format($abono, 2); ?></h4>
        <?php
        if ($abono > 0) {
            echo "<p>Abono realizado: $" . number_format($abono, 2) . "</p>";
        }
        ?>
        <div id="paypal-button-container"></div>
    </p>
    <p><strong>(Para aclaraciones: josumndz53@gmail.com)</strong></p>
</div>

<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',  // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill',   // pill | rect
            color: 'silver'   // gold | blue | silver | black
        },

        client: {
            sandbox: 'AT8KvJCPQyF9X-HcgZT8BMxVZzd30VjXV2FdE_fgHru8AUhm_V9n6VCNRSoSJmsC0v40XP_7tBi3d412',
            
            production: ''
        },

        payment: function (data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '<?php echo $abono; ?>', currency: 'MXN' },
                            description: "Compra de productos a leonel :$<?php echo number_format($abono, 2); ?>",
                            
                        }
                    ]
                }
            });
        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                window.alert('Pago completado!');
                setTimeout(function () {
                    window.location.href = "verificador.php?paymentToken="+data.paymentToken+"&paymentID="+data.paymentID+"&idFolio="+<?php echo $idFolio?>;
                }, 1000);
            });
        }

    }, '#paypal-button-container');
</script>

<?php include('templates/pie.php'); ?>
