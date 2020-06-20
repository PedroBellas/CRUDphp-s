<?php

/*destivando todos os avisos de alerta*/

error_reporting(0);
ini_set("display_errors", 0 ); 

/*Definindo variaveis de conexão com o banco*/

$host = '127.0.0.1';
$dbname = 'db_nomeBanco';
$user = 'root';
$password ='root';

/*Conexão via PDO (metodo mais seguro)*/

try{

	$conn = new PDO("mysql:dbname=".$dbname.";host=".$host, $user, $password);/*Criando conexão*/

} catch (PDOException $e){ /*Capturando possiveis erros que podem acontecer*/

	echo "Erro de conexão: " . $e->getMessage();/*Exibindo mensagem de erro*/

}

unset($conn);/*Fechando conexão com o banco*/


/*Conexão via mysqli*/

$conn = new mysqli($host, $user, $password, $dbname); /*Criando conexão*/

if ($conn->connect_error){ /*Verificando se não houve nenhum erro ao abrir a conexão*/

	die("<br>Erro: ". $conn->connect_error); /*Encerrando a execução por questão de segurança*/

}

echo "Conectado com sucesso!";

$conn->close(); /*Fechando conexão com o banco*/

unset($conn) /*Destruindo a variavel para limpar a memória*/


?>