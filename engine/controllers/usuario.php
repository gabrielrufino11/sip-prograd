<?php

	require_once "../config.php";

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

		
	switch($action) {
		case 'create':
			

			$res = $Item->Create();
			if($res == NULL){
				$res = "true";
			}
			else{
				$res = "false";
			}

			echo $res;

			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update();

			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			$res = $Item->Delete();
			
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
