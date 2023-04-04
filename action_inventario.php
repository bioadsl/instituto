<?php
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
error_reporting(E_ALL);
ini_set("display_errors", "1");

require 'conexao.php';

// Atribui uma conexão PDO
$conexao = conexao::getInstance();

// Recebe os dados enviados pela submissão do cadastro
$acao  				        = (isset($_POST['acao'])) 				        ? $_POST['acao'] : '';
$id_registro			 	= (isset($_POST['id_registro'])) 			    ? $_POST['id_registro'] : '';
$id_produto			 		= (isset($_POST['id_produto'])) 			    ? $_POST['id_produto'] : '';
$nome_produto   			= (isset($_POST['nome_produto'])) 				? $_POST['nome_produto'] : '';
$tamanho_produto  			= (isset($_POST['tamanho_produto'])) 			? $_POST['tamanho_produto'] : '';
$quantidade  				= (isset($_POST['quantidade'])) 			    ? $_POST['quantidade'] : '';
$data			 			= (isset($_POST['data'])) 			 			? $_POST['data'] : '';
$foto_produto				= (isset($_FILES['foto_produto'])) 			    ? $_FILES['foto_produto'] : '';
$categoria			 		= (isset($_POST['categoria'])) 			 		? $_POST['categoria'] : '';
$estado			 			= (isset($_POST['estado'])) 			 		? $_POST['estado'] : '';
$local			 			= (isset($_POST['local'])) 			 			? $_POST['local'] : '';
$saida			 			= (isset($_POST['saida'])) 			 			? $_POST['saida'] : '';
$responsavel			 	= (isset($_POST['responsavel'])) 			 	? $_POST['responsavel'] : '';



// echo $acao ."<br>";
// echo $id_registro."<br>";
// echo $id_produto."<br>";		
// echo $nome_produto."<br>";  
// echo $tamanho_produto."<br>";
// echo $quantidade."<br>";  	
// echo $data."<br>";		 




if ($acao == 'incluir_produto') :

	$nome_foto = 'padrao.jpg';
	if (isset($_FILES['foto']) || $_FILES['foto']['size'] > 0) :

		$extensoes_aceitas = array('tif', 'gif', 'bmp', 'png', 'svg', 'jpeg', 'jpg');
		$extensao = strtolower(end(explode(".", $_FILES['foto']['name'])));

		// Validamos se a extensão do arquivo é aceita
		if (array_search($extensao, $extensoes_aceitas) === false) :
			echo "<h1>Extensão Inválida!</h1>";
			exit;
		endif;

		// Verifica se o upload foi enviado via POST
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) :

			// Verifica se o diretório de destino existe, senão existir cria o diretório
			if (!file_exists("images")) :
				mkdir("images");
			endif;

			// Monta o caminho de destino com o nome do arquivo
			$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

			// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
			if (!move_uploaded_file($_FILES['foto']['tmp_name'], "images/" . $nome_foto)) :
				echo "Houve um erro ao gravar arquivo na pasta de destino!";
			endif;
		endif;
	endif;


	/*	
	
	
	
$image = 'fotos/'.'$comprovante';
 
// Obtém o conteúdo da imagem e efetua a conversão para base64 encoding
$imageContent = base64_encode(file_get_contents($image));
 
// Efetua a criação do atributo SRC do element IMG no formato  data:{mime};base64,{data}; (sem charset=utf-8;)
$src = 'data: '.mime_content_type($image).';base64,'.$imageContent;
 
// Apresenta a imagem
echo '<img src="'.$src.'">';*/



	$sql = 'INSERT INTO tb_inventario (id_produto, nome_produto, tamanho_produto, quantidade, data, foto_produto, categoria, local, estado, responsavel) VALUES (:id_produto, :nome_produto, :tamanho_produto, :quantidade, :data, :foto_produto, :categoria, :local, :estado, :responsavel)';

	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id_produto', $id_produto);
	$stm->bindValue(':nome_produto', $nome_produto);
	$stm->bindValue(':tamanho_produto', $tamanho_produto);
	$stm->bindValue(':quantidade', $quantidade);
	$stm->bindValue(':data', $data);
	$stm->bindValue(':foto_produto', $nome_foto);
	$stm->bindValue(':categoria', $categoria);
	$stm->bindValue(':local', $local);
	$stm->bindValue(':estado', $estado);
	$stm->bindValue(':responsavel', $responsavel);
	$retorno = $stm->execute();


	if ($retorno) :
		echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
	else :
		echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
	endif;

	echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_estoque'>";
endif;



if ($acao == 'editar_produto') :




	if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) :

		// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
		if ($foto_atual <> 'padrao.jpg') :
			unlink("images/" . $foto_atual);
		endif;

		$extensoes_aceitas = array('tif', 'gif', 'bmp', 'png', 'svg', 'jpeg', 'jpg');

		//$extensoes_aceitas = array ();
		//	var_dump ($extensoes_aceitas);


		$extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

		// Validamos se a extensão do arquivo é aceita
		if (array_search($extensao, $extensoes_aceitas) === false) :
			echo "<h1>Extensão Inválida!</h1>";
			exit;
		endif;

		// Verifica se o upload foi enviado via POST
		if (is_uploaded_file($_FILES['foto']['tmp_name'])) :

			// Verifica se o diretório de destino existe, senão existir cria o diretório
			if (!file_exists("images")) :
				mkdir("images");
			endif;

			// Monta o caminho de destino com o nome do arquivo
			$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

			// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
			if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'images/' . $nome_foto)) :
				echo "Houve um erro ao gravar arquivo na pasta de destino!";
			endif;
		endif;
	else :

		$nome_foto = $foto_atual;

	endif;



	/* comprovante=:comprovante, */
	$sql = 'UPDATE tb_inventario SET nome_produto=:nome_produto, tamanho_produto=:tamanho_produto, quantidade=:quantidade, id_produto=:id_produto,  data=:data, foto_produto=:foto_produto, categoria=:categoria, local=:local, estado=:estado, responsavel=:responsavel  WHERE id_registro=:id_registro';

	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id_produto', $id_produto);
	$stm->bindValue(':nome_produto', $nome_produto);
	$stm->bindValue(':tamanho_produto', $tamanho_produto);
	$stm->bindValue(':quantidade', $quantidade);
	$stm->bindValue(':data', $data);
	$stm->bindValue(':foto_produto', $nome_foto);
	$stm->bindValue(':categoria', $categoria);
	$stm->bindValue(':local', $local);
	$stm->bindValue(':estado', $estado);
	$stm->bindValue(':responsavel', $responsavel);
	$retorno = $stm->execute();


	if ($retorno) :
		echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css'>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js'></script>
		<script src='https://kit.fontawesome.com/346a5abb17.js' crossorigin='anonymous'></script>";
		echo "<div class='container'>";
		echo "<h1>Dados do produto</h1>";

		echo "Foto Produto:" . $foto_produto . "<br>";
		echo "Codigo do registro:" . $id_registro . "<br>";
		echo "Nome:" . $nome_produto . "<br>";
		echo "Tamanho:" . $tamanho_produto . "<br>";
		echo "Quantidade:" . $quantidade . "<br>";
		echo "Codigo do Produto:" . $id_produto . "<br>";
		echo "Data do produto" . $data . "<br>";
		echo "<div style='font-size: 20px; margin-top: 30px;' class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div></div> ";
	else :
		echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
	endif;

	echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=consulta_estoque'>";
endif;


// Verifica se foi solicitada a exclusão dos dados
if ($acao == 'excluir_produto') :

	// Exclui o registro do banco de dados
	$sql = 'DELETE FROM tb_inventario WHERE id_registro = :id_registro';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id_registro', $id_registro);
	$retorno = $stm->execute();

	if ($retorno) :
		echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
	else :
		echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
	endif;

	echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=editar_estoque'>";
endif;
