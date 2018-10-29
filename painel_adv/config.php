<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$user = "DBUSER";
$pass = "PASSDB";
$banco = "DBNAME";
$conexao = mysql_connect($host, $user, $pass) or die(mysql_error());
mysql_select_db($banco) or die(mysql_error());

if(!$conexao){
 echo "Não foi possível conectar com o Banco de Dados, contate o administrador do sistema";
 if(!$banco){
 echo "Não foi possível selecionar o Banco de Dados, contate o administrador do sistema";
 }
}

mysql_set_charset('utf8');

?>