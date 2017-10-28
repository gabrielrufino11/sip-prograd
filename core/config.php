<?php
	
	error_reporting( error_reporting() & ~E_NOTICE );

	date_default_timezone_set('America/Sao_Paulo');
	
	require_once "dados/db.php";
	require_once "dados/db.auxiliar.php";
	require_once "modelo/Protocolo.php";
	require_once "modelo/Usuario.php";
	require_once "modelo/TipoDocumento.php";
	require_once "modelo/Reuniao.php";
		
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		return $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
	}
?>