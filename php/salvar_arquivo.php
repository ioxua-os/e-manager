<?php
	require ''/
	$nomeArquivo = '../'. $_POST['nomeArquivo'];

	if(is_file($nomeArquivo)) {
		if(ini_get('zlib.output_compression')) 
			ini_set('zlib.output_compression', 'Off');
		
		$ext = strtolower(substr(strrchr($file_name, '.'), 1));
		if(in_array($ext, Configuracoes::MIMES))
			$mime = Configuracoes::MIMES[$ext];
		else
			$mime = 'application/force-download';

		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

		/*header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
		header('Cache-Control: private', false);*/

		header('Content-Description: File Transfer');
		header('Content-Type: '. $mime);
		/*header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");*/
		header("Content-Disposition: attachment;filename=\"". $nomeArquivo. "\"");
		header('Content-Length: '. filesize($file_name));
		header("Content-Transfer-Encoding: binary ");

		ob_clean();
		flush();
		
		echo readfile($nomeArquivo);
		
		header('Location:../drive.php');
	}