<?php
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION)) session_start();
require("conexao.php");
require("restrito.php");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$data = $_POST['data'];
$comentario = $_POST['comentario'];
$categoria = $_POST['cbopções'];
$cdusuario = $_SESSION['UsuarioCodigo'];

$insert = mysql_query("INSERT INTO receitas (descricao,valor,data_receita,categoria,cd_usuario,comentario) values ('$descricao','$valor','$data','$categoria','$cdusuario','$comentario')") or die(mysql_error());
echo"<script>window.location.href = 'lista_receitas.php';</script>";
?>