<?php
class conexionDB{
// this is (de pertenencia)de clase y en parentesis como parametro
//metodos, atributos, constructo(metodo principal)
//atributos
	private $HOST;
	private $USER;
	private $PASS;
	private $DB; //sakila
	private $query;
	private $connection;
	private $dataset;
// constructor, metodo principal
	public function __construct (){
		$this -> HOST = "localhost";
		$this -> USER = "root";
		$this -> PASS = "";
		$this -> DB = "p24";
		
	}
	/*
	public function __ construct ($HOST, $USER, $PASS, $BD){
		$this -> HOST = $HOST;
		$this -> USER = $USER;
		$this -> PASS = $PASS;
		$this -> BD = $BD;
	}*/
//metodos
	public function connect (){
	$this -> connection = mysqli_connect ($this -> HOST,$this -> USER,$this -> PASS,$this -> DB);
	if ($this -> connection) {
		//echo "conexion establecida";
		return true;
	}
	 else{
		//echo "no se conecta";
		return false;
	  }
	}//fin connect
	// ejecutar query
	public function execquery($query){
		$this -> dataset = mysqli_query($this -> connection,$query);
		if ($this -> dataset){
			//echo "consulta bien";
			return $this -> dataset;
		}
		else{
			//echo "no agarro";
			return 0;
		}
	}//fin execquery
	
		public function execinsert($query){
		if(mysqli_query($this->connection,$query) > 0){
			$newid = $this->connection->insert_id;
			echo "insercion realizada";
		}
		else{
			echo "insercion ha fallado";
			$newid=0;
		}
		return $newid;
	}

	public function execupdate($query){
		$this -> dataset = mysqli_query($this -> connection,$query);
		if ($this -> dataset){
			//echo "consulta bien";
			return $this -> dataset;
		}
		else{
			//echo "no agarro";
			return 0;
		}
	}//fin

	
}
//$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
/*
try{
    $pdo= new PDO($servidor,USUARIO,PASSWORD,
    array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "<script>alert('Conectado...')</script>";
}catch(PDOException $e){

    //echo "<script>alert('Error...')</script>";
}
*/
$conn = mysqli_connect("localhost", "root", "", "p24");

?>

