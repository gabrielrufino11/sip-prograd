<script>
	$(document).ready(function(e) {

		var config = {
				'.chosen-select'           : {width:"100%", no_results_text:'Nenhum Morador com nome'},
				'.chosen-select-deselect'  : {allow_single_deselect:true},
				'.chosen-select-no-single' : {disable_search_threshold:10},
				'.chosen-select-no-results': {no_results_text:'Nenhum Morador com nome'},
				'.chosen-select-width'     : {width:"100%"}
			}
			for (var selector in config) {
				$(selector).chosen(config[selector]);
			}

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
			var hora_Reuniao	= $('#hora_Reuniao').val();
			var local_Reuniao = $('#local_Reuniao').val();
			var pauta_Reuniao = $('#pauta_Reuniao').val();
			/*console.log('id_Reuniao '+id_Reuniao);
			console.log('id_Usuario '+id_Usuario);
			console.log('dt_Reuniao '+dt_Reuniao);
			console.log('hora_Reuniao '+hora_Reuniao);
			console.log('local_Reuniao '+local_Reuniao);
			console.log('pauta_Reuniao '+pauta_Reuniao);*/
			
			
			
			//2 validar os inputs
			if(id_Reuniao === "" || id_Usuario === "" || dt_Reuniao === "" || hora_Reuniao === "" || local_Reuniao === "" || pauta_Reuniao === ""){
				return alert('Todos os campos com asterisco (*) devem ser preenchidos!!');
			}
			else{
				$.ajax({
					   url: 'core/controle/reuniao.php',
					   data: {
							id_Reuniao : id_Reuniao,
							id_Usuario : id_Usuario,
							dt_Reuniao : dt_Reuniao,
							hora_Reuniao : hora_Reuniao,
							local_Reuniao : local_Reuniao,
							pauta_Reuniao : pauta_Reuniao,
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
						var data = $.parseJSON(data);
					
							if(typeof data.id_Reuniao != "undefined"){
				
								ids_usuarios=$("#id_Usuario").chosen().val();

								for(var i=0;i<ids_usuarios.length;i++){
									updateUsuario(ids_usuarios[i],data);
								}

								alert('Reunião atualizada com sucesso!');
								$('#loader').load('view/Reuniao/reuniao.lista.php');
							}
							else{
								alert('Algum erro ocorreu e a ediçao pode ter sido mal sucedida.');	
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
			
			var id_Reuniao = $('#id_Reuniao').val();
			//alert(id);
			if (confirm("Tem certeza que deseja excluir?")){
				$.ajax({
					   url: 'engine/controllers/reuniao.php',
					   data: {
							id_Reuniao : id_Reuniao,
							action: 'delete'
					   },

					   error: function() {
							alert('Erro na conexão com o servidor. Tente novamente em alguns segundos.');
					   },
					   success: function(data) {
							console.log(data);
							if($.trim(data) === 'true'){
								alert('Reunião excluída com sucesso!');
								$('#loader').load('view/Reuniao/reuniao.lista.php');
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
	
	$(".chosen-select").chosen();
	$("#id_Usuario").chosen().val();
	$("#meet_participants").chosen().val(["hola", "mundo", "cruel"]);
</script>

<?php
	require_once "../../engine/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Gerenciar</a></li>
    <li class="active">Reunião</a></li>
    <li class="active">Editar Dados</li>
</ol>

<h1 align="center">
	Edição de Reunião
</h1>

<br>

<div class="container">

<div class="btn-group" role="group"  aria-label="...">
	<button id="Voltar" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    	Minhas Reuniões
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
	$Reuniao = new Reuniao();
	$Reuniao = $Reuniao->Read($_POST['id_Reuniao']);
?>
<section class="row formAdiconarDados">
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Participantes *</span>
 			<select id="id_Usuario" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
            	<option value="0">Escolha o participante</option>
                <?php
					$Usuario = new Usuario();
					$Usuarios = $Usuario->ReadAll();
					if(!empty($Usuarios)) {
					foreach($Usuarios as $Usuario){
						?>
                        	<option value="<?php echo $Usuario['id_Usuario']; ?>" <?php if($Usuario['id_Reuniao'] === $Reuniao['id_Reuniao']){echo 'selected';} ?>><?php echo $Usuario['nome_Usuario']; ?></option>
                        <?php
					} }
				?>         
            </select>
		</div>    	
    </section>
    
	<section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Data *</span>
 			<input type="date" class="form-control" id="dt_Reuniao" aria-describedby="basic-addon1" placeholder="" value="<?php echo $Reuniao['dt_Reuniao'];?>">
		</div>
    </section>
</section>
<br>
<br>
<section class="row formAdiconarDados">   
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Hora *</span>
 			<input type="time" class="form-control" id="hora_Reuniao" aria-describedby="basic-addon1" placeholder="" value="<?php echo $Reuniao['hora_Reuniao'];?>">
		</div>
    </section>
    
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Local *</span>
 			<input type="text" class="form-control" id="local_Reuniao" aria-describedby="basic-addon1" placeholder="" value="<?php echo $Reuniao['local_Reuniao'];?>">
		</div>
    </section>
</section>

<br>
<br>

<section class="row formAdiconarDados" >
    <section class="col-md-6">
    	<div class="input-group">
  			<span class="input-group-addon" id="basic-addon1">Pauta *</span>
 			<input id="pauta_Reuniao" type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" width="30" value="<?php echo $Reuniao['pauta_Reuniao']; ?>">
		</div>
    </section>
</section>

<br>
<br>

<section>
	<form action="envia_foto.php" method="post" enctype="multipart/form-data"> <input type="file" name="Arquivo" id="Arquivo"><br><input type="reset" value="Apagar"> </form>
</section>

<input type="hidden" id="id_Reuniao" value="<?php echo $Reuniao['id_Reuniao'];?>">

<br>

<li>*: campo de preenchimento obrigatório.</li>

</div> 