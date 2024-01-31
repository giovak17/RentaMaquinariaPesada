<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar':
          if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
            $id=openssl_decrypt($_POST['id'],COD,KEY);
            //$mensaje.="ok si jala".$id."<br/>";
          }else{
            echo $mensaje.="no jala pa".$id."<br/>";
          } 

          if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
            $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
           // $mensaje.="ok si jala".$nombre."<br/>";
          }else{
            $mensaje.="no jala pa"."<br/>"; break;
          }
          
          if(is_string(openssl_decrypt($_POST['cantidad'],COD,KEY))){
            $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
            //$mensaje.="ok si jala".$cantidad."<br/>";
          }else{
            $mensaje.="no jala pa"."<br/>"; break;
          }

          if(is_string(openssl_decrypt($_POST['precio'],COD,KEY))){
            $precio=openssl_decrypt($_POST['precio'],COD,KEY);
           // $mensaje.="ok si jala".$precio."<br/>";
          }else{
            $mensaje.="no jala pa"."<br/>"; break;
          }

          if(!isset($_SESSION['carrito'])){
            $producto=array(
                'id'=>$id,
                'nombre'=>$nombre,
                'cantidad'=>$cantidad,
                'precio'=>$precio
            );
            $_SESSION['carrito'][0]=$producto;
            //$mensaje ="Producto agregado al carrito";

          }else{
            $idProductos=array_column($_SESSION['carrito'], "id");
            if(in_array($id,$idProductos)){
                echo "<script>alert('La maquina ya esta en el carrito');</script>";
                $mensaje ="";
            }else{
            $numeroProductos=count($_SESSION['carrito']);
            $producto=array(
                'id'=>$id,
                'nombre'=>$nombre,
                'cantidad'=>$cantidad,
                'precio'=>$precio
            );
            $_SESSION['carrito'][$numeroProductos]=$producto;
            $mensaje ="Producto agregado al carrito";
            }
          }
         // $mensaje ="Producto agregado al carrito";

        break;
        case 'eliminar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $id=openssl_decrypt($_POST['id'],COD,KEY);
               foreach($_SESSION['carrito'] as $indice=>$producto){
                    if($producto['id']==$id){
                        unset($_SESSION['carrito'][$indice]);
                        echo "<script>alert('Maquina eliminada');</script>";
                    }
               }
              }else{
                $mensaje.="no jala pa".$id."<br/>";
              } 
        break;    
    }
}
?>
