<?PHP  //clientes
	include_once 'conexionDB.php';
	class clientes extends conexionDB {
		//atributos
		private $codigo;
		private $nombre;
        private $apPat;
        private $apMat;
		private $numTel;
        private $colonia;
        private $calle;
        private $num; //
        private $cp;
        private $aval; //fk
        private $usuario; //fk

	

		//metodos set
		public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setApPat($apPat) {
            $this->apPat = $apPat;
        }

        public function setApMat($apMat) {
            $this->apMat = $apMat;
        }

        public function setNumTel($numTel) {
            $this->numTel = $numTel;
        }

        public function setColonia($colonia) {
            $this->colonia = $colonia;
        }

        public function setCalle($calle) {
            $this->calle = $calle;
        }

        public function setNum($num) {
            $this->num = $num;
        }

        public function setCp($cp) {
            $this->cp = $cp;
        }

        public function setAval($aval) {
            $this->aval = $aval;
        }

        public function setUsuario($usuario) {
            $this->usuario = $usuario;
        }
	    //metodos 

		public function getCliente(){
			$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select codigo FROM clientes WHERE usuario = '".$_SESSION["id"]."';";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
		}

	    public function getAllclientes(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from clientes";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    public function setclientes(){ //cambiar metodo para agregar al admin
	    	$conn = $this->connect ();

			$query = "select * from clientes where codigo = '$this->codigo'|| nombre = '$this->nombre'";
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
	    		$query ="INSERT INTO `clientes` (`codigo`, `nombre`, `numTel`, `colonia`, `cp`, `num`, `calle`, `ciudad`) VALUES
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