<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Procuração < Contrato | Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script src="js/jquery.mask.js" type="text/javascript"></script>
<script type="text/javascript" src="js/cep.js"></script>
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


function dateatual(){

	  var now = new Date();
var mName = now.getMonth() +1 ;
var dName = now.getDay() +1;
var dayNr = now.getDate();
var yearNr=now.getYear();
if(dName==1) {Day = "";}
if(dName==2) {Day = "";}
if(dName==3) {Day = "";}
if(dName==4) {Day = "";}
if(dName==5) {Day = "";}
if(dName==6) {Day = "";}
if(dName==7) {Day = "";}
if(mName==1){Month = "janeiro";}
if(mName==2){Month = "fevereiro";}
if(mName==3){Month = "março";}
if(mName==4){Month = "abril";}
if(mName==5){Month = "maio";}
if(mName==6){Month = "junho";}
if(mName==7){Month = "julho";}
if(mName==8){Month = "agosto";}
if(mName==9){Month = "setembro";}
if(mName==10){Month = "outubro";}
if(mName==11){Month = "novembro";}
if(mName==12){Month = "dezembro";}
if(yearNr < 2000) {Year = 1900 + yearNr;}
else {Year = yearNr;}
var todaysDate =(" " + Day + "" + dayNr + " de " + Month + " de " + Year);
document.testeform.datahoje.value=todaysDate;
}

function validateForm() {
    var x = document.forms["testeform"]["cliente_cpf_num"].value;
    if (x == null ||x == "") {
        alert("Nenhum CPF foi escolhido, o documento será gerada por incompleto!");
		document.getElementById("busca").focus();
        return false;
    }
}
	
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
  $('.pis').mask('000.00000.00-0', {reverse: false});
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
</head>
<body onLoad="dateatual()">
<?php
include 'menu_nav.php';
?>
	<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>BUSCA DE RECLAMANTE</h1>
		</header>	
		<br>
		<div class="row">
			<div class="form-group col-md-6 col-md-offset-3">
			    <input type="text" class="form-control" id="busca" placeholder="CPF DO RECLAMANTE" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
            </div>
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Informações resumida do reclamante</h2>
		</header>
		<br>
		<div class="row" id="page-content">
        <br>
        <br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li class="active">Procuração & Contrato</li>
</ol>
				<form action="" name="testeform" target="_blank" method="post" onsubmit="return validateForm()">
<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<small>
<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>
</small>
</button>
<strong>Atenção!</strong> Os campos em <span class="label label-danger">Vermelho</span> é obrigatório o seu preenchimento.</div>					  
					  <div class="row">
								<div class="col-xs-12 col-md-2">
								<label for="titulo">Gerar documentos</label>
								<button type="submit" name="down" class="btn btn-primary" OnClick="document.testeform.action='procuracao_word/index.php';document.testeform.submit();" >
								<span class="glyphicon glyphicon-send" aria-hidden="true"></span> Gerar Procuração</button>
								</div>
								<div class="col-xs-12 col-md-2">
								<label for="titulo">Gerar registro</label>
								<button id="f_cadastral" type="submit" name="down" class="btn btn-danger" OnClick="document.testeform.action='ficha_cadastral.php';document.testeform.submit();" >
								<span class="glyphicon glyphicon-paste" aria-hidden="true"></span> Ficha Cadastral</button>
								</div>
								<div class="col-xs-12 col-md-6 has-error">
								<label for="titulo">Honôrarios</label>
								<select type="text" class="form-control" id="adv_honorario" name="adv_honorario" required>
								<option value="(não-informado)" <?php echo $adv_uf_oab==''?'selected':'';?> >selecione o percentual do contrato</option>
								<option value="50%" <?php echo $adv_honorario=='50%'?'selected':'';?> >50%</option>
								<option value="49%" <?php echo $adv_honorario=='49%'?'selected':'';?> >49%</option>
								<option value="48%" <?php echo $adv_honorario=='48%'?'selected':'';?> >48%</option>
								<option value="47%" <?php echo $adv_honorario=='47%'?'selected':'';?> >47%</option>
								<option value="46%" <?php echo $adv_honorario=='46%'?'selected':'';?> >46%</option>
								<option value="45%" <?php echo $adv_honorario=='45%'?'selected':'';?> >45%</option>
								<option value="44%" <?php echo $adv_honorario=='44%'?'selected':'';?> >44%</option>
								<option value="43%" <?php echo $adv_honorario=='43%'?'selected':'';?> >43%</option>
								<option value="42%" <?php echo $adv_honorario=='42%'?'selected':'';?> >42%</option>
								<option value="41%" <?php echo $adv_honorario=='41%'?'selected':'';?> >41%</option>
								<option value="40%" <?php echo $adv_honorario=='40%'?'selected':'';?> >40%</option>
								<option value="39%" <?php echo $adv_honorario=='39%'?'selected':'';?> >39%</option>
								<option value="38%" <?php echo $adv_honorario=='38%'?'selected':'';?> >38%</option>
								<option value="37%" <?php echo $adv_honorario=='37%'?'selected':'';?> >37%</option>
								<option value="36%" <?php echo $adv_honorario=='36%'?'selected':'';?> >36%</option>
								<option value="35%" <?php echo $adv_honorario=='35%'?'selected':'';?> >35%</option>
								<option value="34%" <?php echo $adv_honorario=='34%'?'selected':'';?> >34%</option>
								<option value="33%" <?php echo $adv_honorario=='33%'?'selected':'';?> >33%</option>
								<option value="32%" <?php echo $adv_honorario=='32%'?'selected':'';?> >32%</option>
								<option value="31%" <?php echo $adv_honorario=='31%'?'selected':'';?> >31%</option>
								<option value="30%" <?php echo $adv_honorario=='30%'?'selected':'';?> >30%</option>
								<option value="29%" <?php echo $adv_honorario=='29%'?'selected':'';?> >29%</option>
								<option value="28%" <?php echo $adv_honorario=='28%'?'selected':'';?> >28%</option>
								<option value="27%" <?php echo $adv_honorario=='27%'?'selected':'';?> >27%</option>
								<option value="26%" <?php echo $adv_honorario=='26%'?'selected':'';?> >26%</option>
								<option value="25%" <?php echo $adv_honorario=='25%'?'selected':'';?> >25%</option>
								<option value="24%" <?php echo $adv_honorario=='24%'?'selected':'';?> >24%</option>
								<option value="23%" <?php echo $adv_honorario=='23%'?'selected':'';?> >23%</option>
								<option value="22%" <?php echo $adv_honorario=='22%'?'selected':'';?> >22%</option>
								<option value="21%" <?php echo $adv_honorario=='21%'?'selected':'';?> >21%</option>
								<option value="20%" <?php echo $adv_honorario=='20%'?'selected':'';?> >20%</option>
								<option value="19%" <?php echo $adv_honorario=='19%'?'selected':'';?> >19%</option>
								<option value="18%" <?php echo $adv_honorario=='18%'?'selected':'';?> >18%</option>
								<option value="17%" <?php echo $adv_honorario=='17%'?'selected':'';?> >17%</option>
								<option value="16%" <?php echo $adv_honorario=='16%'?'selected':'';?> >16%</option>
								<option value="15%" <?php echo $adv_honorario=='15%'?'selected':'';?> >15%</option>
								<option value="14%" <?php echo $adv_honorario=='14%'?'selected':'';?> >14%</option>
								<option value="13%" <?php echo $adv_honorario=='13%'?'selected':'';?> >13%</option>
								<option value="12%" <?php echo $adv_honorario=='12%'?'selected':'';?> >12%</option>
								<option value="11%" <?php echo $adv_honorario=='11%'?'selected':'';?> >11%</option>
								<option value="10%" <?php echo $adv_honorario=='10%'?'selected':'';?> >10%</option>
								<option value="9%" <?php echo $adv_honorario=='9%'?'selected':'';?> >9%</option>
								<option value="8%" <?php echo $adv_honorario=='8%'?'selected':'';?> >8%</option>
								<option value="7%" <?php echo $adv_honorario=='7%'?'selected':'';?> >7%</option>
								<option value="6%" <?php echo $adv_honorario=='6%'?'selected':'';?> >6%</option>
								<option value="5%" <?php echo $adv_honorario=='5%'?'selected':'';?> >5%</option>
								<option value="4%" <?php echo $adv_honorario=='4%'?'selected':'';?> >4%</option>
								<option value="3%" <?php echo $adv_honorario=='3%'?'selected':'';?> >3%</option>
								<option value="2%" <?php echo $adv_honorario=='2%'?'selected':'';?> >2%</option>
								<option value="1%" <?php echo $adv_honorario=='1%'?'selected':'';?> >1%</option>
								</select>
								</div>
					  </div>
					  <br><br>
					  <div class="row">
								<div class="col-xs-12 col-md-4 has-error">
									<label for="titulo">Nome completo</label>
									<input type="text" class="form-control" id="nomecompleto" name="nomecompleto" required>
								</div>
                                <div class="col-xs-12 col-md-2 has-error">
                                    <label for="titulo">Sexo</label>
                                    <select type="text" class="form-control" id="sex_singular" name="sex_singular" required>
                                    	<option value="o">-- Masculino --</option>
                                    	<option value="a">-- Feminina --</option>
                                    </select>                                                  
                                </div>                                
								<div class="col-xs-12 col-md-2 has-error">
										<label for="titulo">Nacionalidade</label>
									<select type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
										<option value="">selecionar</option>
										<option value="brasileiro">brasileiro</option>
										<option value="brasileira">brasileira</option>
										<option value="estrangeiro">estrangeiro</option>
									</select>									
								</div>
								<div class="col-xs-12 col-md-2 has-error">
									<label for="titulo">Estado civil</label>
									<select type="text" class="form-control" id="estadocivil" name="estadocivil" required>
										<option value="">selecionar</option>
										<option value="solteiro">Solteiro</option>
										<option value="solteira">Solteira</option>
										<option value="casado">Casado</option>
										<option value="casada">Casada</option>
										<option value="separado">Separado</option>
										<option value="separada">Separada</option>
										<option value="viúvo">Viúvo</option>
										<option value="viúva">Viúva</option>
										<option value="divorciado">Divorciado</option>
										<option value="divorciada">Divorciada</option>
									</select>             									
								</div>						  
								<div class="col-xs-12 col-md-2 has-error">
									<label for="cargo">Cargo</label>
									<input type="text" class="form-control" id="nome_cargo" name="nome_cargo" required>
								</div>
					  </div> <!-- fim row -->
 <div id="div_desvio_funcao" hidden="true">
                                <div class="form-group col-md-2">
                                    <label for="cargo">Cargo desvio 1</label>
                                    <input type="text" class="form-control" id="desvio_cargo_1" name="desvio_cargo_1">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Salario desvio 1</label>
                                    <input type="text" class="form-control desvio_salario_1" id="desvio_salario_1" name="desvio_salario_1">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Inicio desvio 1</label>
                                    <input type="text" class="form-control" id="desvio_datainicio_1" name="desvio_datainicio_1">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Fim desvio 1</label>
                                    <input type="text" class="form-control" id="desvio_datafim_1" name="desvio_datafim_1">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="cargo">Cargo desvio 2</label>
                                    <input type="text" class="form-control" id="desvio_cargo_2" name="desvio_cargo_2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Salario desvio 2</label>
                                    <input type="text" class="form-control desvio_salario_2" id="desvio_salario_2" name="desvio_salario_2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Inicio desvio 2</label>
                                    <input type="text" class="form-control" id="desvio_datainicio_2" name="desvio_datainicio_2">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Fim desvio 2</label>
                                    <input type="text" class="form-control" id="desvio_datafim_2" name="desvio_datafim_2">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="cargo">Cargo desvio 3</label>
                                    <input type="text" class="form-control" id="desvio_cargo_3" name="desvio_cargo_3">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Salario desvio 3</label>
                                    <input type="text" class="form-control desvio_salario_3" id="desvio_salario_3" name="desvio_salario_3">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Inicio desvio 3</label>
                                    <input type="text" class="form-control" id="desvio_datainicio_3" name="desvio_datainicio_3">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Fim desvio 3</label>
                                    <input type="text" class="form-control" id="desvio_datafim_3" name="desvio_datafim_3">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="cargo">Cargo desvio 4</label>
                                    <input type="text" class="form-control" id="desvio_cargo_4" name="desvio_cargo_4">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Salario desvio 4</label>
                                    <input type="text" class="form-control desvio_salario_4" id="desvio_salario_4" name="desvio_salario_4">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Inicio desvio 4</label>
                                    <input type="text" class="form-control" id="desvio_datainicio_4" name="desvio_datainicio_4">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Fim desvio 4</label>
                                    <input type="text" class="form-control" id="desvio_datafim_4" name="desvio_datafim_4">
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label for="cargo">Cargo desvio 5</label>
                                    <input type="text" class="form-control" id="desvio_cargo_5" name="desvio_cargo_5">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Salario desvio 5</label>
                                    <input type="text" class="form-control desvio_salario_5" id="desvio_salario_5" name="desvio_salario_5">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Inicio desvio 5</label>
                                    <input type="text" class="form-control" id="desvio_datainicio_5" name="desvio_datainicio_5">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cargo">Fim desvio 5</label>
                                    <input type="text" class="form-control" id="desvio_datafim_5" name="desvio_datafim_5">
                                </div>
                                
 </div>                               
					  <div class="row">
								<div class="col-xs-12 col-md-1 has-error">
									<label for="data">Dia Nasc</label>
									<select class="form-control" id="nasc_dia" name="nasc_dia" required>
										<option value="">00</option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>                                                  
								</div>
								<div class="col-xs-12 col-md-2 has-error">
									<label for="valor_venda">Mês Nasc</label>
									<select type="text" class="form-control" id="nasc_mes" name="nasc_mes" required>
										<option value="">selecionar</option>
										<option value="janeiro">Janeiro</option>
										<option value="fevereiro">Fevereiro</option>
										<option value="março">Março</option>
										<option value="abril">Abril</option>
										<option value="maio">Maio</option>
										<option value="junho">Junho</option>
										<option value="julho">Julho</option>
										<option value="agosto">Agosto</option>
										<option value="setembro">Setembro</option>
										<option value="outubro">Outubro</option>
										<option value="novembro">Novembro</option>
										<option value="dezembro">Dezembro</option>
									 </select>								
								</div>
								<div class="col-xs-12 col-md-2 has-error">
									<label for="status">Ano</label>
									<select type="text" class="form-control" id="nasc_ano" name="nasc_ano" required>
									<option value="">selecionar</option>
									<option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
									</select>
								</div>                                						  
							    <div class="col-xs-12 col-md-2 has-error">
                                    <label for="data_cadastro">RG</label>
                       <input type="text" class="form-control rg" id="rg_num" name="rg_num" required>
                                </div>  
                 				<div class="col-xs-12 col-md-1 has-error">
                                    <label for="titulo">RG/UF</label>
									<select type="text" class="form-control" id="rg_origem" name="rg_origem" required>
											<option value="" selected>UF</option>
											<option value="AC">AC</option> 
											<option value="AL">AL</option> 
											<option value="AM">AM</option> 
											<option value="AP">AP</option> 
											<option value="BA">BA</option> 
											<option value="CE">CE</option> 
											<option value="DF">DF</option> 
											<option value="ES">ES</option> 
											<option value="GO">GO</option> 
											<option value="MA">MA</option> 
											<option value="MT">MG</option> 
											<option value="MS">MS</option> 
											<option value="MG">MG</option> 
											<option value="PA">PA</option> 
											<option value="PB">PB</option> 
											<option value="PR">PR</option> 
											<option value="PE">PE</option> 
											<option value="PI">PI</option> 
											<option value="RJ">RJ</option> 
											<option value="RN">RN</option> 
											<option value="RO">RO</option> 
											<option value="RS">RS</option> 
											<option value="RR">RR</option> 
											<option value="SC">SC</option> 
											<option value="SE">SE</option> 
											<option value="SP">SP</option> 
											<option value="TO">TO</option>
								</select>
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label for="titulo">RG expedição</label>
               						<input type="text" class="form-control date" id="rg_data_exp" name="rg_data_exp" maxlength="10">
                                </div>
                                <div class="col-xs-12 col-md-2 has-error">
                                    <label for="exampleInputPassword1">CPF/MF</label>
                                    <input type="text" class="form-control cpf" id="cliente_cpf_num" name="cliente_cpf_num" required>
                                </div>
					  </div>
					  <div class="row">
                                <div class="col-xs-6 col-md-2 has-error">
                                    <label for="valor_compra">Nome da Mãe</label>
                                    <input type="text" class="form-control" id="nome_mae" name="nome_mae" required>
                                </div>   
                                <div class="col-xs-2 col-md-1" hidden="true">
                                    <label for="valor_compra">On Pai</label>
                                    <input type="text" class="form-control" id="on_pai" name="on_pai">
                                </div>                            
                                <div class="col-xs-6 col-md-2">
                                    <label for="nome_pai">Nome do Pai</label>
                                    <input type="text" class="form-control" id="nome_pai" name="nome_pai">
                                </div>					  						  
                                <div class="col-xs-12 col-md-2">
                                    <label for="status">PIS</label>
                                    <input type="text" class="form-control pis" id="pis_num" name="pis_num">
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label for="data_cadastro">CTPS</label>
                                    <input type="text" class="form-control" id="ctps_numero" name="ctps_numero">
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label for="titulo">CTPS|Série</label>
                                    <input type="text" class="form-control" id="ctps_serie" name="ctps_serie">
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label for="valor_venda">CTPS|Estado</label>
									<select type="text" class="form-control" id="ctps_uf" name="ctps_uf">
											<option value="" selected>selecionar</option>
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
					  </div>
					  <div class="row">
                                <div class="col-xs-12 col-md-2 has-error">
                                    <label for="status">CEP</label>
                                    <input type="text" class="form-control cep" id="cliente_cep" name="cliente_cep" maxlength="9" required>
<script type="text/javascript">
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#end_rua").val("");
                $("#end_bairro").val("");
                $("#end_cidade").val("");
                $("#end_uf").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cliente_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#end_rua").val("...");
                        $("#end_bairro").val("...");
                        $("#end_cidade").val("...");
                        $("#end_uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#end_rua").val(dados.logradouro);
                                $("#end_bairro").val(dados.bairro);
                                $("#end_cidade").val(dados.localidade);
                                $("#end_uf").val(dados.uf);
								
                        $('#end_numero').focus();
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
                                <div class="col-xs-10 col-md-2 has-error">
                                    <label for="titulo">Logradoura</label>
                                    <input type="text" class="form-control" id="end_rua" name="end_rua" required>
                                </div>
                                <div class="col-xs-2 col-md-1">
                                    <label for="number">Nº</label>
                                    <input type="text" class="form-control" id="end_numero" name="end_numero">
                                </div>
                                <div class="col-xs-12 col-md-2">
                                    <label for="title">Bairro</label>
                                    <input type="text" class="form-control" id="end_bairro" name="end_bairro">
                                </div>
                                <div class="col-xs-10 col-md-2 has-error">
                                    <label for="valor_venda">Cidade</label>
                                    <input type="text" class="form-control" id="end_cidade" name="end_cidade" required>
                                </div>
                              	<div class="col-xs-2 col-md-1 has-error">
                                    <label for="title">Estado</label>
									<select type="text" class="form-control" id="end_uf" name="end_uf" required>
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
                                <div class="col-xs-12 col-md-2">
                                        <label for="status">Complemento</label>
                                        <input type="text" class="form-control" id="end_complemento" name="end_complemento">
								</div>						  
					  </div>
					  <!-- inicio empresa principal -->
								<div class='container cont'>
									<header class="row">
										<h2 class='text-center text-danger'>Empresa principal</h2>
									</header>
								</div>					  
					  <div class="row">
                                <div class="col-xs-12 col-md-4 has-error">
                                    <label for="titulo">Nome da Empresa</label>
                                    <input type="text" class="form-control" id="nome_emp" name="nome_emp" required>
                                </div>
                                <div class="col-xs-12 col-md-2 has-error">
                                    <label for="titulo">Tipo de contratante</label>
								<select type="date" class="form-control" id="emp_tipo" name="emp_tipo" required>
									<option value="jurídica">-- Empresa Juridica --</option>
									<option value="física">-- Pessoa Fisica --</option>
								</select>									
                                </div>
                                <div class="col-xs-12 col-md-3 has-error">
                                    <label for="titulo">CNPJ/CPF</label>
								<input type="text" class="form-control" id="cnpj_cpf" name="cnpj_cpf" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' required>
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
                                </div>
						  		<div class="col-xs-2 col-md-2">
									<label for="title">Outras Ré?</label>
									<input type="checkbox" class="form-control" id="other_emp" name="other_emp" value="on">
								</div>
					  </div>
					  <div class="row">
                 				<div class="col-xs-12 col-md-2">
                                    <label for="titulo">CEP</label>
                <input type="text" class="form-control cep" id="emp_cep" name="emp_cep" maxlength="9">
                                </div>
                                <div class="col-xs-10 col-md-2">
                                    <label for="titulo">Logradoura</label>
                                    <input type="text" class="form-control" id="emp_rua" name="emp_rua">
                                </div>
                                <div class="col-xs-2 col-md-1">
                                    <label for="titulo">Nº</label>
                                    <input type="text" class="form-control" id="emp_num" name="emp_num">
                                </div>					  
                                <div class="col-xs-12 col-md-2">
                                    <label for="valor_compra">Bairro</label>
                                    <input type="text" class="form-control" id="emp_bairro" name="emp_bairro">
							    </div>
                                <div class="col-xs-12  col-md-2">
                                    <label for="valor_venda">Cidade</label>
                                    <input type="text" class="form-control" id="emp_city" name="emp_city">
                                </div>
                                <div class="col-xs-12  col-md-1">
                                    <label for="status">Estado</label>
									<select type="text" class="form-control" id="emp_uf" name="emp_uf">
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
                                <div class="col-xs-12  col-md-2">
                                    <label for="data_cadastro">Complemento</label>
                                    <input type="text" class="form-control" id="emp_comp" name="emp_comp">
                                </div>  
					  </div>
<div id="div_hidden" hidden="true">
                                <div class="form-group col-md-3">
                                    <label for="titulo">Comarca Cidade</label>
                                            <input type="text" class="form-control" id="comarca_city" name="comarca_city">
                                </div>                              
                                <div class="form-group col-md-3">
                                    <label for="titulo">PASTA "ID"</label>
                                    <input type="text" class="form-control" id="pasta_id" name="pasta_id" readonly>
                                </div>
                                <div id="formulario-oculto" style="display:none;">
                                                <div class="form-group col-md-3">
                                                    <label for="titulo">Celular</label>
                                                    <input type="text" class="form-control" id="cli_cel" name="cli_cel" readonly>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="titulo">Telefone Fixo</label>
                                                    <input type="text" class="form-control" id="cli_tel" name="cli_tel" readonly>
                                                </div>
													<!-- telefone empresa principal -->
												<div class="form-group col-md-2">
													<label for="titulo">Telefone</label>
													<input type="text" class="form-control" id="emp_tel" name="emp_tel" maxlength="12" readonly>
												</div>	
								</div>
</div> 
<div id="div_hidden" hidden="true">
                                <p><div class='title_cargo'>
                                <header class="row">
                                <h2 class='text-center text-danger'>Cargo atual</h2>
                                </header>
                                </div></p>                                            
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control salario" id="salario" name="salario">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor por fora</label>
                <input type="text" class="form-control" id="valor_fora" name="valor_fora">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Remuneração total</label>
                <input type="text" class="form-control remu_total" id="remu_total" name="remu_total">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Entrada</label>
                <input type="text" class="form-control" id="data_ent" name="data_ent">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Registro</label>
                <input type="text" class="form-control" id="data_reg" name="data_reg">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Saida</label>
                <input type="text" class="form-control" id="data_saida" name="data_saida">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cumprio aviso prévio?</label>
                <input type="text" class="form-control" id="cump_aviso_previo" name="cump_aviso_previo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor do aviso</label>
                <input type="text" class="form-control" id="aviso_valor" name="aviso_valor">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data do aviso</label>
                <input type="text" class="form-control" id="aviso_data" name="aviso_data">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Reduziu aviso Prévio</label>
                <input type="text" class="form-control" id="aviso_reducao" name="aviso_reducao">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data da Homologação</label>
                <input type="text" class="form-control" id="data_homo" name="data_homo">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">Recebeu na Homologação</label>
                <input type="text" class="form-control" id="recebeu_homo" name="recebeu_homo">
                				</div>
                                <div class="form-group col-md-2">
                <label for="text">Local de Homologação</label>
                <input type="text" class="form-control" id="qm_homo" name="qm_homo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor Homologação</label>
                <input type="text" class="form-control" id="homo_valor" name="homo_valor">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario Entrada</label>
                <input type="text" class="form-control" id="hrs_ent_sem" name="hrs_ent_sem">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario Saida</label>
                <input type="text" class="form-control" id="hrs_exit_sem" name="hrs_exit_sem">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Duração de intervalo</label>
                <input type="text" class="form-control" id="hrs_almo_sem" name="hrs_almo_sem">
                                </div>
                                
                                <div class="form-group col-md-2">
                <label for="text">Horario Ent sexta</label>
                <input type="text" class="form-control" id="hrs_ent_sex" name="hrs_ent_sex">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario Saida sexta</label>
                <input type="text" class="form-control" id="hrs_exit_sex" name="hrs_exit_sex">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Intervalo sexta</label>
                <input type="text" class="form-control" id="hrs_almo_sex" name="hrs_almo_sex">
                                </div>
                                
                                <div class="form-group col-md-2">
                <label for="text">Sábado Entrada</label>
                <input type="text" class="form-control" id="hrs_ent_sab" name="hrs_ent_sab">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Sábado porcentual</label>
                <input type="text" class="form-control" id="sab_ext_porc" name="sab_ext_porc">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Sábado Saida</label>
                <input type="text" class="form-control" id="hrs_exit_sab" name="hrs_exit_sab">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Sáb. tempo de intervalo</label>
                <input type="text" class="form-control" id="hrs_almo_sab" name="hrs_almo_sab">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Domingo Entrada</label>
                <input type="text" class="form-control" id="hrs_ent_dom" name="hrs_ent_dom">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Domingo Saida</label>
                <input type="text" class="form-control" id="hrs_exit_dom" name="hrs_exit_dom">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Domingo intervalo</label>
                <input type="text" class="form-control" id="hrs_almo_dom" name="hrs_almo_dom">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebia horas extra?</label>
                <input type="text" class="form-control" id="ext_pago" name="ext_pago">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Trabalhou anoite?</label>
                <input type="text" class="form-control" id="trab_noite" name="trab_noite">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario entrada noturno</label>
                <input type="text" class="form-control" id="noite_ent" name="noite_ent">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario saida</label>
                <input type="text" class="form-control" id="noite_exit" name="noite_exit">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario intervalo</label>
                <input type="text" class="form-control" id="noite_almo" name="noite_almo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu adc noite</label>
                <input type="text" class="form-control" id="recebeu_adc_noite" name="recebeu_adc_noite">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor adicional noturno</label>
                <input type="text" class="form-control" id="adc_noite_vl" name="adc_noite_vl">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Porcentual adc noturno</label>
                <input type="text" class="form-control" id="adc_noite_porc" name="adc_noite_porc">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Extras Porcentual</label>
                <input type="text" class="form-control" id="ext_porcento" name="ext_porcento">
                                </div>
                                
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Nome</label>
                <input type="text" class="form-control" id="p_nome_1" name="p_nome_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Salário</label>
                <input type="text" class="form-control p_salario_1" id="p_salario_1" name="p_salario_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Cargo</label>
                <input type="text" class="form-control" id="p_cargo_1" name="p_cargo_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do cargo</label>
                <input type="text" class="form-control" id="p_inicio_1" name="p_inicio_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Tempo trabalhando</label>
                <input type="text" class="form-control" id="p_tempo_1" name="p_tempo_1">
                                </div>
    
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Nome</label>
                <input type="text" class="form-control" id="p_nome_2" name="p_nome_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Salário</label>
                <input type="text" class="form-control p_salario_2" id="p_salario_2" name="p_salario_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Cargo</label>
                <input type="text" class="form-control" id="p_cargo_2" name="p_cargo_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do cargo</label>
                <input type="text" class="form-control" id="p_inicio_2" name="p_inicio_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Tempo trabalhando</label>
                <input type="text" class="form-control" id="p_tempo_2" name="p_tempo_2">
                                </div>
    
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Nome</label>
                <input type="text" class="form-control" id="p_nome_3" name="p_nome_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Salário</label>
                <input type="text" class="form-control p_salario_3" id="p_salario_3" name="p_salario_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Cargo</label>
                <input type="text" class="form-control" id="p_cargo_3" name="p_cargo_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do cargo</label>
                <input type="text" class="form-control" id="p_inicio_3" name="p_inicio_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Tempo trabalhando</label>
                <input type="text" class="form-control" id="p_tempo_3" name="p_tempo_3">
                                </div>
    
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Nome</label>
                <input type="text" class="form-control" id="p_nome_4" name="p_nome_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Salário</label>
                <input type="text" class="form-control p_salario_4" id="p_salario_4" name="p_salario_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Cargo</label>
                <input type="text" class="form-control" id="p_cargo_4" name="p_cargo_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do cargo</label>
                <input type="text" class="form-control" id="p_inicio_4" name="p_inicio_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Tempo trabalhando</label>
                <input type="text" class="form-control" id="p_tempo_4" name="p_tempo_4">
                                </div>
    
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Nome</label>
                <input type="text" class="form-control" id="p_nome_5" name="p_nome_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Salário</label>
                <input type="text" class="form-control p_salario_5" id="p_salario_5" name="p_salario_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Paradigma Cargo</label>
                <input type="text" class="form-control" id="p_cargo_5" name="p_cargo_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do cargo</label>
                <input type="text" class="form-control" id="p_inicio_5" name="p_inicio_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Tempo trabalhando</label>
                <input type="text" class="form-control" id="p_tempo_5" name="p_tempo_5">
                                </div>
    
                                <div class="form-group col-md-2">
                <label for="text">Vale-Trasporte</label>
                <input type="text" class="form-control" id="receb_VT" name="receb_VT">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VT valor</label>
                <input type="text" class="form-control" id="VT_valor" name="VT_valor">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cesta Basica</label>
                <input type="text" class="form-control" id="cesta_basica" name="cesta_basica">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cesta basica Valor</label>
                <input type="text" class="form-control" id="cesta_valor" name="cesta_valor">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Vale-Refeição</label>
                <input type="text" class="form-control" id="recebe_VR" name="recebe_VR">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VR valor</label>
                <input type="text" class="form-control" id="VR_valor" name="VR_valor">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu Holerite</label>
                <input type="text" class="form-control" id="receb_holerith" name="receb_holerith">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Aviso previo</label>
                <input type="text" class="form-control" id="receb_aviso_previo" name="receb_aviso_previo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do aviso previo</label>
                <input type="text" class="form-control" id="inic_aviso_previo" name="inic_aviso_previo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu 13º</label>
                <input type="text" class="form-control" id="receb_dec" name="receb_dec">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data do 13º</label>
                <input type="month" class="form-control" id="dec_data" name="dec_data">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data 2 do 13º</label>
                <input type="month" class="form-control" id="dec_data2" name="dec_data2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data 3 do 13º</label>
                <input type="month" class="form-control" id="dec_data3" name="dec_data3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data 4 do 13º</label>
                <input type="month" class="form-control" id="dec_data4" name="dec_data4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data 5 do 13º</label>
                <input type="month" class="form-control" id="dec_data5" name="dec_data5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Gozou férias</label>
                <input type="text" class="form-control" id="tev_ferias" name="tev_ferias">
                                </div>
                                <div class="form-group col-md-1">
                <label for="text">Quantidade</label>
                <input type="text" class="form-control" id="ferias_quant" name="ferias_quant">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Trabalhou nas férias</label>
                <input type="text" class="form-control" id="trab_ferias" name="trab_ferias">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Periodo férias</label>
                <input type="text" class="form-control" id="perio_ferias" name="perio_ferias">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Guia FGTS</label>
                <select type="text" class="form-control" id="g_fgts" name="g_fgts">
                <option value="" selected></option>
                <option value="sim">---- SIM ----</option>
                <option value="não">---- NÃO ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">Guia seguro-desemprego</label>
                <select type="text" class="form-control" id="g_sd" name="g_sd">
                <option value="" selected></option>
                <option value="sim">---- SIM ----</option>
                <option value="não">---- NÃO ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">Filhos menores de 14 anos</label>
                <input type="text" class="form-control" id="filho_14" name="filho_14">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario familia</label>
                <input type="text" class="form-control" id="rec_sal_fam" name="rec_sal_fam">
                                </div>
                                <div class="form-group col-md-1">
                <label for="text">Valor</label>
                <input type="text" class="form-control" id="salario_fam" name="salario_fam">
                                </div>
                                <div class="form-group col-md-6">
                <label for="text">Insalubridade:..</label>
    <textarea class="form-control" id="insalubre" name="insalubre" rows="1" maxlength="60">Digite sua observação insalubre em até 60 letras...</textarea>
                                </div>
                                <div class="form-group col-md-6">
                <label for="text">Periculosidade:..</label>
    <textarea class="form-control" id="periculoso" name="periculoso" rows="1" maxlength="60">Digite sua observação periculosa em até 60 letras...</textarea>
                                </div>
                                <div class="form-group col-md-6">
                <label for="text">Obs dano moral:..</label>
    <textarea class="form-control" id="obs_dano" name="obs_dano" rows="5" maxlength="255">Digite sua observação resumida em até 60 letras...</textarea>
                                </div>
                                <div class="form-group col-md-6">
                <label for="text">Obs:..</label>
    <textarea class="form-control" id="obs_adv" name="obs_adv" rows="5" maxlength="255">Digite sua observação resumida em até 60 letras...</textarea>
                                </div>
                                
                                <div id="date123" class="form-group col-md-3" hidden="true">
                                 <label for="text">Data atual</label>
                                 <input class="form-control" type="text" name="datahoje" id="datahoje">
                                 </div>
								<div id="div_outras_reclamadas">
<fieldset id="segunda_reclamada" hidden="true">
                                <br>
                                                <div class="form-group col-md-3">
                                                <label for="text" style="color:#F76466;"><small>Segunda reclamada :</small></label>
                                                <label for="titulo">Razão Social</label>
                                                <input type="text" class="form-control" id="emp_segunta" name="emp_segunta" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Tipo de empresa</label>
                                                <input type="text" class="form-control" id="tipo_emp_segunda" name="tipo_emp_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CNPJ 02ª</label>
                                                <input type="text" class="form-control" id="cnpj_segunda" name="cnpj_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CEP</label>
                                                <input type="text" class="form-control" id="cep_segunda" name="cep_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                <label for="titulo">Logradoura</label>
                                                <input type="text" class="form-control" id="rua_emp_segunda" name="rua_emp_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">Nº</label>
                                                <input type="text" class="form-control" id="num_emp_segunda" name="num_emp_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Bairro</label>
                                                <input type="text" class="form-control" id="bairro_emp_segunda" name="bairro_emp_segunda">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Cidade</label>
                                                <input type="text" class="form-control" id="city_emp_segunda" name="city_emp_segunda" value="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">UF</label>
                                                <input type="text" class="form-control" id="uf_emp_segunda" name="uf_emp_segunda">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Complemento</label>
                                                <input type="text" class="form-control" id="comp_emp_segunda" name="comp_emp_segunda" value="">
                                                </div>
</fieldset> 
                                <br>               
                                <!-- Terceira reclamada -->
<fieldset id="terceira_reclamada" hidden="true">
                                                <div class="form-group col-md-3">
                                                <label for="text" style="color:#F76466;"><small>Terceira reclamada :</small></label>
                                                <label for="titulo">Razão Social</label>
                                                <input type="text" class="form-control" id="emp_terceira" name="emp_terceira" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Tipo de empresa</label>
                                                <select type="text" class="form-control" id="tipo_emp_terceira" name="tipo_emp_terceira" value="">
                                                <option value="juridica">juridica</option>
                                                <option value="fisica">fisica</option>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CNPJ 03ª</label>
                                                <input type="text" class="form-control" id="cnpj_terceira" name="cnpj_terceira" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CEP</label>
                                                <input type="text" class="form-control" id="cep_terceira" name="cep_terceira" value="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                <label for="titulo">Logradoura</label>
                                                <input type="text" class="form-control" id="rua_emp_terceira" name="rua_emp_terceira" value="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">Nº</label>
                                                <input type="text" class="form-control" id="num_emp_terceira" name="num_emp_terceira" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Bairro</label>
                                                <input type="text" class="form-control" id="bairro_emp_terceira" name="bairro_emp_terceira">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Cidade</label>
                                                <input type="text" class="form-control" id="city_emp_terceira" name="city_emp_terceira">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">UF</label>
                                                <input type="text" class="form-control" id="uf_emp_terceira" name="uf_emp_terceira">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Complemento</label>
                                                <input type="text" class="form-control" id="comp_emp_terceira" name="comp_emp_terceira">
                                                </div>
</fieldset>
                                <br>                
                                <!-- Quarta Reclamada -->
<fieldset id="quarta_reclamada" hidden="true">
                                                <div class="form-group col-md-3">
                                                <label for="text" style="color:#F76466;"><small>Quarta reclamada :</small></label>
                                                <label for="titulo">Razão Social</label>
                                                <input type="text" class="form-control" id="emp_quarta" name="emp_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Tipo de empresa</label>
                                                <select type="text" class="form-control" id="tipo_emp_quarta" name="tipo_emp_quarta" value="">
                                                <option value="juridica">juridica</option>
                                                <option value="fisica">fisica</option>
                                                </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CNPJ 04ª</label>
                                                <input type="text" class="form-control" id="cnpj_quarta" name="cnpj_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">CEP</label>
                                                <input type="text" class="form-control" id="cep_quarta" name="cep_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-3">
                                                <label for="titulo">Logradoura</label>
                                                <input type="text" class="form-control" id="rua_emp_quarta" name="rua_emp_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">Nº</label>
                                                <input type="text" class="form-control" id="num_emp_quarta" name="num_emp_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Bairro</label>
                                                <input type="text" class="form-control" id="bairro_emp_quarta" name="bairro_emp_quarta">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Cidade</label>
                                                <input type="text" class="form-control" id="city_emp_quarta" name="city_emp_quarta" value="">
                                                </div>
                                                <div class="form-group col-md-1">
                                                <label for="titulo">UF</label>
                                                <input type="text" class="form-control" id="uf_emp_quarta" name="uf_emp_quarta">
                                                </div>
                                                <div class="form-group col-md-2">
                                                <label for="titulo">Complemento</label>
                                                <input type="text" class="form-control" id="comp_emp_quarta" name="comp_emp_quarta" value="">
                                                </div>
</fieldset>
								</div>
</div>
<div id="adv_div_hidden" hidden="true">
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nome Advogado(a)</label>
			<input type="text" class="form-control" id="adv_nome" name="adv_nome" value="<?php print $adv_nome ?>">
			<input type="text" class="form-control" id="adv_sobre_nome" name="adv_sobre_nome" value="<?php print $adv_sobre_nome ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nacionalidade</label>
                                    <input type="text" class="form-control" id="adv_nacionalidade" name="adv_nacionalidade" value="<?php print $adv_nacionalidade ?>">
                                </div>                                
                                <div class="form-group col-md-3">
                                    <label for="titulo">Sexualidade</label>
	<input type="text" class="form-control" id="adv_sex" name="adv_sex" value="<?php print $adv_sex ?>">
	<input type="text" class="form-control" id="adv_sex_singular" name="adv_sex_singular" value="<?php print $adv_sex_singular ?>">
	<input type="text" class="form-control" id="adv_sex_or" name="adv_sex_or" value="<?php print $adv_sex_or ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Estado Civil</label>
                                    <input type="text" class="form-control" id="adv_estado_civil" name="adv_estado_civil" value="<?php print $adv_estado_civil ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cargo</label>
                                    <input type="text" class="form-control" id="adv_cargo" name="adv_cargo" value="<?php print $adv_cargo ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">CPF</label>
                                    <input type="text" class="form-control" id="adv_cpf" name="adv_cpf" value="<?php print $adv_cpf ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">RG</label>
                                    <input type="text" class="form-control" id="adv_rg" name="adv_rg" value="<?php print $adv_rg ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">RG Origem</label>
                                    <input type="text" class="form-control" id="adv_ssp" name="adv_ssp" value="<?php print $adv_ssp ?>">
                                </div>               
                                <div class="form-group col-md-3">
                                    <label for="titulo">Rua</label>
                                    <input type="text" class="form-control" id="adv_rua" name="adv_rua" value="<?php print $adv_rua ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nº</label>
                                    <input type="text" class="form-control" id="adv_numero_casa" name="adv_numero_casa" value="<?php print $adv_numero_casa ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Bairro</label>
                                    <input type="text" class="form-control" id="adv_bairro" name="adv_bairro" value="<?php print $adv_bairro ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cidade</label>
                                    <input type="text" class="form-control" id="adv_cidade" name="adv_cidade" value="<?php print $adv_cidade ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Estado</label>
                                    <input type="text" class="form-control" id="adv_estado" name="adv_estado" value="<?php print $adv_estado ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cep</label>
                                    <input type="text" class="form-control" id="adv_cep" name="adv_cep" value="<?php print $adv_cep ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Complemento</label>
                                    <input type="text" class="form-control" id="adv_complemento" name="adv_complemento" value="<?php print $adv_complemento ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Telefone</label>
                                    <input type="text" class="form-control" id="adv_tel1" name="adv_tel1" value="<?php print $adv_tel1 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Celular</label>
                                    <input type="text" class="form-control" id="adv_tel2" name="adv_tel2" value="<?php print $adv_tel2 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Comercial</label>
                                    <input type="text" class="form-control" id="adv_tel3" name="adv_tel3" value="<?php print $adv_tel3 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">OAB</label>
                                    <input type="text" class="form-control" id="oab" name="oab" value="<?php print $oab ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">UF/OAB</label>
                                    <input type="text" class="form-control" id="adv_uf_oab" name="adv_uf_oab" value="<?php print $adv_uf_oab ?>">
                                </div>
</div>
				</form>
		</div>
</div>
</body>
</html>
