<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class tipodocumento {
		
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
