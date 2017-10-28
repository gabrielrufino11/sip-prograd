<?php

	require_once "../config.php";
	require_once "../modelo/Usuario.php";

	//parte1
	
	$id_Usuario = $_POST['id_Usuario'];
	$nome_Usuario = $_POST['nome_Usuario'];
	$senha_Usuario = $_POST['senha_Usuario'];
	$status_Usuario = $_POST['status_Usuario'];
	$permissao_Usuario = $_POST['permissao_Usuario'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Usuario();
	$Item->SetValues($id_Usuario, $nome_Usuario, $senha_Usuario, $status_Usuario, $permissao_Usuario);
	
	
		
	//parte4
	$DBAuxiliar = new DBAuxiliar();
	switch($action) {
		case 'create':
			
			
			$res = $DBAuxiliar->InsertUsuario($Item);
			if (is_numeric($res)) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $DBAuxiliar->UpdateUsuario($id_Usuario, $Item);
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $DBAuxiliar->DeleteUsuario($id_Usuario);
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
