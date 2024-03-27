<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabeceraIndex.php');
?>
        <br>
        <?php if($mensaje !=""){?>
        <div class="alert alert-success">
            <?php echo $mensaje;?>
            <a href="mostrarCarrito.php" class="badge badge-success">Ver carritos</a>
        </div>
        <?php }?>
            
        <div class="container-grid top" style = "margin-top: 0px;">
            <?php foreach($rows as $producto){  ?>
                <div class="container-grid-trial" >  
                <div class="card hoverChange" style = "width: 20rem; height: auto;" >
                    <a class = "removeLink"  href="idxDetail.php?id=<?php echo $producto['codigo'];?>">
                        <img 
                        title="<?php echo $producto['modelo'];?>" 
                        alt="<?php echo $producto['modelo'];?>" 
                        class="card-img-top" 
                        src="../menuAdmin/imagenP/<?php echo $producto['imagen'];?>"
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo $producto['descripcion'];?>"
                        height="317px"
                        >
                    
                    <div class="card-body"  >
                        
                        <span><?php echo strtoupper($producto['marca']);?></span>
                        <h5 class="card-title"><?php echo strtoupper($producto['modelo']); echo " - ".$producto['anio'];?></h5>
                        <p class = "card-title"><?php echo ucwords($producto['categoria']);?></p>
                        <p class = "card-title">$<?php echo ($producto['precioDia']." por día");?></p>
                        <!-- <p class="card-text">Descripcion</p> -->

                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['codigo'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['modelo'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precioDia'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                             <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit" style = "display: <?php echo $mostrar;?>;">Agregar al carrito</button>
                        </form>
                        
                    </div>
                    </a>
                </div>

                
            </div>   
           <?php } ?>
      </div>
      <script>
      $(function () {
        $('[data-toggle="popover"]').popover()});</script>
 <?php
 include('templates/pie.php');
?>