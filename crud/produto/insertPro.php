<?php

	require_once ('..\..\classes\Categoria.php');
	require_once ('..\..\classes\Produto.php');

	/*Validando os campos obrigatórios primeiro*/
	$message = "";

	/*Validação dos campos opcionais*/

	$st_codigo = false;
	$st_desCurta = false;
	$st_amigavel = false;
	$st_envio = false;
	$st_taxa = false;
	$st_extra = false;

	/*Validação codigo*/

	if($_POST["txtCodigo"] == ""){

		$st_codigo = true;

		$_POST["txtCodigo"] = NULL;

	}
	else{

		if(strlen($_POST["txtCodigo"]) < 0 || strlen($_POST["txtCodigo"]) > 32){

			$message = "Codigo invalido!";

			$st_codigo = false;

		}
		else{

			$st_codigo = true;	

		}

	}

	/*Validação descrição curta*/

	if($_POST["txtDescPequena"] == ""){

		$st_desCurta = true;

		$_POST["txtDescPequena"] = NULL;

	}
	else{

		if(strlen($_POST["txtDescPequena"]) < 0 || strlen($_POST["txtDescPequena"]) > 150){

			$message = "Descrição curta invalida!";

			$st_desCurta = false;

		}
		else{

			$st_desCurta = true;	

		}

	}

	/*Validação amigavel*/

	if($_POST["txtAmigavel"] == ""){

		$st_amigavel = true;

		$_POST["txtAmigavel"] = NULL;

	}
	else{

		if(strlen($_POST["txtAmigavel"]) < 0 || strlen($_POST["txtAmigavel"]) > 128){

			$message = "Amigavel invalido!";

			$st_amigavel = false;

		}
		else{

			$st_amigavel = true;	

		}

	}

	/*Validação texto extra*/

	if($_POST["txtExtra"] == ""){

		$st_extra = true;

		$_POST["txtExtra"] = NULL;

	}
	else{

		if(strlen($_POST["txtExtra"]) < 0 || strlen($_POST["txtExtra"]) > 1000){

			$message = "Extra invalido!";

			$st_extra = false;

		}
		else{

			$st_extra = true;	

		}

	}

	/*Validação do valor de taxa*/

	if($_POST["txtValorTaxa"] == ""){

		$st_taxa = true;

		$_POST["txtValorTaxa"] = NULL;

	}
	else{

		if($_POST["txtValorTaxa"] < 0 || $_POST["txtValorTaxa"] > 100){

			$message = "Porcentagem invalida da Taxa!";

			$st_taxa = false;

		}
		else{

			$_POST["txtValorTaxa"] = $_POST["txtValorTaxa"]/100;
			$st_taxa = true;	

		}

	}

	/*Validação do valor do envio*/

	if($_POST["txtValorEnvio"] == ""){

		$st_envio = true;

		$_POST["txtValorEnvio"] = NULL;

	}
	else{

		if($_POST["txtValorEnvio"] < 0 || $_POST["txtValorEnvio"] > 100){

			$message = "Porcentagem invalida do Envio!";

			$st_envio = false;

		}
		else{

			$_POST["txtValorEnvio"] = $_POST["txtValorEnvio"]/100;
			$st_envio = true;	

		}

	}





	/*Validação dos campos obrigatórios*/
		
		if(strlen($_POST["txtDesc"]) < 0 || strlen($_POST["txtDesc"] > 1000)){

			$message = "Descrição invalida!";

		}
		else{

			if(strlen($_POST["txtNome"]) < 0 || strlen($_POST["txtNome"]) > 100){

				$message = "Nome invalido!";

			}
			else{

				 $valor = str_replace('R', '', $_POST["txtValor"]);
				 $valor = str_replace('r', '', $valor);
				 $valor = str_replace('$', '', $valor);
				 $valor = str_replace(',', '.', $valor);

				if(!is_numeric($valor) || $valor < 0 || $valor > 9999999999 ){

					$message = "Valor invalido do produto!";

				}
				else{

					if(!is_numeric($_POST["txtQuantidade"]) || $_POST["txtQuantidade"] < 0 || $_POST["txtQuantidade"] > 2147483648){

						$message = "Quantidade invalida!";

					}
					else{

						if(!is_numeric($_POST["txtStatus"]) || ($_POST["txtStatus"] < 0) || $_POST["txtStatus"] > 9999){

							$message = "Status invalido, por favor, preencha novamente!";

						}
						else{

							if(!is_numeric($_POST["cmbCat"]) || ($_POST["cmbCat"] < 0) || $_POST["cmbCat"] > 99999999999){
			
								$message = "Por favor, não mexa nos valores da comboBox!";

							}
							else{

								if($_POST["cmbCat"] == 0){

									$_POST["cmbCat"] = NULL;

								}

								if($st_codigo == true && $st_desCurta == true && $st_amigavel == true && $st_envio == true && $st_taxa == true && $st_extra == true){

									$pro = new Produto();

									$pro->setData(array(
										"cd_produto"=>$_POST["txtCodigo"],
										"ds_produto"=>$_POST["txtDesc"],
										"ds_curta_produto"=>$_POST["txtDescPequena"],
										"nm_produto"=>$_POST["txtNome"],
										"amigavel"=>$_POST["txtAmigavel"],
										"vl_produto"=>$valor,
										"qt_produto"=>$_POST["txtQuantidade"],
										"vl_envio"=>$_POST["txtValorEnvio"],
										"vl_taxa"=>$_POST["txtValorTaxa"],
										"id_categoria"=>$_POST["cmbCat"],
										"extra"=>$_POST["txtExtra"],
										"st_produto"=>$_POST["txtStatus"]
									));

									$message = $pro->save();

								}

							}

						}

					}

				}

			}

		}

		echo $message;

?>