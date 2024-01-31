<?php
include_once '../data/conexionDB.php';

class reserv extends conexionDB{
    private $fechaSolicitud;
	private $fechaFinal;
    private $descripcion;
    private $cliente;
    
    public function setFechaSolicitud($fechaSolicitud) {
        $this->fechaSolicitud = $fechaSolicitud;
    }

    public function setFechaFinal($fechaFinal) {
        $this->fechaFinal = $fechaFinal;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }


    public function setReserva(){
        $conn = $this->connect();

        if($conn){
      
            $query = "insert into reservas (fechaSolicitud, fechaFinal, descripcion, cliente) values ('".$this->fechaSolicitud."', '".$this->fechaFinal."', '".$this->descripcion."','".$this->cliente."' );";
            $dataSet = $this-> execinsert($query);
            echo "<script>alert('Datos insertados a la reserva'); </script>";
        }else{
            echo "no se hace el select";
            $dataSet = "wrong";
        }
    return $dataSet;
    }

}

?>