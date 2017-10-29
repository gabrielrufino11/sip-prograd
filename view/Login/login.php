<?php session_start();
	if(!empty($_SESSION)){
		switch ($_SESSION['type']){
		 	case 'usuario':
			?>
			<script>$('#loader').load('index.php');</script>
			<?php
			break;	
			
			case 'administrador':
			?>
			<script> $('#loader').load('index.php'); </script>
			<?php
            break;
		}
	}
    
 ?>

<script>

	$(document).ready(function(e) {
		$('#Voltar').click(function(e) {
			e.preventDefault();
			//loader
    		$('#loader').load('index.php');
		});
	});

</script>

    <br>
    <img src="images/Image001.png" width="300" height="150" class="center-block">
	<br>
	<h1 style="font-family:'Times New Roman', Times, serif" align="center">
	Entrar
	</h1>
	
    <br>
    
    <br>
    
    <main class="container-fluid" id="loader_login">
	<div class="row" align="center">
    	<div class="col-sm-4 input-group" class="float-none">
  			<span class="input-group-addon" id="basic-addon1">Nome de Usuário *</span>
 			<input id="usuario_login" type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
		</div>
        <br>
        <div class="col-sm-4 input-group">
  			<span class="input-group-addon" id="basic-addon1">Senha *</span>
            <input type="password" class="form-control" id="senha_login" placeholder="Senha" aria-describedby="basic-addon1">
		</div>
        <br>

        <br>
        
        <div class="container" role="group"  aria-label="...">
        <button class="btn btn-success" id="Logar">Entrar</button>
        <li style="font-family:Georgia, 'Times New Roman', Times, serif"><a href="view/Login/senha.php">Esqueci minha senha.</a></li>
		</div>
    </div>
    
    <br><br>

  	</main>

    <script src="js/login.js"></script>