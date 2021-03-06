<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('view/Usuario/usuario.lista.php');
		});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			
			//1 instansciar e recuperar valores dos inputs
			
			var id_Usuario =$('#id_Usuario').val();
			var nome_Usuario =$('#nome_Usuario').val();
			var senha_Usuario = $('#senha_Usuario').val();
			var permissao_Usuario = $('#permissao_Usuario').val();
			
			console.log('tipo'+id_Usuario);
			console.log('tipo'+nome_Usuario);
			console.log('tipo'+senha_Usuario);
			console.log('tipo'+permissao_Usuario);
			
			//2 validar os inputs
			if(nome_Usuario === "" || senha_Usuario === "" || permissao_Usuario === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
							id_Usuario : null,
							nome_Usuario : nome_Usuario,
							senha_Usuario : senha_Usuario,
							permissao_Usuario : permissao_Usuario,
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
								alert('Usuario adicionado com sucesso!');
    							$('#loader').load('view/Usuario/usuario.lista.php');	
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
    <li class="active">Usuário</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1 align="center">
	Cadastro de Usuário
</h1>

<br><br>

<div class="container">

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Voltar
    </button>
	<button id="Salvar" type="button" class="btn btn-success"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    	Salvar
    </button>
</div>

<br>
<br>

<section class="row formAdiconarDados">
	<section class="col-md-3">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome/Login *</span>
 			<input id="nome_Usuario" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
		</div>    	
    </section>
    <section class="col-md-3">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Senha *</span>
 			<input id="senha_Usuario" type="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
		</div>
    </section>
</section>
<br>
<section class="row formAdiconarDados">
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Permissão de Acesso *</span>
				<select id="permissao_Usuario" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o tipo de permissão</option>
                <option value="1">Administrador</option>
                <option value="2">Normal</option>       
            	</select>
          </div>    	
    </section>
</section>

<br>

<li>*: campo de preenchimento obrigatório.</li>

</div>