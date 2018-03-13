<script>
	$(document).ready(function(e) {
        $('#Atualizar').click(function(e) {
			e.preventDefault();
    		$('#loader').load('view/Protocolo/protocolo.lista.php');	
		});
		$('#Adicionar').click(function(e) {
			e.preventDefault();
    		$('#loader').load('view/Protocolo/protocolo.adicionar.php');	
		});
		$('.EditarItem').click(function(e) {
            e.preventDefault();
			var id_Protocolo = $(this).attr('id');
			$('#loader').load('view/Protocolo/protocolo.editar.php', {id_Protocolo : id_Protocolo});	
        });
		$('.ExcluirItem').click(function(e) {
            e.preventDefault();
			var id_Protocolo = $(this).attr('id');
			if(confirm("Tem certeza que deseja excluir este Protocolo?")){
				$.ajax({
					   url: 'engine/controllers/protocolo.php',
					   data: {
							id_Protocolo : id_Protocolo,
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
								alert('Protocolo deletado com sucesso!');
    							$('#loader').load('view/Protocolo/protocolo.lista.php');	
							}
							else{
								alert('Algum erro ocorreu e a remocão pode ter sido mal sucedido.');	
							}
					   },
					   
					   type: 'POST'
					});	
			}
			
        });
		$('#tabelaProtocolo').DataTable({
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
		
		});
    });
</script>

<?php
	require_once "../../engine/config.php";
?>
<br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
    <li class="active">Gerenciamento</a></li>
    <li class="active">Protocolo</a></li>
    <li class="active">Meus Protocolos</li>
</ol>

<br>
<h1 align="center">
	Meus Protocolos
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
	$Protocolos = new Protocolo();
	$Protocolos = $Protocolos->ReadAll();
	
	//var_dump($Protocolo);

	if(empty($Protocolos)){
		?>
        	<section class="well">
            	<h4>Você não possui nenhum Protocolo.</h4>
            </section>
        <?php
	}
	else{
		?>
            <table class="table text-striped table-hover" id="tabelaProtocolo">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Remetente</th>
                        <th>Destinatário</th>
                        <th>Descrição do Teor</th>
						<th>Data de Envio</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						$num = 0;
                    	foreach($Protocolos as $Protocolo){
							$n++;
							//var_dump($Protocolo);
					?>    
                    <tr>
                        <td><?php echo $n ?></td>
                        <td><?php echo $Protocolo['remetente_Protocolo']; ?></td>
                        <td><?php 
								$Usuario = new Usuario();
								$Usuario = $Usuario->Read($Protocolo['id_Usuario']);
								echo $Usuario['nome_Usuario'];
							?>
                        </td>
                        <td><?php echo $Protocolo['descricaoTeor_Protocolo']; ?></td>
						<td><?php echo $Protocolo['dtEnvio_Protocolo']; ?></td>
                        <td class="align-center " >
                        	<button type="button" class="btn btn-warning EditarItem" id="<?php echo $Protocolo['id_Protocolo']; ?>">
                            	<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
    							Editar
    						</button>
                        </td>
                       <td class="align-center">
                        	<button type="button" class="btn btn-danger btnExcluir ExcluirItem" id="<?php echo $Protocolo['id_Protocolo']; ?>">
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