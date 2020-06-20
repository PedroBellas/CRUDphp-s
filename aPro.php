<?php

	require_once ('classes\Categoria.php');
	require_once ('classes\Produto.php');

	$prod = new Produto();

	$prod->setData(array(
		"id_produto"=>$_GET["cod"]
	));

	$resultSet = $prod->list();



?>

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
			<?php
				echo "<input type='hidden' name='cod' id='cod' value='" . $_GET['cod'] . "'>";
			?>
			<span>Codigo:</span>
			<?php
				echo "<input type='text' name='txtCodigo' id='txtCodigo' maxlength='32' value='" . $resultSet["cd_produto"] . "'>";
			?>
			<span>Descrição total: *</span>
			<?php
				echo "<input type='text' name='txtDesc' id='txtDesc' required='required' maxlength='1000' value='" . $resultSet["ds_produto"] . "'>";
			?>
			<span>Descrição Curta:</span>
			<?php
				echo "<input type='text' name='txtDescPequena' id='txtDescPequena' maxlength='150' value='" . $resultSet["ds_curta_produto"] . "'>";
			?>
			<span>Nome: *</span>
			<?php
				echo "<input type='text' name='txtNome' id='txtNome' required='required' maxlength='100' value='" . $resultSet["nm_produto"] . "'>";
			?>
			<span>Amigavel:</span>
			<?php
				echo "<input type='text' name='txtAmigavel' id='txtAmigavel' maxlength='128' value='" . $resultSet["amigavel"] . "'>";
			?>
			<span>Valor do Produto: *</span>
			<?php
				echo "<input type='text' name='txtValor' id='txtValor' required='required' value='R$" . $resultSet["vl_produto"] . "'>";
			?>
			<span>Quantidade de produto: *</span>
			<?php
				echo "<input type='number' name='txtQuantidade' id='txtQuantidade' required='required' value='" . $resultSet["qt_produto"] . "'>";
			?>
			<span>Valor de envio:</span>
			<?php
				echo "<input type='number' name='txtValorEnvio' id='txtValorEnvio' value='" . $resultSet["vl_envio"] * 100 . "'>";
			?>
			<span>Valor da taxa:</span>
			<?php
				echo "<input type='number' name='txtValorTaxa' id='txtValorTaxa' value='" . $resultSet["vl_taxa"] * 100 . "'>";
			?>
			<span>Extra:</span>
			<?php
				echo "<input type='text' name='txtExtra' id='txtExtra' maxlength='1000' value='" . $resultSet["extra"] . "'>";
			?>
			<span>Status: *</span>
			<?php
				echo "<input type='number' name='txtStatus' id='txtStatus' required='required' value='" . $resultSet["st_produto"] . "'>";
			?>
			<span>Categoria:</span>
			<select name="cmbCat" id="cmbCat">
				<option value="0">Nenhuma</option>
				<?php

					$cat = Categoria::listAll();

					foreach ($cat as $row) {

						echo "<option value='" . $row['id_categoria'] . "'>" . $row['nm_categoria'] . "</option>";

					}

					unset($cat);

				?>
			</select>
			<?php

				if(!count($resultSet) == 0){

					echo "<button type='submit' id='cadastrar'>Atualizar</button>";

				}else{

					header("Location: index.php");
					exit;

				}

			?>
		</form>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/ajax/produto/attProduto.js"></script>
	</body>
</html>