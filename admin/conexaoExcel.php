<?php

require 'connect.php';

// Conectando com o banco de dados MYSQL 
$link = mysqli_connect($host, $usuario, $senha) or die ("Não foi possível realizar a conexão");

//Selecionando a base de dados
mysqli_select_db($link, $banco) or die("Não foi possível realizar a seleção da base de dados");

?>
