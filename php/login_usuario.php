<?php
	require 'conexao_banco.php';

	session_start();
	$conn = abrirConexao();

	$usuario = $_POST['usuario'];
	$senha = Configuracoes::criptografar($_POST['senha']);

	$sql = "SELECT * FROM tbusuario WHERE loginusuario = '". $usuario. "' AND senhausuario = '". $senha. "'";
	$query = mysqli_query($conn, $sql);
	$resultado = mysqli_fetch_array($query);
	if(empty($resultado))// {
		//header("Location:../index.html");
		echo json_encode( array('sucesso' => false, 'mensagem' => 'Login ou senha incorretos!') );
	//}
	else {
		$_SESSION['codusuario'] = $resultado['codusuario'];
		$_SESSION['loginusuario'] = $resultado['loginusuario'];
		$_SESSION['caminhoatual'] = $resultado['loginusuario']. "/";
		echo json_encode( array('sucesso' => true) );
		//header("Location:../home.html");
	}	
?>