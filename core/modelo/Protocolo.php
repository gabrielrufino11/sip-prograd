<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class protocolo {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Protocolo;
		private $remetente_Protocolo;
		private $id_TipoDocumento;
		private $id_Usuario;
		private $descricaoTeor_Protocolo;
		private $dtEnvio_Protocolo;
		private $dtRecebimento_Protocolo;
				

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Protocolo, $remetente_Protocolo, $id_TipoDocumento, $id_Usuario, $descricaoTeor_Protocolo, $dtEnvio_Protocolo, $dtRecebimento_Protocolo) { 
			$this->id_Protocolo = $id_Protocolo;
			$this->remetente_Protocolo = $remetente_Protocolo;
			$this->id_TipoDocumento = $id_TipoDocumento;
			$this->id_Usuario = $id_Usuario;
			$this->descricaoTeor_Protocolo = $descricaoTeor_Protocolo;
			$this->dtEnvio_Protocolo = $dtEnvio_Protocolo;
			$this->dtRecebimento_Protocolo = $dtRecebimento_Protocolo;
						
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
			$this->id_Protocolo;
			$this->remetente_Protocolo;
			$this->id_TipoDocumento;
			$this->id_Usuario;
			$this->descricaoTeor_Protocolo;
			$this->dtEnvio_Protocolo;
			$this->dtRecebimento_Protocolo;
			
			
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
			
		}
			
	};

?>
