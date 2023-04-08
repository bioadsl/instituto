<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "1");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_inscrito			 	    = (isset($_POST['id_inscrito'])) 			       	? $_POST['id_inscrito'] : '';
$id_matricula			 	= (isset($_POST['id_matricula'])) 			    ? $_POST['id_matricula'] : '';
$cod_matricula			 	= (isset($_POST['cod_matricula'])) 			    ? $_POST['cod_matricula'] : '';
$turma  					= (isset($_POST['turma'])) 			    		? $_POST['turma'] : '';
$data			 			= (isset($_POST['data'])) 			 			? $_POST['data'] : '';
$nome						= (isset($_POST['nome'])) 			    		? $_POST['nome'] : '';
$status						= (isset($_POST['status'])) 			    	? $_POST['status'] : '';

// echo $acao ."<br>";
// echo $id_inscrito."<br>";	
// echo $cod_matricula."<br>";		
// echo $turma."<br>";  
// echo $data."<br>";
// echo $nome."<br>";  	
// echo $data."<br>";		 


	if ($acao == 'efetuar_matricula_semestre_1'):

		$sql = 'INSERT INTO tb_matricula (id_inscrito, nome, cod_matricula, turma, data, status) VALUES (:id_inscrito, :nome, :cod_matricula, :turma, :data, :status)';
		
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_inscrito', $id_inscrito);
		$stm->bindValue(':nome', $nome);
		$stm->bindValue(':cod_matricula', $cod_matricula);
		$stm->bindValue(':turma', $turma);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':status', $status);
		$retorno = $stm->execute();

			if ($retorno):
				echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
				<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
				echo "<div class='container'>";
				echo "<h1>Dados do Inscrito</h1>";
					  
				echo "Id Bravo:".$id_inscrito."<br>";  
				echo "Codigo do registro:".$id_matricula."<br>";   	
				echo "Nome:".$nome."<br>";  	
				echo "matricula:".$cod_matricula."<br>";  	
				echo "turma:".$turma."<br>";  		
				echo "Data:".$data."<br>";
				echo "Status:".$status."<br>";				
				echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
		
		
				$sql = 'INSERT INTO tb_avaliacao1 (id_inscrito) VALUES (:id_inscrito)';
		
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':id_inscrito', $id_inscrito);
				$ret1 = $stm->execute();
		
				$sql = 'INSERT INTO tb_grade1 (id_inscrito) VALUES (:id_inscrito)';
		
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':id_inscrito', $id_inscrito);
				$ret2 = $stm->execute();

				$sql = 'INSERT INTO tb_avaliacao2 (id_inscrito) VALUES (:id_inscrito)';
		
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':id_inscrito', $id_inscrito);
				$ret3 = $stm->execute();
		
				$sql = 'INSERT INTO tb_grade2 (id_inscrito) VALUES (:id_inscrito)';
		
				$stm = $conexao->prepare($sql);
				$stm->bindValue(':id_inscrito', $id_inscrito);
				$ret4 = $stm->execute();
		
			else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=matricula_mail.php'>";
	endif;







	if ($acao == 'efetuar_matricula_semestre_2'):

		$sql = 'INSERT INTO tb_matricula (id_inscrito, nome, cod_matricula, turma, data, status) VALUES (:id_inscrito, :nome, :cod_matricula, :turma, :data, :status)';
		
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_inscrito', $id_inscrito);
		$stm->bindValue(':nome', $nome);
		$stm->bindValue(':cod_matricula', $cod_matricula);
		$stm->bindValue(':turma', $turma);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':status', $status);
		$retorno = $stm->execute();

			if ($retorno):
				echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
				<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
				echo "<div class='container'>";
				echo "<h1>Dados do Inscrito</h1>";
					  
				echo "Id Bravo:".$id_inscrito."<br>";  
				echo "Codigo do registro:".$id_matricula."<br>";   	
				echo "Nome:".$nome."<br>";  	
				echo "matricula:".$cod_matricula."<br>";  	
				echo "turma:".$turma."<br>";  		
				echo "Data:".$data."<br>";
				echo "Status:".$status."<br>";				
				echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
		
		
			else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
	endif;


	if ($acao == 'editar_matricula'):

 $sql = 'UPDATE tb_matricula SET status=:status  WHERE id_inscrito=:id_inscrito';

$stm = $conexao->prepare($sql);
$stm->bindValue(':id_inscrito', $id_inscrito);
// $stm->bindValue(':nome', $nome);
// $stm->bindValue(':cod_matricula', $cod_matricula);
// $stm->bindValue(':turma', $turma);
// $stm->bindValue(':data', $data);
$stm->bindValue(':status', $status);
$retorno = $stm->execute();


 if ($retorno):
		echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
		<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
	    echo "<div class='container'>";
		echo "<h1>Dados do Inscrito</h1>";
		  	
		echo "Id Bravo:".$id_inscrito."<br>";  
		echo "Codigo do registro:".$id_matricula."<br>";   	
		echo "Nome:".$nome."<br>";  	
		echo "matricula:".$cod_matricula."<br>";  	
		echo "turma:".$turma."<br>";  		
		echo "Data".$data."<br>";
		echo "Status:".$status."<br>";				
		echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div></div> ";
 else:
	 echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
 endif;

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
endif;
 

 
 
// Verifica se foi solicitada a exclusão dos dados
if ($acao == 'excluir_produto'):

 // Exclui o registro do banco de dados
 $sql = 'DELETE FROM tb_estoque WHERE id_registro = :id_registro';
 $stm = $conexao->prepare($sql);
 $stm->bindValue(':id_registro', $id_registro);
 $retorno = $stm->execute();

 if ($retorno):
	 echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
 else:
	 echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
 endif;

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
endif;




		?>