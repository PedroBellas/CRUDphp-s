<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" /> 
		<title>Anatomia HTML</title> 
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
	</head>
	<body> 
		<div class="area-cadastro">
			<nav>
				<a href="index.php">Voltar</a>	
			</nav>
		</div>
		<div id="menssage" class="menssage"></div>
		<form method="post" id="form_cadastro" class="form">
			<span>Codigo:</span>
			<input type="text" name="txtCodigo" id="txtCodigo" maxlength="32">
			<span>Descrição total: *</span>
			<input type="text" name="txtDesc" id="txtDesc" required="required" maxlength="1000">
			<span>Descrição Curta:</span>
			<input type="text" name="txtDescPequena" id="txtDescPequena" maxlength="150">
			<span>Nome: *</span>
			<input type="text" name="txtNome" id="txtNome" required="required" maxlength="100">
			<span>Amigavel:</span>
			<input type="text" name="txtAmigavel" id="txtAmigavel" maxlength="128">
			<span>Valor do Produto: *</span>
			<input type="text" name="txtValor" id="txtValor" required="required" value="R$">
			<span>Quantidade de produto: *</span>
			<input type="number" name="txtQuantidade" id="txtQuantidade" required="required">
			<span>Valor de envio:</span>
			<input type="number" name="txtValorEnvio" id="txtValorEnvio" >
			<span>Valor da taxa:</span>
			<input type="number" name="txtValorTaxa" id="txtValorTaxa">
			<span>Extra:</span>
			<input type="text" name="txtExtra" id="txtExtra" maxlength="1000">
			<span>Status: *</span>
			<input type="number" name="txtStatus" id="txtStatus" required="required">
			<span>Categoria:</span>
			<select name="cmbCat" id="cmbCat">
				<option value="0">Nenhuma</option>
				<?php

					require_once ('classes\Categoria.php');

					$cat = Categoria::listAll();

					foreach ($cat as $row) {

						echo "<option value='" . $row['id_categoria'] . "'>" . $row['nm_categoria'] . "</option>";

					}

					unset($cat);

				?>
			</select>
			<button type="submit" id="cadastrar">Cadastrar</button>
		</form>


		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/ajax/produto/saveProduto.js"></script>
	</body>
</html>