
<?php
	include_once '../../data/conexionDB.php';
	class seguimiento extends conexionDB {

	private $Fecha;
	private $Estatus;
	private $Nombre;
	private $Descripcion;
	private $Direccion;
	
	public function setFecha($Fecha){
		$this -> Fecha = $Fecha;
	}
	public function setEstatus ($Estatus){
		$this -> Estatus = $Estatus;
	}
	public function setNombre($Nombre){
		$this -> Nombre = $Nombre;
	}
	public function setDescripcion ($Descripcion){
		$this -> Descripcion = $Descripcion;
	}
	public function setDireccion($Direccion){
		$this -> Direccion = $Direccion;
	}

	public function getAllDetallesReserva ($usuariocorreo){
		$result = $this -> connect();
		if ($result == true){
			$qr = "select  
            rv.`fechaSolicitud` as 'Fecha de reserva',
            rv.folio as 'Numero del pedido',
            rv.total as 'Total de la reserva'
            from reservas as rv 
            inner join clientes as cli on rv.cliente = cli.codigo
            inner join usuarios as us on cli.usuario = us.nickname
            where us.nickname = '".$_SESSION['id']."';";
			$dataset = $this -> execquery($qr);
		}else{
			$dataset = "wrong";
		}
		return $dataset;
	}


public function getAllDetallesEnvio ($usuariocorreo){
    $result = $this -> connect();
    if ($result == true){
        $qr = "select  
        er.descripcion as Estatus,
        md.nombre as Modelo,
        mq.precioDia as PrecioPorDia
        from  re_maq as rm 
        inner join reservas as rv on rm.reserva = rv.folio
        inner join maquinas as mq on rm.maquina = mq.codigo
        inner join modelos as md on mq.modelo = md.num
        inner join clientes as cli on rv.cliente = cli.codigo
        inner join usuarios as us on cli.usuario = us.nickname
        inner join estatusreserva as er on rv.`estatusR` = er.codigo
        where us.nickname ='".$_SESSION['id']."';";
        $dataset = $this -> execquery($qr);
    }else{
        $dataset = "wrong";
    }
    return $dataset;
}
    

    public function getAllDireccion ($usuariocorreo){
        $result = $this -> connect();
        if ($result == true){
            $qr = "select  
            concat(eg.colonia, ' - ', eg.calle, ' - ', eg.num, ' - ', eg.cp) as Direccion
            from entregas as eg 
            inner join reservas as rv on eg.reserva = rv.folio
            inner join clientes as cli on rv.cliente = cli.codigo
            inner join usuarios as us on cli.usuario = us.nickname
            inner join estatusreserva as er on rv.`estatusR` = er.codigo
            where us.nickname = '".$_SESSION['id']."';";
            $dataset = $this -> execquery($qr);
        }else{
            $dataset = "wrong";
        }
        return $dataset;
    }
}