<?php
//para pasadar el parametro que viene del metodo post de http
	$data = json_decode(file_get_contents("php://input"));
	//para poder agarrar el parametro que viene de GET de http
	
	$tipo = $_GET["tipo"];
	//$valor = (int)var_dump($_GET);
	
	include('config.php');

	$db = new DB();

	switch ($tipo) 
	{
		case 'cargaDetalle':
			
			$valor = $_GET["param"];
			$sql = "SELECT * FROM `personas` WHERE `IdPersona` = $valor";
			$data = $db->qryLoad($sql);
			break;
		case 'cargaRed':
			
			$sql = "SELECT * FROM `redes` ";
			$data = $db->qryLoad($sql);
			break;
		case 'updatePersona':
			$IdPersona = $_GET["idpersona"];
			$IdEscuela = $data->idescuela;
			
			switch ($IdEscuela) 
			{
				case 1:
					$sql = "UPDATE personas SET Encuentro = 1 ,Fecha_Encuentro = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 0";					
					break;
				case 2:
					$sql = "UPDATE personas SET ENC = 1 ,Fecha_ENC = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 0";
					break;
				case 3:
					$sql = "UPDATE personas SET EDNC1 = 1 ,Fecha_EDNC1 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 0";
					break;
				case 4:
					$sql = "UPDATE personas SET EDNC2 = 1 ,Fecha_EDNC2 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 0";
					break;

				case 5:
					$sql = "UPDATE personas SET EDNC3 = 1 ,Fecha_EDNC3 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 0";
					break;
				case 6:
					$sql = "UPDATE personas SET EDNC4 = 1 ,Fecha_EDNC4 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 0";
					break;
				case 7:
					$sql = "UPDATE personas SET EDNC5 = 1 ,Fecha_EDNC5 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 0";
					break;
				case 8:
					$sql = "UPDATE personas SET EDNC6 = 1 ,Fecha_EDNC6 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 0";
					break;
				case 9:
					$sql = "UPDATE personas SET EDNC7 = 1 ,Fecha_EDNC7 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 0";
					break;
				case 10:
					$sql = "UPDATE personas SET EDNC8 = 1 ,Fecha_EDNC8 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 0";
					break;
				
				//Aqui ya se valida el encuentro, porque ya empieza lideres de CP
				case 11:
					$sql = "UPDATE personas SET ELCP1 = 1 ,Fecha_ELCP1 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 0";
					break;
				case 12:
					$sql = "UPDATE personas SET ELCP2 = 1 ,Fecha_ELCP2 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 0";
					break;	
				case 13:
					$sql = "UPDATE personas SET ELCP3 = 1 ,Fecha_ELCP3 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 0";
					break;
				case 14:
					$sql = "UPDATE personas SET ELCP4 = 1 ,Fecha_ELCP4 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 0";
					break;	
				case 15:
					$sql = "UPDATE personas SET ELCP5 = 1 ,Fecha_ELCP5 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 0";
					break;	
				case 16:
					$sql = "UPDATE personas SET ELCP6 = 1 ,Fecha_ELCP6 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 0";
					break;
				case 17:
					$sql = "UPDATE personas SET ELCP7 = 1 ,Fecha_ELCP7 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 0";
					break;
				case 18:
					$sql = "UPDATE personas SET RELCP = 1 ,Fecha_RELCP = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 0";
					break;
				//Aqui ya se valida la escuela de mentores
				case 19:
					$sql = "UPDATE personas SET EDM1 = 1 ,Fecha_EDM1 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 0";
					break;
				case 20:
					$sql = "UPDATE personas SET EDM2 = 1 ,Fecha_EDM2 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 0";
					break;
				case 21:
					$sql = "UPDATE personas SET EDM3 = 1 ,Fecha_EDM3 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 0";
					break;
				case 22:
					$sql = "UPDATE personas SET EDM4 = 1 ,Fecha_EDM4 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 0";
					break;
				case 23:
					$sql = "UPDATE personas SET EDM5 = 1 ,Fecha_EDM5 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 0";
					break;
				case 24:
					$sql = "UPDATE personas SET EDM6 = 1 ,Fecha_EDM6 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 0";
					break;
				case 25:
					$sql = "UPDATE personas SET EDM7 = 1 ,Fecha_EDM7 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 1 AND EDM7 = 0";
					break;
				case 26:
					$sql = "UPDATE personas SET EDM8 = 1 ,Fecha_EDM8 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 1 AND EDM7 = 1 AND EDM8 = 0";
					break;
				case 27:
					$sql = "UPDATE personas SET EDM9 = 1 ,Fecha_EDM9 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 1 AND EDM7 = 1 AND EDM8 = 1 AND EDM9 = 0";
					break;
				case 28:
					$sql = "UPDATE personas SET EDM10 = 1 ,Fecha_EDM10 = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 1 AND EDM7 = 1 AND EDM8 = 1 AND EDM9 = 1 AND EDM10 = 0";
					break;
				case 29:
					$sql = "UPDATE personas SET REDM = 1 ,Fecha_REDM = NOW()  WHERE IdPersona = $IdPersona ";
					$sqlVerifica = "SELECT * FROM personas WHERE IdPersona = $IdPersona AND Encuentro = 1 AND ENC = 1 AND EDNC1 = 1 AND EDNC2 = 1 AND EDNC3 = 1 AND EDNC4 = 1 AND EDNC5 = 1 AND EDNC6 = 1 AND EDNC7 = 1 AND EDNC8 = 1 AND ELCP1 = 1 AND ELCP2 = 1 AND ELCP3 = 1 AND ELCP4 = 1 AND ELCP5 = 1 AND ELCP6 = 1 AND ELCP7 = 1 AND RELCP = 1 AND EDM1 = 1 AND EDM2 = 1 AND EDM3 = 1 AND EDM4 = 1 AND EDM5 = 1 AND EDM6 = 1 AND EDM7 = 1 AND EDM8 = 1 AND EDM9 = 1 AND EDM10 = 1 AND REDM = 0";
					break;
			}
			
			$sqlbuscar = "SELECT * FROM personas WHERE IdPersona = $IdPersona";
			
			$data = $db->qryUpdatePersona($sql,$sqlVerifica,$sqlbuscar);//Enviamos los datos para validar si se realiza la operacion

			break;
		
		// default:
		// 	# code...
		// 	break;
	}
	
	

	//$data = $db->qryLoad($sql);

	echo json_encode($data);
	