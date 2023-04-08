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
$civismo1  					= (isset($_POST['civismo'])) 					? $_POST['civismo'] : '';
$nos_amarras1  				= (isset($_POST['nos_amarras'])) 			    ? $_POST['nos_amarras'] : '';
$xadrez1					= (isset($_POST['xadrez'])) 			    	? $_POST['xadrez'] : '';
$sobrevivencia1  			= (isset($_POST['sobrevivencia'])) 				? $_POST['sobrevivencia'] : '';
$orientacao1				= (isset($_POST['orientacao'])) 			    ? $_POST['orientacao'] : '';
$ordem_unida1			 	= (isset($_POST['ordem_unida'])) 			 	? $_POST['ordem_unida'] : '';
$taf1			 			= (isset($_POST['taf'])) 			 			? $_POST['taf'] : '';
$prim_socorros1			 	= (isset($_POST['prim_socorros'])) 				? $_POST['prim_socorros'] : '';
$prev_acidentes1			= (isset($_POST['prev_acidentes'])) 			? $_POST['prev_acidentes'] : '';
$habilidades1				= (isset($_POST['habilidades'])) 				? $_POST['habilidades'] : '';


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
echo "Civismo:".$civismo1."<br>";
echo "Nós e Amrrações:".$nos_amarras1."<br>";	
echo "Xadrez:".$xadrez1."<br>";	
echo "Sobrevivencia:".$sobrevivencia1."<br>";	
echo "Orientacão:".$orientacao1."<br>";		
echo "-----------------------------------------<br>"; 
echo "Ordem Unida:".$ordem_unida1."<br>";		  
echo "TAF1:".$taf1."<br>";		
echo "Primeiros Socorros:".$prim_socorros1."<br>";
echo "Prevenção de Acidendes:".$prev_acidentes1."<br>";
echo "Habilidades Manuais:".$habilidades1."<br>";
echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";




	
if ($acao == 'avaliacao_bimestre_1'):

		$sql = 'UPDATE tb_grade1 SET ordem_unida1=:ordem_unida1, taf1=:taf1, prim_socorros1=:prim_socorros1, prev_acidentes1=:prev_acidentes1, habilidades1=:habilidades1 where id_inscrito = :id_inscrito';

		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_inscrito', $id_inscrito);
		$stm->bindValue(':ordem_unida1', $ordem_unida1);
		$stm->bindValue(':taf1', $taf1);
		$stm->bindValue(':prim_socorros1', $prim_socorros1);
		$stm->bindValue(':prev_acidentes1', $prev_acidentes1);
		$stm->bindValue(':habilidades1', $habilidades1);
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
			echo "Civismo:".$civismo1."<br>";
			echo "Nós e Amrrações:".$nos_amarras1."<br>";	
			echo "Xadrez:".$xadrez1."<br>";	
			echo "Sobrevivencia:".$sobrevivencia1."<br>";	
			echo "Orientacão:".$orientacao1."<br>";				
			echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado, aguarde você está sendo redirecionado ...</div></div> ";
		else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_turma'>";
		endif;

		if ($acao == 'avaliacao_bimestre_2'):	


			$sql = 'UPDATE tb_grade1 SET civismo1=:civismo1, nos_amarras1=:nos_amarras1, xadrez1=:xadrez1, sobrevivencia1=:sobrevivencia1, orientacao1=:orientacao1  where id_inscrito = :id_inscrito';
			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id_inscrito', $id_inscrito);
			$stm->bindValue(':civismo1', $civismo1);
			$stm->bindValue(':nos_amarras1', $nos_amarras1);
			$stm->bindValue(':xadrez1', $xadrez1);
			$stm->bindValue(':sobrevivencia1', $sobrevivencia1);
			$stm->bindValue(':orientacao1', $orientacao1);
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
				echo "Ordem Unida:".$ordem_unida1."<br>";		  
				echo "TAF1:".$taf1."<br>";		
				echo "Primeiros Socorros:".$prim_socorros1."<br>";
				echo "Prevenção de Acidendes:".$prev_acidentes1."<br>";
				echo "Habilidades Manuais:".$habilidades1."<br>";		
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