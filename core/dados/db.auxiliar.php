<?php

	class DBAuxiliar{
		function __construct() {}
		function __destruct() {}
		
	
		//***************************************************************************************
		//Protocolo
		//Funcao que salva a instancia no BD
		public function InsertProtocolo($Protocolo) {
			  
			  $sql = "
				  INSERT INTO protocolo
							(
							  id_Protocolo,
							  remetente_Protocolo,
							  id_TipoDocumento,
							  id_Usuario,
							  descricaoTeor_Protocolo,
							  dtEnvio_Protocolo,
							  dtRecebimento_Protocolo
							)
				  VALUES
					  (
							  '$Protocolo->id_Protocolo',
							  '$Protocolo->remetente_Protocolo',
							  '$Protocolo->id_TipoDocumento',
							  '$Protocolo->id_Usuario',
							  '$Protocolo->descricaoTeor_Protocolo',
							  '$Protocolo->dtEnvio_Protocolo',
							  '$Protocolo->dtRecebimento_Protocolo'
					  );
			  ";
			  
			  $DB = new DB();
			  $DB->open();
			  $result = $DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		  
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function LerProtocolo($id) {
			  $sql = "
				 SELECT
					   t1.id_Protocolo,
					   t1.remetente_Protocolo,
					   t1.id_TipoDocumento,
					   t1.id_Usuario,
					   t1.descricaoTeor_Protocolo,
					   t1.dtEnvio_Protocolo,
					   t1.dtRecebimento_Protocolo
				 FROM
				 	protocolo AS t1
				 
				 WHERE
					  t1.id_Protocolo  = '$id'
		
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Protocolo= new Protocolo();
			  $Protocolo->SetValues($Data[0]['id_Protocolo'], $Data[0]['remetente_Protocolo'], $Data[0]['id_TipoDocumento'], $Data[0]['id_Usuario'], $Data[0]['descricaoTeor_Protocolo'], $Data[0]['dtEnvio_Protocolo'], $Data[0]['dtRecebimento_Protocolo']);
			  $DB->close();
			  return $Protocolo;
		  }
		  
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function LerTodosProtocolos() {
			  $sql = "
				  SELECT
					   t1.id_Protocolo,
					   t1.remetente_Protocolo,
					   t1.id_TipoDocumento,
					   t1.id_Usuario,
					   t1.descricaoTeor_Protocolo,
					   t1.dtEnvio_Protocolo,
					   t1.dtRecebimento_Protocolo
				  FROM
					  protocolo AS t1
				  
		
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Protocolo;//Declaração de variável
			  if($Data == NULL){
				  $Protocolos = $Data;
			  }
			  else{
				  
				  foreach($Data as $itemData){
					  if(is_bool($itemData)) continue;
					  else{
						  $Protocolo= new Protocolo();
						  $Protocolo->SetValues($itemData['id_Protocolo'], $itemData['remetente_Protocolo'], $itemData['id_TipoDocumento'],$itemData['id_Usuario'], $itemData['descricaoTeor_Protocolo'], $itemData['dtEnvio_Protocolo'], $itemData['dtRecebimento_Protocolo']);
						  $Protocolos[] = $Protocolo;
					  }
				  }
			  }
			  $DB->close();
			  return $Protocolos;
		  }
				  
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function LerTodosProtocolos_Paginacao($inicio, $registros) {
			  $sql = "
				  SELECT
					   t1.id_Protocolo,
					   t1.remetente_Protocolo,
					   t1.id_TipoDocumento,
					   t1.id_Usuario,
					   t1.descricaoTeor_Protocolo,
					   t1.dtEnvio_Protocolo,
					   t1.dtRecebimento_Protocolo
				  FROM
					  protocolo AS t1
					  
					  
				  LIMIT $inicio, $registros;
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Protocolos;//criando a variável
			  foreach($Data as $itemData){
				   $Protocolo = new Protocolo();
				   $Protocolo->SetValues($itemData['id_Protocolo'], $itemData['remetente_Protocolo'], $itemData['id_TipoDocumento'], $itemData['id_Usuario'], $itemData['descricaoTeor_Protocolo'], $itemData['dtEnvio_Protocolo'], $itemData['dtRecebimento_Protocolo']);
				   $Protocolos[] = $Protocolo;
			  }
			  $DB->close();
			  return $Protocolos;
		  }
		  
		//Funcao que atualiza uma instancia no BD
		public function UpdateProtocolo($id,$Protocolo) {
			  $sql = "
				  UPDATE protocolo SET
				  
					remetente_Protocolo = '$Protocolo->remetente_Protocolo',
					id_TipoDocumento = '$Protocolo->id_TipoDocumento',
					id_Usuario = '$Protocolo->id_Usuario',
					descricaoTeor_Protocolo = '$Protocolo->descricaoTeor_Protocolo',
					dtEnvio_Protocolo = '$Protocolo->dtEnvio_Protocolo',
					dtRecebimento_Protocolo = '$Protocolo->dtRecebimento_Protocolo'
				  
				  WHERE id_Protocolo = '$id';
				  
			  ";
		  
			  
			  $DB = new DB();
			  $DB->open();
			  $result =$DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		  
		//Funcao que deleta uma instancia no BD
		public function DeleteProtocolo($id) {
			  $sql = "
				  DELETE FROM protocolo
				  WHERE id_Protocolo = '$id';
			  ";
			  $DB = new DB();
			  
			  $DB->open();
			  $result =$DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		
		
		
		//***************************************************************************************
		//Usuário
		public function InsertUsuario($Usuario) {
			
			$sql = "
				INSERT INTO usuario 
						  (
				 			id_Usuario,
				 			nome_Usuario,
				 			senha_Usuario,
							status_Usuario,
							permissao_Usuario
						  )  
				VALUES 
					(
				 			'$Usuario->id_Usuario',
				 			'$Usuario->nome_Usuario',
				 			'$Usuario->senha_Usuario',
							'$Usuario->status_Usuario',
							'$Usuario->permissao_Usuario'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Usuario
		public function LerUsuario($id) {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.status_Usuario,
					 t1.permissao_Usuario
				FROM
					usuario AS t1
				WHERE
					t1.id_Usuario  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$Usuario = new Usuario();
			$Usuario->SetValues($Data[0]['id_Usuario'], $Data[0]['nome_Usuario'], $Data[0]['senha_Usuario'], $Data[0]['status_Usuario'], $Data[0]['permissao_Usuario']);
			$DB->close();
			return $Usuario; 
		}
		
		//Ler Todos os Usuarios
		public function LerTodosUsuarios() {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.status_Usuario,
					 t1.permissao_Usuario
				FROM
					usuario AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$Usuarios;
			if($Data ==NULL){
				$Usuarios = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$Usuario = new Usuario();
						$Usuario->SetValues($itemData['id_Usuario'], $itemData['nome_Usuario'], $itemData['senha_Usuario'], $itemData['status_Usuario'], $itemData['permissao_Usuario']);
						$Usuarios[] = $Usuario;
					}
				}
			}
			$DB->close();
			return $Usuarios; 
		}
		
		//Ler Todos os Usuarios com Paginação
		public function LerTodosUsuarios_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.status_Usuario,
					 t1.permissao_Usuario
				FROM
					usuario AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$Usuarios;
			foreach($Data as $itemData){
				if(is_bool($itemData)) continue;
				else{
					$Usuario = new Usuario();
					$Usuario->SetValues($itemData['id_Usuario'], $itemData['nome_Usuario'], $itemData['senha_Usuario'], $itemData['status_Usuario'], $itemData['permissao_Usuario']);
					$Usuarios[] = $Usuario;	
				}
			}
			$DB->close();
			return $Usuarios;
		}
		
		//Update Usuario
		public function UpdateUsuario($id, $Usuario) {
			$sql = "
				UPDATE usuario SET
				
				  nome_Usuario = '$Usuario->nome_Usuario',
				  senha_Usuario = '$Usuario->senha_Usuario',
				  status_Usuario = '$Usuario->status_Usuario',
				  permissao_Usuario = '$Usuario->permissao_Usuario'
				
				WHERE id_Usuario = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete Usuario
		public function DeleteUsuario($id) {
			$sql = "
				DELETE FROM usuario
				WHERE id_Usuario = '$id';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
	
		//***************************************************************************************
		//TipoDocumento
		
		public function InsertTipoDocumento($TipoDocumento) {
			
			$sql = "
				INSERT INTO tipodocumento 
						  (
				 			id_TipoDocumento,
				 			nome_TipoDocumento
						  )  
				VALUES 
					(
				 			'$TipoDocumento->id_TipoDocumento',
				 			'$TipoDocumento->nome_TipoDocumento'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler TipoDocumento
		public function LerTipoDocumento($id) {
			$sql = "
				SELECT
					 t1.id_TipoDocumento,
					 t1.nome_TipoDocumento
				FROM
					tipodocumento AS t1
				WHERE
					t1.id_TipoDocumento  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$TipoDocumento = new TipoDocumento();
			$TipoDocumento->SetValues($Data[0]['id_TipoDocumento'], $Data[0]['nome_TipoDocumento']);
			$DB->close();
			return $TipoDocumento;
		}
		
		//Ler Todos os TiposDocumentos
		public function LerTodosTiposDocumentos() {
			$sql = "
				SELECT
					 t1.id_TipoDocumento,
					 t1.nome_TipoDocumento
				FROM
					tipodocumento AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$TiposDocumentos;
			if($Data ==NULL){
				$TiposDocumentos = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$TipoDocumento = new TipoDocumento();
						$TipoDocumento->SetValues($itemData['id_TipoDocumento'], $itemData['nome_TipoDocumento']);
						$TiposDocumentos[] = $TipoDocumento;
					}
				}
			}
			$DB->close();
			return $TiposDocumentos;
		}
		
		//Ler Todos os TiposDocumentos com Paginação
		public function LerTodosTiposDocumentos_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_TipoDocumento,
					 t1.nome_TipoDocumento
				FROM
					tipodocumento AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$TiposDocumentos;
			foreach($Data as $itemData){
				if(is_bool($itemData)) continue;
				else{
					$TipoDocumento = new TipoDocumento();
					$TipoDocumento->SetValues($itemData['id_TipoDocumento'], $itemData['nome_TipoDocumento']);
					$TiposDocumentos[] = $TipoDocumento;
				}
			}
			$DB->close();
			return $TiposDocumentos;
		}
		
		//Update TipoDocumento
		public function UpdateTipoDocumento($id, $TipoDocumento) {
			$sql = "
				UPDATE tipodocumento SET
				
				  nome_TipoDocumento = '$TipoDocumento->nome_TipoDocumento'
				
				WHERE id_TipoDocumento = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete TipoDocumento
		public function DeleteTipoDocumento($id) {
			$sql = "
				DELETE FROM tipodocumento
				WHERE id_TipoDocumento = '$id';
			";
			$DB = new DB();
			
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
	
		//***************************************************************************************
		//Reuniao
		//Funcao que salva a instancia no BD
		public function InsertReuniao($Reuniao) {
			  
			  $sql = "
				  INSERT INTO reuniao
							(
							  id_Reuniao,
							  id_Usuario,
							  dt_Reuniao,
							  hora_Reuniao,
							  local_Reuniao,
							  pauta_Reuniao
							)
				  VALUES
					  (
							  '$Reuniao->id_Reuniao',
							  '$Reuniao->id_Usuario',
							  '$Reuniao->dt_Reuniao',
							  '$Reuniao->hora_Reuniao',
							  '$Reuniao->local_Reuniao',
							  '$Reuniao->pauta_Reuniao'
					  );
			  ";
			  
			  $DB = new DB();
			  $DB->open();
			  $result = $DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		  
		//Funcao que retorna uma Instancia especifica da classe no bd
		public function LerReuniao($id) {
			  $sql = "
				 SELECT
					   t1.id_Reuniao,
					   t1.id_Usuario,
					   t1.dt_Reuniao,
					   t1.hora_Reuniao,
					   t1.local_Reuniao,
					   t1.pauta_Reuniao
				 FROM
				 	reuniao AS t1
				 
				 WHERE
					  t1.id_Reuniao  = '$id'
		
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Reuniao= new Reuniao();
			  $Reuniao->SetValues($Data[0]['id_Reuniao'], $Data[0]['id_Usuario'], $Data[0]['dt_Reuniao'], $Data[0]['hora_Reuniao'], $Data[0]['local_Reuniao'], $Data[0]['pauta_Reuniao']);
			  $DB->close();
			  return $Reuniao;
		  }
		  
		//Funcao que retorna um vetor com todos as instancias da classe no BD
		public function LerTodosReunioes() {
			  $sql = "
				  SELECT
					   t1.id_Reuniao,
					   t1.id_Usuario,
					   t1.dt_Reuniao,
					   t1.hora_Reuniao,
					   t1.local_Reuniao,
					   t1.pauta_Reuniao
				  FROM
					  reuniao AS t1  
		
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Reuniao;//Declaração de variável
			  if($Data == NULL){
				  $Reunioes = $Data;
			  }
			  else{
				  
				  foreach($Data as $itemData){
					  if(is_bool($itemData)) continue;
					  else{
						  $Reuniao= new Reuniao();
						  $Reuniao->SetValues($itemData['id_Reuniao'], $itemData['id_Usuario'], $itemData['dt_Reuniao'],$itemData['hora_Reuniao'], $itemData['local_Reuniao'], $itemData['pauta_Reuniao']);
						  $Reunioes[] = $Reuniao;
					  }
				  }
			  }
			  $DB->close();
			  return $Reunioes;
		  }
				  
		//Funcao que retorna um vetor com todos as instancias da classe no BD com paginacao
		public function LerTodosReunioes_Paginacao($inicio, $registros) {
			  $sql = "
				  SELECT
					   t1.id_Reuniao,
					   t1.id_Usuario,
					   t1.dt_Reuniao,
					   t1.hora_Reuniao,
					   t1.local_Reuniao,
					   t1.pauta_Reuniao
				  FROM
					  reuniao AS t1
					  
					  
				  LIMIT $inicio, $registros;
			  ";
			  
			  
			  $DB = new DB();
			  $DB->open();
			  $Data = $DB->fetchData($sql);
			  $Reunioes;//criando a variável
			  foreach($Data as $itemData){
				   $Reuniao = new Reuniao();
				   $Reuniao->SetValues($itemData['id_Reuniao'], $itemData['id_Usuario'], $itemData['dt_Reuniao'], $itemData['hora_Reuniao'], $itemData['local_Reuniao'], $itemData['pauta_Reuniao']);
				   $Reunioes[] = $Reuniao;
			  }
			  $DB->close();
			  return $Reunioes;
		  }
		  
		//Funcao que atualiza uma instancia no BD
		public function UpdateReuniao($id,$Reuniao) {
			  $sql = "
				  UPDATE reuniao SET
				  
					id_Usuario = '$Reuniao->id_Usuario',
					dt_Reuniao = '$Reuniao->dt_Reuniao',
					hora_Reuniao = '$Reuniao->hora_Reuniao',
					local_Reuniao = '$Reuniao->local_Reuniao',
					pauta_Reuniao = '$Reuniao->pauta_Reuniao'
				  
				  WHERE id_Reuniao = '$id';
				  
			  ";
		  
			  
			  $DB = new DB();
			  $DB->open();
			  $result =$DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		  
		//Funcao que deleta uma instancia no BD
		public function DeleteReuniao($id) {
			  $sql = "
				  DELETE FROM reuniao
				  WHERE id_Reuniao = '$id';
			  ";
			  $DB = new DB();
			  
			  $DB->open();
			  $result =$DB->query($sql);
			  $DB->close();
			  return $result;
		  }
		  
	}

?>