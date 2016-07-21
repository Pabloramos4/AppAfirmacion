<?php

	$data = json_decode(file_get_contents("php://input"));
	
	include('config.php');

	$db = new DB();

	$sql = "UPDATE `personas` SET `Status` ='C' WHERE `IdPersona` = $data->IdPersona";

	$data = $db->qryFire($sql);

	echo json_encode($data);
