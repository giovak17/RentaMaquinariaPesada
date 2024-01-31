<?PHP  //choferes
	include_once 'conexionDB.php';
	class choferes extends conexionDB {
		//atributos
		private $codigo;
		private $nombre;
        private $apPat;
        private $apMat;
		private $numTel;
		private $almacen;
		private $rep_rtas; //fk

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

        public function setRepRtas($repRtas) {
            $this->rep_rtas = $repRtas;
        }
		
		public function setAlmacen($almacen) {
            $this->almacen = $almacen;
        }

	    //metodos 

	    public function getAllchoferes(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from choferes";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

	    public function setchoferes(){ //cambiar metodo para agregar al admin
	    	$conn = $this->connect ();

			$query = "select * from choferes where codigo = '$this->codigo'|| nombre = '$this->nombre'";
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
	    		$query ="INSERT INTO `choferes`( `nombre`, `apPat`, `apMat`, `numTel`, `almacen`) VALUES
				('".$this->nombre."','".$this->apPat."','".$this->apMat."','".$this->numTel."','".$this->almacen."');
				";
	    		$newid = $this->execinsert($query);
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