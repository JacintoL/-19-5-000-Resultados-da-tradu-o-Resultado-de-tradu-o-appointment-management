<?php
	define("USER_BD", "root");
	define("PASS_BD", "");
	define("NOME_BD", "trabalho1");
	$hostname_conn = "localhost";

	$conn = new mysqli($hostname_conn, USER_BD, PASS_BD, NOME_BD);
	// Conectamos ao nosso servidor MySQL
	if(!($conn)) 
	{
	   echo "Erro ao conectar ao MySQL.";
	   exit;
	}
	// Selecionamos a nossa base de dados MySQL
	if(!($conn)) 
	{
	   echo "Erro ao selecionar a base de dados.";
	   exit;
	}
?>