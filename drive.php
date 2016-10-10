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
        <script type="text/javascript" src="lib/mordenizr.js"></script>

		<title>Etec drive</title>

		<script>
			$(document).ready( function() {
				var atualizarLista = function() {
					console.log("RODOU");
					$("#lista-arquivos").fileTree({
						root: '<?php print "/ETECDrive/arquivos-upload/". $_SESSION['loginusuario']. "/" ?>',
						script: 'lib/connectors/jqueryFileTree.php',
						loadMessage: 'Carregando..',
						multiFolder: false
					},
					function(arquivo) {
						console.log("CLICOU EM " + arquivo);
						$.ajax({
							type: 'POST',
							url: 'php/salvar_arquivo.php',
							dataType: 'json',
							data: {
								nomeArquivo: arquivo
							},
							encode: true
						})
						.done(function(retorno) {
							console.log(retorno);
							if(retorno.sucesso == true)
								$("#lista-arquivos").html("");
							else
								console.log("MENSAGEM DONE: " + retorno.mensagem);
						})
						.fail(function(detalhes) {
							console.log(detalhes);
						});

					});
				};

				$("#uploader").submit( function(evt) {
					evt.preventDefault();

					var formData = new FormData(this);
					console.log($(this));
					$.ajax({
						type: 'POST',
						url: 'php/carregar_arquivo.php',
						dataType: 'json',
						processData: false,
						contentType: false,
						data: formData,
						encode: true
					})
					.done(function(retorno) {
						console.log(retorno);
						if(retorno.sucesso == true)
							$("#lista-arquivos").html("");
						else
							console.log("MENSAGEM DONE: " + retorno.mensagem);
					})
					.fail(function(detalhes) {
						console.log(detalhes);
					});
				} );


				if(!Modernizr.adownload) {

				}

				atualizarLista();
			} );
		</script>

	</head>

	<body id="home">

		<div id="conteudo">

			<div id="cabecalho">

				<img src="img/logoLetra.png" id="logo"/>

				<form id="uploader" action="php/carregar_arquivo.php" method="POST" enctype="multipart/form-data">
					
					<input type="submit" id="add" value="">

					<label class="labelInput">
			    		<input type="file" name="fileUpload" required>
			    		<span></span>
					</label>
				
				</form>

			</div>	

			<input name='pesquisa' type='text' placeholder='Buscar pasta' id='txtPesquisa' />

			<div id='lista-arquivos'>
				
			</div>

		</div>

	</body>


</html>