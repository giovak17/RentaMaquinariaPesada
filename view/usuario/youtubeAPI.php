<?php
if(isset($_POST['referencia'])){
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabeceraIndex.php');
?>
<head>
    <link rel="stylesheet" href="../../css/ytapi.css">
</head>


<?php
//Obtiene form de cabeceraIndex.php de los 3 canales segun lo que 

    
switch ($_POST['referencia']) {
    case 'canal1':
        $canal = 'UCge3wm7sYHXKRRqRsLySzkw';
        break;
    
    case 'canal2':
        $canal = 'UCeEjzibJG6myFaFJ0stfKUg';
        break;
    
    case 'canal3':
        $canal = 'UCofT7WmjqgMPRRh3UIR3DxA';
        break;

}

//Code to obtain the channel API. Ajusten "results" del link si desean mostrar mas videos.
$json = file_get_contents('https://www.googleapis.com/youtube/v3/search?key=AIzaSyAR58jRkGaL914ssmWKEam6XEDLvSQO6kY&channelId='.$canal.'&part=snippet,id&order=date&maxResults=10');
$array = json_decode($json, true);
echo "<h1>".$array['items'][0]['snippet']['channelTitle']."</h1><br>"; 
foreach ($array['items'] as $element) {
    echo "<div class='card' style='width:" . $element['snippet']['thumbnails']['high']['width'] . "px';       >";    
        // if VID or PLAYLIST
        echo "<div  style='width:" . $element['snippet']['thumbnails']['high']['width'] . "px'; margin: '10px';>";        
        if (array_key_exists('videoId', $element['id'])) {
            echo "<a href='https://www.youtube.com/watch?v=" . $element['id']['videoId'] . "' target='_blank'> <img style= 'text-align: center;' src='" . $element['snippet']['thumbnails']['high']['url'] . "' '> 
                <br> " . $element['snippet']['title'] . "</a> <br>";
            echo "</div>";
        }
        if (array_key_exists('playlistId', $element['id'])) {
            echo "<a href='https://www.youtube.com/playlist?list=" . $element['id']['playlistId'] . "'> GO </a> <br>";
            echo $element['id']['playlistId'] . "<br>";
            echo "</div>";
        }
        echo "<div  style='width:" . $element['snippet']['thumbnails']['high']['width'] . "px'>";

        echo "<h4>" . $element['snippet']['title'] . "</h4>";
        echo "Description: " . $element['snippet']['description'] . "<br>";
        echo "Published date: " . date("d/m/Y", strtotime($element["snippet"]["publishedAt"])) . "<br><br>";
        echo "</div>";
    echo "</div>";
}    
}else{
    header('Location: index.php');
}

?>
<br><?php include('templates/pie.php') ?>
