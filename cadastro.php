<?php
	session_start();
	if(!isset($_SESSION["oab"]) || !isset($_SESSION["senha"])) {
	}else{
	echo"<script type='text/javascript'>";
	echo "window.location='painel_adv/index.php';alert('você já esta logado!, finalize a secção atual para realizar um novo cadastro!')";
	echo "</script>";
		exit;
		}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cadastro de Advogado - Aprovação</title>
<link href="painel_adv/css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="painel_adv/js/jquery.maskMoney.js" type="text/javascript"></script>
	<script src="painel_adv/js/jquery.mask.js" type="text/javascript"></script>
	
<script type="text/javascript">
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.mobile_with_ddd').mask('(00) 00000-0000');
  $('.otherphone_with_ddd').mask('(00) 000000000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: false});
  $('.rg').mask('00.000.000-AAAAA', {reverse: false});
  $('.cep').mask('00000-000', {reverse: false});
  $('.oab').mask('0000000', {reverse: false});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
</script>
<style type="text/css">
	.form-cadastro {
	margin-left: 10%;
	margin-right: 10%;
}
	#bt_cadastro {
	margin-left: 11%;
	margin-top: 8%;
	margin-bottom: 3%;
	}
	select[readonly] {
	  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
	  pointer-events: none;
	  touch-action: none;
	}
	

	
#wrap{

}
legend{
	color:#141823;
	font-size:25px;
	font-weight:bold;
}
.signup-btn {
  background: #79bc64;
  background-image: -webkit-linear-gradient(top, #79bc64, #578843);
  background-image: -moz-linear-gradient(top, #79bc64, #578843);
  background-image: -ms-linear-gradient(top, #79bc64, #578843);
  background-image: -o-linear-gradient(top, #79bc64, #578843);
  background-image: linear-gradient(to bottom, #79bc64, #578843);
  -webkit-border-radius: 4;
  -moz-border-radius: 4;
  border-radius: 4px;
  text-shadow: 0px 1px 0px #898a88;
  -webkit-box-shadow: 0px 0px 0px #a4e388;
  -moz-box-shadow: 0px 0px 0px #a4e388;
  box-shadow: 0px 0px 0px #a4e388;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  border: solid #3b6e22  1px;
  text-decoration: none;
}

.signup-btn:hover {
  background: #79bc64;
  background-image: -webkit-linear-gradient(top, #79bc64, #5e7056);
  background-image: -moz-linear-gradient(top, #79bc64, #5e7056);
  background-image: -ms-linear-gradient(top, #79bc64, #5e7056);
  background-image: -o-linear-gradient(top, #79bc64, #5e7056);
  background-image: linear-gradient(to bottom, #79bc64, #5e7056);
  text-decoration: none;
}
.navbar-default .navbar-brand{
		color:#fff;
		font-size:30px;
		font-weight:bold;
	}
.form .form-control { margin-bottom: 10px; }
@media (min-width:768px) {
	#home{
		margin-top:50px;
	}
	#home .slogan{
		color: #0e385f;
		line-height: 29px;
		font-weight:bold;
	}
}
</style>
</head>
<body>
<div class="container" id="wrap">
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="cadastrando.php" method="post" accept-charset="utf-8" class="form" role="form">
                   <legend>Dados cadastrais do advogado com OAB ativa</legend>
                    <h4>Por favor complete o formulário com seus dados pessoais e profissionais.</h4>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Atenção!</strong> Os campos em <span class="label label-danger">Vermelho</span> é obrigatório o seu preenchimento.
			</div>                    
                   	<div class="row">
                        <div class="col-xs-4 col-md-3 has-error">
                            <input type="text" class="form-control input-lg" id="nome" name="nome" placeholder="Nome" required>
                        </div>
                        <div class="col-xs-4 col-md-5 has-error">
                            <input type="text" class="form-control input-lg" id="adv_sobre_nome" name="adv_sobre_nome" placeholder="Sobrenome completo" required>                      
                        </div>
                        <div class="col-xs-4 col-md-4 has-error">
                            <select name="adv_sex" id="adv_sex" class="form-control input-lg" required>
                               <option value="" selected>Sexo</option>
                                <option value="masculino">Masculino</option>
                                <option value="feminino">Feminino</option>
                            </select>
<script type="text/javascript">
$(document).ready(function() {
$('#adv_sex').change(function(){
    var item = $(this).val();

    if (item === "masculino")
    {
			$('#adv_cargo').each(function () {
			$(this).val("Advogado");
			});
    }else if (item === "feminino"){
			$('#adv_cargo').each(function () {
			$(this).val("Advogada");
			});
	}else if(item === ""){
			$('#adv_cargo').each(function () {
			$(this).val("");
			});	}
});	
});
</script>    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4 col-md-4 has-error">
                            <select name="nacionalidade" id="nacionalidade" class="form-control input-lg" required>
                                <option value="">Nacionalidade</option>
                                <option value="brasileiro(a)">Brasileiro(a)</option>
                                <option value="estrangeiro(a)">Estrangeiro(a)</option> 
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4 has-error">
                            <select name="estado_civil" id="estado_civil" class="form-control input-lg" required>
                            		<option value="" selected>Estado Civil</option>
									<option value="solteiro(a)">Solteiro(a)</option>
									<option value="casado(a)">Casado(a)</option>
									<option value="separado(a)">Separado(a)</option>
									<option value="viúvo(a)">Viúvo(a)</option>
									<option value="divorciado(a)">Divorciado(a)</option>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <select name="adv_cargo" id="adv_cargo" class="form-control input-lg" readonly required>
									<option value="" selected>Cargo</option>
									<option value="Advogado">Advogado</option>
									<option value="Advogada">Advogada</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-5 col-md-8 has-error">
		                    <input type="text" name="oab" id="oab" value="<?php echo htmlspecialchars($_POST['c_oab']); ?>" class="form-control input-lg oab" placeholder="OAB" maxlength="7" required>
						</div>
                        <div class="col-xs-7 col-md-4 has-error">
                            <select name="uf_oab" id="uf_oab" class="form-control input-lg" required>
									<option value="" selected>OAB/UF</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espirito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MT">Mato Grosso</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
                            </select>
                        </div>
					</div>
                    <div class="row">
                    	<div class="col-xs-12 col-md-12 has-error">
                    <input type="text" name="cpf" id="cpf" value="" class="form-control input-lg cpf" placeholder="CPF: 000.000.000-00" maxlength="14" required>
						</div>
					</div>
                    <div class="row">
						<div class="col-xs-6 col-md-8 has-error">
							<input type="text" name="adv_rg" id="adv_rg" value="" class="form-control input-lg rg" placeholder="RG: 00.000.000-X" required>         
						</div>    
                        <div class="col-xs-6 col-md-4 has-error">
                            <select name="adv_ssp" id="adv_ssp" class="form-control input-lg" required>
									<option value="" selected>SSP/UF</option>
									<option value="AC">Acre</option>
									<option value="AL">Alagoas</option>
									<option value="AP">Amapá</option>
									<option value="AM">Amazonas</option>
									<option value="BA">Bahia</option>
									<option value="CE">Ceará</option>
									<option value="DF">Distrito Federal</option>
									<option value="ES">Espirito Santo</option>
									<option value="GO">Goiás</option>
									<option value="MA">Maranhão</option>
									<option value="MS">Mato Grosso do Sul</option>
									<option value="MT">Mato Grosso</option>
									<option value="MG">Minas Gerais</option>
									<option value="PA">Pará</option>
									<option value="PB">Paraíba</option>
									<option value="PR">Paraná</option>
									<option value="PE">Pernambuco</option>
									<option value="PI">Piauí</option>
									<option value="RJ">Rio de Janeiro</option>
									<option value="RN">Rio Grande do Norte</option>
									<option value="RS">Rio Grande do Sul</option>
									<option value="RO">Rondônia</option>
									<option value="RR">Roraima</option>
									<option value="SC">Santa Catarina</option>
									<option value="SP">São Paulo</option>
									<option value="SE">Sergipe</option>
									<option value="TO">Tocantins</option>
                            </select>
                        </div>
					</div>
                    <div class="row">
						<div class="col-xs-3 col-md-3 has-error">
							<input type="text" name="cep" id="cep" value="" class="form-control input-lg cep" placeholder="CEP: 00000-000"  required>
<script type="text/javascript">
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
								
                        $('#numero_casa').focus();
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
</script>
						</div>    
						<div class="col-xs-7 col-md-7 has-error">
							<input type="text" name="rua" id="rua" value="" class="form-control input-lg" placeholder="Endereço" required>    
						</div>    
                        <div class="col-xs-2 col-md-2">
							<input type="text" name="numero_casa" id="numero_casa" value="" class="form-control input-lg" placeholder="Nº">         
                        </div>
					</div>
                    <div class="row">
						<div class="col-xs-4 col-md-4">
							<input type="text" name="bairro" id="bairro" value="" class="form-control input-lg" placeholder="Bairro">         
						</div>    
						<div class="col-xs-4 col-md-4 has-error">
							<input type="text" name="cidade" id="cidade" value="" class="form-control input-lg" placeholder="Cidade" required>        
						</div>    
                        <div class="col-xs-2 col-md-2 has-error">
							<input type="text" name="estado" id="estado" value="" class="form-control input-lg" placeholder="UF" required> 
                        </div>
                        <div class="col-xs-2 col-md-2">
							<input type="text" name="complemento" id="complemento" value="" class="form-control input-lg" placeholder="Comp.">         
                        </div>
					</div>
                    <div class="row">
						<div class="col-xs-4 col-md-4 has-error">
							<input type="text" name="tel1" id="tel1" value="" class="form-control input-lg phone_with_ddd" placeholder="Tel. com DDD" required>
						</div>    
						<div class="col-xs-4 col-md-4 has-error">
							<input type="text" name="tel2" id="tel2" value="" class="form-control input-lg mobile_with_ddd" placeholder="Celular com DDD" required>      
						</div>    
                        <div class="col-xs-4 col-md-4">
							<input type="text" name="tel3" id="tel3" value="" class="form-control input-lg otherphone_with_ddd" placeholder="Outro num. com DDD">         
                        </div>
					</div>
                    <div class="row">
                        <div class="col-xs-8 col-md-8 has-error">
                            <select name="adv_honorario_function" id="adv_honorario_function" class="form-control input-lg" required>
                                <option value="" selected>Honorários Advocatícios</option>
                                <option value="001">Percentual</option>
                                <option value="002">Valor em reais</option>
                            </select>
<script type="text/javascript">
$(document).ready(function() {
$('#adv_honorario_function').change(function(){
    var valor = $(this).val();

    if (valor === "001"){
		
		$('#adv_honorario01').prop("disabled",  false);
		$("#adv_hono01").prop("hidden",  false);
		$('#adv_honorario02').prop("disabled",  true);
		$("#adv_hono02").prop("hidden",  true);

    }else if (valor === "002"){
		
		$('#adv_honorario01').prop("disabled",  true);
		$("#adv_hono01").prop("hidden",  true);
		$('#adv_honorario02').prop("disabled",  false);
		$("#adv_hono02").prop("hidden",  false);
		
	}else if(valor === ""){
		
		$('#adv_honorario01').prop("disabled",  true);
		$("#adv_hono01").prop("hidden",  true);
		$('#adv_honorario02').prop("disabled",  true);
		$("#adv_hono02").prop("hidden",  true);
	}
});	
});
</script>    
                        </div>
                        <div class="col-xs-4 col-md-4 has-error" id="adv_hono01" hidden>
                            <select name="adv_honorario" id="adv_honorario01" class = "form-control input-lg" disabled required>
								<option value="50%">50%</option>
								<option value="49%">49%</option>
								<option value="48%">48%</option>
								<option value="47%">47%</option>
								<option value="46%">46%</option>
								<option value="45%">45%</option>
								<option value="44%">44%</option>
								<option value="43%">43%</option>
								<option value="42%">42%</option>
								<option value="41%">41%</option>
								<option value="40%">40%</option>
								<option value="39%">39%</option>
								<option value="38%">38%</option>
								<option value="37%">37%</option>
								<option value="36%">36%</option>
								<option value="35%">35%</option>
								<option value="34%">34%</option>
								<option value="33%">33%</option>
								<option value="32%">32%</option>
								<option value="31%">31%</option>
								<option value="30%" selected>30%</option>
								<option value="29%">29%</option>
								<option value="28%">28%</option>
								<option value="27%">27%</option>
								<option value="26%">26%</option>
								<option value="25%">25%</option>
								<option value="24%">24%</option>
								<option value="23%">23%</option>
								<option value="22%">22%</option>
								<option value="21%">21%</option>
								<option value="20%">20%</option>
								<option value="19%">19%</option>
								<option value="18%">18%</option>
								<option value="17%">17%</option>
								<option value="16%">16%</option>
								<option value="15%">15%</option>
								<option value="14%">14%</option>
								<option value="13%">13%</option>
								<option value="12%">12%</option>
								<option value="11%">11%</option>
								<option value="10%">10%</option>
								<option value="9%">9%</option>
								<option value="8%">8%</option>
								<option value="7%">7%</option>
								<option value="6%">6%</option>
								<option value="5%">5%</option>
								<option value="4%">4%</option>
								<option value="3%">3%</option>
								<option value="2%">2%</option>
								<option value="1%">1%</option>
                            </select>
                        </div>
                        <div class="col-xs-4 col-md-4 has-error" id="adv_hono02" hidden>
                            <input type="text" name="adv_honorario" id="adv_honorario02" value="R$ 0,00" class="form-control input-lg" placeholder="R$ 0,00" disabled required>
                        </div>
<script>
  $(function() {
$("#adv_honorario02").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
  })
</script>
                    </div>
                    <br>
                    <div class="row">
                    	<div class="col-xs-12 col-md-12 has-error">
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($_POST['c_email']); ?>" class="form-control input-lg" placeholder="E-mail válido" required>
						</div>
					</div>
                    <div class="row">
                    	<div class="col-xs-5 col-md-5 has-error">
                    <input type="password" value="<?php echo htmlspecialchars($_POST['c_senha']); ?>" class="form-control input-lg" name="senha" id="senha" placeholder="****" required>
						</div>
                    	<div class="col-xs-5 col-md-5">
                    <input type="password" name="senha_real" id="senha_real" value="" class="form-control input-lg" onblur="check_pass()" placeholder="Repetir senha" min="6" pattern="[a-zA-Z0-9]+" title="A senha deve ter no minimo 6 caracteres contendo letras e números." required>
						</div>
<script type="text/javascript">
function check_pass() {
var x= document.getElementById("senha");
    var y= document.getElementById("senha_real");
if(x.value==y.value) return;
else alert("As senhas não conferem, tente novamente!");
	document.getElementById("senha").value = "";
	document.getElementById("senha_teste").value = "";
}
</script>
					</div>
                    <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-12 has-error">
                            <select name="venc_fatura" id="venc_fatura" class="form-control input-lg" required>
								<option value="" selected>Dia de vencimento das faturas</option>
								<option value="05">todo dia 05/mês</option>
								<option value="15">todo dia 15/mês</option>
								<option value="25">todo dia 25/mês</option>
							</select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                     	<div class="col-xs-12 col-md-12 has-error">
						<h2><b><input type="checkbox" class="form-control input-lg" name="term_check" id="term_check" required>
                        <center>
                        Aceito o termo de uso e usuário<span class="glyphicon glyphicon-asterisk icocads"></span> | <a target="_blanck" href="http://inicialtrabalhista.com/termo-de-uso-e-cadastro-advogado-genius-peticao-online/">Ler termo</a></center></b></h2>
						</div>
                    </div>
					<br><br>
                    <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">Próxima Etapa</button>
            </form>
            <br><br>          
        </div>
</div>            
</div>
</body>
</html>