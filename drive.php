<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<?php 
		session_start();

		include 'php/conf.php';
	?>

	<head>

		<link rel="stylesheet" type="text/css" href="css/drive.css">
		<link rel="stylesheet" type="text/css" href="lib/jQueryFileTree.min.css">

		<link rel="shortcut icon" href="img/icone.png" >

		<!-- https://github.com/jqueryfiletree/jqueryfiletree -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="lib/jQueryFileTree.min.js"></script>

		<title>Etec drive</title>

		<script>
			$(document).ready( function() {
				$("#lista-arquivos").fileTree({
					root: '<?php print "/ETECDrive/arquivos-upload/". $_SESSION['loginusuario']. "/" ?>',
					script: 'lib/connectors/jqueryFileTree.php',
					loadMessage: 'Carregando..',
					multiFolder: false
				},
				function(arquivo) {
					console.log("CLICOU EM " + arquivo);
				});
			} );
		</script>

	</head>

	<body id="home">

		<div id="conteudo">

			<div id="cabecalho">

				<img src="img/logoLetra.png" id="logo"/>

				<a href=""><img src="img/btnPlus.png" id="add"></a>

			</div>	

			<input name='pesquisa' type='text' placeholder='Buscar pasta' id='txtPesquisa' />

			<!-- TODO COMO CARVALHOS VMS MOSTRAR OS COISOS? -->
			<form action="php/carregar_arquivo.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="fileUpload">
				<input type="submit" value="Enviar">
			</form>

			<div id='lista-arquivos'>
				
			</div>

		</div>

	</body>


</html>