<?php
include('../../data/config.php');
//include('global/conexion.php');
include('carrito.php');
include('templates/cabecera.php');
?>

<?php
	include_once '../../data/conexionDB.php';
	class historial extends conexionDB {

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

	public function getAllHistorial ($usuariocorreo){
		$result = $this -> connect();
		if ($result == true){
			$qr = "SELECT 
            us.nickname as Usuario,
            DATE_FORMAT(rv.fechaEntrega, '%d-%m-%y') as Fecha,
            er.descripcion as Estado,
            md.nombre as Nombre,
            md.descripcion as Descripcion,
            CONCAT(eg.colonia, ' ', eg.calle, ' - ', eg.num, ' - ', eg.cp) as Direccion
        FROM entregas as eg 
            INNER JOIN reservas as rv ON eg.reserva = rv.folio
            INNER JOIN clientes as cli ON rv.cliente = cli.codigo
            INNER JOIN re_maq as rm ON rm.reserva =  rv.folio
            INNER JOIN maquinas as mq ON rm.maquina = mq.codigo
            INNER JOIN modelos as md ON mq.modelo = md.num
            INNER JOIN usuarios as us ON cli.usuario = us.nickname
            INNER JOIN estatusreserva as er ON rv.estatusR = er.codigo
        WHERE us.nickname ='".$_SESSION['id']."';";
			$dataset = $this -> execquery($qr);
		}else{
			$dataset = "wrong";
		}
		return $dataset;
	}
}

?>
	<br>
	<br>
    <br>
    <br>
	<div class="container-fluid">
		
    
<div class="container-fluid"> 
    <h1>Seguimiento de la reserva</h1>   
    <div class="container">
     
        <div class="table table-dark table-striped-columns">
            <table class="table">
                <tr class="table-dark">
                    <td>Fecha</td>
                    <td>Nombre</td>
                    <td>Direccion</td>
                    <td>Estado</td>
                    <td>Detalles</td>
                </tr>

                <?php
                $obj = new historial();
                //$nick ='annita56';
                $dataset = $obj->getAllHistorial($_SESSION['id']);
                if ($dataset != 'wrong') {
                    while ($rs = mysqli_fetch_assoc($dataset)) {
                        echo "<tr>";
                        echo "<td>" . $rs['Fecha'] . "</td>";
                        echo "<td>" . $rs['Nombre'] . "</td>";
                        echo "<td>" . $rs['Direccion'] . "</td>";
                        echo "<td>" . $rs['Estado'] . "</td>";
                        echo '<td><a href="idx.segui.php?">Ver mas</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "No hay reservas " .$_SESSION['id']. "registradas.";
                }
                ?>
                        
            </table>
        </div>
    </div>
</div>