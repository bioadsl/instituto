
<?php


ini_set("display_errors", "0");
error_reporting(E_ALL);

require 'conexao.php';
require_once('class/db.class.php');
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente o administrador pode ter acesso a esta página.
// O administrador é o primeiro usuário cadastrado, ou seja, o usuário com id = 1
// Protege a página
//require_once('protege.php');
///////////////////

// $usuario_sessao = new usuario();
// $no_sessao_usuario = $usuario_sessao->usuarioInfo($_SESSION['idusuario']);

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

if (@$_SESSION['idusuario'] != 1)
    header('Location: login.php');


$usuario = new usuario();
$data = $usuario->todosPedidosInfo();


$conexao = conexao::getInstance();
$sql = "SELECT distinct count(id_pedido) as total_registros from tb_pedido WHERE situacao <> 'Reservado'  and  situacao <> 'Entregue'";
$stm = $conexao->prepare($sql);
$stm->execute();
//$stm->bindValue(':total_registros', $total_registros);
$total = $stm->fetchAll(PDO::FETCH_OBJ);

$conexao1 = conexao::getInstance();
$sql = 'SELECT distinct remessa from tb_pedido';
$stm = $conexao1->prepare($sql);
$stm->execute();
//$stm->bindValue(':remessas', $remessas);
$remessa = $stm->fetchAll(PDO::FETCH_OBJ)



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedidos</title>

<style>
.container {
  width: 70%;
  margin: 0 auto;
}

.form-contact {
  width: 100%;
  font-family: "Arial", Times, serif;
}

.form-contact-input {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 40px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
}

.form-contact-textarea {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 200px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
  padding-top: 16px;
  padding-left: 0;
  padding-right: 0;
  font-family: "Arial", Times, serif;
}

.form-contact-button {
  width: 100%;
  font-size: 18px;
  border-radius: 4px;
  color: #fff;
  height: 40px;
  opacity: .8;
  margin-bottom: 20px;
  cursor: pointer;
  background: #B22222;
  display: block;
  border: none;
  border-bottom: 1px solid #500707;
  border-right: 1px solid #500707;
  transition: 1s;
}

.form-contact-button:hover {
  opacity: 1;
}


.img{
    border-radius: 0;
}


 .border-radius-none{
    border-radius: 0;
} 

</style>


    </head>

    <div class="row">
        <div class="col-lg-4">
            <img src='./fotos/logo.jpg' width="130" alt='logo BRAVOS' style="margin-left:100px;">
        </div>
        <div class="col-lg-8" style="margin-top: 30px;">
            <h1>Pedidos</h1>
        </div>
    </div>
    <hr>

    <div class="container-fluid">

            <?php if(!empty($data)):?>
                <div class="row">   
                 <!-- <?php foreach($remessa as $remessas):?>
                    <div class="col-sm-4">
                         <p style="font-size: 30px;"><b>Remessa:<?=$remessas->remessa;?></b></p></div> 
                    <?php endforeach; ?> -->

                    <?php foreach($total as $ttl):?>
                     <div class="col-sm-4">
                            <p style="font-size: 30px;">Total de pedidos:<?=$ttl->total_registros;?></p></div> 
                            <div class="col-sm-4">
                        <p style="font-size: 30px;">QDT de malha:<?=$ttl->total_registros/4;?> Kg</p></div>
                    <?php endforeach; ?>
                   
             </div>     




           <div id="divConteudo">
                        <table class="table table-hover able-responsive-sm" id="tabela" >
                            <thead>
                            <tr class='active'>
                                <th class="col-sm-auto" scope="col">Remessa</th>
                                <th class="col-sm-auto" scope="col">Nº</th>
                                <th class="col-sm-auto" scope="col">Produto</th>
                                <th class="col-sm-auto" scope="col">Data</th>
                                <th class="col-sm-auto" scope="col">Comprovante</th>
                                <th class="col-lg-auto" scope="col">Nome</th>
                                <th class="col-sm-auto" scope="col">Tamanho</th>
                                <th class="col-md-auto" scope="col">Email</th>
                                <th class="col-sm-auto" scope="col">QDT</th>
                                <th class="col-sm-auto" scope="col">Celular</th>
                                <th class="col-sm-auto" scope="col">Status</th>
                                <th class="col-sm-auto" scope="col">Situação</th>
                                <th class="col-lg-auto" scope="col">Obs</th>
                                <th class="col-sm-auto" scope="col">Ações</th>
                                                                       
                                </tr>

                                <tr class='active'>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna1"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna2"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna3"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna4"/></th>
                                <th class="col-lg-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna5"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna6"/></th>
                                <th class="col-md-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna7"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna8"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna9"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna10"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna11"/></th>
                                <th class="col-sm-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna12"/></th>
                                <th class="col-lg-auto" scope="col"><input class="form-contact-input" type="text" id="txtColuna12"/></th>
                                <th></th>
                                                                       
                                </tr>
                            </thead>

                            
                        <?php foreach ($data as $usuario): ?>
                                
                                    
                                    <tbody>
                                        <tr class="table-responsive">
                                        <td class="col-sm-auto"><?= $usuario['remessa'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['id_pedido'] ?></td>
                                        <td class="col-sm-auto">00<?= $usuario['id_produto'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['data_pedido'] ?></td>
                                        <td class="col-sm-auto"><img src='<?= $usuario['comprovante'] ?>' height='' width='30'></td>
                                        <td class="col-lg-auto"><?= $usuario['nome_pedido'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['tamanho_pedido'] ?></td>
                                        <td class="col-md-auto"><?= $usuario['email_pedido'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['quantidade'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['cel_pedido'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['status'] ?></td>
                                        <td class="col-sm-auto"><?= $usuario['situacao'] ?></td>
                                        <td class="col-lg-auto"><?= $usuario['observacao'] ?></td>
                                        
                                            
                                            <td>
                                                    <a href="editar_loja.php?id_pedido=<?= $usuario['id_pedido'] ?>"><span class="glyphicon glyphicon-edit" title="Editar Registro"> </a> 
                                                    <a href="deletar.php?idusuario=<?= $usuario['id_pedido'] ?>" class="confirmacao"> <span class="glyphicon glyphicon-remove" title="Excluir Registro">  </a>                                        </a>
                                            </td>
                                        </tr>
                                        
                                </tbody>  
                                <?php endforeach; ?>

            </table>

            </div>
                                <?php  endif; ?>
                                            
                                            <script type="text/javascript">
                                            var elems = document.getElementsByClassName('confirmacao');
                                            var confirmIt = function (e) {
                                            if (!confirm('Tem certeza ?')) 
                                                e.preventDefault();
                                            };
                                            for (var i = 0, l = elems.length; i < l; i++) {
                                                elems[i].addEventListener('click', confirmIt, false);
                                            }
                                            </script>

                                <script>
                                $(function(){
                                    $("#tabela input").keyup(function(){       
                                        var index = $(this).parent().index();
                                        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
                                        var valor = $(this).val().toUpperCase();
                                        $("#tabela tbody tr").show();
                                        $(nth).each(function(){
                                            if($(this).text().toUpperCase().indexOf(valor) < 0){
                                                $(this).parent().hide();
                                            }
                                        });
                                    });
                                
                                    $("#tabela input").blur(function(){
                                        $(this).val("");
                                    });b
                                });


                                </script>      
       
        </div>


</html>