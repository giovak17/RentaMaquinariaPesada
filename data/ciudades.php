<?PHP
	include_once 'conexionDB.php';

	class ciudades extends conexionDB {
		//atributos
	    private $codigo;
	    private $nombre;

	    //metodos set
	    public function setCodigo($codigo) {
	        $this->codigo = $codigo;
	    }

	    public function setNombre($nombre) {
	        $this->nombre = $nombre;
	    }

	    //metodos

	    public function getAllCiudades(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		echo "se hace un select";
	    		$query ="select * from ciudades";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    public function setCiudades(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		echo "se hace un insert";
	    		$query ="";
	    		$newID = $this->execinsert($query);
	    	}else{
	    		echo "no se hace el insert";
	    		$newID = "0";
	    	}
	    return $newID;
	    }
	}

?>