<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Usuario {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Usuario;
		private $nome_Usuario;
		private $senha_Usuario;
		private $permissao_Usuario;
		private $id_Reuniao;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Usuario, $nome_Usuario, $senha_Usuario, $permissao_Usuario, $id_Reuniao) { 
			$this->id_Usuario = $id_Usuario;
			$this->nome_Usuario = $nome_Usuario;
			$this->senha_Usuario = $senha_Usuario;
			$this->permissao_Usuario = $permissao_Usuario;
			$this->id_Reuniao = $id_Reuniao;
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
				INSERT INTO usuario 
						  (
                            id_Usuario,
                            nome_Usuario,
                            senha_Usuario,
							permissao_Usuario,
							id_Reuniao
						  )  
				VALUES 
					(
				 			'$this->id_Usuario',
				 			'$this->nome_Usuario',
				 			'$this->senha_Usuario',
							'$this->permissao_Usuario',
							'$this->id_Reuniao'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Usuario
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.permissao_Usuario,
					 t1.id_Reuniao
				FROM
					 usuario AS t1
				WHERE
					t1.id_Usuario  = '$id'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		//Ler Todos os Usuarios
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.permissao_Usuario,
					 t1.id_Reuniao
				FROM
					usuario AS t1
				

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
		
		//Ler Todos os Usuarios com Paginação
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_Usuario,
					 t1.nome_Usuario,
					 t1.senha_Usuario,
					 t1.permissao_Usuario,
					 t1.id_Reuniao
				FROM
					usuario AS t1
					
					
				LIMIT $inicio, $registros;
			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data; 
		}
		
		//Update Usuario
		public function Update($id) {
			$sql = "
				UPDATE usuario SET
				
                nome_Usuario = '$this->nome_Usuario',
                senha_Usuario = '$this->senha_Usuario',
				permissao_Usuario = '$this->permissao_Usuario',
				id_Reuniao = '$this->id_Reuniao'
				
				WHERE id_Usuario = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}

		public function UpdateReuniao($id) {
			
				$sql = "
					UPDATE usuario SET
					
						id_Reuniao = '$this->id_Reuniao'
					
					WHERE id_Usuario = '$id';
					
				";
			
				
				$DB = new DB();
				$DB->open();
				$result =$DB->query($sql);
				$DB->close();
				
				return $result;
			}
		
		//Delete Usuario
		public function Delete($id) {
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
			$this->permissao_Usuario;
			$this->id_Reuniao;
		}
		
		//destructor
		function __destruct() {
			$this->id_Usuario;
			$this->nome_Usuario;
			$this->senha_Usuario;
			$this->permissao_Usuario;
			$this->id_Reuniao;
		}
			
	};

?>
