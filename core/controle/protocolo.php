<?php

   	//phpinfo ();

	require_once "../config.php";
	require_once "../modelo/Protocolo.php";

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
	
	$Item = new Protocolo();
			
			$Item->SetValues($id_Protocolo, $remetente_Protocolo, $id_TipoDocumento, $id_Usuario, $descricaoTeor_Protocolo, $dtEnvio_Protocolo, $dtRecebimento_Protocolo);
		
	//parte4
	$DBAuxiliar = new DBAuxiliar();
	switch($action) {
		case 'create':
			
			
			$res = $DBAuxiliar->InsertProtocolo($Item);
			if (is_numeric($res)) {
				$res = "true";
			}
			else {
				$res = "false";	
			}			

			echo $res;
			
		
		break;	
		
		case 'update':
		
			
			
			$res = $DBAuxiliar->UpdateProtocolo($id_Protocolo, $Item);
			
			if ($res === NULL) {
				$res= 'true';	
			}
			else {
				$res = 'false';	
			}
			echo $res;
			
		
		break;	
		
		case 'delete':
		
			
			
			$res = $DBAuxiliar->DeleteProtocolo($id_Protocolo);
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
