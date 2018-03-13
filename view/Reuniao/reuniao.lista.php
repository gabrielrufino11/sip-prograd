<script>
	$(document).ready(function(e) {
        $('#Atualizar').click(function(e) {
			e.preventDefault();
    		$('#loader').load('view/Reuniao/reuniao.lista.php');	
		});
		$('#Adicionar').click(function(e) {
			e.preventDefault();
    		$('#loader').load('view/Reuniao/reuniao.adicionar.php');	
		});
		$('.EditarItem').click(function(e) {
            e.preventDefault();
			var id_Reuniao = $(this).attr('id');
			$('#loader').load('view/Reuniao/reuniao.editar.php', {id_Reuniao : id_Reuniao});	
        });
		$('.ExcluirItem').click(function(e) {
            e.preventDefault();
			var id_Reuniao = $(this).attr('id');
			if(confirm("Tem certeza que deseja excluir este dado?")){
				$.ajax({
					   url: 'engine/controllers/reuniao.php',
					   data: {
							id_Reuniao : id_Reuniao,
							action: 'delete'
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
								alert('Reunião excluída com sucesso!');
    							$('#loader').load('view/Reuniao/reuniao.lista.php');	
							}
							else{
								alert('Algum erro ocorreu e a remocão pode ter sido mal sucedido.');	
							}
					   },
					   
					   type: 'POST'
					});	
			}
			
        });
		/*	$('#tabelaTurma').DataTable({
			"language": {
				"decimal":        "",
				"emptyTable":     "Nenhum dado disponível para exibição",
				"info":           "Mostrando _START_ de _END_ de _TOTAL_ resultados",
				"infoEmpty":      "Mostrando 0 de 0 de 0 resultados",
				"infoFiltered":   "(filtrado de _MAX_ resultados)",
				"infoPostFix":    "",
				"thousands":      ",",
				"lengthMenu":     "Mostrando _MENU_ resultados",
				"loadingRecords": "Carregando...",
				"processing":     "Processando...",
				"search":         "Buscar:",
				"zeroRecords":    "Nenhum resultado encontrado",
				"paginate": {
					"first":      "Primeiro",
					"last":       "Último",
					"next":       "Próximo",
					"previous":   "Anterior"
				},
				"aria": {
					"sortAscending":  ": ativar ordenação crescente",
					"sortDescending": ": ativar ordenação decrescente"
				}
			}
		
		});*/
    });
</script>

<?php
	require_once "../../engine/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Gerenciamento</a></li>
    <li class="active">Reunião</a></li>
    <li class="active">Lista de Reuniões Cadastradas</li>
</ol>

<br>
<h1 align="center">
	Minhas Reuniões
</h1>

<br>
<br>

<div class="container">

<div class="btn-group" role="group"  aria-label="...">
	<button id="Atualizar" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
    	Atualizar
    </button>
	<button id="Adicionar" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    	Adicionar Dados
    </button>
</div>

<br>
<br>

<?php
	$Reunioes = new Reuniao();
	$Reunioes = $Reunioes->ReadAll();
	
	//var_dump($Reuniao);

	if(empty($Reunioes)){
		?>
        	<section class="well">
            	<h4>Nenhum dado encotrado.</h4>
            </section>
        <?php
	}
	else{
		?>
            <table class="table text-striped table-hover" id="tabelaReuniao">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Participantes</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Local</th>
                        <th>Pauta</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						$num = 0;
                    	foreach($Reunioes as $Reuniao){
							$n++;
							//var_dump($Reuniao);
					?>    
                    <tr>
                        <td><?php echo $n ?></td>
                        <td><?php 
								$Usuario = new Usuario();
								$Usuario = $Usuario->Read($Reuniao['id_Usuario']);
								foreach($Usuarios as $Usuario){
									echo $Usuario['nome_Usuario'];
								}
							?></td>
                        <td><?php echo $Reuniao['dt_Reuniao']; ?></td>
                        <td><?php echo $Reuniao['hora_Reuniao']; ?></td>
                        <td><?php echo $Reuniao['local_Reuniao']; ?></td>
                        <td><?php echo $Reuniao['pauta_Reuniao']; ?></td>
                        <td class="align-center " >
                        	<button type="button" class="btn btn-warning EditarItem" id="<?php echo $Reuniao['id_Reuniao']; ?>">
                            	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
    							Editar
    						</button>
                        </td>
                       <td class="align-center" >
                        	<button type="button" class="btn btn-danger btnExcluir ExcluirItem" id="<?php echo $Reuniao['id_Reuniao']; ?>">
                            	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    							Deletar
    						</button>
                        </td>
                        
                    </tr>
                    <?php
						}
					?>   
                </tbody>    
            </table>
		<?php	
    }
	?>

	</div>