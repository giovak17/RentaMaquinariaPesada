<?PHP  //
	include_once 'conexionDB.php';
	class almacenes extends conexionDB {
		//atributos
		private $codigo;
		private $nombre;
		private $numTel;
		private $colonia;
		private $num;
		private $calle;
		private $ciudad;

		//metodos set
		public function setCodigo($codigo) {
        	$this->codigo = $codigo;
	    }

	    public function setNombre($nombre) {
	        $this->nombre = $nombre;
	    }

	    public function setNumTel($numTel) {
	        $this->numTel = $numTel;
	    }

	    public function setColonia($colonia) {
	        $this->colonia = $colonia;
	    }

	    public function setNum($num) {
	        $this->num = $num;
	    }

	    public function setCalle($calle) {
	        $this->calle = $calle;
	    }

	    public function setCiudad($ciudad) {
	        $this->ciudad = $ciudad;
	    }

	    //metodos 




	    public function getAllAlmacenes(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from almacenes";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function getAlmacen($idMaq){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="SELECT 
							alm.codigo as idAlmacen
						FROM maquinas as mq
							INNER JOIN almacenes as alm on alm.codigo = mq.almacen
						WHERE mq.codigo = '".$idMaq."';";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    public function setAlmacenes(){
	    	$conn = $this->connect ();

			$query = "select * from almacenes where codigo = '$this->codigo'|| nombre = '$this->nombre'";
			$dataset = $this->execquery($query);
			if($dataset->num_rows > 0){
				echo '
				<script>
					alert("Este almacen ya existe");
					window.location = "../view/menuAdmin/agregarm.php";
				</script>
				';
	    	}else{
				if($conn){
	    		echo "se hace un insert";
	    		$query ="INSERT INTO `almacenes` (`codigo`, `nombre`, `numTel`, `colonia`, `cp`, `num`, `calle`, `ciudad`) VALUES
				('".$this->codigo."','".$this->nombre."','".$this->numTel."','".$this->colonia."','".$this->cp."',".$this->num.",'".$this->calle."','".$this->ciudad."');
				";
	    		$newID = $this->execinsert($query);
				echo '
				<script>
					alert("Almacen agregado con exito");
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