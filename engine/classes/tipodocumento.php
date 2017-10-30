<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class TipoDocumento {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_TipoDocumento;
		private $nome_TipoDocumento;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_TipoDocumento, $nome_TipoDocumento) { 
			$this->id_TipoDocumento = $id_TipoDocumento;
			$this->nome_TipoDocumento = $nome_TipoDocumento;
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
				INSERT INTO tipodocumento 
						  (
                            id_TipoDocumento,
                            nome_TipoDocumento
						  )  
				VALUES 
					(
				 			'$this->id_TipoDocumento',
				 			'$this->nome_TipoDocumento'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Tipo de Documento
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_TipoDocumento,
					 t1.nome_TipoDocumento
					tipodocumento AS t1
				WHERE
					t1.id_TipoDocumento  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		//Ler Todos os Tipos de Documentos
		public function ReadAll() {
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
		
		//Ler Todos os Tipos de Documentos com Paginação
		public function ReadAll_Paginacao($inicio, $registros) {
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
			
			$DB->close();
			return $Data; 
		}
		
		//Update Tipo de Documento
		public function Update($id) {
			$sql = "
				UPDATE tipodocumento SET
				
                id_TipoDocumento = '$this->id_TipoDocumento',
                nome_TipoDocumento = '$this->nome_TipoDocumento'
				
				WHERE id_TipoDocumento = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete Tipo de Documento
		public function Delete($id) {
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
			$this->id_TipoDocumento;
			$this->nome_TipoDocumento;
		}
		
		//destructor
		function __destruct() {
			$this->id_TipoDocumento;
			$this->nome_TipoDocumento;
		}
			
	};

?>
