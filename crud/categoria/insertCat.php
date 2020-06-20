<?php
/*Validação dos campos do fromulário inserir*/

	require_once ('..\..\classes\Categoria.php');

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
						"nm_categoria"=>$_POST["txtNome"],
						"id_categoria_pai"=>$_POST["cmbPai"],
						"st_categoria"=>$_POST["txtStatus"],
					));

					$result = $cat->save();

					unset($cat);

				}
			}			
		}

		echo $result;
		unset($result);
	}
?>