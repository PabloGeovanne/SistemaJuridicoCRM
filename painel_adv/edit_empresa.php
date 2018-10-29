<div id="include">
<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Editar Empresa < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

</script>
<style type="text/css">
#for-container {
position: absolute;
left: 5%;
height: 10%;
	}
</style>	
</head>
<body>
<header>
<?php
include 'menu_nav.php';
?>
</header>
<?php 
$id_emp_hide = $_GET['empresa'];

    $sql = ("SELECT * FROM adv_empresas WHERE id_emp = '$id_emp_hide'");
	$sqli_result = mysqli_query($conexao, $sql);
	$dado = mysqli_fetch_assoc($sqli_result);	
	
	$nome_emp = $dado['nome_emp'];
	$emp_tipo = $dado['emp_tipo'];
	$cnpj_cpf = $dado['cnpj_cpf'];
	$emp_rua = $dado['emp_rua'];
	$emp_num = $dado['emp_num'];
	$emp_bairro = $dado['emp_bairro'];
	$emp_city = $dado['emp_city'];
	$emp_uf = $dado['emp_uf'];
	$emp_comp = $dado['emp_comp'];
	$emp_cep = $dado['emp_cep'];
	$emp_tel = $dado['emp_tel'];
?>
	<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>ATUALIZAÇÃO DE RECLAMADA</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Dados da empresa</h2>
		</header>
    </div>
    <br>
    <br>
        <div id="for-container">
    <br>
    <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li class="active">Atualizar reclamada</li>
    </ol>
						<form name="signup" method="post" action="editando_empresa.php">
                        <p><input type="submit" class="btn btn-primary" value="Atualizar"/></p>
                        <br>
                                <div class="form-group col-md-1" hidden="">
                <input type="text" class="form-control" id="id_emp_hide" name="id_emp_hide" required="required" value="<?php print $id_emp_hide ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">Nome da Empresa <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="nome_emp" name="nome_emp" value="<?php print $nome_emp ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Tipo de empresa <span class="glyphicon glyphicon-asterisk icocads"></span></label>
               						<input type="text" class="form-control" id="emp_tipo" name="emp_tipo" value="<?php print $emp_tipo ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">CNPJ/CPF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="text" class="form-control" id="cnpj_cpf" name="cnpj_cpf" maxlength="18" placeholder="Ex. 00.000.000/0001-00 ou 000.000.000-37" value="<?php print $cnpj_cpf ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">Rua/Avenida <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="emp_rua" name="emp_rua" value="<?php print $emp_rua ?>">                                              
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="exampleInputPassword1">Nº <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="emp_num" name="emp_num" value="<?php print $emp_num ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="valor_compra">Bairro <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="emp_bairro" name="emp_bairro" value="<?php print $emp_bairro ?>">                                
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="valor_venda">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="emp_city" name="emp_city" value="<?php print $emp_city ?>">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="status">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="emp_uf" name="emp_uf" maxlength="2" value="<?php print $emp_uf ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="data_cadastro">Complemento</span></label>
                                    <input type="text" class="form-control" id="emp_comp" name="emp_comp" value="<?php print $emp_comp ?>">
                                </div>  
                 				<div class="form-group col-md-2">
                                    <label for="titulo">CEP <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="text" class="form-control" id="emp_cep" name="emp_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)" value="<?php print $emp_cep ?>">
                                </div>
                 				<div class="form-group col-md-2">
                                    <label for="titulo">Telefone</span></label>
<input type="text" class="form-control" id="emp_tel" name="emp_tel" maxlength="12" OnKeyPress="formatar('## ####-####', this)" value="<?php print $emp_tel ?>">
                                </div>
                        </form>
                </div>
</body>
</html>
