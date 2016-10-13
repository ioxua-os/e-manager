<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<?php 
		session_start();

		require 'php/conf.php';
	?>

	<head>

		<link rel="stylesheet" type="text/css" href="css/drive.css">
		<link rel="stylesheet" type="text/css" href="lib/jQueryFileTree.min.css">

		<link rel="shortcut icon" href="img/icone.png" >

		<!-- https://github.com/jqueryfiletree/jqueryfiletree -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
        <script type="text/javascript" src="lib/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="lib/jQueryFileTree.min.js"></script>
        <script type="text/javascript" src="lib/modernizr.js"></script>

		<title>Etec drive</title>

		<script>
			$(document).ready( function() {
				$("#uploader").submit(function(event) {
					event.preventDefault();
					
					var formData = new FormData(this);
					
					$.ajax({
						type: 'POST',
						url: 'php/carregar_arquivo.php',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
					})
					.done(function(retorno) {
						console.log("SUCESSO");
						console.log(retorno);
					})
					.fail(function(detalhes) {
						console.log("FALHA");
						console.log(detalhes);
					})
					.always(function(retorno) {
						console.log("SEMPRE");
						console.log(retorno);
						//location.reload(true);
						atualizarLista();
					});
				});

				$(".trilha").click(function(trilha) {
					trilha.preventDefault();
					var quantidade = 0;
					$(".trilha").each(function() {
						quantidade++;
					});
					
					if(trilha.target.getAttribute("posicao") != quantidade) {
						console.log("ESSE AKI NN EH O ULTIMO");
					}
				});

				if(!Modernizr.adownload) {

				}

				atualizarLista();
			} );
			
			function atualizarLista() {
				console.log("RODOU");
				$("#lista-arquivos").html("");
				$("#lista-arquivos").attr('class', '');
				$("#lista-arquivos").fileTree({
					root: "<?php print "/ETECDrive/arquivos-upload/". $_SESSION['caminhoatual'] ?>",
					script: 'lib/connectors/jqueryFileTree.php',
					loadMessage: 'Carregando..',
					multiFolder: false
				})
				.on('filetreeclicked', function(event, elem) {
					if(!elem.value.includes('.')) { // É PASTA
						$.ajax({
							type: 'POST',
							url: 'php/navegar.php',
							data: {
								caminho: elem.value + '/'
							}
						})
						.always(function() {
							console.log("CLICOU!");
							atualizarLista();
							//location.reload(true);
						});
					}
					else { // ARQUIVO
						$.ajax({
							type: 'POST',
							url: 'php/salvar_arquivo.php',
							data: {
								caminho: elem.value + '/'
							}
						})
						.always(function() {
							console.log("SUCESSO");
							location.reload(true);
						});
					}
				});

				$("#btnNovo").click(function(evt) {
					$("#modalItens").show();
					$("#modalItens").focus();
				});

				//$("#modalItens").focusout(function(evt) {
				$(document).not("#modalItens").focusout(function(evt) {
					console.log("SAIU");
					$("#modalItens").hide();
				})
			}
		</script>

	</head>

	<body id="home">

		<div id="conteudo">

			<div id="cabecalho">

				<img src="img/logoLetra.png" id="logo"/>

				<input name='pesquisa' type='text' placeholder='Buscar pasta' id='txtPesquisa' />

				<input type="submit" id="btnNovo" value="Novo">

				<!-- <form id="uploader" action="php/carregar_arquivo.php" method="POST" enctype="multipart/form-data">
					
					<input name='pesquisa' type='text' placeholder='Buscar pasta' id='txtPesquisa' />

					<input type="submit" id="add" value="">

					<label class="labelInput">
			    		<input type="file" name="fileUpload" required>
			    		<span></span>
					</label>
				
				</form> -->

			</div>	

			<div id="caminho">

				<?php 
					$partes = explode('/', $_SESSION['caminhoatual']);
					$i = 1;
					foreach($partes as $pasta) {
						if($pasta != '') {
							if($pasta == $_SESSION['loginusuario'])
								print "<a href=\"\" class='trilha' posicao={$i}>Meus Arquivos</a>";
							else
								print "<a href=\"\" class='trilha' posicao={$i}>{$pasta}</a>";
							print "<div class=\"divisor\"></div>";
							$i++;
						}
					}
				?>

			</div>

			<div id="modalItens">

				<div id="addPasta">
					<img id="imgAddPasta" src="img/iconPastaPlus.png"/>
					<p>Nova pasta</p>
				</div>

				<hr id="divPasta"/>

				<div id="upPasta">
					<img id="imgUpPasta" src="img/iconPastaUp.png"/>
					<p>Upload de pasta</p>
				</div>

				<div id="upArquivo" onclick="openFiles()">
					<img id="imgUpArquivo" src="img/iconArquivoUp.png"/>
					<form id="uploader" action="php/carregar_arquivo.php" method="POST" enctype="multipart/form-data">
					<label class="labelInput">
			    		<input type="file" id="upFiles" name="fileUpload" required>
			    		<span></span>
					</label>
					</form>
					<p>Upload de arquivo</p>
				</div>

			</div>

			<div id='lista-arquivos'>
				
			</div>

		</div>

		<script type="text/javascript">
			
			function openFiles(){

				$("upFiles").submit();

			}

		</script>

	</body>

</html>