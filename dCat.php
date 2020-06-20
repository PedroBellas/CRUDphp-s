<?php

	require_once ('classes\Categoria.php');

	$cat = new Categoria();

	$cat->setData(array(
		"id_categoria"=>$_GET["cod"]
	));

	$resultSet = $cat->researchCategoria();

	if(!count($resultSet)==0){

		$message = $cat->delete();

	}
	header("Location: index.php");
	exit;
?>