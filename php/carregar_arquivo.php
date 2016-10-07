<?php
	function reArrayFiles(&$file_post) { // http://php.net/manual/pt_BR/features.file-upload.multiple.php
	    $file_ary = array();
	    $file_count = count($file_post['name']);
	    $file_keys = array_keys($file_post);

	    for ($i = 0; $i < $file_count; $i++) {
	        foreach ($file_keys as $key) {
	            $file_ary[$i][$key] = $file_post[$key][$i];
	        }
	    }

	    return $file_ary;
	}

	function getMsgErro($num) { 
		$phpFileUploadErrors = array(
		    0 => 'Arquivo carregado com sucesso',
		    1 => 'O tamanho do arquivo é maior do que a diretriz upload_max_filesize em php.ini',
		    2 => 'O tamanho do arquivo é maior do que a diretriz MAX_FILE_SIZE especificada no formulário HTML',
		    3 => 'O arquivo foi apenas parcialmente carregado',
		    4 => 'Nenhum arquivo foi carregado',
		    6 => 'Diretório temporário não existe',
		    7 => 'Falha na escrita em disco',
		    8 => 'Uma extensão PHP encerrou o carregamento do arquivo',
		);
		return $phpFileUploadErrors[$num];
	}

	require 'conf.php';

	$nomeInput = 'fileUpload';
	$extensoesPermitidas = array();

	if(isset($_FILES[$nomeInput])) {
		session_start();

		$arquivos = reArrayFiles($_FILES['$nomeInput']);

		foreach($arquivos as $arquivo) {
			$dir = Configuracoes::DIRETORIO_UPLOAD_BASE + 'ioxua/';//$_SESSION['loginusuario'] + '/';

			if($arquivo['error'] == 0) {
				$data = date('d.m.Y-H.i.s'); // POSSUI EXATOS 19 DE TAMANHO!
				$novoNome = $data. '_'. $arquivo['name']; // NOME JÁ CONTÉM A EXTENSÃO!

				$size = $arquivo['size']; // ATUALIZAR O TOTAL ARMAZENADO NO BANCO E LIMITAR

				move_uploaded_file($arquivo['tmp_name'], $dir. $novoNome);
			}
			else
				echo json_encode( array( 'sucesso' => 'false', 'mensagem' => getMsgErro( $arquivo['error'] ) ) );
		}
	}
	else
		echo json_encode( array('sucesso' => 'false', 'mensagem' => 'Nenhum arquivo selecionado!') );