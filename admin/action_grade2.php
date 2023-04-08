<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "0");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_inscrito   				= (isset($_POST['id_inscrito'])) 				    ? $_POST['id_inscrito'] : '';
$matricula			 		= (isset($_POST['matricula'])) 			 		? $_POST['matricula'] : '';
$turma			 		    = (isset($_POST['turma'])) 			 	    	? $_POST['turma'] : '';
$data			 			= (isset($_POST['data'])) 			    		? $_POST['data'] : '';
$nome 						= (isset($_POST['nome'])) 						? $_POST['nome'] : '';
$civismo2  					= (isset($_POST['civismo'])) 					? $_POST['civismo'] : '';
$nos_amarras2  				= (isset($_POST['nos_amarras'])) 			    ? $_POST['nos_amarras'] : '';
$xadrez2					= (isset($_POST['xadrez'])) 			    	? $_POST['xadrez'] : '';
$sobrevivencia2  			= (isset($_POST['sobrevivencia'])) 				? $_POST['sobrevivencia'] : '';
$orientacao2				= (isset($_POST['orientacao'])) 			    ? $_POST['orientacao'] : '';
$ordem_unida2			 	= (isset($_POST['ordem_unida'])) 			 	? $_POST['ordem_unida'] : '';
$taf2			 			= (isset($_POST['taf'])) 			 			? $_POST['taf'] : '';
$prim_socorros2			 	= (isset($_POST['prim_socorros'])) 				? $_POST['prim_socorros'] : '';
$prev_acidentes2			= (isset($_POST['prev_acidentes'])) 			? $_POST['prev_acidentes'] : '';
$habilidades2				= (isset($_POST['habilidades'])) 				? $_POST['habilidades'] : '';


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
echo "Civismo:".$civismo2."<br>";
echo "Nós e Amrrações:".$nos_amarras2."<br>";	
echo "Xadrez:".$xadrez2."<br>";	
echo "Sobrevivencia:".$sobrevivencia2."<br>";	
echo "Orientacão:".$orientacao2."<br>";		
echo "-----------------------------------------<br>"; 
echo "Ordem Unida:".$ordem_unida2."<br>";		  
echo "TAF1:".$taf2."<br>";		
echo "Primeiros Socorros:".$prim_socorros2."<br>";
echo "Prevenção de Acidendes:".$prev_acidentes2."<br>";
echo "Habilidades Manuais:".$habilidades2."<br>";
echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";




	
if ($acao == 'avaliacao_bimestre_3'):

		$sql = 'UPDATE tb_grade2 SET ordem_unida2=:ordem_unida2, taf2=:taf2, prim_socorros2=:prim_socorros2, prev_acidentes2=:prev_acidentes2, habilidades2=:habilidades2 where id_inscrito = :id_inscrito';

		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_inscrito', $id_inscrito);
		$stm->bindValue(':ordem_unida2', $ordem_unida2);
		$stm->bindValue(':taf2', $taf2);
		$stm->bindValue(':prim_socorros2', $prim_socorros2);
		$stm->bindValue(':prev_acidentes2', $prev_acidentes2);
		$stm->bindValue(':habilidades2', $habilidades2);
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
			echo "Civismo:".$civismo2."<br>";
			echo "Nós e Amrrações:".$nos_amarras2."<br>";	
			echo "Xadrez:".$xadrez2."<br>";	
			echo "Sobrevivencia:".$sobrevivencia2."<br>";	
			echo "Orientacão:".$orientacao2."<br>";				
			echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
		else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
		endif;

		if ($acao == 'avaliacao_bimestre_4'):	


			$sql = 'UPDATE tb_grade2 SET civismo2=:civismo2, nos_amarras2=:nos_amarras2, xadrez2=:xadrez2, sobrevivencia2=:sobrevivencia2, orientacao2=:orientacao2  where id_inscrito = :id_inscrito';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id_inscrito', $id_inscrito);
			$stm->bindValue(':civismo2', $civismo2);
			$stm->bindValue(':nos_amarras2', $nos_amarras2);
			$stm->bindValue(':xadrez2', $xadrez2);
			$stm->bindValue(':sobrevivencia2', $sobrevivencia2);
			$stm->bindValue(':orientacao2', $orientacao2);
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
				echo "Ordem Unida:".$ordem_unida2."<br>";		  
				echo "TAF1:".$taf2."<br>";		
				echo "Primeiros Socorros:".$prim_socorros2."<br>";
				echo "Prevenção de Acidendes:".$prev_acidentes2."<br>";
				echo "Habilidades Manuais:".$habilidades2."<br>";		
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