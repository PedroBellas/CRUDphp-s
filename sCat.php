<?php
	
	require_once ('classes\Categoria.php');
	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" /> 
		<title>Salvar categoria</title> 
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
			<span>Nome:</span>
			<input type="text" name="txtNome" id="txtNome" required="required" maxlength="64">
			<span>Categoria Pai:</span>
			<select name="cmbPai" id="cmbPai">
				<option value="0">Nenhuma categoria</option>
				<?php

					$cat = Categoria::listAll();

					foreach ($cat as $row) {
						echo "<option value='" . $row['id_categoria'] . "'>" . $row['nm_categoria'] . "</option>";
					}

				?>
			</select>
			<span>Status:</span>
			<input type="number" name="txtStatus" id="txtStatus" required="required">
			<button type="submit" id="cadastrar">Cadastrar</button>
		</form>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/ajax/categoria/saveCategoria.js"></script>
	</body>
</html>