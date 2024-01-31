<?PHP  //
	include_once 'conexionDB.php';
	class re_maq extends conexionDB {
		//atributos
        private $reserva;
        private $maquina;
        private $cantDias;

		//metodos set
        public function setReserva($reserva) {
            $this->reserva = $reserva;
        }

        public function setMaquina($maquina) {
            $this->maquina = $maquina;
        }

        public function setCantDias($cantDias) {
            $this->cantDias = $cantDias;
        }
		
	    //metodos 

	    /*public function getAllre_maq(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from re_maq";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
        */
        
        
	   public function setRentaMaquina(){
	    	$conn = $this->connect();

	    	if($conn){
	    		
	    		$query = "insert into re_maq (reserva, maquina, cantDias) values (".$this->reserva.", ".$this->maquina.", ".$this->cantDias.")";
	    		$newID = $this-> execinsert($query);
	    	}else{
	    		
	    		$newID = 0;
	    	}
	    return $newID;
	    }
}
?>
