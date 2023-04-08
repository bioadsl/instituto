<?php


    $link =  mysqli_connect('localhost','root','','u784567453_db_bravoscap') or die(mysqli_error());
   // mysql_select_db('banco_exemplo') or die(mysql_error());


    function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname='u784567453_db_bravoscap'",
                            "root",//usuario
                            "",//senha
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

// //estabelecemos conexão com o banco de dados
// mysql_connect('localhost','root','') or die(mysql_error());
// //criamos o banco de dados através do script php
// $create_base = mysql_query("CREATE DATABASE IF NOT EXISTS banco_exemplo;") or die(mysql_error());
 
// //seleciona o banco de dados
// mysql_select_db('banco_exemplo') or die(mysql_error());
 
// if($create_base) {
 
//  //criamos a tabela no banco de dados
//  mysql_query("CREATE TABLE IF NOT EXISTS produto (
//      id INT(11) AUTO_INCREMENT,
//      descricao VARCHAR(100) NOT NULL,
//      preco FLOAT NOT NULL,
//      PRIMARY KEY(id)
//  );") or die(mysql_error());
 
//  //verifica se existe registros no banco
//  $query = mysql_query("SELECT id, descricao, preco FROM produto");
  
// //se não existir registros então insere os valores abaixo
//  if(empty($query)) {
//  //insere alguns dados para os exemplos
//  mysql_query("INSERT INTO produto(descricao, preco) VALUES
//     ('Notebook', '2800'),
//     ('Nobreak', '800'),
//     ('Roteador Wireless', '180');
//     ") or die(mysql_error());
//  }
// }

    

?>
