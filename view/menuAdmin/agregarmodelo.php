<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">
    <script defer src="popModal.js"></script>
</head>
<body>
<header>
<h1 class="letraHeader"><font face=”Cambria” size=5>Administrador</font></h1>
        <nav id="aveces">
            <ul>
            <li><a href="#">Dashboard</a>
                    <ul style="--cantidad-items: 2">
                        <li><a href="estadisticas.php"><font face=”Cambria” size=4>Estadisticas</font></a></li>
                        <li><a href="maquinasAlmacenadas.php"><font face=”Cambria” size=4>MaquinasPorAlmacen</font></a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Maquinaria</font></a>
                    <ul style="--cantidad-items: 6.5">
                       
                        <li><a href="categoria.php"><font face=”Cambria” size=4>Categorias</font></a></li>
                        <li><a href="dispo.php"><font face=”Cambria” size=4 >Disponibilidad</font></a></li>
                        <li><a href="mantenimiento.php"><font face=”Cambria” size=4>Mantenimiento</font></a></li>
                        <li><a href="agregarm.php"><font face=”Cambria” size=4>Agregar maquina</font></a></li>
                        <li><a href="agregarmarca.php"><font face=”Cambria” size=4>Agregar marca</font></a></li>
                        <li><a href="agregarmodelo.php"><font face=”Cambria” size=4>Agregar modelo</font></a></li>
                    </ul>
                </li>
                <li id="reservas"><a href="#">Reservas</a>
                    <ul style="--cantidad-items: 8">
                        <li><a href="confirmacion.php">Confirmacion de reservas</a></li>
                        <li><a href="maquinasReservadas.php">Maquinas reservadas</a></li>
                        <li><a href="reservasRep.php">Reservas de representantes</a></li>
                        <li><a href="informacionRe.php">Informacion de reservas por cliente</a></li>
                        <li><a href="pagosRe.php">Pagos por reservas</a></li>
                        <li><a href="estatusRe.php">Estatus de reservas</a></li>
                    </ul>
                </li>
                <li><a href="#"><font face=”Cambria” size=4>Choferes</font></a>
                    <ul style="--cantidad-items: 2.5">
                        <li><a href="agregarch.php"><font face=”Cambria” size=4>Agregar Choferes</font></a></li>
                        <li><a href="entrega.php"><font face=”Cambria” size=4>Entregas de maquinaria</font></a></li>
                    </ul>
                    <li><a href="verRepresentantes.php"><font face=”Cambria” size=4>Representantes</font></a>
                    <li><a href="../../app/logout.php"><font face=”Cambria” size=4>Cerrar Sesion</font></a>
            </ul>
        </nav>
    </header>
    <main>
        <h1><font face=”Cambria” size=6>Agregar modelo</font></h1>

    <a href="agregarmodelo2.php">
    <button class = "boton">+</button>
    </a>
    <div class = "flex-container">
    <div class = "container">
    <br>
    <br>
    <div class = "row">   
    <table class="table">
            <tr class = "table-dark" >
              <td>Numero de modelo</td>
              <td>Año de fabricacion</td>
              <td>Capacidad de carga</td>
              <td>Nombre del modelo</td>
              <td>Descripcion</td>
              <td>Foto</td>
              <td>Precio por dia</td>
              <td>Marca</td>
              <td></td>
              <td></td>
          </tr>
        
          <?php
          include('../../data/modelos.php');
          $miModelos = new modelos();
          $dataset = $miModelos->getAllModelos();
          if($dataset != 'wrong'){
            while($registro = mysqli_fetch_assoc($dataset)){
                echo "<tr>";  
                echo "<td>".$registro['num']."</td>";
           
                echo "<td>".$registro['anoFabricacion']."</td>";
            
                echo "<td>".$registro['capacidadCarga']."</td>";
             
                echo "<td>".$registro['nombre']."</td>";
              
                echo "<td>".$registro['descripcion']."</td>";
               
                echo "<td>".$registro['imagen']."</td>";
              
                //echo "<td>".$registro['precioDia']."</td>";
            
                echo "<td>".$registro['marca']."</td>";
            
                echo "</tr>";

              
            }
        }else{
                echo "No hay datos que consultar";
            }
          
          ?>
          </table>
        </div>
        </div>
        </div>
            <!--<button class="btnOpen">Open</button>--> 
      
    </main>
    <div>
        
    </div>
    
</body>
</html>
