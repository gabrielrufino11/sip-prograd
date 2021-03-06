<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('view/Protocolo/protocolo.lista.php');	
		});
		
		$('#Salvar').click(function(e) {

			e.preventDefault();
			
			var id_Protocolo = $('#id_Protocolo').val();
			var remetente_Protocolo = $('#remetente_Protocolo').val();
			var id_TipoDocumento = $('#id_TipoDocumento').children(":selected").val();
			var id_Usuario	= $('#id_Usuario').children(":selected").val();	
			var descricaoTeor_Protocolo = $('#descricaoTeor_Protocolo').val();
			var dtEnvio_Protocolo = $('#dtEnvio_Protocolo').val();
			var dtRecebimento_Protocolo = $('#dtRecebimento_Protocolo')	.val();
			
			console.log('tipo'+remetente_Protocolo);
			console.log('tipo'+id_TipoDocumento);
			console.log('tipo'+id_Usuario);
			console.log('tipo'+descricaoTeor_Protocolo);
			console.log('tipo'+dtEnvio_Protocolo);
			console.log('tipo'+dtRecebimento_Protocolo);
			//2 validar os inputs
			if(remetente_Protocolo === "" || id_TipoDocumento === ""  || id_Usuario === "" || descricaoTeor_Protocolo === "" || dtEnvio_Protocolo === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			
			else{
				$.ajax({
					   url: 'engine/controllers/protocolo.php',
					   data: {
							id_Protocolo : null,
							remetente_Protocolo : remetente_Protocolo,
							id_TipoDocumento : id_TipoDocumento,
							id_Usuario : id_Usuario,
							descricaoTeor_Protocolo : descricaoTeor_Protocolo,
							dtEnvio_Protocolo : dtEnvio_Protocolo,
							dtRecebimento_Protocolo : dtRecebimento_Protocolo,
							action: 'create'
					   },
					   error: function(jqXHR, exception) {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
							var msg = '';
							if (jqXHR.status === 0) {
								msg = 'Not connect.\n Verify Network.';
							} else if (jqXHR.status == 404) {
								msg = 'Requested page not found. [404]';
							} else if (jqXHR.status == 500) {
								msg = 'Internal Server Error [500].';
							} else if (exception === 'parsererror') {
								msg = 'Requested JSON parse failed.';
							} else if (exception === 'timeout') {
								msg = 'Time out error.';
							} else if (exception === 'abort') {
								msg = 'Ajax request aborted.';
							} else {
								msg = 'Uncaught Error.\n' + jqXHR.responseText;
							}
							//cosole.log(msg);
					   },
					   success: function(data) {
							console.log(data);							
							if($.trim(data) === "true"){
								alert('Protocolo cadastrado com sucesso!');
    							$('#loader').load('view/Protocolo/protocolo.lista.php');	
							}
							else{
								alert('Algum erro ocorreu e o salvamento pode ter sido mal sucedido.');	
							}
					   },
					   
					   type: 'POST'
					});	
			}
			
			//3 transferir os dados dos inputs para o arquivo q ira tratar
			
			//4 observar a resposta, e falar pra usuario o que aconteceu
		});
		
		
		//mascaras abaixo
	});
</script>

<?php
	require_once "../../engine/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Cadastro</a></li>
    <li class="active">Protocolo</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1 align="center">
	Cadastro de Protocolo
</h1>

<br>

<div class="container">

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Meus Protocolos
    </button>
	<button id="Salvar" type="button" class="btn btn-success"><i class="fa fa-hdd-o" aria-hidden="true"></i>
    	Salvar
    </button>
</div>

<br>
<br>
<br>

<section class="row formAdiconarDados" >
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Remetente *</span>
 			<input type="text" class="form-control" id="remetente_Protocolo" aria-describedby="basic-addon1">
		</div>    	
    </section>
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Tipo Documento *</span>
 			<select id="id_TipoDocumento" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o tipo do documento</option>
                <?php 
					$TiposDocumentos = new TipoDocumento();
					$TiposDocumentos = $TiposDocumentos->ReadAll();
					foreach($TiposDocumentos as $TipoDocumento){
						?>
						<option value="<?php echo $TipoDocumento['id_TipoDocumento']; ?>"><?php echo $TipoDocumento['nome_TipoDocumento']; ?></option>                        
						<?php
					}
				?>           
            	</select>
		</div>    	
    </section>
</section>
<br>
<section class="row formAdiconarDados"> 
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Destinatário *</span>
 				<select id="id_Usuario" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o destinatário</option>
                <?php 
					$Usuarios = new Usuario();
					$Usuarios = $Usuarios->ReadAll();
					foreach($Usuarios as $Usuario){
						?>
                        	<option value="<?php echo $Usuario['id_Usuario']; ?>"><?php echo $Usuario['nome_Usuario']; ?></option>
                        <?php
					}
				?>           
            	</select>
		</div>    	
    </section>
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Descrição do Teor *</span>
 			<input id="descricaoTeor_Protocolo" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" width="30">
		</div>
    </section>
</section>

<br>
<br>

<section class="row formAdiconarDados" >
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data de Envio *</span>
 			<input id="dtEnvio_Protocolo" type="date" class="form-control" placeholder="Data de Envio" aria-describedby="basic-addon1">
		</div>
    </section>
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data de Recebimento</span>
 			<input id="dtRecebimento_Protocolo" type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" disabled>
		</div>
    </section>
</section>

<br>
<br>

<section>
	<?php
		require_once "../../engine/bd/bd.php";

		$msg = false;
		if (isset($_FILES['arquivo'])){
			
			$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
			$novo_nome = md5(time()) . $extensao;
			$diretorio = "upload/";

			move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

			$sql_code = "INSERT INTO arquivo (codigo, arquivo, data) VALUES(null, '$novo_nome', NOW()";
			if($dbi->query($sql_code))
				$msg = "Arquivo enviado com sucesso!";
			else
				$msg = "Falha ao enviar arquivo.";


		}

	?>				

	<?php if($msg != false) echo "<p> $msg </p>";?>
	<form method="POST" action="view/Protocolo/protocolo.adicionar.php" enctype="multipart/form-data">
  		<label>Arquivo</label>
  		<input type="file" name="arquivo" />
		  <br>
	</form>
</section>

<br>

<li>*: campo de preenchimento obrigatório. O campo Data de Recebimento deve ser preenchido somente pelo destinatário no momento do recebimento. Para este preenchimento, o usuário deve ir para a página de gerenciamento de protocolos e clicar em editar.</li> 

</div>