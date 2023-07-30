<?php
header('Content-Type: text/html; charset=utf-8');
require("conexao.php");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$email = $_POST['email'];
$senha = $_POST['senha'];
$crypt = mysql_fetch_array(mysql_query("select * from cadastro where email = '$email'"));
if(password_verify($senha,$crypt['cd_senha']))
{
	if (!isset($_SESSION)) session_start();

	$_SESSION['UsuarioCodigo'] =  $crypt['cd_usuario'];
	$_SESSION['UsuarioNivel'] = 1;
	header("Location: principal.php"); exit;
}
else
{
	echo"<script>alert('Login inválido');window.location.href = 'cliqueEntrar.html';</script>"; exit;
}
?>