<?php

	require_once ('classes\Produto.php');

	$pro = new Produto();

	$pro->setData(array(
		"id_produto"=>$_GET["cod"]
	));

	$resultSet = $pro->list();

	if(!count($resultSet)==0){

		$pro->delete();		

	}
	
	header("Location: index.php");
	exit;

?>