<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		error_reporting(E_ALL);
		ini_set("display_errors", "1");
		
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$parceiro    				= (isset($_POST['parceiro'])) 				    ? $_POST['parceiro'] : '';
$agendamento  				= (isset($_POST['agendamento'])) 				? $_POST['agendamento'] : '';
$tipo			  			= (isset($_POST['tipo'])) 						? $_POST['tipo'] : '';
$convenio  					= (isset($_POST['convenio'])) 			   		? $_POST['convenio'] : '';
$conselheiro  				= (isset($_POST['conselheiro'])) 			    ? $_POST['conselheiro'] : '';
$descricao  				= (isset($_POST['descricao'])) 			        ? $_POST['descricao'] : '';
$data			    		= (isset($_POST['data'])) 					    ? $_POST['data'] : '';
$atendido					= (isset($_POST['atendido'])) 		  		    ? $_POST['atendido'] : '';
$id_atendido				= (isset($_POST['id_atendido'])) 		  		? $_POST['id_atendido'] : '';
$exame						= (isset($_POST['exame'])) 		  				? $_POST['exame'] : '';
$status						= (isset($_POST['status'])) 		  			? $_POST['status'] : '';
$id_atendimento				= (isset($_POST['id_atendimento'])) 		  	? $_POST['id_atendimento'] : '';

	if ($acao == 'incluir_atendimento'):

 /*		    function salvarImagem($comprovante){
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
          
	 
 	
	
	
	
$image = 'fotos/'.'$comprovante';
 
// Obtém o conteúdo da imagem e efetua a conversão para base64 encoding
$imageContent = base64_encode(file_get_contents($image));
 
// Efetua a criação do atributo SRC do element IMG no formato  data:{mime};base64,{data}; (sem charset=utf-8;)
$src = 'data: '.mime_content_type($image).';base64,'.$imageContent;
 
// Apresenta a imagem
echo '<img src="'.$src.'">';*/	
	


		$sql = 'INSERT INTO atendimento (id_atendido, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, exame, status) VALUES (:id_atendido, :atendido, :conselheiro, :convenio, :tipo, :descricao, :agendamento, :data, :exame, :status )';
		
		$stm = $conexao->prepare($sql);
		$stm->bindValue(':id_atendido', $id_atendido);
		$stm->bindValue(':atendido', $atendido);
		$stm->bindValue(':conselheiro', $conselheiro);
		$stm->bindValue(':convenio', $convenio);
		$stm->bindValue(':tipo', $tipo);
		$stm->bindValue(':descricao', $descricao);
		$stm->bindValue(':agendamento', $agendamento);
		$stm->bindValue(':data', $data);
		$stm->bindValue(':exame', $exame);
		$stm->bindValue(':status', $status);
		$retorno = $stm->execute();


		if ($retorno):
			echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		else:
			echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
		endif;

		echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_atendimento'>";
		endif;



	if ($acao == 'editar_atendimento'):

		
/*
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


(id_atendido, atendido, conselheiro, convenio, tipo, descricao, agendamento, data, exame, status)

  comprovante=:comprovante, */ 
 $sql = 'UPDATE atendimento SET  atendido=:atendido, conselheiro=:conselheiro, convenio=:convenio, tipo=:tipo, descricao=:descricao,  agendamento=:agendamento, data=:data, exame=:exame, status=:status where id_atendido=:id_atendido and id_atendimento=:id_atendimento ';

$stm = $conexao->prepare($sql);
$stm->bindValue(':id_atendimento', $id_atendimento);
$stm->bindValue(':id_atendido', $id_atendido);
$stm->bindValue(':atendido', $atendido);
$stm->bindValue(':conselheiro', $conselheiro);
$stm->bindValue(':convenio', $convenio);
$stm->bindValue(':tipo', $tipo);
$stm->bindValue(':descricao', $descricao);
$stm->bindValue(':agendamento', $agendamento);
$stm->bindValue(':data', $data);
$stm->bindValue(':exame', $exame);
$stm->bindValue(':status', $status);
$retorno = $stm->execute();

 if ($retorno):

	    // echo "<div>";
		// echo "<h1>Dados do Pedido</h1>";
		// echo "Codigo do Pedido:".$id_pedido."<br>";   	
		// echo "Nome:".$nome_pedido."<br>";  	
		// echo "Tamanho:".$tamanho_pedido."<br>"; 
		// echo "Email:".$email_pedido."<br>";  	
		// echo "Quantidade:".$quantidade."<br>";  	
		// echo "Celular".$cel_pedido."<br>";		
		// echo "Codigo do Produto:".$id_produto."<br>";		
		// echo "Status".$status." <br>";			
		// echo "Situação".$situacao."<br>";	
		// echo "Observação".$observacao."<br>";		
		// echo "Data do Pedido".$data_pedido."<br>";
		echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div></div> ";
 else:
	 echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
 endif;

 echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_atendimento'>";
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