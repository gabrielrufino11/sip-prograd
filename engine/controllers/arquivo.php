<?php

	require_once "../config.php";

	//parte1
	
	$id_Arquivo = $_POST['id_Arquivo'];
    $arquivo = $_POST['arquivo'];
    $dt_Arquivo = $_POST['dt_Arquivo'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Arquivo();
	$Item->SetValues($id_Arquivo, $arquivo, $dt_Arquivo);
	
	
		
	//parte4

		
	switch($action) {
		case 'create':
			

			$res = $Item->Create($Arquivo);
			if($res == NULL){
				$res = "true";
			}
			else{
				$res = "false";
			}

			echo $res;

			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update($id_Arquivo, $arquivo, $dt_Arquivo);

			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			$res = $Item->Delete($id_Arquivo);
			
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
