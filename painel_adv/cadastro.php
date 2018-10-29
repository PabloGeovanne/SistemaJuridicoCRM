<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cadastro de Clientes - Adv</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="chosen/chosen.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/cep.js"></script>
	<script type="text/javascript" src="js/SpryValidationTextarea.js"></script>
 <script src="js/cep_re2.js"></script>
 <script src="js/cep_re3.js"></script>
 <script src="js/cep_re4.js"></script>
<script type="text/javascript">
function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode == 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) objTextBox.value = '';
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
	
	
}


function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

function bloquearInput(){
            var input = document.getElementById('nome_pai');

            if(input.readOnly){
                input.readOnly = false;
            }else{
                input.readOnly = true;
            }
        }
		
//Script Calculo automatico entre input's
String.prototype.formatMoney = function() {
    var v = this;

    if(v.indexOf('.') === -1) {
        v = v.replace(/([\d]+)/, "$1.00");
    }

    v = v.replace(/([\d]+)\.([\d]{1})$/, "$1.$20");
    v = v.replace(/([\d]+)\.([\d]{2})$/, "$1.$2");

    return v;
};
function id( el ){
    return document.getElementById( el );
}
function getMoney( el ){
    var money = id( el ).value.replace( ',', '.' );
    return parseFloat( money )*100000;
}
function soma()
{
    var total = getMoney('salario')+getMoney('valor_fora');
    id('remu_total').value = ''+ String(total/100000).formatMoney();
}
function getMoney( el ){
    var money = id( el ).value ? id( el ).value.replace( ',', '.' ) : 0;
    return parseFloat( money )*100000;
}


function bloquearInput(el){
            var input = document.getElementById(el);

            if(input.readOnly){
                input.readOnly = false;
            }else{
                input.readOnly = true;
            }
        } //bloq input com rendoly com onclick="bloquearInput('ID INPUT')"
		
function bloquearInput2(el){
            var input = document.getElementById(el);

            if(input.disabled){
                input.disabled = true;
            }else{
                input.disabled = true;
            }
        } //bloq input com disabled com onclick="bloquearInput2('ID INPUT')"
		
function desbloquearInput(el){
            var input = document.getElementById(el);

            if(input.disabled){
                input.disabled = false;
            }else{
                input.disabled = false;
            }
        } //desbloq input com disabled com onclick="desbloquearInput('')"
		
function bloqdesbloq(el){
            var input = document.getElementById(el);

            if(input.disabled){
                input.disabled = false;
            }else{
                input.disabled = true;
            }
        } //bloq/desbloq input com disabled com onclick="bloqdesbloq('ID INPUT')"

var concelhos = $('select[name="Concelho"] option');
$('select[name="Distrito"]').on('change', function () {
    var Distrito = this.value;
    var novoSelect = concelhos.filter(function () {
        return $(this).data('distrito') == Distrito;
    });
    $('select[name="Concelho"]').html(novoSelect);
});


$(function () {
  $('[data-toggle="popover"]').popover()
})
	
//reservado para select sex_singular
jQuery(function($) {
    var locations = {
        'selecionar': [''],
        '-- Masculino --': ['o'],
        '-- Feminino --': ['a'],
    }
    
    var $locations = $('#sex_singular');
    $('#sexo01').change(function () {
        var country = $(this).val(), lcns = locations[country] || [];
        
        var html = $.map(lcns, function(lcn){
            return '<option value="' + lcn + '">' + lcn + '</option>'
        }).join('');
        $locations.html(html)
    });
});

//reservado para select sex_or
jQuery(function($) {
    var locations = {
        'selecionar': [''],
        '-- Masculino --': [''],
        '-- Feminino --': ['a'],
    }
    
    var $locations = $('#sex_or');
    $('#sexo01').change(function () {
        var country = $(this).val(), lcns = locations[country] || [];
        
        var html = $.map(lcns, function(lcn){
            return '<option value="' + lcn + '">' + lcn + '</option>'
        }).join('');
        $locations.html(html)
    });
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

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
include_once("menu_nav.php");
?>
</header>
	<div class='container'>
		<header class="row">
			<small><h1 class='text-center text-primary'>PAGINA DE CADASTRO</h1></small>
		</header>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Cadastro de Reclamante</h2>
		</header>
	</div>
        <div id="for-container">
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Cadastro</li>
</ol>

						<form name="signup" method="post" action="cadastrando.php">
                        <div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button>
                        <h4>Atenção!</h4>
<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Antes de cadastrar verifique se todos os campos <span class="glyphicon glyphicon-asterisk icocads" aria-hidden="true"></span> estão preenchidos corretamente
						</div>
    <div class="bt_cadastrar_cli">
<button type="submit" class="btn btn-primary" title="Erro no formulario" data-container="body" data-toggle="popover" data-placement="top" data-content="Verifique todos os campos e abas se estão preenchidas corretamente.">
Cadastrar
</button>
	</div>
                        <br>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs"> 
<li class="active"><a href="#aba1" data-toggle="tab">Reclamante dados <span class="glyphicon glyphicon-asterisk icoabas"></span></a></li>
<li><a href="#aba2" data-toggle="tab">Informações do cargo <span class="glyphicon glyphicon-asterisk icoabas" aria-hidden="true"></span></a></li>
<li><a href="#aba3" data-toggle="tab">Horários e adicionais</a></li>
<li><a href="#aba4" data-toggle="tab">Beneficios</a></li>
<li><a href="#aba5" data-toggle="tab">Paradigmas</a></li>
<li><a href="#aba6" data-toggle="tab">Outras Funções</a></li>
<li><a href="#aba7" data-toggle="tab">Observações</a></li>
<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Mais <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
            <li><a href="#aba8" data-toggle="tab">Outras reclamadas</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#aba9" data-toggle="tab">Dano moral</a></li>
    </ul>
</li>
    </ul>
    <br>  
    
    <div class="tab-content">
<div class="tab-pane fade in active" id="aba1">
                        <div class="form-group col-md-3" hidden="true">
                            <label for="titulo">Adv Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" value="<? echo $adv_id ?>" id="adv_id" name="adv_id" required readonly>
                        </div> <!-- input ID do Advogado -->
                        <div class="form-group col-md-3">
                            <label for="titulo">Nome completo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Sexo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="sexo01" name="sexo01" required>
								<option value="" selected>selecionar</option>
                                <option>-- Masculino --</option>
                                <option>-- Feminino --</option>
                            </select>                                                  
                        </div>
                        	<div hidden="true">
                            <div class="form-group col-md-2" title="">
                                    <label class="sexo-letras">Sexo02</label>
                                    <select class="form-control" id="sex_singular" name="sex_singular" required></select>
                            </div>                            
                            <div class="form-group col-md-2" title="">
                                    <label class="sexo-letras">Sexo03</label>
                                    <select class="form-control" id="sex_or" name="sex_or"></select>
                            </div>
                            </div>  <!-- input hidden -->                                          
                        <div class="form-group col-md-2">
                            <label for="titulo">Nacionalidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
							<select type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
                           	<option value="">selecionar</option>
                            <option value="brasileiro">brasileiro</option>
                            <option value="brasileira">brasileira</option>
                            <option value="estrangeiro">estrangeiro</option>
							</select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Estado civil <span class="glyphicon glyphicon-asterisk icocads"></span></label>
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
                        <div class="form-group col-md-3">
                            <label for="text">Cargo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_cargo" name="nome_cargo" required="required">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Dia <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> N..</small></label>
                            <select type="numberber" class="form-control" id="nasc_dia" name="nasc_dia">
                            	<option value=""></option>
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
                        <div class="form-group col-md-2">
                        <label for="valor_venda">Mês <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> Nascimento</small></label>
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
                        <div class="form-group col-md-2">
                            <label for="status">Ano <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> Nascimento</small></label>
                            <select type="text" class="form-control" id="nasc_ano" name="nasc_ano" required>
                            <option value="">selecionar</option>
                            <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">RG <span class="glyphicon glyphicon-asterisk icocads"></span></label>
       <input type="text" class="form-control" id="rg_num" name="rg_num" OnKeyPress="formatar('##.###.###-#', this)" required="required">
                        </div>  
                        <div class="form-group col-md-1">
                            <label for="titulo">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="rg_origem" name="rg_origem" required>
                            		<option value=""></option>
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
                        <div class="form-group col-md-2">
                            <label for="titulo">RG/Emissão <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="date" class="form-control" id="rg_data_exp" name="rg_data_exp" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="text">CPF/MF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="text" class="form-control" id="cliente_cpf" name="cliente_cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_compra">Nome da Mãe <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_mae" name="nome_mae">
                        </div>                            
                        <div class="form-group col-md-2" id="div_pai" hidden="true">
                            <label for="valor_venda">Nome do Pai <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_pai" name="nome_pai" disabled="true" required="false">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Pai</label>
                            <br>
                        <label class="switch" data-toggle="tooltip" data-placement="top" title="Ativar/Desativar o registro de pai">
                        <input type="checkbox" id="check_pai" name="check_pai[]" value="e de">
                        <div class="slider round"></div>
                        </label>
                        <div class="div_pai_on" hidden="true">
                            <input type="text" class="form-control" id="on_pai" name="on_pai">
                        </div>
<script type="text/javascript">
    $("#check_pai").click(function (){
            var input = document.getElementById("nome_pai");
            var div = document.getElementById("div_pai");
            if(input.required){
                input.required = true;
            }else{
                input.required = false;
            }

            if(div.hidden){
                div.hidden = false;
            }else{
                div.hidden = true;
            }

            if(input.disabled){
                input.disabled = false;
            }else{
                input.disabled = true;
            }
	});

$(document).ready(function() {
var ckbPai = document.querySelectorAll("input[name='check_pai[]']");
var txtPai = document.querySelector("input[name='on_pai']");

var ckbPaiOnClick = function () {
    var selecionados = document.querySelectorAll("input[name='check_pai[]']:checked");
    var valores = [].map.call(selecionados, function(selecionado, indice) {
        return selecionado.value;
    });

    txtPai.value = valores.join(", ");
}

for (var indice in  ckbPai) {
    ckbPai[indice].onclick = ckbPaiOnClick;
}		
});
				</script>            
                        </div>
                        <div class="form-group col-md-2">
        <label for="status">PIS</label>
        <input type="text" class="form-control" id="pis_num" name="pis_num" maxlength="14" OnKeyPress="formatar('###.#####.##-#', this)">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">CTPS</label>
                            <input type="text" class="form-control" id="ctps_numero" name="ctps_numero">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">CTPS | Série</label>
                            <input type="text" class="form-control" id="ctps_serie" name="ctps_serie">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_venda">CTPS|Estado</label>
                            <select type="text" class="form-control" id="ctps_uf" name="ctps_uf">
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
                        <div class="form-group col-md-3">
                            <label for="status">CEP <span class="glyphicon glyphicon-asterisk icocads"></span><small> busca automática</small></label>
                <input type="text" class="form-control" id="cliente_cep" name="cliente_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)" required>
                       
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
                        <div class="form-group col-md-3">
                            <label for="titulo">Endereço <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_rua" name="end_rua" required="required">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="text">Nº <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_numero" name="end_numero" required="required">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_compra">Bairro</label>
                            <input type="text" class="form-control" id="end_bairro" name="end_bairro">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_venda">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_cidade" name="end_cidade" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
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
                        <div class="form-group col-md-3">
                                <label for="status">Complemento</label>
                                <input type="text" class="form-control" id="end_complemento" name="end_complemento">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="status">E-mail</label>
                                <input type="email" class="form-control" id="cli_mail" name="cli_mail">
                        </div>                        
                        <div class="form-group col-md-5">
                            <label for="status">Buscar reclamada</span></label>
                            <select type="text" class="form-control chosen-select" data-placeholder="Buscar Reclamada cadastrada..." id="trabalho_ID" name="trabalho_ID">
                            <option value="" selected></option>
                               <?php 
                                $nome_empresa = ("SELECT * FROM adv_empresas INNER JOIN advogads ON (adv_empresas.adv_id = advogads.id) WHERE adv_empresas.adv_id = '$adv_id'");
								 $sqli_result = mysqli_query($conexao, $nome_empresa);
                                while($row = mysqli_fetch_assoc($sqli_result)) {
									$id_emp = $row['id_emp'];
									$nome_emp = $row['nome_emp'];
									$cnpj_cpf = $row['cnpj_cpf'];
									
                                ?>
                                <option value="<?= $id_emp ?>"><?= $nome_emp ?> | <?= $cnpj_cpf ?></option>
                                <?php
                                }
                                ?>                            
                            </select>
                        </div>
                        <div class="form-group col-md-3">
						<label for="titulo">Comarca Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <select type="text" class="form-control chosen-select" data-placeholder="Buscar comarcas do Brasil..." id="comarca_city" name="comarca_city" required>
                                    <option value="" selected>selecionar</option>
								<optgroup label="Comarcas do Acre">
									<option value="Acrelândia-AC">Acrelândia-AC</option>
									<option value="Assis Brasil-AC">Assis Brasil-AC</option>
									<option value="Bujari-AC">Bujari-AC</option>
									<option value="Capixaba-AC">Capixaba-AC</option>
									<option value="Feijó-AC">Feijó-AC</option>
									<option value="Mâncio Lima-AC">Mâncio Lima-AC</option>
									<option value="Manoel Urbano-AC">Manoel Urbano-AC</option>
									<option value="Marechal Thaumaturgo-AC">Marechal Thaumaturgo-AC</option>
									<option value="Porto Acre-AC">Porto Acre-AC</option>
									<option value="Porto Walter-AC">Porto Walter-AC</option>
									<option value="Rodrigues Alves-AC">Rodrigues Alves-AC</option>
									<option value="Santa Rosa do Purus-AC">Santa Rosa do Purus-AC</option>
									<option value="Tarauacá-AC">Tarauacá-AC</option>
									<option value="Jordão-AC">Jordão-AC</option>
									<option value="Rio Branco-AC">Rio Branco-AC</option>
									<option value="Brasiléia-AC">Brasiléia-AC</option>
									<option value="Cruzeiro do Sul-AC">Cruzeiro do Sul-AC</option>
									<option value="Epitaciolândia-AC">Epitaciolândia-AC</option>
									<option value="Plácido de Castro-AC">Plácido de Castro-AC</option>
									<option value="Senador Guiomard-AC">Senador Guiomard-AC</option>
									<option value="Sena Madureira-AC">Sena Madureira-AC</option>
									<option value="Xapuri-AC">Xapuri-AC</option>
								<optgroup label="Comarcas do Rio Grande do Sul">
									<option value="Agudo-RS">Agudo-RS</option>
									<option value="Alegrete-RS">Alegrete-RS</option>
									<option value="Alvorada-RS">Alvorada-RS</option>
									<option value="Antônio Prado-RS">Antônio Prado-RS</option>
									<option value="Arroio do Meio-RS">Arroio do Meio-RS</option>
									<option value="Arroio do Tigre-RS">Arroio do Tigre-RS</option>
									<option value="Arroio Grande-RS">Arroio Grande-RS</option>
									<option value="Arvorezinha-RS">Arvorezinha-RS</option>
									<option value="Augusto Pestana-RS">Augusto Pestana-RS</option>
									<option value="Bagé-RS">Bagé-RS</option>
									<option value="Barra do Ribeiro-RS">Barra do Ribeiro-RS</option>
									<option value="Bento Gonçalves-RS">Bento Gonçalves-RS</option>
									<option value="Bom Jesus-RS">Bom Jesus-RS</option>
									<option value="Butiá-RS">Butiá-RS</option>
									<option value="Caçapava do Sul-RS">Caçapava do Sul-RS</option>
									<option value="Cacequi-RS">Cacequi-RS</option>
									<option value="Cachoeira do Sul-RS">Cachoeira do Sul-RS</option>
									<option value="Cachoeirinha-RS">Cachoeirinha-RS</option>
									<option value="Camaquã-RS">Camaquã-RS</option>
									<option value="Campina das Missões-RS">Campina das Missões-RS</option>
									<option value="Campo Bom-RS">Campo Bom-RS</option>
									<option value="Campo Novo-RS">Campo Novo-RS</option>
									<option value="Candelária-RS">Candelária-RS</option>
									<option value="Canela-RS">Canela-RS</option>
									<option value="Canguçu-RS">Canguçu-RS</option>
									<option value="Canoas-RS">Canoas-RS</option>
									<option value="Capão da Canoa-RS">Capão da Canoa-RS</option>
									<option value="Carazinho-RS">Carazinho-RS</option>
									<option value="Carlos Barbosa-RS">Carlos Barbosa-RS</option>
									<option value="Casca-RS">Casca-RS</option>
									<option value="Catuípe-RS">Catuípe-RS</option>
									<option value="Caxias do Sul-RS">Caxias do Sul-RS</option>
									<option value="Cerro Largo-RS">Cerro Largo-RS</option>
									<option value="Charqueadas-RS">Charqueadas-RS</option>
									<option value="Constantina-RS">Constantina-RS</option>
									<option value="Coronel Bicaco-RS">Coronel Bicaco-RS</option>
									<option value="Crissiumal-RS">Crissiumal-RS</option>
									<option value="Cruz Alta-RS">Cruz Alta-RS</option>
									<option value="Dois Irmãos-RS">Dois Irmãos-RS</option>
									<option value="Dom Pedrito-RS">Dom Pedrito-RS</option>
									<option value="Eldorado do Sul-RS">Eldorado do Sul-RS</option>
									<option value="Encantado-RS">Encantado-RS</option>
									<option value="Encruzilhada do Sul-RS">Encruzilhada do Sul-RS</option>
									<option value="Erechim-RS">Erechim-RS</option>
									<option value="Espumoso-RS">Espumoso-RS</option>
									<option value="Estância Velha-RS">Estância Velha-RS</option>
									<option value="Esteio-RS">Esteio-RS</option>
									<option value="Estrela-RS">Estrela-RS</option>
									<option value="Farroupilha-RS">Farroupilha-RS</option>
									<option value="Faxinal do Soturno-RS">Faxinal do Soturno-RS</option>
									<option value="Feliz-RS">Feliz-RS</option>
									<option value="Flores da Cunha-RS">Flores da Cunha-RS</option>
									<option value="Frederico Westphalen-RS">Frederico Westphalen-RS</option>
									<option value="Garibaldi-RS">Garibaldi-RS</option>
									<option value="Gaurama-RS">Gaurama-RS</option>
									<option value="General Câmara-RS">General Câmara-RS</option>
									<option value="Getúlio Vargas-RS">Getúlio Vargas-RS</option>
									<option value="Giruá-RS">Giruá-RS</option>
									<option value="Gramado-RS">Gramado-RS</option>
									<option value="Gravataí-RS">Gravataí-RS</option>
									<option value="Guaíba-RS">Guaíba-RS</option>
									<option value="Guaporé-RS">Guaporé-RS</option>
									<option value="Guarani das Missões-RS">Guarani das Missões-RS</option>
									<option value="Herval-RS">Herval-RS</option>
									<option value="Horizontina-RS">Horizontina-RS</option>
									<option value="Ibirubá-RS">Ibirubá-RS</option>
									<option value="Igrejinha-RS">Igrejinha-RS</option>
									<option value="Ijuí-RS">Ijuí-RS</option>
									<option value="Iraí-RS">Iraí-RS</option>
									<option value="Itaqui-RS">Itaqui-RS</option>
									<option value="Ivoti-RS">Ivoti-RS</option>
									<option value="Jaguarão-RS">Jaguarão-RS</option>
									<option value="Jaguari-RS">Jaguari-RS</option>
									<option value="Júlio de Castilhos-RS">Júlio de Castilhos-RS</option>
									<option value="Lagoa Vermelha-RS">Lagoa Vermelha-RS</option>
									<option value="Lajeado-RS">Lajeado-RS</option>
									<option value="Lavras do Sul-RS">Lavras do Sul-RS</option>
									<option value="Marau-RS">Marau-RS</option>
									<option value="Marcelino Ramos-RS">Marcelino Ramos-RS</option>
									<option value="Montenegro-RS">Montenegro-RS</option>
									<option value="Mostardas-RS">Mostardas-RS</option>
									<option value="Não-Me-Toque-RS">Não-Me-Toque-RS</option>
									<option value="Nonoai-RS">Nonoai-RS</option>
									<option value="Nova Petrópolis-RS">Nova Petrópolis-RS</option>
									<option value="Nova Prata-RS">Nova Prata-RS</option>
									<option value="Novo Hamburgo-RS">Novo Hamburgo-RS</option>
									<option value="Osório-RS">Osório-RS</option>
									<option value="Osório (Terra de Areia)-RS">Osório (Terra de Areia)-RS</option>
									<option value="Palmares do Sul-RS">Palmares do Sul-RS</option>
									<option value="Palmeira das Missões-RS">Palmeira das Missões-RS</option>
									<option value="Panambi-RS">Panambi-RS</option>
									<option value="Parobé-RS">Parobé-RS</option>
									<option value="Passo Fundo-RS">Passo Fundo-RS</option>
									<option value="Pedro Osório-RS">Pedro Osório-RS</option>
									<option value="Pelotas-RS">Pelotas-RS</option>
									<option value="Pinheiro Machado-RS">Pinheiro Machado-RS</option>
									<option value="Piratini-RS">Piratini-RS</option>
									<option value="Planalto-RS">Planalto-RS</option>
									<option value="Portão-RS">Portão-RS</option>
									<option value="Porto Alegre-RS">Porto Alegre-RS</option>
									<option value="Porto Xavier-RS">Porto Xavier-RS</option>
									<option value="Quaraí-RS">Quaraí-RS</option>
									<option value="Restinga Seca-RS">Restinga Seca-RS</option>
									<option value="Rio Grande-RS">Rio Grande-RS</option>
									<option value="Rio Pardo-RS">Rio Pardo-RS</option>
									<option value="Rodeio Bonito-RS">Rodeio Bonito-RS</option>
									<option value="Ronda Alta-RS">Ronda Alta-RS</option>
									<option value="Rosário do Sul-RS">Rosário do Sul-RS</option>
									<option value="Salto do Jacuí-RS">Salto do Jacuí-RS</option>
									<option value="Sananduva-RS">Sananduva-RS</option>
									<option value="Santa Bárbara do Sul-RS">Santa Bárbara do Sul-RS</option>
									<option value="Santa Cruz do Sul-RS">Santa Cruz do Sul-RS</option>
									<option value="Santa Maria-RS">Santa Maria-RS</option>
									<option value="Santa Rosa-RS">Santa Rosa-RS</option>
									<option value="Santa Vitória do Palmar-RS">Santa Vitória do Palmar-RS</option>
									<option value="Santana do Livramento-RS">Santana do Livramento-RS</option>
									<option value="Santiago-RS">Santiago-RS</option>
									<option value="Santo Ângelo-RS">Santo Ângelo-RS</option>
									<option value="Santo Antônio da Patrulha-RS">Santo Antônio da Patrulha-RS</option>
									<option value="Santo Antônio das Missões-RS">Santo Antônio das Missões-RS</option>
									<option value="Santo Augusto-RS">Santo Augusto-RS</option>
									<option value="Santo Cristo-RS">Santo Cristo-RS</option>
									<option value="São Borja-RS">São Borja-RS</option>
									<option value="São Francisco de Assis-RS">São Francisco de Assis-RS</option>
									<option value="São Francisco de Paula-RS">São Francisco de Paula-RS</option>
									<option value="São Gabriel-RS">São Gabriel-RS</option>
									<option value="São Jerônimo-RS">São Jerônimo-RS</option>
									<option value="São José do Norte-RS">São José do Norte-RS</option>
									<option value="São José do Ouro-RS">São José do Ouro-RS</option>
									<option value="São Leopoldo-RS">São Leopoldo-RS</option>
									<option value="São Lourenço do Sul-RS">São Lourenço do Sul-RS</option>
									<option value="São Luiz Gonzaga-RS">São Luiz Gonzaga-RS</option>
									<option value="São Marcos-RS">São Marcos-RS</option>
									<option value="São Pedro do Sul-RS">São Pedro do Sul-RS</option>
									<option value="São Sebastião do Caí-RS">São Sebastião do Caí-RS</option>
									<option value="São Sepé-RS">São Sepé-RS</option>
									<option value="São Valentim-RS">São Valentim-RS</option>
									<option value="São Vicente do Sul-RS">São Vicente do Sul-RS</option>
									<option value="Sapiranga-RS">Sapiranga-RS</option>
									<option value="Sapucaia do Sul-RS">Sapucaia do Sul-RS</option>
									<option value="Sarandi-RS">Sarandi-RS</option>
									<option value="Seberi-RS">Seberi-RS</option>
									<option value="Sobradinho-RS">Sobradinho-RS</option>
									<option value="Soledade-RS">Soledade-RS</option>
									<option value="Tapejara-RS">Tapejara-RS</option>
									<option value="Tapera-RS">Tapera-RS</option>
									<option value="Tapes-RS">Tapes-RS</option>
									<option value="Taquara-RS">Taquara-RS</option>
									<option value="Taquari-RS">Taquari-RS</option>
									<option value="Tenente Portela-RS">Tenente Portela-RS</option>
									<option value="Teutônia-RS">Teutônia-RS</option>
									<option value="Torres-RS">Torres-RS</option>
									<option value="Tramandaí-RS">Tramandaí-RS</option>
									<option value="Três Coroas-RS">Três Coroas-RS</option>
									<option value="Três de Maio-RS">Três de Maio-RS</option>
									<option value="Três Passos-RS">Três Passos-RS</option>
									<option value="Triunfo-RS">Triunfo-RS</option>
									<option value="Tucunduva-RS">Tucunduva-RS</option>
									<option value="Tupanciretã-RS">Tupanciretã-RS</option>
									<option value="Uruguaiana-RS">Uruguaiana-RS</option>
									<option value="Vacaria-RS">Vacaria-RS</option>
									<option value="Venâncio Aires-RS">Venâncio Aires-RS</option>
									<option value="Vera Cruz-RS">Vera Cruz-RS</option>
									<option value="Veranópolis-RS">Veranópolis-RS</option>
									<option value="Viamão-RS">Viamão-RS</option>
								<optgroup label="Comarcas de São Paulo">
                                    <option value="São Paulo-SP">São Paulo-SP</option>
                                    <option value="Barueri-SP">Barueri-SP</option>
                                    <option value="Caieiras-SP">Caieiras-SP</option>
                                    <option value="Cajamar-SP">Cajamar-SP</option>
                                    <option value="Carapicuiba-SP">Carapicuíba-SP</option>
                                    <option value="Cotia-SP">Cotia-SP</option>
                                    <option value="Cubatão-SP">Cubatão-SP</option>
                                    <option value="Diadema-SP">Diadema-SP</option>
                                    <option value="Embu-SP">Embu-SP</option>
                                    <option value="Ferras de Vasconcelos-SP">Ferraz de Vasconcelos-SP</option>
                                    <option value="Franco da Rocha-SP">Franco da Rocha-SP</option>
                                    <option value="Guaruja-SP">Guarujá-SP</option>
                                    <option value="Guarulhos-SP">Guarulhos-SP</option>
                                    <option value="Itapecerica da Serra-SP">Itapecerica da Serra-SP</option>
                                    <option value="Itapevi-SP">Itapevi-SP</option>
                                    <option value="Itaquaquecetuba-SP">Itaquaquecetuba-SP</option>
                                    <option value="Jandira-SP">Jandira-SP</option>
                                    <option value="Mauá-SP">Mauá-SP</option>
                                    <option value="Mogi das Cruzes-SP">Mogi das Cruzes-SP</option>
                                    <option value="Osasco-SP">Osasco-SP</option>
                                    <option value="Poá-SP">Poá-SP</option>
                                    <option value="Praia Grande-SP">Praia Grande-SP</option>
                                    <option value="Ribeirão Pires-SP">Ribeirão Pires-SP</option>
                                    <option value="Santana de Parnaíba-SP">Santana de Parnaíba-SP</option>
                                    <option value="Santo André-SP">Santo André-SP</option>
                                    <option value="Santos-SP">Santos-SP</option>
                                    <option value="São Bernardo do Campo-SP">São Bernardo do Campo-SP</option>
                                    <option value="São Caetano do Sul-SP">São Caetano do Sul-SP</option>
                                    <option value="São Vicente-SP">São Vicente-SP</option>
									<option value="Sorocaba-SP">Sorocaba</option>
                                    <option value="Suzano-SP">Suzano-SP</option>
                                    <option value="Taboão da Serra-SP">Taboão da Serra-SP</option>
                                    </select>
                        </div>
                        <div class="form-group col-md-2">
    <label for="text">Celular <span class="glyphicon glyphicon-asterisk icocads"></span></label>
    <input type="text" class="form-control" id="cli_cel" name="cli_cel" maxlength="13" OnKeyPress="formatar('## #####-####', this)" required="required">
                        </div>
                        <div class="form-group col-md-2">
        <label for="text">Telefone</label>
        <input type="text" class="form-control" id="cli_tel" name="cli_tel" maxlength="13" OnKeyPress="formatar('## ####-####', this)">
                        </div>                                
</div>
<div class="tab-pane fade" id="aba2">
                                <div class="form-group col-md-2">
                <label for="text">Salario <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="tel" class="form-control" id="salario" name="salario" onkeyup="soma()" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" required="required">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor por fora <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="tel" class="form-control" id="valor_fora" name="valor_fora" onkeyup="soma()" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" required="required">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Remuneração total <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                <input type="text" class="form-control" id="remu_total" name="remu_total" value="0.00" title="Use apenas ponto separando o centavos do valor Ex. 1234.56" onKeyPress="return(MascaraMoeda(this,'','.',event))" required="required">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Entrada</label>
                <input type="date" class="form-control" id="data_ent" name="data_ent">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Registro</label>
                <input type="date" class="form-control" id="data_reg" name="data_reg">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Saida</label>
                <input type="date" class="form-control" id="data_saida" name="data_saida">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Teve aviso previo</label>
                <select type="text" class="form-control" id="receb_aviso_previo" name="receb_aviso_previo">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data do aviso</label>
                <input type="date" class="form-control" id="aviso_data" name="aviso_data">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do aviso previo</label>
                <input type="date" class="form-control" id="inic_aviso_previo" name="inic_aviso_previo">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cumprio aviso prévio?</label>
                <select type="text" class="form-control" id="cump_aviso_previo" name="cump_aviso_previo">
                <option value="não" selected>-------- NÃO --------</option>
                <option value="sim">-------- SIM --------</option>
                <option value="parcial">-------- PARCIAL --------</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Reduziu aviso Prévio</label>
                <select type="text" class="form-control" id="aviso_reducao" name="aviso_reducao">
                <option value="não" selected>---- NÃO ----</option>
                <option value="07 dias">---- 07 dias ----</option>
                <option value="02 horas">---- 02 horas ----</option>
                <option value="outros">---- Outros ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor do aviso</label>
                <input type="text" class="form-control" id="aviso_valor" name="aviso_valor" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Local de Homologação</label>
                                <div class="dropup" data-toggle="tooltip" data-placement="right" title="Escolha a forma de homologação feita pela reclamada!">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Local Homologado
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a id="nao_homo" href="#aba2">Não teve</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="sind_homo" href="#aba2">Sindicato</a></li>
                                <li><a id="drt_homo" href="#aba2">Drt</a></li>
                                </ul>
                                </div>
                                <div class="div_homologador" hidden="true">
                <input type="text" class="form-control" value="não-informado" id="qm_homo" name="qm_homo">
                				</div>
<script>
$(document).ready(function() {

    $("#nao_homo").click(function (){
                // desabilita o campo 
		$("#data_homo").prop("disabled",  true);
		$("#div_data_homo").prop("hidden",  true);
			$('#qm_homo').each(function () {
			$(this).val("Não teve homologação!");
			});
	});
	
    $("#sind_homo").click(function (){
                // desabilita o campo 
		$("#data_homo").prop("disabled",  false);
		$("#div_data_homo").prop("hidden",  false);
			$('#qm_homo').each(function () {
			$(this).val("homologado no sindicato!");
			});
	});
	
    $("#drt_homo").click(function (){
                // desabilita o campo 
		$("#data_homo").prop("disabled",  false);
		$("#div_data_homo").prop("hidden",  false);
			$('#qm_homo').each(function () {
			$(this).val("homologado no DRT!");
			});
	});
});
</script>
                                </div>
                                <div class="form-group col-md-2" id="div_data_homo" hidden="true">
                <label for="text">Data da Homologação</label>
                <input type="date" class="form-control" id="data_homo" name="data_homo" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu na quitação</label>
                                <div class="dropup" data-toggle="tooltip" data-placement="right" title="A reclamada pagou o reclamante com o TRCT?">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pagamentos TRCT
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a id="nao_quita" href="#aba2">Não</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="sim_quita" href="#aba2">Sim</a></li>
                                <li><a id="parcial_quita" href="#aba2">Parcialmente</a></li>
                                </ul>
                                </div>
                                <div id="div_recebeu_homo" hidden="true">
                <input type="text" class="form-control" value="não-informado" id="recebeu_homo" name="recebeu_homo">
                				</div>
                                
<script type="text/jscript">
$(document).ready(function() {

    $("#nao_quita").click(function (){
                // desabilita o campo 
		$("#homo_valor").prop("disabled",  true);
		$("#data_quita").prop("disabled",  true);
		$("#div_homo_valor").prop("hidden",  true);
		$("#div_data_quita").prop("hidden",  true);
			$('#recebeu_homo').each(function () {
			$(this).val("Não recebeu!");
			});
	});
	
    $("#sim_quita").click(function (){
                // desabilita o campo 
		$("#homo_valor").prop("disabled",  false);
		$("#data_quita").prop("disabled",  false);
		$("#div_homo_valor").prop("hidden",  false);
		$("#div_data_quita").prop("hidden",  false);
			$('#recebeu_homo').each(function () {
			$(this).val("Sim foi pago!");
			});
	});
	
    $("#parcial_quita").click(function (){
                // desabilita o campo 
		$("#homo_valor").prop("disabled",  false);
		$("#data_quita").prop("disabled",  false);
		$("#div_homo_valor").prop("hidden",  false);
		$("#div_data_quita").prop("hidden",  false);
			$('#recebeu_homo').each(function () {
			$(this).val("Foi pago parcialmente!");
			});
	});
});
</script>
                                
                				</div>
                                <div class="form-group col-md-2" id="div_homo_valor" hidden="true">
                <label for="text">Valor da quitação</label>
                <input type="text" class="form-control" id="homo_valor" name="homo_valor" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled="true">
                                </div>
                                <div class="form-group col-md-2" id="div_data_quita" hidden="true">
                <label for="text">Data da quitação</label>
                <input type="date" class="form-control" id="data_quita" name="data_quita" disabled="true">
                                </div>
</div>
<div class="tab-pane fade" id="aba3">
                                <div class="form-group col-md-2">
                <label for="text"  style="color:#F76466"><small>Entrada</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <input type="time" class="form-control" id="hrs_ent_sem" name="hrs_ent_sem">
                <label for="text">Sexta-Feira</label>
                <input type="time" class="form-control" id="hrs_ent_sex" name="hrs_ent_sex">
                <label for="text">Sábado</label>
                <input type="time" class="form-control" id="hrs_ent_sab" name="hrs_ent_sab">
                <label for="text">Domingo</label>
                <input type="time" class="form-control" id="hrs_ent_dom" name="hrs_ent_dom">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"  style="color:#F76466"><small>Saida</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <input type="time" class="form-control" id="hrs_exit_sem" name="hrs_exit_sem">
                <label for="text">Sexta-Feira</label>
                <input type="time" class="form-control" id="hrs_exit_sex" name="hrs_exit_sex">
                <label for="text">Sábado</label>
                <input type="time" class="form-control" id="hrs_exit_sab" name="hrs_exit_sab">
                <label for="text">Domingo</label>
                <input type="time" class="form-control" id="hrs_exit_dom" name="hrs_exit_dom">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text" style="color:#F76466"><small>Tempo de intervalo</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <select type="text" class="form-control" id="hrs_almo_sem" name="hrs_almo_sem">
                		<option value="não trabalha" selected>Não trabalhado</option>
                		<option value="sem pausa para descanso">Não tem</option>
                		<option value="00h30m">30 minutos</option> 
                		<option value="01h00m">1 hora</option> 
                		<option value="01h30m">1 hora e 30 minutos</option> 
                		<option value="02h00m">2 horas</option> 
                		<option value="02h30m">2 horas e 30 minutos</option> 
                </select>
                <label for="text">Sexta-Feira</label>
                <select type="text" class="form-control" id="hrs_almo_sex" name="hrs_almo_sex">
                		<option value="não trabalha" selected>Não trabalhado</option>
                		<option value="sem pausa para descanso">Não tem</option>
                		<option value="00h30m">30 minutos</option> 
                		<option value="01h00m">1 hora</option> 
                		<option value="01h30m">1 hora e 30 minutos</option> 
                		<option value="02h00m">2 horas</option> 
                		<option value="02h30m">2 horas e 30 minutos</option> 
                </select>
                <label for="text">Sábado</label>
                <select type="text" class="form-control" id="hrs_almo_sab" name="hrs_almo_sab">
                		<option value="não trabalha" selected>Não trabalhado</option>
                		<option value="sem pausa para descanso">Não tem</option>
                		<option value="00h30m">30 minutos</option> 
                		<option value="01h00m">1 hora</option> 
                		<option value="01h30m">1 hora e 30 minutos</option> 
                		<option value="02h00m">2 horas</option> 
                		<option value="02h30m">2 horas e 30 minutos</option> 
                </select>
                <label for="text">Domingo</label>
                <select type="text" class="form-control" id="hrs_almo_dom" name="hrs_almo_dom">
                		<option value="não trabalha" selected>Não trabalhado</option>
                		<option value="sem pausa para descanso">Não tem</option>
                		<option value="00h30m">30 minutos</option> 
                		<option value="01h00m">1 hora</option> 
                		<option value="01h30m">1 hora e 30 minutos</option> 
                		<option value="02h00m">2 horas</option> 
                		<option value="02h30m">2 horas e 30 minutos</option> 
                </select>
                                </div>
                                <div class="form-group col-md-6">
                <label for="text" style="color:#F76466"><small>Horas noturnas</small></label><br>
                <label for="text">Trabalhou anoite?</label>
                <select type="text" class="form-control" id="trab_noite" name="trab_noite">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="só trabalhou anoite">---- SEMPRE ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario entrada noturno</label>
                <input type="time" class="form-control" id="noite_ent" name="noite_ent">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario saida</label>
                <input type="time" class="form-control" id="noite_exit" name="noite_exit">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario intervalo</label>
                <select type="text" class="form-control" id="noite_almo" name="noite_almo">
                		<option value="não trabalha" selected>Não trabalhado</option>
                		<option value="sem pausa para descanso">Não tem</option>
                		<option value="00h30m">30 minutos</option> 
                		<option value="01h00m">1 hora</option> 
                		<option value="01h30m">1 hora e 30 minutos</option> 
                		<option value="02h00m">2 horas</option> 
                		<option value="02h30m">2 horas e 30 minutos</option> 
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu Adc.noturno</label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se a reclamada pagou os adicionais noturnos.">
                                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">
                                Adicionais Noturnos
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="nao_r_adc_n" href="#aba2">Não</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="sim_r_adc_n" href="#aba2">Sim</a></li>
                                <li><a id="part_r_adc_n" href="#aba2">Parcial</a></li>
                                </ul>
                                </div>
                                <div class="div_recebeu adc_noite" hidden="true">
                                <input type="text" id="recebeu_adc_noite" value="não-informado" name="recebeu_adc_noite" class="form-control">
                                </div>
<script type="text/javascript">
$(document).ready(function() {

    $("#nao_r_adc_n").click(function (){
                // desabilita o campo 
		$("#adc_noite_vl").prop("disabled",  true);
		$("#div_adc_noite_vl").prop("hidden",  true);
			$('#recebeu_adc_noite').each(function () {
			$(this).val("Não recebeu adicionais noturnos!");
			});
	});
	
    $("#sim_r_adc_n").click(function (){
                // desabilita o campo 
		$("#adc_noite_vl").prop("disabled",  false);
		$("#div_adc_noite_vl").prop("hidden",  false);
			$('#recebeu_adc_noite').each(function () {
			$(this).val("Sim os adicionais noturnos foram pagos!");
			});
	});
	
    $("#part_r_adc_n").click(function (){
                // desabilita o campo 
		$("#adc_noite_vl").prop("disabled",  false);
		$("#div_adc_noite_vl").prop("hidden",  false);
			$('#recebeu_adc_noite').each(function () {
			$(this).val("Pagaram parcialmente os adicionais noturnos!");
			});
	});
});
</script>                         
                                </div>
                                <div class="form-group col-md-2" id="div_adc_noite_vl" hidden="true">
                <label for="text">Valor adicional noturno</label>
    <input type="text" class="form-control" id="adc_noite_vl" value="0,00" name="adc_noite_vl" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Adicional noturno%</label>
                <select type="text" class="form-control" id="adc_noite_porc" name="adc_noite_porc">
                <option value="0">selecionar</option>
                <option value="20">20%</option>
                <option value="25">25%</option>
                <option value="30">30%</option>
                <option value="35">35%</option>
                <option value="40">40%</option>
                <option value="45">45%</option>
                <option value="50">50%</option>
                <option value="55">55%</option>
                <option value="60">60%</option>
                <option value="65">65%</option>
                <option value="70">70%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="85">85%</option>
                <option value="90">90%</option>
                <option value="95">95%</option>
                <option value="100">100%</option>
                </select>
                                </div>
                                <div class="form-group col-md-7">
                <label for="text" style="color:#F76466"><small>Horas extra</small></label><br>
                <label for="text">Recebia horas extra?</label>
                <select type="text" class="form-control" id="ext_pago" name="ext_pago">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                <div class="col-md-3">
                <label for="text">Extra na entrada</label>
                <input type="time" class="form-control" id="hrs_ext_antes" name="hrs_ext_antes" value="">
                                </div>
                                <div class="col-md-3">
                <label for="text">Extra na saida</label>
                <input type="time" class="form-control" id="hrs_ext_apos" name="hrs_ext_apos" value="">
                                </div>
                                <div class="col-md-6"><!--option fazzer-->
                <label for="text">Média de horas extras feita</label>
                <select type="text" class="form-control" id="hrs_ext_media" name="hrs_ext_media">
                <option value="não_fazia">selecionar</option>
                <option value="1x7 semana">Uma vez na semana</option>
                <option value="2x7 semana">Duas vezes na semana</option>
                <option value="3x7 semana">Três vezes na semana</option>
                <option value="4x7 semana">Quatro vezes na semana</option>
                <option value="5x7 semana">Cinco vezes na semana</option>
                <option value="6x7 semana">Seis Vezes na semana</option>
                <option value="todo dia">Todos os dias da semana</option>
                <option value="1 x mês">Uma vez no mês</option>
                <option value="2 x mês">Duas vezes no mês</option>
                <option value="3 x mês">Três vezes no mês</option>
                <option value="4 x mês">Quatro Vezes no mês</option>
                <option value="muito pouca">Muito pouca</option>
                <option value="fazia poucas">Fazia poucas</option>
                <option value="algumas vezes">Algumas vezes</option>
                <option value="fazia muitas">Fazia muitas</option>
                <option value="fazia varias">Fazia varias</option>
                <option value="fazia todo dia">Fazia todos os dias</option>
                </select>
                                </div>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Semanal Porcentual</label>
                <select type="text" class="form-control" id="ext_porcento" name="ext_porcento">
                <option value="0">selecionar</option>
                <option value="50">50%</option>
                <option value="55">55%</option>
                <option value="60">60%</option>
                <option value="65">65%</option>
                <option value="70">70%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="85">85%</option>
                <option value="90">90%</option>
                <option value="95">95%</option>
                <option value="100">100%</option>
                </select>
                                </div>
                              	<div class="form-group col-md-2">
                                <br>
                <label for="text">Sábado porcentual</label>
                <select type="text" class="form-control" id="sab_ext_porc" name="sab_ext_porc">
                <option value="0">selecionar</option>
                <option value="50">50%</option>
                <option value="55">55%</option>
                <option value="60">60%</option>
                <option value="65">65%</option>
                <option value="70">70%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="85">85%</option>
                <option value="90">90%</option>
                <option value="95">95%</option>
                <option value="100">100%</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Domingo Porcentual</label>
                <select type="text" class="form-control" id="dom_ext_porc" name="dom_ext_porc">
                <option value="0">selecionar</option>
                <option value="50">50%</option>
                <option value="55">55%</option>
                <option value="60">60%</option>
                <option value="65">65%</option>
                <option value="70">70%</option>
                <option value="75">75%</option>
                <option value="80">80%</option>
                <option value="85">85%</option>
                <option value="90">90%</option>
                <option value="95">95%</option>
                <option value="100">100%</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Escala de trabalho <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Escolha a escala de trabalho com base em dias trabalhados no mês"></span></label>
                <select type="text" class="form-control" id="escala_trab" name="escala_trab">
		<option value="">selecionar</option>
		<option value="24">5x1 ou 6x1 - 24 dias mês</option>
		<option value="20">5x2 - 20 dias mês</option> 
		<option value="15">12x36 ou 18x32 - 15 dias mês</option> 
		<option value="12">24x48 - 12 dias mês</option> 
                </select>
                                </div></div>
<div class="tab-pane fade" id="aba4">                       
                                <div class="form-group col-md-2">
                <label for="text">Recebeu VT</label>
                <select type="text" class="form-control" id="receb_VT" name="receb_VT">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VT: valor diario</label>
                <input type="text" class="form-control" id="VT_valor" name="VT_valor" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" title="Exemplo:. 12345.00, 987.65 ou 1.23 com pontuação apenas">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu C.Basica</label>
                <select type="text" class="form-control" id="cesta_basica" name="cesta_basica">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cesta basica: mês</label>
<input type="text" class="form-control" id="cesta_valor" name="cesta_valor" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu VR</label>
                <select type="text" class="form-control" id="recebe_VR" name="recebe_VR">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VR: valor diario</label>
                <input type="text" class="form-control" id="VR_valor" name="VR_valor" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu 13º</label>
<div class="btn-group" data-toggle="buttons-radio">
  <button type="button" id="13_select" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!"><small><span class="glyphicon glyphicon-off" aria-hidden="true"></span></small></button>
  <button type="button" id="13_sim" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="13º salário foi pago!"><small><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></small></button>
  <button type="button" id="13_nao" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="13º salário não foi pago!"><small><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></small></button>
  <button type="button" id="13_part" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="13º salário foi pago parcialmente!"><small><span class="glyphicon glyphicon-adjust" aria-hidden="true"></span></small></button>
</div>
<script type="text/jscript">
$(document).ready(function() {

    $("#13_select").click(function (){
                // desabilita o campo 
		$("#dec_data").prop("disabled",  true);
		$("#dec_data2").prop("disabled", true);
		$("#dec_data3").prop("disabled", true);
		$("#dec_data4").prop("disabled", true);
		$("#dec_data5").prop("disabled", true);
		$("#13_descdiv").prop("hidden",  true);
			$('#receb_dec').each(function () {
			$(this).val("opção desativada");
			});
	});
	
	$("#13_nao").click(function (){
                // habilita o campo 
		$("#dec_data").prop("disabled", false);
		$("#dec_data2").prop("disabled", false);
		$("#dec_data3").prop("disabled", false);
		$("#dec_data4").prop("disabled", false);
		$("#dec_data5").prop("disabled", false);
		$("#13_descdiv").prop("hidden", false);
			$('#receb_dec').each(function () {
			$(this).val("Não foi pago!");
			});
	});
    
    $("#13_sim").click(function (){
                // desabilita o campo 
		$("#dec_data").prop("disabled", true);
		$("#dec_data2").prop("disabled", true);
		$("#dec_data3").prop("disabled", true);
		$("#dec_data4").prop("disabled", true);
		$("#dec_data5").prop("disabled", true);
		$("#13_descdiv").prop("hidden", true);
			$('#receb_dec').each(function () {
			$(this).val("Sim foi pago!");
			});
	});
    $("#13_part").click(function (){
                // desabilita o campo 
		$("#dec_data").prop("disabled", false);
		$("#dec_data2").prop("disabled", false);
		$("#dec_data3").prop("disabled", false);
		$("#dec_data4").prop("disabled", false);
		$("#dec_data5").prop("disabled", false);
		$("#13_descdiv").prop("hidden", false);
			$('#receb_dec').each(function () {
			$(this).val("Sim foi pago parcialmente!");
			});
	});
	
});
</script>
                                </div>
                                <div id="13_descdiv" hidden="true">
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data" name="dec_data" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data2" name="dec_data2" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data3" name="dec_data3" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data4" name="dec_data4" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data5" name="dec_data5" disabled>
                                </div>
                                <div class="form-group col-md-2" hidden="true">
                <label for="text"><small>status</small></label>
                <input type="text" class="form-control" value="opção desativada" id="receb_dec" name="receb_dec">
								</div>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Gozou férias</label>
<div class="btn-group" data-toggle="buttons-radio">
  <button type="button" id="ferias_select" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!"><small><span class="glyphicon glyphicon-off" aria-hidden="true"></span></small></button>
  <button type="button" id="ferias_sim" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ferias Ok!"><small><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></small></button>
  <button type="button" id="ferias_nao" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Não teve nenhuma férias!"><small><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></small></button>
  <button type="button" id="ferias_part" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Foi tirada férias parcialmente!"><small><span class="glyphicon glyphicon-adjust" aria-hidden="true"></span></small></button>
</div>
                                </div>
<script type="text/javascript">
$(document).ready(function() {

    $("#ferias_select").click(function (){
                // desabilita o campo 
		$("#ferias_quant").prop("disabled",  true);
		$("#trab_ferias").prop("disabled", true);
		$("#perio_ferias").prop("disabled", true);
		$("#feriasdiv").prop("hidden",  true);
			$('#tev_ferias').each(function () {
			$(this).val("opção desativada");
			});
	});
	
	$("#ferias_nao").click(function (){
                // habilita o campo 
		$("#ferias_quant").prop("disabled",  false);
			$('#ferias_quant').each(function () {
			$(this).val("todas as férias");
			});
		$("#trab_ferias").prop("disabled", false);
			$('#trab_ferias').each(function () {
			$(this).val("sim");
			});
		$("#perio_ferias").prop("disabled", false);
		$("#perio_ferias").prop("readonly", true);
			$('#perio_ferias').each(function () {
			$(this).val("Todas as férias!");
			});
		$("#feriasdiv").prop("hidden", false);
			$('#tev_ferias').each(function () {
			$(this).val("Não gozou férias!");
			});
	});
    
    $("#ferias_sim").click(function (){
                // desabilita o campo 
		$("#ferias_quant").prop("disabled",  true);
		$("#trab_ferias").prop("disabled", true);
		$("#perio_ferias").prop("disabled", true);
		$("#feriasdiv").prop("hidden", true);
			$('#tev_ferias').each(function () {
			$(this).val("Sim gozou!");
			});
	});
	
    $("#ferias_part").click(function (){
                // desabilita o campo 
		$("#ferias_quant").prop("disabled",  false);
			$('#ferias_quant').each(function () {
			$(this).val("não selecionado");
			});
		$("#trab_ferias").prop("disabled", false);
		$("#perio_ferias").prop("disabled", false);
		$("#perio_ferias").prop("readonly", false);
			$('#perio_ferias').each(function () {
			$(this).val("");
			});
			$('#trab_ferias').each(function () {
			$(this).val("não");
			});
		$("#feriasdiv").prop("hidden", false);
			$('#tev_ferias').each(function () {
			$(this).val("Sim foi gozada parcialmente!");
			});
	});
	
});
</script>
                                <div id="feriasdiv" hidden="true"> 
                                <div class="form-group col-md-1" hidden="true">
                                <label for="text"><small>Status de Férias</small></label>
                                <input type="text" class="form-control" id="tev_ferias" name="tev_ferias">
                                </div>  
                                <div class="form-group col-md-2">
                                <label for="text"><small>Pedir quantas férias</small></label>
                                <select type="text" class="form-control" id="ferias_quant" name="ferias_quant" disabled>
                                <option value="não selecionado">selecionar</option>
                                <option value="proporcional">mês proporcional</option>
                                <option value="1">Uma férias</option>
                                <option value="1+proporcional">Uma férias + proporcional</option>
                                <option value="2">Duas férias</option>
                                <option value="2+proporcionais">Duas férias + proporcionais</option>
                                <option value="3">Três férias</option>
                                <option value="3+proporcionais">Três férias + proporcionais</option>
                                <option value="4">Quatro férias</option>
                                <option value="4+proporcionais">Quatro férias + proporcionais</option>
                                <option value="5">Cinco férias</option>
                                <option value="todas as férias">Todas as férias permitidas</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="text"><small>Trabalhou nas férias</small></label>
                                <select type="text" class="form-control" id="trab_ferias" name="trab_ferias" disabled>
                                <option value="não">---- NÃO ----</option>
                                <option value="sim">---- SIM ----</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="text"><small>Periodo de férias trabalhadas</small></label>
                                <input type="text" class="form-control" id="perio_ferias" name="perio_ferias" disabled>
                                </div>
                                </div>  
                                <div class="form-group col-md-2">
                <label for="text">Recebeu Holerites</label>
                <select type="text" class="form-control" id="receb_holerith" name="receb_holerith">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">PLR: valor anual</label>
                <input type="text" class="form-control" value="0,00" id="plr_valor" name="plr_valor" onkeypress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu FGTS</label>
                <select type="text" class="form-control" id="g_fgts" name="g_fgts">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Seguro-desemprego</label>
                <select type="text" class="form-control" id="g_sd" name="g_sd">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Filho menor de 14 anos</label>
<div class="btn-group" data-toggle="buttons-radio">
  <button type="button" id="filho_off" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!"><small><span class="glyphicon glyphicon-off" aria-hidden="true"></span></small></button>
  <button type="button" id="filho_sim" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Sim tem filhos menores de 14 anos!"><small><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></small></button>
  <button type="button" id="filho_não" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Não tem filhos menores de 14 anos!"><small><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></small></button>
</div>

<script type="text/jscript">
$(document).ready(function() {

    $("#filho_off").click(function (){
                // desabilita o campo 
		$("#rec_sal_fam").prop("disabled",  true);
		$("#salario_fam").prop("disabled", true);
		$("#rec_sal_fam").prop("disabled", true);
		$("#salario_fam").prop("disabled", true);
		$("#div_salario_familia").prop("hidden",  true);
		$("#div_salariofm_vlmes").prop("hidden",  true);
			$('#filho_14').each(function () {
			$(this).val("opção desativada");
			});
	});
	
	$("#filho_sim").click(function (){
                // habilita o campo 
		$("#rec_sal_fam").prop("disabled",  false);
		$("#salario_fam").prop("disabled", false);
		$("#rec_sal_fam").prop("disabled", false);
		$("#salario_fam").prop("disabled", false);
		$("#div_salario_familia").prop("hidden",  false);
		$("#div_salariofm_vlmes").prop("hidden",  false);
			$('#filho_14').each(function () {
			$(this).val("Sim tem!");
			});
	});
    
    $("#filho_não").click(function (){
                // desabilita o campo 
		$("#rec_sal_fam").prop("disabled",  true);
		$("#salario_fam").prop("disabled", true);
		$("#rec_sal_fam").prop("disabled", true);
		$("#salario_fam").prop("disabled", true);
		$("#div_salario_familia").prop("hidden",  true);
		$("#div_salariofm_vlmes").prop("hidden",  true);
			$('#filho_14').each(function () {
			$(this).val("Não tem!");
			});
	});
	
	
});
</script>
								<div id="div_filho_14" hidden="true">
                <input type="text" class="form-control" value="opção desativada" id="filho_14" name="filho_14">
                				</div>
                                </div>
                                <div class="form-group col-md-2" id="div_salario_familia" hidden="true">
                <label for="text">Recebeu salario familia</label>
<div class="btn-group" data-toggle="buttons-radio">
  <button type="button" id="recfilho_não" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Não recebia Salário Familia"><small><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></small>
  </button>
  <button type="button" id="recfilho_sim" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Sim recebia Salário Familia"><small><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span></small>
  </button>
  <button type="button" class="btn btn-info"><small><span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="consulte teto do benefício e veja se salário é igual ou inferior"></span></small></button>
</div>
								<div id="div_vl_salariof" hidden="true">
                <input type="text" class="form-control" value="Não recebia!" id="rec_sal_fam" name="rec_sal_fam" disabled="true">
                				</div>
<script type="text/jscript">
$(document).ready(function() {

	$("#recfilho_sim").click(function (){
                // habilita o campo 
			$('#rec_sal_fam').each(function () {
			$(this).val("Sim recebia!");
			});
	});
    
    $("#recfilho_não").click(function (){
                // desabilita o campo 
			$('#rec_sal_fam').each(function () {
			$(this).val("Não recebia!");
			});
	});
	
	
});
</script>
                                </div>
                                <div class="form-group col-md-2" id="div_salariofm_vlmes" hidden="true">
                <label for="text">Valor S.Familia <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Informar o valor da tabela ou o valor que a reclamante pagou cada mês!"></span> <span id="vl_salariof_info" class="glyphicon glyphicon-info-sign" aria-hidden="true" onClick="abrirpopup('http://www.guiatrabalhista.com.br/guia/salario_familia.htm');" data-toggle="tooltip" data-placement="top" title="Clique e verifique o valor mensal do benêficio"></span></label>
                <input type="text" class="form-control" id="salario_fam" name="salario_fam" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
 <script type="text/javascript">
function abrirpopup(URL) {
 
  var width = 600;
  var height = 500;
 
  var left = 200;
  var top = 99;
 
  window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
 
}
 </script>
                                </div>
                                <div class="form-group col-md-7 transparente">
                                <label for="title">.....</label>
                                <input type="text" class="form-control">
                                </div>
</div>
<div class="tab-pane fade" id="aba5">
                                <div class="form-group col-md-12">
                                <label for="text" style="color:#F76466;">
                                <small>Escolha a quantidade de paradigmas: MAX. 0-5</small>
                                </label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="paradigma_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="paradigma_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um paradigma">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    </button>
    <button type="button" id="paradigma_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois paradigmas">
    							<span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="paradigma_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três paradigmas">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span>
    </button>
    <button type="button" id="paradigma_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro paradigmas">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span></span>
    </button>
    <button type="button" id="paradigma_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco paradigmas">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span></span></span>
    </button>
                                </div>
                                </div>
                                <div id="all_paradigmas">
            <div id="paradigma_name1" style="display:none;"> <!-- div paradigma um -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Primeiro paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_1" name="p_nome_1" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_1" name="p_salario_1" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_1" name="p_cargo_1" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_1" name="p_inicio_1" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_1" name="p_tempo_1" disabled>
                	<option value="-6 meses">menos de 6 mês</option>
                	<option value="6 meses">6 mês</option>
                	<option value="1 ano">1 ano</option>
                	<option value="1 ano e 6 mês">1 ano e 6 mês</option>
                	<option value="2 anos">2 anos</option>
                	<option value="2 anos e 6 mês">2 anos e 6 mês</option>
                	<option value="3 anos">3 anos</option>
                	<option value="4 anos">4 anos</option>
                	<option value="5 anos ou mais">5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma um -->
            <div id="paradigma_name2" style="display:none;"> <!-- div paradigma dois -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Segunda paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_2" name="p_nome_2" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_2" name="p_salario_2" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_2" name="p_cargo_2" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_2" name="p_inicio_2" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_2" name="p_tempo_2" disabled>
                	<option value="-6 meses">menos de 6 mês</option>
                	<option value="6 meses">6 mês</option>
                	<option value="1 ano">1 ano</option>
                	<option value="1 ano e 6 mês">1 ano e 6 mês</option>
                	<option value="2 anos">2 anos</option>
                	<option value="2 anos e 6 mês">2 anos e 6 mês</option>
                	<option value="3 anos">3 anos</option>
                	<option value="4 anos">4 anos</option>
                	<option value="5 anos ou mais">5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma dois -->
            <div id="paradigma_name3" style="display:none;"> <!-- div paradigma três-->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Terceira paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_3" name="p_nome_3" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_3" name="p_salario_3" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_3" name="p_cargo_3" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_3" name="p_inicio_3" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_3" name="p_tempo_3" disabled>
                	<option value="-6 meses">menos de 6 mês</option>
                	<option value="6 meses">6 mês</option>
                	<option value="1 ano">1 ano</option>
                	<option value="1 ano e 6 mês">1 ano e 6 mês</option>
                	<option value="2 anos">2 anos</option>
                	<option value="2 anos e 6 mês">2 anos e 6 mês</option>
                	<option value="3 anos">3 anos</option>
                	<option value="4 anos">4 anos</option>
                	<option value="5 anos ou mais">5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma três -->
            <div id="paradigma_name4" style="display:none;"> <!-- div paradigma quatro -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quarta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_4" name="p_nome_4" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_4" name="p_salario_4" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_4" name="p_cargo_4" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_4" name="p_inicio_4" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_4" name="p_tempo_4" disabled>
                	<option value="-6 meses">menos de 6 mês</option>
                	<option value="6 meses">6 mês</option>
                	<option value="1 ano">1 ano</option>
                	<option value="1 ano e 6 mês">1 ano e 6 mês</option>
                	<option value="2 anos">2 anos</option>
                	<option value="2 anos e 6 mês">2 anos e 6 mês</option>
                	<option value="3 anos">3 anos</option>
                	<option value="4 anos">4 anos</option>
                	<option value="5 anos ou mais">5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma quatro -->
            <div id="paradigma_name5" style="display:none;"> <!-- div paradigma cinco -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quinta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_5" name="p_nome_5" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_5" name="p_salario_5" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_5" name="p_cargo_5" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_5" name="p_inicio_5" disabled>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_5" name="p_tempo_5" disabled>
                	<option value="-6 meses">menos de 6 mês</option>
                	<option value="6 meses">6 mês</option>
                	<option value="1 ano">1 ano</option>
                	<option value="1 ano e 6 mês">1 ano e 6 mês</option>
                	<option value="2 anos">2 anos</option>
                	<option value="2 anos e 6 mês">2 anos e 6 mês</option>
                	<option value="3 anos">3 anos</option>
                	<option value="4 anos">4 anos</option>
                	<option value="5 anos ou mais">5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma cinco -->
            					</div>
     <script type="text/javascript">
$(document).ready(function() {

    $("#paradigma_none").click(function (){
		$("#paradigma_name1").prop("style").display="none"
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", true);
		$("#paradigma_name2").prop("style").display="none"
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", true);
		$("#paradigma_name3").prop("style").display="none"
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", true);
		$("#paradigma_name4").prop("style").display="none"
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", true);
		$("#paradigma_name5").prop("style").display="none"
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", true);
	});

    $("#paradigma_1").click(function (){
		$("#paradigma_name1").prop("style").display=""
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", false);
		$("#paradigma_name2").prop("style").display="none"
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", true);
		$("#paradigma_name3").prop("style").display="none"
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", true);
		$("#paradigma_name4").prop("style").display="none"
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", true);
		$("#paradigma_name5").prop("style").display="none"
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", true);
	});
	
    $("#paradigma_2").click(function (){
		$("#paradigma_name1").prop("style").display=""
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", false);
		$("#paradigma_name2").prop("style").display=""
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", false);
		$("#paradigma_name3").prop("style").display="none"
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", true);
		$("#paradigma_name4").prop("style").display="none"
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", true);
		$("#paradigma_name5").prop("style").display="none"
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", true);
	});
	
    $("#paradigma_3").click(function (){
		$("#paradigma_name1").prop("style").display=""
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", false);
		$("#paradigma_name2").prop("style").display=""
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", false);
		$("#paradigma_name3").prop("style").display=""
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", false);
		$("#paradigma_name4").prop("style").display="none"
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", true);
		$("#paradigma_name5").prop("style").display="none"
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", true);
	});
	
    $("#paradigma_4").click(function (){
		$("#paradigma_name1").prop("style").display=""
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", false);
		$("#paradigma_name2").prop("style").display=""
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", false);
		$("#paradigma_name3").prop("style").display=""
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", false);
		$("#paradigma_name4").prop("style").display=""
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", false);
		$("#paradigma_name5").prop("style").display="none"
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", true);
	});
	
    $("#paradigma_5").click(function (){
		$("#paradigma_name1").prop("style").display=""
		$("#p_nome_1,#p_salario_1,#p_cargo_1,#p_inicio_1,#p_tempo_1").prop("disabled", false);
		$("#paradigma_name2").prop("style").display=""
		$("#p_nome_2,#p_salario_2,#p_cargo_2,#p_inicio_2,#p_tempo_2").prop("disabled", false);
		$("#paradigma_name3").prop("style").display=""
		$("#p_nome_3,#p_salario_3,#p_cargo_3,#p_inicio_3,#p_tempo_3").prop("disabled", false);
		$("#paradigma_name4").prop("style").display=""
		$("#p_nome_4,#p_salario_4,#p_cargo_4,#p_inicio_4,#p_tempo_4").prop("disabled", false);
		$("#paradigma_name5").prop("style").display=""
		$("#p_nome_5,#p_salario_5,#p_cargo_5,#p_inicio_5,#p_tempo_5").prop("disabled", false);
	});
});
    </script>
</div>
<div class="tab-pane fade" id="aba6">
                                <div class="form-group col-md-12"> 
                                <label for="text" style="color:#F76466;"><small>Escolha a quantidade de funções exercidas além da quela principal já preenchida: MAX. 0-5</small></label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="funcaodesv_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="funcaodesv_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um desvio de função">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
    </button>
    <button type="button" id="funcaodesv_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois desvio de função" onClick="">
    							<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="funcaodesv_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três desvio de função" onClick="">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span>
    </button>
    <button type="button" id="funcaodesv_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro desvio de função" onClick="">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span>
    </button>
    <button type="button" id="funcaodesv_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco desvio de função" onClick="">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span></span>
    </button>
                                </div>
                                </div>
                                <div id="all_funcaodesv">
            <div id="funcaodesv_name1" style="display:none;"> <!-- div desvio de função um -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Primeiro desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_1" name="desvio_cargo_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_1" name="desvio_salario_1" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_1" name="desvio_divoff_1" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_1" name="desvio_datainicio_1">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_1" name="desvio_datafim_1">
                                </div>
            </div> <!-- fecha função um -->
            <div id="funcaodesv_name2" style="display:none;"> <!-- div desvio de função dois -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Segundo desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_2" name="desvio_cargo_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_2" name="desvio_salario_2" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_2" name="desvio_divoff_2" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_2" name="desvio_datainicio_2">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_2" name="desvio_datafim_2">
                                </div>
            </div> <!-- fecha função dois -->
            <div id="funcaodesv_name3" style="display:none;"> <!-- div desvio de função três-->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Terceiro desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_3" name="desvio_cargo_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_3" name="desvio_salario_3" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_3" name="desvio_divoff_3" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_3" name="desvio_datainicio_3">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_3" name="desvio_datafim_3">
                                </div>
            </div> <!-- fecha função três -->
            <div id="funcaodesv_name4" style="display:none;"> <!-- div desvio de função quatro -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quarto desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_4" name="desvio_cargo_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_4" name="desvio_salario_4" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_4" name="desvio_divoff_4" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_4" name="desvio_datainicio_4">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_4" name="desvio_datafim_4">
                                </div>
            </div> <!-- fecha função quatro -->
            <div id="funcaodesv_name5" style="display:none;"> <!-- div desvio de função cinco -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quinto desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_5" name="desvio_cargo_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_5" name="desvio_salario_5" value="0,00" onKeyPress="return(MascaraMoeda(this,'','.',event))">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_5" name="desvio_divoff_5" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_5" name="desvio_datainicio_5">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_5" name="desvio_datafim_5">
                                </div>
            </div> <!-- fecha função cinco -->
            					</div>
     <script type="text/javascript">
$(document).ready(function() {

    $("#funcaodesv_none").click(function (){
		$("#funcaodesv_name1").prop("style").display="none"
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", true);
		$("#funcaodesv_name2").prop("style").display="none"
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", true);
		$("#funcaodesv_name3").prop("style").display="none"
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", true);
		$("#funcaodesv_name4").prop("style").display="none"
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", true);
		$("#funcaodesv_name5").prop("style").display="none"
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", true);
	});

    $("#funcaodesv_1").click(function (){
		$("#funcaodesv_name1").prop("style").display=""
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", false);
		$("#funcaodesv_name2").prop("style").display="none"
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", true);
		$("#funcaodesv_name3").prop("style").display="none"
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", true);
		$("#funcaodesv_name4").prop("style").display="none"
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", true);
		$("#funcaodesv_name5").prop("style").display="none"
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", true);
	});
	
    $("#funcaodesv_2").click(function (){
		$("#funcaodesv_name1").prop("style").display=""
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", false);
		$("#funcaodesv_name2").prop("style").display=""
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", false);
		$("#funcaodesv_name3").prop("style").display="none"
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", true);
		$("#funcaodesv_name4").prop("style").display="none"
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", true);
		$("#funcaodesv_name5").prop("style").display="none"
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", true);
	});
	
    $("#funcaodesv_3").click(function (){
		$("#funcaodesv_name1").prop("style").display=""
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", false);
		$("#funcaodesv_name2").prop("style").display=""
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", false);
		$("#funcaodesv_name3").prop("style").display=""
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", false);
		$("#funcaodesv_name4").prop("style").display="none"
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", true);
		$("#funcaodesv_name5").prop("style").display="none"
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", true);
	});
	
    $("#funcaodesv_4").click(function (){
		$("#funcaodesv_name1").prop("style").display=""
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", false);
		$("#funcaodesv_name2").prop("style").display=""
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", false);
		$("#funcaodesv_name3").prop("style").display=""
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", false);
		$("#funcaodesv_name4").prop("style").display=""
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", false);
		$("#funcaodesv_name5").prop("style").display="none"
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", true);
	});
	
    $("#funcaodesv_5").click(function (){
		$("#funcaodesv_name1").prop("style").display=""
		$("#desvio_cargo_1,#desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1").prop("disabled", false);
		$("#funcaodesv_name2").prop("style").display=""
		$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2").prop("disabled", false);
		$("#funcaodesv_name3").prop("style").display=""
		$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3").prop("disabled", false);
		$("#funcaodesv_name4").prop("style").display=""
		$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4").prop("disabled", false);
		$("#funcaodesv_name5").prop("style").display=""
		$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5").prop("disabled", false);
	});
});
    </script>
</div>
<div class="tab-pane fade" id="aba7">
                                <div class="form-group col-md-6" id="text_obs_insalubre">
                <label for="text">Insalubridade: <span style="color:#F76466;">Max:. <span id="counts_txt_insalubre">&nbsp;</span></span></label>
    <textarea class="form-control" id="insalubre" name="insalubre" rows="2" maxlength="60" placeholder="Digite sua observação insalubre em até 60 caracteres..."></textarea>
                                </div>
                                <div class="form-group col-md-6" id="text_obs_periculoso">
                <label for="text">Periculosidade:  <span style="color:#F76466;">Max:. <span id="counts_txt_periculoso">&nbsp;</span></span></label>
    <textarea class="form-control" id="periculoso" name="periculoso" rows="2" maxlength="60"  placeholder="Digite sua observação periculosa em até 60 caracteres..."></textarea>
                                </div>
                                <div class="form-group col-md-12" id="text_obs_adv">
                <label for="text">Observações do Advogado: <span style="color:#F76466;">Max:. <span id="counts_txt_obs_adv">&nbsp;</span></span></label>
    <textarea class="form-control" id="obs_adv" name="obs_adv" rows="5" maxlength="1000" placeholder="Digite sua observação resumida em até 1000 caracteres..."></textarea>
                                </div>
    <script type="text/javascript">
var textobsadv = new Spry.Widget.ValidationTextarea("text_obs_adv", {maxChars:1000,counterType:"chars_remaining",counterId:"counts_txt_obs_adv", isRequired:false});
var textinsalubre = new Spry.Widget.ValidationTextarea("text_obs_insalubre", {maxChars:60,counterType:"chars_remaining",counterId:"counts_txt_insalubre", isRequired:false});
var textpericuloso = new Spry.Widget.ValidationTextarea("text_obs_periculoso", {maxChars:60,counterType:"chars_remaining",counterId:"counts_txt_periculoso", isRequired:false});
	</script>                            
</div>
<div class="tab-pane fade" id="aba8">
                                <div class="form-group col-md-12"> 
                                <label for="text" style="color:#F76466;"><small>Escolha a quantidade de outras reclamada que será incluida no processo!</small></label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="reclamadas_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="reclamadas_2" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas uma outra reclamada">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
    </button>
    <button type="button" id="reclamadas_3" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas duas outras reclamadas" onClick="">
    							<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="reclamadas_4" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três outras outras reclamdas" onClick="">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span>
    </button>
                                </div>
     <script>
$(document).ready(function() {

    $("#reclamadas_none").click(function (){
		$("#segunda_reclamada").prop("hidden", true);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", true);
		
		$("#terceira_reclamada").prop("hidden", true);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", true);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", true);
	});

    $("#reclamadas_2").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", true);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", true);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", true);
	});
	
    $("#reclamadas_3").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", true);
	});
	
    $("#reclamadas_4").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", false);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", false);
	});
	
});

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
<fieldset id="segunda_reclamada" hidden="true">
<br>
                <div class="form-group col-md-3">
                <label for="text" style="color:#F76466;"><small>Segunda reclamada :</small></label>
                <label for="titulo">Razão Social</label>
                <input type="text" class="form-control" id="emp_segunta" name="emp_segunta" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Tipo de empresa</label>
                <select type="text" class="form-control" id="tipo_emp_segunda" name="tipo_emp_segunda" value="">
                <option value="juridica">juridica</option>
                <option value="fisica">fisica</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CNPJ 02ª</label>
                <input type="text" class="form-control" id="cnpj_segunda" name="cnpj_segunda" value="" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_segunda" name="cep_segunda" value="" maxlength="9" OnKeyPress="formatar('#####-###', this)">
<script type="text/javascript">


        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua_emp_segunda").val("");
                $("#bairro_emp_segunda").val("");
                $("#city_emp_segunda").val("");
                $("#uf_emp_segunda").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep_segunda").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua_emp_segunda").val("...");
                        $("#bairro_emp_segunda").val("...");
                        $("#city_emp_segunda").val("...");
                        $("#uf_emp_segunda").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua_emp_segunda").val(dados.logradouro);
                                $("#bairro_emp_segunda").val(dados.bairro);
                                $("#city_emp_segunda").val(dados.localidade);
                                $("#uf_emp_segunda").val(dados.uf);
								
                        $('#num_emp_segunda').focus();
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
                <div class="form-group col-md-3">
                <label for="titulo">Logradouro</label>
                <input type="text" class="form-control" id="rua_emp_segunda" name="rua_emp_segunda" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_segunda" name="num_emp_segunda" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_segunda" name="bairro_emp_segunda" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_segunda" name="city_emp_segunda" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_segunda" name="uf_emp_segunda" maxlength="2">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_segunda" name="comp_emp_segunda" value="">
                </div>
</fieldset>
<hr />               
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
                <input type="text" class="form-control" id="cnpj_terceira" name="cnpj_terceira" value="" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_terceira" name="cep_terceira" value="" maxlength="9" OnKeyPress="formatar('#####-###', this)">
<script type="text/javascript">


        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua_emp_terceira").val("");
                $("#bairro_emp_terceira").val("");
                $("#city_emp_terceira").val("");
                $("#uf_emp_terceira").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep_terceira").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua_emp_terceira").val("...");
                        $("#bairro_emp_terceira").val("...");
                        $("#city_emp_terceira").val("...");
                        $("#uf_emp_terceira").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua_emp_terceira").val(dados.logradouro);
                                $("#bairro_emp_terceira").val(dados.bairro);
                                $("#city_emp_terceira").val(dados.localidade);
                                $("#uf_emp_terceira").val(dados.uf);
								
                        $('#num_emp_terceira').focus();
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
                <div class="form-group col-md-3">
                <label for="titulo">Logradouro</label>
                <input type="text" class="form-control" id="rua_emp_terceira" name="rua_emp_terceira" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_terceira" name="num_emp_terceira" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_terceira" name="bairro_emp_terceira" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_terceira" name="city_emp_terceira" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_terceira" name="uf_emp_terceira" maxlength="2">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_terceira" name="comp_emp_terceira" value="">
                </div>
</fieldset>
<hr />                
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
                <input type="text" class="form-control" id="cnpj_quarta" name="cnpj_quarta" value="" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_quarta" name="cep_quarta" value="" maxlength="9" OnKeyPress="formatar('#####-###', this)">
<script type="text/javascript">


        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua_emp_quarta").val("");
                $("#bairro_emp_quarta").val("");
                $("#city_emp_quarta").val("");
                $("#uf_emp_quarta").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep_quarta").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua_emp_quarta").val("...");
                        $("#bairro_emp_quarta").val("...");
                        $("#city_emp_quarta").val("...");
                        $("#uf_emp_quarta").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua_emp_quarta").val(dados.logradouro);
                                $("#bairro_emp_quarta").val(dados.bairro);
                                $("#city_emp_quarta").val(dados.localidade);
                                $("#uf_emp_quarta").val(dados.uf);
								
                        $('#num_emp_quarta').focus();
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
                <div class="form-group col-md-3">
                <label for="titulo">Logradouro</label>
                <input type="text" class="form-control" id="rua_emp_quarta" name="rua_emp_quarta" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_quarta" name="num_emp_quarta" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_quarta" name="bairro_emp_quarta" value="">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_quarta" name="city_emp_quarta" value="">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_quarta" name="uf_emp_quarta" maxlength="2">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_quarta" name="comp_emp_quarta" value="">
                </div>
</fieldset>
</div>
</div>
<div class="tab-pane fade" id="aba9">
                                <div class="form-group col-md-12" id="text_obs_dano">
                <label for="text">Observações de dano moral: <span style="color:#F76466;">Max:. <span id="counts_txt_obs_dano">&nbsp;</span></span></label>
    <textarea class="form-control" id="obs_dano" name="obs_dano" rows="5" maxlength="1000" placeholder="Digite sua observação resumida em até 1000 caracteres..."></textarea>
                                </div>
    <script type="text/javascript">
var textobsadv = new Spry.Widget.ValidationTextarea("text_obs_dano", {maxChars:1000,counterType:"chars_remaining",counterId:"counts_txt_obs_dano", isRequired:false});
	</script>                            
</div>    
    </div>
                        </form>
<br><br><br><br><br><br><br><br><br><br>
		</div>
<script type="text/javascript" src="chosen/chosen.jquery.js"></script>
<script type="text/javascript">
var config = {
'.chosen-select'           : {},
'.chosen-select-deselect'  : {allow_single_deselect:true},
'.chosen-select-no-single' : {disable_search_threshold:10},
'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
'.chosen-select-width'     : {width:"95%"},
//'.chosen-results-scroll-up' : {up:"top"}
}
for (var selector in config) {
$(selector).chosen(config[selector]);
}
</script>
</body>
</html>
