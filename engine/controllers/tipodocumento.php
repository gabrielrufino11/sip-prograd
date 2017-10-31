<?php

	require_once "../config.php";

	//parte1
	
	$id_TipoDocumento = $_POST['id_TipoDocumento'];
	$nome_TipoDocumento = $_POST['nome_TipoDocumento'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new TipoDocumento();
	$Item->SetValues($id_TipoDocumento, $nome_TipoDocumento);
	
	
		
	//parte4

		
	switch($action) {
		case 'create':
			

			$res = $Item->Create($TipoDocumento);
			if($res == NULL){
				$res = "true";
			}
			else{
				$res = "false";
			}

			echo $res;

			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update($id_TipoDocumento, $TipoDocumento);

			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			$res = $Item->Delete($id_TipoDocumento);
			
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
