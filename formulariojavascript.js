// JavaScript Document

function exibesenha()
{
	
alert("oi");	
} 

function Clica_pergunta()
{
alert("oi");	
}

function verificasenha()
{
	if(document.formulario.senha.value != document.formulario.repetir_senha.value)
	{
		alert("Senhas não coincidem!");
		document.formulario.repetir_senha.focus();
		return false;
	}
}

function Clicar_favorito(i)
{
	if (i == 1){
	        document.getElementById("img_calculadora").src="imagens/star_selecionada.png";

	}
}
function Descrição()
{
    frm = document.getElementById('formulariocheck');
    frm.innerHTML = "<br /><textarea rows='4' cols='50'>oi</textarea>";
}

function cbopção()
{
	
	alert("oi");
}
/*Script para conferir senhas -----------------------------------------------------------*/
function entrar(input) {
    if (input.value != document.getElementById('txtSenha').value) {
        input.setCustomValidity('Repita a senha corretamente');
    } else {
        input.setCustomValidity('');
    }
}



/*Script para os campos dos formulÃ¡rios ------------------------------------------------*/
function carrega()
{
  document.formulario.email.value="Digite seu E-mail";
   document.formulario.nome.value="Digite seu Nome";
    
}
function carrega_despesa()
{
  document.formdespesa.descricao.value="Descrição da Despesa";
   document.formdespesa.valor.value="Quanto você gastou?";
    
}

function zera_email()
{
	
  if(document.formulario.email.value=="Digite seu E-mail")
  {
	  document.formulario.email.value="";
  }
  else
  	  if(document.formulario.email.value!="Digite seu E-mail")
	  document.formulario.email.value!="";
  
  if (document.formulario.nome.value == "")
  {document.formulario.nome.value = "Digite seu Nome";}

  
}
function zera_nome()
{
	
  if(document.formulario.nome.value=="Digite seu Nome")
  {
	  document.formulario.nome.value="";
  }
  else
  	  if(document.formulario.nome.value!="Digite seu Nome")
	  document.formulario.nome.value!="";
  
  if (document.formulario.email.value == "")
  {
  document.formulario.email.value = "Digite seu E-mail";}


}
function zera_senha()
{
 
  
  if(document.formulario.email.value==""){
    document.formulario.email.value="Digite seu E-mail";}
  if(document.formulario.nome.value==""){
   document.formulario.nome.value="Digite seu Nome";}
    
}
function zera_repetesenha()
{
 
  
    if(document.formulario.nome.value==""){
   document.formulario.nome.value="Digite seu Nome";}
    if(document.formulario.email.value==""){
    document.formulario.email.value="Digite seu E-mail";}
}
function zera_despesa()
{
 
  if(document.formdespesa.valor.value=="Quanto você gastou?")
  {
	  document.formdespesa.valor.value="";
  }
  else
  	  if(document.formdespesa.valor.value!="Quanto você gastou?")
	  document.formdespesa.valor.value!="";
  
  if (document.formdespesa.descricao.value == "")
  {document.formulario.nome.value = "Descrição da Despesa";}
}
function zera_descricao()
{
 
  if(document.formdespesa.descricao.value=="Descrição da Despesa")
  {
	  document.formdespesa.descricao.value="";
  }
  else
  	  if(document.formdespesa.descricao.value!="Descrição da Despesa")
	  document.formdespesa.descricao.value!="";
  
  if (document.formdespesa.valor.value == "")
  {document.formdespesa.valor.value = "Quanto você gastou?";}
}
/*SCript para os vetores da Conta-Conjunta ----------------------------------------------*/

inputs = new Array();

function Gen() {
   

    var frm = document.getElementById('numbers');
    var amount = document.getElementById('amount').value;

    frm.innerHTML = "<div></div>";


    for (var i = 0; i < amount; i++) {
        /*inputs[i] = document.createElement('input');
        inputs[i].type = 'number';
        frm.appendChild(inputs[i]); ---- Outra forma de criar elementos*/
        frm.innerHTML += "<div><br><p>E-mail da " + (i + 1) + "ª Pessoa</p><input type='email' /><br></div>";
    }
}

function Calc() {
    var vet = new Array();

    for (var i = 0; inputs.length - 1; i++) {
        document.write(i + ": " + (inputs[i].value * inputs[inputs.length - 1].value) + "<BR>");
    }

}


 function Limpar(valor, validos) {
// retira caracteres invalidos da string
var result = "";
var aux;
for (var i=0; i < valor.length; i++) {
aux = validos.indexOf(valor.substring(i, i+1));
if (aux>=0) {
result += aux;
}
}
return result;
}

//Script para formatar campo de valor ----------------------------------------------------

function Formata(campo,tammax,teclapres,decimal) {
var tecla = teclapres.keyCode;
vr = Limpar(campo.value,"0123456789");
tam = vr.length;
dec=decimal

if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }

if (tecla == 8 )
{ tam = tam - 1 ; }

if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )
{

if ( tam <= dec )
{ campo.value = vr ; }

if ( (tam > dec) && (tam <= 5) ){
campo.value = vr.substr( 0, tam - 2 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 6) && (tam <= 8) ){
campo.value = vr.substr( 0, tam - 5 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; 
}
if ( (tam >= 9) && (tam <= 11) ){
campo.value = vr.substr( 0, tam - 8 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 12) && (tam <= 14) ){
campo.value = vr.substr( 0, tam - 11 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - dec, tam ) ; }
if ( (tam >= 15) && (tam <= 17) ){
campo.value = vr.substr( 0, tam - 14 ) + "." + vr.substr( tam - 14, 3 ) + "." + vr.substr( tam - 11, 3 ) + "." + vr.substr( tam - 8, 3 ) + "." + vr.substr( tam - 5, 3 ) + "," + vr.substr( tam - 2, tam ) ;}
} 

}