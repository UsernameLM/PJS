<?php
if (!isset($_SESSION)) session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Conta Conjunta</title>
<link rel="stylesheet" href="estilo.css"  type="text/css">
</head>
<script language="javascript">
function calcular()
{
	//numeros = new Array ();
	//index = eval(document.dados.qtdpessoas.value);
	alert("oi");
	//numeros[] = eval(document.dados.qtdpessoas.value);
}
</script>

<body>
<form name="dados" align="center">
<p align="center"><h2>Conta-Conjunta</h2></p>
<p align="center">Quantas pessoas lhe ajudam nas despesas? </p>
<p align="center"><input type="number" name="qtdpessoas"></p>
	<button name="clique" value="clique" onClick="calcular()">Clique</button>

</form>
</body>
</html>
