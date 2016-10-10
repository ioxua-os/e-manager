<?php
	require 'conf.php';
	
	session_start();
	
	$navegacao = $_POST['caminho'];
	
	if($navegacao != '..')
		$_SESSION['caminhoatual'] .= $navegacao;
	else {
		$navegacao = substr($navegacao, 0, strlen($navegacao) - 1);
		$_SESSION['caminhoatual'] = $navegacao;
	}
	
	header('Location:../drive.php');