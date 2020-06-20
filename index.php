<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" /> 
		<title>Anatomia HTML</title> 
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
	</head>
	<body> 

		<!--Area da Categoria-->
		<div class="area-cadastro">
			<nav>
				<a href="sCat.php" class="tittle-cadastro">Cadastrar Categoria</a>
			</nav>
		</div>
		<section id="categoria" class="list-itens">
			<?php

				require_once ('classes\Categoria.php');

				$cat = Categoria::listAll();

				foreach ($cat as $value) {
					echo "<div>	
							<span>" . $value['nm_categoria'] . "</span>
							<a class='att-item' href='aCat.php?cod=" . $value["id_categoria"] . "'>
								<span>Att</span>
							</a>
							<a class='del-item' href='dCat.php?cod=" . $value["id_categoria"] . "'>
								<span>Del</span>
							</a>
						</div>";
				}

				unset($value, $cat);

			?>			
		</section>

		<!--Area do produto-->
		<div class="area-cadastro">
			<nav>
				<a href="sPro.php">Cadastrar Produto</a>	
			</nav>
		</div>
		<section id="produto" class="list-itens">
			<?php

				require_once ('classes\Produto.php');

				$pro = produto::listAll();

				foreach ($pro as $value) {
					echo "<div>	
							<span>" . $value['nm_produto'] . " >> " . $value["nm_categoria"] . "</span>
							<a class='att-item' href='aPro.php?cod=" . $value["id_produto"] . "'>
								<span>Att</span>
							</a>
							<a class='del-item' href='dPro.php?cod=" . $value["id_produto"] . "'>
								<span>Del</span>
							</a>
						</div>";
				}

			?>
		</section>
		
	</body>
</html>