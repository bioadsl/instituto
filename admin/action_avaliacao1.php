<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "0");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_avaliacao   			= (isset($_POST['id_avaliacao'])) 				? $_POST['id_avaliacao'] : '';
$id_inscrito   				= (isset($_POST['id_inscrito'])) 				    ? $_POST['id_inscrito'] : '';
$matricula			 		= (isset($_POST['matricula'])) 			 		? $_POST['matricula'] : '';
$turma			 		    = (isset($_POST['turma'])) 			 	    	? $_POST['turma'] : '';
$data			 			= (isset($_POST['data'])) 			    		? $_POST['data'] : '';
$nome 						= (isset($_POST['nome'])) 						? $_POST['nome'] : '';
$obediencia  				= (isset($_POST['obediencia'])) 				? $_POST['obediencia'] : '';
$respeito  					= (isset($_POST['respeito'])) 			    	? $_POST['respeito'] : '';
$servico					= (isset($_POST['servico'])) 			    	? $_POST['servico'] : '';
$organizacao  				= (isset($_POST['organizacao'])) 			    ? $_POST['organizacao'] : '';
$ds_escolar				 	= (isset($_POST['ds_escolar'])) 			    ? $_POST['ds_escolar'] : '';
$camaradagem			 	= (isset($_POST['camaradagem'])) 			 	? $_POST['camaradagem'] : '';
$iniciativa			 		= (isset($_POST['iniciativa'])) 			 	? $_POST['iniciativa'] : '';
$assiduidade			 	= (isset($_POST['assiduidade'])) 			 	? $_POST['assiduidade'] : '';
$lideranca			 		= (isset($_POST['lideranca'])) 			 		? $_POST['lideranca'] : '';
$disciplina			 		= (isset($_POST['disciplina'])) 			 	? $_POST['disciplina'] : '';


echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
echo "<div class='container'>";
echo "<h1>Dados do Inscrito</h1>";
echo "Ação:".$acao."<br>";	  
echo "Id Bravo:".$id_inscrito."<br>";  
echo "Matricula:".$matricula."<br>";  	
echo "Turma:".$turma."<br>";  		
echo "Data:".$data."<br>";
echo "Nome:".$nome."<br>";  	
echo "-----------------------------------------<br>";   	
echo "Obediencia:".$obediencia."<br>";
echo "Respeito:".$respeito."<br>";	
echo "Organizacao:".$organizacao."<br>";	
echo "Servico:".$servico."<br>";	
echo "Desempenho Escolar:".$ds_escolar."<br>";		
echo "-----------------------------------------<br>";   
echo "Camaradagem:".$camaradagem."<br>";		
echo "Iniciativa:".$iniciativa."<br>";
echo "Assiduidade:".$assiduidade."<br>";
echo "Liderança:".$lideranca."<br>";
echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";




	
if ($acao == 'incluir_avaliacao_pais_semestre_1'):

		$sql = 'UPDATE tb_avaliacao1 SET  matricula=:matricula, turma=:turma, data=:data, nome=:nome, obediencia1=:obediencia1,  respeito1=:respeito1, organizacao1=:organizacao1, servico1=:servico1, ds_escolar1=:ds_escolar1  where id_inscrito = :id_inscrito';

		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_inscrito', $id_inscrito);
		$stm->bindValue(':matricula', $matricula);
		$stm->bindValue(':turma', $turma);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':nome', $nome);
		$stm->bindValue(':obediencia1', $obediencia);
		$stm->bindValue(':respeito1', $respeito);
		$stm->bindValue(':organizacao1', $organizacao);
		$stm->bindValue(':servico1', $servico);
		$stm->bindValue(':ds_escolar1', $ds_escolar);
		$retorno = $stm->execute();


		if ($retorno):
			echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
			<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
			echo "<div class='container'>";
			echo "<h1>Dados do Inscrito</h1>";
				  
			echo "Id Bravo:".$id_inscrito."<br>";  
			echo "Matricula:".$cod_matricula."<br>";  	
			echo "Turma:".$turma."<br>";  		
			echo "Data".$data."<br>";
			echo "Nome:".$nome."<br>";  	
			echo "-----------------------------------------<br>";   	
			echo "Obediencia:".$obediencia."<br>";
			echo "Respeito:".$respeito."<br>";	
			echo "Organizacao:".$organizacao."<br>";	
			echo "Servico:".$servico."<br>";	
			echo "Desempenho Escolar:".$ds_escolar."<br>";			
			echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
		else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
		endif;

		if ($acao == 'incluir_avaliacao_guardioes_semestre_1'):


			$sql = 'UPDATE tb_avaliacao1 SET disciplina1=:disciplina1, camaradagem1=:camaradagem1, iniciativa1=:iniciativa1, assiduidade1=:assiduidade1, lideranca1=:lideranca1 where id_inscrito = :id_inscrito';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id_inscrito', $id_inscrito);
			$stm->bindValue(':disciplina1', $disciplina);
			$stm->bindValue(':camaradagem1', $camaradagem);
			$stm->bindValue(':iniciativa1', $iniciativa);
			$stm->bindValue(':assiduidade1', $assiduidade);
			$stm->bindValue(':lideranca1', $lideranca);
			$retorno = $stm->execute();
	
	
			if ($retorno):
				echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
				<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
				echo "<div class='container'>";
				echo "<h1>Dados do Inscrito</h1>";
					  
				echo "Id Bravo:".$id_inscrito."<br>";  
				echo "matricula:".$matricula."<br>";  	
				echo "turma:".$turma."<br>";  		
				echo "Data".$data."<br>";
				echo "Nome:".$nome."<br>";  	
				echo "-----------------------------------------<br>";   		
				echo "Camaradagem:".$camaradagem."<br>";		
				echo "Iniciativa:".$iniciativa."<br>";
				echo "Assiduidade:".$assiduidade."<br>";
				echo "Liderança:".$lideranca."<br>";		
				echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
			else:
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;
	
			echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
			endif;


 
// Verifica se foi solicitada a exclusão dos dados
if ($acao == 'excluir_pedido'):

 // Exclui o registro do banco de dados
 $sql = 'DELETE FROM tb_pedido WHERE id_pedido = :id_pedido';
 $stm = $conexao->prepare($sql);
 $stm->bindValue(':id_pedido', $id_pedido);
 $retorno = $stm->execute();

 if ($retorno):
	 echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
 else:
	 echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
 endif;

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
endif;




		?>