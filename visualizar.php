<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
/*include 'error.php';*/

// Recebe o id do cliente do cliente via GET
$id_cliente = (isset($_GET['id'])) ? $_GET['id'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($id_cliente) && is_numeric($id_cliente)):

	// Captura os dados do cliente solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, foto, carteirinha, pl_saude, nome, sexo, dt_nascimento, email, tp_sanguineo, ft_rh, peso, altura, pai, mae, telefone, celular, endereco, alergia, coracao, respiracao, especial, outros, observacao, proximo, tel_proximo, cel_proximo, adesao, senha  FROM tab_bravos WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_cliente);
	$stm->execute();
	$cliente = $stm->fetch(PDO::FETCH_OBJ);


//---
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

//---

?>
<!DOCTYPE html>
<html>

<div align="right">
    <p>Bem Vindo(a), <?= $dados['nome'] ?> <a href="logout.php">! &nbsp; Sair &nbsp;</a> </p>
</div>
<html>

<head>
    <meta charset="utf-8">
    <title>Edição de Membros</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <div class='container'>

        <div class="row">
            <div class="col-lg-2">
                <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS'>
            </div>
            <div class="col-lg-10">
                <h1>Formulário - Edição de Membros</h1>
            </div>
        </div>
        <hr>
        <fieldset>

            <?php if(empty($cliente)): ?>
            <h3 class="text-center text-danger">Membro não encontrado!</h3>
            <?php else: ?>

            <form action="action_bravos.php" method="post" id='form-contato' enctype='multipart/form-data'>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="nome">Alterar Foto</label>
                        <div class="col-md-2">
                            <a href="#" class="thumbnail">

                                <img src="fotos/<?=$cliente->foto?>" height="190" width="150" id="foto-cliente">
                            </a>
                        </div>
                        <input type="file" name="foto" id="foto" value="foto" >
                    </div>

                    <div class="col-lg-3">

                        <div class="form-group">
                            <label for="pl-saude">Nº do plano de saúde ou SUS</label>
                            <input type="text" class="form-control" id="carteirinha" name="carteirinha"
                                value="<?=$cliente->carteirinha?>" placeholder="Informe o Nº da Carteirinha">
                            <span class='msg-erro msg-carteirinha'></span>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="pl-saude">Plano de saude</label>
                            <input type="text" class="form-control" id="pl-saude" name="pl-saude"
                            value="<?=$cliente->pl_saude?>" placeholder="Infome o plano de saúde ou SUS">
                            <span class='msg-erro msg-pl-saude'></span>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control nome" id="nome" name="nome" value="<?=$cliente->nome?>"
                        placeholder="Infome o Nome">
                    <span class='msg-erro msg-nome'></span>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" name="sexo" id="sexo">
                                <option value="<?=$cliente->sexo?>" selected><?=$cliente->sexo?></option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                            </select>
                            <span class='msg-erro msg-sexo'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="text" class="form-control" id="data_nascimento" maxlength="10"
                            value="<?=$cliente->dt_nascimento?>" name="data_nascimento" >
                            <span class='msg-erro msg-data'></span>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?=$cliente->email?>" placeholder="Informe o E-mail">
                            <span class='msg-erro msg-email'></span>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="tp-sanguineo">Tipo Sanguíneo</label>
                        <select class="form-control" name="tp-sanguineo" id="tp-sanguineo">
                            <option value="<?=$cliente->tp_sanguineo?>"><?=$cliente->tp_sanguineo?></option>
                            <option value="">Selecione o Tipo Sanguíneo</option>
                            <option value="AB">AB</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="O">O</option>
                        </select>
                        <span class='msg-erro msg-tp-sanguineo'></span>
                    </div>

                    <div class="col-lg-3">
                        <label for="rh">Fator RH</label>
                        <select class="form-control" name="rh" id="rh">
                            <option value="<?=$cliente->ft_rh?>"><?=$cliente->ft_rh?></option>
                            <option value="">Selecione o Fator RH</option>
                            <option value="Positivo">Positivo</option>
                            <option value="Negativo">Negativo</option>
                        </select>
                        <span class='msg-erro msg-rh'></span>
                    </div>
                    
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="peso" title="Deslise a barra até seu peso atual">Peso</label>
                            <input type="range" class="custom-range" id="peso" name="peso" value="<?=$cliente->peso?>" min="0" max="200"
                                oninput="display.value=value" onchange="display.value=value">
                            <input type="text" class="form-control" id="display" value="<?=$cliente->peso?>" readonly>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="altura" title="Deslise a barra até a sua altura atual">Altura</label>
                            <input type="range" class="custom-range" id="altura" name="altura" min="0" max="3" value="<?=$cliente->altura?>"
                                step='.01' oninput="display2.value=value" onchange="display2.value=value">
                            <input type="text" class="form-control" id="display2" value="<?=$cliente->altura?>"
                                readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="pai">Pai</label>
                            <input type="text" class="form-control nome" id="pai" name="pai" value="<?=$cliente->pai?>"
                                placeholder="Infome o nome do seu pai">
                            <span class='msg-erro msg-pai'></span>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="mae">Mãe</label>
                            <input type="text" class="form-control nome" id="mae" name="mae" value="<?=$cliente->mae?>"
                                placeholder="Infome o nome da sua mae">
                            <span class='msg-erro msg-mae'></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone"
                                value="<?=$cliente->telefone?>" placeholder="Informe o Telefone da família">
                            <span class='msg-erro msg-telefone'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="celular">Celular Whatsapp</label>
                            <input type="celular" class="form-control" id="celular" maxlength="13" name="celular"
                                value="<?=$cliente->celular?>" placeholder="Informe o Celular da família">
                            <span class='msg-erro msg-celular'></span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <textarea class="form-control" id="endereco" name="endereco"
                                placeholder="<?=$cliente->endereco?>"></textarea>
                            <span class='msg-erro msg-endereco'></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="proximo">Nome de um parente ou pessoa próxima</label>
                            <input type="text" class="form-control" id="proximo" name="proximo"
                                value="<?=$cliente->proximo?>" placeholder="Infome o nome de alguém próximo a família">
                            <span class='msg-erro msg-proximo'></span>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="tel_proximo">Telefone</label>
                            <input type="text" class="form-control" id="tel_proximo" maxlength="12" name="tel_proximo"
                                value="<?=$cliente->tel_proximo?>" placeholder="Informe o fixo de alguém próximo">
                            <span class='msg-erro msg-tel_proximo'></span>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="cel_promixo">Celular Whatsapp</label>
                            <input type="text" class="form-control" id="cel_promixo" maxlength="13" name="cel_proximo"
                                value="<?=$cliente->cel_proximo?>" placeholder="Informe o Celular de alguém próximo">
                            <span class='msg-erro msg-cel_promixo'></span>
                        </div>
                    </div>
                </div>
                <hr>

                    <div class="form-group">
                        <label for="observacao">Descreva abaixo o que fazer em caso de emergência</label>
                        <textarea class="form-control" id="observacao" name="observacao" value="<?=$cliente->observacao?>"
                            placeholder="<?=$cliente->observacao?>"></textarea>
                        <span class='msg-erro msg-observacao'></span>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="senha">Senha</label>
                            <input type="text" class="form-control" id="senha" maxlength="12" name="senha"
                            value="<?=$cliente->senha?>" placeholder="Informe uma senha">
                            <span class='msg-erro msg-senha'></span>
                        </div>

                        <div class="col-lg-3">
                            <label for="senha">Confirme a senha </label>
                            <input type="text" class="form-control" id="confirmacao" maxlength="12"
                            value="<?=$cliente->senha?>"  name="confirmacao" placeholder="Confirme sua senha" onfocusout="validatePassword()">
                            <span class='msg-erro msg-confirmacao'></span>
                        </div>

                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="hidden" name="acao" value="editar">
                            <input type="hidden" name="id" value="<?=$cliente->id?>">
                            <input type="hidden" name="foto_atual" value="<?=$cliente->foto?>">
                            <button type="submit" class="btn btn-primary" id='botao'>
                                Gravar
                            </button>
                            <a href='consulta.php' class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>

            </form>


          <?php endif; ?>

            <?php endif; ?>


       </fieldset>
    </div>
    <script type="text/javascript" src="js/custom.js"></script>

    <script>
    //validação de confirmação de senha
    var senha = document.getElementById("senha"),
        confirmacao = document.getElementById("confirmacao");

    function validatePassword() {

        if (senha.value != confirmacao.value) {
            alert("Senhas diferentes!");
            confirmacao.value = "";
            senha.value = "";
            senha.focus();
            return false;
        }
    }
    </script>


</body>
<!--Rodapé da Pagina-->
<div id="footer" padding="20">
    <hr>
    <div id="" align="center">
        <address id="Administração-CAP-copyright">
            <address id="version">
                <p> Powered by <a href="http://casadeadoracaoprofetica.com.br"
                        title="Sistema de gerenciamento Administrativo"> CAP &reg; - </a> Ministério de Tecnologia CAP
                    2018
                    <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br"
                            title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
                    </address>
                </p></a>
    </div>
</div>

</html>