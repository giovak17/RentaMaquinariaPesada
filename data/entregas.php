<?PHP  //
	include_once 'conexionDB.php';
	class entregas extends conexionDB {
		//atributos
		private $codigo;
		
		private $horaEntrega;
		private $nombre;
		private $apPat;
		private $apMat;
		private $colinia;
        private $calle;
        private $num;
        private $cp;
        private $chofer;
        private $reserva;

		//metodos set
		public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }

        public function setHoraEntrega($horaEntrega) {
            $this->horaEntrega = $horaEntrega;
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

        public function setColinia($colinia) {
            $this->colinia = $colinia;
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

        public function setChofer($chofer) {
            $this->chofer = $chofer;
        }

        public function setReserva($reserva) {
            $this->reserva = $reserva;
        }

	    //metodos 

	    public function getAllEntregas(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from entregas";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

        public function setEntregas() {
            $conn = $this->connect();
                
                /*$query = "INSERT INTO entregas (codigo, horaEntrega, nombre, apPat, apMat, colonia, calle, num, cp, chofer, reserva) 
                VALUES (NULL, '09:04:24', pedro', 'martinez', 'martinez', 'mariano', 'vicente', '9094', '1222', NULL, '20');";*/

                $query = "INSERT INTO entregas (codigo, horaEntrega, nombre, apPat, apMat, colonia, calle, num, cp, reserva) 
                VALUES (NULL, '".$this->horaEntrega."', '".$this->nombre."', '".$this->apPat."', '".$this->apMat."', '".$this->colonia."', '".$this->calle."', '".$this->num."', '".$this->cp."', ".$this->reserva.");";
            if($conn){
                $newID = $this-> execinsert($query);
            }else{
                $newID = 0;
            }
        return $newID;
        }
}
?>