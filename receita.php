<?php
if (!isset($_SESSION)) session_start();

require("conexao.php");
require("restrito.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Receitas</title>
<link href="cssPOP.css" rel="stylesheet" type="text/css">
<link href="style2.css" rel="stylesheet" type="text/css">
<link href="pjs.css" rel="stylesheet" type="text/css" media="all and (min-width:961px)" >
<link href="pjs_mobile.css" rel="stylesheet" type="text/css" media="all and (max-width:320px)" >
<link href="pjs_tablet.css" rel="stylesheet" type="text/css" media="all and (min-width:321px) and (max-width:960px)">

<script src="jquery.js">
</script>

<script>
$(document).ready(function() 
{

var keys = (document).querySelectorAll('#calculator span');
var operators = ['+', '-', 'x', '÷'];
var decimalAdded = false;

for(var i = 0; i < keys.length; i++) {
	keys[i].onclick = function(e) {
		var input = document.querySelector('.screen');
		var inputVal = input.innerHTML;
		var btnVal = this.innerHTML;
		
		if(btnVal == 'C') {
			input.innerHTML = '';
			decimalAdded = false;
		}
		
		else if(btnVal == '=') {
			var equation = inputVal;
			var lastChar = equation[equation.length - 1];
			
			equation = equation.replace(/x/g, '*').replace(/÷/g, '/');
			
			if(operators.indexOf(lastChar) > -1 || lastChar == '.')
				equation = equation.replace(/.$/, '');
			
			if(equation)
				input.innerHTML = eval(equation);
				
			decimalAdded = false;
		}
		else if(btnVal == 'Sair') {
			document.getElementById("div_escura3").style.visibility = "hidden";
			input.innerHTML = '';
			decimalAdded = false;
		}
		else if(btnVal == 'Pronto') {
		    iconvalor.value = input.innerHTML;
            document.getElementById("div_escura3").style.visibility = "hidden";			
			decimalAdded = false;
		}
		
		
		else if(operators.indexOf(btnVal) > -1) {
			
		
			var lastChar = inputVal[inputVal.length - 1];
			
			
			if(inputVal != '' && operators.indexOf(lastChar) == -1) 
				input.innerHTML += btnVal;
			
		
			else if(inputVal == '' && btnVal == '-') 
				input.innerHTML += btnVal;
			
			
			if(operators.indexOf(lastChar) > -1 && inputVal.length > 1) {
				input.innerHTML = inputVal.replace(/.$/, btnVal);
			}
			
			decimalAdded =false;
		}
		
		else if(btnVal == '.') {
			if(!decimalAdded) {
				input.innerHTML += btnVal;
				decimalAdded = true;
			}
		}
		
		else {
			input.innerHTML += btnVal;
		}
		
		e.preventDefault();
	} 
}
});
</script>

<script language="JavaScript">



function mostra_calculadora()
{
	 document.getElementById("div_escura3").style.visibility = "visible";
	
}

function dialogo_avisa()
{
	if(document.getElementById("cb_pago").checked == true)
	alert("oi");
	else
	 document.getElementById("div_escura2").style.visibility = "visible";
}

function formatar_moeda(campo, separador_milhar, separador_decimal, tecla) {
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? tecla.which : tecla.keyCode;

	if (whichCode == 13) return true; // Tecla Enter
	if (whichCode == 8) return true; // Tecla Delete
	key = String.fromCharCode(whichCode); // Pegando o valor digitado
	if (strCheck.indexOf(key) == -1) return false; // Valor inválido (não inteiro)
	len = campo.value.length;
	for(i = 0; i < len; i++)
	if ((campo.value.charAt(i) != '0') && (campo.value.charAt(i) != separador_milhar)) break;
	aux = '';
	for(; i < len; i++)
	if (strCheck.indexOf(campo.value.charAt(i))!=-1) aux += campo.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) campo.value = '';
	if (len == 1) campo.value = '0'+ separador_milhar + '0' + aux;
	if (len == 2) campo.value = '0'+ separador_milhar + aux;

	if (len > 2) {
		aux2 = '';

		for (j = 0, i = len - 3; i >= 0; i--) {
			if (j == 3) {
				aux2 += separador_decimal;
				j = 0;
			}
			aux2 += aux.charAt(i);
			j++;
		}

		campo.value = '';
		len2 = aux2.length;
		for (i = len2 - 1; i >= 0; i--)
		campo.value += aux2.charAt(i);
		campo.value += separador_milhar + aux.substr(len - 2, len);
	}

	return false;
}
function clica_repetir()
{
	if(document.getElementById("div_repetir").style.visibility == "visible")
	document.getElementById("div_repetir").style.visibility = "hidden";
	else
	document.getElementById("div_repetir").style.visibility = "visible";
}

function Clicar_favorito()
{
if(document.getElementById("img_favorito").src.indexOf("imagens/estrela_favorita.png") != -1)
document.getElementById("img_favorito").src = "imagens/1465610051_star.png";
else
document.getElementById("img_favorito").src = "imagens/estrela_favorita.png";
}


function funcao()
{
 document.getElementById("div_escura").style.visibility = "visible";
 
 

}
function funcao_img()
{
 document.getElementById("div_escura").style.visibility = "hidden";
 document.getElementById("div_escura2").style.visibility = "hidden";
 
 

}
function funcao_nova_categoria(i)
{
var select = document.getElementById('cbopções');


    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
	
	document.getElementById("opt_nova").remove();
	
var opt2 = document.createElement('option');
    opt2.value = "Nova Categoria";
    opt2.innerHTML = "Nova Categoria";
	opt2.id = "opt_nova";
    select.appendChild(opt2);
}

</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body >

<div id="div_total">
<form action="lista_receitas.php" method="post" class="form_despesa"name="formulario" id="form1" align="center">
<div id="div_topo_despesa_receita" style="background-color: #00B200; box-shadow: -1px 9px 6px -5px rgba(191,187,191,1);">

<div id="div_img_cancelar" >
<a href="lista_despesas.php"><img src="imagens/cancelar.png"></img></a>
</div>

<label for="div_topo_despesa_receita" id="label_despesa_receita">
 Nova Receita
</label>


<div id="div_img_aceitar">
<button type="button" style="border: 0;display: block; background-color:#00B200;"><img src="imagens/check.png" ></img></button>
</div>

</div>

<div id="div_cadastrar_form" style="padding-top:55px;width:100%;">
<br>
<input class="descrição_despes" type="text" id="icondescricao" name="descricao" placeholder="Sobre o que é esta receita?" style="border-bottom-color:#00B200;"/>
<a href="#"><img src="imagens/1465610051_star.png" alt="Img_favorito" id="img_favorito" style="margin-left: 1%"  onClick="Clicar_favorito()"/></a><br><br>     
<input class="valor_despes" type="text" id="iconvalor" name="valor" placeholder="Insira um valor" style="border-bottom-color:#00B200;" value="" onKeyPress="return formatar_moeda(this,',','.',event);" />
<img src="imagens/calculator.png" id="img_calculadora" style="margin-left: 1%" onClick="mostra_calculadora()"/><br><br><br>
<img src="imagens/calendario.png"  ">
<input type="date" name="data" style="margin-left:0%;"><br><br> 
<img src="imagens/categoria.png" ">
<span class="custom-dropdown custom-dropdown--white">
<select onchange="if (this.options[this.selectedIndex].value == 'Nova Categoria') funcao()"  class="custom-dropdown__select custom-dropdown__select--white" id="cbopções" name="cbopções"  onchange="nova_categoria()" style="margin-left:0%;">
<option id="Categoria">Categoria</option>
   <option value="Salário">Salário</option>
   <option value="Prêmios" >Prêmios</option>
   <option value="Investimentos" >Investimentos</option>
   <option value="Outros" >Outros</option>
 <option id="opt_nova" value="Nova Categoria" >Nova Categoria</option>
   
</select>
</span><br><br>
<input type="checkbox" value="" name="cbpago" id="cb_pago"><label for="cbpago">Já recebeu?</label>
<input type="checkbox" value="" name="cbrepetir" onClick="clica_repetir()"><label for="cbrepetir">Repetir</label><br><br>
<div id="div_repetir" style="visibility:hidden">
<label for="label_repetir">Repetir a cada</label><input type="number" style=" width:10%;" id="txt_repetir" >

<select  id="select_repetir">
	<option>Dias</option>
    <option>Semanas</option>
    <option>Meses</option>
    <option>Anos</option>
</select>
</div>
<br><br>
<input type="text" id="iconcomentario" name="comentario" placeholder="Adicionar comentário" style="margin-left:0;border-bottom-color:#00B200;"/><img src="imagens/branco.png" id="" style="padding-left: 1%; "/>
<br>

<div id="div_escura2" style="height:100%; width:100%; background-color:rgba(0, 0, 0, 0.2); height: 100%;position: fixed;top: 0;left: 0;   visibility: hidden; ">
<div id="div_avisa">
<div  id="div_avisa_topo" style="width:80%; background-color:#00B200; margin-left:5%; height:30px; border-bottom:none; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71); border-bottom:solid;  border-color: #0C0; border-width:3.5px; margin: 200px auto 0 auto; ">
<p align="center" style="color:#FFFFFF; line-height:30px;">Data de recebimento<img src="imagens/cancelar.png" style="float:right; padding-right: 5%; padding-top:6px;" onClick="funcao_img()" /></p>
</div>
<div style="width:80%; background-color:#f3f3f3; margin-left:5%; height:150px;  border-top:none;box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71); margin: 0 auto 0 auto;">
<br>
<p  align="center">Quando você receberá essa receita? </p><br>

<input type="date"/>
<img src="imagens/seta_direita_principal.png" style="margin-right:2%; margin-top:6px;" onClick="funcao_img();" />

</div>
</div>




<div id="div_escura" style="height:100%; width:100%; background-color:rgba(0, 0, 0, 0.2); height: 100%;position: fixed;top: 0;left: 0;   visibility: hidden; ">

<div id="div1">
<div  id="div2" style="width:80%; background-color:#00B200; margin-left:5%; height:30px; border-bottom:none; box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71); border-bottom:solid;  border-color: #009900; border-width:3.5px; margin: 200px auto 0 auto; ">
<p align="center" style="color:#FFFFFF; line-height:30px;">Nova Categoria<img src="imagens/cancelar.png" style="float:right; padding-right: 5%; padding-top:6px;" onClick="funcao_img()" /></p>
</div>
<div style="width:80%; background-color:#f3f3f3; margin-left:5%; height:150px;  border-top:none;box-shadow:0px 0px 12px 0px rgba(47, 50, 50, 0.71); margin: 0 auto 0 auto;">
<br>
<p  align="center">Digite o nome da nova categoria: </p><br>

<input type="text" id="iconemail" style="margin-left:5%; width:70%; background-color:#00B200; border-bottom-color: #009900; opacity:0.75; height:30px; padding-left:2%; color:#FFFFFF;"/>
<img src="imagens/seta_direita_principal.png" style="margin-right:2%; margin-top:6px;" onClick="funcao_nova_categoria(document.getElementById('iconemail').value); funcao_img();" />

</div>
</div>
</div>

<div id="div_escura3" style="height:100%; width:100%; background-color:rgba(0, 0, 0, 0.2); height: 100%;position: fixed;top: 0;left: 0;   visibility: hidden; ">
<div id="calculator">
	<!-- Screen and clear key -->
	<div class="top">
   	    
		<span class="clear">C</span>
		<div class="screen"></div>
	</div>
	
	<div class="keys">
		<!-- operators and other keys -->
		<span>7</span>
		<span>8</span>
		<span>9</span>
		<span class="operator">+</span>
		<span>4</span>
		<span>5</span>
		<span>6</span>
		<span class="operator">-</span>
		<span>1</span>
		<span>2</span>
		<span>3</span>
		<span class="operator">÷</span>
		<span>0</span>
		<span>.</span>
		<span class="eval">=</span>
		<span class="operator">x</span>
        <span>Pronto</span>
        <span>Sair</span>
	</div>
</div>
</div>

</form>
</div><br>
</div>

</body>
</html>

