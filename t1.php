<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>transforme.tech</title>    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <base href="/admin"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="shortcut icon" href="/favicon.png"/>
        <!-- Google Tag Manager -->
    <noscript>
        <iframe src="//www.googletagmanager.com/ns.html?id=GTM-NGFVTN" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '//www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NGFVTN');
    </script>
    <style type="text/css">
        body {
            font-family: 'Open Sans', arual, sans-serif;
            font-size: 11px;
            padding: 0;
            margin: 0;
        }

        .carne {
            font-size: 10px !important;
        }

        .table {
            padding: 0px;
        }

        .table td,
        .table th {
            border: 1px solid #666 !important;
            padding: 5px;
        }

        .table3 {
            padding: 0px;
            width: 100%;
        }

        .table3 thead td,
        .table3 thead th,
        .table3 tbody td,
        .table3 tbody th {
            border-bottom: 1px solid #666 !important;
            padding: 3px;
        }

        .table3 th {
            text-align: left;
            text-transform: uppercase;
        }

        .topo {
            background: #eee;
            padding: 5px;
            /*border: 1px solid #666 !important;*/
        }

        .destaque {
            border: 1px solid #666 !important;
        }

        h1,
        h2,
        h3 {
            margin: 0;
            padding: 0;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert h4 {
            margin-top: 0;
            color: inherit;
        }

        .alert .alert-link {
            font-weight: bold;
        }

        .alert > p,
        .alert > ul {
            margin-bottom: 0;
        }

        .alert > p + p {
            margin-top: 5px;
        }

        .alert-dismissable, .alert-dismissible {
            padding-right: 35px;
        }

        .alert-dismissable .close, .alert-dismissible .close {
            position: relative;
            top: -2px;
            right: -21px;
            color: inherit;
        }

        .alert-success {
            background-color: #abe7ed;
            border-color: #abe7ed;
            color: #27a4b0;
        }

        .alert-success hr {
            border-top-color: #96e1e8;
        }

        .alert-success .alert-link {
            color: #1d7d86;
        }

        .alert-info {
            background-color: #e0ebf9;
            border-color: #e0ebf9;
            color: #327ad5;
        }

        .alert-info hr {
            border-top-color: #caddf4;
        }

        .alert-info .alert-link {
            color: #2462b0;
        }

        .alert-warning {
            background-color: #f9e491;
            border-color: #f9e491;
            color: #c29d0b;
        }

        .alert-warning hr {
            border-top-color: #f7de79;
        }

        .alert-warning .alert-link {
            color: #927608;
        }

        .alert-danger {
            background-color: #fbe1e3;
            border-color: #fbe1e3;
            color: #e73d4a;
        }

        .alert-danger hr {
            border-top-color: #f8cace;
        }

        .alert-danger .alert-link {
            color: #d71b29;
        }

        .relatorioTopo {
            border-bottom: 0px dotted black;
            vertical-align: middle;
            background-color: #337ab7;
            /*margin-bottom: 15px;*/
            padding: 5px 0;
            font-size: 12px;
            text-transform: uppercase;
            width: 100%;
            display: table;
            position: relative;
            /*position: fixed;*/
            /*top: 0px;*/
            /*left: 0px;*/
            /*right: 0px;*/
        }

        .relatorioTopo a,
        .relatorioTopo a:hover {
            color: #FFF;
            text-decoration: none;
        }

        @media print and (color) {
            * {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .relatorioTopo {
                display: none;
            }

            /* presentation rules for the page on color printers */
        }
    </style>
        <script type="text/javascript">
        function CopiarTexto(id) {
            try {
                var from = document.getElementById(id);
                var range = document.createRange();
                window.getSelection().removeAllRanges();
                range.selectNode(from);
                window.getSelection().addRange(range);
                document.execCommand('copy');
                window.getSelection().removeAllRanges();
                alert("Texto copiado com sucesso para área de transferência.");
            } catch (err) {
                alert('Opa, Não conseguimos copiar o texto, é possivel que o seu navegador não tenha suporte, tente usar Crtl+C. ' + err);
            }
        }
    </script>
</head>
<body class="page-vazia">
<style type="text/css">
    .table2 {
        width: 100%;
        margin-bottom: 5px;
    }

    .table2 td {
        padding: 10px !important;
        border-spacing: 5px !important;
        border-left: 1px solid #333;
        border-bottom: 1px solid #333;
    }
</style>

    <div class="relatorioTopo">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="pull-right" style="margin-left: 30px; margin-right: 10px;">
                            <a type="button" target="_blank" href="/cobranca/319321?&download=true&downloadType=print_pdf" style="background: none; border: none; color: #FFF;">
                                <i class="fa fa-print"></i> PDF
                            </a>
                        </div>
                        <div class="pull-right">
                            <button type="button" onclick="print();" style="background: none; border: none; color: #FFF;">
                                <i class="fa fa-print"></i> IMPRIMIR
                            </button>
                        </div>
                    </div>
                </div>    <table style='width: 700px; margin: 0 auto;'>
                 <tr>
                     <td colspan='2'> 
                        <table class="topo" width="100%" style="margin-bottom: 20px;">
                            <thead>
                                <tr>
                                    <td style="width: 45%; padding-bottom: 10px;">  
                                        <span style="color: #666; font-size: 12px; text-transform: uppercase;">PAGADOR</span><br>
                                        <strong>FABRICIO DUARTE ALVES </strong>         
                                    </td>            
                                    <td style="width: 45%; padding-bottom: 10px;">           
                                        <span style="color: #666; font-size: 12px;">CPF/CNPJ do pagador</span><br>
                                        <strong>72098902115</strong> 
                                    </td>            
                                    <td style="width: 10%; padding-bottom: 10px;" rowspan="3">            
                                        <img src="https://www.mcmsistema.org//images/storage/logo/0b0e9b5d513a8a17998e01844adf36e4.png" style="height: 90px;">
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding-bottom: 10px;'>      
                                        <span style="color: #666; font-size: 12px;">IDENTIFICAÇÃO DA FATURA</span><br>
                                        88100573466E432C9C75090757149BFE
                                    </td>
                                    <td style='padding-bottom: 10px;'>    
                                        <span style="color: #666; font-size: 12px;">SACADOR AVALISTA</span><br>
                                        MCMPovos
                                        <!--MISSÃO CRISTÃ MUNDIAL - 01.437.718/0001-02<br>
                                        Site: https://mcmpovos.org-->
                                    </td>
                                </tr>
                                <tr>
                    <td style='padding-bottom: 10px;'>      
                        <span style='color: #666; font-size: 12px;'>Nº DA RECORRÊNCIA</span><br>
                        17786
                    </td>
                    <td style='padding-bottom: 10px;'>   
                        <span style="color: #666; font-size: 12px;">CÓDIGO DA FATURA</span><br>
                        319321   
                        <!--<span style='color: #666; font-size: 12px;'>STATUS DA RECORRÊNCIA</span><br>
                        <span style='text-transform: uppercase;'><span id="" class="label label-success"><div class="body">Ativo</div></span></span>-->
                    </td>
                 </tr>
                            </thead>
                        </table>
                     </td>
                 </tr>
                 <tr>
                     <td colspan='2' style='font-weight: bold; font-size: 12px;'> 
                        BOLETO DE PROPOSTA
                     </td>
                 </tr>
                 <tr>
                     <td style='width: 40%;'>
                        <div style="padding-right: 20px; text-align: justify;">
                            <small>*ESTE BOLETO SE REFERE A UMA PROPOSTA JÁ FEITA A VOCÊ E O SEU PAGAMENTO NÃO É OBRIGATÓRIO. Deixar de pegá-lo não dará causa a protesto, à cobrança judicial ou extrajudicial, nem a inserção de seu nome em cadastro de restrição ao crédito.﻿</small>
                            <p>&nbsp;</p>

<p>&nbsp;</p>
&nbsp;
                        </div>
                    </td>
                     <td style='width: 60%;'>
                        <table class="table3" cellspacing="0" cellpadding="5">
                            <thead>
                                <tr>
                                    <th style="width: 80%;">Itens</th>
                                    <th style="width: 20%;">Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                     <td>MENINAS DOS OLHOS DE DEUS</td>
                                     <td>R$ 30,00</td>
                                  </tr>
                                <tr>
                                    <td align="right" style="border: none !important;"><strong>TOTAL</strong></td>
                                    <td align="left" style="border: none !important;"><strong>R$ 30,00</strong></td>
                                </tr>
                            </tbody>
                        </table>
                     </td>
                 </tr>
                 <tr>
                     <td colspan='2'> 
                        <table style='width: 100%;'><tr><td><h1 style='margin-top: 20px;'>BOLETO BANCÁRIO</h1><h3>Efetue o pagamento com segurança pela internet ou na agência bancária</h3></td></tr><tr><td><table style='border: 1px solid #000; width: 100%;'><tr><td colspan='2' style='border-bottom: 1px solid #000;'><img style='width: 25px; height: 25px; margin-right: 12px; float: left;' src='https://www.mcmsistema.org//images/pagamento/bradesco.png'><div style='font-weight: bold; font-size: 19px; float: left; margin-right: 12px;'>237-2</div><div style='font-size: 19px; float: left; margin-right: 12px;'>23793.38128 60008.119582 08000.050800 3 86970000003000</div></td></tr><tr><td colspan='2' style='border-bottom: 1px solid #000;'><div style='min-height: 13.6px'><small>*ESTE BOLETO SE REFERE A UMA PROPOSTA JÁ FEITA A VOCÊ E O SEU PAGAMENTO NÃO É OBRIGATÓRIO. Deixar de pegá-lo não dará causa a protesto, à cobrança judicial ou extrajudicial, nem a inserção de seu nome em cadastro de restrição ao crédito.﻿</small></div></td></tr></h1><tr><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>LOCAL DE PAGAMENTO</div><div style='min-height: 13.6px'>Pagável em qualquer banco, internet ou lotérica..</div></td><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>NOSSO NÚMERO</div><div style='min-height: 13.6px'></div></td></tr><tr><td valign='top' rowspan='2' style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>INSTRUÇÕES</div><div style='min-height: 13.6px'><div><strong style='font-size: 10px;'>ALTERAR o VALOR ou DATA - www.mcmsistema.org/segundavia e insira código Fatura<strong></div><div><strong style='font-size: 10px;'>PORTAL DO DOADOR - www.mcmsistema.org/portal<strong></div><div></div><div></div></div></td><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>VENCIMENTO</div><div style='min-height: 13.6px'>30/07/2021</div></td></tr><tr><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>VALOR A PAGAR</div><div style='min-height: 13.6px'></div></td></tr><tr><td valign='top' rowspan='2' style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>DEMONSTRATIVO</div><div style='min-height: 13.6px'>&nbsp;

&nbsp;
</div><div style='min-height: 13.6px'>MENINAS DOS OLHOS DE DEUS - R$ 30,00</div></td><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>VALOR DO DOC.</div><div style='min-height: 13.6px'>30,00</div></td></tr><tr><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>MULTA/JUROS</div><div style='min-height: 13.6px'></div></td></tr><tr><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>PAGADOR</div><div style='min-height: 13.6px'>FABRICIO DUARTE ALVES - CPF/CNPJ do pagador: 72098902115</div><div>QS 106 Conjunto 1Comércio, Nº S/N -  Lot 7/8 Ap 504, Ed. Estrela do Sul, Samambaia Sul (Samambaia) - Brasília/DF - Cep: 72302-511</div></td><td style='border-bottom: 1px solid #000;'><div style='color: #666; font-size: 12px;'>MÊS/ANO REFERÊNCIA</div><div style='min-height: 13.6px'>7/2021</div></td></tr><tr><td style='border-bottom: 1px solid #000; width: 60% !important;'><div style='color: #666; font-size: 12px;'>INTERMEDIADO POR</div><div style='min-height: 13.6px'>Iugu Serviços na Internet SA<br>CNPJ: 15.111.975/0001-64</div></td><td style='border-bottom: 1px solid #000; width: 40% !important;'><div style='color: #666; font-size: 12px;'>SACADOR AVALISTA</div><div style='min-height: 13.6px'>MCMPovos<br>CNPJ: 01437718000102</div></td></tr><tr><td colspan='2' style='text-align: center; padding: 20px;'>Use este código de barras para pagamentos no bankline<br>23793.38128 60008.119582 08000.050800 3 86970000003000<br><img src='https://faturas.iugu.com/barcode/88100573-466e-432c-9c75-090757149bfe-d4d6'></td></tr></table></td></tr></table> 
                     </td>
                 </tr>
             </table></body>
</html>
