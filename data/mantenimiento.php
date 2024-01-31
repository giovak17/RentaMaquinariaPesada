<?PHP  //mantenimiento
	include_once 'conexionDB.php';
	class mantenimiento extends conexionDB {
		//atributos
		private $folio;
		private $fechaAct;
        private $fechaSigMan;
        private $descripcion;
		private $maquina;
		
	
		

		//metodos set
		public function setFolio($folio) {
            $this->folio = $folio;
        }

        public function setFechaAct($fechaAct) {
            $this->fechaAct = $fechaAct;
        }

        public function setFechaSigMan($fechaSigMan) {
            $this->fechaSigMan = $fechaSigMan;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setMaquina($maquina) {
            $this->maquina = $maquina;
        }


	    //metodos 

	    public function getAllmantenimiento(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from mantenimiento";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    public function setmantenimiento(){ //cambiar metodo para agregar al admin
	    	$conn = $this->connect ();

			$query = "select * from mantenimiento where codigo = '$this->codigo'|| nombre = '$this->nombre'";
			$dataset = $this->execquery($query);
			if($dataset->num_rows > 0){
				echo '
				<script>
					alert("Este chofer ya existe");
					window.location = "../view/menuAdmin/agregarm.php";
				</script>
				';
	    	}else{
				if($conn){
	    		echo "se hace un insert";
	    		$query ="INSERT INTO `mantenimiento` (`codigo`, `nombre`, `numTel`, `colonia`, `cp`, `num`, `calle`, `ciudad`) VALUES
				('".$this->codigo."','".$this->nombre."','".$this->numTel."','".$this->colonia."','".$this->cp."',".$this->num.",'".$this->calle."','".$this->ciudad."');
				";
	    		$newID = $this->execinsert($query);
				echo '
				<script>
					alert("chofer agregado con exito");
					window.location = "../view/menuAdmin/agregarm.php";
				</script>
				';
	    	}else{
	    		echo "no se hace el insert";
	    		$newID = "0";
	    	}
			return $newID;
		}
		return $dataset;
	}
}
?>