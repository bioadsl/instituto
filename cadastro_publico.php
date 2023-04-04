﻿<?php
//---
//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1
ini_set("display_errors", "1");
error_reporting(E_ALL);
/*include 'error.php';
*/

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cadastro BRAVOS</title>
    <!--<link rel="stylesheet" href="css/pure-min.css">-->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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

    <style>
        input{
            margin-top: 1em;
        }
        label{
            margin-top: 1em;
        }
    </style>

</head>
<div class='container'>
    <form class="form-group" action="action_instituto.php" method="post" id='form-contato' enctype='multipart/form-data'>

        <div class="row">
            <div class="col-lg-2">
                <label for="nome">Selecionar Foto</label>
                <div class="col-md-2">
                    <a href="#" class="thumbnail">
                        <img src="fotos/padrao.jpg" height="" width="150" id="foto-cliente">
                    </a>
                </div>
                <input type="file" name="foto" id="foto">
            </div>
            <div class="col" style="margin-top:5%;">
                <h1>Cadastro Instituto Casa</h1>
            </div>
            <img src="img/instituto.png" style="width:min-content; height:min-content"; >
        </div>
        <hr>
        <fieldset>
            <!-- início form BRAVOS -->

            <div class="row">

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="pl-saude">Nº do plano de saúde ou SUS</label>
                        <input type="text" class="form-control" id="carteirinha" name="carteirinha" placeholder="Informe o Nº da Carteirinha">
                        <span class='msg-erro msg-carteirinha'></span>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="pl-saude">Empresa do Plano de Saude</label>
                        <input type="text" class="form-control" id="pl-saude" name="pl-saude" placeholder="Nome o plano de saúde ou SUS">
                        <span class='msg-erro msg-pl-saude'></span>
                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input type="text" class="form-control" id="rg" name="rg" placeholder="Nº do RG">
                        <span class='msg-erro msg-rg'></span>
                    </div>

                </div>

                <div class="col-lg-2">

                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Nº do CPF">
                        <span class='msg-erro msg-cpf'></span>
                    </div>

                </div>

            </div>


            <div class="form-group">
                <label for="nome">Nome completo</label>
                <input type="text" class="form-control nome" id="nome" name="nome" value"" sinc="sinc1" placeholder="Infome o Nome">
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
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="pai">Escolaridade</label>
                        <input type="text" class="form-control nome" id="escolaridade" name="escolaridade" sinc='sinc2' placeholder="Infome a escolaridade">
                        <span class='msg-erro msg-pai'></span>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="mae">Escola</label>
                        <input type="text" class="form-control nome" id="mae" name="mae" sinc='sinc3' placeholder="Infome o nome da sua escola">
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
           
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="proximo">Nome de um parente ou pessoa próxima</label>
                        <input type="text" class="form-control" id="proximo" name="proximo" placeholder="Nome de alguém próximo a família">
                        <span class='msg-erro msg-proximo'></span>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="tel_proximo">Telefone</label>
                        <input type="text" class="form-control" id="tel_proximo" maxlength="12" name="tel_proximo" placeholder="Telefone fixo de alguém próximo">
                        <span class='msg-erro msg-tel_proximo'></span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="cel_promixo">Celular Whatsapp</label>
                        <input type="text" class="form-control" id="cel_promixo" maxlength="13" name="cel_proximo" placeholder="Celular de alguém próximo">
                        <span class='msg-erro msg-cel_promixo'></span>
                    </div>
                </div>
       

                <label class="form-group">
                    <label for="doenca">Selecione um ou mais itens abaixo, caso o inscrito possua:</label><br>

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
                                <label><input type="checkbox" class="custom-control-label" name="outros" id="outros" value="sim">TDH, Autismo, Outros...</label><br>
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
                    <!-- <label align="justify" for="adesao">Eu(Nós), <u> <span id='sinc2' name='sinc2'></span></u>,(e)
                        <u> <span id='sinc3' name='sinc3'></span></u> responsável(eis) legal pelo inscrito acima <u>
                            <span id='sinc1' name='sinc1'></span></u>, autorizo(amos) a adesão ao Instituto Casa
                             e ao o Sr. Washinton Souza Rodrigues de Sales RG 3725724 SSP/DF, CPF 011.991.281-39 a     
                        tomar as medidas necessárias em caso de emergência, disciplina a
                        ser aplicada em relação aos princípios trabalhados por esta iniciativa, bem como pode delegar aos apoiadores do Instituto. 
                        A presente autorização abrange o uso 
                        da imagem concediada ao Instituto Casa CNPJ 44.592.290/0001-85, podendo utiliza-la a título gratuito, de forma direta 
                        ou indireta, e a inserção em materiais para divulgação em qualquer material foto, vídeo, documentos em geral, relatórios
                        bem como em todo e quenquer veículo de comunicação tais como: emissoras de televisão, internet, jornais on-line e impressos,
                        rádio, redes sociais, entre outros correlatos com fim de demonstrar os serviços prestados pela instituição supra citada por 
                        prazo indeterminado. Por esta ser a expressão da minha declaro que autorizo o uso acima descrito, sem que nada haja a ser reclamado
                        a título de direitos conexo à imagem ora autorizada ou a qualquer outro.
                    </label><br>
                </div>

                <div class="form-group checkbox">
                    <label>
                        <input type="checkbox" class="custom-control-label" name="adesao" id="adesao" value="aceito os termos" required>Estou
                        ciente dos custos necessários e aceito os termos acima descrito
                    </label><br>
                </div> -->

                
                <div class="container mt-3">
                    <h3>Leia os termos de aceite</h3>
                    <!-- <p>Clique no botão abaixo para ver.</p> -->

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Termos de Aceite
                    </button>
                </div>
                
                <div class="row">
                 <div class="col-lg-4">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Termos de Aceite</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div>
                                    <label align="justify" for="adesao"><p>Eu(Nós), <u> <span id='sinc2' name='sinc2'></span></u>,(e)
                                        <u> <span id='sinc3' name='sinc3'></span></u> responsável(eis) legal pelo inscrito acima <u>
                                            <span id='sinc1' name='sinc1'></span></u>, autorizo(amos) a adesão ao Instituto Casa
                                        e ao o Sr. Washinton Souza Rodrigues de Sales RG 3725724 SSP/DF, CPF 011.991.281-39, a
                                        tomar as medidas necessárias em caso de emergência, disciplina a ser aplicada em relação aos 
                                        princípios trabalhados por esta iniciativa, bem como pode delegar aos apoiadores do Instituto.
                                        A presente autorização abrange o uso da imagem concediada ao Instituto Casa CNPJ 44.592.290/0001-85, 
                                        podendo utiliza-la a título gratuito, de forma direta ou indireta, e a inserção em materiais para 
                                        divulgação em qualquer material foto, vídeo, documentos em geral, relatórios bem como em todo e qualquer
                                        veículo de comunicação tais como: 
                                        <li style="list-style-type: circle;">Emissoras de televisão, </li>
                                        <li style="list-style-type: circle;">Internet, </li>
                                        <li style="list-style-type: circle;">Jornais on-line,</li>
                                        <li style="list-style-type: circle;">Impressos, </li>
                                        <li style="list-style-type: circle;">Rádio, </li>
                                        <li style="list-style-type: circle;">Redes sociais,</li>
                                        
                                        <p>entre outros correlatos com fim de demonstrar os serviços prestados pela instituição
                                        supra citada por prazo indeterminado. </p> <p>Por esta ser a expressão da minha declaro que autorizo o uso acima 
                                        descrito, sem que nada haja a ser reclamado a título de direitos conexo à imagem ora autorizada ou a 
                                        qualquer outro,  a participar do campeonatos, torneios e amistosos na modalidade esportiva de futebol, 
                                        a realizar-se em datas futuras em território nacional ou internacional.
                                        <p>Requisitos para validade deste documento:</p>
                                        <li style="list-style-type: circle;">O aceite do responsável legal e inscrição do participante menor.</li>
                                        <li style="list-style-type: circle;">Deverá ser anexada a este documento copia da carteira de identidade do responsável legal e a ficha de inscrição preenchida pelo participante.</li>
                                        <li style="list-style-type: circle;">O atleta deverá apresentar sua carteira de identidade original ou certidão de nascimento no dia do evento.</li>
                                        <li style="list-style-type: circle;">O responsável legal assume todos os riscos que poderão ocorrer com o atleta em decorrência dos jogos 
                                            por se tratar de esporte de contato isentado a organização (Instituto Casa) os apoiadores e patrocinadores 
                                            de qualquer responsabilidade que possa ocorrer decorrentes de danos materiais ou físicos.</li></p>
                                    </label><br>
                                </div>

                                
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                               
                                <input type="button" class="btn btn-success" value="Imprimir Termos de aceite" onClick="window.print()"/>
                                
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
                    <div class="form-group checkbox">
                        <label>
                            <input type="checkbox" class="custom-control-label" name="adesao" id="adesao" value="aceito os termos" required>Estou
                            ciente dos custos necessários e aceito os termos acima descrito.<br>
                            
                        </label><br>
                    </div>
                 </div>
                        <div class="col-lg-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" maxlength="12" name="senha" placeholder="Informe uma senha">
                            <span class='msg-erro msg-senha'></span>
                        </div>

                        <div class="col-lg-4">
                            <label for="senha">Confirme a senha </label>
                            <input type="password" class="form-control" id="confirmacao" maxlength="12" name="confirmacao" placeholder="Confirme sua senha" onfocusout="validatePassword()">
                            <span class='msg-erro msg-confirmacao'></span>
                        </div>

                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="hidden" name="acao" value="incluir_publico">
                            <input type="hidden" name="status" value="Ativo">
                            <button type="submit" class="btn btn-primary" id='botao'>
                                Gravar
                            </button>
                            <a href='index.php' class="btn btn-danger">Cancelar</a>
                        </div>
                    </div>
    </form>
    </fieldset>
</div>
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

    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>

</html>