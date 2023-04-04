<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "1");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_avaliacao   			= (isset($_POST['id_avaliacao'])) 				? $_POST['id_avaliacao'] : '';
$id_bravo   				= (isset($_POST['id_bravo'])) 				    ? $_POST['id_bravo'] : '';
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
echo "Id Bravo:".$id_bravo."<br>";  
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




	
if ($acao == 'incluir_avaliacao_pais_semestre_2'):

		$sql = 'UPDATE tb_avaliacao2 SET  matricula=:matricula, turma=:turma, data=:data, nome=:nome, obediencia2=:obediencia2,  respeito2=:respeito2, organizacao2=:organizacao2, servico2=:servico2, ds_escolar2=:ds_escolar2  where id_bravo = :id_bravo';

		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_bravo', $id_bravo);
		$stm->bindValue(':matricula', $matricula);
		$stm->bindValue(':turma', $turma);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':nome', $nome);
		$stm->bindValue(':obediencia2', $obediencia);
		$stm->bindValue(':respeito2', $respeito);
		$stm->bindValue(':organizacao2', $organizacao);
		$stm->bindValue(':servico2', $servico);
		$stm->bindValue(':ds_escolar2', $ds_escolar);
		$retorno = $stm->execute();


		if ($retorno):
			echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
			<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
			echo "<div class='container'>";
			echo "<h1>Dados do Inscrito</h1>";
				  
			echo "Id Bravo:".$id_bravo."<br>";  
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

		if ($acao == 'incluir_avaliacao_guardioes_semestre_2'):


			$sql = 'UPDATE tb_avaliacao2 SET disciplina2=:disciplina2, camaradagem2=:camaradagem2, iniciativa2=:iniciativa2, assiduidade2=:assiduidade2, lideranca2=:lideranca2 where id_bravo = :id_bravo';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id_bravo', $id_bravo);
			$stm->bindValue(':disciplina2', $disciplina);
			$stm->bindValue(':camaradagem2', $camaradagem);
			$stm->bindValue(':iniciativa2', $iniciativa);
			$stm->bindValue(':assiduidade2', $assiduidade);
			$stm->bindValue(':lideranca2', $lideranca);
			$retorno = $stm->execute();
	
	
			if ($retorno):
				echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
				<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
				<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
				echo "<div class='container'>";
				echo "<h1>Dados do Inscrito</h1>";
					  
				echo "Id Bravo:".$id_bravo."<br>";  
				echo "matricula:".$cod_matricula."<br>";  	
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

	if ($acao == 'editar_pedido'):


 /* comprovante=:comprovante, */ 
 $sql = 'UPDATE tb_pedido SET nome_pedido=:nome_pedido, tamanho_pedido=:tamanho_pedido, email_pedido=:email_pedido, quantidade=:quantidade, cel_pedido=:cel_pedido, comprovante=:comprovante,  id_produto=:id_produto, observacao=:observacao, remessa=:remessa, data_pedido=:data_pedido, 
 situacao=:situacao, status=:status  WHERE  id_avaliacao = :id_avaliacao';

 $stm = $conexao->prepare($sql);
 $stm->bindValue(':nome_pedido', $nome_pedido);
 $stm->bindValue(':tamanho_pedido', $tamanho_pedido);
 $stm->bindValue(':email_pedido', $email_pedido);
 $stm->bindValue(':quantidade', $quantidade);
 $stm->bindValue(':cel_pedido', $cel_pedido);
 $stm->bindValue(':comprovante', $comprovante_novo);
 $stm->bindValue(':id_produto', $id_produto);
 $stm->bindValue(':observacao', $observacao);
 $stm->bindValue(':remessa', $remessa);
 $stm->bindValue(':data_pedido', $data_pedido);
 $stm->bindValue(':situacao', $situacao);
 $stm->bindValue(':status', $status);
 $stm->bindValue(':id_pedido', $id_pedido);
 $retorno = $stm->execute();

 if ($retorno):

	    echo "<div>";
		echo "<h1>Dados do Pedido</h1>";
		echo "Codigo do Pedido:".$id_pedido."<br>";   	
		echo "Nome:".$nome_pedido."<br>";  	
		echo "Tamanho:".$tamanho_pedido."<br>"; 
		echo "Email:".$email_pedido."<br>";  	
		echo "Quantidade:".$quantidade."<br>";  	
		echo "Celular".$cel_pedido."<br>";		
		echo "Codigo do Produto:".$id_produto."<br>";		
		echo "Status".$status." <br>";			
		echo "Situação".$situacao."<br>";	
		echo "Observação".$observacao."<br>";		
		echo "Data do Pedido".$data_pedido."<br>";
		echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div></div> ";
 else:
	 echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
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