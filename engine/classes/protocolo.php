<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Protocolo {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Protocolo;
		private $remetente_Protocolo;
		private $id_TipoDocumento;
		private $id_Usuario;
		private $descricaoTeor_Protocolo;
        private $dtEnvio_Protocolo;
		private $dtRecebimento_Protocolo;
		private $arquivo_Protocolo;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Protocolo, $remetente_Protocolo, $id_TipoDocumento, $id_Usuario, $descricaoTeor_Protocolo, $dtEnvio_Protocolo, $dtRecebimento_Protocolo, $arquivo_Protocolo) { 
			$this->id_Protocolo = $id_Protocolo;
			$this->remetente_Protocolo = $remetente_Protocolo;
			$this->id_TipoDocumento = $id_TipoDocumento;
			$this->id_Usuario = $id_Usuario;
			$this->descricaoTeor_Protocolo = $descricaoTeor_Protocolo;
            $this->dtEnvio_Protocolo = $dtEnvio_Protocolo;
			$this->dtRecebimento_Protocolo = $dtRecebimento_Protocolo;
			$this->arquivo_Protocolo = $arquivo_Protocolo;
		}
		
		public function __get($property) {
    		if (property_exists($this, $property)) {
      			return $this->$property;
    		}
  		}

		public function __set($property, $value) {
			if (property_exists($this, $property)) {
				$this->$property = $value;
			}
			return $this;
		}
		
				
		public function Create(){
			
			$sql = "
				INSERT INTO protocolo 
						  (
                            id_Protocolo,
                            remetente_Protocolo,
                            id_TipoDocumento,
							id_Usuario,
							descricaoTeor_Protocolo,
                            dtEnvio_Protocolo,
							dtRecebimento_Protocolo,
							arquivo_Protocolo
						  )  
				VALUES 
					(
				 			'$this->id_Protocolo',
				 			'$this->remetente_Protocolo',
				 			'$this->id_TipoDocumento',
							'$this->id_Usuario',
							'$this->descricaoTeor_Protocolo',
                            '$this->dtEnvio_Protocolo',
							'$this->dtRecebimento_Protocolo',
							'$this->arquivo_Protocolo'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Protocolo
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_Protocolo,
					 t1.remetente_Protocolo,
					 t1.id_TipoDocumento,
					 t1.id_Usuario,
					 t1.descricaoTeor_Protocolo,
                     t1.dtEnvio_Protocolo,
					 t1.dtRecebimento_Protocolo,
					 t1.arquivo_Protocolo
				FROM
					protocolo AS t1
				WHERE
					t1.id_Protocolo  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		//Ler Todos os Protocolos
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_Protocolo,
					 t1.remetente_Protocolo,
					 t1.id_TipoDocumento,
					 t1.id_Usuario,
					 t1.descricaoTeor_Protocolo,
                     t1.dtEnvio_Protocolo,
					 t1.dtRecebimento_Protocolo,
					 t1.arquivo_Protocolo
				FROM
					protocolo AS t1
				

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			$realData;
			if($Data ==NULL){
				$realData = $Data;
			}
			else{
				
				foreach($Data as $itemData){
					if(is_bool($itemData)) continue;
					else{
						$realData[] = $itemData;	
					}
				}
			}
			$DB->close();
			return $realData; 
		}
		
		//Ler Todos os Protocolos com Paginação
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_Protocolo,
					 t1.remetente_Protocolo,
					 t1.id_TipoDocumento,
					 t1.id_Usuario,
					 t1.descricaoTeor_Protocolo,
                     t1.dtEnvio_Protocolo,
					 t1.dtRecebimento_Protocolo,
					 t1.arquivo_Protocolo
				FROM
					protocolo AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Update Protocolo
		public function Update($id) {
			$sql = "
				UPDATE protocolo SET
				
                remetente_Protocolo = '$this->remetente_Protocolo',
                id_TipoDocumento = '$this->id_TipoDocumento',
                id_Usuario = '$this->id_Usuario',
                descricaoTeor_Protocolo = '$this->descricaoTeor_Protocolo',
                dtEnvio_Protocolo = '$this->dtEnvio_Protocolo',
				dtRecebimento_Protocolo = '$this->dtRecebimento_Protocolo',
				arquivo_Protocolo = '$this->arquivo_Protocolo'
				
				WHERE id_Protocolo = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete Protocolo
		public function Delete($id) {
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
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_Protocolo;
			$this->remetente_Protocolo;
			$this->id_TipoDocumento;
			$this->id_Usuario;
			$this->descricaoTeor_Protocolo;
            $this->dtEnvio_Protocolo;
			$this->dtRecebimento_Protocolo;
			$this->arquivo_Protocolo;
		}
		
		//destructor
		function __destruct() {
			$this->id_Protocolo;
			$this->remetente_Protocolo;
			$this->id_TipoDocumento;
			$this->id_Usuario;
			$this->descricaoTeor_Protocolo;
            $this->dtEnvio_Protocolo;
			$this->dtRecebimento_Protocolo;
			$this->arquivo_Protocolo;
		}
			
	};

?>
