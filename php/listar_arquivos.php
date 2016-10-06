<?php
	function getExtensao($nome) {
		$lastindex = strrpos($nome, '.');
		return substr($nome, $lastindex + 1);
	}

	function getFileType($extension) {
	    $imagem = array('jpg', 'gif', 'png', 'bmp', 'tif', 'tiff', 'jpeg');
	    $texto = array('txt', 'rtf', 'doc', 'docx');
	    $compactado = array('zip', 'rar');
	    $executavel = array('exe', 'bat');
	    $apresentacao = array('ppt', 'pptx');
	    $tabela = array('xls', 'xlsx');
	    $impressao = array('pdf')
	     
	    if(in_array($extension, $images)) return "imagem";
	    else if(in_array($extension, $texto)) return "texto";
	    else if(in_array($extension, $compactado)) return "compactado";
	    else if(in_array($extension, $executavel)) return "executavel";
	    else if(in_array($extension, $apresentacao)) return "apresentacao";
	    else if(in_array($extension, $tabela)) return "tabela";
	    else if(in_array($extension, $impressao)) return "impressao";
	    return "";
	}

	// VAI RETORNAR UM OBJETO JSON COM OS ARQUIVOS OU O HTML²
	$htmlArquivos = "";

	require 'conf.php';
	start_session();

	$caminho = Configuracoes::DIRETORIO_UPLOAD_BASE. $_SESSION['loginusuario']. '/';
	$diretorio = opendir($caminho);
	$listaArquivos = array();

	while(($arquivo = readdir($diretorio)) !== false) {
		if($arquivo != '.' && $arquivo != '..') {
			$nomeArquivo = $caminho. $arquivo;
			$tamanho = filesize($nomeArquivo);
			$partes = explode('_', $arquivo, 2);
			$data = $partes[0];
			$nomeOriginal = $partes[1];
			$extensao = getExtensao($arquivo);
			$tipoArquivo = getFileType($extensao);

			// VC PODE FAZER O QUE QUISER COM ESSAS INFORMAÇÕES AGR
		}
	}

	closdir($diretorio);