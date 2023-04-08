<!DOCTYPE html>
<html>
<!-- 
<head>
   <meta charset="utf-8">
   <title>BRAVOS CAP</title>
   <meta name="google-site-verification" content="k3qfF6H52rtE3RWRs5SMXBt90HOl4yVKhFmyeILfQfA" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
   <!-- JS Comportament -->
   <!-- <script src="./assets/js/comportamento.js"></script> -->
   <!-- Styles -->
   <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> -->
   <!--  <link rel="stylesheet" type="text/css" src="./assets/css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">-->
   <!-- Custom styles for this template -->
   <!-- <link href="carousel.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css"> -->
   <!--link rel="stylesheet" type="text/css" href="css/estilo.css"--->
   <!--  Styles Galeria-->
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
   <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
   <!-- <script src="https://kit.fontawesome.com/346a5abb17.js" crossorigin="anonymous"></script> -->
   <!-- <link rel="stylesheet" href="css/pure-min.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/custom.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	 -->



   <!-- <style type="text/css">
      img {
         border-radius: 10px;
      }
   </style>

   <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=601a28315692e4001147c3da&product=inline-share-buttons" async="async"></script>

</head> --> 

<body>

   <?php
   //Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

   ini_set("display_errors", "0");
   error_reporting(E_ALL);
   /*include 'error.php';
*/

   @session_start();
   require_once('class/db.class.php');
   //require_once('class/valida.class.php');
   require_once('class/usuario.class.php');

   $usuario = new usuario();
   $isLogado = @$_SESSION['idusuario'] == '1' || @$_SESSION['idusuario'] != '1';
   $dados = $usuario->usuarioInfo(@$_SESSION['idusuario']);
   $nome = $dados['nome'];
   $saudacao = '';
   if (!empty($dados)) {
      $saudacao = 'Bem Vindo(a),' . $nome;
   }



   $usuario = new usuario();
   $isAdmin = @$_SESSION['idusuario'] == '1' ? true : false;
   $dados = $usuario->usuarioInfo(@$_SESSION['idusuario']);
   $nome = $dados['nome'];
   $saudacao = '';
   if (!empty($dados)) {
      $saudacao = 'Bem Vindo(a),' . $nome;
      $sair = ' | Sair';
   }
   //$perfil="<a href='index.php?pagina=alterar'>Perfil</a>"

   ?>


   <!-- <nav class="navbar navbar-default">
      <div class="container-fluid">
         Brand and toggle get grouped for better mobile display -->
         <!-- <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span> -->
               <!-- <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span> 
            </button>

         </div>-->
         <!-- Collect the nav links, forms, and other content for toggling -->
         <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav"> -->
               <!--<li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>-->

               <!-- <li> <a class="" href="#">
                     <img alt="Brand" src="fotos/log_transparent.png" width="20" height="" style=" margin-top: 0px; margin-left: 0px;"></a>
               </li>


               <li><a href="index.php">Home</a></li>
               <li><a href="?pagina=agenda">Agenda</a></li>
               <li><a href="?pagina=patrocinio">Seja um apoiador</a></li>
               <li><a class="dropdown-item" href="?pagina=galeria">Galeria</a></li>
               <li><a href="?pagina=contato">Contato</a></li> -->
               
               <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BRAVOS
                     <span class="caret"></span></a>
                     
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?pagina=tarefas">Tarefas</a></li>
                        <li><a href="?pagina=loja">Loja</a></li>
                        <li><a href="?pagina=parceiros">Parceria PMDF</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="dropdown-item" href="?pagina=civismo">Civismo</a></li>
                        <li><a class="dropdown-item" href="?pagina=hinos_cancoes">Hinos e Canções</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a class="dropdown-item" href="?pagina=escotismo">Escotismo</a></li>
                        <li><a class="dropdown-item" href="?pagina=hinos">Hinos</a></li>
                        <li role="separator" class="divider"></li>
                        <li> <a class="dropdown-item" href="?pagina=historico">Histórico</a></li>
                        <li><a class="dropdown-item" href="?pagina=olimpiada">Olimpíada</a></li>
                     </ul>
                     
                  </li> -->
                  
                  <!-- <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transparência<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="?pagina=transparencia">Transparência</a></li>
                     </ul>
                  </li>
                  
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Instituto<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li><a href="?pagina=quem_somos">Quem Somos</a></li>
                        <li><a href="?pagina=projetos">Projetos</a></li>
                        <li><a href="?pagina=colaboradores">Colaboradores</a></li>
                     </ul>
                  </li>
                  
                  
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin<span class="caret"></span></a>
                     
                     
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?pagina=login">Login</a></li>
                        <?php if ($isAdmin) { ?>
                           <li role="separator" class="divider"></li>
                           <li><a href="?pagina=upload">Upload</a></li>
                           <li role="separator" class="divider"></li> -->
                           <!-- <li> <a class="dropdown-item" href="?pagina=faccao">Facção</a></li>
                           <li> <a class="dropdown-item" href="?pagina=acampamento">Acampamento</a></li>
                           <li role="separator" class="divider"></li>
                           <li> <a class="dropdown-item" href="?pagina=rem">Pedido</a></li>
                           <li> <a class="dropdown-item" href="?pagina=producao">Produção</a></li>
                           <li> <a class="dropdown-item" href="?pagina=mala_direta">Mala Direta</a></li>
                           <li> <a class="dropdown-item" href="?pagina=consulta_estoque">Estoque</a></li> -->
                           <!-- <li role="separator" class="divider"></li>
                           <li> <a class="dropdown-item" href="?pagina=consulta_inventario">Inventario</a></li>
                           <li role="separator" class="divider"></li>
                           <li> <a class="dropdown-item" href="?pagina=agendamento">Agendamento</a></li>
                           <li><a class="dropdown-item" href="?pagina=aniversariantes">Aniversariantes</a></li>
                           <li role="separator" class="divider"></li>
                           <li> <a class="dropdown-item" href="?pagina=consulta_atendimento">Atendimento</a></li>
                           <li> <a class="dropdown-item" href="?pagina=consulta_pais">Familias</a></li>
                        <li> <a class="dropdown-item" href="?pagina=consulta">Assitidos</a></li>
                        <li> <a class="dropdown-item" href="?pagina=consulta_turma">Futebol</a></li>
                        <li> <a class="dropdown-item" href="?pagina=chamada">Chamada</a></li>
                        <li role="separator" class="divider"></li>
                        <li> <a class="dropdown-item" href="?pagina=logout">Logout</a></li>
                     <?php } ?>
                  </ul> -->



               <!-- <li> <?php if ($isLogado) { ?><a style="font-size:9px;" href="index.php?pagina=logout"><?= $saudacao ?> <?= $sair ?> </a></li> <?php } ?>




            </ul> -->
         <!-- /.navbar-collapse -->
         <!-- /.container- -->
         <!-- </div>
      </div>
   </nav> --> 

   <div class="container">

      <?php

      switch (@$_REQUEST['pagina']) {

         case 'chamada':
            include 'chamada.php';
            break;

         case 'cadastro_inventario':
            include 'cadastro_inventario.php';
            break;

         case 'editar_inventario':
            include 'editar_inventario.php';
            break;

         case 'consulta_inventario':
            include 'consulta_inventario.php';
            break;

         case 'grade1':
            include 'grade1.php';
            break;

         case 'boletim':
            include 'boletim.php';
            break;

         case 'editar_turma':
            include 'editar_turma.php';
            break;

         case 'consulta_turma':
            include 'consulta_turma.php';
            break;

         case 'matricula':
            include 'matricula.php';
            break;

         case 'avaliacao_pais':
            include 'avaliacao_pais.php';
            break;

         case 'avaliacao_guardioes':
            include 'avaliacao_guardioes.php';
            break;

         case 'agenda':
            include 'agenda.php';
            break;

         case 'agendamento':
            include 'agendamento.php';
            break;

         case 'cadastro_estoque':
            include 'cadastro_estoque.php';
            break;

         case 'editar_estoque':
            include 'editar_estoque.php';
            break;

         case 'consulta_estoque':
            include 'consulta_estoque.php';
            break;

         case 'faccao':
            include 'faccao.php';
            break;

         case 'anamnese':
            include 'anamnese.php';
            break;

         case 'prontuario':
            include 'prontuario.php';
            break;

         case 'consulta_atendimento':
            include 'consulta_atendimento.php';
            break;

         case 'atendimento':
            include 'atendimento.php';
            break;

         case 'upload':
            include 'planilha.php';
            break;

         case 'transparencia':
            include 'prestacaoContas.php';
            break;

         case '2018':
            include '2018.php';
            break;

         case '2019':
            include '2019.php';
            break;

         case '2020':
            include '2020.php';
            break;

         case '2021':
            include '2021.php';
            break;

         case '2022':
            include '2022.php';
            break;

         case 'rem':
            include 'pedido.php';
            break;

         case 'login':
            include 'login.php';
            break;

         case 'aniversariantes':
            include 'aniversariantes_mes.php';
            break;

         case 'patrocinio':
            include 'patrocinio.php';
            break;

         case 'projetos':
            include 'projetos.php';
            break;

         case 'carteira':
            include 'carteira.php';
            break;

         case 'cadastro':
            include 'cadastro.php';
            break;

         case 'consulta':
            include 'consulta.php';
            break;

         case 'familias':
               include 'consulta_pais.php';
               break;

         case 'tarefas':
            include 'tarefas.php';
            break;

         case 'consulta_adm':
            include 'adm.php';
            break;

         case 'relatorio':
            include  'relatorio_membros.php';
            break;

         case 'rolema':
            include 'rolema.php';
            break;

         case 'pedido':
            include 'pedido.php';
            break;

         case 'cadastro_publico':
            include 'cadastro_publico.php';
            break;

         case 'cadastrar':
            include 'cadastrar.php';
            break;

         case 'alterar':
            include 'alterar.php';
            break;

         case 'editar':
            include 'editar.php';
            break;

         case 'editar_publico':
            include 'editar_publico.php';
            break;

         case 'escotismo':
            include 'escotismo.php';
            break;

         case 'galeria':
            include 'galeria.php';
            break;

         case 'parceiros':
            include 'parceiros.php';
            break;

         case 'programacao':
            include 'programacao.php';
            break;

         case 'historico':
            include 'historico.php';
            break;

         case 'hinos':
            include 'hinos.php';
            break;

         case 'olimpiada':
            include 'olimpiada.php';
            break;

         case 'loja':
            include 'loja.php';
            break;

         case 'producao':
            include 'producao.php';
            break;

         case 'editar_loja':
            include 'editar.php';
            break;

         case 'editar':
            include 'editar_loja.php';
            break;

         case 'editar_publico':
            include 'editar_publico.php';
            break;

         case 'contato':
            include 'contato.php';
            break;

         case 'hinos_cancoes':
            include 'hinos_cancoes.php';
            break;

         case 'civismo':
            include 'civismo.php';
            break;

         case 'xadrez':
            include 'xadrez.php';
            break;

         case 'nos':
            include 'nos.php';
            break;

         case 'mala_direta':
            include 'mala_direta.php';
            break;

         case 'quem_somos':
            include 'quem_somos.php';
            break;

         case 'condominio':
            include 'condPM.php';
            break;

         case 'cardapio':
            include 'cardapio.php';
            break;

         case 'acampamento':
            include 'acampamento.php';
            break;

         case 'logout':
            include 'logout.php';
            break;

         case 'colaboradores':
            include 'colaboradores.php';
            break;

         default:
            include 'home.php';
            break;
      }


      ?>

</body>


<!--Rodapé da Pagina-->

<div id="footer" style="padding-top:20%;">
   <hr>
   <div class="text-center">
      <address id="Administração-CAP-copyright">
         <address id="version">
            <!-- ShareThis BEGIN -->
            <div class="sharethis-inline-follow-buttons"></div><!-- ShareThis END -->
            <p> Powered by <a href="https://casadeadoracaoprofetica.org.br/" title="Sistema de gerenciamento Administrativo">
                  <img src="fotos/cap_transparente.png" width="30" height="" alt="Instagram" style=" margin-top: 10px;"> CAP &reg; - </a> Ministério de Tecnologia CAP 2022
            <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br" title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
            </address>
            </p></a>



            <!--div-- class="jeg_sharelist">
                
                     <a href="https://www.instagram.com/bravoscap?r=nametag" class="jeg_btn-facebook expanded">
                     <i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>&nbsp;

                     <a href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fbravoscap.org.br" class="jeg_btn-facebook expanded">
                     <i class="fa fa-facebook-official"></i><span>Compartilhar</span></a>&nbsp;
                     
                     <a href="https://twitter.com/intent/tweet?text=BRAVOSCAP&amp;url=http%3A%2F%2Fbravoscap.org.br" class="jeg_btn-twitter expanded">
                     <i class="fa fa-twitter"></i><span>Tweet</span></a>&nbsp;
                     
                     <a href="https://api.whatsapp.com/send?phone=5561984260515&text=Bem%20vindos%20ao%20bravoscap.org.br" 
                     class="jeg_btn-whatsapp expanded">
                     <i class="fa fa-whatsapp"></i><span>Enviar</span></a>&nbsp;
                     
                     <a href="http://www.linkedin.com/shareArticle?url=http%3A%2F%2Fbravoscap.org.br" class="jeg_btn-linkedin expanded">
                     <i class="fa fa-linkedin"></i><span>Compartilhar</span></a>&nbsp;
                     
                     <a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&amp;url=http%3A%2F%2Fbravoscap.org.br" class="jeg_btn-pinterest expanded">
                     <i class="fa fa-pinterest"></i><span>Pin</span></a>
                  </-div-->
         </address>
   </div>
</div>

</html>