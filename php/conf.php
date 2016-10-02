<?php
	class Configuracoes {
		const NOME_SERVIDOR = 'localhost',
			USUARIO_SERVIDOR = 'root',
			SENHA_SERVIDOR = '',
			NOME_BANCO = 'bdemanager',
			LOCAL_DE_USO = 'SP',
			DIRETORIO_UPLOAD_BASE = '../arquivos-upload/';

		if(date_default_timezone_get() != $timezones[self::LOCAL_DE_USO])
			date_default_timezone_set($timezones[self::LOCAL_DE_USO]);

		// UTILITY VARIABLES
		$timezones = array(
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
	}