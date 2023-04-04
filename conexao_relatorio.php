<?php

require 'connect.php';

$link = mysql_connect($banco, $usuario, $senha) or die ("Não foi possível realizar a conexão");

//Selecionando a base de dados
mysql_select_db($banco) or die("Não foi possível realizar a seleção da base de dados");


?>