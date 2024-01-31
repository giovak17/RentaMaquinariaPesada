<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  
  </head>
  <body>

  <header class="container">
    <h1 class="text-center" style="background-color: black; color: white">select</h1>
  </header>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Num. Serie</th>
      <th scope="col">Almacen</th>
      <th scope="col">modelo</th>
    </tr>
  </thead>
  <tbody>
 
    <?php
    include_once '../../../data/maquinas.php';
    $miMaquina = new maquinas();
    $dataSet = $miMaquina->getAllMaquinas();

    while ($rs = mysqli_fetch_assoc($dataSet)){
      echo '<tr>';
        echo '<th scope="row">'.$rs['codigo'].'</th>';
        echo '<th scope="row">'.$rs['numSerie'].'</th>';
        echo '<th scope="row">'.$rs['almacen'].'</th>';
        echo '<th scope="row">'.$rs['modelo'].'</th>';
        
        echo '<th>';
        echo '<a href="" class="btn btn-warning">Editar</a>';
        echo '<a href="" class="btn btn-danger">Editar</a>';
        echo '</th>';

      echo '</tr>';
    }
    ?>
 
    
  </tbody>
</table>
  
  </form>
  </body>
</html>