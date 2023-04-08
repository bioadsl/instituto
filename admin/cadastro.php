﻿<?php
//---

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
ini_set("display_errors", "1");
error_reporting(E_ALL);
/*include 'error.php';
*/

require 'conexao.php';
//---
require_once('class/db.class.php');
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
//require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);



?>

<!DOCTYPE html>
<html>

<div align="right">
    <p>Bem Vindo(a), <?= $dados['nome'] ?> <a href="logout.php">! &nbsp; Sair &nbsp;</a> </p>
</div>

<head>
    <meta charset="utf-8">
    <title>Cadastro BRAVOS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script LANGUAGE="javascript">
        //preenchendo o termo de adessao
        $(document).ready(function() {
            $(".nome").on("input", function() {
                var textoDigitado = $(this).val();
                var inputCusto = $(this).attr("sinc");
                $("#" + inputCusto).html(textoDigitado);
            });
        });
    </script>

</head>

<div class='container'>

    <div class="row">
        <div class="col-lg-2">
            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS'>
        </div>
        <div class="col-lg-10">
            <h1>Formulário de Alistamento</h1>
        </div>
    </div>
    <hr>
    <fieldset>
        <!-- início form BRAVOS -->

        <form class="form-group" action="action_bravos.php" method="post" id='form-contato' enctype='multipart/form-data'>
            <div class="row">
                <div class="col-lg-6">
                    <label for="nome">Selecionar Foto</label>
                    <div class="col-md-4">
                        <a href="#" class="thumbnail">
                            <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
                        </a>
                    </div>
                    <input type="file" name="foto" id="foto" value="foto" required="required">
                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="pl-saude">Nº do plano de saúde ou SUS</label>
                        <input type="text" class="form-control" id="carteirinha" name="carteirinha" placeholder="Informe o Nº da Carteirinha">
                        <span class='msg-erro msg-carteirinha'></span>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="pl-saude">Plano de saude</label>
                        <input type="text" class="form-control" id="pl-saude" name="pl-saude" placeholder="Infome o plano de saúde ou SUS">
                        <span class='msg-erro msg-pl-saude'></span>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Informe o Nº do rg">
                        <span class='msg-erro msg-rg'></span>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="cpf">RG</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Informe o Nº do cpf">
                        <span class='msg-erro msg-cpf'></span>
                    </div>

                </div>


            </div>


            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control nome" id="nome" name="nome" value="" sinc="sinc1" placeholder="Infome o Nome">
                <span class='msg-erro msg-nome'></span>
            </div>


            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="">Selecione o Sexo</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                        <span class='msg-erro msg-sexo'></span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento">
                        <span class='msg-erro msg-data'></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
                        <span class='msg-erro msg-email'></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="tp-sanguineo">Tipo Sanguíneo</label>
                    <select class="form-control" name="tp-sanguineo" id="tp-sanguineo">
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
                        <option value="">Selecione o Fator RH</option>
                        <option value="Positivo">Positivo</option>
                        <option value="Negativo">Negativo</option>
                    </select>
                    <span class='msg-erro msg-rh'></span>
                </div>



                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="peso" title="Deslise a barra até seu peso atual">Peso</label>
                        <input type="range" class="custom-range" id="peso" name="peso" value="0" min="0" max="200" oninput="display.value=value" onchange="display.value=value">
                        <input type="text" class="form-control" id="display" value="0" readonly>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="altura" title="Deslise a barra até a sua altura atual">Altura</label>
                        <input type="range" class="custom-range" id="altura" name="altura" min="0" max="3" step='.01' value='0' oninput="display2.value=value" onchange="display2.value=value">
                        <input type="text" class="form-control" id="display2" value="0" readonly>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="pai">Pai</label>
                        <input type="text" class="form-control nome" id="pai" name="pai" sinc='sinc2' placeholder="Infome o nome do seu pai">
                        <span class='msg-erro msg-pai'></span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mae">Mãe</label>
                        <input type="text" class="form-control nome" id="mae" name="mae" sinc='sinc3' placeholder="Infome o nome da sua mae">
                        <span class='msg-erro msg-mae'></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone da família">
                        <span class='msg-erro msg-telefone'></span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="celular">Celular Whatsapp</label>
                        <input type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Celular da família">
                        <span class='msg-erro msg-celular'></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="endereco">Endereço</label>
                        <textarea class="form-control" id="endereco" name="endereco" placeholder="Infome o endereço"></textarea>
                        <span class='msg-erro msg-endereco'></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proximo">Nome de um parente ou pessoa próxima</label>
                        <input type="text" class="form-control" id="proximo" name="proximo" placeholder="Infome o nome de alguém próximo a família">
                        <span class='msg-erro msg-proximo'></span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tel_proximo">Telefone</label>
                        <input type="text" class="form-control" id="tel_proximo" maxlength="12" name="tel_proximo" placeholder="Informe o fixo de alguém próximo">
                        <span class='msg-erro msg-tel_proximo'></span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cel_promixo">Celular Whatsapp</label>
                        <input type="text" class="form-control" id="cel_promixo" maxlength="13" name="cel_proximo" placeholder="Informe o Celular de alguém próximo">
                        <span class='msg-erro msg-cel_promixo'></span>
                    </div>
                </div>
            </div>
            <hr>

            <label class="form-group">
                <label for="doenca">Selecione um ou mais itens abaixo, caso o alistado possua:</label><br>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group checkbox">
                            <label><input type="checkbox" class="custom-control-label" name="alergia" id="alergia" value="sim">Alergia</label><br>
                        </div>
                        <div class="form-group checkbox">
                            <label><input type="checkbox" class="custom-control-label" name="coracao" id="coracao" value="sim">Doença de coração</label><br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group checkbox">
                            <label><input type="checkbox" class="custom-control-label" name="respiracao" id="respiracao" value="sim">Doença respiratória</label><br>
                        </div>
                        <div class="form-group checkbox">
                            <label><input type="checkbox" class="custom-control-label" name="especial" id="especial" value="sim">Necessidade especial</label><br>
                        </div>
                        <div class="form-group checkbox">
                            <label><input type="checkbox" class="custom-control-label" name="outros" id="outros" value="sim">Outros...</label><br>
                        </div>
                        <span class='msg-erro msg-doenca'></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="observacao">Descreva abaixo o que fazer em caso de emergência</label>
                    <textarea class="form-control" id="observacao" name="observacao" placeholder="Descrição dos itens acima selecionados"></textarea>
                    <span class='msg-erro msg-observacao'></span>
                </div>

                <div>
                    <label align="justify" for="adesao">Eu(Nós), <u> <span id='sinc2' name='sinc2'></span></u>,(e)
                        <u> <span id='sinc3' name='sinc3'></span></u> responsável(eis) legal pelo alistado acima <u>
                            <span id='sinc1' name='sinc1'></span></u>, autorizo(amos) a adesão ao grupo BRAVOS no
                        projeto de escotismo da CAP (Casa de Adoração Profética) e ao o Sr. Fabricio Duarte Alves RG
                        2725449 SSP/DF, tomar as medidas necessárias em caso de emergência, bem como disciplina a
                        ser aplicada em relação aos princípios trabalhados por esta iniciativa.
                    </label><br>
                </div>

                <div class="form-group checkbox">
                    <label>
                        <input type="checkbox" class="custom-control-label" name="adesao" id="adesao" value="aceito os termos" required>Estou
                        ciente dos custos necessários e aceito os termos acima descrito
                    </label><br>
                </div>


                <div class="row">
                    <div class="col-lg-3">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control" id="senha" maxlength="12" name="senha" placeholder="Informe uma senha">
                        <span class='msg-erro msg-senha'></span>
                    </div>

                    <div class="col-lg-3">
                        <label for="senha">Confirme a senha </label>
                        <input type="password" class="form-control" id="confirmacao" maxlength="12" name="confirmacao" placeholder="Confirme sua senha" onfocusout="validatePassword()">
                        <span class='msg-erro msg-confirmacao'></span>
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg-4">
                        <input type="hidden" name="acao" value="incluir">
                        <button type="submit" class="btn btn-primary" id='botao'>
                            Gravar
                        </button>
                        <a href='index.php' class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
        </form>
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


</html>