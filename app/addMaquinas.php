<?php
require '../data/conexionBD.php';

$numSerie = $_POST['txtNumSerie'];
$precioDia = $_POST['txtPrecioDia'];
$almacen = $_POST['txtAlmacen'];
$modelo = $_POST['txtModelo'];
$estatusM = $_POST['txtEstatusM'];


if(isset($_POST["submit"])){

//Imagen principal
    $fileName = $_FILES["imagenP"]["name"];
    $fileSize = $_FILES["imagenP"]["size"];
    $tmpName = $_FILES["imagenP"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));

      $newImageNameP = uniqid();
      $newImageNameP .= '.' . $imageExtension;

      move_uploaded_file($tmpName, '../view/menuAdmin/imagenP/' . $newImageNameP);

  //Array de imagenes
  $totalFiles = count($_FILES['fileImg']['name']);
  $filesArray = array();

  for($i = 0; $i < $totalFiles; $i++){
    $imageName = $_FILES["fileImg"]["name"][$i];
    $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));

    $newImageName = uniqid() . '.' . $imageExtension;

    move_uploaded_file($tmpName, '../view/menuAdmin/imagenesExtra/' . $newImageName);
    $filesArray[] = $newImageName;
  }

  $filesArray = json_encode($filesArray);

  $query = "insert into maquinas (numSerie, almacen, precioDia, modelo, estatusM, imagen, extraImagenes)values ('$numSerie', '$almacen', $precioDia, $modelo, '$estatusM','$newImageNameP', '$filesArray')";

  mysqli_query($conn, $query);
  echo
  "
  <script>
    alert('Maquina registrada.');
    document.location.href = '../view/menuAdmin/agregarm2.php';
  </script>
  ";
}
?>

