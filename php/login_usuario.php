<?php
	$usuario = $_POST['loginUsuario'];
	$senha = $_POST['senhaUsuario'];

	include('conexao_banco.php');
	$conn = abrirConexao();

	$sql = "SELECT * FROM tbusuario WHERE loginusuario = '". $usuario. "' AND senhausuario = '". $senha. "'";
	$query = mysqli_query($conn, $sql);
	$resultado = mysqli_fetch_array($query);
	if(empty($resultado))// {
		//header("Location:../index.html");
		echo json_encode( array('sucesso' => 'false', 'mensagem' => 'Login ou senha incorretos!') );
	//}
	else {
		session_start();
		$_SESSION['codusuario'] = $resultado['codusuario'];
		echo json_encode( array('sucesso' => 'true') );
		//header("Location:../home.html");
	}	
?>