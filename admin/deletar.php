<?php
require_once('class/db.class.php');
require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
require_once('protege.php');
///////////////////

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');

if ($_GET['idusuario'] != 1) {
    $id = $_GET['idusuario'];
    
    
    $usuario = new usuario;
    if ($usuario->deletarPedidos($id))
        $msg = "Pedido numero = $id";
    else
        echo "Erro ao deletar pedido";
} else
    echo "Não é permitido deletar a conta de Administrador";
    

    echo "<meta http-equiv=refresh content='3;URL=index.php?pagina=pedido'>";
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Deleção de pedidos</title>
    <link rel="stylesheet" href="css/pure-min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <div align='center'><img src='fotos/excluir.png' alt='excluido' ></div>
</head>


    </head>
    <body>
<div align="center">
        <p> Registro Excluído com sucesso!</p>
        <p> <?php echo $msg ?> </p>
</div>
    </body>

<!--Rodapé da Pagina-->
<div id="footer" padding="">
    <hr>
    <div id="" align="center">
        <address id="Administração-CAP-copyright">
            <address id="version">
                <p> Powered by <a href="https://casadeadoracaoprofetica.org.br/"
                        title="Sistema de gerenciamento Administrativo">
                         <img src="fotos/cap_transparente.png"  width="30" height="" alt="Instagram" style=" margin-top: 10px;"> CAP &reg; - </a> Ministério de Tecnologia CAP
                    2020
                    <address id="webmaster-contact-information"> Contato dos <a href="mailto:fabricio.4135@gmail.com.br"
                            title="Entre em contato com o webmaster via e-mail."> Desenvolvedores </a> para sugestões
                    </address>
                </p></a>

                <div class="jeg_sharelist">
                
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
                  </div>

    </div>
</div>>
</html>