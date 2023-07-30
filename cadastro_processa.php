<?php
header('Content-Type: text/html; charset=utf-8');
require("conexao.php");

mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

mysql_query("INSERT INTO cadastro (nome,email,cd_senha) VALUES ('$nome','$email','$senha')") or die(mysql_error());
header ("Location: cliqueEntrar.html"); exit;
?>