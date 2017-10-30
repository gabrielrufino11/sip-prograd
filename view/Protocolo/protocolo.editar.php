<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('view/Protocolo/protocolo.lista.php');	
		});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			
			//1 instansciar e recuperar valores dos inputs
			var id_Protocolo = $('#id_Protocolo').val();
			var remetente_Protocolo = $('#remetente_Protocolo').val();
			var id_TipoDocumento = $('#id_TipoDocumento').val();
			var id_Usuario	= $('#id_Usuario').val();
			var descricaoTeor_Protocolo = $('#descricaoTeor_Protocolo').val();
			var dtEnvio_Protocolo = $('#dtEnvio_Protocolo').val();
			var dtRecebimento_Protocolo = $('#dtRecebimento_Protocolo').val();
			/*console.log('id_Protocolo '+id_Protocolo);
			console.log('remetente_Protocolo '+remetente_Protocolo);
			console.log('id_TipoDocumento '+id_TipoDocumento);
			console.log('id_Usuario '+id_Usuario);
			console.log('descricaoTeor_Protocolo '+descricaoTeor_Protocolo);
			console.log('dtEnvio_Protocolo '+dtEnvio_Protocolo);
			console.log('dtRecebimento_Protocolo '+dtRecebimento_Protocolo);*/
			
			
			
			//2 validar os inputs
			if(id_Protocolo === "" || remetente_Protocolo === "" || id_TipoDocumento === "" || id_Usuario === "" || descricaoTeor_Protocolo === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				$.ajax({
					   url: 'engine/controllers/protocolo.php',
					   data: {
							id_Protocolo : id_Protocolo,
							remetente_Protocolo : remetente_Protocolo,
							id_TipoDocumento : id_TipoDocumento,
							id_Usuario : id_Usuario,
							descricaoTeor_Protocolo : descricaoTeor_Protocolo,
							dtEnvio_Protocolo : dtEnvio_Protocolo,
							dtRecebimento_Protocolo : dtRecebimento_Protocolo,
							action: 'update'
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
								alert('Item editado com sucesso!');
    							$('#loader').load('view/Protocolo/protocolo.lista.php');	
							}
							else{
								alert('Algum erro ocorreu e a ediçao pode ter sido mal sucedido.');	
							}
					   },
					   
					   type: 'POST'
					});	
			}
			
			//3 transferir os dados dos inputs para o arquivo q ira tratar
			
			//4 observar a resposta, e falar pra usuario o que aconteceu
		});
		
		$('#Excluir').click(function(e) {
			e.preventDefault();
        	//loader
			
			var id_Protocolo = $('#id_Protocolo').val();
			//alert(id);
			if (confirm("Tem certeza que deseja excluir o Protocolo?")){
				$.ajax({
					   url: 'core/controle/protocolo.php',
					   data: {
							id_Protocolo : id_Protocolo,
							remetente_Protocolo : null,
							id_TipoDocumento : null,
							id_Usuario : null,
							descricaoTeor_Protocolo : null,
							dtEnvio_Protocolo : null,
							dtRecebimento_Protocolo : null,
							action: 'delete'
					   },

					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							console.log(data);
							if($.trim(data) === 'true'){
								alert('Protocolo excluído com sucesso!');
								$('#loader').load('view/Protocolo/protocolo.lista.php');
							}
							else{
								alert('Erro ao conectar com banco de dados. Aguarde e tente novamente em alguns instantes.');	
							}
					   },
					   type: 'POST'
					});	
			}
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
    <li class="active">Gerenciar</a></li>
    <li class="active">Protocolo</a></li>
    <li class="active">Editar Dados</li>
</ol>

<h1>
	Edição de Protocolo
</h1>

<br>

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Meus Protocolos
    </button>
	<button id="Salvar" type="button" class="btn btn-success"><i class="fa fa-hdd-o" aria-hidden="true"></i>
    	Salvar
    </button>
    <button id="Excluir" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    	Excluir
    </button>
</div>

<br>
<br>
<?php 
	$Protocolo = new Protocolo();
	$Protocolo = $Protocolo->Read($_POST['id_Protocolo']);
?>
<section class="row formAdiconarDados">
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Remetente *</span>
 			<input type="text" class="form-control" id="remetente_Protocolo" aria-describedby="basic-addon1" disabled placeholder="" value="<?php echo $Protocolo['remetente_Protocolo'];?>">
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
                        	<option value="<?php echo $TipoDocumento['id_TipoDocumento']; ?>" <?php if($Protocolo['id_TipoDocumento'] === $TipoDocumento['id_TipoDocumento']){echo 'selected';} ?>><?php echo $TipoDocumento['nome_TipoDocumento']; ?></option>
                        <?php
					}
				?>           
            </select>
		</div>
    </section>
</section>

<br>
<br>

<section class="row formAdiconarDados" >   
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
                        	<option value="<?php echo $Usuario['id_Usuario']; ?>" <?php if($Protocolo['id_Usuario'] === $Usuario['id_Usuario']){echo 'selected';} ?>><?php echo $Usuario['nome_Usuario']; ?></option>
                        <?php
					}
				?>           
            </select>
		</div>
    </section>
    
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Descrição do Teor *</span>
 			<input id="descricaoTeor_Protocolo" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" width="30" value="<?php echo $Protocolo['descricaoTeor_Protocolo']; ?>">
		</div>
    </section>
</section>

<br>
<br>

<section class="row formAdiconarDados" >
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data de Envio *</span>
 			<input id="dtEnvio_Protocolo" type="date" class="form-control" disabled placeholder="" aria-describedby="basic-addon1" value="<?php echo $Protocolo['dtEnvio_Protocolo']; ?>">
		</div>
    </section>
    
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data de Recebimento</span>
 			<input id="dtRecebimento_Protocolo" type="date" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $Protocolo['dtRecebimento_Protocolo']; ?>">
		</div>
    </section>
	
</section>

<br>
<br>

<section>
	<form action="envia_foto.php" method="post" enctype="multipart/form-data"> <input type="file" name="Arquivo" id="Arquivo"><br><input type="reset" value="Apagar"> </form>
</section>

<input type="hidden" id="id_Protocolo" value="<?php echo $Protocolo['id_Protocolo']; ?>">

<br>

<li>*: campo de preenchimento obrigatório.</li> 