<?php

	require_once "../config.php";

	//parte1
	
	$id_Protocolo = $_POST['id_Protocolo'];
	$remetente_Protocolo = $_POST['remetente_Protocolo'];
	$id_TipoDocumento = $_POST['id_TipoDocumento'];
	$id_Usuario = $_POST['id_Usuario'];
	$descricaoTeor_Protocolo = $_POST['descricaoTeor_Protocolo'];
    $dtEnvio_Protocolo = $_POST['dtEnvio_Protocolo'];
    $dtRecebimento_Protocolo = $_POST['dtRecebimento_Protocolo'];
	
	
	//parte2
	$action = $_POST['action'];
	
	//parte3
	$Item = new Protocolo();
	$Item->SetValues($id_Protocolo, $remetente_Protocolo, $id_TipoDocumento, $id_Usuario, $descricaoTeor_Protocolo, $dtEnvio_Protocolo, $dtRecebimento_Protocolo);
	
	
		
	//parte4

		
	switch($action) {
		case 'create':
			

			$res = $Item->Create($Protocolo);
			if($res == NULL){
				$res = "true";
			}
			else{
				$res = "false";
			}

			echo $res;

			
		
		break;	
		
		case 'update':
		
			
			
			$res = $Item->Update($id_Protocolo, $Protocolo);

			if($res === NULL){
				$res= 'true';
			}
			else{
				$res = 'false';
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			$res = $Item->Delete($id_Protocolo);
			
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
