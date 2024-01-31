<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require "../../data/conexionBD.php";
include('../../data/config.php');
include('carrito.php');
include('templates/cabecera.php');

if(!isset($_SESSION["id"])){
    $mostrar = "none";
  }
  else{
    $mostrar = "inline";
  }
  
?>


<br>

<!--inicio div-->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <!-- Contenido de la Primera Columna -->
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
                        <div class="carousel-inner">
      <?php
      $i = 1;
      //$rows = mysqli_query($conn, "select * from v_infomaquinas where codigo = 3");
      include_once '../../data/maquinas.php';
      $modelo = new maquinas();

      $dataSet = $modelo->getAutoSetform($_GET['id']);
      $rzz = mysqli_fetch_assoc($dataSet);
      ?>


      <?php foreach ($dataSet as $row) : ?>
        <div class="carousel-item active">
          <img src="../menuAdmin/imagenP/<?php echo $row["imagen"]; ?>"  style = "width: 50vw; height: 70vh;">
        </div>

          <?php
          foreach (json_decode($row["extraImagenes"]) as $image) : ?>

          <div class="carousel-item ">
          <img src="../menuAdmin/imagenesExtra/<?php echo $image; ?>" style = "width: 50vw; height: 70vh;">
          </div>
          <?php endforeach; ?>

      <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Contenido de la Segunda Columna -->
            <div class="card">
                <div class="card-body">
          <h4 class="card-title"><?php echo "<b>".strtoupper($rzz['modelo'])." - ".strtoupper($rzz['anio'])."</b>"?></h4>
          <p class="card-text"style = "margin: 0;"><?php echo "<b>Marca: </b>".ucwords($rzz['marca'])?></p>
          <p class="card-text"style = "margin: 0;"><?php echo "<b>Categoria: </b>".ucwords($rzz['categoria'])?></p>
          <p class="card-text"style = "margin: 0;"><?php echo "<b>Capacidad: </b>".$rzz['capacidad']." KG"?></p>
          <br>


                   
                    <?php
                    if ($dataSet != "wrong") {
                        mysqli_data_seek($dataSet, 0);
                        while ($rs = mysqli_fetch_assoc($dataSet)) {
                            ?>
                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($rs['codigo'], COD, KEY); ?>">
                                <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($rs['modelo'], COD, KEY); ?>">
                                <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($rs['precioDia'], COD, KEY); ?>">
                                <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit" style = "display: <?php echo $mostrar;?>;">Agregar al carrito</button>
                            </form>
                            <?php
                        }
                    } else {
                        echo 'Sin descripcion';
                    }
                    ?>
                </div>

                <div class="card-body">
                    <h5 class="card-title"><b>Descripción</b></h5>
                    <p class="card-text">
                        <?php
                        if ($dataSet != "wrong") {
                            mysqli_data_seek($dataSet, 0);
                            while ($rs = mysqli_fetch_assoc($dataSet)) {
                                echo $rs['descripcion'];
                            }
                        } else {
                            echo 'Sin descripcion';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--inicio div-->

<?php
include('templates/pie.php');
?>
