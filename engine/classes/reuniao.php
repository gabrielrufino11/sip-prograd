<?php
	//Declaracao da classe
	//Nome da classe devera ser o nome da tabela respectiva no banco de dados
	class Reuniao {
		
		//Variaveis da classe
		//Nome das variaveis devem ser de acordo com as colunas da tabela respectiva no bd
		private $id_Reuniao;
		private $dt_Reuniao;
		private $hora_Reuniao;
        private $local_Reuniao;
        private $pauta_Reuniao;

		//setters
		
		//Funcao que seta uma instancia da classe
		public function SetValues($id_Reuniao, $dt_Reuniao, $hora_Reuniao, $local_Reuniao, $pauta_Reuniao) { 
			$this->id_Reuniao = $id_Reuniao;
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
		
				
		public function Create(){
			
			$sql = "
				INSERT INTO reuniao 
						  (
                            id_Reuniao,
                            dt_Reuniao,
                            hora_Reuniao,
                            local_Reuniao,
                            pauta_Reuniao
						  )  
				VALUES 
					(
				 			'$this->id_Reuniao',
				 			'$this->dt_Reuniao',
							'$this->hora_Reuniao',
                            '$this->local_Reuniao',
                            '$this->pauta_Reuniao'
					);
			";
			
			$DB = new DB();
			$DB->open();
			$result = $DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Ler Reuniao
		public function Read($id) {
			$sql = "
				SELECT
					 t1.id_Reuniao,
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
			
			$DB->close();
			return $Data[0]; 
		}
		
		//Ler Todos os Reunioes
		public function ReadAll() {
			$sql = "
				SELECT
					 t1.id_Reuniao,
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
		
		//Ler Todos os Reunioes com Paginação
		public function ReadAll_Paginacao($inicio, $registros) {
			$sql = "
				SELECT
					 t1.id_Reuniao,
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
			
			$DB->close();
			return $Data; 
		}
		
		//Update Reuniao
		public function Update($id) {
			$sql = "
				UPDATE reuniao SET
				
                dt_Reuniao = '$this->dt_Reuniao',
                hora_Reuniao = '$this->hora_Reuniao',
                local_Reuniao = '$this->local_Reuniao',
                pauta_Reuniao = '$this->pauta_Reuniao'
				
				WHERE id_Reuniao = '$id';
				
			";
		
			
			$DB = new DB();
			$DB->open();
			$result =$DB->query($sql);
			$DB->close();
			return $result;
		}
		
		//Delete Reuniao
		public function Delete($id) {
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
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- begin 
			--------------------------------------------------
		
		*/

		public function ReadByOthers() {
			$sql = "
				SELECT
					 t1.id_Reuniao,
					 t1.dt_Reuniao,
					 t1.hora_Reuniao,
					 t1.local_Reuniao,
					 t1.pauta_Reuniao
				FROM
					reuniao AS t1
				WHERE
					t1.dt_Reuniao='$this->dt_Reuniao' AND
					t1.hora_Reuniao='$this->hora_Reuniao' AND
					t1.local_Reuniao='$this->local_Reuniao' AND
					t1.pauta_Reuniao='$this->pauta_Reuniao'

			";
			
			
			$DB = new DB();
			$DB->open();
			$Data = $DB->fetchData($sql);
			
			$DB->close();
			return $Data[0]; 
		}
		
		
		/*
			--------------------------------------------------
			Viewer SPecific methods -- end 
			--------------------------------------------------
		
		*/
		
		
		//constructor 
		
		function __construct() { 
			$this->id_Reuniao;
			$this->dt_Reuniao;
			$this->hora_Reuniao;
            $this->local_Reuniao;
            $this->pauta_Reuniao;
		}
		
		//destructor
		function __destruct() {
			$this->id_Reuniao;
			$this->dt_Reuniao;
			$this->hora_Reuniao;
            $this->local_Reuniao;
            $this->pauta_Reuniao;
		}
			
	};

?>
