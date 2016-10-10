<?php
	$nomeArquivo = $_POST['nomeArquivo'];

	if(is_file($nomeArquivo)) {
		if(ini_get('zlib.output_compression')) 
			ini_set('zlib.output_compression', 'Off');
		switch(strtolower(substr(strrchr($file_name, '.'), 1))) {
			case 'pdf': 
				$mime = 'application/pdf'; 
				break;
			case 'zip': 
				$mime = 'application/zip'; 
				break;
			case 'jpeg':
			case 'jpg': 
				$mime = 'image/jpg'; 
				break;
			default: 
				$mime = 'application/force-download'; 
				break;
		}

		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

		/*header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
		header('Cache-Control: private', false);*/

		header('Content-Type: '. $mime);
		/*header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");*/
		header("Content-Disposition: attachment;filename=\"". $nomeArquivo. "\"");
		header('Content-Length: '.filesize($file_name));
		header("Content-Transfer-Encoding: binary ");

		readfile($nomeArquivo);
	}