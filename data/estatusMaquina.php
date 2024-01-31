<?PHP  //
	include_once 'conexionDB.php';
	class estatusMaquina extends conexionDB {
		//atributos
		private $codigo;
		private $descripcion;
		

		//metodos set
		public function setCodigo($codigo) {
        	$this->codigo = $codigo;
	    }

	    public function setDescripcion($descripcion) {
	        $this->descripcion = $descripcion;
	    }

	   
	    //metodos 

	    public function getAllEstatus(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from estatusmaquina";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		//echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    
    }
?>