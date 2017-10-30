<?php session_start();

	require_once "../config.php";
	
	
	//1. Receber os dados do form
	$email = $_POST['email'];
	$senha = $_POST['senha'];


	$res;

	//2. Validar os dados


	if ($option === 'professor'){
			$user = new Professor();
			$user = $user->ReadByEmail($email);
		if($user === NULL){
			$res = "no_user_found";
			session_destroy();
		}
		else{
			$verificaEmail = strcmp($email,$user['email_Professor']);
			if($verificaEmail === 0){
				$verificaSenha = strcmp($senha,$user['senha_Professor']);
				if($verificaSenha === 0){
	
					$_SESSION['id_user'] = $user['id_Professor'];
					$_SESSION['name_user'] = $user['nome_Professor'];
					$_SESSION['type'] = "professor";
					$res = "true";
				}
				else{
					$res = "wrong_password";
					session_destroy();
				}
			}
			else{
				$res = "wrong_user_found";
				session_destroy();
			}
		}
	
		echo json_encode($res);
		
	}
	
	if ($option === 'aluno'){
		
	$user = new Aluno();
	$user = $user->ReadByEmail($email);

		if($user === NULL){
			$res = "no_user_found";
			session_destroy();
		}
		else{
			$verificaNome = strcmp($email,$user['nome_Aluno']);
			if($verificaNome === 0){
				$verificaSenha = strcmp($senha,$user['senha_Aluno']);
				if($verificaSenha === 0){
	
					$_SESSION['id_user'] = $user['id_Aluno'];
					$_SESSION['name_user'] = $user['nome_Aluno'];
					$_SESSION['type'] = "aluno";
					$res = "true";
				}
				else{
					$res = "wrong_password";
					session_destroy();
				}
			}
			else{
				$res = "wrong_user_found";
				session_destroy();
			}
		}
	
		//echo $res;
		echo json_encode($res);
		
	}

?>

