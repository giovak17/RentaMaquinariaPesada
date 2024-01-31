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
                $qr = "select 
        us.nickname as Usuario,

                            DATE_FORMAT(rv.fechaEntrega, '%d-%m-%y') as Fecha,
                            eg.horaEntrega as Hora,
                            er.descripcion as Estado,
                            md.nombre as Nombre,
                            concat(cli.nombre, ' ', ifnull(concat(cli.apPat, ' '),' '), ifnull(concat(cli.apMat, ' '), ' ')) as Cliente,
                            rv.folio as FolioReserva,
                            md.descripcion as Descripcion,
                            concat(eg.colonia, ' ', eg.calle, ' - ', eg.num, ' - ', eg.cp) as Direccion
                            from entregas as eg 
                            inner join reservas as rv on eg.reserva = rv.folio
                            inner join clientes as cli on rv.cliente = cli.codigo
                            inner join re_maq as rm on rm.reserva =  rv.folio
                            inner join maquinas as mq on rm.maquina = mq.codigo
                            inner join modelos as md on mq.modelo = md.num
                            inner join usuarios as us on cli.usuario = us.nickname
                            inner join estatusreserva as er on rv.estatusR = er.codigo
                            where rv.estatusR =  'FIN'  and usuario = '".$_SESSION['id']."';";
                $dataset = $this -> execquery($qr);
            }else{
                $dataset = "wrong";
            }
            return $dataset;
        }

        public function getAllHistorialC ($usuariocorreo){
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
            WHERE (rv.estatusR = 'ENT' OR rv.estatusR = 'PRO') AND us.nickname = '".$_SESSION['id']."';
            ";
                $dataset = $this -> execquery($qr);
            }else{
                $dataset = "wrong";
            }
            return $dataset;
        }
    }
    
    ?>
    
