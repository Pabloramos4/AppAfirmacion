<?php

	/*define("__HOST__", "localhost");
	define("__USER__", "root");
	define("__PASS__", "");
	define("__BASE__", "appafirmacion");*/

	define("__HOST__", "www.db4free.net");
	define("__USER__", "pablo");
	define("__PASS__", "Pabloramos27db");
	define("__BASE__", "appafirmacion");

	class DB {
		private $con = false;
		private $data = array();

		private $con2 = false;		
	    private $dataRed = array();
		
		public function __construct() {
			/* 
			//only for development
			error_reporting(E_ALL);
			ini_set("display_errors", 1);

			//your host and database name
			$host = "31.170.164.243";
			$dbname = "u655454806_test";

			//your data source declared above
			$dsn = 'mysql:host='.$host.'; dbname='.$dbname;


			//user name and password for database
			$user = "u655454806";
			$pass = "123Pablo";

			//pdo attribute array
			$attr = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

			try {
			$this->con = new PDO($dsn, $user, $pass, $attr);
			} catch (PDOException $e) {
			echo "Error!: " . $e->getMessage() . "";
			die();
			}*/



			$this->con = new mysqli(__HOST__, __USER__, __PASS__, __BASE__);
			
			if(mysqli_connect_errno()) {
				die("DB connection failed:" . mysqli_connect_error());
			}
		}

		public function qryPop() {
			$sql = "SELECT * FROM `personas` WHERE `Status` = 'A' ORDER BY `IdPersona` ASC";
			// $sql = "SELECT * FROM `blogs` ORDER BY `id` DESC";

			$qry = $this->con->query($sql);

			if($qry->num_rows > 0) {
				while($row = $qry->fetch_object()) {
					$this->data[] = $row;
				}
			} else {
				//$this->data[] = null;
			}
			$this->con->close();
		}

		public function qryFire($sql=null) {

			if($sql == null) {
				$this->qryPop();
			} else {
				$this->con->query($sql);
				$this->qryPop();	
			}
			//$this->con->close();
			return $this->data;
		}
		
		public function qryLoad($sqlLoad)
		{	
			$qryLoad = $this->con->query($sqlLoad);
		
			if($qryLoad->num_rows > 0) {
				while($row = $qryLoad->fetch_object()) {
					$this->dataos[] = $row;
				}
			} else {
				//$this->data[] = null;
			}
			$this->con->close();
			return $this->dataos;
			
		}
		public function qryUpdatePersona($sqlUpdate,$sqlverifica,$sqlbuscar)
		{

			$array = array();
			$this->texto = "a";

			$qryVerifica = $this->con->query($sqlverifica);//bsucamos que la escuela no se haya cursado
			
			if($qryVerifica->num_rows > 0)//Verificamos que se encuentre un registro(es decir que no se haya cursado la escuela)
			{
				$this->con->query($sqlUpdate);	
				$this->texto = "Registro Actualizado Sastisfactoriamente";
				
			}
			else
			{

				//$this->resultado = "";
				$this->texto = "No se puede validar esta escuela por alguna de las siguientes razones: 1)  Ya fue cursada con anterioridad. 2) Intenta validar una escuela adelantada.";
			}

			//obtenemos los nuevos datos y aun asi se haya o no modificado el registro
			$qryselect = $this->con->query($sqlbuscar);
			
			if($qryselect->num_rows > 0) //obtenemos los valores para poder mandarlos y que actualice los registros en el form
			{
				while($row = $qryselect->fetch_object()) 
				{
					$this->resultado[] = $row;
				}
			} else { /*$this->data[] = null;*/}

			$array[0] = $this->resultado;
			$array[1] = $this->texto;

			$this->con->close();
			return $array;
			
			/*$qryActualiza = $this->con->query($sqlUpdate);			
			$this->con->close();
			$this->resultado = $qryActualiza; //esto devuelve un TRUE, quiere decir que se si se cumplio la sentencia

			return $this->resultado;*/
		}
		
	}
?>
