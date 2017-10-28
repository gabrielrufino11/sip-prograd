<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>SIP</title>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
        <link type="text/css" rel="stylesheet" href="css/sistema_prograd.css"/>
        <link type="text/css" rel="stylesheet" href="css/jquery.dataTables.css"/>
        <link type="text/css" rel="stylesheet" href="css/chosen.css"/>
    </head>
    <body>
	<nav class="navbar navbar-default navbar-fixed-top ">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php" id="">SIP - Sistema de Protocolos</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php" id=""><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> CADASTRO <span class="caret"></span></a>
              <ul class="dropdown-menu">
              	<li><a href="" id="adicionar_protocolo_link">Protocolo</a></li>
                <li><a href="" id="adicionar_tipodocumento_link">Tipo de Documento</a></li>
                <li><a href="" id="adicionar_reuniao_link">Reunião</a></li>
                <li><a href="" id="adicionar_usuario_link">Usuário</a></li>
              </ul>
            </li>
            
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-tasks" aria-hidden="true"></i> GERENCIAMENTO <span class="caret"></span></a>
              <ul class="dropdown-menu">
              	<li><a href="" id="lista_protocolo_link">Meus Protocolos</a></li>
				<li><a href="" id="lista_usuario_link">Usuário</a></li>
                <li><a href="" id="lista_tipodocumento_link">Tipo de Documento</a></li>
                <li><a href="" id="lista_reuniao_link">Minhas Reuniões</a></li>
              </ul>
            </li>
            
            <li><a href="#" id="getout"><i class="fa fa-sign-out" aria-hidden="true"></i> SAIR </a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
    <main class="container-fluid" id="loader">
     <br><br><br>
    <img src="images/Image001.png" width="400" height="194" class="center-block">
        <br><br><br><br><br><br>
		<div class="btn-group btn-group-justified">
    		<a href="" id="adicionar_protocolo_link" class="btn btn-primary btn-lg">Cadastrar Novo Protocolo</a>
        	<a href="" class="btn btn-primary btn-lg" id="lista_protocolo_link">Meus Protocolos</a>
  			<a href="" class="btn btn-primary btn-lg" id="lista_reuniao_link">Minhas Reuniões</a>
    	</div>
    </main>
   	
    <footer class="protocolofooter">
    	<p class="text-center"> Copyright © PROGRAD UFVJM 2016. Todos os direitos reservados. </p>
    </footer>
	<script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/jquery.mask.js"></script>
	<script src="js/sistema_prograd.js"></script>
	<script src="js/menu.js"></script>
    <script src="js/jquery.dataTables.js"></script>
	<script src="js/moment.js"></script>
   	<script src="js/chosen.jquery.js"></script>
    


</body>
</html>