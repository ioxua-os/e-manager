<?php
	class Configuracoes {
		const NOME_SERVIDOR = 'localhost',
			USUARIO_SERVIDOR = 'root',
			SENHA_SERVIDOR = '',
			NOME_BANCO = 'bdemanager',
			LOCAL_DE_USO = 'SP',
			DIRETORIO_UPLOAD_BASE = '../arquivos-upload/',
			CRIPTOGRAFIA = ''; // http://www.php.net/manual/en/function.hash.php

		// UTILITY VARIABLES
		const TIMEZONES = array(
			'AC' => 'America/Rio_branco',   'AL' => 'America/Maceio',
			'AP' => 'America/Belem',        'AM' => 'America/Manaus',
			'BA' => 'America/Bahia',        'CE' => 'America/Fortaleza',
			'DF' => 'America/Sao_Paulo',    'ES' => 'America/Sao_Paulo',
			'GO' => 'America/Sao_Paulo',    'MA' => 'America/Fortaleza',
			'MT' => 'America/Cuiaba',       'MS' => 'America/Campo_Grande',
			'MG' => 'America/Sao_Paulo',    'PR' => 'America/Sao_Paulo',
			'PB' => 'America/Fortaleza',    'PA' => 'America/Belem',
			'PE' => 'America/Recife',       'PI' => 'America/Fortaleza',
			'RJ' => 'America/Sao_Paulo',    'RN' => 'America/Fortaleza',
			'RS' => 'America/Sao_Paulo',    'RO' => 'America/Porto_Velho',
			'RR' => 'America/Boa_Vista',    'SC' => 'America/Sao_Paulo',
			'SE' => 'America/Maceio',       'SP' => 'America/Sao_Paulo',
			'TO' => 'America/Araguaia',    
		);
		
		const MIMES = array(
			'exe' => 'application/octet-stream',		'doc' => 'application/msword',
			'php' => 'text/plain',						'txt' => 'text/plain',
			'html' => 'text/html', 						'htm' => 'text/html',
			'pdf' => 'application/pdf',					'xls' => 'application/vnd.ms-excel',
			'ppt' => 'application/vnd.ms-powerpoint',	'zip' => 'application/zip',
			'gif' => 'image/gif',						'png' => 'image/png',
			'jpeg' => 'image/jpg',						'jpg' => 'image/jpg',
		);

		public static function criptografar($valor) {
			if(self::CRIPTOGRAFIA === '')
				return $valor;
			return hash(self::CRIPTOGRAFIA, $valor);
		} 
	}

	$timezones = Configuracoes::TIMEZONES;

	if(date_default_timezone_get() != $timezones[Configuracoes::LOCAL_DE_USO])
		date_default_timezone_set($timezones[Configuracoes::LOCAL_DE_USO]);