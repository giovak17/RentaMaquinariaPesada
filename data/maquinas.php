
<?PHP //maquinas.php
//aaaa
	include_once 'conexionDB.php';
	
	class maquinas extends conexionDB {
		//atributos
	    private $codigo; //pk
	    private $numSerie;
		private $imagen; //agregar a metodos
		private $precioDia;	
	    private $almacen; //fk Almacenes
	    private $modelo; //fk Modelos
		private $estatusM; // agregar metodos fk

	    //metodos set
	   public function setCodigo($codigo) {
        $this->codigo = $codigo;
	    }

	    public function setNumSerie($numSerie) {
	        $this->numSerie = $numSerie;
	    }

	    public function setAlmacen($almacen) {
	        $this->almacen = $almacen;
	    }

	    public function setModelo($modelo) {
	        $this->modelo = $modelo;
	    }

		public function setPrecioDia($precioDia) {
	        $this->precioDia = $precioDia;
	    }

		public function setEstatusM($estatusM) {
	        $this->estatusM = $estatusM;
	    }
	    //metodos

	    public function getAllMaquinas(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		echo "se hace un select";
	    		$query ="select * from maquinas";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function getMachine(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		
	    		$query ="SELECT 
							mq.codigo as mqCodigo,
							mq.numSerie as mqNumSerie,
							md.nombre as mdNombre,
							md.imagen as imagen,
							md.descripcion as des,
							mq.precioDia as precioXd,
							mq.imagen as img,
							mq.almacen as almacen
						FROM maquinas as mq
							INNER JOIN almacenes as al on mq.almacen = al.codigo 
							INNER JOIN modelos as md on mq.modelo = md.num
							INNER JOIN marcas as mar on md.marca = mar.codigo;
						 ";
							
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function getMachineIMG($id){
	    	$conn = $this->connect ();

	    	if($conn){
	    		
	    		$query ="select
							extraImagenes 
						from maquinas
						WHERE codigo = ".$id.";";
							
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		

		public function updateMaquinas($id){
	    	$conn = $this->connect ();

	    	if($conn){
	    		echo "hola";
	    		$query ="update maquinas 
				set numSerie = '".$this->numSerie."', almacen = '".$this->almacen."' where codigo ='".$id."'; ";
	    		$dataSet = $this->execupdate($query);
	    	}else{
	    		echo "se hace hace update";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;//talvez no se ocupa
	    }

		public function getAutoSetform($id){
	    	$conn = $this->connect ();

	    	if($conn){
	    		
	    		$query ="select * from v_infomaquinas where codigo =".$id.";";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function setMaquinas(){
	    	$conn = $this->connect ();

			$query = "select * from maquinas where numSerie = '$this->numSerie'";
			$dataset = $this->execquery($query);
			if($dataset->num_rows > 0){
				echo '
				<script>
					alert("Esta maquina ya esta registrada");
					window.location = "../view/menuAdmin/agregarm.php";
				</script>
				';
			}else{
				if($conn){
					//echo "se hace un insert";
					$query ="insert into maquinas (precioDia, numSerie, almacen, modelo, estatusM) VALUES (".$this->precioDia.",'".$this->numSerie."', '".$this->almacen."', ".$this->modelo.", '".$this->estatusM."');";
					$newID = $this->execinsert($query);
					echo '
				<script>
					alert("Maquina registrada");
					window.location = "../view/menuAdmin/agregarm.php";
				</script>
				';
	    		}else{
					echo "no se hace el insert";
					$newID = "0";
	    		}
	    		return $newID;
			}
			return [$dataset, $mensaje];
		}
	
		public function deleteMaquina($id) {
			$conn = $this->connect();
		
			if ($conn) {
			   
				$query = "select codigo from maquinas where codigo = '".$id."'";
				$result = $this->execquery($query);
		
				if ($result->num_rows > 0) {
					
					$deleteQuery = "delete from maquinas where codigo = '".$id."'";
					$deleted = $this->execupdate($deleteQuery);
		
					if ($deleted) {
						echo '<script>alert("Maquina eliminada con éxito");</script>';
					} else {
						echo '<script>alert("Error al eliminar la maquina");</script>';
					}
				} else {
					echo '<script>alert("La maquina no existe en la base de datos");</script>';
				}
			} else {
				echo "No se puede conectar a la base de datos";
			}

		}	
}
