<?PHP  //
	include_once 'conexionDB.php';
	class pagos extends conexionDB {
		//atributos
		private $folio;
		private $fecha;
		private $montoPago;
		private $concepto;
		private $saldo;
		private $reserva;
		private $nick;
		

		//metodos set

		public function setNick($nick) {
            $this->nick = $nick;
        }

		public function setFolio($folio) {
            $this->folio = $folio;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function setMontoPago($montoPago) {
            $this->montoPago = $montoPago;
        }

        public function setConcepto($concepto) {
            $this->concepto = $concepto;
        }

        public function setSaldo($saldo) {
            $this->saldo = $saldo;
        }

        public function setReserva($reserva) {
            $this->reserva = $reserva;
        }

	    //metodos 

	    public function getAllpagos(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from pagos";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

        public function getPagos($folioRV, $nick){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select 
							pg.fecha as FechaPago, 
							pg.montoPago as cantPago, 
							pg.saldo as saldoRestante 
						FROM pagos as pg 
							INNER JOIN reservas as rv ON pg.reserva = rv.folio 
						WHERE rv.folio = ".$folioRV." AND rv.cliente = (SELECT 
																	cl.codigo 
																FROM 
																	clientes as cl 
																WHERE 
																	cl.usuario = '".$nick."');";


				/*$query = "SELECT 
							pg.fecha as FechaPago, 
							pg.montoPago as cantPago, 
							pg.saldo as saldoRestante,
							IFNULL(
								(
									SELECT MIN(saldo)
									FROM pagos
									WHERE folio = ".$folioRV."
								), 
								rv.total
							) as pagoMAX
						FROM pagos as pg 
							INNER JOIN reservas as rv ON pg.reserva = rv.folio 
						WHERE rv.folio = ".$folioRV." AND rv.cliente = (
							SELECT cl.codigo 
							FROM clientes as cl 
							WHERE cl.usuario = '".$nick."'
						);";*/
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
        
	   public function setpagos(){
	    	$conn = $this->connect();

	    	if($conn){
	    		
	    		$query = "insert into pagos (fecha, montoPago, concepto, saldo, reserva) values ('".$this->fecha."', '".$this->montoPago."', '".$this->concepto."', '".$this->saldo."', '".$this->reserva."')";
	    		$newID = $this-> execinsert($query);
	    	}else{
	    		echo "no se hace el select";
	    		$newID = 0;
	    	}
	    return $newID;
	    }

	public function getPagoMAX($folioRV, $nick){
	    	$conn = $this->connect();

	    	if($conn){
	    		
	    		$query ="SELECT 
							(select total
							from reservas
							where folio = ".$folioRV."
							) as totalMAX,
							IF(
								(SELECT MIN(pg.saldo) FROM pagos WHERE folio = ".$folioRV." ) > 0 OR (SELECT MIN(pg.saldo) FROM pagos WHERE folio = ".$folioRV.") IS NULL,
								IFNULL((SELECT MIN(pg.saldo) FROM pagos WHERE folio = ".$folioRV."), rv.total),
								(SELECT MIN(pg.saldo) FROM pagos WHERE folio = ".$folioRV.")
							) as pagoMAX
						FROM pagos as pg 
							INNER JOIN reservas as rv ON pg.reserva = rv.folio 
						WHERE rv.folio = ".$folioRV." AND rv.cliente = (SELECT 
																	cl.codigo 
																FROM 
																	clientes as cl 
																WHERE 
																	cl.usuario = '".$nick."');";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
}
?>
