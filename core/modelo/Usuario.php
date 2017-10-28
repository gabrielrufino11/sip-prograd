<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class usuario {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Usuario;
		private $nome_Usuario;
		private $senha_Usuario;
		private $status_Usuario;
		private $permissao_Usuario;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Usuario, $nome_Usuario, $senha_Usuario, $status_Usuario, $permissao_Usuario) { 
			$this->id_Usuario = $id_Usuario;
			$this->nome_Usuario = $nome_Usuario;
			$this->senha_Usuario = $senha_Usuario;
			$this->status_Usuario = $status_Usuario;
			$this->permissao_Usuario = $permissao_Usuario;
						
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
			$this->id_Usuario;
			$this->nome_Usuario;
			$this->senha_Usuario;
			$this->status_Usuario;
			$this->permissao_Usuario;	
		}
		
		//destructor
		function __destruct() {
			$this->id_Usuario;
			$this->nome_Usuario;
			$this->senha_Usuario;
			$this->status_Usuario;
			$this->permissao_Usuario;
		}
			
	};

?>
