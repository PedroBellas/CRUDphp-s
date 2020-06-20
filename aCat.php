<?php

	require_once ('classes\Categoria.php');

	$cat = new Categoria();

	$cat->setData(array(
		"id_categoria"=>$_GET["cod"]
	));

	$resultSet = $cat->researchCategoria();

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
		<form method="post" id="form" class="form">
			<?php
				echo "<input type='hidden'  name='cod' id='cod' value='" . $_GET['cod'] . "'>";
			?>
			<span>Nome:</span>
			<?php
				echo "<input type='text' name='txtNome' id='txtNome' required='required' maxlength='64' value='" . $resultSet["nm_categoria"] . "'>";
			?>
			<span>Categoria Pai:</span>
			<select name="cmbPai" id="cmbPai">
				<option value="0">Nenhuma categoria</option>
				<?php

					$results = $cat->list();

					foreach ($results as $row) {
						echo "<option value='" . $row['id_categoria'] . "'>" . $row['nm_categoria'] . "</option>";
					}

					unset($results);

				?>
			</select>
			<span>Status:</span>
			<?php
				echo "<input type='number' name='txtStatus' id='txtStatus' required='required' value='" . $resultSet["st_categoria"] . "'>";

				if(!count($resultSet) == 0){

					echo "<button type='submit' id='cadastrar'>Atualizar</button>";

				}else{

					header("Location: index.php");
					exit;

				}

			?>
		</form>

		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/ajax/categoria/attCategoria.js"></script>
	</body>
</html>