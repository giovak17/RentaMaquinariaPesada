<?PHP  //
	include_once 'conexionDB.php';
	class reservas extends conexionDB {
		//atributos
		private $folio;
		private $fechaSolicitud;
		private $fechaFinal;
		private $costoTransporte;
        private $fechaEntrega;
		private $descripcion;
		private $subTotal;
		private $iva;
        private $total;
        private $cliente;
        private $estatusR;
        private $rep_rtas;
        private $almacen;

		//metodos set
		public function setFolio($folio) {
        $this->folio = $folio;
        }

        public function setFechaEntrega($fechaEntrega) {
            $this->fechaEntrega = $fechaEntrega;
        }

        public function setFechaSolicitud($fechaSolicitud) {
            $this->fechaSolicitud = $fechaSolicitud;
        }

        public function setFechaFinal($fechaFinal) {
            $this->fechaFinal = $fechaFinal;
        }

        public function setCostoTransporte($costoTransporte) {
            $this->costoTransporte = $costoTransporte;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function setSubTotal($subTotal) {
            $this->subTotal = $subTotal;
        }

        public function setIva($iva) {
            $this->iva = $iva;
        }

        public function setTotal($total) {
            $this->total = $total;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }

        public function setEstatusR($estatusR) {
            $this->estatusR = $estatusR;
        }

        public function setRepRtas($rep_rtas) {
            $this->rep_rtas = $rep_rtas;
        }

        public function setAlmacen($almacen) {
            $this->almacen = $almacen;
        }


	    //metodos 

	    public function getAllReservas(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from reservas";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }

        public function getAllReservasC(){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select * from reservas where cliente = '".$_SESSION['id']."';";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
        

	   public function setReserva(){
        $conn = $this->connect();

        if($conn){

            $query = "INSERT INTO reservas (fechaInicial, fechaFinal, fechaEntrega, costoTransporte, descripcion, cliente ) 
                    VALUES ('".$this->fechaSolicitud."', '".$this->fechaFinal."', '".$this->fechaEntrega."' , 677, '".$this->descripcion."', ".$this->cliente.");";
            $newID = $this->execinsert($query);
            //echo "<script>alert('Datos insertados a la reserva'); </script>";
        }else{
            echo "no se hace el select";
            $newID = 0;
        }
        return $newID;
        }

        public function getReservasConAdeudo($id){
	    	$conn = $this->connect();

	    	if($conn){
	    		//	echo "se hace un select";
	    		$query ="select 
                            concat(cli.nombre, ' ', cli.apPat, ' ', cli.apMat) as Cliente, 
                            rv.folio as NumReserva, 
                            DATE_FORMAT(rv.fechaSolicitud, '%d-%m-%y') as Fecha, 
                            rv.total as MontoTotal,
                            COALESCE(
                            (SELECT
                                MIN(saldo)
                            FROM pagos
                            WHERE reserva = rv.folio ), rv.total) as saldoRestante
                        from reservas as rv 
                            inner join clientes as cli on rv.cliente = cli.codigo 
                        where 
                            cli.usuario = '".$id."' and rv.folio NOT in (SELECT 
                                                                            reserva 
                                                                        FROM 
                                                                            pagos 
                                                                        WHERE saldo = 0);";
	    		$dataSet = $this-> execquery($query);
	    	}else{
	    		echo "no se hace el select";
	    		$dataSet = "wrong";
	    	}
	    return $dataSet;
	    }
}
?>