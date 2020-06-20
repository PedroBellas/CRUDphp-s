<?php

	require_once ('..\..\classes\Categoria.php');
	
	/*Verificando o campo hidden no caso de um espertinho tentar mudar*/

	$cat = new Categoria();

	$cat->setData(array(
		"id_categoria"=>$_POST["cod"]
	));

	$resultSet = $cat->researchCategoria();

	if(!count($resultSet) != 0){
		echo "Id invalido!";
		exit;
	}
	
	unset($cat, $resultSet);

/*ValidaÃ§ÃĢo dos campos do formulario atualizar*/

	$result = "";
	if(isset($_POST["txtNome"])){

		if(strlen($_POST["txtNome"]) < 1 || strlen($_POST["txtNome"]) > 64){

			$result = "Nome invalido!"; 

		}
		else{

			if(!is_numeric($_POST["cmbPai"]) || ($_POST["cmbPai"] < 0) || $_POST["cmbPai"] > 99999999999){
			
				$result = "Por favor, não mexa nos valores da comboBox!";

			}
			else{

				if($_POST["cmbPai"] == 0){
					$_POST["cmbPai"] = NULL;
				}

				if(!is_numeric($_POST["txtStatus"]) || ($_POST["txtStatus"] < 0) || $_POST["txtStatus"] > 9999){

					$result = "Status invalido, por favor, preencha novamente!";

				}
				else{

					$cat = new Categoria();
					
					$cat->setData(array(
						"id_categoria"=>$_POST["cod"],
						"nm_categoria"=>$_POST["txtNome"],
						"id_categoria_pai"=>$_POST["cmbPai"],
						"st_categoria"=>$_POST["txtStatus"]
					));

					$result = $cat->att();

					unset($cat);

				}
			}			
		}

		echo $result;
		unset($result);
	}

?>