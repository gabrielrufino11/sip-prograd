<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('view/TipoDocumento/tipodocumento.lista.php');	
		});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			
			//1 instansciar e recuperar valores dos inputs
			
			var id_TipoDocumento =$('#id_TipoDocumento').val();
			var nome_TipoDocumento =$('#nome_TipoDocumento').val();
			
			console.log('tipo'+nome_TipoDocumento);		
			
			//2 validar os inputs
			if(nome_TipoDocumento === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				$.ajax({
					   url: 'core/controle/tipodocumento.php',
					   data: {
							id_TipoDocumento : null,
							nome_TipoDocumento : nome_TipoDocumento,
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
							//console.log(data);							
							if($.trim(data) === "true"){
								alert('Item adicionado com sucesso!');
    							$('#loader').load('view/TipoDocumento/tipodocumento.lista.php');	
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
	require_once "../../core/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Cadastro</a></li>
    <li class="active">Tipo de Documento</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1>
	Cadastro Tipo de Documento
</h1>

<br>

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Voltar
    </button>
	<button id="Salvar" type="button" class="btn btn-success"><i class="fa fa-hdd-o" aria-hidden="true"></i>
    	Salvar
    </button>
</div>

<br>
<br>

<section class="row formAdiconarDados">
	<section class="col-md-3">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome *</span>
 			<input id="nome_TipoDocumento" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
		</div>    	
    </section>
</section>

<br>

<li>*: campo de preenchimento obrigatório.</li> 