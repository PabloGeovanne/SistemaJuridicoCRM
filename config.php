<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
header('Content-Type: text/html; charset=utf-8');

$conexao = new MySQLi('localhost', 'USERDB', 'PASSDB', 'DBNAME');
if($conexao->connect_error){
   echo "Desconectado! Erro: " . $conexao->connect_error;
}else{
   echo "";
}

mysqli_set_charset($conexao, "utf8");
?>