<?
require_once "../config.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>atualizando Empresa...</title>
</head>
<body>
<?php
$nome_emp=$_POST['nome_emp'];
$cnpj_cpf=$_POST['cnpj_cpf'];
$emp_rua=$_POST['emp_rua'];
$emp_num=$_POST['emp_num'];
$emp_bairro=$_POST['emp_bairro'];
$emp_city=$_POST['emp_city'];
$emp_uf=$_POST['emp_uf'];
$emp_comp=$_POST['emp_comp'];
$emp_cep=$_POST['emp_cep'];
$emp_tipo=$_POST['emp_tipo'];
$emp_tel=$_POST['emp_tel'];
$id_emp_hide=$_POST['id_emp_hide'];

$sql = ("UPDATE adv_empresas SET nome_emp='$nome_emp', cnpj_cpf='$cnpj_cpf', emp_rua='$emp_rua', emp_num='$emp_num', emp_bairro='$emp_bairro', emp_city='$emp_city', emp_uf='$emp_uf', emp_comp='$emp_comp', emp_cep='$emp_cep', emp_tipo='$emp_tipo', emp_tel='$emp_tel' WHERE id_emp='$id_emp_hide'");

if ($conexao->query($sql) === TRUE) {
	
echo"<script type='text/javascript'>";
echo "window.location='index.php#reclamada';alert('Empresa $nome_emp atualizada com exito.')";
echo "</script>";
	
} else {
    echo "Error updating record: " . $conexao->error;
}
$conexao->close();
?>
</body>
</html>