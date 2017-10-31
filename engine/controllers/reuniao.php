<?php

	require_once "../config.php";

	//parte1
	
	$id_Reuniao = $_POST['id_Reuniao'];
	$id_Usuario = $_POST['id_Usuario'];
	$dt_Reuniao = $_POST['dt_Reuniao'];
	$hora_Reuniao = $_POST['hora_Reuniao'];
	$local_Reuniao = $_POST['local_Reuniao'];
    $pauta_Reuniao = $_POST['pauta_Reuniao'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Reuniao();
	$Item->SetValues($id_Reuniao, $id_Usuario, $dt_Reuniao, $hora_Reuniao, $local_Reuniao, $pauta_Reuniao);
	
	
		
	//parte4

		
	switch($action) {
		case 'create':
			

			$res = $Item->Create($Reuniao);
			if($res == NULL){
				$res = "true";
			}
			else{
				$res = "false";
			}

			echo $res;

			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update($id_Reuniao, $Reuniao);

			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			$res = $Item->Delete($id_Reuniao);
			
			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;

		
		break;	
		
		
	}
?>
