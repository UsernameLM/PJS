<?php
if (!isset($_SESSION)) session_start();

require("conexao.php");
require("restrito.php");
$cdusuario = $_SESSION['UsuarioCodigo'];
$data = date("m");
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
 <script src='js/jquery.js'></script>
    <script src='js/multifilter.js'></script>
<script language="javascript">
function checkbox_selecionar_lista()
{
	if(document.getElementById("deleta_lista").src.indexOf("imagens/1462768844_check-box-outline-blank.png") != -1)
document.getElementById("deleta_lista").src = "imagens/1462768856_check-box-outline.png";
else
document.getElementById("deleta_lista").src = "imagens/1462768844_check-box-outline-blank.png";
}

function clica_lupa()
{
	document.getElementById("div_lupa").style.visibility = "visible";
document.getElementById("seta_volta_checkbox").style.visibility = "visible";
document.getElementById("img_lixeira").style.visibility = "hidden";
document.getElementById("deleta_lista").style.visibility = "hidden";
}

function clica_checkbox()
{
document.getElementById("img_lixeira").style.visibility = "visible";
document.getElementById("seta_volta_checkbox").style.visibility = "visible";
document.getElementById("div_lupa").style.visibility = "hidden";
document.getElementById("deleta_lista").style.visibility = "visible";

}

function clica_seta_checkbox()
{
document.getElementById("seta_volta_checkbox").style.visibility = "hidden";
document.getElementById("img_lixeira").style.visibility = "hidden";
document.getElementById("div_lupa").style.visibility = "hidden";
document.getElementById("deleta_lista").style.visibility = "hidden";

}

function funcao_div_esquerda()
{
document.getElementById("div_canto_esquerdo").style.visibility = "visible";
document.getElementById("div_escura").style.visibility = "visible";
document.getElementById("div_categoria").style.visibility = "hidden";
document.getElementById("div_descricao").style.visibility = "hidden";

}
function clica_alfabetica()
{
 document.getElementById("div_categoria").style.visibility = "visible";
  document.getElementById("div_descricao").style.visibility = "visible";
}
function funcao_fecha_div_esquerda()
{
console.log("teste");
document.getElementById("div_canto_esquerdo").style.visibility = "hidden";
document.getElementById("div_categoria").style.visibility = "hidden";
document.getElementById("div_descricao").style.visibility = "hidden";
document.getElementById("div_escura").style.visibility = "hidden";


}
function funcao_div_escura()
{  
document.getElementById("div_escura").style.visibility = "visible";

}


</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
 <script type='text/javascript'>
    //<![CDATA[
      $(document).ready(function() {
        $('.filter').multifilter()
      })
    //]]>
  </script>
<body>
<?php 
	$seleciona = mysql_query("SELECT * from despesas where cd_usuario = '$cdusuario'");
	$total = 0;
	$chamados = array();
	while ($resultado = mysql_fetch_assoc($seleciona))
	{
	$chamados[] = $resultado; 
	}
	?>





<div id="div_escura" style="height:100%; width:100%; background-color:rgba(0, 0, 0, 0.1); position: fixed;top: 0;left: 0;   visibility: hidden; "></div>


<br>
<div id="div_canto_esquerdo" style="top:0; left:0; position:fixed;  z-index:4; background-color: #D1D1D1; height:100%; width:30%; visibility:hidden; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71)">

<img src="imagens/cancelar.png"   style="float:right; margin-left:70%; margin-top:20px; width:18px; height: 18px; position:absolute; z-index:6;" onClick="funcao_fecha_div_esquerda()"></img>
<br><br><br><br>

<div id="div_titulo_filtro" style="top:0; left:0; position:fixed;  z-index:4; background-color: #D1D1D1; height:2%; width:30%;   "><br><br><p align="center" style="color:#FFFFFF; padding-bottom:20px;">Filtrar por</p>
</div>
<br>
<div  id="div_filtro_favoritos" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71)  "><p align="center" style="color:#FFFFFF">Favoritos</p></div>
<br><br><br>

<div  id="div_filtro_maior_valor" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71)  "><p align="center" style="color:#FFFFFF">Mais recente</p></div>
<br><br><br>

<div  id="div_filtro_menor_valor" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71)  "><p align="center" style="color:#FFFFFF">Mais antigo</p></div>
<br><br><br>

<div  id="div_filtro_ordem_alfa" onClick="clica_alfabetica()" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%;  box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71) "><p align="center" style="color:#FFFFFF">Valor</p></div>
<br><br><br>

<div id="div_descricao" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71) "><p align="center" style="color:#FFFFFF">Menor</p></div>
<br><br><br>
<div id="div_categoria" style="left:0; position:fixed;  z-index:4; background-color: #C5C5C5; height:60px; width:30%;  box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71) "><p align="center" style="color:#FFFFFF">Maior</p></div>



</div>

<div style="width:100%;">
<div id="div_homepage" style="background-color:#cd1414; box-shadow: -1px 9px 6px -5px rgba(191,187,191,1);">
<img id="seta_volta_checkbox" src="imagens/seta_esquerda_cadastrar.png" style="visibility:hidden; margin-left:5%;" onClick="clica_seta_checkbox()"></img>
<a href="principal.html" style="text-decoration:none">
<img id="img_homepage" src="imagens/homepage.png"></img>
</a>


<!--<img id="img_configuracoes" src="imagens/filtro.png" onClick="funcao_div_esquerda()"></img>-->
<img id="img_lupa" src="imagens/lupa.png" style="margin-left:10%;" onClick="clica_lupa()"></img>

<img id="img_checkbox" src="imagens/checkbox.png" onClick="clica_checkbox()"></img>
<img id="img_lixeira" src="imagens/lixeira.png" style="visibility:hidden;" ></img>


</div>

<div id="div_lista_receita_despesa" style="background-color:#cd1414;">

<div id="div_titulo_lista">
<label for="div_lista_receita_despesa" id="titulo_lista">
<b>Despesas</b>
</label>
</div>

</div>

<div id="div2_lista_receita_despesa" style="background-color:#cd1414; box-shadow: -1px 9px 6px -5px rgba(191,187,191,1);">

<div id="div_img_setaesquerda_lista">
<form action="lista_despesas_m.php" method="POST">
<input type ="image" src="imagens/seta_esquerda.png"/>
<input type="hidden" name="seta" value="<?php echo -1;?>"/>
</form>
</div>

<div id="div_subtitulo_lista">
<label for="div2_lista" id="subtitulo_lista">
<?php
echo $meses[$data - 1];
?>
</label>
</div>

<div id="div_img_setadireita_lista">
<form action="lista_despesas_m.php" method="POST">
<input type ="image" src="imagens/seta_direita.png"/>
<input type="hidden" name="seta" value="<?php echo 1;?>"/>
</form>
</div>
</div>
</div>

<div id="div3_lista_receita_despesa" style="background-color:#cd1414; box-shadow: -1px 9px 6px -5px rgba(191,187,191,1);">

<div id="div_img_setaesquerda_lista">
<form>
<input type ="image" src="imagens/seta_esquerda.png"/>
<input type="hidden" name="seta" value="<?php echo -1;?>"/>
</form>
</div>

<div id="div_subtitulo_lista">
<label for="div2_lista" id="subtitulo_lista">
<?php
echo $meses[$data - 1];
?>
</label>
</div>

<div id="div_img_setadireita_lista">
<form>
<input type ="image" src="imagens/seta_direita.png"/>
</form>
</div>
</div>
</div>


<br>
 	
    <div id="div_lupa"  action="lista_despesas_s.php" style="width: 45%; position:fixed; height:35px;  top:45px; left:0; z-index:2; background-color:#cd1414; visibility:hidden;box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71);">
    <input id="search" type="text" placeholder="Busque aqui" class='filter' name="b" data-col='imposto' style="background-image:none; background-color:#cd1414; color:#FFF; margin-left:1%; margin-bottom:0; bottom:0;border-bottom-color:#FFF; width: 95%; padding-left: 2px;border-left:none;border-top:none;border-right:none; text-decoration:none; outline:none;"/>
	</div>

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
<table style="width:100%;" id="table">
<?php foreach($chamados as $chamado) : ?>
<?php
$receita = substr($chamado['data_despesa'],5,2);
if($receita == $data)
{echo"
<tr>
<tr>
<td><label id='descrição_lista'><b>Descrição</b></label></td>
<td class='wrapper'>".$chamado['descricao']."</td><br>
</tr>
<td><label id='valor_lista'><b>R$ Valor</b></label></td>
<td>".$chamado['valor']."</td>
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
</table><br>";
$total += str_replace(",",".",(str_replace(".","",$chamado['valor'])));}?>
<?php endforeach; ?>
	</tbody>
</div>

</table>

<div id="div_canto_esquerdo" style="top:0; left:0; z-index:4; background-color:#CCCCCC; height:100%; width:30%; visibility:hidden; ">
<p align="center">Filtrar por</p>
</div>
<a type="button" href="despesa.php" class="btn_lista_despesa" style="text-decoration:none; bottom:20%; left: 50%; background-color:#cd1414; box-shadow: -1px 3px 7px -0.5px rgba(179,179,179,1);">+</a>


</form>
<br><br>
</div>



<div id="div_rodape_despesa_receita" style="padding-top: 0.5%;box-shadow: -1px -4px 7px -2px rgba(179,179,179,1);">
<label id="valor_total_lista">
 Total <?php echo $total?>
</label>

<form>
<input type="text" readonly name="text_valor_total_despesa" id="campo_valor_total_lista">
</form>
</div>
</div>   
 
</body>
<script type="text/javascript">
var $rows = $('.wrapper');
$('#search').keyup(function() {

    var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
        reg = RegExp(val, 'i'),
        text;

    $rows.show().filter(function() {
        text = $(this).text().replace(/\s+/g, ' ');
        return !reg.test(text);
    }).hide();
});
  
</script>
</html>