<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class reuniao {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Reuniao;
		private $id_Usuario;
		private $dt_Reuniao;
		private $hora_Reuniao;
		private $local_Reuniao;
		private $pauta_Reuniao;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Reuniao, $id_Usuario, $dt_Reuniao, $hora_Reuniao, $local_Reuniao, $pauta_Reuniao) { 
			$this->id_Reuniao = $id_Reuniao;
			$this->id_Usuario = $id_Usuario;
			$this->dt_Reuniao = $dt_Reuniao;
			$this->hora_Reuniao = $hora_Reuniao;
			$this->local_Reuniao = $local_Reuniao;
			$this->pauta_Reuniao = $pauta_Reuniao;
						
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
			$this->id_Reuniao;
			$this->id_Usuario;
			$this->dt_Reuniao;
			$this->hora_Reuniao;
			$this->local_Reuniao;
			$this->pauta_Reuniao;
			
			
		}
		
		//destructor
		function __destruct() {
			$this->id_Reuniao;
			$this->id_Usuario;
			$this->dt_Reuniao;
			$this->hora_Reuniao;
			$this->local_Reuniao;
			$this->pauta_Reuniao;
			
		}
			
	};

?>
