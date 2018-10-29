<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Cadastro de Reclamadas < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/cep_re.js"></script>
<script type="text/javascript">
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
//formata CPF E CNPJ INPUT
function mascaraMutuario(o,f){
    v_obj=o
    v_fun=f
    setTimeout('execmascara()',1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function cpfCnpj(v){
 
    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"")
 
    if (v.length <= 13) { //CPF
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2")
 
        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
 
    } else { //CNPJ
 
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2")
 
        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
 
        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
 
        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")
 
    }
 
    return v
 
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
	<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>CADASTRO DE EMPRESA - ADV</h1>
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
	<li class="active">Empresas</li>
</ol>
					<form name="signup" method="post" action="add_empresa.php">
					<p><input type="submit" class="btn btn-primary" value="Cadastrar"/></p>
					<br>
							<div class="form-group col-md-3" hidden="true">
								<label for="titulo">Adv Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<input type="text" class="form-control" value="<?php print $adv_id ?>" id="adv_id" name="adv_id">
							</div> <!-- input ID do Advogado -->
							<div class="form-group col-md-4">
								<label for="titulo">Nome da Empresa <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<input type="text" class="form-control" id="nome_emp" name="nome_emp" required>
							</div>
							<div class="form-group col-md-3">
								<label for="titulo">Tipo de empresa <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<select type="date" class="form-control" id="emp_tipo" name="emp_tipo" required>
									<option value="jurídica">-- Empresa Juridica --</option>
									<option value="física">-- Pessoa Fisica --</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="titulo">CNPJ/CPF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="text" class="form-control" id="cnpj_cpf" name="cnpj_cpf" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' required>
							</div>
							<div class="form-group col-md-2">
				<label for="titulo">CEP <span class="glyphicon glyphicon-asterisk icocads"></span><small> busca automática</small></label>
			<input type="text" class="form-control" id="emp_cep" name="emp_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)">
							</div>
							<div class="form-group col-md-4">
								<label for="titulo">Logradoura <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<input type="text" class="form-control" id="emp_rua" name="emp_rua" required>                                              
							</div>
							<div class="form-group col-md-1">
								<label for="exampleInputPassword1">Nº</label>
								<input type="text" class="form-control" id="emp_num" name="emp_num">
							</div>
							<div class="form-group col-md-2">
								<label for="valor_compra">Bairro</label>
								<input type="text" class="form-control" id="emp_bairro" name="emp_bairro">                                
							</div>
							<div class="form-group col-md-2">
								<label for="valor_venda">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<input type="text" class="form-control" id="emp_city" name="emp_city" required>
							</div>
							<div class="form-group col-md-1">
								<label for="status">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
								<select type="text" class="form-control" id="emp_uf" name="emp_uf" required>
										<option value="">selecionar</option>
										<option value="AC">Acre</option> 
										<option value="AL">Alagoas</option> 
										<option value="AM">Amazonas</option> 
										<option value="AP">Amapá</option> 
										<option value="BA">Bahia</option> 
										<option value="CE">Ceará</option> 
										<option value="DF">Distrito Federal</option> 
										<option value="ES">Espírito Santo</option> 
										<option value="GO">Goiás</option> 
										<option value="MA">Maranhão</option> 
										<option value="MT">Mato Grosso</option> 
										<option value="MS">Mato Grosso do Sul</option> 
										<option value="MG">Minas Gerais</option> 
										<option value="PA">Pará</option> 
										<option value="PB">Paraíba</option> 
										<option value="PR">Paraná</option> 
										<option value="PE">Pernambuco</option> 
										<option value="PI">Piauí</option> 
										<option value="RJ">Rio de Janeiro</option> 
										<option value="RN">Rio Grande do Norte</option> 
										<option value="RO">Rondônia</option> 
										<option value="RS">Rio Grande do Sul</option> 
										<option value="RR">Roraima</option> 
										<option value="SC">Santa Catarina</option> 
										<option value="SE">Sergipe</option> 
										<option value="SP">São Paulo</option> 
										<option value="TO">Tocantins</option>
								</select>
								
							</div>
							<div class="form-group col-md-2">
								<label for="data_cadastro">Complemento</label>
								<input type="text" class="form-control" id="emp_comp" name="emp_comp">
							</div>  
							<div class="form-group col-md-2">
								<label for="titulo">Telefone</label>
			<input type="text" class="form-control" id="emp_tel" name="emp_tel" maxlength="12" OnKeyPress="formatar('## ####-####', this)">
							</div>
					</form>
	</div>
</body>
</html>
