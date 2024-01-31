<?PHP
	include_once 'conexionDB.php';

	class marcas extends conexionDB {
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

	    public function getAllMarcas(){
	    	$conn = $this->connect ();

	    	if($conn){
	    		$query ="select * from marcas";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
		public function setMarcas(){
			$conn = $this->connect();
			
			$query = "select * FROM marcas WHERE codigo = '" . $this->codigo . "' || nombre = '" . $this->nombre . "'";
			$dataset = $this->execquery($query);
			
			if ($dataset->num_rows > 0) {
				echo '
				<script>
					alert("Esta marca ya existe");
					window.location = "../view/menuAdmin/agregarmarca.php";
				</script>
				';
			} else {
				if ($conn) {
				
					$query = "insert into marcas (codigo, nombre) VALUES
						('" . $this->codigo . "','" . $this->nombre. "');
						";
					$newID = $this->execinsert($query);
					echo '
					<script>
						alert("Marca registrada");
						window.location = "../view/menuAdmin/agregarmarca.php";
					</script>
					';
				} else {
					echo "no se hace el insert";
					$newID = "0";
				}
				return $newID;
			}
			return $dataset;
		}


		public function deleteMarca($id) {
			$conn = $this->connect();
		
			if ($conn) {

				$query = "select codigo from marcas where codigo = '".$id."'";
				$result = $this->execquery($query);
		
				if ($result->num_rows > 0) {
			
					$deleteQuery = "delete from marcas where codigo = '".$id."'";
					$deleted = $this->execupdate($deleteQuery);
		
					if ($deleted) {
						echo '<script>alert("Marca eliminada con éxito");</script>';
					} else {
						echo '<script>alert("Error al eliminar la marca");</script>';
					}
				} else {
					echo '<script>alert("La marca no existe en la base de datos");</script>';
				}
			} else {
				echo "No se puede conectar a la base de datos";
			}
		}
		
	}
		

?>