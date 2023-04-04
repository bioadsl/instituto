<?php
require 'conexao.php';

//Definimos o error_reporting para ser 0 para nenhum ser erro é reportado. Caso contrário use 1

ini_set("display_errors", "0");
error_reporting(E_ALL);
//include 'error.php';

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
//require_once('class/valida.class.php');
require_once('class/usuario.class.php');

// Somente usuários logados podem acessar esta página

// Protege a página
//require_once('protege.php');
///////////////////

$usuario = new usuario();
$dados = $usuario->usuarioInfo($_SESSION['idusuario']);

//---


?>



<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:dt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882" xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv=Content-Type  content="text/html; charset=utf-8" >
    <meta name=ProgId  content=Word.Document >
    <meta name=Generator  content="Microsoft Word 14" >
    <meta name=Originator  content="Microsoft Word 14" >
    
    <title>

    </title><!--[if gte mso 9]><xml><o:DocumentProperties><o:Author>Fabricio Alves</o:Author><o:LastAuthor>Fabricio Alves</o:LastAuthor><o:Revision>1</o:Revision><o:Pages>1</o:Pages></o:DocumentProperties><o:CustomDocumentProperties><o:KSOProductBuildVer dt:dt="string" >1046-11.2.0.9747</o:KSOProductBuildVer></o:CustomDocumentProperties></xml><![endif]--><!--[if gte mso 9]><xml><o:OfficeDocumentSettings></o:OfficeDocumentSettings></xml><![endif]--><!--[if gte mso 9]><xml><w:WordDocument><w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel><w:DisplayHorizontalDrawingGridEvery>0</w:DisplayHorizontalDrawingGridEvery><w:DisplayVerticalDrawingGridEvery>2</w:DisplayVerticalDrawingGridEvery><w:DocumentKind>DocumentNotSpecified</w:DocumentKind><w:DrawingGridVerticalSpacing>7.8 磅</w:DrawingGridVerticalSpacing><w:View>Web</w:View><w:Compatibility><w:DontGrowAutofit/><w:BalanceSingleByteDoubleByteWidth/><w:DoNotExpandShiftReturn/></w:Compatibility><w:Zoom>0</w:Zoom></w:WordDocument></xml><![endif]--><!--[if gte mso 9]><xml><w:LatentStyles DefLockedState="false"  DefUnhideWhenUsed="true"  DefSemiHidden="true"  DefQFormat="false"  DefPriority="99"  LatentStyleCount="260" >
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Normal" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="heading 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="heading 9" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index 9" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toc 9" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Normal Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="footnote text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="annotation text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="header" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="footer" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="index heading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  QFormat="true"  Name="caption" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="table of figures" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="envelope address" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="envelope return" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="footnote reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="annotation reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="line number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="page number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="endnote reference" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="endnote text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="table of authorities" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="macro" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="toa heading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Bullet" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Number" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Bullet 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Bullet 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Bullet 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Bullet 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Number 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Number 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Number 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Number 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Title" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Closing" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Signature" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  UnhideWhenUsed="false"  Name="Default Paragraph Font" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Continue" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Continue 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Continue 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Continue 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="List Continue 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Message Header" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Subtitle" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Salutation" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Date" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text First Indent" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text First Indent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Note Heading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text Indent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Body Text Indent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Block Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Hyperlink" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="FollowedHyperlink" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Strong" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  QFormat="true"  Name="Emphasis" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Document Map" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Plain Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="E-mail Signature" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Normal (Web)" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Acronym" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Address" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Cite" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Code" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Definition" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Keyboard" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Preformatted" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Sample" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Typewriter" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="HTML Variable" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  UnhideWhenUsed="false"  Name="Normal Table" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="annotation subject" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="No List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="1 / a / i" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="1 / 1.1 / 1.1.1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Article / Section" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Simple 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Simple 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Simple 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Classic 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Classic 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Classic 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Classic 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Colorful 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Colorful 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Colorful 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Columns 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Columns 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Columns 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Columns 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Columns 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 7" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table List 8" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table 3D effects 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table 3D effects 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table 3D effects 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Contemporary" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Elegant" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Professional" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Subtle 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Subtle 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Web 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Web 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Web 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Balloon Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="0"  SemiHidden="false"  UnhideWhenUsed="false"  Name="Table Theme" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Placeholder Text" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="No Spacing" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="List Paragraph" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Quote" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Intense Quote" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 1" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 2" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 3" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 4" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 5" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Shading Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Light Grid Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Shading 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium List 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 1 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 2 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Medium Grid 3 Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Dark List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Shading Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful List Accent 6" ></w:LsdException>
<w:LsdException Locked="false"  Priority="99"  SemiHidden="false"  Name="Colorful Grid Accent 6" ></w:LsdException>
</w:LatentStyles></xml><![endif]-->
<style>

@font-face{
font-family:"Times New Roman";
}

@font-face{
font-family:"宋体";
}

@font-face{
font-family:"SimSun";
}

@font-face{
font-family:"Symbol";
}

@font-face{
font-family:"Calibri";
}

@font-face{
font-family:"Arial";
}

p.MsoNormal{
mso-style-name:Normal;
mso-style-parent:"";
margin:0pt;
margin-bottom:.0001pt;
font-family:Calibri;
mso-fareast-font-family:SimSun;
mso-bidi-font-family:'Times New Roman';

}

span.10{
font-family:'Times New Roman';
}

span.15{
font-family:'Times New Roman';
color:rgb(0,0,255);
text-decoration:underline;
text-underline:single;
}

span.msoIns{
mso-style-type:export-only;
mso-style-name:"";
text-decoration:underline;
text-underline:single;
color:blue;
}

span.msoDel{
mso-style-type:export-only;
mso-style-name:"";
text-decoration:line-through;
color:red;
}

table.MsoNormalTable{
mso-style-name:"Tabela normal";
mso-style-parent:"";
mso-style-noshow:yes;
mso-tstyle-rowband-size:0;
mso-tstyle-colband-size:0;
mso-padding-alt:0,0000pt 5,4000pt 0,0000pt 5,4000pt;
mso-para-margin:0pt;
mso-para-margin-bottom:.0001pt;
mso-pagination:widow-orphan;
font-family:'Times New Roman';
font-size:10,0000pt;
mso-ansi-language:#0400;
mso-fareast-language:#0400;
mso-bidi-language:#0400;
}
@page{mso-page-border-surround-header:no;
	mso-page-border-surround-footer:no;}@page Section0{
margin-top:72,0000pt;
margin-bottom:72,0000pt;
margin-left:90,0000pt;
margin-right:90,0000pt;
size:240,9500pt 340,1500pt;
layout-grid:18,0000pt;
}
div.Section0{page:Section0;}

.ftid {
    position: absolute;
    object-fit: cover;
    max-width: 100%;
    width:98.5px;
    height:136.8px;
    margin-left:48.3%;
    margin-top: -2.3%;
    z-index:0;
    transform: rotate(90deg); 
}


</style>

<!-- 
    object-fit: fill;
    object-fit: contain;
    object-fit: cover;
    object-fit: scale-down;
    object-fit: none;
-->

</head>
<body style="tab-interval:21pt;text-justify-trim:punctuation;" >
<!--StartFragment-->
<div class="Section0"  style="layout-grid:18,0000pt;" >
<p class=MsoNormal >
	

	<span >
<img style="position:absolute;z-index:-1;margin-left:31.5%;margin-top:-2.7%;width:30%;height:90%;"  src="fotos/CARTEIRINHA2.svg" >
</span>

<?php if(empty($cliente)): ?>
            <h3 class="text-center text-danger">Membro não encontrado!</h3>
            <?php else: ?>

<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
<o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
<o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
<o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal >
		<!--span style="position:absolute;z-index:0;margin-left:48%;margin-top:-1%;width:105,0000px;height:97,0000px;" -->

        <img src="fotos/<?=$cliente->foto?>" class="ftid">
    
    <!--/span-->

<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
<o:p>&nbsp;</o:p></span></p><p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
		<o:p>&nbsp;</o:p></span></p>
		<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
			<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
	<o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" >
	<o:p>&nbsp;</o:p></span></p>            
	
	<p class=MsoNormal  style="margin-left:37%;mso-para-margin-left:0,0000gd;text-indent:25,0000pt;mso-char-indent-count:4,5500;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:10px;" ><?=$cliente->nome?></span>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p></o:p></span></p>
	<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;font-size:7px;" >
    <o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
    <o:p>&nbsp;</o:p></span></p>
    <p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:16,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
    <o:p>&nbsp;</o:p></span></p>
    <span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:8,9000pt;mso-char-indent-count:3,0800;" >
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" >
	<o:p>&nbsp;</o:p></span></p>
	<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >NR PLANO/SUS:</span></b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" ><?=$cliente->carteirinha?> </span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:7px;" ><o:p></o:p></span></p>
<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >PLANO DE SAUDE:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:6px;" >&nbsp;</span>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->pl_saude?></span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:6px;" >
	<o:p></o:p></span></b></p>
	<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >EMAIL:</span></b><span>
	<a href="mailto:FABRICIO.4135@GMAIL.COM" ><u>
	<span class="15"  style="mso-spacerun:'yes';font-family:Arial;color:rgb(0,0,255);
	font-weight:normal;text-decoration:underline;text-underline:single;font-size:7px;" ><?=$cliente->email?></span></u></a></span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" >&nbsp;&#9; &nbsp;</span><b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >TIPO SANGUINIO:</span></b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-size:6px;" ></span><b></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;color:rgb(255,0,0);font-weight:bold;font-size:7px;" ><?=$cliente->tp_sanguineo?>&nbsp;<?=$cliente->ft_rh?></span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" >&nbsp;&nbsp;</span>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" ><o:p></o:p></span></p>

	<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
		<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >FILIA&#199;&#195;O:</span></b>
		<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->mae?>&#9; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:0px;" ><o:p></o:p></span></p>
<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" >

<span style="margin-left:40%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->pai?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:1px;" ><o:p></o:p></span></b></p>

	<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >SEXO:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" > <?=$cliente->sexo?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >PESO: </span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->peso?></span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >ALTURA:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->altura?></span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >NASCIMENTO:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=date('d/m/Y', strtotime($cliente->dt_nascimento));?></span><b>

		<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
		<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >END.:</span></b>
		<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->endereco?></span>
		<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:5px;" ><o:p></o:p></span></p>

<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >CELULAR:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" > <?=$cliente->celular?> &#9;&#9;&#9; &nbsp;&nbsp;</span><b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >TELEFONE:</span></b>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->telefone?></span>
	<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" ><o:p></o:p></span></p>

	<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
		<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >CONTATO:</span></b>
		<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->proximo?></span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" >&#9;</span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" >&nbsp;&nbsp;&nbsp;&nbsp;</span><b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" ><o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:30,8000pt;mso-char-indent-count:3,0800;" >
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >CELULAR(ES):</span></b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" ><?=$cliente->cel_proximo?> &nbsp;<?=$cliente->tel_proximo?></span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:6px;" ><o:p></o:p></span></p>
<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" ><b>
	<span style="margin-left:37%;mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:bold;font-size:7px;" >OBS.: </span></b>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;font-size:7px;" >&#9;<?=$cliente->observacao?></span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" >&#9;</span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" >&#9;</span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" >&nbsp;</span>
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" ><o:p></o:p></span></p>
<p class=MsoNormal  style="text-indent:21,0000pt;mso-char-indent-count:0,0000;" >
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;font-weight:normal;" ><o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:30,8000pt;mso-char-indent-count:3,0800;" >
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" ><o:p>&nbsp;</o:p></span></p>
<p class=MsoNormal  style="margin-left:126,0000pt;mso-para-margin-left:0,0000gd;text-indent:30,8000pt;
mso-char-indent-count:3,0800;" >
<span style="mso-spacerun:'yes';font-family:Arial;mso-fareast-font-family:SimSun;" ><o:p>&nbsp;</o:p></span></p>
</div><!--EndFragment-->

<center>
    <button  class='btn btn-default btn-sm' onClick='history.go(-1)'>Voltar </button>
    <input type="button" class="btn btn-danger" value="IMPRIMIR" onClick="window.print()"/>
</center>

<?php endif; ?>

<?php endif; ?>
</div>
</div>
</body>
</html>