<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$host = "localhost";
$usuario = "DBUSER";
$senha = "PASSDB";
$bd = "DBNAME";

$mysqli = new mysqli($host, $usuario, $senha, $bd);

if($mysqli->connect_errno)
	echo "Falha na conexão com o banco de dados: (".$mysqli->connect_errno.") ".$mysqli->connect_error;
	
	
$mysqli->set_charset('utf8')
?>