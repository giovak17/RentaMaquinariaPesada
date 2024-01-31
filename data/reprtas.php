<?php
include_once 'conexionDB.php';

class reprtas extends conexionDB{
    //atributos
    private $codigo;
    private $nombre;
    private $apPat;
    private $apMat;
    private $numTel;
    private $almacen;
    private $usuario;

    //set
    public function setCodigo($codigo){
        $this->codigo  = $codigo;
    }

    public function setNombre($nombre){
        $this->nombre  = $nombre;
    }    

    public function setApPat($apPat){
        $this->appat  = $apPat;
    }

    public function setApMat($apMat){
        $this->apMat  = $apMat;
    }

    public function setNumTel($numTel){
        $this->numTel  = $numTel;
    }

    public function setAlmacen($almacen){
        $this->almacen  = $almacen;
    }

    public function setUsuario($usuario){
        $this->usuario  = $usuario;
    }

    //metodo

    public function getRep(){
        $conn = $this->connect();

        if($conn){
            //	echo "se hace un select";
            $query ="select * from rep_rentas";
            $dataSet = $this-> execquery($query);
        }else{
            echo "no se hace el select";
            $dataSet = "wrong";
        }
    return $dataSet;
    }
}


?>