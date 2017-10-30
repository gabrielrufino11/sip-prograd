<?php
	
	error_reporting(E_ALL && ~E_NOTICE);

	date_default_timezone_set('America/Sao_Paulo');
	
	require_once "bd/bd.php";
	require_once "classes/protocolo.php";
	require_once "classes/tipodocumento.php";
	require_once "classes/usuario.php";
	require_once "classes/reuniao.php";
		
	
	function ExibeData($data){
		$dataCerta = explode('-', $data);
		return $dataCerta[2].'/'.$dataCerta[1].'/'.$dataCerta[0];
	}
?>