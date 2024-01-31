<?php 
include_once 'conexionDB.php';

class estatusreserva extends conexionDB{
    //atributos
    private $codigo;
    private $descripcion;

    public function setCodigo(){
        $this->codigo = $codigo;
    }

    public function setDescripcion(){
        $this->descripcion = $descripcion;
    }

    public function getEstados(){
        $conn = $this->connect ();

	    if($conn){
	    	echo "se hace un select";
	    	$query ="select * from estatusreserva";
	    	$dataSet = $this-> execquery($query);
	    }else{
	    	echo "no se hace el select";
	    	$dataSet = "wrong";
	    }
	    return $dataSet;
    }
}

?>