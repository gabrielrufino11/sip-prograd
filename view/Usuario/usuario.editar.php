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
			var id_Usuario = $('#id_Usuario').val();
			var nome_Usuario = $('#nome_Usuario').val();
			var senha_Usuario = $('#senha_Usuario').val();
			var permissao_Usuario = $('#permissao_Usuario').val();
			
			//2 validar os inputs
			if(nome_Usuario === "" || senha_Usuario === "" || permissao_Usuario === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				$.ajax({
					   url: 'engine/controllers/usuario.php',
					   data: {
							id_Usuario : id_Usuario,
							nome_Usuario : nome_Usuario,
							senha_Usuario : senha_Usuario,
							permissao_Usuario : permissao_Usuario,
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
							//console.log(data);							
							if($.trim(data) === "true"){
								alert('Usuario editado com sucesso!');
    							$('#loader').load('view/Usuario/usuario.lista.php');	
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
		
		
		
		
		//mascaras abaixo
	});
</script>

<?php
	require_once "../../engine/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Gerenciamento</a></li>
    <li class="active">Usuário</a></li>
    <li class="active">Editar Dados</li>
</ol>

<h1 align="center">
	Edição de Usuário
</h1>

<br>

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Voltar
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
	$Usuario = new Usuario();
	$Usuario = $Usuario->Read($_POST['id_Usuario']);
?>
<section class="row formAdiconarDados">
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Nome/Login *</span>
 			<input id="nome_Usuario" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $Usuario['nome_Usuario']; ?>">
		</div>    	
    </section>
    
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Número do Ofício *</span>
 			<input id="senha_Usuario" type="password" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $Usuario['senha_Usuario']; ?>">
		</div>
    </section>
	
</section>

<section class="row formAdiconarDados">
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Permissão de Acesso *</span>
				<select id="permissao_Usuario" type="text" multiple class="chosen-select" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o tipo de permissão</option>
                <option value=""><?php echo $Usuario['permissao_Usuario']; ?></option>    
            	</select>
          </div>    	
    </section>
</section>

<input type="hidden" id="id_Usuario" value="<?php echo $Usuario['id_Usuario']; ?>">

<br>

<li>*: campo de preenchimento obrigatório.</li> 