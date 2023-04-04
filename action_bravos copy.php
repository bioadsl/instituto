<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>
	<div class='container box-mensagem-crud'>
		<?php
		//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
		ini_set("display_errors", "1");
		error_reporting(E_ALL);
		/*include 'error.php';*/
		require 'conexao.php';

		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();

		// Recebe os dados enviados pela submissão do cadastro
		$acao  				= (isset($_POST['acao'])) 				? $_POST['acao'] : '';
		$id    				= (isset($_POST['id'])) 				? $_POST['id'] : '';
		$carteirinha  		= (isset($_POST['carteirinha'])) 		? $_POST['carteirinha'] : '';
		$pl_saude  			= (isset($_POST['pl-saude'])) 			? $_POST['pl-saude'] : '';
		$nome  				= (isset($_POST['nome'])) 				? $_POST['nome'] : '';
		$sexo  				= (isset($_POST['sexo'])) 				? $_POST['sexo'] : '';
		$dt_nascimento   	= (isset($_POST['data_nascimento'])) 	? $_POST['data_nascimento'] : '';
		$email  			= (isset($_POST['email'])) 				? $_POST['email'] : '';
		$tp_sanguineo  		= (isset($_POST['tp-sanguineo'])) 		? $_POST['tp-sanguineo'] : '';
		$ft_rh 				= (isset($_POST['rh'])) 				? $_POST['rh'] : '';
		$peso  				= (isset($_POST['peso'])) 				? $_POST['peso'] : '';
		$altura				= (isset($_POST['altura'])) 			? $_POST['altura'] : '';
		$pai  				= (isset($_POST['pai'])) 				? $_POST['pai'] : '';
		$mae  				= (isset($_POST['mae'])) 				? $_POST['mae'] : '';
		$telefone			= (isset($_POST['telefone'])) 			? $_POST['telefone'] : '';
		$celular  			= (isset($_POST['celular'])) 			? $_POST['celular'] : '';
		$endereco  			= (isset($_POST['endereco'])) 			? $_POST['endereco'] : '';
		$celular    		= (isset($_POST['celular'])) 			? $_POST['celular'] : '';
		$alergia  			= (isset($_POST['alergia'])) 			? $_POST['alergia'] : '';
		$coracao  			= (isset($_POST['coracao'])) 			? $_POST['coracao'] : '';
		$respiracao  		= (isset($_POST['respiracao'])) 		? $_POST['respiracao'] : '';
		$especial  			= (isset($_POST['especial'])) 			? $_POST['especial'] : '';
		$outros  			= (isset($_POST['outros'])) 			? $_POST['outros'] : '';
		$observacao  		= (isset($_POST['observacao'])) 		? $_POST['observacao'] : '';
		$proximo  			= (isset($_POST['proximo'])) 			? $_POST['proximo'] : '';
		$tel_proximo  		= (isset($_POST['tel_proximo'])) 		? $_POST['tel_proximo'] : '';
		$cel_proximo  		= (isset($_POST['cel_proximo'])) 		? $_POST['cel_proximo'] : '';
		$adesao  			= (isset($_POST['adesao'])) 			? $_POST['adesao'] : '';
		$senha				= (isset($_POST['senha'])) 				? $_POST['senha'] : '';
		$foto_atual		 	= (isset($_POST['foto_atual'])) 		? $_POST['foto_atual'] : '';
		$foto		  		= (isset($_POST['foto'])) 				? $_POST['foto'] : '';
		$rg		 			= (isset($_POST['rg'])) 				? $_POST['rg'] : '';
		$cpf		  		= (isset($_POST['cpf'])) 				? $_POST['cpf'] : '';
		$id_atendimento		= (isset($_POST['id_atendimento'])) 	? $_POST['id_atendimento'] : '';
		$status				= (isset($_POST['status'])) 			? $_POST['status'] : '';
		$escolaridade		= (isset($_POST['escolaridade'])) 		? $_POST['escolaridade'] : '';
		$escola				= (isset($_POST['escola'])) 			? $_POST['escola'] : '';
		// Recebe os dados enviados pela submissão da pedido
		$acao_pedido  				= (isset($_POST['acao_pedido'])) 				? $_POST['acao_pedido'] : '';
		$nome_pedido  				= (isset($_POST['nome_pedido'])) 				? $_POST['nome_pedido'] : '';
		$tamanho_pedido  			= (isset($_POST['tamanho_pedido'])) 			? $_POST['tamanho_pedido'] : '';
		$email_pedido  				= (isset($_POST['email_pedido'])) 			? $_POST['email_pedido'] : '';
		$quantidade  				= (isset($_POST['quantidade'])) 			? $_POST['quantidade'] : '';
		$cel_pedido					= (isset($_POST['cel_pedido'])) 			    ? $_POST['cel_pedido'] : '';
		$comprovante				= (isset($_FILES['comprovante'])) 			? $_FILES['comprovante'] : '';


		$senha_cripto = sha1($senha);
		$data = date('Y-m-d H:i:s');
		$situacao_id = '1';
		$niveis_acesso_id = '4';
		$created = $data;
		$modified = $data;
		$ultimoAcesso = $data;


		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == '') :
			$mensagem .= '<li>ID do registros desconhecido.</li>';
		endif;

		// Se for ação diferente de excluir valida os dados obrigatórios
		if ($acao != 'excluir') :
			if ($nome == '' || strlen($nome) < 3) :
				$mensagem .= '<li>Favor preencher o Nome.</li>';
			endif;

			if ($email == '') :
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
				$mensagem .= '<li>Formato do E-mail inválido.</li>';
			endif;

			if ($dt_nascimento == '') :
				$mensagem .= '<li>Favor preencher a Data de Nascimento.</li>';
			//else:
			//	$data = explode('-', $dt_nascimento);
			//if (!checkdate($data[0], $data[1], $data[2])):
			//	$mensagem .= '<li>Formato da Data de Nascimento inválido.</li>';
			//endif;
			endif;

			if ($telefone == '') :
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
			elseif (strlen($telefone) < 10) :
				$mensagem .= '<li>Formato do Telefone inválido.</li>';
			endif;

			if ($celular == '') :
				$mensagem .= '<li>Favor preencher o Celular.</li>';
			elseif (strlen($celular) < 11) :
				$mensagem .= '<li>Formato do Celular inválido.</li>';
			endif;

			if ($mensagem != '') :
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>" . $mensagem . "</div> ";
				exit;
			endif;

			// Constrói a data no formato ANSI yyyy/mm/dd
			$data_temp = explode('-', $dt_nascimento);
			$data_ansi = $data_temp[2] . '-' . $data_temp[1] . '-' . $data_temp[0];
		endif;
		//		echo 'DATA-TEMP==>'; var_dump($data_temp);
		//		echo '<br>DT_NASCIMENTO==>';	var_dump($dt_nascimento);
		//		echo '<br>DATA-ANSI==>';	var_dump($data_ansi);
		//		echo '<br>DATA==>';	var_dump($data);
		// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir') :

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
					if (!file_exists("fotos")) :
						mkdir("fotos");
					endif;

					// Monta o caminho de destino com o nome do arquivo
					$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
					if (!move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/" . $nome_foto)) :
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			endif;


			$sql = 'INSERT INTO tab_bravos (foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha, rg, cpf, id_atendimento, escolaridade, escola) VALUES (:foto, :carteirinha, :pl_saude, :nome, :sexo, :dt_nascimento, :email, :tp_sanguineo, :ft_rh, :peso, :altura, :pai, :mae, :telefone, :celular, :endereco, :alergia, :coracao, :respiracao, :especial, :outros, :observacao, :proximo, :tel_proximo, :cel_proximo, :adesao, :senha, :rg, :cpf, :id_atendimento, :escolaridade, :escola)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':carteirinha', $carteirinha);
			$stm->bindValue(':pl_saude', $pl_saude);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':dt_nascimento', $dt_nascimento);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':tp_sanguineo', $tp_sanguineo);
			$stm->bindValue(':ft_rh', $ft_rh);
			$stm->bindValue(':peso', $peso);
			$stm->bindValue(':altura', $altura);
			$stm->bindValue(':pai', $pai);
			$stm->bindValue(':mae', $mae);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':alergia', $alergia);
			$stm->bindValue(':coracao', $coracao);
			$stm->bindValue(':respiracao', $respiracao);
			$stm->bindValue(':especial', $especial);
			$stm->bindValue(':outros', $outros);
			$stm->bindValue(':observacao', $observacao);
			$stm->bindValue(':proximo', $proximo);
			$stm->bindValue(':tel_proximo', $tel_proximo);
			$stm->bindValue(':cel_proximo', $cel_proximo);
			$stm->bindValue(':adesao', $adesao);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':rg', $rg);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':id_atendimento', $id_atendimento);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':escolaridade', $escolaridade);
			$stm->bindValue(':escola', $escola);
			$retorno = $stm->execute();


			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=consulta.php'>";
		endif;

		if ($acao == 'incluir_publico') :

			$nome_foto = 'padrao.jpg';
			if (isset($_FILES['foto']) || $_FILES['foto']['size'] > 0) :

				$extensoes_aceitas = array('tif', 'gif', 'bmp', 'png', 'svg', 'jpeg', 'jpg');
				$extensao = strtolower(end(explode(".", $_FILES['foto']['name'])));

				// Validamos se a extensão do arquivo é aceita
				if (array_search($extensao, $extensoes_aceitas) === false) :
					echo "<h1>O Campo da foto é obrigatório!</h1>";
					exit;
				endif;

				// Verifica se o upload foi enviado via POST
				if (is_uploaded_file($_FILES['foto']['tmp_name'])) :

					// Verifica se o diretório de destino existe, senão existir cria o diretório
					if (!file_exists("fotos")) :
						mkdir("fotos");
					endif;

					// Monta o caminho de destino com o nome do arquivo
					$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
					if (!move_uploaded_file($_FILES['foto']['tmp_name'], "fotos/" . $nome_foto)) :
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			endif;


			$sql = 'INSERT INTO tab_bravos (foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha, rg, cpf, id_atendimento, status, escolaridade, escola)
			VALUES (:foto, :carteirinha, :pl_saude, :nome, :sexo, :dt_nascimento, :email, :tp_sanguineo, :ft_rh, :peso, :altura, :pai, :mae, :telefone, :celular, :endereco, :alergia, :coracao, :respiracao, :especial, :outros, :observacao, :proximo, :tel_proximo, :cel_proximo, :adesao, :senha, :rg, :cpf, :id_atendimento, :status, escolaridade, escola)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':carteirinha', $carteirinha);
			$stm->bindValue(':pl_saude', $pl_saude);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':dt_nascimento', $dt_nascimento);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':tp_sanguineo', $tp_sanguineo);
			$stm->bindValue(':ft_rh', $ft_rh);
			$stm->bindValue(':peso', $peso);
			$stm->bindValue(':altura', $altura);
			$stm->bindValue(':pai', $pai);
			$stm->bindValue(':mae', $mae);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':alergia', $alergia);
			$stm->bindValue(':coracao', $coracao);
			$stm->bindValue(':respiracao', $respiracao);
			$stm->bindValue(':especial', $especial);
			$stm->bindValue(':outros', $outros);
			$stm->bindValue(':observacao', $observacao);
			$stm->bindValue(':proximo', $proximo);
			$stm->bindValue(':tel_proximo', $tel_proximo);
			$stm->bindValue(':cel_proximo', $cel_proximo);
			$stm->bindValue(':adesao', $adesao);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':rg', $rg);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':id_atendimento', $id_atendimento);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':escolaridade', $escolaridade);
			$stm->bindValue(':escola', $escola);
			$retorno = $stm->execute();

			if ($retorno) :

				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;

		// 	$sql = 'INSERT INTO  users2 ( idusuario ,  nome ,  email ,  senha ,  situacao_id ,  niveis_acesso_id ,  created ,  modified ,  ultimoAcesso ) VALUES (:idusuario , :nome, :email, :senha , :situacao_id, :niveis_acesso_id, :created , :modified, :ultimoAcesso)';

		// 	$stm = $conexao->prepare($sql);
		// 	$stm->bindValue(':idusuario', $id);
		// 	$stm->bindValue(':nome', $nome);
		// 	$stm->bindValue(':email', $email);
		// 	$stm->bindValue(':senha', $senha_cripto);
		// 	$stm->bindValue(':situacao_id', $situacao_id);
		// 	$stm->bindValue(':niveis_acesso_id',  $niveis_acesso_id);
		// 	$stm->bindValue(':created', $created);
		// 	$stm->bindValue(':modified', $modified);
		// 	$stm->bindValue(':ultimoAcesso', $ultimoAcesso);
		// 	$rtn = $stm->execute();

		// 	if ($rtn) :

		// 		echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		// 	else :
		// 		echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";

		// 	endif;

		// 	echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		// endif;






		// Verifica se foi solicitada a edição de dados
		if ($acao == 'editar') :

			if (isset($_FILES['foto']) && $_FILES['foto']['size'] > 0) :

				// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
				if ($foto_atual <> 'padrao.jpg') :
					unlink("fotos/" . $foto_atual);
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
					if (!file_exists("fotos")) :
						mkdir("fotos");
					endif;

					// Monta o caminho de destino com o nome do arquivo
					$nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];

					// Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
					if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $nome_foto)) :
						echo "Houve um erro ao gravar arquivo na pasta de destino!";
					endif;
				endif;
			else :

				$nome_foto = $foto_atual;

			endif;

			//try { } catch(PDOException $e) { echo 'Error: ' . $e->getMessage();}

			$sql = 'UPDATE tab_bravos SET carteirinha=:carteirinha, pl_saude=:pl_saude, nome=:nome, sexo=:sexo, dt_nascimento=:dt_nascimento, email=:email, tp_sanguineo=:tp_sanguineo, ft_rh=:ft_rh, peso=:peso, altura=:altura, pai=:pai, mae=:mae, telefone=:telefone, celular=:celular, endereco=:endereco, alergia=:alergia, coracao=:coracao, respiracao=:respiracao, especial=:especial, outros=:outros, observacao=:observacao, proximo=:proximo, tel_proximo=:tel_proximo, cel_proximo=:cel_proximo, adesao=:adesao, senha=:senha, foto=:foto, rg=:rg, cpf=:cpf, id_atendimento=:id_atendimento, status=:status, escolaridade=:escolaridade, escola=:escola WHERE id = :id';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':carteirinha', $carteirinha);
			$stm->bindValue(':pl_saude', $pl_saude);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':dt_nascimento', $dt_nascimento);
			$stm->bindValue(':email', $email);
			$stm->bindValue(':tp_sanguineo', $tp_sanguineo);
			$stm->bindValue(':ft_rh', $ft_rh);
			$stm->bindValue(':peso', $peso);
			$stm->bindValue(':altura', $altura);
			$stm->bindValue(':pai', $pai);
			$stm->bindValue(':mae', $mae);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':celular', $celular);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':alergia', $alergia);
			$stm->bindValue(':coracao', $coracao);
			$stm->bindValue(':respiracao', $respiracao);
			$stm->bindValue(':especial', $especial);
			$stm->bindValue(':outros', $outros);
			$stm->bindValue(':observacao', $observacao);
			$stm->bindValue(':proximo', $proximo);
			$stm->bindValue(':tel_proximo', $tel_proximo);
			$stm->bindValue(':cel_proximo', $cel_proximo);
			$stm->bindValue(':adesao', $adesao);
			$stm->bindValue(':senha', $senha);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':id', $id);
			$stm->bindValue(':rg', $rg);
			$stm->bindValue(':cpf', $cpf);
			$stm->bindValue(':id_atendimento', $id_atendimento);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':escolaridade', $escolaridade);
			$stm->bindValue(':escola', $escola);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=?pagina=consulta'>";
		endif;

		// Verifica se foi solicitada a exclusão dos dados
		if ($acao == 'excluir') :

			// Captura o nome da foto para excluir da pasta
			$sql = "SELECT foto FROM tab_bravos WHERE id = :id AND foto <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$stm->execute();
			$cliente = $stm->fetch(PDO::FETCH_OBJ);

			if (!empty($cliente) && file_exists('fotos/' . $cliente->foto)) :
				unlink("fotos/" . $cliente->foto);
			endif;

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_bravos WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=consulta.php'>";
		endif;

		if ($acao == 'incluir_pedido') :

			function salvarImagem($imagem)
			{
				if (isset($imagem)) {
					$dado = strtolower(substr($imagem['name'], -4));
					$novo_nome = date('dmY') . $dado;
					$local = "fotos/";
					$valor = move_uploaded_file($imagem['tmp_name'], $local . $novo_nome);
					$resultado = "Arquivo Enviado com Sucesso!";
				} else {
					$resultado = "Erro ao Enviar o Arquivo!";
				}
				return $resultado;
			}

			$deposito = salvarImagem($comprovante);
			var_dump($deposito);


			$sql = 'INSERT INTO tab_pedido (nome_pedido, tamanho_pedido, email_pedido, quantidade, cel_pedido, comprovante ) VALUES (:nome_pedido, :tamanho_pedido, :email_pedido, :quantidade, :cel_pedido, :comprovante)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome_pedido', $nome_pedido);
			$stm->bindValue(':tamanho_pedido', $tamanho_pedido);
			$stm->bindValue(':email_pedido', $email_pedido);
			$stm->bindValue(':quantidade', $quantidade);
			$stm->bindValue(':cel_pedido', $cel_pedido);
			$stm->bindValue(':comprovante', $deposito);
			$retorno = $stm->execute();


			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=consulta.php'>";
		endif;

		if ($acao == 'editar_pedido') :

			$sql = 'UPDATE tab_pedido SET nome_pedido=:nome_pedido, tamanho_pedido=:tamanho_pedido, email_pedido=:email_pedido, quantidade=:quantidade, cel_pedido=:cel_pedido, comprovante=:comprovante WHERE id = :id';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome_pedido', $nome_pedido);
			$stm->bindValue(':tamanho_pedido', $tamanho_pedido);
			$stm->bindValue(':email_pedido', $email_pedido);
			$stm->bindValue(':quantidade', $quantidade);
			$stm->bindValue(':cel_pedido', $cel_pedido);
			$stm->bindValue(':comprovante', $comprovante);
			$retorno = $stm->execute();

			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=consulta.php'>";
		endif;

		if ($acao == 'excluir_pedido') :

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_pedido WHERE id = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();
			if ($retorno) :
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
			else :
				echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=consulta.php'>";
		endif;

		?>

	</div>
</body>

</html>