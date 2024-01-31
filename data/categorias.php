<?php
include_once 'conexionDB.php';

class categorias extends conexionDB{
    //atributos
    private $codigo;
    private $mombre;
    private $limiteCarga;

    //set
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setLimiteCarga($limiteCarga){
        $this->limiteCarga = $limiteCarga;
    }

    //metodos
     
    public function getAllCategorias(){
        $conn = $this->connect ();

	    if($conn){
	    	echo "se hace un select";
	    	$query ="select * from categorias";
	    	$dataSet = $this-> execquery($query);
	    }else{
	    	echo "no se hace el select";
	    	$dataSet = "wrong";
	    }
	    return $dataSet;
    }
    

}
?>