<script>
	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('view/Reuniao/reuniao.lista.php');	
		});
		
		$('#Salvar').click(function(e) {
			e.preventDefault();
			
			//1 instansciar e recuperar valores dos inputs
			
			var id_Reuniao = $('#id_Reuniao').val();
			var id_Usuario = $('#id_Usuario').val();
			var dt_Reuniao = $('#dt_Reuniao').val();
			var hora_Reuniao = $('#hora_Reuniao').val();	
			var local_Reuniao = $('#local_Reuniao').val();
			var pauta_Reuniao = $('#pauta_Reuniao').val();
			
			console.log('tipo'+id_Usuario);
			console.log('tipo'+dt_Reuniao);
			console.log('tipo'+hora_Reuniao);
			console.log('tipo'+local_Reuniao);
			console.log('tipo'+pauta_Reuniao);
			//2 validar os inputs
			if(id_Usuario === "" || dt_Reuniao === ""  || hora_Reuniao === "" || local_Reuniao === "" || pauta_Reuniao === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			
			else{
				$.ajax({
					   url: 'core/controle/reuniao.php',
					   data: {
							id_Reuniao : null,
							id_Usuario : id_Usuario,
							dt_Reuniao : dt_Reuniao,
							hora_Reuniao : hora_Reuniao,
							local_Reuniao : local_Reuniao,
							pauta_Reuniao : pauta_Reuniao,
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
							if(data === "true"){
								alert('Item adicionado com sucesso!');
    							$('#loader').load('view/Reuniao/reuniao.lista.php');	
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
	
	$(".chosen-select").chosen();
	$("#id_Usuario").chosen().val();
</script>

<?php
	require_once "../../core/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Cadastro</a></li>
    <li class="active">Reunião</a></li>
    <li class="active">Adicionar Dados</li>
</ol>

<h1>
	Cadastro de Reunião
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

<section class="row formAdiconarDados" >
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Participantes *</span>
				<select id="id_Usuario" type="text" multiple class="chosen-select" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o(s) participante(s)</option>
                <?php
					$DBAuxiliar = new DBAuxiliar();
					$Usuario = new Usuario();
					$Usuarios = $DBAuxiliar->LerTodosUsuarios();
					foreach($Usuarios as $Usuario){
						?>
                        	<option value="<?php echo $Usuario->id_Usuario; ?>"><?php echo $Usuario->nome_Usuario; ?></option>
                        <?php
					}
				?>           
            	</select>
          </div>    	
    </section>
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data *</span>
 			 <input id="dt_Reuniao" type="date" class="form-control" placeholder="Data da Reunião" aria-describedby="basic-addon1">
		</div>    	
    </section>
</section>
<br>
<br>
<section class="row formAdiconarDados"> 
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Hora *</span>
 			<input id="hora_Reuniao" type="time" class="form-control" placeholder="Hora da Reunião" aria-describedby="basic-addon1">
		</div>    	
    </section>
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Local *</span>
 			<input id="local_Reuniao" type="text" class="form-control" placeholder="Local da Reunião" aria-describedby="basic-addon1">
		</div>
    </section>
</section>

<br>
<br>

<section class="row formAdiconarDados" >
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Pauta *</span>
 			<input id="pauta_Reuniao" type="text" class="form-control" placeholder="Pauta da Reunião" aria-describedby="basic-addon1">
		</div>
    </section>
</section>

<br>
<br>

<section>
	<form action="envia_foto.php" method="post" enctype="multipart/form-data"> <input type="file" name="Arquivo" id="Arquivo"><br><input type="reset" value="Apagar"> </form>
</section>

<br>

<li>*: campo de preenchimento obrigatório.</li>