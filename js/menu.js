	// JavaScript Document
	$(document).ready(function(e) {
		$('#lista_protocolo_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Protocolo/protocolo.lista.php');	
		});
		
		$('#adicionar_protocolo_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Protocolo/protocolo.adicionar.php');	
		});
		
		$('#editar_protocolo_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Protocolo/protocolo.editar.php');
		});
		
		$('#lista_usuario_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Usuario/usuario.lista.php');	
		});
		
		$('#adicionar_usuario_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Usuario/usuario.adicionar.php');	
		});
		
		$('#editar_usuario_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Usuario/usuario.editar.php');	
		});
		
		$('#lista_tipodocumento_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/TipoDocumento/tipodocumento.lista.php');	
		});
		
		$('#adicionar_tipodocumento_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/TipoDocumento/tipodocumento.adicionar.php');	
		});
		
		$('#editar_tipodocumento_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/TipoDocumento/tipodocumento.editar.php');	
		});
		
		$('#lista_reuniao_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Reuniao/reuniao.lista.php');	
		});
		
		$('#adicionar_reuniao_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Reuniao/reuniao.adicionar.php');	
		});
		
		$('#editar_reuniao_link').click(function(e) {
			e.preventDefault();
			$('#loader').load('view/Reuniao/reuniao.editar.php');	
		});
	
	});
