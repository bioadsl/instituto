<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "1");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_pedido    				= (isset($_POST['id_pedido'])) 				    ? $_POST['id_pedido'] : '';
$nome_pedido  				= (isset($_POST['nome_pedido'])) 				? $_POST['nome_pedido'] : '';
$tamanho_pedido  			= (isset($_POST['tamanho_pedido'])) 			? $_POST['tamanho_pedido'] : '';
$email_pedido  				= (isset($_POST['email_pedido'])) 			    ? $_POST['email_pedido'] : '';
$quantidade  				= (isset($_POST['quantidade'])) 			    ? $_POST['quantidade'] : '';
$cel_pedido					= (isset($_POST['cel_pedido'])) 			    ? $_POST['cel_pedido'] : '';
$comprovante				= (isset($_FILES['comprovante'])) 			    ? $_FILES['comprovante'] : '';
$id_produto			 		= (isset($_POST['id_produto'])) 			    ? $_POST['id_produto'] : '';
$status			 		    = (isset($_POST['status'])) 			 	    ? $_POST['status'] : '';
$situacao			 		= (isset($_POST['situacao'])) 			 	    ? $_POST['situacao'] : '';
$observacao			 		= (isset($_POST['observacao'])) 			 	? $_POST['observacao'] : '';
$remessa			 		= (isset($_POST['remessa'])) 			 		? $_POST['remessa'] : '';
$data_pedido			 	= (isset($_POST['data_pedido'])) 			 	? $_POST['data_pedido'] : '';


	if ($acao == 'incluir_pedido'):

		    function salvarImagem($comprovante){
               if(isset($comprovante)){
                   $dado = strtolower(substr($comprovante['name'], -4));
                   $novo_nome = date('dmY').$dado;
                   $local = "./fotos/";
                   $valor = move_uploaded_file($comprovante['tmp_name'], $local.$novo_nome);
                   //$resultado = "Arquivo Enviado com Sucesso!";
                   $resultado = $local.$novo_nome ;
               }
               else{
                   $resultado = "Erro ao Enviar o Arquivo!";
               }
               
               return $resultado;
            }
            
           $deposito = salvarImagem($comprovante);
          
	 
  /*	
	
	
	
$image = 'fotos/'.'$comprovante';
 
// Obtém o conteúdo da imagem e efetua a conversão para base64 encoding
$imageContent = base64_encode(file_get_contents($image));
 
// Efetua a criação do atributo SRC do element IMG no formato  data:{mime};base64,{data}; (sem charset=utf-8;)
$src = 'data: '.mime_content_type($image).';base64,'.$imageContent;
 
// Apresenta a imagem
echo '<img src="'.$src.'">';*/	
	


		$sql = 'INSERT INTO tb_pedido (nome_pedido, tamanho_pedido, email_pedido, quantidade, cel_pedido, comprovante, id_produto, observacao, remessa, data_pedido ) VALUES (:nome_pedido, :tamanho_pedido, :email_pedido, :quantidade, :cel_pedido, :comprovante,  :id_produto, :observacao, :remessa,  :data_pedido)';
		
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':nome_pedido', $nome_pedido);
		$stm->bindValue(':tamanho_pedido', $tamanho_pedido);
		$stm->bindValue(':email_pedido', $email_pedido);
		$stm->bindValue(':quantidade', $quantidade);
		$stm->bindValue(':cel_pedido', $cel_pedido);
		$stm->bindValue(':comprovante', $deposito);
		$stm->bindValue(':id_produto', $id_produto);
		$stm->bindValue(':observacao', $observacao);
		$stm->bindValue(':remessa', $remessa);
		$stm->bindValue(':data_pedido', $data_pedido);
		$retorno = $stm->execute();


		if ($retorno):
			echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=loja'>";
		endif;



	if ($acao == 'editar_pedido'):

		

		    function salvarImagem($comprovante){
               if(isset($comprovante)){
                   $dado = strtolower(substr($comprovante['name'], -4));
                   $novo_nome = date('d_m_Y_H_i_s').$dado;
                   $local = "./fotos/";
                   $valor = move_uploaded_file($comprovante['tmp_name'], $local.$novo_nome);
                   //$resultado = "Arquivo Enviado com Sucesso!";
                   $resultado = $local.$novo_nome ;
               }
               else{
                   $resultado = "Erro ao Enviar o Arquivo!";
               }
               
               return $resultado;
            }
            
           $comprovante_novo = salvarImagem($comprovante);




 /* comprovante=:comprovante, */ 
 $sql = 'UPDATE tb_pedido SET nome_pedido=:nome_pedido, tamanho_pedido=:tamanho_pedido, email_pedido=:email_pedido, quantidade=:quantidade, cel_pedido=:cel_pedido, comprovante=:comprovante,  id_produto=:id_produto, observacao=:observacao, remessa=:remessa, data_pedido=:data_pedido, 
 situacao=:situacao, status=:status  WHERE id_pedido=:id_pedido';

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

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=pedido'>";
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

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=pedido'>";
endif;




		?>