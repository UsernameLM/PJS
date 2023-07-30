<?php
if (!isset($_SESSION)) session_start();

require("conexao.php");
require("restrito.php");
$cdusuario = $_SESSION['UsuarioCodigo'];
$data = date("m");
$soma = $_POST['seta'];
if($data + $soma == 0)
	$soma = 12 - $data;
else
	if($data + $soma == 13)
	$soma = 1 - $data;

$meses = array("Janeiro", "Fevereiro", "Março","Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");

?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lista Despesas</title>
<link href="pjs.css" rel="stylesheet" type="text/css" media="all and (min-width:961px)" >
<link href="pjs_mobile.css" rel="stylesheet" type="text/css" media="all and (max-width:320px)" >
 <link href="pjs_tablet.css" rel="stylesheet" type="text/css" media="all and (min-width:321px) and (max-width:960px)">
<script language="javascript" src="formulariojavascript.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<div id="div_total">

<div style="width:100%;">
<div id="div_homepage" style="background-color:#ff0000; opacity: 0.75;">
<a href="principal.html" style="text-decoration:none">
<img id="img_homepage" src="imagens/homepage.png"></img>
</a>
<a href="despesa.php" style="text-decoration:none">
<img id="img_configuracoes" src="imagens/configuracoes.png"></img>
</a>
<img id="img_checkbox" src="imagens/checkbox.png"></img>
<img id="img_lixeira" src="imagens/lixeira.png"></img>
</div>

<div id="div_lista_receita_despesa" style="background-color:#ff0000; opacity: 0.75;">

<div id="div_titulo_lista">
<label for="div_lista_receita_despesa" id="titulo_lista">
<b>Despesas</b>
</label>
</div>

</div>

<div id="div2_lista_receita_despesa" style="background-color:#ff0000; opacity: 0.75;">

<div id="div_img_setaesquerda_lista">
<form action="lista_despesas_m.php" method="POST">
<input type ="image" src="imagens/seta_esquerda.png"/>
<input type="hidden" name="seta" value="<?php echo $soma - 1;?>"/>
</form>
</div>

<div id="div_subtitulo_lista">
<label for="div2_lista" id="subtitulo_lista">
<?php
echo $meses[$data -1 + $soma];
?>
</label>
</div>

<div id="div_img_setadireita_lista">
<form action="lista_despesas_m.php" method="POST">
<input type ="image" src="imagens/seta_direita.png"/>
<input type="hidden" name="seta" value="<?php echo $soma + 1;?>"/>
</form>
</div>
</div>

</div>

<br>
 	
<form action='receita.php' method="POST" align='center' id="form_lista">
<br><br><br>Filtrar por:<br>
<input type="radio">Categoria (agrupar - ordem alfabética)
<input type="radio">Descrição (Ordem alfabética)
<input type="radio">Valor mais alto
<input type="radio">Valor mais baixo

<div id="div_table_lista">
<?php 
	$seleciona = mysql_query("SELECT * from despesas where cd_usuario = '$cdusuario'");
	$total = 0;
	$chamados = array();
	while ($resultado = mysql_fetch_assoc($seleciona))
	{
	$chamados[] = $resultado; 
	}
	?>
<table style="width:100%;">
<tr>
<?php foreach($chamados as $chamado) : ?>
<?php
$receita = substr($chamado['data_despesa'],5,2);
if($receita == $data + $soma)
{echo"
<td><label id='descrição_lista'><b>Descrição</b></label></td>
<td>".$chamado['descricao']."</td><br>
<td><label id='valor_lista'><b>R$ Valor</b></label></td>
<td>".$chamado['valor']."</td><br>
</tr>

<tr>
<td><label id='categoria_lista'>Categoria</label></td>
<td>".$chamado['categoria']."</td><br>
<td></td>
</tr>

<tr>
<td><label id='comentarios_lista'>Comentários</label></td>
<td>".$chamado['comentario']."</td><br>
<td></td>
</tr>
</table><br>";}
$total += str_replace(",",".",(str_replace(".","",$chamado['valor'])));}?>
<?php endforeach; ?>
	</tbody>
</div>

</table>
</form>
<br><br>
<a type="button" href="despesa.php" class="btn_lista_despesa" style="text-decoration:none">+</a>
</div>



<div id="div_rodape_despesa_receita" style="padding-top: 0.5%;">
<label id="valor_total_lista">
 Total <?php echo $total;?>
</label>

<form>
<input type="text" readonly name="text_valor_total_despesa" id="campo_valor_total_lista">
</form>
</div>
</div>   
 
</body>
</html>