<?PHP
	include_once 'conexionDB.php';

	class modelos extends conexionDB {
		//atributos
	    private $numModelo;
	    private $anoFabricacion;
	    private $capacidadCarga;
	    private $nombreModelo;
	    private $descripcion;
	    private $img;
	    private $precioDia;
	    private $Marca;
		private $ruta_destino;
	   
		public function setRutaDestino($ruta) {
        $this->ruta_destino = $ruta;
    	}
	    //metodos set
	   public function setNumModelo($numModelo) {
	        $this->numModelo = $numModelo;
	    }

	    public function setAnoFabricacion($anoFabricacion) {
	        $this->anoFabricacion = $anoFabricacion;
	    }

	    public function setCapacidadCarga($capacidadCarga) {
	        $this->capacidadCarga = $capacidadCarga;
	    }

	    public function setNombreModelo($nombreModelo) {
	        $this->nombreModelo = $nombreModelo;
	    }

	    public function setDescripcion($descripcion) {
	        $this->descripcion = $descripcion;
	    }

	    public function setImg($img) {
	        $this->img = $img;
	    }

	    public function setPrecioDia($precioDia) {
	        $this->precioDia = $precioDia;
	    }

	    public function setMarca($Marca) {
	        $this->Marca = $Marca;
	    }
	    //metodos

	    public function getAllModelos(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		//echo "se hace un select";
	    		$query ="select * from modelos";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function getModelo($id){
	    	$conn = $this->connect ();

	    	if($conn){
	    		//echo "se hace un select";
	    		$query ="select * from modelos where num=".$id.";";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

		public function setModelos(){
			$conn = $this->connect();
			
			$query = "select * FROM modelos WHERE num = '" . $this->numModelo . "' OR nombre = '" . $this->nombreModelo . "'";
			$dataset = $this->execquery($query);
			
			if ($dataset->num_rows > 0) {
				echo '<script>
					alert("Este modelo ya esta registrado");
					window.location = "../view/menuAdmin/agregarmodelo.php";
				</script>';
			} else {
				if ($conn) {
					$query = "insert into modelos (anoFabricacion, capacidadCarga, nombre, descripcion, imagen, marca) VALUES
						('" . $this->anoFabricacion . "', '" . $this->capacidadCarga . "', '" . $this->nombreModelo . "', '" . $this->descripcion . "', '" . $this->img . "', '" . $this->Marca . "');
						";
					$directorio_destino = '../img/';
					move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_destino . $this->img);
					$newID = $this->execinsert($query);
					echo '
					<script>
						alert("Modelo registrado");
						window.location = "../view/menuAdmin/agregarmodelo.php";
					</script>
					';
				} else {
					echo "no se hace el insert";
					$newID = 0;
				}
				return $newID;
			}
			return $dataset;
		}
		
		public function deleteModelo() {
			$conn = $this->connect();
		
			if ($conn) {
				
				$query = "select numModelo from modelos where numModelo = '$this->numModelo'";
				$result = $this->execquery($query);
		
				if ($result->num_rows > 0) {
					
					$deleteQuery = "delete from modelos where numModelo = '$this->numModelo'" ;
					$deleted = $this->execupdate($deleteQuery);
		
					if ($deleted) {
						echo '<script>alert("Modelo eliminado con éxito");</script>';
					} else {
						echo '<script>alert("Error al eliminar el modelo");</script>';
					}
				} else {
					echo '<script>alert("El modelo no existe en la base de datos");</script>';
				}
			} else {
				echo "No se puede conectar a la base de datos";
			}
		}
		

	}

?>