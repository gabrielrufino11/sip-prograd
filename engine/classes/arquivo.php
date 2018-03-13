<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Arquivo {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Arquivo;
		private $arquivo;
		private $dt_Arquivo;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Arquivo, $arquivo, $dt_Arquivo) { 
			$this->id_Arquivo = $id_Arquivo;
			$this->arquivo = $arquivo;
			$this->dt_Arquivo = $dt_Arquivo;
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
				INSERT INTO arquivo 
						  (
                            id_Arquivo,
                            arquivo,
                            dt_Arquivo
						  )  
				VALUES 
					(
				 			'$this->id_Arquivo',
				 			'$this->arquivo',
				 			'$this->dt_Arquivo'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Arquivo
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_Arquivo,
					 t1.arquivo,
					 t1.dt_Arquivo
				FROM
					arquivo AS t1
				WHERE
					t1.id_Arquivo  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		//Ler Todos os Arquivos
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_Arquivo,
					 t1.arquivo,
					 t1.dt_Arquivo
				FROM
					arquivo AS t1
				

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
		
		//Ler Todos os Arquivos com Paginação
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_Arquivo,
					 t1.arquivo,
					 t1.dt_Arquivo
				FROM
					arquivo AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Update Arquivo
		public function Update($id) {
			$sql = "
				UPDATE arquivo SET
				
                arquivo = '$this->arquivo',
                dt_Arquivo = '$this->dt_Arquivo'
				
				WHERE id_Arquivo = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete Arquivo
		public function Delete($id) {
			$sql = "
				DELETE FROM arquivo
				WHERE id_Arquivo = '$id';
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
			$this->id_Arquivo;
			$this->arquivo;
			$this->dt_Arquivo;
		}
		
		//destructor
		function __destruct() {
			$this->id_Arquivo;
			$this->arquivo;
			$this->dt_Arquivo;
		}
			
	};

?>
