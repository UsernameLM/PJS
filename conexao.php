<?php
header('Content-Type: text/html; charset=utf-8');
@mysql_connect('localhost', 'admin', 'admin') or trigger_error(mysql_error());
mysql_select_db('pjs') or trigger_error(mysql_error());
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
?>