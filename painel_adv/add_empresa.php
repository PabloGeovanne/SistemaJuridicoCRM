<?
require("../config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrando Empresa...</title>
</head>
<body>
<?php
$adv_id=$_POST['adv_id'];
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

//verifica se já existe
$query = ("select * from adv_empresas where adv_id='$adv_id' AND cnpj_cpf='$cnpj_cpf'");
$sqli_result = mysqli_query($conexao, $query);
$rows = mysqli_fetch_assoc($sqli_result);	
	
if ($rows != false) {
echo"<script type='text/javascript'>";
echo "window.history.back();alert('Você já realizou o cadastro desta empresa: $nome_emp!')";
echo "</script>";
	
} else {	
$sql = ("INSERT INTO adv_empresas(adv_id, nome_emp, cnpj_cpf, emp_rua, emp_num, emp_bairro, emp_city, emp_uf, emp_comp, emp_cep, emp_tipo, emp_tel)
VALUES('$adv_id', '$nome_emp', '$cnpj_cpf', '$emp_rua', '$emp_num', '$emp_bairro', '$emp_city', '$emp_uf', '$emp_comp', '$emp_cep', '$emp_tipo', '$emp_tel')");
}
if (mysqli_query($conexao, $sql)) {
	
echo"<script type='text/javascript'>";
echo "window.location='cadastro.php';alert('Empresa $nome_emp cadastrada, agora cadastre o reclamante!')";
echo "</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);	
	
?>
</body>
</html>