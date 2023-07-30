<?php
if (!isset($_SESSION)) session_start();

require("conexao.php");
require("restrito.php");
?>
<html>
<head>
<link rel="stylesheet" href="estilo.css"  type="text/css">
</head>
<body>
<form align='center'>
<button type="button" onClick="location.href='receita.php'">Receitas</button><br>
<button type="button" onClick="location.href='despesa.php'">Despesas</button>
</form>
</body>
</html>