<?php
	$data = json_decode(file_get_contents("php://input"));

	include('config.php');

	$db = new DB();
	
	$sql = "INSERT INTO `personas`(`Nombre`,`apPaterno`,`apMaterno`,`Edad`,`Sexo`,`IdRed`,`Direccion`,`Status`,`IdEtapa`,`IdLider`)
			VALUES('$data->nombre','$data->appaterno','$data->apmaterno','$data->edad','$data->sexo','$data->red','$data->direccion','A',1,1)";

	$data = $db->qryFire($sql);

	echo json_encode($data);
