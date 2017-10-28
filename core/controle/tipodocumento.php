<?php

	require_once "../config.php";
	require_once "../modelo/TipoDocumento.php";

	//parte1
	
	$id_TipoDocumento = $_POST['id_TipoDocumento'];
	$nome_TipoDocumento = $_POST['nome_TipoDocumento'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new TipoDocumento();
	$Item->SetValues($id_TipoDocumento, $nome_TipoDocumento);
	
	
		
	//parte4
	$DBAuxiliar = new DBAuxiliar();
	switch($action) {
		case 'create':
			
			
			$res = $DBAuxiliar->InsertTipoDocumento($Item);
			if (is_numeric($res)) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $DBAuxiliar->UpdateTipoDocumento($id_TipoDocumento, $Item);
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $DBAuxiliar->DeleteTipoDocumento($id_TipoDocumento);
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		
		
	}
?>
