
<div id="include">
<?php
include '../sessao/sessao.php';
include_once("../config.php");	
$oab   = $_SESSION['oab'];
$senha   = $_SESSION['senha'];
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Configuração < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="js/tag/dist/bootstrap-tagsinput.css">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/extenso.js"></script>

<script type="text/javascript" src="js/jquery.maskMoney.js"></script>
<script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
 
 <script>tinymce.init({ selector:'.textarea' });</script>
 <script src="js/cep_re2.js"></script>
 <script src="js/cep_re3.js"></script>
 <script src="js/cep_re4.js"></script>
 
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
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

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

//mascara de moeda
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

//calculos script
//calculo aviso previo


//ocultar e mostra div
function esconder(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}
//desabilitar div 
    function camp01() {
        sah1(document.getElementById("div1"));
    }
    function camp02() {
        sah1(document.getElementById("div2"));
    }
    function camp03() {
        sah1(document.getElementById("div3"));
    }
    function camp04() {
        sah1(document.getElementById("div4"));
    }
    function camp05() {
        sah1(document.getElementById("div5"));
    }
    function camp06() {
        sah1(document.getElementById("div6"));
    }
    function camp07() {
        sah1(document.getElementById("div7"));
    }
    function camp08() {
        sah1(document.getElementById("div8"));
    }    
	function camp08_1() {
        sah1(document.getElementById("div8_1"));
    }
    function camp09() {
        sah1(document.getElementById("div9"));
    }
    function camp10() {
        sah1(document.getElementById("div10"));
    }
    function camp11() {
        sah1(document.getElementById("div11"));
    }
    function camp12() {
        sah1(document.getElementById("div12"));
    }
    function camp13() {
        sah1(document.getElementById("div13"));
    }
    function camp14() {
        sah1(document.getElementById("div14"));
    }
    function camp15() {
        sah1(document.getElementById("div15"));
    }
    function camp16() {
        sah1(document.getElementById("div16"));
    }
    function camp17() {
        sah1(document.getElementById("div17"));
    }
    function camp18() {
        sah1(document.getElementById("div18"));
    }
    function camp22() {
        sah1(document.getElementById("div22"));
    }
	
	
//desabilitar input calculos
    function inp01() {
        sah1(document.getElementById("div_aviso_previo"));
    }
    function inp02() {
        sah1(document.getElementById("div_saldo_salario")); 
    }
    function inp03() {
        sah1(document.getElementById("div_ferias_01"));
    }
    function inp04() {
        sah1(document.getElementById("div_ferias_02"));
    }
    function inp05() {
        sah1(document.getElementById("div_ferias_03"));
    }
    function inp06() {
        sah1(document.getElementById("div_decimo_01"));
    }
    function inp06_2() {
        sah1(document.getElementById("div_decimo_02"));
    }
    function inp06_3() {
        sah1(document.getElementById("div_decimo_03"));
    }
    function inp06_4() {
        sah1(document.getElementById("div_decimo_04"));
    }
    function inp06_5() {
        sah1(document.getElementById("div_decimo_05"));
    }
    function inp07() {
        sah1(document.getElementById("div_desvio_01"));
    }
    function inp08() {
        sah1(document.getElementById("div_desvio_02"));
    }
    function inp09() {
        sah1(document.getElementById("domgo_feriado"));
    }
    function inp10() {
        sah1(document.getElementById("hrs_extras_01"));
    }
    function inp11() {
        sah1(document.getElementById("hrs_extras_02"));
    }
    function inp12() {
        sah1(document.getElementById("interval_01"));
    }
    function inp13() {
        sah1(document.getElementById("interval_02"));
    }
    function inp14() {
        sah1(document.getElementById("adc_periculo_01"));
    }
    function inp15() {
        sah1(document.getElementById("adc_periculo_02"));
    }
    function inp14_1() {
        sah1(document.getElementById("insalubre_01"));
    }
    function inp14_2() {
        sah1(document.getElementById("insalubre_02"));
    }
    function inp16() {
        sah1(document.getElementById("transfe_01"));
    }
    function inp17() {
        sah1(document.getElementById("transfe_02"));
    }
    function inp18() {
        sah1(document.getElementById("art_467_01"));
    }
    function inp19() {
        sah1(document.getElementById("vale_ref_01"));
    }
    function inp19_1() {
        sah1(document.getElementById("vale_ref_02"));
    }
    function inp20() {
        sah1(document.getElementById("desc_indevido_01"));
    }
    function inp21() {
        sah1(document.getElementById("dano_moral_01"));
    }
    function inp22() {
        sah1(document.getElementById("multa_477_01"));
    }
    function inp23() {
        sah1(document.getElementById("inss_01"));
    }
    function inp24() {
        sah1(document.getElementById("integracoes_01"));
    }
    function inp25() {
        sah1(document.getElementById("integracoes_02"));
    }
    function inp26() {
        sah1(document.getElementById("integracoes_03"));
    }
    function inp27() {
        sah1(document.getElementById("integracoes_04"));
    }
    function inp28() {
        sah1(document.getElementById("fgts_01"));
    }
    function inp29() {
        sah1(document.getElementById("fgts_02"));
    }
    function inp30() {
        sah1(document.getElementById("fgts_03"));
    }
    function inp31() {
        sah1(document.getElementById("fgts_04"));
    }
    function inp32() {
        sah1(document.getElementById("seg_desemprego_01"));
    }
    function inp33() {
        sah1(document.getElementById("plr_01"));
    }
	
//disable empresa subsidiaria
    function cc404off() {
        sah1(document.getElementById("cc404_total"));
    }
//função desabilitar
    function sah1(el) {
        try {
            el.disabled = el.disabled ? false : true;
        } catch (E) {}
        if (el.childNodes && el.childNodes.length > 0) {
            for (var x = 0; x < el.childNodes.length; x++) {
                sah1(el.childNodes[x]);
            }
        }
    }
	

//script a apurar / bloq input
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
		
// apurar input dos calculos
function mudarvalue1() {
 
        $('#av_apurar_inp01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar aviso prévio
function mudarvalue1_1() {
 
        $('#verb_apurar_inp03').each(function () {
            $(this).val("+ a apurar");
        });
    } //+ apurar valor total final
function mudarvalue2() {
 
        $('#dia_apurar_inp01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar dias tabalhados
function mudarvalue3() {
 
        $('#fr_apura_inp01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar ferias proporcional
function mudarvalue4() {
 
        $('#fr_apura_inp02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar ferias simples
function mudarvalue5() {
 
        $('#fr_apura_inp03').each(function () {
            $(this).val("a apurar");
        });
    } //apurar ferias em dobro
function mudarvalue6() {
 
        $('#dc_apura_inp01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar decimo inp 01
function mudarvalue6_2() {
 
        $('#dc_apura_inp02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar decimo inp 02
function mudarvalue6_3() {
 
        $('#dc_apura_inp03').each(function () {
            $(this).val("a apurar");
        });
    } //apurar decimo inp 03
function mudarvalue6_4() {
 
        $('#dc_apura_inp04').each(function () {
            $(this).val("a apurar");
        });
    } //apurar decimo inp 04
function mudarvalue6_5() {
 
        $('#dc_apura_inp05').each(function () {
            $(this).val("a apurar");
        });
    } //apurar decimo inp 05
function mudarvalue7() {
 
        $('#input_apura_desv').each(function () {
            $(this).val("a apurar");
        });
    } //apurar desvio acumulo de função inp 01
function mudarvalue8() {
 
        $('#input_apura_desvdsr').each(function () {
            $(this).val("a apurar");
        });
    } //apurar desvio acumulo de função inp 02
function mudarvalue9() {
 
        $('#input_apura_dmgo').each(function () {
            $(this).val("a apurar");
        });
    } //apurar domingo e feriados
function mudarvalue10() {
 
        $('#hrsext_apurar_inp01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar horas extras
function mudarvalue11() {
 
        $('#hrsext_apurar_inp02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar horas extras
function mudarvalue12() {
 
        $('#inter_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar intervalos
function mudarvalue13() {
 
        $('#inter_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar intervalos
function mudarvalue14() {
 
        $('#adc_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue15() {
 
        $('#adc_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade DSR
function mudarvalue14_1() {
 
        $('#insa_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue14_2() {
 
        $('#insa_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade DSR
function mudarvalue16() {
 
        $('#transfe_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue17() {
 
        $('#transfe_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue18() {
 
        $('#467_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue19() {
 
        $('#vr_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar vale refeição
function mudarvalue19_1() {
 
        $('#vr_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar cesta básica
function mudarvalue20() {
 
        $('#desc_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue21() {
 
        $('#danom_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue22() {
 
        $('#477_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue23() {
 
        $('#inss_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue24() {
 
        $('#inte_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar integração input 01
function mudarvalue25() {
 
        $('#inte_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar integração input 02
function mudarvalue26() {
 
        $('#inte_apurar_03').each(function () {
            $(this).val("a apurar");
        });
    } //apurar integração input 03
function mudarvalue27() {
 
        $('#inte_apurar_04').each(function () {
            $(this).val("a apurar");
        });
    } //apurar integração input 04
function mudarvalue28() {
 
        $('#fgts_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue29() {
 
        $('#fgts_apurar_02').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue30() {
 
        $('#fgts_apurar_03').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue31() {
 
        $('#fgts_apurar_04').each(function () {
            $(this).val("a apurar");
        });
    } //apurar adcional de periculosidade
function mudarvalue32() {
 
        $('#seg_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar seguro desemprego inp 01
function mudarvalue33() {
 
        $('#plr_apurar_01').each(function () {
            $(this).val("a apurar");
        });
    } //apurar PLR inp 01

// função limpar input
function av_limp_valinp01() {
 
        $('#val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor aviso
function av_limp_valinp02() {
 
        $('#av_apurar_inp01').each(function () {
            $(this).val("");
        });
    } //desable apurar valor aviso inp 02

function dia_limp_valinp01() {
 
        $('#val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor dias trabalhados
function dia_limp_valinp02() {
 
        $('#dia_apurar_inp01').each(function () {
            $(this).val("");
        });
    } //desable apurar valor dias trabalhados inp 02

function fr_limp_valinp01_01() {
 
        $('#fr_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor ferias proporcional
function fr_limp_valinp01_02() {
 
        $('#fr_apura_inp01').each(function () {
            $(this).val("");
        });
    } //desable apurar valor ferias proporcopnal inp 02

function fr_limp_valinp02_01() {
 
        $('#fr_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor ferias simples
function fr_limp_valinp02_02() {
 
        $('#fr_apura_inp02').each(function () {
            $(this).val("");
        });
    } //desable apurar valor ferias simples inp 02

function fr_limp_valinp03_01() {
 
        $('#fr_val_inp03').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor ferias em dobro
function fr_limp_valinp03_02() {
 
        $('#fr_apura_inp03').each(function () {
            $(this).val("");
        });
    } //desable apurar valor ferias em dobro inp 02

function dc_limp_valinp01_01() {
 
        $('#dc_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional 01
function dc_limp_valinp01_02() {
 
        $('#dc_apura_inp01').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02_01
	
function dc_limp_valinp02_01() {
 
        $('#dc_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional 02
function dc_limp_valinp02_02() {
 
        $('#dc_apura_inp02').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02_02

function dc_limp_valinp03_01() {
 
        $('#dc_val_inp03').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional 03
function dc_limp_valinp03_02() {
 
        $('#dc_apura_inp03').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02_03

function dc_limp_valinp04_01() {
 
        $('#dc_val_inp04').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional 04
function dc_limp_valinp04_02() {
 
        $('#dc_apura_inp04').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02_04

function dc_limp_valinp05_01() {
 
        $('#dc_val_inp05').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional 05
function dc_limp_valinp05_02() {
 
        $('#dc_apura_inp05').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02_05

function desv_limp_valinp01_01() {
 
        $('#input_val_desv').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional
function desv_limp_valinp01_02() {
 
        $('#input_apura_desv').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02

function desvdsr_limp_valinp02_01() {
 
        $('#input_val_desvdsr').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional
function desvdsr_limp_valinp02_02() {
 
        $('#input_apura_desvdsr').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02

function dmgo_limp_valinp01() {
 
        $('#input_val_dmgo').each(function () {
            $(this).val("0.00");
        });
    } //limpar apurar valor decimo terceiro proporcional
function dmgo_limp_valinp02() {
 
        $('#input_apura_dmgo').each(function () {
            $(this).val("");
        });
    } //desable apurar valor decimo terceiro proporcional inp 02

function hrsext_limp_valinp01() {
 
        $('#hr_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor horas extras
function hrsext_limp_apurainp01_1() {
 
        $('#hrsext_apurar_inp01').each(function () {
            $(this).val("");
        });
    } //limpar apurar horas extras

function hrsext_limp_valinp02() {
 
        $('#hr_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor horas extras
function hrsext_limp_apurainp02_1() {
 
        $('#hrsext_apurar_inp02').each(function () {
            $(this).val("");
        });
    } //limpar apurar horas extras

function inter_limp_valinp01() {
 
        $('#int_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor intervalos
function inter_limp_apurainp01_1() {
 
        $('#inter_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos
	
function inter_limp_valinp02() {
 
        $('#int_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor intervalos
function inter_limp_apurainp02_1() {
 
        $('#inter_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function adc_limp_valinp01() {
 
        $('#input_val_adcp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function adc_limp_apurainp01_1() {
 
        $('#adc_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function adc_limp_valinp02() {
 
        $('#input_val_adcp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function adc_limp_apurainp02_1() {
 
        $('#adc_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function insa_limp_valinp01() {
 
        $('#input_val_insa01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor insalubridade
function insa_limp_apurainp01_1() {
 
        $('#insa_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar insalubridade

function insa_limp_valinp02() {
 
        $('#input_val_insa02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor insalubridade
function insa_limp_apurainp02_1() {
 
        $('#insa_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar insalubridade

function transfe_limp_valinp01() {
 
        $('#input_val_transfe01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function transfe_limp_apurainp01_1() {
 
        $('#transfe_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function transfe_limp_valinp02() {
 
        $('#input_val_transfe02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function transfe_limp_apurainp02_1() {
 
        $('#transfe_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function art467_limp_valinp01() {
 
        $('#467_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function art467_limp_apurainp01_1() {
 
        $('#467_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function vr_limp_valinp01() {
 
        $('#vr_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Vale refeição
function vr_limp_apurainp01_1() {
 
        $('#vr_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar vale refeição
	
function vr_limp_valinp02() {
 
        $('#vr_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Cesta básica 
function vr_limp_apurainp02_1() {
 
        $('#vr_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar Cesta básica

function desc_limp_valinp01() {
 
        $('#desc_val_01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function desc_limp_apurainp01_1() {
 
        $('#desc_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function danom_limp_valinp01() {
 
        $('#danom_val_01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function danom_limp_apurainp01_1() {
 
        $('#danom_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function multa477_limp_valinp01() {
 
        $('#477_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function multa477_limp_apurainp01_1() {
 
        $('#477_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function inss_limp_valinp01() {
 
        $('#inss_val_01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function inss_limp_apurainp01_1() {
 
        $('#inss_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function inte_limp_valinp01() {
 
        $('#inte_val_inp01').each(function () {
            $(this).val("");
        });
    } //limpar valor Adicional de periculosidade 
function inte_limp_apurainp01_1() {
 
        $('#inte_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function inte_limp_valinp02() {
 
        $('#inte_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function inte_limp_apurainp02_1() {
 
        $('#inte_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function inte_limp_valinp03() {
 
        $('#inte_val_inp03').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function inte_limp_apurainp03_1() {
 
        $('#inte_apurar_03').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function inte_limp_valinp04() {
 
        $('#inte_val_inp04').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function inte_limp_apurainp04_1() {
 
        $('#inte_apurar_04').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function fgts_limp_valinp01() {
 
        $('#FGTS_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function fgts_limp_apurainp01_1() {
 
        $('#fgts_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function fgts_limp_valinp02() {
 
        $('#FGTS_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function fgts_limp_apurainp02_1() {
 
        $('#fgts_apurar_02').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function fgts_limp_valinp03() {
 
        $('#FGTS_val_inp03').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function fgts_limp_apurainp03_1() {
 
        $('#fgts_apurar_03').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function fgts_limp_valinp04() {
 
        $('#FGTS_val_inp04').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function fgts_limp_apurainp04_1() {
 
        $('#fgts_apurar_04').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function seg_limp_valinp01() {
 
        $('#seg_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function seg_limp_apurainp01_1() {
 
        $('#seg_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

function plr_limp_valinp01() {
 
        $('#plr_val_inp01').each(function () {
            $(this).val("0.00");
        });
    } //limpar valor Adicional de periculosidade 
function plr_limp_apurainp01_1() {
 
        $('#plr_apurar_01').each(function () {
            $(this).val("");
        });
    } //limpar apurar intervalos

// verbas liguidas totais
function cc404_limp() {
 
        $('#404_val_inp02').each(function () {
            $(this).val("0.00");
        });
    } //desable +apurar valor total final
function limparvarinp03() {
 
        $('#verb_apurar_inp03').each(function () {
            $(this).val("");
        });
    } //desable +apurar valor total final
//script horario do computador
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
//extensor de valores
</script>
<style type="text/css">
select[readonly] {
  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
  pointer-events: none;
  touch-action: none;
}	 
.btn_1 span.glyphicon {    			
	opacity: 0;				
}
.btn_1.active span.glyphicon {				
	opacity: 1;				
}
</style>
</head>
<body onLoad="dateatual()">
<?php include 'menu_nav.php'; ?>
<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>BUSCA DE CLIENTES</h1>
		</header>	
		<br>
		<div class="row">
			<div class="form-group col-md-6 col-md-offset-3">
			    <input type="text" class="form-control" id="busca" placeholder="CPF DO RECLAMANTE" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
            </div>
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Dados do Cliente abaixo</h2>
		</header>
		<br>
		<div class="row" id="page-content">
        <br>
        <br>
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Inicial</li>
</ol>
         		  <form action="inicial_etapa2.php" name="testeform" target="_parent" method="post">
				<p>
                   <button type="submit" name="views" id="views" class="btn btn-primary" OnClick="valida_form();valida_form1()">
                   <!-- document.testeform.action='inicial_etapa2.php';document.testeform.submit('_parent'); -->
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Proxima etapa
                   </button>
<script type="text/javascript">
function valida_form()
{
	
if (document.getElementById("busca").value == "")
{
alert("Nenhum reclamante foi selecionado informe um CPF");
$('#mytabs a[href="#tab1"]').tab('show');
return false;
}
	
if (document.testeform.adc_noite_vl.value == "")
{
alert("Verifique as informações na aba (Horario e outros->Valor adc. noturno) o campo não foi preenchido!");
$('#mytabs a[href="#tab4"]').tab('show');
return false;
}

if (document.testeform.VT_valor.value == "")
{
alert("Verifique as informações na aba (Benefícios->VT) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}

if (document.testeform.cesta_valor.value == "")
{
alert("Verifique as informações na aba (Benefícios->Cesta basica) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}

if (document.testeform.VR_valor.value == "")
{
alert("Verifique as informações na aba (Benefícios->VR) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}
	
if (document.testeform.VA_valor.value == "")
{
alert("Verifique as informações na aba (Benefícios->VA) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}
	
if (document.testeform.plr_valor.value == "")
{
alert("Verifique as informações na aba (Benefícios->PLR) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}

if (document.testeform.salario_fam.value == "")
{
alert("Verifique as informações na aba (Benefícios->Valor S.familia) o campo não foi preenchido!");
$('#mytabs a[href="#tab5"]').tab('show');
return false;
}
	
if (document.testeform.reaj_salbs2.value == "")
{
alert("Verifique as informações na aba (Reajuste salárial->Reajuste Base) o campo não foi preenchido!");
$('#mytabs a[href="#tab18"]').tab('show');
return false;
}
	
}
</script>                   
               </p>
                <br>
<div class="tabbable tabs-left"> 
    <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs" id="mytabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Reclamante Informações</a></li>
    <li><a href="#tab2" data-toggle="tab">Reclamada Informações</a></li>
    <li><a href="#tab3" data-toggle="tab">Informações do Cargo</a></li>
    <li><a href="#tab4" data-toggle="tab">Horarios e outros</a></li>
	<li role="presentation" class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Informações <span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
				<li><a href="#tab5" data-toggle="tab">Benefícios</a></li>
				<li><a href="#tab13" data-toggle="tab">Paradigmas</a></li>
				<li><a href="#tab14" data-toggle="tab">Outras Funções</a></li>
				<li><a href="#tab12" data-toggle="tab">Reclamadas</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#aba7" data-toggle="tab">Observações</a></li>
		</ul>
	</li>
	<li role="presentation" class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configurações <span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
				<li><a href="#tab15" data-toggle="tab">Dano moral</a></li>
				<li><a href="#tab16" data-toggle="tab">Adicional de Periculosidade</a></li>
				<li><a href="#tab17" data-toggle="tab">Adicional de Insalubridade</a></li>
				<li><a href="#tab18" data-toggle="tab">Reajuste Salárial</a></li>
				<li><a href="#tab19" data-toggle="tab">Vigência</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="#tab20" data-toggle="tab">Resumo Pleiteia</a></li>
		</ul>
	</li>
	<li role="presentation" class="dropdown">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		<span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Calculos <span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
				<li><a href="#tab6" data-toggle="tab">verbas recisórias</a></li>
				<li role="separator" class="divider"></li>
		</ul>
	</li>    
    </ul>
    <br>
    <div class="tab-content">
    <div class="tab-pane fade in active" id="tab1">
    <br>
                       	<div class="form-group col-md-3">
                            <label for="titulo">Nome completo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Sexo</label>
                            <select type="text" class="form-control" id="sexo01" name="sexo01" required disabled>
                                <option value="o" selected>-- Masculino --</option>
                                <option value="a">-- Feminino --</option>
                            </select>                                                  
                        </div>
                        	<div hidden="true">
                            <div class="form-group col-md-2">
                                    <label class="sexo-letras">Sexo02</label>
                                    <select class="form-control" id="sex_singular" name="sex_singular" required>
										<option value="o" selected>o</option>
										<option value="a">a</option>
                                    </select>
                            </div>                            
                            <div class="form-group col-md-2">
                                    <label class="sexo-letras">Sexo03</label>
                                    <select class="form-control" id="sex_or" name="sex_or">
										<option value="" selected></option>
										<option value="a" >a</option>
                                    </select>
                            </div>
<script type="text/javascript">
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
</script>
                            </div>  <!-- input hidden -->                                          
                        <div class="form-group col-md-2">
                            <label for="titulo">Nacionalidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required="required">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Estado civil <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="estadocivil" name="estadocivil">
                            	<option value="" selected>selecionar</option>
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
                            <input type="text" class="form-control" id="nome_cargo" name="nome_cargo" required="required" value="<?php print $nome_cargo ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Dia <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> N..</small></label>
                            <select type="text" class="form-control" id="nasc_dia" name="nasc_dia">
                                <option value="1" selected>01</option>
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
                            <select type="text" class="form-control" id="nasc_mes" name="nasc_mes">
                            	<option value="" selected>selecionar</option>
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
                            <select type="text" class="form-control" id="nasc_ano" name="nasc_ano">
                            <option value="" selected>selecionar</option>
                            <option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">RG <span class="glyphicon glyphicon-asterisk icocads"></span></label>
       <input type="text" class="form-control" id="rg_num" name="rg_num" OnKeyPress="formatar('##.###.###-#', this)" required="required" value="">
                        </div>  
                        <div class="form-group col-md-1">
                            <label for="titulo">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="rg_origem" name="rg_origem" required>
									<option value="" selected>selecionar</option>
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
                                    <option value="MT">MT</option> 
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
                            <input type="text" class="form-control" id="rg_data_exp" name="rg_data_exp" maxlength="10" OnKeyPress="formatar('##/##/####', this)") required>
                        </div>
                        <div class="form-group col-md-2 has-error">
                            <label for="text">CPF/MF <span class="glyphicon glyphicon-asterisk icocads"></span> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Não é possivel realizar alteração do CPF após o reclamante ser cadastrado"></span></label>
<input type="text" class="form-control" id="cliente_cpf_num" name="cliente_cpf_num" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required="required" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_compra">Nome da Mãe <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_mae" name="nome_mae">
                        </div>                            
                        <div class="form-group col-md-2" id="div_pai">
                            <label for="valor_venda">Nome do Pai</span></label>
                            <input type="text" class="form-control" id="nome_pai" name="nome_pai">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Pai</label>
                            <br>
                        <label class="switch" data-toggle="tooltip" data-placement="top" title="Desativar/Ativar o registro de pai">
                        <input type="checkbox" checked id="check_pai" name="check_pai[]" value="e de">
                        <div class="slider round"></div>
                        </label>
                        <div class="div_pai_on" hidden="true">
                            <input type="text" class="form-control" id="on_pai" name="on_pai" value="">
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
                div.hidden = false;
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
                            <label for="valor_venda">CTPS|Estado</label><!-- option fazer -->
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
                <input type="text" class="form-control" id="cliente_cep" name="cliente_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)" required value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="titulo">Endereço <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_rua" name="end_rua" required="required" value="">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="text">Nº <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_numero" name="end_numero" required="required" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_compra">Bairro</label>
                            <input type="text" class="form-control" id="end_bairro" name="end_bairro" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_venda">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_cidade" name="end_cidade" required="required" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data_cadastro">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="end_uf" name="end_uf" required>
									<option value="">selecionar</option>
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
                                    <option value="MT">MT</option> 
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
                        <div class="form-group col-md-3">
                                <label for="status">Complemento</label>
                                <input type="text" class="form-control" id="end_complemento" name="end_complemento" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="titulo">Comarca Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<select type="text" class="form-control" id="comarca_city" name="comarca_city" required>
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
    <input type="text" class="form-control" id="cli_cel" name="cli_cel" maxlength="13" OnKeyPress="formatar('## #####-####', this)" required="required" value="">
                        </div>
                        <div class="form-group col-md-2">
        <label for="text">Telefone Fixo</label>
        <input type="text" class="form-control" id="cli_tel" name="cli_tel" maxlength="12" OnKeyPress="formatar('## ####-####', this)" value="">
                        </div>                                
    </div><!-- tab informações reclamante -->
    <div class="tab-pane fade" id="tab2">
    <br>
                                <div class="form-group col-md-4">
                                    <label for="titulo">Nome da Empresa</label>
                                    <input type="text" class="form-control" id="nome_emp" name="nome_emp" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Tipo de empresa</label>
               						<select type="date" class="form-control" id="emp_tipo" name="emp_tipo" readonly>
                                    	<option value="" selected></option>
                                    	<option value="jurídica">-- Empresa Juridica --</option>
                                    	<option value="física">-- Pessoa Fisica --</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">CNPJ/CPF</label>
    <input type="text" class="form-control" id="cnpj_cpf" name="cnpj_cpf" maxlength="18" placeholder="Ex. 00.000.000/0001-00 ou 000.000.000-37" readonly>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">Rua/Avenida</label>
                                    <input type="text" class="form-control" id="emp_rua" name="emp_rua" readonly>                                              
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="exampleInputPassword1">Nº</label>
                                    <input type="text" class="form-control" id="emp_num" name="emp_num" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="valor_compra">Bairro</label>
                                    <input type="text" class="form-control" id="emp_bairro" name="emp_bairro" readonly>                                
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="valor_venda">Cidade</label>
                                    <input type="text" class="form-control" id="emp_city" name="emp_city" readonly>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="status">UF</label>
                                    <input type="text" class="form-control" id="emp_uf" name="emp_uf" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="data_cadastro">Complemento</label>
                                    <input type="text" class="form-control" id="emp_comp" name="emp_comp" readonly>
                                </div>  
                 				<div class="form-group col-md-2">
                                    <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="emp_cep" name="emp_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)" readonly>
                                </div>
                 				<div class="form-group col-md-2">
                                    <label for="titulo">Telefone</label>
                <input type="text" class="form-control" id="emp_tel" name="emp_tel" maxlength="12" OnKeyPress="formatar('## ####-####', this)" readonly>
                                </div>
    </div><!-- tab reclamada informações -->
  	<div class="tab-pane fade" id="tab3">
    <br>
                                <div class="form-group col-md-2">
                <label for="text">Salario <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="tel" class="form-control salario" id="salario" name="salario" onkeyup="soma()" onKeyPress="return(MascaraMoeda(this,'','.',event))" required="required" value="0.00">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor por fora <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<input type="tel" class="form-control" id="valor_fora" name="valor_fora" onkeyup="soma()" onKeyPress="return(MascaraMoeda(this,'','.',event))" required="required" value="0.00">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Remuneração total <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                <input type="text" class="form-control remu_total" id="remu_total" name="remu_total" onKeyPress="return(MascaraMoeda(this,'','.',event))" required value="0.00">
                                </div>
<script type="text/javascript">
//faz calculo automatico salario + por fora
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
    return parseFloat( money )*100;
}
function soma()
{
    var total = getMoney('salario')+getMoney('valor_fora');
    id('remu_total').value = ''+ String(total/100).formatMoney();
}
function getMoney( el ){
    var money = id( el ).value ? id( el ).value.replace( ',', '.' ) : 0;
    return parseFloat( money )*100;
}
</script>
                                <div class="form-group col-md-2">
								<label for="text">Data entrada</label>
<div class="input-group">
 <input type="text" class="form-control" id="data_ent" name="data_ent" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
      <span class="input-group-btn">
<button class="btn btn-default" id="btn_dregmesano1" type="button">OK!</button>
      </span>
</div><!-- /input-group -->		
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data registro</label>
<input type="text" class="form-control" id="data_reg" name="data_reg" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data saida</label>
   <div class="input-group">
<input type="text" class="form-control" id="data_saida" name="data_saida" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
      <span class="input-group-btn">
<button class="btn btn-default" id="btn_dregmesano2" type="button">OK!</button>
      </span>
    </div><!-- /input-group -->		
                                </div>
					<div id="myModal_dregmesano" class="modal_dregmesano">
						<div class="modal-content-dregmesano">
							<span class="close_dregmesano">&times;</span>
<STYLE type=TEXT/CSS>
*, html, body {margin:0;padding:0;}
.adslot_1{width:300px;height:250px;float:none;}/*320 100   */
@media (min-width:500px) {.adslot_1 {width:468px;height:60px;float:right;}}
@media (min-width:800px) {.adslot_1 {width:728px;height:90px;float:right;}}
.adslot_4 {display:inline-block;width:300px;height:250px;float:right;}
@media (min-width:768px) {.adslot_4{display:none;float:right;}}
.adslot_5 {display:inline-block;width:300px;height:250px;float:right;}
@media (min-width:500px) {.adslot_5{width:300px;height:250px;float:right;}}
@media (min-width:768px) {.adslot_5{display:none;float:right;}}
.normalp {
	FONT-WEIGHT: normal; FONT-SIZE: 10pt; COLOR: #6c0806; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalp:link {
	FONT-WEIGHT: normal; FONT-SIZE: 10pt; COLOR: #6c0806; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalp:visited {
	FONT-SIZE: 10pt; COLOR: #6c0806; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalp:active {
	FONT-WEIGHT: normal; FONT-SIZE: 10pt; COLOR: #6c0806; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalp:hover {
	FONT-WEIGHT: normal; FONT-SIZE: 10pt; COLOR: #6c0806; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalPA {
	FONT-WEIGHT: normal; FONT-SIZE: 7pt; COLOR: #707070; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalPA:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 7pt; COLOR: #707070; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalPA:link {
	FONT-WEIGHT: normal; FONT-SIZE: 7pt; COLOR: #707070; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalPA:visited {
	FONT-SIZE: 7pt; COLOR: #707070; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalPA:active {
	FONT-WEIGHT: normal; FONT-SIZE: 7pt; COLOR: #707070; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normal {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normal:link {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normal:visited {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normal:active {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normal:hover {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalObs {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #cc0000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalObs:link {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #cc0000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalObs:visited {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #cc0000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalObs:active {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #cc0000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalObs:hover {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #cc0000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalB {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalB:link {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalB:visited {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalB:active {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalB:hover {
	FONT-WEIGHT: bold;
	FONT-SIZE: 8pt;
	COLOR: #000000;
	FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif;
	TEXT-DECORATION: underline;
	text-align: right;
}
.normalAB {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #002266; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalAB:link {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #002266; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAB:visited {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #002266; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAB:active {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #002266; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAB:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #002266; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalBB {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalBB:link {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalBB:visited {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalBB:active {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalBB:hover {
	FONT-WEIGHT: bold; FONT-SIZE: 8pt; COLOR: #ffffff; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
.normalAL {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #335599; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif
}
.normalAL:link {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #335599; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAL:visited {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #335599; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAL:active {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #335599; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: none
}
.normalAL:hover {
	FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #335599; FONT-FAMILY: Verdana, Arial, Helvetica,  sans-serif; TEXT-DECORATION: underline
}
</STYLE>
          <div align="left">
            <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0">
              <TBODY>
                <TR>
                  <TD width="1%" height="240">&nbsp;</TD>
                  <TD width="0%" class="normal">
                  <div align="right">
                  </div>
                  </TD>
                  <TD width="99%" valign="top" class="normal">
                      <div align="left">
                         <FONT class="normalB">Período trabalhado</FONT><BR>
                          <BR>
                      </div>                      
                      <TABLE width="102%" height="237" border="0" cellPadding="0" cellSpacing="0">
                        <TBODY>
                          <TR>
                            <TD width="54%" height="237">
                              <TABLE cellSpacing="0" cellPadding="0" width="99%" border="0">
                              <TBODY>
                                <TR>
                                  <TD class="normal" vAlign="top" width="2%"><B>&nbsp;</B></TD>
                                  <TD class="normal" vAlign="top" width="31%">
                                   Data do início da relação de trabalho:
                                  </TD>
                                  <TD class="normal" vAlign="top" align="right" width="67%">
                                  <div align="left">
<select style="FONT-WEIGHT:normal;FONT-SIZE:8pt;COLOR:#000000;FONT-FAMILY:arial;BACKGROUND-COLOR:#f0f0f0" name="data_ent_d" id="data_ent_d" readOnly>
                                      <option value="" selected>00</option>
                                      <option value="00">00</option>
                                      <option value="01">01</option>
                                      <option value="02">02</option>
                                      <option value="03">03</option>
                                      <option value="04">04</option>
                                      <option value="05">05</option>
                                      <option value="06">06</option>
                                      <option value="07">07</option>
                                      <option value="08">08</option>
                                      <option value="09">09</option>
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
                                    -
<select style="FONT-WEIGHT:normal;FONT-SIZE:8pt;COLOR:#000000;FONT-FAMILY:arial;BACKGROUND-COLOR:#f0f0f0" name="data_ent_m" id="data_ent_m" readOnly>
                                      <OPTION value="" selected>00</OPTION>
                                      <OPTION value="00">00</OPTION>
                                      <OPTION value="01">01</OPTION>
                                      <OPTION value="02">02</OPTION>
                                      <OPTION value="03">03</OPTION>
                                      <OPTION value="04">04</OPTION>
                                      <OPTION value="05">05</OPTION>
                                      <OPTION value="06">06</OPTION>
                                      <OPTION value="07">07</OPTION>
                                      <OPTION value="08">08</OPTION>
                                      <OPTION value="09">09</OPTION>
                                      <OPTION value="10">10</OPTION>
                                      <OPTION value="11">11</OPTION>
                                      <OPTION value="12">12</OPTION>
</select>
                                    -
<select style="FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: arial; BACKGROUND-COLOR: #f0f0f0" name="data_ent_y" id="data_ent_y" readOnly>
					  <OPTION value="" selected>0000</OPTION>
					  <OPTION value="0000">0000</OPTION>
					  <OPTION value="1960">1960</OPTION>
					  <OPTION value="1961">1961</OPTION>
					  <OPTION value="1962">1962</OPTION>
					  <OPTION value="1963">1963</OPTION>
					  <OPTION value="1964">1964</OPTION>
					  <OPTION value="1965">1965</OPTION>
					  <OPTION value="1966">1966</OPTION>
					  <OPTION value="1967">1967</OPTION>
					  <OPTION value="1968">1968</OPTION>
					  <OPTION value="1969">1969</OPTION>
					  <OPTION value="1970">1970</OPTION>
					  <OPTION value="1971">1971</OPTION>
					  <OPTION value="1972">1972</OPTION>
					  <OPTION value="1973">1973</OPTION>
					  <OPTION value="1974">1974</OPTION>
					  <OPTION value="1975">1975</OPTION>
					  <OPTION value="1976">1976</OPTION>
					  <OPTION value="1977">1977</OPTION>
					  <OPTION value="1978">1978</OPTION>
					  <OPTION value="1979">1979</OPTION>
					  <OPTION value="1980">1980</OPTION>
					  <OPTION value="1981">1981</OPTION>
					  <OPTION value="1982">1982</OPTION>
					  <OPTION value="1983">1983</OPTION>
					  <OPTION value="1984">1984</OPTION>
					  <OPTION value="1985">1985</OPTION>
					  <OPTION value="1986">1986</OPTION>
					  <OPTION value="1987">1987</OPTION>
					  <OPTION value="1988">1988</OPTION>
					  <OPTION value="1989">1989</OPTION>
					  <OPTION value="1990">1990</OPTION>
					  <OPTION value="1991">1991</OPTION>
					  <OPTION value="1992">1992</OPTION>
					  <OPTION value="1993">1993</OPTION>
					  <OPTION value="1994">1994</OPTION>
					  <OPTION value="1995">1995</OPTION>
					  <OPTION value="1996">1996</OPTION>
					  <OPTION value="1997">1997</OPTION>
					  <OPTION value="1998">1998</OPTION>
					  <OPTION value="1999">1999</OPTION>
					  <OPTION value="2000">2000</OPTION>
					  <OPTION value="2001">2001</OPTION>
					  <OPTION value="2002">2002</OPTION>
					  <OPTION value="2003">2003</OPTION>
					  <OPTION value="2004">2004</OPTION>
					  <OPTION value="2005">2005</OPTION>
					  <OPTION value="2006">2006</OPTION>
					  <OPTION value="2007">2007</OPTION>
					  <OPTION value="2008">2008</OPTION>
					  <OPTION value="2009">2009</OPTION>
					  <OPTION value="2010">2010</OPTION> 
					  <OPTION value="2011">2011</OPTION> 
					  <OPTION value="2012">2012</OPTION> 
					  <OPTION value="2013">2013</OPTION>             
					  <OPTION value="2014">2014</OPTION>                         
					  <OPTION value="2015">2015</OPTION>
					  <OPTION value="2016">2016</OPTION>      
					  <OPTION value="2017">2017</OPTION>                    
					  <OPTION value="2017">2018</OPTION>                    
					  <OPTION value="2017">2019</OPTION>                    
</select>
                                  </div>
                                  </TD>
                                </TR>
                              </TBODY>
                            </TABLE>
                              <table cellspacing=0 cellpadding=0 width="99%" border="0">
                                <tbody>
                                  <tr height=1>
                                    <td width="3%" bgcolor="#ffffff"></td>
                                    <td width="85%" bgcolor="#e0e0e0"></td>
                                    <td width="12%" bgcolor="#ffffff"></td>
                                  </tr>
                                </tbody>
                              </table>                              
                              <BR>
                              <TABLE cellSpacing="0" cellPadding=0 width="99%" border="0">
                                <TBODY>
                                  <TR>
                                    <TD class="normal" vAlign="top" width="2%"><B>&nbsp;</B></TD>
                                    <TD class="normal" vAlign="top" width="31%">
                                     Data do final da relação de trabalho:
                                    </TD>
                                    <TD class="normal" vAlign="top" align="right" width="67%">
                                     <div align="left">
<select style="FONT-WEIGHT:normal;FONT-SIZE:8pt;COLOR:#000000;FONT-FAMILY:arial;BACKGROUND-COLOR:#f0f0f0" name="data_saida_d" id="data_saida_d" readOnly>
                                        <OPTION value="" selected>00</OPTION>
                                        <OPTION value="00">00</OPTION>
                                        <OPTION value="01">01</OPTION>
                                        <OPTION value="02">02</OPTION>
                                        <OPTION value="03">03</OPTION>
                                        <OPTION value="04">04</OPTION>
                                        <OPTION value="05">05</OPTION>
                                        <OPTION value="06">06</OPTION>
                                        <OPTION value="07">07</OPTION>
                                        <OPTION value="08">08</OPTION>
                                        <OPTION value="09">09</OPTION>
                                        <OPTION value="10">10</OPTION>
                                        <OPTION value="11">11</OPTION>
                                        <OPTION value="12">12</OPTION>
                                        <OPTION value="13">13</OPTION>
                                        <OPTION value="14">14</OPTION>
                                        <OPTION value="15">15</OPTION>
                                        <OPTION value="16">16</OPTION>
                                        <OPTION value="17">17</OPTION>
                                        <OPTION value="18">18</OPTION>
                                        <OPTION value="19">19</OPTION>
                                        <OPTION value="20">20</OPTION>
                                        <OPTION value="21">21</OPTION>
                                        <OPTION value="22">22</OPTION>
                                        <OPTION value="23">23</OPTION>
                                        <OPTION value="24">24</OPTION>
                                        <OPTION value="25">25</OPTION>
                                        <OPTION value="26">26</OPTION>
                                        <OPTION value="27">27</OPTION>
                                        <OPTION value="28">28</OPTION>
                                        <OPTION value="29">29</OPTION>
                                        <OPTION value="30">30</OPTION>
                                        <OPTION value="31">31</OPTION>
</select>
                                      -
<select style="FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: arial; BACKGROUND-COLOR: #f0f0f0;" name="data_saida_m" id="data_saida_m" readOnly>
                                        <OPTION value="" selected>00</OPTION>
                                        <OPTION value="00">00</OPTION>
                                        <OPTION value="01">01</OPTION>
                                        <OPTION value="02">02</OPTION>
                                        <OPTION value="03">03</OPTION>
                                        <OPTION value="04">04</OPTION>
                                        <OPTION value="05">05</OPTION>
                                        <OPTION value="06">06</OPTION>
                                        <OPTION value="07">07</OPTION>
                                        <OPTION value="08">08</OPTION>
                                        <OPTION value="09">09</OPTION>
                                        <OPTION value="10">10</OPTION>
                                        <OPTION value="11">11</OPTION>
                                        <OPTION value="12">12</OPTION>
</select>
                                      -
<select style="FONT-WEIGHT: normal; FONT-SIZE: 8pt; COLOR: #000000; FONT-FAMILY: arial; BACKGROUND-COLOR: #f0f0f0" name="data_saida_y" id="data_saida_y" readOnly>
                                        <OPTION value="" selected>0000</OPTION>
                                        <OPTION value="0000">0000</OPTION>
									    <OPTION value="1960">1960</OPTION>
									    <OPTION value="1961">1961</OPTION>
									    <OPTION value="1962">1962</OPTION>
									    <OPTION value="1963">1963</OPTION>
									    <OPTION value="1964">1964</OPTION>
									    <OPTION value="1965">1965</OPTION>
									    <OPTION value="1966">1966</OPTION>
									    <OPTION value="1967">1967</OPTION>
									    <OPTION value="1968">1968</OPTION>
									    <OPTION value="1969">1969</OPTION>
									    <OPTION value="1970">1970</OPTION>
									    <OPTION value="1971">1971</OPTION>
									    <OPTION value="1972">1972</OPTION>
									    <OPTION value="1973">1973</OPTION>
									    <OPTION value="1974">1974</OPTION>
									    <OPTION value="1975">1975</OPTION>
									    <OPTION value="1976">1976</OPTION>
									    <OPTION value="1977">1977</OPTION>
									    <OPTION value="1978">1978</OPTION>
									    <OPTION value="1979">1979</OPTION>
                                        <OPTION value="1980">1980</OPTION>
                                        <OPTION value="1981">1981</OPTION>
                                        <OPTION value="1982">1982</OPTION>
                                        <OPTION value="1983">1983</OPTION>
                                        <OPTION value="1984">1984</OPTION>
                                        <OPTION value="1985">1985</OPTION>
                                        <OPTION value="1986">1986</OPTION>
                                        <OPTION value="1987">1987</OPTION>
                                        <OPTION value="1988">1988</OPTION>
                                        <OPTION value="1989">1989</OPTION>
                                        <OPTION value="1990">1990</OPTION>
                                        <OPTION value="1991">1991</OPTION>
                                        <OPTION value="1992">1992</OPTION>
                                        <OPTION value="1993">1993</OPTION>
                                        <OPTION value="1994">1994</OPTION>
                                        <OPTION value="1995">1995</OPTION>
                                        <OPTION value="1996">1996</OPTION>
                                        <OPTION value="1997">1997</OPTION>
                                        <OPTION value="1998">1998</OPTION>
                                        <OPTION value="1999">1999</OPTION>
                                        <OPTION value="2000">2000</OPTION>
                                        <OPTION value="2001">2001</OPTION>
                                        <OPTION value="2002">2002</OPTION>
                                        <OPTION value="2003">2003</OPTION>
                                        <OPTION value="2004">2004</OPTION>
                                        <OPTION value="2005">2005</OPTION>
                                        <OPTION value="2006">2006</OPTION>
                                        <OPTION value="2007">2007</OPTION>
                                        <OPTION value="2008">2008</OPTION>
                                        <OPTION value="2009">2009</OPTION>						  
                                        <OPTION value="2010">2010</OPTION>
                                        <OPTION value="2011">2011</OPTION>
                                        <OPTION value="2012">2012</OPTION>	
                                        <OPTION value="2013">2013</OPTION>
									    <OPTION value="2014">2014</OPTION>  		  						  		  
                                        <OPTION value="2015">2015</OPTION>
										<OPTION value="2016">2016</OPTION>      
										<OPTION value="2017">2017</OPTION>		  
										<OPTION value="2017">2018</OPTION>		  
										<OPTION value="2017">2019</OPTION>		  
</select>
                                     </div>
                                    </TD>
                                  </TR>
                                </TBODY>
                              </TABLE>
                              <TABLE cellSpacing="0" cellPadding="0" width="100%" border="0">
                                <TBODY>
                                  <TR>
                                    <TD width="1%" height="34" vAlign="top" class="normal">
                                   <B>&nbsp;</B>
                                    </TD>
                                    <TD class="normal" vAlign="top" width="67%">&nbsp;</TD>
                                    <TD class="normal" vAlign="bottom" align="right" width="16%">
                                     <div align="center">
<input class="btn btn-primary btn-lg" type="button" value="Calcular" name="calcular_mesestrab" id="calcular_mesestrab">
                                     </div>
                                    </TD>
                                    <TD width="16%" align="right" vAlign="bottom" class="normal">&nbsp;</TD>
                                  </TR>
                                </TBODY>
                              </TABLE>
                              <table cellspacing="0" cellpadding="0" width="100%" border="0">
                                <tbody>
                                  <tr>
                                    <td colspan="4" valign="top" bgcolor="#FBFBFB" class="normal">&nbsp;</td>
                                  </tr>
                                  <tr>
                                  <td colspan="4" valign="top" bgcolor="#FBFBFB" class="normal">
                                  <font class="normalB" style="text-align: right">
                                  <b><font color="#FF0000" size="2">
                                <div class="form-group col-md-3">
                <label for="text">Dias totais</label>
				<input type="text" class="form-control" name="dias_trabalhados" id="dias_trabalhados" value="0">
							    </div> 
                                  </font></b>
                                  </font>
                                  <font class="normalB" style="text-align: right">
                                  <b><font color="#FF0000" size="2">
                                <div class="form-group col-md-3">
                <label for="text">Meses totais</label>
			    <input type="text" class="form-control" name="meses_trabalhados" id="meses_trabalhados" value="0">
							    </div>
                                  </font></b>
                                  </font>
                                  <font class="normalB" style="text-align: right">
                                  <b><font color="#FF0000" size="2">
                                <div class="form-group col-md-3">
                <label for="text">Anos totais</label>
			    <input type="text" class="form-control" name="anos_trabalhados" id="anos_trabalhados" value="0">
							    </div>
                                  </font></b>
                                  </font>                                  
                                  </td>                                  
                                  </td>
                                  </tr>
                                  <tr>
                                    <td width="12%" height="61" rowspan="2" align="right" valign="top" bgcolor="#FBFBFB" class="normal">
                                    <div align="left">
                                    </div>
                                    </td>
                                    <td colspan="2" align="right" valign="top" bgcolor="#FBFBFB" class="normal">&nbsp;
                                    
                                    </td>
                                    <td width="36%" rowspan="2" align="right" valign="top" bgcolor="#FBFBFB" class="normal">&nbsp;
                                    
                                    </td>
                                    <td width="16%" rowspan="2" align=right valign=top bgcolor="#FBFBFB" class="normal">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="7" colspan="2" align="right" valign="top" bgcolor="#FBFBFB" class="normal"></td>
                                  </tr>
                                </tbody>
                              </table>                              
                           	</TD>
                          </TR>
                        </TBODY>
                       </TABLE>
                  </TD>
                </TR>
              </TBODY>
            </TABLE>
          </div>
<script type="text/javascript">
var dt1plo = function(id){ return document.getElementById(id); }
dt1plo("data_ent").onblur = function(){
//separar dia mes e ano - entrada
var dt1 = dt1plo("data_ent").value;

var dt2 = dt1.split('/');

var dt1plo_day = dt2[0];
var dt1plo_month = dt2[1];
var dt1plo_year = dt2[2];	
	
var dt_1 = dt1plo_day;
dt1plo("data_ent_d").value = dt_1;
var dt_2 = dt1plo_month;
dt1plo("data_ent_m").value = dt_2;
var dt_3 = dt1plo_year;
dt1plo("data_ent_y").value = dt_3;
//calculo meses trabalhados	- entrada
var data_ent = dt1plo("data_ent").value;
var data_saida = dt1plo("data_saida").value;

var formula = 1000 * 60 * 60  * 24 * 30;
var formula1 = 1000 * 60 * 60  * 24;
var formula2 = 1000 * 60 * 60  * 24 * 30 * 12;

var nova1 = data_ent.toString().split('/');
Nova1 = nova1[1]+"/"+nova1[0]+"/"+nova1[2];

var nova2 = data_saida.toString().split('/');
Nova2 = nova2[1]+"/"+nova2[0]+"/"+nova2[2];

d1 = new Date(Nova1)
d2 = new Date(Nova2)

days_passed = Math.round((d2.getTime() - d1.getTime()) / formula);		
var ms3cal = days_passed;
if (ms3cal < 0){
ms3cal = ms3cal * -1;
};
days_passed1 = Math.round((d2.getTime() - d1.getTime()) / formula1);		
var ms4cal = days_passed1;
if (ms4cal < 0){
ms4cal = ms4cal * -1;
};
days_passed2 = Math.round((d2.getTime() - d1.getTime()) / formula2);		
var ms5cal = days_passed2;
if (ms5cal < 0){
ms5cal = ms5cal * -1;
};
var ms = ms3cal;
if (isNaN(ms)) ms = ("dia invalido");
dt1plo("meses_trabalhados").value = ms;
var ms1 = ms4cal;
if (isNaN(ms1)) ms1 = ("mês invalido");
dt1plo("dias_trabalhados").value = ms1;
var ms2 = ms5cal;
if (isNaN(ms2)) ms2 = ("ano invalido");
dt1plo("anos_trabalhados").value = ms2;
} 

//separar dia mes e ano - saida
var dt2plo = function(id){ return document.getElementById(id); }
dt2plo("data_saida").onblur = function(){
  var dt1 = dt2plo("data_saida").value;

var dt2 = dt1.split('/');

var dt1plo_day = dt2[0];
var dt1plo_month = dt2[1];
var dt1plo_year = dt2[2];	
	
var dt_1 = dt1plo_day;
dt2plo("data_saida_d").value = dt_1;
var dt_2 = dt1plo_month;
dt2plo("data_saida_m").value = dt_2;
var dt_3 = dt1plo_year;
dt2plo("data_saida_y").value = dt_3;
//separar dia mes e ano "saida" --- and ----	
//calculo meses trabalhados	- saida
var data_ent = dt2plo("data_ent").value;
var data_saida = dt2plo("data_saida").value;

var formula = 1000 * 60 * 60  * 24 * 30;
var formula1 = 1000 * 60 * 60  * 24;
var formula2 = 1000 * 60 * 60  * 24 * 30 * 12;

var nova1 = data_ent.toString().split('/');
Nova1 = nova1[1]+"/"+nova1[0]+"/"+nova1[2];

var nova2 = data_saida.toString().split('/');
Nova2 = nova2[1]+"/"+nova2[0]+"/"+nova2[2];

d1 = new Date(Nova1)
d2 = new Date(Nova2)

days_passed = Math.round((d2.getTime() - d1.getTime()) / formula);		
var ms3cal = days_passed;
if (ms3cal < 0){
ms3cal = ms3cal * -1;
};
days_passed1 = Math.round((d2.getTime() - d1.getTime()) / formula1);		
var ms4cal = days_passed1;
if (ms4cal < 0){
ms4cal = ms4cal * -1;
};
days_passed2 = Math.round((d2.getTime() - d1.getTime()) / formula2);		
var ms5cal = days_passed2;
if (ms5cal < 0){
ms5cal = ms5cal * -1;
};
var ms = ms3cal;
if (isNaN(ms)) ms = ("dia invalido");
dt2plo("meses_trabalhados").value = ms;
var ms1 = ms4cal;
if (isNaN(ms1)) ms1 = ("mês invalido");
dt2plo("dias_trabalhados").value = ms1;
var ms2 = ms5cal;
if (isNaN(ms2)) ms2 = ("ano invalido");
dt2plo("anos_trabalhados").value = ms2;
	
} 
</script>
                            <div> 
<script type="text/javascript">
var meses = function(id){ return document.getElementById(id); }
meses("calcular_mesestrab").onclick = function(){
  var data_ent = meses("data_ent").value;
  var data_saida = meses("data_saida").value;

  var formula = 1000 * 60 * 60  * 24 * 30;
  var formula1 = 1000 * 60 * 60  * 24;
  var formula2 = 1000 * 60 * 60  * 24 * 30 * 12;
	
var nova1 = data_ent.toString().split('/');
Nova1 = nova1[1]+"/"+nova1[0]+"/"+nova1[2];

var nova2 = data_saida.toString().split('/');
Nova2 = nova2[1]+"/"+nova2[0]+"/"+nova2[2];

d1 = new Date(Nova1)
d2 = new Date(Nova2)

days_passed = Math.round((d2.getTime() - d1.getTime()) / formula);	
days_passed1 = Math.round((d2.getTime() - d1.getTime()) / formula1);		
days_passed2 = Math.round((d2.getTime() - d1.getTime()) / formula2);		
  var ms3cal = days_passed;
	if (ms3cal < 0){
		ms3cal = ms3cal * -1;
	};
  var ms4cal = days_passed1;
	if (ms4cal < 0){
		ms4cal = ms4cal * -1;
	};
  var ms5cal = days_passed2;
	if (ms5cal < 0){
		ms5cal = ms5cal * -1;
	};	
	
	var ms = ms3cal;
	 if (isNaN(ms)) ms = ("mês invalido");
 meses("meses_trabalhados").value = ms;
 meses("desv_mes_input01").value = ms;
 meses("mes_input_desvdsr").value = ms;
 meses("input_mes_dmgo").value = ms;
 meses("hr_inp01").value = ms;
 meses("hr_inp02").value = ms;
 meses("int_inp01").value = ms;
 meses("int_inp02").value = ms;
 meses("adcp_mes_inp01").value = ms;
 meses("adcp_mes_inp02").value = ms;
 meses("insa_mes_inp01").value = ms;
 meses("insa_mes_inp02").value = ms;
 meses("trans_mes_inp01").value = ms;
 meses("trans_mes_inp02").value = ms;
 meses("467_mes_disabled_inp01").value = ms;
 meses("plr_mes_inp01").value = ms;
 meses("vr_mes_inp01").value = ms;
 meses("vr_mes_inp02").value = ms;
 meses("seg_mes_inp01").value = ms;
	
	var ms1 = ms4cal;
	 if (isNaN(ms1)) ms1 = ("dia invalido");
 meses("dias_trabalhados").value = ms1;	
	
	var ms2 = ms5cal;
	 if (isNaN(ms2)) ms2 = ("ano invalido");
 meses("anos_trabalhados").value = ms2;	} //calculo dias, meses, anos trabalhados
</script>
							</div>
						</div>
					</div>
<script type="text/javascript">
// Get the modal
var modal_dregmesano = document.getElementById('myModal_dregmesano');

// Get the button that opens the modal
var btn = document.getElementById("btn_dregmesano1");
var btn2 = document.getElementById("btn_dregmesano2");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_dregmesano")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal_dregmesano.style.display = "block";
}
btn2.onclick = function() {
    modal_dregmesano.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal_dregmesano.style.display = "none";
}
</script>                                
<style type="text/css">
/* The Modal (background) */
.modal_dregmesano {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 99; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content-dregmesano {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	height: 80%;
}

/* The Close Button */
.close_dregmesano {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close_dregmesano:hover,
.close_dregmesano:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>                                
                                <div class="form-group col-md-3">
                <label for="text">Teve aviso previo</label>
                <select type="text" class="form-control" id="receb_aviso_previo" name="receb_aviso_previo">
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data do aviso</label>
                <input type="text" class="form-control" id="aviso_data" name="aviso_data" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do aviso previo</label>
                <input type="text" class="form-control" id="inic_aviso_previo" name="inic_aviso_previo" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cumprio aviso prévio?</label>
                <select type="text" class="form-control" id="cump_aviso_previo" name="cump_aviso_previo">
                <option value="não">-------- NÃO --------</option>
                <option value="sim">-------- SIM --------</option>
                <option value="parcial">-------- PARCIAL --------</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Reduziu aviso Prévio</label>
                <select type="text" class="form-control" id="aviso_reducao" name="aviso_reducao">
                <option value="não">---- NÃO ----</option>
                <option value="07 dias">---- 07 dias ----</option>
                <option value="02 horas">---- 02 horas ----</option>
                <option value="outros">---- Outros ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor do aviso</label>
                <input type="text" class="form-control" id="aviso_valor" name="aviso_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text" class="transparente">Local de Homologação</label>
                                <div class="dropup" data-toggle="tooltip" data-placement="right" title="Escolha a forma de homologação feita pela reclamada!">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
<script type="text/javascript">
$(document).ready(function() {

    $("#nao_homo").click(function (){
                // desabilita o campo 
		$("#data_homo").prop("disabled",  true);
		$("#div_data_homo").prop("hidden",  false);
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
                                <div class="form-group col-md-3 has-error" class="div_homologador">
                <label for="text">Local da Homolocação</label>
			<input type="text" class="form-control" id="qm_homo" name="qm_homo" value="" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_data_homo">
                <label for="text">Data da Homologação</label>
                <input type="text" class="form-control" id="data_homo" name="data_homo" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text" class="transparente">Recebeu na quitação</label>
                                <div class="dropup" data-toggle="tooltip" data-placement="left" title="A reclamada pagou o reclamante com o TRCT?">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                
<script type="text/javascript">
$(document).ready(function() {

    $("#nao_quita").click(function (){
                // desabilita o campo 
		$("#homo_valor").prop("disabled",  true);
		$("#data_quita").prop("disabled",  false);
		$("#div_homo_valor").prop("hidden",  false);
		$("#div_data_quita").prop("hidden",  false);
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
                                <div class="form-group col-md-4 has-error" id="div_homo_valor">
                <label for="text">Recebeu na quitação</label>
                <input type="text" class="form-control" id="recebeu_homo" name="recebeu_homo" value="" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_homo_valor">
                <label for="text">Valor da quitação</label>
                <input type="text" class="form-control" id="homo_valor" name="homo_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data da quitação</label>
                <input type="text" class="form-control" id="data_quita" name="data_quita" maxlength="10" OnKeyPress="formatar('##/##/####', this)" value="">
                                </div>
    </div><!-- tab informações do cargo -->
  	<div class="tab-pane fade" id="tab4">
<link href="css/jquery.datepick.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="js/jquery.datepick.pack.js"></script>

<script type="text/javascript">
		
$(document).ready(function() {
    $('#msgs').html('').show();
    $("input", $('.inputLine:first')).val("00");
    $("input:last", $('.inputLine:first')).val("00:00");
    var lineHtml = $('.inputLine:first').html();
    $("#rate").focus(function() {
        if ($(this).val() == "enter here") {
            $(this).val("")
        }
    }).blur(function() {
        if ($(this).val() == "") {
            $(this).val("enter here")
        } else {
            $(this).val(parseFloat($(this).val()).toFixed(2))
        }
        $("#calculate").click()
    });
    $('.rows span').click(function() {
        var currentLines = $(".inputLine").length;
        var toLines = $(this).attr("rel");
        if (currentLines <= toLines) {
            var diffLines = toLines - currentLines;
            var thisLine = [];
            if ($(this).attr('rell') != 'w') {
                for (var i = 0; i < diffLines; i++) {
                    thisLine.push("<tr class='inputLine hrs_table'>" + lineHtml + "</tr>")
                }
            } else {
                for (var i = 0; i < diffLines; i++) {
                    thisLine.push('<table cellspacing="2" cellpadding="0" class="table inputLine">' + lineHtml + '</table>')
                }
            }
            $("#enter_time .lineTarget").append(thisLine.join(''))
        } else {
            var diffLines = currentLines - toLines;
            for (var i = 0; i < diffLines; i++) {
                $(".inputLine:last").remove()
            }
        }
        $(".listNum").each(function(i) {
            $(this).html(i + 2 + 'ª');
		});
		//jquery para dar um ID a div das horas e minutos
		$(".hrs_table").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_table');
		});		
		//jquery para dar um ID as input de horas e minutos entrada
		$(".hrs_ent").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_ent');
			$(this).prop('name', i + 1 + 'hrs_ent');
		});
		$(".min_ent").each(function(i) {
			$(this).prop('id', i + 1 + 'min_ent');
			$(this).prop('name', i + 1 + 'min_ent');
		});		
		//jquery para dar um ID as input de horas e minutos saida intervalo
		$(".hrs_int_e").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_int_e');
			$(this).prop('name', i + 1 + 'hrs_int_e');
		});
		$(".min_int_e").each(function(i) {
			$(this).prop('id', i + 1 + 'min_int_e');
			$(this).prop('name', i + 1 + 'min_int_e');
		});		
		//jquery para dar um ID as input de horas e minutos retorno intervalo
		$(".hrs_int_s").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_int_s');
			$(this).prop('name', i + 1 + 'hrs_int_s');
		});
		$(".min_int_s").each(function(i) {
			$(this).prop('id', i + 1 + 'min_int_s');
			$(this).prop('name', i + 1 + 'min_int_s');
		});				
		//jquery para dar um ID as input de horas e minutos saida
		$(".hrs_saida").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_saida' + 2);
			$(this).prop('name', i + 1 + 'hrs_saida' + 2);
		});
		$(".min_saida").each(function(i) {
			$(this).prop('id', i + 1 + 'min_saida' + 2);
			$(this).prop('name', i + 1 + 'min_saida' + 2);
		});			
		//jquery para dar um ID a input do total de horas trabalhada no dia
		$(".hrs_dia").each(function(i) {
			$(this).prop('id', i + 1 + 'hrs_dia' + 2);
			$(this).prop('name', i + 1 + 'hrs_dia' + 2);
		});						
		
        $(".inputLine input.yellow_inputbox").click(function() {
            if (parseInt($(this).val(), 10) == 0) {
                $(this).val("")
            }
        }).blur(function() {
            if (parseInt($(this).val(), 10) > 0) {
                if ($(this).attr("class").indexOf("hour") != -1 && parseInt($(this).val(), 10) > 24) {
                    $(this).val(00)
                } else if ($(this).attr("class").indexOf("minute") != -1 && parseInt($(this).val(), 10) > 60) {
                    $(this).val(60)
                } else {
                    if ($(this).val() == 0) {
                        $(this).val("00")
                    } else if (parseInt($(this).val(), 10) < 10) {
                        $(this).val("0" + parseInt($(this).val(), 10))
                    }
                }
            } else {
                $(this).val("00")
            }
            $("#calculate").click()
        });
        $("select").blur(function() {
            $("#calculate").click()
        });
        $(".listfield").keydown(function(e) {
            if (e.keyCode == 9) {
                var inputs = $(".listfield");
                var idx = inputs.index(this);
                if (idx == inputs.length - 1) {} else {
                    var thisElement = inputs[idx + 1];
                    if ($(thisElement).attr("class").indexOf("gray_input") != -1) {
                        thisElement = inputs[idx + 2];
                        if ($(thisElement).attr("class").indexOf("gray_input") != -1) {
                            thisElement = inputs[idx + 3]
                        }
                    }
                    $(thisElement).focus();
                    $(thisElement).select()
                }
                return false
            }
        })
    });
    $(".rows span:first").click();
    $("#calculate").click(function() {
        var sh = 0;
        var sm = 0;
        var eh = 0;
        var em = 0;
        var totalDiff = 0;
        $(".inputLine").each(function(i) {
            var thisLine = $(this);
            var diffMin = 0;
            var sh = parseInt($(".yellow_inputbox:eq(0)", this).val(), 10);
            var sm = parseInt($(".yellow_inputbox:eq(1)", this).val(), 10);
            var eh = parseInt($(".yellow_inputbox:eq(2)", this).val(), 10);
            var em = parseInt($(".yellow_inputbox:eq(3)", this).val(), 10);
			
            var ssh = parseInt($(".yellow_inputbox:eq(4)", this).val(), 10);
            var ssm = parseInt($(".yellow_inputbox:eq(5)", this).val(), 10);
            var eeh = parseInt($(".yellow_inputbox:eq(6)", this).val(), 10);
            var eem = parseInt($(".yellow_inputbox:eq(7)", this).val(), 10);
            if ((sh > 0 && eh > 0)) {
                var time1 = parseInt(sh * 60 + sm, 10);
                var time2 = parseInt(eh * 60 + em, 10);
                if (time1 < time2) {
                    diffMin += parseInt(time2 - time1, 10)
                } else {
                    diffMin += parseInt(24 * 60 - parseInt(time1 - time2, 10), 10)
                }
            }
            if (ssh > 0 && eeh > 0) {
                var time1 = parseInt(ssh * 60 + ssm, 10);
                var time2 = parseInt(eeh * 60 + eem, 10);
                if (time1 < time2) {
                    diffMin += parseInt(time2 - time1, 10)
                } else {
                    diffMin += parseInt(24 * 60 - parseInt(time1 - time2, 10), 10)
                }
            }
            if (diffMin > 0) {
                totalDiff = parseInt(totalDiff + diffMin, 10);
                var newHour = parseInt(diffMin / 60, 10);
                var newMin = parseInt(diffMin % 60, 10);
                if (newHour < 10) {
                    newHour = "0" + newHour
                }
                if (newMin < 10) {
                    newMin = "0" + newMin
                }
                $(".gray_inputbox", this).val(newHour + ":" + newMin)
            }
        });
        var totalHour = parseInt(totalDiff / 60, 10);
        var totalMin = parseInt(totalDiff % 60, 10);
        if (totalHour < 10) {
            totalHour = "0" + totalHour
        }
        if (totalMin < 10) {
            totalMin = "0" + totalMin
        }
        $("#total").val(totalHour + ":" + totalMin);
        if (parseFloat($("#rate").val()) > 0) {
            $("#totalPay").val((totalDiff / 60 * parseFloat($("#rate").val())).toFixed(2))
        } else {
            $("#totalPay").val("0")
        }
    });

});
</script>
<style type="text/css">

/* CSS Document */

.wrap {
	width:885px;
	margin:0px auto;
}

.left {
	background:url(../images/form_bgleft.jpg) repeat-y left;
}
.right {
	background:url(../images/form_bgright.jpg) repeat-y right;
	padding-left:8px;
	overflow:hidden;
	position: relative;
}
#msgs {
	color: red;
	position: absolute;
	right: 15px;
	top: 5px;
	display: none;
	font-size: 12px;
	font-weight: bold;
}
.start {
	margin-top:5px;
}
.inputbox {
	width:60px;
	height:21px;
	line-height:21px;
}
.yellow_inputbox {
	border:1px solid #666;
	background:#fff;
	color: #000;
	font-size: 14px;
	text-align: center;
}
option {
	color: #000;
}
.selectbox {
	width:48px;
	padding:2px;
	border:1px solid #666;
	background:#fff;
	border-radius:2px;
}
.lineTarget {
	width: 95%;
	background:url(../images/table-color-bg.png) no-repeat left bottom;
	margin:0 auto 5px;
}
.lineTarget th span{
	padding:5px;
}
.lineTarget td {
	line-height: 20px;
}
.gray_inputbox {
	border:1px solid #fc3;
	background:#666;
	width: 58px;
	text-align: center;
	font-size: 14px;
	color: #fff;
}
.listNum {
	background: url(../images/list_bg.gif) no-repeat center top;
	width:27px;
	text-align:center;
	color:#000;
	height:20px;
}
.totals {
	text-align:left;
	margin:3px 0px;
}
.enter {
	width:67px;
	height:21px;
	line-height:21px;
}
.support {
	text-align:center;
	margin-right:5px;
}
.grand {
	width:21px;
}

#enter_time {
	margin: 3px 0 0;
	/*width: 290px;
	overflow-y: scroll;*/
}


#msg {
	color: red;
	font: bold 12px  verdana;
}
#email {
	width: 130px;
	*width: 115px;
}
#outBox {
	position: relative;
}
#emailBox {
	position: absolute;
	top: -75px;
	
	right: 5px;
	
	background: #111;
	border: 1px solid #111;
	display: none;
	width: 292px;
	height: 75px;
}
#emailBox input, #emailBox textarea {
	border: 1px solid #000;
}
#emailBox textarea {
	width: 200px;
	height: 58px;
	*height: 48px;
}
.submitSendEmail, .cancelSend {
	font-size: 12px;
}
.emailButtons {
	text-align:center;
}
#printArea {
	/*text-align: center;*/
}
.weekof{
	font-size:12px;
	font-weight:bold;
	margin:15px 5px 10px;
}
.weekof input{
	width:20px;
	text-align:center;
}
div.btn{
	background: url(../images/btn-bg.png) no-repeat center top;
	width:98px;
	height:33px;
	line-height:33px;
	text-align:center;
}
</style>
 
  <div class="wrap">
		  <div id="printArea">
	          <div id="enter_time">
	            <table cellspacing="0" cellpadding="0" class="lineTarget" align="center">
	              <tr height="35" valign="middle">
					  <th></th>
					  <th align="left"><span class="label label-warning">Entrada</span></th>
					  <th align="left"><span class="label label-danger">Inicio-intervalo</span></th>
					  <th align="center">
						<span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Em casos de não ter intervalo, coloque o horario estimado de intervalo nos dois campos repetidamente Ex. 12:00 - 12:00"></span>
					  </th>
					  <th align="left"><span class="label label-danger">Fim-intervalo</span></th>
					  <th align="left"><span class="label label-warning">Saída</span></th>
	              </tr>
	              <tr class="inputLine hrs_table" id="">
	                <td><div class="listNum">1</div></td>
	                <td width="20%" height="32" valign="center">
<input type="text" class="listfield inputbox yellow_inputbox hour hrs_ent" id="" name="" value="00" maxlength="2" /> :
<input type="text" class="listfield inputbox yellow_inputbox minute min_ent" id="" name="" value="00" maxlength="2" />
	                </td>
	                <td width="20%" valign="center">
<input type="text" class="listfield inputbox yellow_inputbox hour hrs_int_e" id="" name="" value="00" maxlength="2"> :
<input type="text" class="listfield inputbox yellow_inputbox minute min_int_e" id="" name="" value="00" maxlength="2" >
	                </td>
				    <td width="10%"></td>
	                <td width="20%" valign="center">
<input type="text" class="listfield inputbox yellow_inputbox hour hrs_int_s" id="" name="" value="00" maxlength="2"> :
<input type="text" class="listfield inputbox yellow_inputbox minute min_int_s" id="" name="" value="00" maxlength="2" >
	                </td>
	                <td width="20%" valign="center">
<input type="text" class="listfield inputbox yellow_inputbox hour hrs_saida" id="" name="" value="00" maxlength="2" > :
<input type="text" class="listfield inputbox yellow_inputbox minute min_saida" id="" name="" value="00" maxlength="2" >
					</td>
	                <td width="4%">=</td>
	                <td width="8%">
<input type="text" class="listfield inputbox gray_inputbox hrs_dia" id="" name="" value="00:00" readonly />
	                </td>
	              </tr>
	            </table>
	          </div>
	          <div class="rows" style="margin-left: 22%;"><span rel="7"></span>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Segunda</small></label><br>
					<small><input type="checkbox" class="form-control" checked id="hrsbox_seg" name="hrsbox_seg" value="seg"></small>
					<script type="text/javascript">
    $("#hrsbox_seg").click(function (){
			$("#1hrs_table").toggle(500);	
		
            var input = document.getElementById("1hrs_ent");
			var input1 = document.getElementById('1min_ent');
			var input2 = document.getElementById('1hrs_int_e');
			var input3 = document.getElementById('1min_int_e');
			var input4 = document.getElementById('1hrs_int_s');
			var input5 = document.getElementById('1min_int_s');
			var input6 = document.getElementById('1hrs_saida2');
			var input7 = document.getElementById('1min_saida2');
		//disabled input's up
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};		
		
});
					</script>
				</div>				
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Terça</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_ter" name="hrsbox_ter" value="ter">
					<script type="text/javascript">
    $("#hrsbox_ter").click(function (){
			$("#2hrs_table").toggle(500);	
		
            var input = document.getElementById("2hrs_ent");
			var input1 = document.getElementById('2min_ent');
			var input2 = document.getElementById('2hrs_int_e');
			var input3 = document.getElementById('2min_int_e');
			var input4 = document.getElementById('2hrs_int_s');
			var input5 = document.getElementById('2min_int_s');
			var input6 = document.getElementById('2hrs_saida2');
			var input7 = document.getElementById('2min_saida2');
		
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};		
	});
					</script>
				</div>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Quarta</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_qua" name="hrsbox_qua" value="qua">
					<script type="text/javascript">
    $("#hrsbox_qua").click(function (){
			$("#3hrs_table").toggle(500);	
		
            var input = document.getElementById("3hrs_ent");
			var input1 = document.getElementById('3min_ent');
			var input2 = document.getElementById('3hrs_int_e');
			var input3 = document.getElementById('3min_int_e');
			var input4 = document.getElementById('3hrs_int_s');
			var input5 = document.getElementById('3min_int_s');
			var input6 = document.getElementById('3hrs_saida2');
			var input7 = document.getElementById('3min_saida2');
		
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};				

	});
					</script>
				</div>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Quinta</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_qui" name="hrsbox_qui" value="qui">
					<script type="text/javascript">
    $("#hrsbox_qui").click(function (){
			$("#4hrs_table").toggle(500);	
		
            var input = document.getElementById("4hrs_ent");
			var input1 = document.getElementById('4min_ent');
			var input2 = document.getElementById('4hrs_int_e');
			var input3 = document.getElementById('4min_int_e');
			var input4 = document.getElementById('4hrs_int_s');
			var input5 = document.getElementById('4min_int_s');
			var input6 = document.getElementById('4hrs_saida2');
			var input7 = document.getElementById('4min_saida2');

            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};				
	});
					</script>
				</div>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Sexta</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_sex" name="hrsbox_sex" value="sex">
					<script type="text/javascript">
    $("#hrsbox_sex").click(function (){
			$("#5hrs_table").toggle(500);	
		
            var input = document.getElementById("5hrs_ent");
			var input1 = document.getElementById('5min_ent');
			var input2 = document.getElementById('5hrs_int_e');
			var input3 = document.getElementById('5min_int_e');
			var input4 = document.getElementById('5hrs_int_s');
			var input5 = document.getElementById('5min_int_s');
			var input6 = document.getElementById('5hrs_saida2');
			var input7 = document.getElementById('5min_saida2');		
		
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};				

	});
					</script>
				</div>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Sábado</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_sab" name="hrsbox_sab" value="sab">
					<script type="text/javascript">
    $("#hrsbox_sab").click(function (){
			$("#6hrs_table").toggle(500);	
		
            var input = document.getElementById("6hrs_ent");
			var input1 = document.getElementById('6min_ent');
			var input2 = document.getElementById('6hrs_int_e');
			var input3 = document.getElementById('6min_int_e');
			var input4 = document.getElementById('6hrs_int_s');
			var input5 = document.getElementById('6min_int_s');
			var input6 = document.getElementById('6hrs_saida2');
			var input7 = document.getElementById('6min_saida2');		
		
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};	
		
	});
					</script>
				</div>
				<div class="col-xs-1 col-md-1">
					<label for="text"><small>Domingo</small></label><br>
					<input type="checkbox" class="form-control" checked id="hrsbox_dom" name="hrsbox_dom" value="dom">
					<script type="text/javascript">
    $("#hrsbox_dom").click(function (){
			$("#7hrs_table").toggle(500);	

            var input = document.getElementById("7hrs_ent");
			var input1 = document.getElementById('7min_ent');
			var input2 = document.getElementById('7hrs_int_e');
			var input3 = document.getElementById('7min_int_e');
			var input4 = document.getElementById('7hrs_int_s');
			var input5 = document.getElementById('7min_int_s');
			var input6 = document.getElementById('7hrs_saida2');
			var input7 = document.getElementById('7min_saida2');		
		
            if(input.disabled){input.disabled = false;}else{input.disabled = true;};
            if(input1.disabled){input1.disabled = false;}else{input1.disabled = true;};		
            if(input2.disabled){input2.disabled = false;}else{input2.disabled = true;};		
            if(input3.disabled){input3.disabled = false;}else{input3.disabled = true;};
			if(input4.disabled){input4.disabled = false;}else{input4.disabled = true;};		
            if(input5.disabled){input5.disabled = false;}else{input5.disabled = true;};		
            if(input6.disabled){input6.disabled = false;}else{input6.disabled = true;};		
            if(input7.disabled){input7.disabled = false;}else{input7.disabled = true;};	

	});
					</script>
				</div>
         	  	<div class="col-xs-3 col-md-3">
         	  		<label for="text"><small>Escala de trabalho</small></label>
					<select type="text" class="form-control" id="escala_trab" name="escala_trab">
						<option value="" selected>outros</option>
						<option value="5x1">5x1 - 24 dias mês</option>
						<option value="6x1">6x1 - 24 dias mês</option>
						<option value="5x2">5x2 - 20 dias mês</option> 
						<option value="12x36">12x36 - 15 dias mês</option> 
						<option value="18x32">18x32 - 15 dias mês</option> 
						<option value="24x48">24x48 - 12 dias mês</option> 
					</select>         	  				
         	  	</div>
          	  </div>
	          <div class="totals"><img src="images/see-your-totals.gif" /></div>
	          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
	            <tr>
	              <td width="20%" height="35px" align="right"><span class="label label-info">Horas mensais</span></td>
	              <td width="4%"></td>
	              <td><input type="text" class="listfield enter gray_inputbox" value="00:00" id="total" name="total" val="0" readonly /></td>
					<td>&nbsp;</td>
	              <td align="center"><span class="badge badge-important">R$</span></td>
	              <td><input type="text" class="listfield enter yellow_inputbox" id="rate" name="rate" value="0.00" onkeypress="return(MascaraMoeda(this,'','.',event))" /></td>
	              <td width="5%" >&nbsp;</td>
	              <td align="center">
			<button class="btn btn-small btn-primary" type="button" style="cursor:pointer;" id="calculate">calcular</button>
	              </td>
	              <td align="center"></td>
	              <td>&nbsp;</td>
	            </tr>
	            <tr>
	              <td align="right"><span class="label label-info">Salário total</span></td>
	              <td align="center"><span class="badge badge-important">R$</span></td>
	              <td><input type="text" class="listfield enter gray_inputbox" value="0.00" id="totalPay" name="totalPay" val="0" readonly /></td>
	              <td>&nbsp;</td>
	              <td align="center"><span class="badge badge-important">Horas extas</span></td>
	              <td>
				  <script type="text/javascript">
					  
    var jext = function(id){ return document.getElementById(id); }
    jext("calculate").onclick = function(){
      var jex1 = jext("remu_total").value;
      var jex2 = jext("ext_porcento").value;
      var jex4 = jext("jornada_trab").value;
		
	  var jexl = parseFloat(jex1)/parseFloat(jex4);
	  var jex2l = parseFloat(jexl)/100*parseFloat(jex2)+parseFloat(jexl);
	  
	  	  var jjex = jex2l.toFixed(2).replace(",",".");
		 if (isNaN(jjex)) jjex = 0.00;
     jext("rate").value = jjex;
	}//calculo valor horas extras
	
				  </script>
					<select type="text" class="listfield enter gray_inputbox" id="ext_porcento" name="ext_porcento">
						<option value="0">0%</option>
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
	              </td>
	              <td align="right"><span class="label label-info">Jornada mensal</span></td>
	              <td align="center">
					<select name="jornada_trab" id="jornada_trab" class="listfield gray_inputbox">
						<option value="150">150 horas</option>
						<option value="180">180 horas</option>
						<option value="200">200 horas</option>
						<option selected="selected" value="220">220 horas</option>
					</select>
	              </td>
                </tr>
	          </table>
		  </div>
    <div>
		<img src="images/form_bottom.jpg" border="0" />
    </div>
  </div>
    
    </div><!-- tab horario e outros -->
  	<div class="tab-pane fade" id="tab5">
    <br>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu VT</label>
                <select type="text" class="form-control validate_aba5" id="receb_VT" name="receb_VT">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VT: valor diario</label>
                <input type="text" class="form-control" id="VT_valor" name="VT_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
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
<input type="text" class="form-control" id="cesta_valor" name="cesta_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
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
                <label for="text">Recebeu VA</label>
                <select type="text" class="form-control" id="recebe_VA" name="recebe_VA">
                <option value="">selecionar</option>
                <option value="não">---- NÃO ----</option>
                <option value="sim">---- SIM ----</option>
                <option value="parcial">---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VR: valor ao dia</label>
                <input type="text" class="form-control" id="VR_valor" name="VR_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VA: valor ao dia</label>
                <input type="text" class="form-control" id="VA_valor" name="VA_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
                                </div>
                                <div class="form-group col-md-2">
				<label for="text" class="transparente"><small>Recebeu 13º</small></label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se o reclamante recebeu os décimos 13º salários dos ultimos anos trabalhados.">
                                <button type="button" class="btn btn-danger" id="decimo13_config"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Décimo 13º</button>
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="13_sim" href="#aba2">Foi pago</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="13_nao" href="#aba2">Não foi pago</a></li>
                                <li><a id="13_part" href="#aba2">Pago parcialmente</a></li>
                                </ul>
                                </div>
<script type="text/javascript">
$(document).ready(function() {

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
		$("#dec_data").prop("disabled", false);
		$("#dec_data2").prop("disabled", false);
		$("#dec_data3").prop("disabled", false);
		$("#dec_data4").prop("disabled", false);
		$("#dec_data5").prop("disabled", false);
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
						<div id="myModal_decimo" class="modal_decimo">
							<div id="13_descdiv" class="modal-content-decimo">
                               <span class="close_decimo">&times;</span>
                                <div class="form-group col-md-2 has-error">
								<label for="text"><small>Recebeu 13º</small></label>
                <input type="text" class="form-control" id="receb_dec" name="receb_dec" value="" readonly>
								</div>
                                <div class="form-group col-md-3">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data" name="dec_data" value="">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data2" name="dec_data2" value="">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data3" name="dec_data3" value="">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data4" name="dec_data4" value="">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data5" name="dec_data5" value="">
                                </div>
							</div>
					    </div>
                                <div class="form-group col-md-2">
								<label for="text" class="transparente"><small>Gozou férias</small></label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se o reclamante recebeu as ferias no periodo de trabalho.">
                                <button type="button" class="btn btn-danger" id="ferias_config"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Férias</button>
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="ferias_sim" href="#aba2">Sim completa</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="ferias_nao" href="#aba2">Não tirou</a></li>
                                <li><a id="ferias_part" href="#aba2">Tirou parcialmente</a></li>
                                </ul>
                                </div>
                                </div>
<style type="text/css">
/* The Modal (background) */
.modal_decimo {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal do conteudo */
.modal-content-decimo {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 95%;
	height: 40%;
}

/* The Close Button */
.close_decimo {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close_decimo:hover,
.close_decimo:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<script type="text/javascript">
// Get the modal
var modal_decimo = document.getElementById('myModal_decimo');

// Get the button that opens the modal
var btn_decimo = document.getElementById("decimo13_config");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_decimo")[0];

// When the user clicks the button, open the modal 
btn_decimo.onclick = function() {
    modal_decimo.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal_decimo.style.display = "none";
}

	
$(document).ready(function() {

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
		$("#perio_ferias").prop("readonly", false);
			$('#perio_ferias').each(function () {
			$(this).val("Todas as férias!");
			});
			$('#tev_ferias').each(function () {
			$(this).val("Não gozou férias!");
			});
	});
    
    $("#ferias_sim").click(function (){
                // desabilita o campo 
		$("#ferias_quant").prop("disabled",  false);
		$("#trab_ferias").prop("disabled", false);
		$("#perio_ferias").prop("disabled", false);
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
			$('#tev_ferias').each(function () {
			$(this).val("Sim foi gozada parcialmente!");
			});
	});
	
});
</script>
						<div id="myModal_ferias" class="modal">
							<div id="feriasdiv" class="modal-content-ferias">
                            <span class="close">&times;</span>   
                                <div class="form-group col-md-3 has-error">
                                <label for="text"><small>Gozou férias</small></label>
                                <input type="text" class="form-control" id="tev_ferias" name="tev_ferias" value="" readonly>
                                </div>  
                                <div class="form-group col-md-2">
                                <label for="text"><small>Pedir quantas férias</small></label>
                                <select type="text" class="form-control" id="ferias_quant" name="ferias_quant">
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
                                <select type="text" class="form-control" id="trab_ferias" name="trab_ferias">
                                <option value="não">---- NÃO ----</option>
                                <option value="sim">---- SIM ----</option>
                                </select>
                                </div>
                                <div class="form-group col-md-3">
                                <label for="text"><small>Periodo de férias trabalhadas</small></label>
                                <input type="text" class="form-control" id="perio_ferias" name="perio_ferias" value="">
                                </div>
							</div> 
						</div> 
<style type="text/css">
/* O Modal (fundo) */
.modal {
    display: none; /* Oculto por padrão */
    position: fixed; /* Permaneça no lugar */
    z-index: 1; /* Sentar em cima */
    padding-top: 100px; /* Localização da caixa */
    left: 0;
    top: 0;
    width: 100%; /* Largura completa*/
    height: 100%; /* Altura toda */
    overflow: auto; /* Ativar rolar se necessário */
    background-color: rgb(0,0,0); /* Cor de reposição */
    background-color: rgba(0,0,0,0.4); /* Preto com opacidade */
}

/* Modal do conteudo */
.modal-content-ferias {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	height: 30%;
}

/* O botão Fechar */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>							
<script type="text/javascript">
//Obter o modal
var modal = document.getElementById('myModal_ferias');

// Obtenha o botão que abre o
var btn = document.getElementById("ferias_config");

// Obtenha o elemento <span> que fecha o módulo
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clica no botão, abra o
btn.onclick = function() {
    modal.style.display = "block";
}

// Quando o usuário clica em <span> (x), feche o
span.onclick = function() {
    modal.style.display = "none";
}

</script>
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
                <input type="text" class="form-control" id="plr_valor" name="plr_valor" onkeypress="return(MascaraMoeda(this,'','.',event))" value="0.00">
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
                                <div class="form-group col-md-3">
                <label for="text" class="transparente">Filho menor</label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="left" title="Informe se o reclamante possui filhos com 14 anos ou idade inferior.">
                                <button type="button" class="btn btn-danger" id="sfamilia_config"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Filho menor de 14 anos</button>
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="filho_sim" href="#aba2">Sim tenho</a></li>
                                <li><a id="filho_não" href="#aba2">Não tenho</a></li>
                                </ul>
                                </div>
<script>
$(document).ready(function() {
	
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
		$("#rec_sal_fam").prop("disabled",  false);
		$("#salario_fam").prop("disabled", false);
		$("#rec_sal_fam").prop("disabled", false);
		$("#salario_fam").prop("disabled", false);
		$("#div_salario_familia").prop("hidden",  false);
		$("#div_salariofm_vlmes").prop("hidden",  false);
			$('#filho_14').each(function () {
			$(this).val("Não tem!");
			});
	});
	
	
});
</script>
                                </div>
						<div id="myModal_sfamilia" class="modal_sfamilia">
							<div id="salario_familiadiv" class="modal-content-sfamilia">
                               <span class="close_sfamilia">&times;</span>
                                <div class="form-group col-md-3 has-error">
                <label for="text">Filho de 14 anos menos</label>
                <input type="text" class="form-control" id="filho_14" name="filho_14" value="" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_salario_familia">
                <label for="text" class="transparente">S.familia</label>
                                <div class="btn-group dropdown" data-toggle="tooltip" data-placement="left" title="Informe se o reclamante recebia salário familia.">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                Recebia S.familia
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="recfilho_sim" href="#aba2">Sim Recebia</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="recfilho_não" href="#aba2">Não Recebia</a></li>
                                <li><a id="recfilho_part" href="#aba2">Recebia Parcialmente</a></li>
                                </ul>
                                </div>

<script>
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
	$("#recfilho_part").click(function (){
                // desabilita o campo 
			$('#rec_sal_fam').each(function () {
			$(this).val("Recebia parcial!");
			});
	});
	
	
});
</script>
                                </div>
                                <div class="form-group col-md-2 has-error">
                <label for="text">Recebeu S.Familia</label>
                <input type="text" class="form-control" id="rec_sal_fam" name="rec_sal_fam" value="" readonly>
                                </div>
                                <div class="form-group col-md-3" id="div_salariofm_vlmes">
                <label for="text">Valor Salário Familia <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Informar o valor da tabela ou o valor que a reclamante pagou cada mês!"></span> <span id="vl_salariof_info" class="glyphicon glyphicon-info-sign" aria-hidden="true" onClick="abrirpopup('http://www.guiatrabalhista.com.br/guia/salario_familia.htm');" data-toggle="tooltip" data-placement="top" title="Clique e verifique o valor mensal do benêficio"></span></label>
                <input type="text" class="form-control" id="salario_fam" name="salario_fam" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" required>
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
							</div>
						</div>
<style>
/* O Modal (fundo) */
.modal_sfamilia {
    display: none; /* Oculto por padrão */
    position: fixed; /* Permaneça no lugar */
    z-index: 1; /* Sentar em cima */
    padding-top: 100px; /* Localização da caixa */
    left: 0;
    top: 0;
    width: 100%; /* Largura completa*/
    height: 100%; /* Altura toda */
    overflow: auto; /* Ativar rolar se necessário */
    background-color: rgb(0,0,0); /* Cor de reposição */
    background-color: rgba(0,0,0,0.4); /* Preto com opacidade */
}

/* Modal do conteudo */
.modal-content-sfamilia {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
	height: 30%;
}

/* O botão Fechar */
.close_sfamilia {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close_sfamilia:hover,
.close_sfamilia:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>							
<script>
//Obter o modal
var modal_sfamilia = document.getElementById('myModal_sfamilia');

// Obtenha o botão que abre o
var btn = document.getElementById("filho_sim");
var btn2 = document.getElementById("sfamilia_config");
// Obtenha o elemento <span> que fecha o módulo
var span = document.getElementsByClassName("close_sfamilia")[0];

// Quando o usuário clica no botão, abra o
btn.onclick = function() {
    modal_sfamilia.style.display = "block";
}
btn2.onclick = function() {
    modal_sfamilia.style.display = "block";
}
// Quando o usuário clica em <span> (x), feche o
span.onclick = function() {
    modal_sfamilia.style.display = "none";
}

</script>
    </div><!-- tab benefícios -->
  	<div class="tab-pane fade" id="tab6">
<div class="container">
    <div class="row">
		<div class="col-md-14">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Base de calculo recisório <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Escolha qual será a base de calculos recisórios do reclamante Ex.: 13º, Férias, Aviso, Vales e etc..."></span></h3>
					<span class="pull-right clickable panel-collapsed"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body" style="display:none;">
			 <fieldset class="fieldset">
 <div class="form-group">
                    <div class="col-md-14 columns">
                    <label class="radio-inline checked" for="radio_salario">
                      <input type="radio" name="Radios" id="radio_salario" value="" checked>
                      Sálario
                    </label> 
                    <label class="radio-inline" for="radio_remutl">
                      <input type="radio" name="Radios" id="radio_remutl" value="">
                      Remuneração total
                    </label> 
                    <label class="radio-inline" for="radio_paradigma">
                      <input type="radio" name="Radios" id="radio_paradigma" value="">
                      Paradigma
                    </label>
                    <label class="radio-inline disabled" id="label_radio_outrfun" for="radio_outrasfun">
                      <input type="radio" name="Radios" id="radio_outrasfun" value="" disabled>
                      Outras Funções <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Antes de ativar a base de calculo (Acumulo ou desvio de função) certifique-se do salarios acumulado estar selecionado na aba (Informações->Outras Funções). Caso contrario a opção estará desabilitada."></span>
                    </label> 
                    <span class="additional-info-wrap">
                        <label class="radio-inline" for="radio_otherpay">
                          <input type="radio" name="Radios" id="radio_otherpay" value="">
                          Outros pagamentos
                        </label>
                        <div class="additional-info hide">
                              <input type="text" id="other_pay" name="other_pay" placeholder="informe o valor" class="form-control other_pay" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled="" value="0.00" required>
                        </div>
                    </span>
                    <span class="additional-info-wrap">
                        <label class="radio-inline" for="radio_piso">
                          <input type="radio" name="Radios" id="radio_piso" value="Other">
                          Piso da categoria
                        </label>
                        <div class="additional-info hide">
                              <input type="text" id="piso_pay" name="piso_pay" placeholder="informe o valor" class="form-control piso_pay" onKeyPress="return(MascaraMoeda(this,'','.',event))" disabled="" value="0.00" required>
                        </div>
                    </span>
					</div>
			<script type="text/javascript">
	$(document).ready(function() {
		// btn escolhe o salario base a ser calculado
		$("#radio_salario").click(function (){
			$(".salario").prop("readonly", false);
			$('.salario').attr('id','salario');	
			$(".remu_total").prop("readonly", true);
			$('.remu_total').attr('id','remu_total');	
			$(".other_pay").prop("readonly", true);
			$('.other_pay').attr('id','other_pay');	
			$(".radio_based").prop("readonly", false);
			$('.radio_based').attr('id','desvio_salario');	
			$(".piso_pay").prop("readonly", true);
			$('.piso_pay').attr('id','piso_pay');
			$('.p_salario_1').attr('id','p_salario_1')
			$('.p_salario_2').attr('id','p_salario_2')
			$('.p_salario_3').attr('id','p_salario_3')
			$('.p_salario_4').attr('id','p_salario_4')
			$('.p_salario_5').attr('id','p_salario_5')
		});
		
		$("#radio_remutl").click(function (){
			$(".salario").prop("readonly", true);
			$('.salario').attr('id','');	
			$(".remu_total").prop("readonly", false);
			$('.remu_total').attr('id','salario');	
			$(".other_pay").prop("readonly", true);
			$('.other_pay').attr('id','other_pay');	
			$(".radio_based").prop("readonly", false);
			$('.radio_based').attr('id','desvio_salario');	
			$(".piso_pay").prop("readonly", true);
			$('.piso_pay').attr('id','piso_pay');
			$('.p_salario_1').attr('id','p_salario_1')
			$('.p_salario_2').attr('id','p_salario_2')
			$('.p_salario_3').attr('id','p_salario_3')
			$('.p_salario_4').attr('id','p_salario_4')
			$('.p_salario_5').attr('id','p_salario_5')
		});
		
		$("#radio_paradigma").click(function (){
			$(".salario").prop("readonly", true);
			$('.salario').attr('id','');	
			$(".remu_total").prop("readonly", true);
			$('.remu_total').attr('id','remu_total');	
			$(".other_pay").prop("readonly", true);
			$('.other_pay').attr('id','other_pay');	
			$(".radio_based").prop("readonly", false);
			$('.radio_based').attr('id','desvio_salario');	
			$(".piso_pay").prop("readonly", true);
			$('.piso_pay').attr('id','piso_pay');
			$('#p_salario_select').attr('id','salario')
		});
		
		$("#radio_outrasfun").click(function (){
			$(".salario").prop("readonly", true);
			$('.salario').attr('id','');	
			$(".remu_total").prop("readonly", true);
			$('.remu_total').attr('id','remu_total');	
			$(".other_pay").prop("readonly", true);
			$('.other_pay').attr('id','other_pay');	
			$("#desvio_salario").prop("readonly", false);
			$('#desvio_salario').attr('id','salario');	
			$(".piso_pay").prop("readonly", true);
			$('.piso_pay').attr('id','piso_pay');
			$('.p_salario_1').attr('id','p_salario_1')
			$('.p_salario_2').attr('id','p_salario_2')
			$('.p_salario_3').attr('id','p_salario_3')
			$('.p_salario_4').attr('id','p_salario_4')
			$('.p_salario_5').attr('id','p_salario_5')
		});
		
		$("#radio_otherpay").click(function (){
			$(".salario").prop("readonly", true);
			$('.salario').attr('id','');	
			$(".remu_total").prop("readonly", true);
			$('.remu_total').attr('id','remu_total');	
			$(".other_pay").prop("readonly", false);
			$('.other_pay').attr('id','salario');	
			$(".radio_based").prop("readonly", false);
			$('.radio_based').attr('id','desvio_salario');	
			$(".piso_pay").prop("readonly", true);
			$('.piso_pay').attr('id','piso_pay');
			$('.p_salario_1').attr('id','p_salario_1')
			$('.p_salario_2').attr('id','p_salario_2')
			$('.p_salario_3').attr('id','p_salario_3')
			$('.p_salario_4').attr('id','p_salario_4')
			$('.p_salario_5').attr('id','p_salario_5')
		});
		
		$("#radio_piso").click(function (){
			$(".salario").prop("readonly", true);
			$('.salario').attr('id','');	
			$(".remu_total").prop("readonly", true);
			$('.remu_total').attr('id','remu_total');	
			$(".other_pay").prop("readonly", true);
			$('.other_pay').attr('id','other_pay');	
			$(".radio_based").prop("readonly", false);
			$('.radio_based').attr('id','desvio_salario');	
			$(".piso_pay").prop("readonly", false);
			$('.piso_pay').attr('id','salario');
			$('.p_salario_1').attr('id','p_salario_1')
			$('.p_salario_2').attr('id','p_salario_2')
			$('.p_salario_3').attr('id','p_salario_3')
			$('.p_salario_4').attr('id','p_salario_4')
			$('.p_salario_5').attr('id','p_salario_5')
		});
	});
					</script>
 </div>
			 </fieldset>
				</div>
			</div>
		</div>
	</div>
</div> 
			<script type="text/javascript">
$(document).ready(function() {

    //When checkboxes/radios checked/unchecked, toggle background color
    $('.form-group').on('click','input[type=radio]',function() {
        $(this).closest('.form-group').find('.radio-inline, .radio').removeClass('checked');
        $(this).closest('.radio-inline, .radio').addClass('checked');
    });
    $('.form-group').on('click','input[type=checkbox]',function() {
        $(this).closest('.checkbox-inline, .checkbox').toggleClass('checked');
    });

    //Show additional info text box when relevant checkbox checked
    $('.additional-info-wrap input[type=checkbox]').click(function() {
        if($(this).is(':checked')) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        }
        else {
            $(this).closest('.additional-info-wrap').find('.additional-info').addClass('hide').find('input,select').val('').attr('disabled','disabled');
        }
    });

    //Show additional info text box when relevant radio checked
    $('input[type=radio]').click(function() {
        $(this).closest('.form-group').find('.additional-info-wrap .additional-info').addClass('hide').find('input,select').val('').attr('disabled','disabled');
        if($(this).closest('.additional-info-wrap').length > 0) {
            $(this).closest('.additional-info-wrap').find('.additional-info').removeClass('hide').find('input,select').removeAttr('disabled');
        }        
    });
});
			</script>
			<style type="text/css">
label.radio-inline, label.checkbox-inline {
  background-color: #dcdfd4;
  cursor: pointer;
  font-weight: 400;
  margin-bottom: 10px !important;
  margin-right: 2%;
  margin-left:0;
  padding: 10px 10px 10px 30px;
}
label.radio-inline.checked, label.checkbox-inline.checked {
  background-color: #266c8e;
  color: #fff !important;
  text-shadow: 1px 1px 2px #000 !important;
}
.checkbox-inline + .checkbox-inline, .radio-inline + .radio-inline {
  margin-left: 0;
}
.columns label.radio-inline, .columns label.checkbox-inline {
  min-width: 190px;
  vertical-align: top;
  width: 30%;
}
.additional-info-wrap {
  display: inline-block;
  margin: 0 2% 0 0;
  min-width: 190px;
  position: relative;
  vertical-align: top;
  width: 30%;
}
.additional-info-wrap label.checkbox-inline, .additional-info-wrap label.radio-inline {
  width: 100% !important;
}
.additional-info-wrap .additional-info {
  background-color: #266c8e;
  clear: both;
  color: #fff !important;
  margin-top: -10px;
  padding: 0 10px 10px;
  text-shadow: 1px 1px 2px #000 !important;
  width: 100%;
}

.ui-sortable tr {
    cursor:pointer;
}    
.ui-sortable tr:hover {
    background:rgba(244,251,17,0.45);
}label.radio-inline,
label.checkbox-inline,
label.radio,
label.checkbox {
    margin-right:2%;
    cursor:pointer;
    font-weight:400;
    padding:10px 10px 10px 30px;
    background-color:#dcdfd4;
    margin-bottom:10px!important
}
label.radio-inline.checked,
label.checkbox-inline.checked,
label.radio.checked,
label.checkbox.checked {
    background-color:#266c8e;
    color:#fff!important;
    text-shadow:#000 1px 1px 2px!important
}
			</style>
       <fieldset id="campos">
        <br>
                    <fieldset class="fieldset" id="div1">
        <legend>&nbsp;aviso prévio e saldo de salário 
        <div id="closediv">
        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div1');camp01();desbloquearInput('av_none01')"></span>
        </button>
        </div>
        </legend>
                    <div class="form-group col-md-1">
                    <br><br>
                        <label class="switch">
                        <input type="checkbox" checked onClick="esconder('div_aviso_previo');inp01();av_limp_valinp01();" id="swit_avisopre">
                        <div class="slider round"></div>
                        </label>
                    </div>
    <fieldset id="div_aviso_previo">
                    <div class="form-group col-md-2">
                    <label for="text">Dias aviso prévio</label>
                    <select type="text" class="form-control" id="av_inp01" name="av_inp01">
                    <optgroup label="até 1anos"></optgroup>
                    <option value="30" selected>30 dias</option>
                    <optgroup label="até 2anos"></optgroup>
                    <option value="33">33 dias</option>
                    <optgroup label="até 3anos"></optgroup>
                    <option value="36">36 dias</option>
                    <optgroup label="até 4anos"></optgroup>
                    <option value="39">39 dias</option>
                    <optgroup label="até 5anos"></optgroup>
                    <option value="42">42 dias</option>
                    <optgroup label="até 6anos"></optgroup>
                    <option value="45">45 dias</option>
                    <optgroup label="até 7anos"></optgroup>
                    <option value="48">48 dias</option>
                    <optgroup label="até 8anos"></optgroup>
                    <option value="51">51 dias</option>
                    <optgroup label="até 9anos"></optgroup>
                    <option value="54">54 dias</option>
                    <optgroup label="até 10anos"></optgroup>
                    <option value="57">57 dias</option>
                    <optgroup label="até 11anos"></optgroup>
                    <option value="60">60 dias</option>
                    <optgroup label="até 12anos"></optgroup>
                    <option value="63">63 dias</option>
                    <optgroup label="até 13anos"></optgroup>
                    <option value="66">66 dias</option>
                    <optgroup label="até 14anos"></optgroup>
                    <option value="69">69 dias</option>
                    <optgroup label="até 15anos"></optgroup>
                    <option value="72">72 dias</option>
                    <optgroup label="até 16anos"></optgroup>
                    <option value="75">75 dias</option>
                    <optgroup label="até 17anos"></optgroup>
                    <option value="78">78 dias</option>
                    <optgroup label="até 18anos"></optgroup>
                    <option value="81">81 dias</option>
                    <optgroup label="até 19anos"></optgroup>
                    <option value="84">84 dias</option>
                    <optgroup label="até 20anos"></optgroup>
                    <option value="87">87 dias</option>
                    <optgroup label="apartir de 20anos"></optgroup>
                    <option value="90">90 dias</option>
                    </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label>texto aviso prévio</label>
                    <input type="text" class="form-control" value="dias de aviso prévio" id="txt_inp01" name="txt_inp01">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="val_inp01" name="val_inp01" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1 hidden">
                    <label class="hidden">apurar</label>
                    <input type="text" class="form-control hidden" value="" id="av_apurar_inp01" name="av_apurar_inp01">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
    <input type="radio" name="optionsRadios_avi" id="optionsRadios_avi1" onClick="av_limp_valinp01();mudarvalue1();bloquearInput2('val_inp01')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_avi" id="optionsRadios_avi2" onClick="desbloquearInput('val_inp01');av_limp_valinp02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_avi" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1 hidden">
                    <input type="text" class="form-control hidden" value="R$" id="moeda1" name="moeda1" readonly>
                    </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
  window.onload = function(){
</script>
<script type="text/javascript">
    var a = function(id){ return document.getElementById(id); }
    a("calcula_avi").onclick = function(){
      var a1 = a("remu_total").value;
      var a2 = a("av_inp01").value;
	  var alll = parseFloat(a1) / 30 * parseFloat(a2);
	  
	  	  var aa = alll.toFixed(2).replace(",",".");
		 if (isNaN(aa)) aa = 0.00;
     a("val_inp01").value = aa;
	} //calculo aviso previo
</script>
    </fieldset>
                    <div class="form-group col-md-1 hidden">
                    <label class="hidden">title</label>
        <input type="text" class="form-control hidden" value=")- Do saldo de salários e aviso prévio" id="oculto_inp01" name="oculto_inp01">
                    </div>
                    <div class="form-group col-md-1">
                    <br><br>
                        <label class="switch">
                        <input type="checkbox" checked onClick="esconder('div_saldo_salario');inp02();dia_limp_valinp01()" id="swit_avisopre">
                        <div class="slider round"></div>
                        </label>
                    </div>
    <fieldset id="div_saldo_salario">
                    <div class="form-group col-md-1">
                    <label for="text">Dias</label>
                    <input type="number" class="form-control" id="dia_inp02" name="dia_inp02">
                    </div>
                    <div class="form-group col-md-7">
                    <label>texto salários tempo</label>
                    <input type="text" class="form-control" value="dias de saldo de salários de" id="txt_inp02" name="txt_inp02">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="val_inp02" name="val_inp02" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1 hidden">
                    <label class="hidden">apurar</label>
                    <input type="text" class="form-control hidden" value="" id="dia_apurar_inp01" name="dia_apurar_inp01">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
    <input type="radio" name="optionsRadios_diatrab" id="optionsRadios1" onClick="dia_limp_valinp01();mudarvalue2();bloquearInput2('val_inp02')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_diatrab" id="optionsRadios2" onClick="desbloquearInput('val_inp02');dia_limp_valinp02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_diatrab" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1 hidden">
                    <input type="text" class="form-control hidden" value="R$" id="moeda2" name="moeda2" readonly>
                    </div> <!-- div R$ hidden 2 -->
<script type="text/javascript">
    var b = function(id){ return document.getElementById(id); }
    b("calcula_diatrab").onclick = function(){
      var b1 = b("dia_inp02").value;
      var b2 = b("remu_total").value;
	  var blll = parseFloat(b2) / 30 * parseFloat(b1);
	  
	  	  var bb = blll.toFixed(2).replace(",",".");
		 if (isNaN(bb)) bb = 0.00;
     b("val_inp02").value = bb;
	}//calculo dias trabalhados
</script>
    </fieldset>
                    <div class="form-group col-md-1">
                    <label for="text">Posição</label>
                    <select type="text" id="position1" name="position1" class="form-control posionselect">
                    	<option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                    </select>
                    </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div2">
                        <legend>&nbsp;Das Férias  
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div2');camp02();;desbloquearInput('fr_none02')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="esconder('div_ferias_01');inp03();fr_limp_valinp01_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="div_ferias_01">                  
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="fr_inp01" name="fr_inp01">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label>texto férias proporcionais</label>
        <input type="text" class="form-control" value="meses de férias proporcionais + 1/3 do período de" id="fr_txt_inp01" name="fr_txt_inp01">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="fr_val_inp01" name="fr_val_inp01" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="fr_apura_inp01" name="fr_apura_inp01">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onClick="fr_limp_valinp01_01();mudarvalue3();bloquearInput2('fr_val_inp01')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onClick="desbloquearInput('fr_val_inp01');fr_limp_valinp01_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_ferias_01" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda3" name="moeda3" readonly>
                    </div> <!-- div R$ hidden 3 -->
<script type="text/javascript">
    var c = function(id){ return document.getElementById(id); }
    c("calcula_ferias_01").onclick = function(){
      var c1 = c("remu_total").value;
      var c2 = c("fr_inp01").value;
	  var clll = parseFloat(c1) / 12 * parseFloat(c2);
	  var clll2 = clll / 3;
	  var clll3 = clll + clll2; 
	  
	  	  var cc = clll3.toFixed(2).replace(",",".");
		 if (isNaN(cc)) cc = 0.00;
     c("fr_val_inp01").value = cc;
	}//calculo ferias input 1
</script>              
    </fieldset>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="esconder('div_ferias_02');inp04();fr_limp_valinp02_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="div_ferias_02">                  
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="12" id="fr_inp02" name="fr_inp02" disabled>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label>texto férias simples</label>
        <input type="text" class="form-control" value="Férias simples + 1/3 do período aquisitivo de" id="fr_txt_inp02" name="fr_txt_inp02">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="fr_val_inp02" name="fr_val_inp02" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div> 
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="fr_apura_inp02" name="fr_apura_inp02">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_3" id="optionsRadios3_1" value="option1" onClick="fr_limp_valinp02_01();bloquearInput2('fr_val_inp02');mudarvalue4()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_3" id="optionsRadios3_2" value="option2" onClick="desbloquearInput('fr_val_inp02');fr_limp_valinp02_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_ferias_02" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda4" name="moeda4" readonly>
                    </div> <!-- div R$ hidden 4 -->
<script type="text/javascript">
	  var c2c = function(id){ return document.getElementById(id); }
    c2c("calcula_ferias_02").onclick = function(){
      var c1 = c2c("remu_total").value;
	  var clll = parseFloat(c1) / 12 * 12;
	  var clll2 = clll / 3;
	  var clll3 = clll + clll2; 
	  
	  	  var cc2 = clll3.toFixed(2).replace(",",".");
		 if (isNaN(cc2)) cc2 = 0.00;
     c2c("fr_val_inp02").value = cc2;
	}//calculo ferias input 2 
</script>
    </fieldset>                                    
                <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="esconder('div_ferias_03');inp05()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
               	</div>

    <fieldset id="div_ferias_03">                  
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="24" id="fr_inp03" name="fr_inp03" disabled>
                    <span class="input-group-addon">/24</span>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <label>texto férias em dobro</label>
        <input type="text" class="form-control" value="Férias em dobro + 1/3 do período aquisitivo de" id="fr_txt_inp03" name="fr_txt_inp03">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="fr_val_inp03" name="fr_val_inp03" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="fr_apura_inp03" name="fr_apura_inp03">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_2" id="optionsRadios2_1" value="option1" onClick="fr_limp_valinp03_01();bloquearInput2('fr_val_inp03');mudarvalue5()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_2" id="optionsRadios2_2" value="option2" onClick="desbloquearInput('fr_val_inp03');fr_limp_valinp03_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_ferias_03" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda5" name="moeda5" readonly>
                    </div> <!-- div R$ hidden 5 -->
<script type="text/javascript">
    var e = function(id){ return document.getElementById(id); }
    e("calcula_ferias_03").onclick = function(){
      var e1 = e("remu_total").value;
	  var elll = parseFloat(e1) / 12 * 24;
	  var elll2= parseFloat(elll) / 3 + parseFloat(elll);
	  
	  	  var ee = elll2.toFixed(2).replace(",",".");
		 if (isNaN(ee)) ee = 0.00;
     e("fr_val_inp03").value = ee;
	}//calculo ferias input 3
</script>                    
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
                            <input type="text" class="form-control" value=")- Das Férias" id="fr_oculto_inp01" name="fr_oculto_inp01">
                        </div>
                        <div class="form-group col-md-1">
                        <label for="text">Posição</label>
                        <select type="text" id="position2" name="position2" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2" selected>2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div3">
                        <legend>&nbsp;Do 13º salário 
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div3');camp03();desbloquearInput('13_none03')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                    <input type="checkbox" checked onClick="esconder('div_decimo_01');inp06();dc_limp_valinp01_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div> <!-- 1 -->
    <fieldset id="div_decimo_01">                    
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="dc_inp01" name="dc_inp01">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>            
                    <div class="form-group col-md-6">
                    <label for="text">texto décimo</label>
                    <input type="text" class="form-control" value="de 13º salário proporcional de" id="dc_txt_inp01" name="dc_txt_inp01">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="dc_val_inp01" name="dc_val_inp01" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="dc_apura_inp01" name="dc_apura_inp01">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_decimo" id="optionsRadios_decimo1" value="option1" onClick="dc_limp_valinp01_01();bloquearInput2('dc_val_inp01');mudarvalue6()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_decimo" id="optionsRadios_decimo2" value="option2" onClick="desbloquearInput('dc_val_inp01');dc_limp_valinp01_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_decimo_01" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda6" name="moeda6" readonly>
                    </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var f = function(id){ return document.getElementById(id); }
    f("calcula_decimo_01").onclick = function(){
      var f1 = f("remu_total").value;
      var f2 = f("dc_inp01").value;
	  var fl = parseFloat(f1) / 12 * parseFloat(f2);
	  
	  	  var ff = fl.toFixed(2).replace(",",".");
		 if (isNaN(ff)) ff = 0.00;
     f("dc_val_inp01").value = ff;
	}//calculo decimo input 1
</script>                   
    </fieldset> <!-- 1 -->
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                    <input type="checkbox" checked onClick="esconder('div_decimo_02');inp06_2();dc_limp_valinp02_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div> <!-- 2 -->
    <fieldset id="div_decimo_02">                    
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="dc_inp02" name="dc_inp02">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>            
                    <div class="form-group col-md-6">
                    <label for="text">texto décimo</label>
                    <input type="text" class="form-control" value="de 13º salário proporcional de" id="d0c_txt_inp02" name="dc_txt_inp02">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="dc_val_inp02" name="dc_val_inp02" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="dc_apura_inp02" name="dc_apura_inp02">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_decimo2" id="optionsRadios_decimo1_2" value="option2" onClick="dc_limp_valinp02_01();bloquearInput2('dc_val_inp02');mudarvalue6_2()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_decimo2" id="optionsRadios_decimo2_2" value="option2" onClick="desbloquearInput('dc_val_inp02');dc_limp_valinp02_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_decimo_02" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda6_2" name="moeda6_2" readonly>
                    </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var f2 = function(id){ return document.getElementById(id); }
    f2("calcula_decimo_02").onclick = function(){
      var f12 = f2("remu_total").value;
      var f22 = f2("dc_inp02").value;
	  var fl2 = parseFloat(f12) / 12 * parseFloat(f22);
	  
	  	  var ff2 = fl2.toFixed(2).replace(",",".");
		 if (isNaN(ff2)) ff2 = 0.00;
     f2("dc_val_inp02").value = ff2;
	}//calculo decimo input 2
</script>                   
    </fieldset> <!-- 2 -->
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                    <input type="checkbox" checked onClick="esconder('div_decimo_03');inp06_3();dc_limp_valinp03_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div> <!-- 3 -->
    <fieldset id="div_decimo_03">                    
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="dc_inp03" name="dc_inp03">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>            
                    <div class="form-group col-md-6">
                    <label for="text">texto décimo</label>
                    <input type="text" class="form-control" value="de 13º salário proporcional de" id="d0c_txt_inp03" name="dc_txt_inp03">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="dc_val_inp03" name="dc_val_inp03" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="dc_apura_inp03" name="dc_apura_inp03">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_decimo3" id="optionsRadios_decimo1_3" value="option3" onClick="dc_limp_valinp03_01();bloquearInput2('dc_val_inp03');mudarvalue6_3()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_decimo3" id="optionsRadios_decimo2_3" value="option3" onClick="desbloquearInput('dc_val_inp03');dc_limp_valinp03_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_decimo_03" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda6_3" name="moeda6_3" readonly>
                    </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var f3 = function(id){ return document.getElementById(id); }
    f3("calcula_decimo_03").onclick = function(){
      var f13 = f3("remu_total").value;
      var f23 = f3("dc_inp03").value;
	  var fl3 = parseFloat(f13) / 12 * parseFloat(f23);
	  
	  	  var ff3 = fl3.toFixed(2).replace(",",".");
		 if (isNaN(ff3)) ff3 = 0.00;
     f3("dc_val_inp03").value = ff3;
	}//calculo decimo input 3
</script>                   
    </fieldset> <!-- 3 -->
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                    <input type="checkbox" checked onClick="esconder('div_decimo_04');inp06_4();dc_limp_valinp04_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div> <!-- 4 -->
    <fieldset id="div_decimo_04">                    
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="dc_inp04" name="dc_inp04">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>            
                    <div class="form-group col-md-6">
                    <label for="text">texto décimo</label>
                    <input type="text" class="form-control" value="de 13º salário proporcional de" id="dc_txt_inp04" name="dc_txt_inp04">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="dc_val_inp04" name="dc_val_inp04" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="dc_apura_inp04" name="dc_apura_inp04">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_decimo4" id="optionsRadios_decimo1_4" value="option4" onClick="dc_limp_valinp04_01();bloquearInput2('dc_val_inp04');mudarvalue6_4()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_decimo4" id="optionsRadios_decimo2_4" value="option4" onClick="desbloquearInput('dc_val_inp04');dc_limp_valinp04_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_decimo_04" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda6_4" name="moeda6_4" readonly>
                    </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var f4 = function(id){ return document.getElementById(id); }
    f4("calcula_decimo_04").onclick = function(){
      var f14 = f4("remu_total").value;
      var f24 = f4("dc_inp04").value;
	  var fl4 = parseFloat(f14) / 12 * parseFloat(f24);
	  
	  	  var ff4 = fl4.toFixed(2).replace(",",".");
		 if (isNaN(ff4)) ff4 = 0.00;
     f4("dc_val_inp04").value = ff4;
	}//calculo decimo input 4
</script>                   
    </fieldset> <!-- 4 -->
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                    <input type="checkbox" checked onClick="esconder('div_decimo_05');inp06_5();dc_limp_valinp05_01()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div> <!-- 5 -->
    <fieldset id="div_decimo_05">                    
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <div class="input-group">
                    <select type="text" class="form-control" id="dc_inp05" name="dc_inp05">
                    <option value="0" selected></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>
                    <span class="input-group-addon">/12</span>
                    </div>
                    </div>            
                    <div class="form-group col-md-6">
                    <label for="text">texto décimo</label>
                    <input type="text" class="form-control" value="de 13º salário proporcional de" id="dc_txt_inp05" name="dc_txt_inp05">
                    </div>
                    <div class="form-group col-md-2">
                    <label>Valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="dc_val_inp05" name="dc_val_inp05" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" id="dc_apura_inp05" name="dc_apura_inp05">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_decimo5" id="optionsRadios_decimo1_5" value="option5" onClick="dc_limp_valinp05_01();bloquearInput2('dc_val_inp05');mudarvalue6_5()">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_decimo5" id="optionsRadios_decimo2_5" value="option5" onClick="desbloquearInput('dc_val_inp05');dc_limp_valinp05_02()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_decimo_05" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda6_5" name="moeda6_5" readonly>
                    </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var f5 = function(id){ return document.getElementById(id); }
    f5("calcula_decimo_05").onclick = function(){
      var f15 = f5("remu_total").value;
      var f25 = f5("dc_inp05").value;
	  var fl5 = parseFloat(f15) / 12 * parseFloat(f25);
	  
	  	  var ff5 = fl5.toFixed(2).replace(",",".");
		 if (isNaN(ff5)) ff5 = 0.00;
     f5("dc_val_inp05").value = ff5;
	}//calculo decimo input 5
</script>                   
    </fieldset> <!-- 5 -->
                        <div class="form-group col-md-1" hidden="true">
                                        <label>title</label>
                        <input type="text" class="form-control transparente" value=")- Do 13º salário" id="dc_oculto_inp01" name="dc_oculto_inp01">
                                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position3" name="position3" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3" selected>3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset> 
                    <fieldset class="fieldset" id="div4">
                        <legend>&nbsp;Do desvio e acumulo de função
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div4');camp04();desbloquearInput('da_none04')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="desv_limp_valinp01_01();esconder('div_desvio_01');inp07()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="div_desvio_01">                    
                        <div class="form-group col-md-1">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="desv_mes_input01" name="desv_mes_input01">
                        </div>  
                        <div class="form-group col-md-2">
                        <label for="text">% CCT</label>
                        <select type="text" class="form-control" value="" id="desv_porc_input01" name="desv_porc_input01">
                        <option value="20">20 %</option>
                        <option value="25">25 %</option>
                        <option value="30">30 %</option>
                        <option value="35">35 %</option>
                        <option value="40">40 %</option>
                        <option value="45">45 %</option>
                        <option value="50">50 %</option>
                        <option value="55">55 %</option>
                        <option value="60">60 %</option>
                        <option value="65">65 %</option>
                        <option value="70">70 %</option>
                        <option value="75">75 %</option>
                        <option value="80">80 %</option>
                        <option value="85">85 %</option>
                        <option value="90">90 %</option>
                        <option value="95">95 %</option>
                        <option value="100">100 %</option>
                        </select>
                        </div>            
                        <div class="form-group col-md-5">
                        <label>texto desvio</label>
            <input type="text" class="form-control" value="meses de desvio e acumulo de função" id="input_text_desv" name="input_text_desv">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_desv" name="input_val_desv" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="input_apura_desv" name="input_apura_desv">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_desv" id="optionsRadios_desv1" value="option1" onClick="desv_limp_valinp01_01();mudarvalue7();bloquearInput2('input_val_desv')">
                        apurar
                        </label>                
                        <label>
                        <input type="radio" name="optionsRadios_desv" id="optionsRadios_desv2" value="option2" onClick="desbloquearInput('input_val_desv');desv_limp_valinp01_02()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_desvio_01" class="btn btn-success calculo_desvio_01" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda7" name="moeda7" readonly>
                        </div> <!-- div R$ hidden 7 -->
<script type="text/javascript">
    var g = function(id){ return document.getElementById(id); }
    g("calculo_desvio_01").onclick = function(){
      var g1 = g("remu_total").value;
      var g2 = g("desv_mes_input01").value;
      var g3 = g("desv_porc_input01").value;
	  var gl = parseFloat(g1) / 100 * parseFloat(g3) * parseFloat(g2);
	  
	  	  var gg = gl.toFixed(2).replace(",",".");
		 if (isNaN(gg)) gg = 0.00;
     g("input_val_desv").value = gg;
	 
	}//calculo desvio e acumulo input buttom 1
</script>                        
    </fieldset> 
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="desvdsr_limp_valinp02_01();esconder('div_desvio_02');inp08()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="div_desvio_02">                  
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="mes_input_desvdsr" name="mes_input_desvdsr">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto DSR's</label>
        <input type="text" class="form-control" value="meses de DSR's sobre desvio e acumulo de função" id="input_text_desvdsr" name="input_text_desvdsr">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_desvdsr" name="input_val_desvdsr" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="input_apura_desvdsr" name="input_apura_desvdsr">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
    <input type="radio" name="optionsRadios_desvdsr" id="optionsRadios_desvdsr1" value="option1" onClick="desvdsr_limp_valinp02_01();mudarvalue8();bloquearInput2('input_val_desvdsr')">
                        apurar
                        </label>                
                        <label>
    <input type="radio" name="optionsRadios_desvdsr" id="optionsRadios_desvdsr2" value="option2" onClick="desbloquearInput('input_val_desvdsr');desvdsr_limp_valinp02_02()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_desvioDSR_02" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda8" name="moeda8" readonly>
                        </div> <!-- div R$ hidden 6 -->
<script type="text/javascript">
    var h = function(id){ return document.getElementById(id); }
    h("calculo_desvioDSR_02").onclick = function(){
      var h1 = h("remu_total").value;
      var h2 = h("mes_input_desvdsr").value;
      var h3 = h("desv_porc_input01").value;
	  var hl = parseFloat(h1) / 100 * parseFloat(h3) * parseFloat(h2);
	  var hll = parseFloat(hl) / 100 * 20;
	  
	  	  var hh = hll.toFixed(2).replace(",",".");
		 if (isNaN(hh)) hh = 0.00;
     h("input_val_desvdsr").value = hh;
	}//calculo devio e acumulo DSR input 1
</script>                       
    </fieldset>         
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do desvio ou acumulo de função" id="desv_oculto_inp01" name="desv_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position4" name="position4" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4" selected>4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div5">
                        <legend>&nbsp;Dos domingos e feriados
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div5');camp05();desbloquearInput('df_none05')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="dmgo_limp_valinp01();esconder('domgo_feriado');inp09()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="domgo_feriado">                    
                        <div class="form-group col-md-1">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="input_mes_dmgo" name="input_mes_dmgo">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">horas mês</label>
                        <input type="text" class="form-control" value="" id="input_horas_dmgo" name="input_horas_dmgo">
                        </div>            
                        <div class="form-group col-md-5">
                        <label>texto diferença</label>
            <input type="text" class="form-control" value="meses de diferença de domingo e feriados" id="input_text_dmgo" name="input_text_dmgo">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_dmgo" name="input_val_dmgo" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="input_apura_dmgo" name="input_apura_dmgo">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_dmgo" id="optionsRadios_domg01" value="option1" onClick="dmgo_limp_valinp01();mudarvalue9();bloquearInput2('input_val_dmgo')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_dmgo" id="optionsRadios_domg02" value="option2" onClick="desbloquearInput('input_val_dmgo');dmgo_limp_valinp02()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_domingo01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda9" name="moeda9" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
 		
    var idom = function(id){ return document.getElementById(id); }
    idom("calculo_domingo01").onclick = function(){
      var i1 = idom("remu_total").value;
      var i2 = idom("input_mes_dmgo").value;
      var i3 = idom("input_horas_dmgo").value;
	  
	  var i0l = parseFloat(i1) / 220;
	  var i2l =  parseFloat(i0l) * 2 + parseFloat(i0l);
	  var i3l = parseFloat(i2l) * parseFloat(i3) * parseFloat(i2);
	  
	  	  var idmgo = i3l.toFixed(2).replace(",",".");
		 if (isNaN(idmgo)) idmgo = 0.00;
     idom("input_val_dmgo").value = idmgo;
	}//calculo domingo e feriados
</script>                  
    </fieldset>
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Dos domingos e feriados" id="dmgo_oculto_inp01" name="dmgo_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position5" name="position5" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5" selected>5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div6">
                        <legend>&nbsp;Das horas extras
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div6');camp06();desbloquearInput('hre_none06')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="hrsext_limp_valinp01();esconder('hrs_extras_01');inp10()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="hrs_extras_01">                    
                        <div class="form-group col-md-1">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="hr_inp01" name="hr_inp01">
                        </div> 
                        <div class="form-group col-md-1">
                        <label>hs mês</label>
                        <input type="text" class="form-control" value="" id="hrsext_totais" name="hrsext_totais">
                        </div>
                        <div class="form-group col-md-5">
                        <label>texto diferença</label>
            <input type="text" class="form-control" value="meses de diferença de horas extras mensais a" id="hr_txt_inp01" name="hr_txt_inp01">
                        </div>
                        <div class="form-group col-md-1">
                        <label for="title" class="transparente">% horas</label>
						<button class="btn btn-primary" type="button">
						<span class="badge"><span id="hrs_porc">50</span></span> %
						</button>
<script type="text/javascript">

							
</script>
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="hr_val_inp01" name="hr_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="hrsext_apurar_inp01" name="hrsext_apurar_inp01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_hrextra01" id="optionsRadios_hr_01" value="option1" onClick="hrsext_limp_valinp01();mudarvalue10();bloquearInput2('hr_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_hrextra01" id="optionsRadios_hr_02" value="option2" onClick="desbloquearInput('hr_val_inp01');hrsext_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_hrsextras" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda10" name="moeda10" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var jextra = function(id){ return document.getElementById(id); }
    jextra("calculo_hrsextras").onclick = function(){
      var j1 = jextra("remu_total").value;
      var j2 = jextra("ext_porcento").value;
      var j3 = jextra("hrsext_totais").value;
      var j4 = jextra("hr_inp01").value;
		
	  var jl = parseFloat(j1)/220;
	  var j2l = parseFloat(jl)/100*parseFloat(j2)+parseFloat(jl);
	  var j3l = parseFloat(j2l)*parseFloat(j3)*parseFloat(j4);
	  
	  	  var jj = j3l.toFixed(2).replace(",",".");
		 if (isNaN(jj)) jj = 0.00;
     jextra("hr_val_inp01").value = jj;
	}//calculo horas extras
</script>                        
    </fieldset>                    
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="hrsext_limp_valinp02();esconder('hrs_extras_02');inp11()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="hrs_extras_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="hr_inp02" name="hr_inp02">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto DSR's intervalo</label>
            <input type="text" class="form-control" value="meses de DSR's sobre horas extras" id="hr_txt_inp02" name="hr_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="hr_val_inp02" name="hr_val_inp02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="hrsext_apurar_inp02" name="hrsext_apurar_inp02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_hrextra02" id="optionsRadios_hrsext02_01" value="option1" onClick="hrsext_limp_valinp02();mudarvalue11();bloquearInput2('hr_val_inp02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_hrextra02" id="optionsRadios_hrsext02_02" value="option2" onClick="desbloquearInput('hr_val_inp02');hrsext_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_hrsextrasDSR" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda11" name="moeda11" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var k = function(id){ return document.getElementById(id); }
    k("calculo_hrsextrasDSR").onclick = function(){
      var k1 = k("remu_total").value;
      var k2 = k("ext_porcento").value;
      var k3 = k("hrsext_totais").value;
      var k4 = k("hr_inp02").value;
	  
	  var kl = parseFloat(k1) / 220;
	  var k2l = parseFloat(kl) / 100 * parseFloat(k2) + parseFloat(kl);
	  var k3l = parseFloat(k2l) * parseFloat(k3) * parseFloat(k4) / 100 * 20;
	  
	  	  var kk = k3l.toFixed(2).replace(",",".");
		 if (isNaN(kk)) kk = 0.00;
     k("hr_val_inp02").value = kk;
	}//calculo horas extras DRS
</script>                        
    </fieldset>
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Das horas extras" id="hrextra_oculto_inp01" name="hrextra_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position6" name="position6" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6" selected>6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div7">
                        <legend>&nbsp;Dos intervalos
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div7');camp07();desbloquearInput('in_none07')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="inter_limp_valinp01();esconder('interval_01');inp12()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="interval_01">                    
                        <div class="form-group col-md-1">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="int_inp01" name="int_inp01">
                        </div>
                        <div class="form-group col-md-1">
                        <label for="text">hrs mês</label>
                        <input type="text" class="form-control" value="" id="int_hrs_inp01" name="int_hrs_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto legal</label>
            <input type="text" class="form-control" value="meses de Horas de intervalo legal a" id="int_txt_inp01" name="int_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="int_val_inp01" name="int_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="inter_apurar_01" name="inter_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_inter01" id="optionsRadios_inter01_01" value="option1" onClick="inter_limp_valinp01();mudarvalue12();bloquearInput2('int_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_inter01" id="optionsRadios_inter01_02" value="option2" onClick="desbloquearInput('int_val_inp01');inter_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_int01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda12" name="moeda12" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var kk = function(id){ return document.getElementById(id); }
    kk("calculo_int01").onclick = function(){
      var kk1 = kk("remu_total").value;
	  var kk2 = kk("int_inp01").value;
	  var kk3 = kk("ext_porcento").value;
      var kk4 = kk("int_hrs_inp01").value;
	  
	  var kkl = parseFloat(kk1) / 220;
	  var kk2l = parseFloat(kkl) / 100 * parseFloat(kk3) + parseFloat(kkl);
	  var kk3l = parseFloat(kk2l) * parseFloat(kk4) * parseFloat(kk2);
	  
	  	  var kkk = kk3l.toFixed(2).replace(",",".");
		 if (isNaN(kkk)) kkk = 0.00;
     kk("int_val_inp01").value = kkk;
	}//calculo de intervalo
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="inter_limp_valinp02();esconder('interval_02');inp13()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="interval_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="int_inp02" name="int_inp02">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto DSR's</label>
            <input type="text" class="form-control" value="meses de DSR's sobre intervalos" id="int_txt_inp02" name="int_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="int_val_inp02" name="int_val_inp02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>  
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="inter_apurar_02" name="inter_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_inter02" id="optionsRadios_inter02_01" value="option1" onClick="inter_limp_valinp02();mudarvalue13();bloquearInput2('int_val_inp02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_inter02" id="optionsRadios_inter02_02" value="option2" onClick="desbloquearInput('int_val_inp02');inter_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_int01DSR" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda13" name="moeda13" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var km = function(id){ return document.getElementById(id); }
    km("calculo_int01DSR").onclick = function(){
      var km1 = kk("remu_total").value;
	  var km2 = kk("int_hrs_inp01").value;
	  var km3 = kk("ext_porcento").value;
      var km4 = kk("hr_inp02").value;
	  
	  var kml = parseFloat(km1) / 220;
	  var km2l = parseFloat(kml) / 100 * parseFloat(km3) + parseFloat(kml);
	  var km3l = parseFloat(km2l) * parseFloat(km4) * parseFloat(km2) / 100 * 20;
	  
	  	  var kmk = km3l.toFixed(2).replace(",",".");
		 if (isNaN(kmk)) kmk = 0.00;
     km("int_val_inp02").value = kmk;
	}//calculo de intervalo DRS
</script>                       
    </fieldset>
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Dos intervalos" id="int_oculto_inp01" name="int_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position7" name="position7" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7" selected>7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div8">
                        <legend>&nbsp;Do adicional de periculosidade
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div8');camp08();desbloquearInput('adp_none08')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="adc_limp_valinp01();esconder('adc_periculo_01');inp14()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="adc_periculo_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="adcp_mes_inp01" name="adcp_mes_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto diferença</label>
            <input type="text" class="form-control" value="meses de diferenças de Adicional de periculosidade" id="adcp_txt_inp01" name="adcp_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_adcp01" name="input_val_adcp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>  
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="adc_apurar_01" name="adc_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_adcp01" id="optionsRadios_adcp01_01" value="option1" onClick="adc_limp_valinp01();mudarvalue14();bloquearInput2('input_val_adcp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_adcp01" id="optionsRadios_adcp01_02" value="option2" onClick="desbloquearInput('input_val_adcp01');adc_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_adcp01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda14" name="moeda14" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var l = function(id){ return document.getElementById(id); }
    l("calculo_adcp01").onclick = function(){
      var l1 = l("remu_total").value;
      var l2 = l("adcp_mes_inp01").value;
	  
	  var ll = parseFloat(l1) / 100 * 30 * parseFloat(l2);
	  
	  	  var ll1 = ll.toFixed(2).replace(",",".");
		 if (isNaN(ll1)) ll1 = 0.00;
     l("input_val_adcp01").value = ll1;
	}//calculo de periculosidade
</script>                       
    </fieldset>                   
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="adc_limp_valinp02();esconder('adc_periculo_02');inp15()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="adc_periculo_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="adcp_mes_inp02" name="adcp_mes_inp02">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto DSR's</label>
            <input type="text" class="form-control" value="meses de DSR's sem adicional de periculosidade" id="adcp_txt_inp02" name="adcp_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_adcp02" name="input_val_adcp02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="adc_apurar_02" name="adc_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_adcp02" id="optionsRadios_adcp02_01" value="option1" onClick="adc_limp_valinp02();mudarvalue15();bloquearInput2('input_val_adcp02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_adcp02" id="optionsRadios_adcp02_02" value="option2" onClick="desbloquearInput('input_val_adcp02');adc_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_adcp02" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda15" name="moeda15" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var m = function(id){ return document.getElementById(id); }
    m("calculo_adcp02").onclick = function(){
      var m1 = m("salario").value;
	  var m2 = m("adcp_mes_inp02").value;
	  
	  var ml = parseFloat(m1) / 100 * 30 * parseFloat(m2);
	  var m2l = parseFloat(ml) / 100 * 20;
	  
	  	  var mm = m2l.toFixed(2).replace(",",".");
		 if (isNaN(mm)) mm = 0.00;
     m("input_val_adcp02").value = mm;
	}//calculo de periculosidade
</script>                       
    </fieldset> 
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do adicional de periculosidade" id="adcp_oculto_inp01" name="adcp_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position8" name="position8" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8" selected>8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div8_1">
                        <legend>&nbsp;Da insalubridade devida
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div8_1');camp08_1();desbloquearInput('insa_none08_1')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="insa_limp_valinp01();esconder('insalubre_01');inp14_1()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="insalubre_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="insa_mes_inp01" name="insa_mes_inp01">
                        </div>            
                        <div class="form-group col-md-4">
                        <label>texto diferença</label>
            <input type="text" class="form-control" value="meses de adicional de insalubridade devida" id="insa_txt_inp01" name="insa_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">porcentual</label>
                        <select type="text" class="form-control" id="insa_porcentual" name="insa_porcentual">
                        <option value="10">10%</option>
                        <option value="20">20%</option>
                        <option value="40" selected>40%</option>
                        </select>
                        </div>            
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_insa01" name="input_val_insa01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>  
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="insa_apurar_01" name="insa_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_insa01" id="optionsRadios_insa01_01" value="option1" onClick="insa_limp_valinp01();mudarvalue14_1();bloquearInput2('input_val_insa01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_insa01" id="optionsRadios_insa01_02" value="option2" onClick="desbloquearInput('input_val_insa01');insa_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_insa01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda14_1" name="moeda14_1" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var l_2 = function(id){ return document.getElementById(id); }
    l_2("calculo_insa01").onclick = function(){
      var _1 = l_2("remu_total").value;
      var _2 = l_2("insa_mes_inp01").value;
      var _3 = l_2("insa_porcentual").value;
	  
	  var ll_2 = parseFloat(_1) / 100 * parseFloat(_3) * parseFloat(_2);
	  
	  	  var lll_2 = ll_2.toFixed(2).replace(",",".");
		 if (isNaN(lll_2)) lll_2 = 0.00;
     l_2("input_val_insa01").value = lll_2;
	}//calculo de insalubridade
</script>                       
    </fieldset>                   
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="insa_limp_valinp02();esconder('insalubre_02');inp14_2()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="insalubre_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="insa_mes_inp02" name="insa_mes_inp02">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto DSR's</label>
            <input type="text" class="form-control" value="meses de DSR's sem adicional de insalubridade" id="insa_txt_inp02" name="insa_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_insa02" name="input_val_insa02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="insa_apurar_02" name="insa_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_insa02" id="optionsRadios_insa02_01" value="option1" onClick="insa_limp_valinp02();mudarvalue14_2();bloquearInput2('input_val_insa02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_insa02" id="optionsRadios_insa02_02" value="option2" onClick="desbloquearInput('input_val_insa02');insa_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_insa02" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda14_2" name="moeda14_2" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var m_2 = function(id){ return document.getElementById(id); }
    m_2("calculo_insa02").onclick = function(){
      var m1_1 = m_2("remu_total").value;
	  var m1_2 = m_2("insa_mes_inp02").value;
	  var m1_3 = m_2("insa_porcentual").value;
	  
	  var ml_2 = parseFloat(m1_1) / 100 * parseFloat(m1_3) * parseFloat(m1_2);
	  var ml_3 = parseFloat(ml_2) / 100 * 20;
	  
	  	  var mm_2 = ml_3.toFixed(2).replace(",",".");
		 if (isNaN(mm_2)) mm_2 = 0.00;
     m_2("input_val_insa02").value = mm_2;
	}//calculo de insalubridade DSR
</script>                       
    </fieldset> 
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Da insalubridade devida" id="insa_oculto_inp01" name="insa_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position8" name="position8_1" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9" selected>9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>  
                    <fieldset class="fieldset" id="div9">
                        <legend>&nbsp;Da transferência
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div9');camp09();desbloquearInput('trn_none09')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="transfe_limp_valinp01();esconder('transfe_01');inp16()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="transfe_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="trans_mes_inp01" name="trans_mes_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto adicionais</label>
                        <input type="text" class="form-control" value="meses de adicionais de transferência  devido" id="trans_txt_inp01" name="trans_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_transfe01" name="input_val_transfe01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="transfe_apurar_01" name="transfe_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_trans01" id="optionsRadios_trans01_01" value="option1" onClick="transfe_limp_valinp01();mudarvalue16();bloquearInput2('input_val_transfe01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_trans01" id="optionsRadios_trans01_02" value="option2" onClick="desbloquearInput('input_val_transfe01');transfe_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_trans01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda16" name="moeda16" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var n = function(id){ return document.getElementById(id); }
    n("calculo_trans01").onclick = function(){
      var n1 = n("remu_total").value;
      var n2 = n("trans_mes_inp01").value;
	  
	  
	  var nl = parseFloat(n1) / 100 * 25 * parseFloat(n2);
	  
	  	  var nn = nl.toFixed(2).replace(",",".");
		 if (isNaN(nn)) nn = 0.00;
     n("input_val_transfe01").value = nn;
	}//calculo de transferencia
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="transfe_limp_valinp02();esconder('transfe_02');inp17()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="transfe_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="trans_mes_inp02" name="trans_mes_inp02">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto adicional de transferência</label>
                        <input type="text" class="form-control" value="meses de DSR's sobre adicional de transferência devido" id="trans_txt_inp02" name="trans_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="input_val_transfe02" name="input_val_transfe02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="transfe_apurar_02" name="transfe_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_trans02" id="optionsRadios_trans02_01" value="option1" onClick="transfe_limp_valinp02();mudarvalue17();bloquearInput2('input_val_transfe02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_trans02" id="optionsRadios_trans02_02" value="option2" onClick="desbloquearInput('input_val_transfe02');transfe_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_trans02" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda17" name="moeda17" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var o = function(id){ return document.getElementById(id); }
    o("calculo_trans02").onclick = function(){
      var o1 = o("remu_total").value;
	  var o2 = o("trans_mes_inp02").value;
	  
	  var ol = parseFloat(o1) / 100 * 25 * parseFloat(o2);
	  var ol2 = parseFloat(ol) / 100 * 20; 
	  
	  	  var oo = ol2.toFixed(2).replace(",",".");
		 if (isNaN(oo)) oo = 0.00;
     o("input_val_transfe02").value = oo;
	}//calculo de intervalo DRS
</script>                       
     </fieldset> 
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Da transferência" id="trans_oculto_inp01" name="trans_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position9" name="position9" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9" selected>9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div10">
                        <legend>&nbsp;Do artigo 467 da CLT
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div10');camp10();desbloquearInput('467_none10')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="art467_limp_valinp01();esconder('art_467_01');inp18()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="art_467_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value=" " id="467_mes_disabled_inp01" name="467_mes_disabled_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto art. 467 CLT</label>
            <input type="text" class="form-control" value="Aplicação do artigo 467 da CLT conforme fundamentado" id="467_txt_inp01" name="467_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="467_val_inp01" name="467_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="467_apurar_01" name="467_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_46701" id="optionsRadios_46701_01" value="option1" onClick="art467_limp_valinp01();mudarvalue18();bloquearInput2('467_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_46701" id="optionsRadios_46701_02" value="option2" onClick="desbloquearInput('467_val_inp01');art467_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_46701" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda18" name="moeda18" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var p = function(id){ return document.getElementById(id); }
    p("calculo_46701").onclick = function(){
      var p1 = p("val_inp01").value;
      var p2 = p("val_inp02").value;
      var p3 = p("fr_val_inp01").value;
      var p4 = p("fr_val_inp02").value;
      var p5 = p("dc_val_inp01").value;
      var p6 = p("dc_val_inp02").value;
      var p7 = p("dc_val_inp03").value;
      var p8 = p("dc_val_inp04").value;
      var p9 = p("dc_val_inp05").value;
		
	  var p10 = p("remu_total").value;
	var p11 = p("467_mes_disabled_inp01").value;
	  
	  var pl = parseFloat(p1) + parseFloat(p2) + parseFloat(p3) + parseFloat(p4) + parseFloat(p5) + parseFloat(p6) + parseFloat(p7) + parseFloat(p8) + parseFloat(p9);
	  var pl2l = parseFloat(p10) / 100 * 8 * parseFloat(p11);
	  var pl3l = parseFloat(pl2l) / 100 * 40 + parseFloat(pl);
	  var pll = parseFloat(pl3l) / 100 * 50;
	  
	  	  var pp = pll.toFixed(2).replace(",",".");
		 if (isNaN(pp)) pp = 0.00;
     p("467_val_inp01").value = pp;
	}//calculo 467 da CLT
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do Artigo 467 da CLT" id="467_oculto_inp01" name="467_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position10" name="position10" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10" selected>10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div22">
                        <legend>&nbsp;Do PLR
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div22');camp22();desbloquearInput('plr_none22')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="plr_limp_valinp01();esconder('plr_01');inp33()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
     <fieldset id="plr_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="plr_mes_inp01" name="plr_mes_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto participação em lucros</label>
            <input type="text" class="form-control" value="meses de participação em lucros e resultados" id="plr_txt_inp01" name="plr_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="plr_val_inp01" name="plr_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="plr_apurar_01" name="plr_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_plr01" id="optionsRadios_plr01_01" value="option1" onClick="plr_limp_valinp01();mudarvalue33();bloquearInput2('plr_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_plr01" id="optionsRadios_plr01_02" value="option2" onClick="desbloquearInput('plr_val_inp01');plr_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_plr" class="btn btn-success">
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda36" name="moeda36" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var plr = function(id){ return document.getElementById(id); }
    plr("calculo_plr").onclick = function(){
      var pl1 = plr("plr_valor").value;
      var pl2 = plr("plr_mes_inp01").value;
	  
	  var pl = parseFloat(pl1) / 12 * parseFloat(pl2);
	  
	  	  var plrr = pl.toFixed(2).replace(",",".");
		 if (isNaN(plrr)) plrr = 0.00;
     plr("plr_val_inp01").value = plrr;
	}//calculo PLR
</script>	                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do PLR" id="plr_oculto_inp01" name="plr_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position22" name="position22" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11" selected>11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div11">
                        <legend>&nbsp;Dos vales refeições e cestas básica
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div11');camp11();desbloquearInput('vr_none11')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="vr_limp_valinp01();esconder('vale_ref_01');inp19()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
     <fieldset id="vale_ref_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="vr_mes_inp01" name="vr_mes_inp01">
                        </div> 
                        <div class="form-group col-md-6">
                        <label>texto vale-refeição devidos</label>
            <input type="text" class="form-control" value="meses de vales refeição devidos" id="vr_txt_inp01" name="vr_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="vr_val_inp01" name="vr_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="vr_apurar_01" name="vr_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_vr01" id="optionsRadios_vr01_01" value="option1" onClick="vr_limp_valinp01();mudarvalue19();bloquearInput2('vr_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_vr01" id="optionsRadios_vr01_02" value="option2" onClick="desbloquearInput('vr_val_inp01');vr_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_vr01" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda19" name="moeda19" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var q = function(id){ return document.getElementById(id); }
    q("calculo_vr01").onclick = function(){
      var q1 = q("VR_valor").value;
      var q2 = q("vr_mes_inp01").value;
      var q3 = q("escala_trab").value;
	  
	  var ql = parseFloat(q1) * parseFloat(q3) * parseFloat(q2);
	  
	  	  var qq = ql.toFixed(2).replace(",",".");
		 if (isNaN(qq)) qq = 0.00;
     q("vr_val_inp01").value = qq;
	}//calculo de vale refeição
</script>                       
    </fieldset>   
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="vr_limp_valinp02();esconder('vale_ref_02');inp19_1()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
     <fieldset id="vale_ref_02">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="vr_mes_inp02" name="vr_mes_inp02">
                        </div> 
                        <div class="form-group col-md-6">
                        <label>texto vale-refeição devidos</label>
            <input type="text" class="form-control" value="meses de cestas básica devidas" id="vr_txt_inp02" name="vr_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="vr_val_inp02" name="vr_val_inp02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="vr_apurar_02" name="vr_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_vr02" id="optionsRadios_vr02_01" value="option1" onClick="vr_limp_valinp02();mudarvalue19_1();bloquearInput2('vr_val_inp02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_vr02" id="optionsRadios_vr02_02" value="option2" onClick="desbloquearInput('vr_val_inp02');vr_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calculo_vr02" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda19_1" name="moeda19_1" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var q2 = function(id){ return document.getElementById(id); }
    q2("calculo_vr02").onclick = function(){
      var q21 = q2("cesta_valor").value;
      var q22 = q2("vr_mes_inp02").value;
	  
	  var q2l = parseFloat(q21) * parseFloat(q22);
	  
	  	  var q2q = q2l.toFixed(2).replace(",",".");
		 if (isNaN(q2q)) q2q = 0.00;
     q2("vr_val_inp02").value = q2q;
	}//calculo de cestas básica
</script>                       
    </fieldset>   
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Dos vales refeições" id="vr_oculto_inp01" name="vr_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position11" name="position11" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12" selected>12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div12">
                        <legend>&nbsp;Dos descontos indevidos
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div12');camp12();desbloquearInput('di_none12')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="desc_limp_valinp01();esconder('desc_indevido_01');inp20()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="desc_indevido_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="desc_mes_inp01" name="desc_mes_inp01">
                        </div>            
                        <div class="form-group col-md-6">
						<label>Motivo dos descontos indevido <u>(texto resumido)</u></label>
            <input type="text" class="form-control" value="devolução dos descontos indevidos de avarias...*" id="desc_txt_inp01" name="desc_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="desc_val_01" name="desc_val_01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="desc_apurar_01" name="desc_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_desc01" id="optionsRadios_desc01_01" value="option1" onClick="desc_limp_valinp01();mudarvalue20();bloquearInput2('desc_val_01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_desc01" id="optionsRadios_desc01_02" value="option2" onClick="desbloquearInput('desc_val_01');desc_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda20" name="moeda20" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Dos descontos indevidos" id="desc_oculto_inp01" name="desc_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position12" name="position12" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13" selected>13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div13">
                        <legend>&nbsp;Do dano moral e material
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div13');camp13();desbloquearInput('dmm_none13')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="danom_limp_valinp01();esconder('dano_moral_01');inp21()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="dano_moral_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">Salários</label>
                        <input type="text" class="form-control" value="" id="danom_sal_inp01" name="danom_sal_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto danos</label>
            <input type="text" class="form-control" value="Salários titulo de danos nos termos fundamentados" id="danom_txt_inp01" name="danom_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="danom_val_01" name="danom_val_01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="danom_apurar_01" name="danom_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_danom01" id="optionsRadios_danom01_01" value="option1" onClick="danom_limp_valinp01();mudarvalue21();bloquearInput2('danom_val_01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_danom01" id="optionsRadios_danom01_02" value="option2" onClick="desbloquearInput('danom_val_01');danom_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calcula_danos" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda21" name="moeda21" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var t = function(id){ return document.getElementById(id); }
    t("calcula_danos").onclick = function(){
      var t1 = t("danom_sal_inp01").value;
	  var t2 = t("salario_minimo_hoje").value;
	  
	  var tl = parseFloat(t2) * parseFloat(t1);
	  
	  	  var t1 = tl.toFixed(2).replace(",",".");
		 if (isNaN(t1)) t1 = 0.00;
     t("danom_val_01").value = t1;
	}//calculo danos moral
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do dano moral e material" id="danom_oculto_inp01" name="danom_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position13" name="position13" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13" selected>13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div14">
                        <legend>&nbsp;Da multa do artigo 477 da CLT
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div14');camp14();desbloquearInput('477_none14')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="multa477_limp_valinp01();esconder('multa_477_01');inp22()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="multa_477_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value=" " id="477_mes_desabled_inp01" name="477_mes_desabled_inp01" readonly>
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto multa</label>
            <input type="text" class="form-control" value="Multa pelo atraso no pagamento das verbas rescisórias (par. 8º do artigo 477 da CLT)" id="477_txt_inp01" name="477_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="477_val_inp01" name="477_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>		
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="477_apurar_01" name="477_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_47701" id="optionsRadios_47701_01" value="option1" onClick="multa477_limp_valinp01();mudarvalue22();bloquearInput2('477_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_47701" id="optionsRadios_47701_02" value="option2" onClick="desbloquearInput('477_val_inp01');multa477_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calcula_477" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda22" name="moeda22" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
    var u = function(id){ return document.getElementById(id); }
    u("calcula_477").onclick = function(){
      var u1 = u("remu_total").value;
	  
	  var ul = parseFloat(u1);
	  
	  	  var u1 = ul.toFixed(2).replace(",",".");
		 if (isNaN(u1)) u1 = 0.00;
     u("477_val_inp01").value = u1;
	}//calculo 477
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Da multa do artigo 477 da CLT" id="477_oculto_inp01" name="477_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position14" name="position14" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14" selected>14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div15">
                        <legend>&nbsp;Do INSS
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div15');camp15();desbloquearInput('inss_none15')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="inss_limp_valinp01();esconder('inss_01');inp23()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="inss_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="inss_mes_inp01" name="inss_mes_inp01">
                        </div>            
                        <div class="form-group col-md-5">
                        <label>texto recolhimento</label>
                <input type="text" class="form-control" value="Meses de INSS não recolhido conforme CNIS anexo e ante as diferenças apontadas na presente peça" id="inss_txt_inp01" name="inss_txt_inp01">
                        </div>
                        <div class="form-group col-md-1">
						<label>porcento</label>
						<select class="form-control" id="inss_porcento" name="inss_porcento">
						<option value="8" selected>8%</option>
						<option value="9">9%</option>
						<option value="11">11%</option>
						</select>
                       	</div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="inss_val_01" name="inss_val_01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="inss_apurar_01" name="inss_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_inss01" id="optionsRadios_inss01_01" value="option1" onClick="inss_limp_valinp01();mudarvalue23();bloquearInput2('inss_val_01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_inss01" id="optionsRadios_inss01_02" value="option2" onClick="desbloquearInput('inss_val_01');inss_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calcula_inss" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda23" name="moeda23" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">
$("#inss_mes_inp01").click(function() {
var sal_inss = $('#remu_total').val();

var s_inss = parseFloat(sal_inss);
var inss_8 = 1659.38;
var inss_9 = 1659.39;
var inss_11 = 2765.67;

if (s_inss <= inss_8) {
$("#inss_porcento").val("8");
}else if (s_inss >= inss_9 && s_inss < inss_11) {
$("#inss_porcento").val("9");
}else if (s_inss >= inss_11) {
$("#inss_porcento").val("11");
}
});//Ritos
	
    var v = function(id){ return document.getElementById(id); }
    v("calcula_inss").onclick = function(){
      var v1 = v("remu_total").value;
      var v2 = v("inss_mes_inp01").value;
	  var v3 = v("inss_porcento").value;
	  
	  var vl = parseFloat(v1) / 100 * parseFloat(v3) * parseFloat(v2);
	  
	  	  var v1 = vl.toFixed(2).replace(",",".");
		 if (isNaN(v1)) v1 = 0.00;
     v("inss_val_01").value = v1;
	}//calculo INSS
</script>                       
    </fieldset>  
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do INSS" id="inss_oculto_inp01" name="inss_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position15" name="position15" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15" selected>15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset> 
                    <fieldset class="fieldset" id="div16">
                        <legend>&nbsp;Das integrações
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div16');camp16();desbloquearInput('int_none16')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="inte_limp_valinp01();esconder('integracoes_01');inp24()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="integracoes_01">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value=" " id="inte_mes_desabled_inp01" name="inte_mes_desabled_inp01" disabled>
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto extra e adicionais</label>
            <input type="text" class="form-control" value="Integração das horas extras e adicionais em:" id="inte_txt_inp01" name="inte_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label class="transparente">valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="" id="inte_val_inp01" name="inte_val_inp01" disabled>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>  
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="inte_apurar_01" name="inte_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_inte01" id="optionsRadios_inte01_01" value="option1" onClick="inte_limp_valinp01();mudarvalue24();bloquearInput2('inte_val_inp01')" disabled>
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_inte01" id="optionsRadios_inte01_02" value="option2" onClick="desbloquearInput('inte_val_inp01');inte_limp_apurainp01_1()" checked disabled>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="" class="btn btn-success" disabled>
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda24" name="moeda24" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="inte_limp_valinp02();esconder('integracoes_02');inp25()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="integracoes_02">                    
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <select type="text" class="form-control" value="" id="inte_mes_inp01" name="inte_mes_inp01">
                        <option value="1">1/12</option>
                        <option value="2">2/12</option>
                        <option value="3">3/12</option>
                        <option value="4">4/12</option>
                        <option value="5">5/12</option>
                        <option value="6">6/12</option>
                        <option value="7">7/12</option>
                        <option value="8">8/12</option>
                        <option value="9">9/12</option>
                        <option value="10">10/12</option>
                        <option value="11">11/12</option>
                        <option value="12">12/12</option>
                        </select>
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto 13º salario</label>
            <input type="text" class="form-control" value="13º Salário de Todo o Período" id="inte_txt_inp02" name="inte_txt_inp02">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="inte_val_inp02" name="inte_val_inp02" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div>
                        <div class="form-group col-md-1" hidden="true">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="inte_apurar_02" name="inte_apurar_02">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_inte02" id="optionsRadios_inte02_01" value="option1" onClick="inte_limp_valinp02();mudarvalue25();bloquearInput2('inte_val_inp02')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_inte02" id="optionsRadios_inte02_02" value="option2" onClick="desbloquearInput('inte_val_inp02');inte_limp_apurainp02_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calcula_inte_13_1" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda25" name="moeda25" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
     </fieldset>                   
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="inte_limp_valinp03();esconder('integracoes_03');inp26()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="integracoes_03">                  
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <select type="text" class="form-control" id="inte_mes_inp03" name="inte_mes_inp03">
                        <option value="1">1/12</option>
                        <option value="2">2/12</option>
                        <option value="3">3/12</option>
                        <option value="4">4/12</option>
                        <option value="5">5/12</option>
                        <option value="6">6/12</option>
                        <option value="7">7/12</option>
                        <option value="8">8/12</option>
                        <option value="9">9/12</option>
                        <option value="10">10/12</option>
                        <option value="11">11/12</option>
                        <option value="12">12/12</option>
                    </select>
                    </div>            
                    <div class="form-group col-md-6">
                    <label>texto férias</label>
        <input type="text" class="form-control" value="Férias de Todo o Período +1/3" id="inte_txt_inp03" name="inte_txt_inp03">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="inte_val_inp03" name="inte_val_inp03" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div> 
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="inte_apurar_03" name="inte_apurar_03">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_inte03" id="optionsRadios_inte03_01" value="option1" onClick="inte_limp_valinp03();mudarvalue26();bloquearInput2('inte_val_inp03')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_inte03" id="optionsRadios_inte03_02" value="option2" onClick="desbloquearInput('inte_val_inp03');inte_limp_apurainp03_1()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_inte_ferias01" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda26" name="moeda26" readonly>
                    </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                        <input type="checkbox" checked onClick="inte_limp_valinp04();esconder('integracoes_04');inp27()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="integracoes_04">                  
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <input type="text" class="form-control" value=" " id="inte_mes_inp014" name="inte_mes_inp04">
                    </div>            
                    <div class="form-group col-md-6">
                    <label>texto saldo</label>
        <input type="text" class="form-control" value="saldo de salário e aviso prévio" id="inte_txt_inp04" name="inte_txt_inp04">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="inte_val_inp04" name="inte_val_inp04" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div> 
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="inte_apurar_04" name="inte_apurar_04">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_inte04" id="optionsRadios_inte04_01" value="option1" onClick="inte_limp_valinp04();mudarvalue27();bloquearInput2('inte_val_inp04')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_inte04" id="optionsRadios_inte04_02" value="option2" onClick="desbloquearInput('inte_val_inp04');inte_limp_apurainp04_1()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_inte_aviso" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda27" name="moeda27" readonly>
                    </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>                  
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Das integrações" id="integracoes_oculto_inp01" name="integracoes_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position16" name="position16" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16" selected>16º</option>
                        <option value="17">17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div17">
                        <legend>&nbsp;Do FGTS
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div17');camp17();desbloquearInput('fgts_none17')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="fgts_limp_valinp01();esconder('fgts_01');inp28()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="fgts_01">                                        
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value=" " id="FGTS_inp01" name="FGTS_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto FGTS</label>
                        <input type="text" class="form-control" value="FGTS de 8% sobre verbas retro" id="FGTS_txt_inp01" name="FGTS_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="FGTS_val_inp01" name="FGTS_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>                    
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="fgts_apurar_01" name="fgts_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_fgts01" id="optionsRadios_fgts01_01" value="option1" onClick="fgts_limp_valinp01();mudarvalue28();bloquearInput2('FGTS_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_fgts01" id="optionsRadios_fgts01_02" value="option2" onClick="desbloquearInput('FGTS_val_inp01');fgts_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="" id="calcula_fgts8" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda28" name="moeda28" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="fgts_limp_valinp02();esconder('fgts_02');inp29()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="fgts_02">                   
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <input type="text" class="form-control" value="" id="FGTS_inp02" name="FGTS_inp02" readonly>
                    </div>            
                    <div class="form-group col-md-6">
                    <label>texto multa</label>
                    <input type="text" class="form-control" value="multa de 40% sobre FGTS" id="FGTS_txt_inp02" name="FGTS_txt_inp02">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="FGTS_val_inp02" name="FGTS_val_inp02" required>
                    <span class="input-group-addon">R$</span>
                    </div>
                    </div>  
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="fgts_apurar_02" name="fgts_apurar_02">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_fgts02" id="optionsRadios_fgts02_01" value="option1" onClick="fgts_limp_valinp02();mudarvalue29();bloquearInput2('FGTS_val_inp02')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_fgts02" id="optionsRadios_fgts02_02" value="option2" onClick="desbloquearInput('FGTS_val_inp02');fgts_limp_apurainp02_1()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_fgts40" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda29" name="moeda29" readonly>
                    </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>                   
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="fgts_limp_valinp03();esconder('fgts_03');inp30()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="fgts_03">                   
                    <div class="form-group col-md-2">
                    <label for="text">meses</label>
                    <input type="text" class="form-control" value="" id="FGTS_inp03" name="FGTS_inp03">
                    </div>            
                    <div class="form-group col-md-6">
                    <label>texto FGTS não depositado</label>
        <input type="text" class="form-control" value="meses de diferença De FGTS, não depositados" id="FGTS_txt_inp03" name="FGTS_txt_inp03">
                    </div>
                    <div class="form-group col-md-2">
                    <label>valor</label>
                    <div class="input-group">
                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="FGTS_val_inp03" name="FGTS_val_inp03" required>
                    <span class="input-group-addon">R$</span>
                    </div>                    
                    </div> 
                    <div class="form-group col-md-1" hidden="">
                    <label>apurar</label>
                    <input type="text" class="form-control" value="" id="fgts_apurar_03" name="fgts_apurar_03">
                    </div> <!-- div apurar oculto -->
                    <div class="form-group col-md-2">
                    <label>
                    <input type="radio" name="optionsRadios_fgts03" id="optionsRadios_fgts03_01" value="option1" onClick="fgts_limp_valinp03();mudarvalue30();bloquearInput2('FGTS_val_inp03')">
                    apurar
                    </label>                
                    <label>
    <input type="radio" name="optionsRadios_fgts03" id="optionsRadios_fgts03_02" value="option2" onClick="desbloquearInput('FGTS_val_inp03');fgts_limp_apurainp03_1()" checked>
                    desligar
                    </label>
                    <br>
            <input type="button" value="calcular" onClick="" id="calcula_fgts_nao" class="btn btn-success" >
                    </div>
                    <div class="form-group col-md-1" hidden="">
                    <input type="text" class="form-control" value="R$" id="moeda30" name="moeda30" readonly>
                    </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="fgts_limp_valinp04();esconder('fgts_04');inp31()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
    <fieldset id="fgts_04">                  
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="FGTS_inp04" name="FGTS_inp04" readonly>
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto multa retro</label>
            <input type="text" class="form-control" value="multa de 40% sobre FGTS retro e sobre o depositado estimado" id="FGTS_txt_inp04" name="FGTS_txt_inp04">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="FGTS_val_inp04" name="FGTS_val_inp04" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="fgts_apurar_04" name="fgts_apurar_04">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_fgts04" id="optionsRadios_fgts04_01" value="option1" onClick="fgts_limp_valinp04();mudarvalue31();bloquearInput2('FGTS_val_inp04')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_fgts04" id="optionsRadios_fgts04_02" value="option2" onClick="desbloquearInput('FGTS_val_inp04');fgts_limp_apurainp04_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" id="calcula_fgts_nao40" class="btn btn-success" >
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda31" name="moeda31" readonly>
                        </div> <!-- div R$ hidden 1 -->
<script type="text/javascript">

</script>                                            
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do FGTS" id="FGTS_oculto_inp01" name="FGTS_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position17" name="position17" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17" selected>17º</option>
                        <option value="18">18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset" id="div18">
                        <legend>&nbsp;Do seguro desemprego
                        <div id="closediv">
                        <button type="button" class="btn btn-danger" aria-label="Left Align">
<span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true" onClick="esconder('div18');camp18();desbloquearInput('sd_none18')"></span>
                        </button>
                        </div>
                        </legend>
                        <div class="form-group col-md-1">
                        <br><br>
                            <label class="switch">
                            <input type="checkbox" checked onClick="seg_limp_valinp01();esconder('seg_desemprego_01');inp32()" id="swit_avisopre">
                            <div class="slider round"></div>
                            </label>
                        </div>
     <fieldset id="seg_desemprego_01">                   
                        <div class="form-group col-md-2">
                        <label for="text">meses</label>
                        <input type="text" class="form-control" value="" id="seg_mes_inp01" name="seg_mes_inp01">
                        </div>            
                        <div class="form-group col-md-6">
                        <label>texto seguro desemprego</label>
            <input type="text" class="form-control" value="Valor do seguro desemprego em pecúnia ou outorga de guias conforme fundamentado" id="seg_txt_inp01" name="seg_txt_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label>valor</label>
                        <div class="input-group">
                        <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="seg_val_inp01" name="seg_val_inp01" required>
                        <span class="input-group-addon">R$</span>
                        </div>
                        </div> 
                        <div class="form-group col-md-1" hidden="true">
                        <label>apurar</label>
                        <input type="text" class="form-control" value="" id="seg_apurar_01" name="seg_apurar_01">
                        </div> <!-- div apurar oculto -->
                        <div class="form-group col-md-2">
                        <label>
                        <input type="radio" name="optionsRadios_seg01" id="optionsRadios_seg01_01" value="option1" onClick="seg_limp_valinp01();mudarvalue32();bloquearInput2('seg_val_inp01')">
                        apurar
                        </label>                
                        <label>
        <input type="radio" name="optionsRadios_seg01" id="optionsRadios_seg01_02" value="option2" onClick="desbloquearInput('seg_val_inp01');seg_limp_apurainp01_1()" checked>
                        desligar
                        </label>
                        <br>
                <input type="button" value="calcular" onClick="Calcularparcelas();somarValores();somaseguro()" id="calculo_segurod" class="btn btn-success">
                        </div>
                        <div class="form-group col-md-1" hidden="">
                        <input type="text" class="form-control" value="R$" id="moeda32" name="moeda32" readonly>
                        </div> <!-- div R$ hidden 1 -->
<div hidden="true">
<input type="radio" name="band-rock" id="button1" value="h"><b>Sim
<input type="radio" name="band-rock" id="button2" value="m" checked> Não</b>

<input id="seg" type="text" size="1" value="1"> 

		
<input id="parcela" type="text" value="">
<input id="result" type="text" value="">

<input id="result2" type="text" value="">
</div>
<script type="text/javascript">
      function somarValores(){
        var s1 = document.getElementById("remu_total").value;
         
          var s5 = document.getElementById("seg").value;
        var calc = (parseFloat(s1) * 3)/3;
         button1 = document.getElementById("button1");
         var button2 = document.getElementById("button2");

         var soma = calc*0.8;
                  var soma2 = (calc - 1360.71) * 0.5 + 1088.56;
                   var soma3 = 1642.72;
var s6 = parseFloat(soma.toFixed(2));
var s7 = parseFloat(soma2.toFixed(2));
var s8 = parseFloat(soma3.toFixed(2));



if (document.getElementById('button1').checked) {
        // Basic package is checked
        document.getElementById('result').value='Não tem direito ao Seguro'; }




else if (calc < 1450.23) {
        // Pro package is checked
       document.getElementById('result2').value= s6;

    }
    
     else if ( calc > 1450.23 && calc < 2417.29)

     {document.getElementById('result2').value= s7;}

else if ( calc > 2417.29)
{document.getElementById('result2').value= s8;}
 
    
}

function Calcularparcelas(){
          var parcela = document.getElementById("seg").value;
          var mes= document.getElementById("seg_mes_inp01").value;
          var button1 = document.getElementById("button1");
              button1 = document.getElementById("button1");


if (document.getElementById('button1').checked) {
        // Basic package is checked
        document.getElementById('parcela').value='Não tem direito ao Seguro'; }


         
else if (parcela = 1 && mes > 11 && mes < 24)
{document.getElementById('parcela').value= '4'; }

else if (parcela = 0 && mes > 11 && mes < 24)
{document.getElementById('parcela').value= '4'; }

else if (parcela = 1 && mes > 23)

{document.getElementById('parcela').value= '5';}

else if (parcela = 2 && mes > 8 && mes < 12)

{document.getElementById('parcela').value= '3';}

else if (parcela = 2 && mes > 11 && mes < 24)

{document.getElementById('parcela').value= '4';}

else if (parcela = 2 && mes > 23)

{document.getElementById('parcela').value= '5';}

else if (parcela > 2 && mes > 5 && mes < 12)

{document.getElementById('parcela').value= '3';}

else if (parcela > 2 && mes > 11 && mes < 24)

{document.getElementById('parcela').value= '4';}

else if (parcela > 2 && mes > 24 )

{document.getElementById('parcela').value= '5';}
}
	
function somaseguro(){
	var parcelaseguro = document.getElementById('parcela').value;
	var resultseguro = document.getElementById('result2').value;
	
	var resultadoseguro = parseFloat(resultseguro) * parseFloat(parcelaseguro);
	
	var valorseguro = resultadoseguro.toFixed(2).replace(",",".");
	if (isNaN(valorseguro)) valorseguro = 0.00;
    document.getElementById("seg_val_inp01").value = valorseguro;
	
}
</script>                       
    </fieldset>                    
                        <div class="form-group col-md-1" hidden="true">
                        <label>title</label>
    <input type="text" class="form-control transparente" value=")- Do seguro desemprego" id="seg_oculto_inp01" name="seg_oculto_inp01">
                        </div>
                        <div class="form-group col-md-2">
                        <label for="text">Posição</label>
                        <select type="text" id="position18" name="position18" class="form-control posionselect">
                        <option value="1">1º</option>
                        <option value="2">2º</option>
                        <option value="3">3º</option>
                        <option value="4">4º</option>
                        <option value="5">5º</option>
                        <option value="6">6º</option>
                        <option value="7">7º</option>
                        <option value="8">8º</option>
                        <option value="9">9º</option>
                        <option value="10">10º</option>
                        <option value="11">11º</option>
                        <option value="12">12º</option>
                        <option value="13">13º</option>
                        <option value="14">14º</option>
                        <option value="15">15º</option>
                        <option value="16">16º</option>
                        <option value="17">17º</option>
                        <option value="18" selected>18º</option>
                        </select>
                        </div>
                    </fieldset>
                    <br />
                    <fieldset class="vl-total">
                        <legend>&nbsp;Calculo totais <small>(soma de todos os calculos apurado e a apurar)</small></legend>
                                <fieldset class="fieldset">    
                                    <div class="form-group col-md-2">
                                    <label for="text">Posição</label>
                                    <select type="text" id="position19" name="position19" class="form-control posionselect">
                                    <option value="1)-">1º</option>
                                    <option value="2)-">2º</option>
                                    <option value="3)-">3º</option>
                                    <option value="4)-">4º</option>
                                    <option value="5)-">5º</option>
                                    <option value="6)-">6º</option>
                                    <option value="7)-">7º</option>
                                    <option value="8)-">8º</option>
                                    <option value="9)-">9º</option>
                                    <option value="10)-">10º</option>
                                    <option value="11)-">11º</option>
                                    <option value="12)-">12º</option>
                                    <option value="13)-">13º</option>
                                    <option value="14)-">14º</option>
                                    <option value="15)-">15º</option>
                                    <option value="16)-">16º</option>
                                    <option value="17)-">17º</option>
                                    <option value="18)-">18º</option>
                                    <option value="19)-" selected>19º</option>
                                    <option value="20)-">20º</option>
                                    <option value="21)-">21º</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label>texto sub total</label>
                                    <input type="text" class="form-control" value="Sub total apurado" id="sub_txt_inp01" name="sub_txt_inp01">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label>valor total</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="sub_val_inp01" name="sub_val_inp01" required>
                                    <span class="input-group-addon">R$</span>
                                    </div>
                                    </div>             
                                    <div class="form-group col-md-2">
                                    <label for="text" class="transparente">calc</label>
                                    <center><input type="button" value="calcular" class="btn btn-success" id="sub_calc_btn"></center>
                                    <input type="text" class="form-control transparente" id="" name="">
                                    </div>
                                    <div class="form-group col-md-1" hidden="">
                                    <label>moeda</label>
                                    <input type="text" class="form-control" value="R$" id="moeda33" name="moeda33">
                                    </div>
<script type="text/javascript">
    var r = function(id){ return document.getElementById(id); }
    r("sub_calc_btn").onclick = function(){
		
	  var r1 = r("vr_val_inp01").value;
      var r2 = r("467_val_inp01").value;
      var r3 = r("input_val_transfe02").value;
      var r4 = r("input_val_transfe01").value;
      var r5 = r("input_val_adcp02").value;
      var r6 = r("input_val_adcp01").value; 
      var r7 = r("int_val_inp02").value;
      var r8 = r("int_val_inp01").value;
      var r9 = r("hr_val_inp02").value;
      var r10 = r("hr_val_inp01").value;
      var r11 = r("input_val_dmgo").value;
      var r12 = r("input_val_desvdsr").value;
      var r13 = r("input_val_desv").value;
      var r14 = r("dc_val_inp01").value;
      var r15 = r("fr_val_inp03").value;
      var r16 = r("fr_val_inp02").value;
      var r17 = r("fr_val_inp01").value;
      var r18 = r("val_inp02").value;
      var r19 = r("val_inp01").value;
	  
	  var r20 = r("seg_val_inp01").value;
	  var r21 = r("FGTS_val_inp04").value;
	  var r22 = r("FGTS_val_inp03").value;
	  var r23 = r("FGTS_val_inp02").value;
	  var r24 = r("FGTS_val_inp01").value;
	  var r25 = r("inte_val_inp04").value;
	  var r26 = r("inte_val_inp03").value;
	  var r27 = r("inte_val_inp02").value;
	  var r28 = r("inss_val_01").value;
	  var r29 = r("477_val_inp01").value;
	  var r30 = r("danom_val_01").value;
	  var r31 = r("desc_val_01").value;
	  
	  var rl = parseFloat(r1) + parseFloat(r2) + parseFloat(r3) + parseFloat(r4) + parseFloat(r5) + parseFloat(r6) + parseFloat(r7) + parseFloat(r8) + parseFloat(r9) + parseFloat(r10) + parseFloat(r11) + parseFloat(r12) + parseFloat(r13) + parseFloat(r14) + parseFloat(r15) + parseFloat(r16) + parseFloat(r17) + parseFloat(r18) + parseFloat(r19) + parseFloat(r20) + parseFloat(r21) + parseFloat(r22) + parseFloat(r23) +parseFloat(r24) + parseFloat(r25) + parseFloat(r26) + parseFloat(r27) + parseFloat(r28) + parseFloat(r29) + parseFloat(r30) + parseFloat(r31);
	  
	  	  var rr = rl.toFixed(2).replace(",",".");
		 if (isNaN(rr)) rr = 0.00;
     r("sub_val_inp01").value = rr;
	}//calculo sub total
</script> 
                       </fieldset>
                                    <div id="check_404">
                                    <br><br>
                                        <label class="switch">
                                        <input type="checkbox" checked onClick="cc404_limp();esconder('cc404_total');cc404off();desbloquearInput('404_none20')" id="swit_avisopre">
                                        <div class="slider round"></div>
                                        </label>
                                    </div>
                                    </br>
                                <fieldset class="fieldset" id="cc404_total">   
                                    <div class="form-group col-md-2">
                                    <label for="text">Posição</label>
                                    <select type="text" id="position20" name="position20" class="form-control posionselect">
                                    <option value="1)-">1º</option>
                                    <option value="2)-">2º</option>
                                    <option value="3)-">3º</option>
                                    <option value="4)-">4º</option>
                                    <option value="5)-">5º</option>
                                    <option value="6)-">6º</option>
                                    <option value="7)-">7º</option>
                                    <option value="8)-">8º</option>
                                    <option value="9)-">9º</option>
                                    <option value="10)-">10º</option>
                                    <option value="11)-">11º</option>
                                    <option value="12)-">12º</option>
                                    <option value="13)-">13º</option>
                                    <option value="14)-">14º</option>
                                    <option value="15)-">15º</option>
                                    <option value="16)-">16º</option>
                                    <option value="17)-">17º</option>
                                    <option value="18)-">18º</option>
                                    <option value="19)-">19º</option>
                                    <option value="20)-" selected>20º</option>
                                    <option value="21)-">21º</option>
                                    </select>
                                    </div>                    
                                    <div class="form-group col-md-6">
                                    <label>texto artigo</label>
                                    <input type="text" class="form-control" value="Aplicação do artigo 404 do CC" id="404_txt_inp02" name="404_txt_inp02">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label>valor art.</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control" value="0.00" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="404_val_inp02" name="404_val_inp02" required>
                                    <span class="input-group-addon">R$</span>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label for="text" class="transparente">title</label>
                                    <center><input type="button" value="calcular" onClick="" class="btn btn-success" id="calcula_404_cc">
    </center>
                                    </div>
                                    <div class="form-group col-md-1" hidden="">
                                    <label>moeda</label>
                                    <input type="text" class="form-control" value="R$" id="moeda34" name="moeda34">
                                    </div>
<script type="text/javascript">
    var s = function(id){ return document.getElementById(id); }
    s("calcula_404_cc").onclick = function(){
      var s1 = s("sub_val_inp01").value;
	  
	  var sl = parseFloat(s1) / 100 * 30;
	  
	  	  var ss = sl.toFixed(2).replace(",",".");
		 if (isNaN(ss)) ss = 0.00;
     s("404_val_inp02").value = ss;
	}//calculo 404 do CC
</script> 
                                </fieldset>  
                                <fieldset class="fieldset">    
                                    <div class="form-group col-md-2">
                                    <label for="text">Posição</label>
                                    <select type="text" id="position21" name="position21" class="form-control posionselect">
                                    <option value="1)-">1º</option>
                                    <option value="2)-">2º</option>
                                    <option value="3)-">3º</option>
                                    <option value="4)-">4º</option>
                                    <option value="5)-">5º</option>
                                    <option value="6)-">6º</option>
                                    <option value="7)-">7º</option>
                                    <option value="8)-">8º</option>
                                    <option value="9)-">9º</option>
                                    <option value="10)-">10º</option>
                                    <option value="11)-">11º</option>
                                    <option value="12)-">12º</option>
                                    <option value="13)-">13º</option>
                                    <option value="14)-">14º</option>
                                    <option value="15)-">15º</option>
                                    <option value="16)-">16º</option>
                                    <option value="17)-">17º</option>
                                    <option value="18)-">18º</option>
                                    <option value="19)-">19º</option>
                                    <option value="20)-">20º</option>
                                    <option value="21)-" selected>21º</option>
                                    </select>
                                    </div>                    
                                    <div class="form-group col-md-6">
                                    <label>texto verba liquida</label>
                                    <input type="text" class="form-control" value="Verbas líquidas à receber. Abatidos os valores recebidos" id="verb_txt_inp03" name="verb_txt_inp03">
                                    </div>
                                    <div class="form-group col-md-2">
                                    <label>valor da verba</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control" value="0.00" id="verb_val_inp03" name="verb_val_inp03" onKeyPress="return(MascaraMoeda(this,'','.',event))" required>
                                    <span class="input-group-addon">R$</span>
                                    </div>
                                    </div>
                                    <div class="form-group col-md-1" hidden="">
                                    <label>apurar</label>
                                    <input type="text" class="form-control" value="" id="verb_apurar_inp03" name="verb_apurar_inp03">
                                    </div> 
                                    <div class="form-group col-md-2">
                                    <label>
                                    <input type="radio" name="optionsRadios_vbliquida" id="optionsRadios1" onClick="mudarvalue1_1();">
                                    + apurar
                                    </label>
                                    <label>
                                    <input type="radio" name="optionsRadios_vbliquida" id="optionsRadios2" onClick="limparvarinp03();" checked>
                                    desligar
                                    </label>
                                    <input type="button" value="calcular" onClick="" class="btn btn-success" id="calcula_verba_liquida">
                                    </div>
                                    <div class="form-group col-md-1" hidden="">
                                    <label>moeda</label>
                                    <input type="text" class="form-control" value="R$" id="moeda35" name="moeda35">
                                    </div>
<script type="text/javascript">
    var z = function(id){ return document.getElementById(id); }
    z("calcula_verba_liquida").onclick = function(){
	  var z1 = z("404_val_inp02").value;
	  var z2 = z("sub_val_inp01").value;
	  
	  var zl = parseFloat(z1) + parseFloat(z2);
	  
	  var zz = zl.toFixed(2).replace(",",".");
	  
	 if (isNaN(zz)) zz = 0.00;
	 z("verb_val_inp03").value = zz;
   } //calculo verba liquida total
</script> 
                                </fieldset>  
                        <div class="form-group col-md-4">
                        <select type="text" id="rito" name="rito" class="form-control">
                        	<option value="" selected disabled></option>
                            <option value="ORDINÁRIO">AÇÃO TRABALHISTA - RITO ORDINÁRIO</option>
                            <option value="SUMARÍSSIMO">AÇÃO TRABALHISTA - RITO SUMARÍSSIMO</option>
                            <option value="SUMÁRIO">AÇÃO TRABALHISTA - RITO SUMÁRIO</option>
                        </select>
                        </div>
<script type="text/javascript">
//Script Else Rito	
$("#calcula_verba_liquida").click(function() {
var verba = $('#verb_val_inp03').val();
var sminimo = $('#salario_minimo_hoje').val();
var limit = $('#limt_hordinario').val();
var limit2 = $('#limt_sumario').val();

var vb = parseFloat(verba);
var sm = parseFloat(sminimo);
var lt = parseFloat(limit);
var lt2 = parseFloat(limit2);

if (vb <= limit2) {
$("#rito").val("SUMÁRIO");
}else if (vb <= limit) {
$("#rito").val("SUMARÍSSIMO");
}else if (vb > limit) {
$("#rito").val("ORDINÁRIO")
}
});//Ritos
</script>                        
                    </fieldset>
        </fieldset>         
    </div><!-- tab verbas recisórias -->
  	<div class="tab-pane fade" id="" hidden="true">
                           <div id="dados-adv" hidden="true">
                                <div class="form-group col-md-3">
                                    <label for="titulo">Advogado(a) ID</label>
<input type="text" readonly class="form-control" id="adv_id" name="adv_id" value="<?php print $id ?>">
                                </div>                                
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nome Advogado(a)</label>
<input type="text" readonly class="form-control" id="adv_nome" name="adv_nome" value="<?php print $adv_nome ?>">
                                </div>                                
                                <div class="form-group col-md-3">
                                    <label for="titulo">Sobre nome Advogado(a)</label>
<input type="text" readonly class="form-control" id="adv_sobre_nome" name="adv_sobre_nome" value="<?php print $adv_sobre_nome ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nacionalidade</label>
<input type="text" readonly class="form-control" id="adv_nacionalidade" name="adv_nacionalidade" value="<?php print $adv_nacionalidade ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Estado Civil</label>
<input type="text" readonly class="form-control" id="adv_estado_civil" name="adv_estado_civil" value="<?php print $adv_estado_civil ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cargo</label>
                                    <input type="text" readonly class="form-control" id="adv_cargo" name="adv_cargo" value="<?php print $adv_cargo ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">CPF</label>
                                    <input type="text" readonly class="form-control" id="adv_cpf" name="adv_cpf" value="<?php print $adv_cpf ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">RG</label>
                                    <input type="text" readonly class="form-control" id="adv_rg" name="adv_rg" value="<?php print $adv_rg ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">RG Origem</label>
                                    <input type="text" readonly class="form-control" id="adv_ssp" name="adv_ssp" value="<?php print $adv_ssp ?>">
                                </div>               
                                <div class="form-group col-md-3">
                                    <label for="titulo">Rua</label>
                                    <input type="text" readonly class="form-control" id="adv_rua" name="adv_rua" value="<?php print $adv_rua ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nº</label>
                    <input type="text" readonly class="form-control" id="adv_numero_casa" name="adv_numero_casa" value="<?php print $adv_numero_casa ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Bairro</label>
                                    <input type="text" readonly class="form-control" id="adv_bairro" name="adv_bairro" value="<?php print $adv_bairro ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cidade</label>
                                    <input type="text" readonly class="form-control" id="adv_cidade" name="adv_cidade" value="<?php print $adv_cidade ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Estado</label>
                                    <input type="text" readonly class="form-control" id="adv_estado" name="adv_estado" value="<?php print $adv_estado ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Cep</label>
                                    <input type="text" readonly class="form-control" id="adv_cep" name="adv_cep" value="<?php print $adv_cep ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Complemento</label>
                        <input type="text" readonly class="form-control" id="adv_complemento" name="adv_complemento" value="<?php print $adv_complemento ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Telefone</label>
                                    <input type="text" readonly class="form-control" id="adv_tel1" name="adv_tel1" value="<?php print $adv_tel1 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Celular</label>
                    <input type="text" readonly class="form-control" id="adv_tel2" name="adv_tel2" value="<?php print $adv_tel2 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Comercial</label>
                    <input type="text" readonly class="form-control" id="adv_tel3" name="adv_tel3" value="<?php print $adv_tel3 ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">OAB</label>
                                    <input type="text" readonly class="form-control" id="oab" name="oab" value="<?php print $oab ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">UF/OAB</label>
                    <input type="text" readonly class="form-control" id="adv_uf_oab" name="adv_uf_oab" value="<?php print $adv_uf_oab ?>">
                                </div>
                               <!-- Data Atual Oculta -->
                                <div class="form-group col-md-2">
                <label for="text">Data atual</label>
                <input type="text" class="form-control" id="datahoje" name="datahoje" value="">
                                </div>
                               <!-- Outras Reclamadas Oculto --> 
                                <div class="form-group col-md-2">
                                <label for="text">hidden segundaria</label>
                                <input type="text" class="form-control" id="hidden_emp2" name="none_emp2" value="none">
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">hidden terceira</label>
                                <input type="text" class="form-control" id="hidden_emp3" name="none_emp3" value="none">
                                </div> 
                                <div class="form-group col-md-2">
                                <label for="text">hidden quarta</label>
                                <input type="text" class="form-control" id="hidden_emp4" name="none_emp4" value="none">
                                </div>
                               <!-- Verbas recisórias None -->
                                <div class="form-group col-md-2">
                                <label for="text">Aviso 01 none</label>
                                <input type="text" class="form-control" id="av_none01" name="av_none01" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Ferias 02 none</label>
                                <input type="text" class="form-control" id="fr_none02" name="fr_none02" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">13º 03 none</label>
                                <input type="text" class="form-control" id="13_none03" name="13_none03" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Desvio e acumulo 04 none</label>
                                <input type="text" class="form-control" id="da_none04" name="da_none04" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Domingo e feriados 05 none</label>
                                <input type="text" class="form-control" id="df_none05" name="df_none05" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Horas extras 06 none</label>
                                <input type="text" class="form-control" id="hre_none06" name="hre_none06" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Intevalo 07 none</label>
                                <input type="text" class="form-control" id="in_none07" name="in_none07" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">adc periculosidade 08 none</label>
                                <input type="text" class="form-control" id="adp_none08" name="adp_none08" value="none" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="text">insalubridade 08_1 none</label>
                                <input type="text" class="form-control" id="insa_none08_1" name="insa_none08_1" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Transferencia 09 none</label>
                                <input type="text" class="form-control" id="trn_none09" name="trn_none09" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">467 CLT 10 none</label>
                                <input type="text" class="form-control" id="467_none10" name="467_none10" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Vale Refeição 11 none</label>
                                <input type="text" class="form-control" id="vr_none11" name="vr_none11" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Desconto indevido 12 none</label>
                                <input type="text" class="form-control" id="di_none12" name="di_none12" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">dano moral e material 13 none</label>
                                <input type="text" class="form-control" id="dmm_none13" name="dmm_none13" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">477 CLT 14 none</label>
                                <input type="text" class="form-control" id="477_none14" name="477_none14" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">inss 15 none</label>
                                <input type="text" class="form-control" id="inss_none15" name="inss_none15" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">integrações 16 none</label>
                                <input type="text" class="form-control" id="int_none16" name="int_none16" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">FGTS 17 none</label>
                                <input type="text" class="form-control" id="fgts_none17" name="fgts_none17" value="none" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                <label for="text">PLR 22 none</label>
                                <input type="text" class="form-control" id="plr_none22" name="plr_none22" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">Seguro desemprego 18 none</label>
                                <input type="text" class="form-control" id="sd_none18" name="sd_none18" value="none" disabled>
                                </div>                                
                                <div class="form-group col-md-2">
                                <label for="text">404 CC none</label>
                                <input type="text" class="form-control" id="404_none20" name="404_none20" value="none" disabled>
                                </div>                                
                            </div>                       
    </div><!-- tab oculta dados advogado e outros -->
	<div class="tab-pane fade" id="tab12">
	<br>
<div class="form-group col-md-12"> 
  <label for="text" style="color:#F76466;">
  <small>Escolha a quantidade de outras reclamada que será incluida no processo!</small>
  </label>
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
     <script type="text/javascript">
$(document).ready(function() {

    $("#reclamadas_none").click(function (){
		$("#segunda_reclamada").prop("hidden", true);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda,#txt_sub_req_2,#txt_sub_req_3,#txt_sub_req_4").prop("disabled", true);
		
		$("#terceira_reclamada").prop("hidden", true);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", true);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta,#t_s_r").prop("disabled", true);
		
		$("#emp_2_ok,#emp_3_ok,#emp_4_ok").prop("disabled", false);
	});

    $("#reclamadas_2").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda,#t_s_r").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", true);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", true);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta,#emp_2_ok,#txt_sub_req_3,#txt_sub_req_4").prop("disabled", true);
		
		$("#emp_3_ok,#emp_4_ok,#txt_sub_req_2").prop("disabled", false);
	});
	
    $("#reclamadas_3").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira,#t_s_r").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", true);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta,#emp_2_ok,#emp_3_ok,#txt_sub_req_2,#txt_sub_req_4").prop("disabled", true);
		
		$("#emp_4_ok,#txt_sub_req_3").prop("disabled", false);
	});
	
    $("#reclamadas_4").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunta,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", false);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta,#t_s_r,#txt_sub_req_4").prop("disabled", false);
		
		$("#emp_2_ok,#emp_3_ok,#emp_4_ok,#txt_sub_req_2,#txt_sub_req_3").prop("disabled", true);
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
                <div class="form-group col-md-2" hidden="true">
                <label for="titulo">hidden</label>
		<input type="text" class="form-control" id="emp_2_ok" name="emp_2_ok" value="hidden='true' style='display:none;'" >
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
                <input type="text" class="form-control" id="cnpj_terceira" name="cnpj_terceira" value="" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_terceira" name="cep_terceira" value="" maxlength="9" OnKeyPress="formatar('#####-###', this)">
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
                <div class="form-group col-md-2" hidden="true">
                <label for="titulo">hidden</label>
			<input type="text" class="form-control" id="emp_3_ok" name="emp_3_ok" value="hidden='true' style='display:none;'">
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
                <input type="text" class="form-control" id="cnpj_quarta" name="cnpj_quarta" value="" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()'>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_quarta" name="cep_quarta" value="" maxlength="9" OnKeyPress="formatar('#####-###', this)">
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
                <div class="form-group col-md-2" hidden="true">
                <label for="titulo">hidden</label>
			<input type="text" class="form-control" id="emp_4_ok" name="emp_4_ok" value="hidden='true' style='display:none;'">
                </div>
</fieldset>
</div>
                <div class="form-group col-md-14">
                <label for="titulo">Responsabilidade</label>
                <br>
                        <div id="radio_sub">
                        <label>
<input type="radio" name="emp_responsabilidade_sub" id="responsabilidade_sub_off" checked>
                        desativado
                        </label>                
                        <label>
<input type="radio" name="emp_responsabilidade_sub" id="responsabilidade_sub">
                        subsidiária
						</label>
                      	<input type="hidden" class="form-control" id="on_emp_sub" name="on_emp_sub" value="hidden='true' style='display:none'">
                       	</div>
                        <div id="radio_sol"><label>
<input type="radio" name="emp_responsabilidade_sol" id="responsabilidade_sol_off" checked>
                        desativado
                        </label>                        
                        <label>
<input type="radio" name="emp_responsabilidade_sol" id="responsabilidade_sol" value="">
                        solidária
                        <label id="check_subempreiteiro" hidden="true">
<input type="checkbox" name="check_sub_emp" id="check_sub_emp" onClick="bloqdesbloq('sub_txt_none');">
							<small class="icocads">subempreiteiros</small>
                        </label>
						</label>
						<input type="hidden" class="form-control" id="sub_txt_none" name="sub_txt_none" value="hidden='true' style='display:none;'">
                      	<input type="hidden" class="form-control" id="on_emp_sol" name="on_emp_sol" value="hidden='true' style='display:none'">
						</div>
<script>
$(document).ready(function() {

	$("#responsabilidade_sol").click(function (){
		$("#check_subempreiteiro").prop("hidden",  false);
		$("#radio_sub").prop("hidden",  true);
		$("#on_emp_sol").prop("disabled", true);
		$("#txt_sol_requerimento").prop("disabled", false);
	});
	$("#responsabilidade_sol_off").click(function (){
		$("#check_subempreiteiro").prop("hidden",  true);
		$("#radio_sub").prop("hidden",  false);
		$("#on_emp_sol").prop("disabled", false);
		$("#txt_sol_requerimento").prop("disabled", true);
	});
	$("#responsabilidade_sub_off").click(function (){	
		$("#radio_sol").prop("hidden",  false);
		$("#on_emp_sub").prop("disabled", false);
		$("#txt_sub_requerimento").prop("disabled", true);
	});
	$("#responsabilidade_sub").click(function (){	
		$("#radio_sol").prop("hidden",  true);
		$("#on_emp_sub").prop("disabled", true);
		$("#txt_sub_requerimento").prop("disabled", false);
	});
});
</script>
<div id="reclamadas_texto">
                <div class="form-group col-md-3" hidden="true">
                <label for="titulo">"S"</label>
                <input type="text" class="form-control" id="t_s_r" name="t_s_r" value="s" disabled>
                </div>
                <div class="form-group col-md-3" hidden="true">
                <label for="titulo">txt SUB</label>
                <input type="text" class="form-control" id="txt_sub_req_2" name="txt_sub_req_2" value=", sendo a segunda Ré na qualidade de" disabled>
                <input type="text" class="form-control" id="txt_sub_req_3" name="txt_sub_req_3" value=", sendo a segunda e terceira Ré na qualidade de" disabled>
                <input type="text" class="form-control" id="txt_sub_req_4" name="txt_sub_req_4" value=", sendo a segunda, terceira e quarta Ré na qualidade de" disabled>

                </div>
                <div class="form-group col-md-3" hidden="true">
                <label for="titulo">txt SUB/SOLI</label>
                <input type="text" class="form-control" id="txt_sol_requerimento" name="txt_sol_requerimento" value=" SOLIDÁRIA," disabled>
                <input type="text" class="form-control" id="txt_sub_requerimento" name="txt_sol_requerimento" value=" SUBSIDIARIA," disabled>
                </div>
</div>               
				</div>	
	</div><!-- tab Outras reclamadas -->
    <div class="tab-pane fade" id="tab13">
                                <div class="form-group col-md-12">
                                <label for="text" style="color:#F76466;">
                                <small>Escolha apenas um paradigma para que o sálario do escolhido seja incluido no processo e ser usado de base para calculos recisórios</small>
                                </label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="paradigma_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!">Nenhum</button>
    <button type="button" id="paradigma_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um paradigma">1º</button>
    <button type="button" id="paradigma_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois paradigmas">2º</button>
    <button type="button" id="paradigma_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três paradigmas">3º</button>
    <button type="button" id="paradigma_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro paradigmas">4º</button>
    <button type="button" id="paradigma_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco paradigmas">5º</button>
                                </div>
                                </div>
                                <div id="all_paradigmas">
            <div id="paradigma_name1">
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Primeiro paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control p_nome_1" id="p_nome_1" name="p_nome_1" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control p_salario_1" id="p_salario_1" name="p_salario_1" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_1" name="p_cargo_1" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <select type="text" class="form-control p_inicio_1" id="p_inicio_1" name="p_inicio_1">
                      <option value="em média 2 anos antes de">até 2 anos antes</option>
                      <option value="em média 1 ano antes de">até 1 ano antes</option>         
                      <option value="em média 6 meses antes de">até 6 meses antes</option>         
                      <option value="após">meses/dias depois de admitido</option>         
				</select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control p_tempo_1" id="p_tempo_1" name="p_tempo_1">
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
            <div id="paradigma_name2">
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Segunda paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control p_nome_2" id="p_nome_2" name="p_nome_2" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control p_salario_2" id="p_salario_2" name="p_salario_2" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_2" name="p_cargo_2" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <select type="text" class="form-control p_inicio_2" id="p_inicio_2" name="p_inicio_2">
                      <option value="em média 2 anos antes de">até 2 anos antes</option>
                      <option value="em média 1 ano antes de">até 1 ano antes</option>         
                      <option value="em média 6 meses antes de">até 6 meses antes</option>         
                      <option value="após">meses/dias depois de admitido</option>         
				</select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control p_tempo_2" id="p_tempo_2" name="p_tempo_2">
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
            <div id="paradigma_name3">
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Terceira paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control p_nome_3" id="p_nome_3" name="p_nome_3" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control p_salario_3" id="p_salario_3" name="p_salario_3"  onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_3" name="p_cargo_3" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <select type="text" class="form-control p_inicio_3" id="p_inicio_3" name="p_inicio_3">
                      <option value="em média 2 anos antes de">até 2 anos antes</option>
                      <option value="em média 1 ano antes de">até 1 ano antes</option>         
                      <option value="em média 6 meses antes de">até 6 meses antes</option>         
                      <option value="após">meses/dias depois de admitido</option>         
				</select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control p_tempo_3" id="p_tempo_3" name="p_tempo_3">
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
            <div id="paradigma_name4"> 
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quarta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control p_nome_4" id="p_nome_4" name="p_nome_4" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control p_salario_4" id="p_salario_4" name="p_salario_4" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_4" name="p_cargo_4" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <select type="text" class="form-control p_inicio_4" id="p_inicio_4" name="p_inicio_4">
                      <option value="em média 2 anos antes de">até 2 anos antes</option>
                      <option value="em média 1 ano antes de">até 1 ano antes</option>         
                      <option value="em média 6 meses antes de">até 6 meses antes</option>         
                      <option value="após">meses/dias depois de admitido</option>         
				</select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control p_tempo_4" id="p_tempo_4" name="p_tempo_4">
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
            <div id="paradigma_name5">
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quinta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control p_nome_5" id="p_nome_5" name="p_nome_5" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control p_salario_5" id="p_salario_5" name="p_salario_5" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_5" name="p_cargo_5" value="" readonly>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <select type="text" class="form-control p_inicio_5" id="p_inicio_5" name="p_inicio_5">
                      <option value="em média 2 anos antes de">até 2 anos antes</option>
                      <option value="em média 1 ano antes de">até 1 ano antes</option>         
                      <option value="em média 6 meses antes de">até 6 meses antes</option>         
                      <option value="após">meses/dias depois de admitido</option>         
				</select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control p_tempo_5" id="p_tempo_5" name="p_tempo_5">
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
		$(".p_salario_1").prop("disabled", true);
		$(".p_salario_2").prop("disabled", true);
		$(".p_salario_3").prop("disabled", true);
		$(".p_salario_4").prop("disabled", true);
		$(".p_salario_5").prop("disabled", true);
		
		$("#p_nome_1,#p_cargo_1,.p_inicio_1,.p_tempo_1").prop("readonly", true);
		$("#p_nome_2,#p_cargo_2,.p_inicio_2,.p_tempo_2").prop("readonly", true);
		$("#p_nome_3,#p_cargo_3,.p_inicio_3,.p_tempo_3").prop("readonly", true);
		$("#p_nome_4,#p_cargo_4,.p_inicio_4,.p_tempo_4").prop("readonly", true);
		$("#p_nome_5,#p_cargo_5,.p_inicio_5,.p_tempo_5").prop("readonly", true);

		$(".p_salario_1").attr("id","p_salario_1");
		$(".p_salario_2").attr("id","p_salario_2");
		$(".p_salario_3").attr("id","p_salario_3");
		$(".p_salario_4").attr("id","p_salario_4");
		$(".p_salario_5").attr("id","p_salario_5");

		$(".p_salario_1").attr("name","p_salario_1");
		$(".p_salario_2").attr("name","p_salario_2");
		$(".p_salario_3").attr("name","p_salario_3");
		$(".p_salario_4").attr("name","p_salario_4");
		$(".p_salario_5").attr("name","p_salario_5");
		
		$(".p_nome_1").attr("name","p_nome_1");
		$(".p_nome_2").attr("name","p_nome_2");
		$(".p_nome_3").attr("name","p_nome_3");
		$(".p_nome_4").attr("name","p_nome_4");
		$(".p_nome_5").attr("name","p_nome_5");
		
		$(".p_inicio_1").attr("name","p_inicio_1");
		$(".p_inicio_2").attr("name","p_inicio_2");
		$(".p_inicio_3").attr("name","p_inicio_3");
		$(".p_inicio_4").attr("name","p_inicio_4");
		$(".p_inicio_5").attr("name","p_inicio_5");
	});

    $("#paradigma_1").click(function (){
		$(".p_salario_1").prop("disabled", false);
		$(".p_salario_2").prop("disabled", true);
		$(".p_salario_3").prop("disabled", true);
		$(".p_salario_4").prop("disabled", true);
		$(".p_salario_5").prop("disabled", true);
		
		$("#p_nome_1,#p_cargo_1,.p_inicio_1,.p_tempo_1").prop("readonly", false);
		$("#p_nome_2,#p_cargo_2,.p_inicio_2,.p_tempo_2").prop("readonly", true);
		$("#p_nome_3,#p_cargo_3,.p_inicio_3,.p_tempo_3").prop("readonly", true);
		$("#p_nome_4,#p_cargo_4,.p_inicio_4,.p_tempo_4").prop("readonly", true);
		$("#p_nome_5,#p_cargo_5,.p_inicio_5,.p_tempo_5").prop("readonly", true);
		
		$('.p_salario_1').attr('id','p_salario_select');
		$('.p_salario_2').attr('id','p_salario_2');
		$('.p_salario_3').attr('id','p_salario_3');
		$('.p_salario_4').attr('id','p_salario_4');
		$('.p_salario_5').attr('id','p_salario_5');
		
		$(".p_salario_1").attr("name","p_salario_select");
		$(".p_salario_2").attr("name","p_salario_2");
		$(".p_salario_3").attr("name","p_salario_3");
		$(".p_salario_4").attr("name","p_salario_4");
		$(".p_salario_5").attr("name","p_salario_5");
		
		$(".p_nome_1").attr("name","p_nome_select");
		$(".p_nome_2").attr("name","p_nome_2");
		$(".p_nome_3").attr("name","p_nome_3");
		$(".p_nome_4").attr("name","p_nome_4");
		$(".p_nome_5").attr("name","p_nome_5");
		
		$(".p_inicio_1").attr("name","p_inicio_select");
		$(".p_inicio_2").attr("name","p_inicio_2");
		$(".p_inicio_3").attr("name","p_inicio_3");
		$(".p_inicio_4").attr("name","p_inicio_4");
		$(".p_inicio_5").attr("name","p_inicio_5");
	});
	
    $("#paradigma_2").click(function (){
		$(".p_salario_1").prop("disabled", true);
		$(".p_salario_2").prop("disabled", false);
		$(".p_salario_3").prop("disabled", true);
		$(".p_salario_4").prop("disabled", true);
		$(".p_salario_5").prop("disabled", true);
		
		$("#p_nome_1,#p_cargo_1,.p_inicio_1,.p_tempo_1").prop("readonly", true);
		$("#p_nome_2,#p_cargo_2,.p_inicio_2,.p_tempo_2").prop("readonly", false);
		$("#p_nome_3,#p_cargo_3,.p_inicio_3,.p_tempo_3").prop("readonly", true);
		$("#p_nome_4,#p_cargo_4,.p_inicio_4,.p_tempo_4").prop("readonly", true);
		$("#p_nome_5,#p_cargo_5,.p_inicio_5,.p_tempo_5").prop("readonly", true);
		
		$('.p_salario_1').attr('id','p_salario_1');
		$('.p_salario_2').attr('id','p_salario_select');
		$('.p_salario_3').attr('id','p_salario_3');
		$('.p_salario_4').attr('id','p_salario_4');
		$('.p_salario_5').attr('id','p_salario_5');
		
		$(".p_salario_1").attr("name","p_salario_1");
		$(".p_salario_2").attr("name","p_salario_select");
		$(".p_salario_3").attr("name","p_salario_3");
		$(".p_salario_4").attr("name","p_salario_4");
		$(".p_salario_5").attr("name","p_salario_5");
		
		$(".p_nome_1").attr("name","p_nome_1");
		$(".p_nome_2").attr("name","p_nome_select");
		$(".p_nome_3").attr("name","p_nome_3");
		$(".p_nome_4").attr("name","p_nome_4");
		$(".p_nome_5").attr("name","p_nome_5");
		
		$(".p_inicio_1").attr("name","p_inicio_1");
		$(".p_inicio_2").attr("name","p_inicio_select");
		$(".p_inicio_3").attr("name","p_inicio_3");
		$(".p_inicio_4").attr("name","p_inicio_4");
		$(".p_inicio_5").attr("name","p_inicio_5");
	});
	
    $("#paradigma_3").click(function (){
		$(".p_salario_1").prop("disabled", true);
		$(".p_salario_2").prop("disabled", true);
		$(".p_salario_3").prop("disabled", false);
		$(".p_salario_4").prop("disabled", true);
		$(".p_salario_5").prop("disabled", true);
		
		$("#p_nome_1,#p_cargo_1,.p_inicio_1,.p_tempo_1").prop("readonly", true);
		$("#p_nome_2,#p_cargo_2,.p_inicio_2,.p_tempo_2").prop("readonly", true);
		$("#p_nome_3,#p_cargo_3,.p_inicio_3,.p_tempo_3").prop("readonly", false);
		$("#p_nome_4,#p_cargo_4,.p_inicio_4,.p_tempo_4").prop("readonly", true);
		$("#p_nome_5,#p_cargo_5,.p_inicio_5,.p_tempo_5").prop("readonly", true);
		
		$('.p_salario_1').attr('id','p_salario_1');
		$('.p_salario_2').attr('id','p_salario_2');
		$('.p_salario_3').attr('id','p_salario_select');
		$('.p_salario_4').attr('id','p_salario_4');
		$('.p_salario_5').attr('id','p_salario_5');
		
		$(".p_salario_1").attr("name","p_salario_1");
		$(".p_salario_2").attr("name","p_salario_2");
		$(".p_salario_3").attr("name","p_salario_select");
		$(".p_salario_4").attr("name","p_salario_4");
		$(".p_salario_5").attr("name","p_salario_5");
		
		$(".p_nome_1").attr("name","p_nome_1");
		$(".p_nome_2").attr("name","p_nome_2");
		$(".p_nome_3").attr("name","p_nome_select");
		$(".p_nome_4").attr("name","p_nome_4");
		$(".p_nome_5").attr("name","p_nome_5");
		
		$(".p_inicio_1").attr("name","p_inicio_1");
		$(".p_inicio_2").attr("name","p_inicio_2");
		$(".p_inicio_3").attr("name","p_inicio_select");
		$(".p_inicio_4").attr("name","p_inicio_4");
		$(".p_inicio_5").attr("name","p_inicio_5");
	});
	
    $("#paradigma_4").click(function (){
		$(".p_salario_1").prop("disabled", true);
		$(".p_salario_2").prop("disabled", true);
		$(".p_salario_3").prop("disabled", true);
		$(".p_salario_4").prop("disabled", false);
		$(".p_salario_5").prop("disabled", true);
		
		$("#p_nome_1,#p_cargo_1,.p_inicio_1,.p_tempo_1").prop("readonly", true);
		$("#p_nome_2,#p_cargo_2,.p_inicio_2,.p_tempo_2").prop("readonly", true);
		$("#p_nome_3,#p_cargo_3,.p_inicio_3,.p_tempo_3").prop("readonly", true);
		$("#p_nome_4,#p_cargo_4,.p_inicio_4,.p_tempo_4").prop("readonly", false);
		$("#p_nome_5,#p_cargo_5,.p_inicio_5,.p_tempo_5").prop("readonly", true);
		
		$('.p_salario_1').attr('id','p_salario_1');
		$('.p_salario_2').attr('id','p_salario_2');
		$('.p_salario_3').attr('id','p_salario_3');
		$('.p_salario_4').attr('id','p_salario_select');
		$('.p_salario_5').attr('id','p_salario_5');
		
		$(".p_salario_1").attr("name","p_salario_1");
		$(".p_salario_2").attr("name","p_salario_2");
		$(".p_salario_3").attr("name","p_salario_3");
		$(".p_salario_4").attr("name","p_salario_select");
		$(".p_salario_5").attr("name","p_salario_5");
		
		$(".p_nome_1").attr("name","p_nome_1");
		$(".p_nome_2").attr("name","p_nome_2");
		$(".p_nome_3").attr("name","p_nome_3");
		$(".p_nome_4").attr("name","p_nome_select");
		$(".p_nome_5").attr("name","p_nome_5");
		
		$(".p_inicio_1").attr("name","p_inicio_1");
		$(".p_inicio_2").attr("name","p_inicio_2");
		$(".p_inicio_3").attr("name","p_inicio_3");
		$(".p_inicio_4").attr("name","p_inicio_select");
		$(".p_inicio_5").attr("name","p_inicio_5");
	});
	
    $("#paradigma_5").click(function (){
		$(".p_salario_1").prop("disabled", true);
		$(".p_salario_2").prop("disabled", true);
		$(".p_salario_3").prop("disabled", true);
		$(".p_salario_4").prop("disabled", true);
		$(".p_salario_5").prop("disabled", false);
		
		$("#p_nome_1,#p_cargo_1").prop("readonly", true);
		$("#p_nome_2,#p_cargo_2").prop("readonly", true);
		$("#p_nome_3,#p_cargo_3").prop("readonly", true);
		$("#p_nome_4,#p_cargo_4").prop("readonly", true);
		$("#p_nome_5,#p_cargo_5").prop("readonly", false);
		
		$('.p_salario_1').attr('id','p_salario_1');
		$('.p_salario_2').attr('id','p_salario_2');
		$('.p_salario_3').attr('id','p_salario_3');
		$('.p_salario_4').attr('id','p_salario_4');
		$('.p_salario_5').attr('id','p_salario_select');
		
		$(".p_salario_1").attr("name","p_salario_1");
		$(".p_salario_2").attr("name","p_salario_2");
		$(".p_salario_3").attr("name","p_salario_3");
		$(".p_salario_4").attr("name","p_salario_4");
		$(".p_salario_5").attr("name","p_salario_select");
		
		$(".p_nome_1").attr("name","p_nome_1");
		$(".p_nome_2").attr("name","p_nome_2");
		$(".p_nome_3").attr("name","p_nome_3");
		$(".p_nome_4").attr("name","p_nome_4");
		$(".p_nome_5").attr("name","p_nome_select");

		$(".p_inicio_1").attr("name","p_inicio_1");
		$(".p_inicio_2").attr("name","p_inicio_2");
		$(".p_inicio_3").attr("name","p_inicio_3");
		$(".p_inicio_4").attr("name","p_inicio_4");
		$(".p_inicio_5").attr("name","p_inicio_select");
	});
});
    </script>
	</div><!-- tab paradigmas -->
	<div class="tab-pane fade" id="aba7">
									<div class="form-group col-md-6" id="text_obs_insalubre">
					<label for="text">Insalubridade: <span style="color:#F76466;">Max:. <span class="counts_txt_insalubre">60</span></span></label>
		<textarea class="form-control" id="insalubre" name="insalubre" rows="2" maxlength="60" placeholder="Digite sua observação insalubre em até 60 caracteres..."></textarea>
									</div>
									<div class="form-group col-md-6" id="text_obs_periculoso">
					<label for="text">Periculosidade:  <span style="color:#F76466;">Max:. <span class="counts_txt_periculoso">60</span></span></label>
		<textarea class="form-control" id="periculoso" name="periculoso" rows="2" maxlength="60"  placeholder="Digite sua observação periculosa em até 60 caracteres..."></textarea>
									</div>
									<div class="form-group col-md-12" id="text_obs_adv">
					<label for="text">Observações do Advogado: <span style="color:#F76466;">Max:. <span class="counts_txt_obs_adv">1000</span></span></label>
		<textarea class="form-control" id="obs_adv" name="obs_adv" rows="5" maxlength="1000" placeholder="Digite sua observação resumida em até 1000 caracteres..."></textarea>
									</div>
		<script type="text/javascript">
        $(document).on("keydown", "#obs_adv", function () {
            var caracteresRestantes = 1000;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
            
            $(".counts_txt_obs_adv").text(caracteresRestantes);
        });
			
        $(document).on("keydown", "#periculoso", function () {
            var caracteresRestantes = 60;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
            
            $(".counts_txt_periculoso").text(caracteresRestantes);
        });
			
        $(document).on("keydown", "#insalubre", function () {
            var caracteresRestantes = 60;
            var caracteresDigitados = parseInt($(this).val().length);
            var caracteresRestantes = caracteresRestantes - caracteresDigitados;
            
            $(".counts_txt_insalubre").text(caracteresRestantes);
        });
		</script>                            
	</div><!-- tab Observações -->
	<div class="tab-pane fade" id="tab14">
	<div class="form-group col-md-12"> 
									<div class="form-group col-md-12"> 
									<label for="text" style="color:#F76466;"><small>Escolha as funções exercidas além da quela principal para ser incluida no processo e o respectivo piso salarial da categoria (Obs: escolha o piso de maior quantia salarial)</small></label>
									<br>
									<div class="btn-group" data-toggle="buttons-radio">
		<button type="button" id="funcaodesv_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!">
									<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
		</button>
		<button type="button" id="funcaodesv_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um desvio de função">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
		</button>
		<button type="button" id="funcaodesv_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois desvio de função">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
		</button>
		<button type="button" id="funcaodesv_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três desvio de função">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span>
		</button>
		<button type="button" id="funcaodesv_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro desvio de função">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span>
		</button>
		<button type="button" id="funcaodesv_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco desvio de função">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
									<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span></span>
		</button>
									</div>
									</div>
		<div class="btn-group" data-toggle="buttons-radio" id="radio_btn1">
<div id="all_funcaodesv" class="btn-group" data-toggle="buttons">
				<div id="funcaodesv_name1">
			  						<div class="form-group col-md-3">
				  <label for="text" style="color:#F76466;"><small>Primeiro desvio :</small></label>
				  <label for="text">Cargo desviado</label>
					<input type="text" class="form-control" id="desvio_cargo_1" name="desvio_cargo_1" value="" disabled>
									</div>
									<div class="form-group col-md-2 has-error">
					<label for="text">Piso salarial</label>
					<input type="text" class="form-control desvio_salario_1 radio_based" name="desvio_salario_1" onKeyPress="return(MascaraMoeda(this,'','.',event))" id="desvio_salario" value="0.00" disabled required>
									</div>
									<div class="form-group col-md-3">
					<label for="text">Base de calculo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Escolha qual o salario que será a base para calculos rescisórios"></span></label>
									<br>
									<label class="btn btn-danger" id="radio_btn2">
									<input type="radio" name="options" id="option_radio2" autocomplete="off" checked disabled>
									<span class="glyphicon glyphicon-usd"></span>
									</label>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data inicio na função</label>
					<input type="text" class="form-control desvio_datainicio_1" id="desvio_datainicio_1" name="desvio_datainicio_1" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data fim da função</label>
					<input type="text" class="form-control desvio_datafim_1" id="desvio_datafim_1" name="desvio_datafim_1" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
				</div><!-- fecha função um -->
				<div id="funcaodesv_name2">
									<div class="form-group col-md-3">
				  <label for="text" style="color:#F76466;"><small>Segundo desvio :</small></label>
				  <label for="text">Cargo desviado</label>
					<input type="text" class="form-control" id="desvio_cargo_2" name="desvio_cargo_2" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Piso salarial</label>
					<input type="text" class="form-control desvio_salario_2 radio_based" id="desvio_salario_2" name="desvio_salario_2" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
									</div>
									<div class="form-group col-md-3">
					<label for="text">Base de calculo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Escolha qual o salario que será a base para calculos rescisórios"></span></label>
									<br>
									<label class="btn btn-primary" id="radio_btn3">
									<input type="radio" name="options" id="option_radio3" autocomplete="off" disabled>
									<span class="glyphicon glyphicon-usd"></span>									
									</label>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data inicio na função</label>
					<input type="text" class="form-control desvio_datainicio_2" id="desvio_datainicio_2" name="desvio_datainicio_2" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data fim da função</label>
					<input type="text" class="form-control desvio_datafim_2" id="desvio_datafim_2" name="desvio_datafim_2" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
				</div><!-- fecha função dois -->
				<div id="funcaodesv_name3">
									<div class="form-group col-md-3">
				  <label for="text" style="color:#F76466;"><small>Terceiro desvio :</small></label>
				  <label for="text">Cargo desviado</label>
					<input type="text" class="form-control" id="desvio_cargo_3" name="desvio_cargo_3" value="" disabled>
									</div>
									<div class="form-group col-md-2 has-success">
					<label for="text">Piso salarial</label>
					<input type="text" class="form-control desvio_salario_3 radio_based" id="desvio_salario_3" name="desvio_salario_3" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
									</div>
									<div class="form-group col-md-3">
					<label for="text">Base de calculo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Escolha qual o salario que será a base para calculos rescisórios"></span></label>
									<br>
									<label class="btn btn-success" id="radio_btn4">
									<input type="radio" name="options" id="option_radio4" autocomplete="off" disabled>
									<span class="glyphicon glyphicon-usd"></span>									</label>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data inicio na função</label>
					<input type="text" class="form-control desvio_datainicio_3" id="desvio_datainicio_3" name="desvio_datainicio_3" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data fim da função</label>
					<input type="text" class="form-control desvio_datafim_3" id="desvio_datafim_3" name="desvio_datafim_3" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
				</div><!-- fecha função três -->
				<div id="funcaodesv_name4">
									<div class="form-group col-md-3">
				  <label for="text" style="color:#F76466;"><small>Quarto desvio :</small></label>
				  <label for="text">Cargo desviado</label>
					<input type="text" class="form-control" id="desvio_cargo_4" name="desvio_cargo_4" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Piso salarial</label>
					<input type="text" class="form-control desvio_salario_4 radio_based" id="desvio_salario_4" name="desvio_salario_4" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
									</div>
									<div class="form-group col-md-3">
					<label for="text">Base de calculo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Escolha qual o salario que será a base para calculos rescisórios"></span></label>
									<br>
									<label class="btn btn-info" id="radio_btn5">
									<input type="radio" name="options" id="option_radio5" autocomplete="off" disabled>
									<span class="glyphicon glyphicon-usd"></span>									</label>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data inicio na função</label>
					<input type="text" class="form-control desvio_datainicio_4" id="desvio_datainicio_4" name="desvio_datainicio_4" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data fim da função</label>
					<input type="text" class="form-control desvio_datafim_4" id="desvio_datafim_4" name="desvio_datafim_4" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
				</div><!-- fecha função quatro -->
				<div id="funcaodesv_name5">
									<div class="form-group col-md-3">
				  <label for="text" style="color:#F76466;"><small>Quinto desvio :</small></label>
				  <label for="text">Cargo desviado</label>
					<input type="text" class="form-control" id="desvio_cargo_5" name="desvio_cargo_5" value="" disabled>
									</div>
									<div class="form-group col-md-2 has-warning">
					<label for="text">Piso salarial</label>
					<input type="text" class="form-control desvio_salario_5 radio_based" id="desvio_salario_5" name="desvio_salario_5" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="0.00" disabled required>
									</div>
									<div class="form-group col-md-3">
					<label for="text">Base de calculo <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Escolha qual o salario que será a base para calculos rescisórios"></span></label>
									<br>
									<label class="btn btn-warning" id="radio_btn6">
									<input type="radio" name="options" id="option_radio6" autocomplete="off" disabled>
									<span class="glyphicon glyphicon-usd"></span>									</label>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data inicio na função</label>
					<input type="text" class="form-control desvio_datainicio_5" id="desvio_datainicio_5" name="desvio_datainicio_5" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
									<div class="form-group col-md-2">
					<label for="text">Data fim da função</label>
					<input type="text" class="form-control desvio_datafim_5" id="desvio_datafim_5" name="desvio_datafim_5" onkeypress="formatar('##/##/####', this)" maxlength="10" value="" disabled>
									</div>
				</div><!-- fecha função cinco -->
</div>
		</div>
		 <script type="text/javascript">
	$(document).ready(function() {
		// btn escolhe o salario base a ser calculado
		$("#option_radio2").click(function (){
			$(".desvio_salario_1").prop("disabled", false);
			$('.desvio_salario_1').attr('id','desvio_salario');
			$(".desvio_salario_2").prop("disabled", true);
			$('.desvio_salario_2').attr('id','desvio_salario_2');	
			$(".desvio_salario_3").prop("disabled", true);
			$('.desvio_salario_3').attr('id','desvio_salario_3');	
			$(".desvio_salario_4").prop("disabled", true);
			$('.desvio_salario_4').attr('id','desvio_salario_4');	
			$(".desvio_salario_5").prop("disabled", true);
			$('.desvio_salario_5').attr('id','desvio_salario_5');
			
			
			$(".desvio_datainicio_1").attr("name","desvio_datainicio");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio_2");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio_3");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio_4");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio_5");
			$(".desvio_datafim_1").attr("name","desvio_datafim");
			$(".desvio_datafim_2").attr("name","desvio_datafim_2");
			$(".desvio_datafim_3").attr("name","desvio_datafim_3");
			$(".desvio_datafim_4").attr("name","desvio_datafim_4");
			$(".desvio_datafim_5").attr("name","desvio_datafim_5");
		});
		
		$("#option_radio3").click(function (){
			$(".desvio_salario_1").prop("disabled", true);
			$('.desvio_salario_1').attr('id','desvio_salario_1');	
			$(".desvio_salario_2").prop("disabled", false);
			$('.desvio_salario_2').attr('id','desvio_salario');	
			$(".desvio_salario_3").prop("disabled", true);
			$('.desvio_salario_3').attr('id','desvio_salario_3');	
			$(".desvio_salario_4").prop("disabled", true);
			$('.desvio_salario_4').attr('id','desvio_salario_4');	
			$(".desvio_salario_5").prop("disabled", true);
			$('.desvio_salario_5').attr('id','desvio_salario_5');
			
			
			$(".desvio_datainicio_1").attr("name","desvio_datainicio_1");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio_3");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio_4");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio_5");
			$(".desvio_datafim_1").attr("name","desvio_datafim_1");
			$(".desvio_datafim_2").attr("name","desvio_datafim");
			$(".desvio_datafim_3").attr("name","desvio_datafim_3");
			$(".desvio_datafim_4").attr("name","desvio_datafim_4");
			$(".desvio_datafim_5").attr("name","desvio_datafim_5");
		});		
		
		$("#option_radio4").click(function (){
			$(".desvio_salario_1").prop("disabled", true);
			$('.desvio_salario_1').attr('id','desvio_salario_1');	
			$(".desvio_salario_2").prop("disabled", true);
			$('.desvio_salario_2').attr('id','desvio_salario_2');	
			$(".desvio_salario_3").prop("disabled", false);
			$('.desvio_salario_3').attr('id','desvio_salario');	
			$(".desvio_salario_4").prop("disabled", true);
			$('.desvio_salario_4').attr('id','desvio_salario_4');	
			$(".desvio_salario_5").prop("disabled", true);
			$('.desvio_salario_5').attr('id','desvio_salario_5');
			
			
			$(".desvio_datainicio_1").attr("name","desvio_datainicio_1");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio_2");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio_4");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio_5");
			$(".desvio_datafim_1").attr("name","desvio_datafim_1");
			$(".desvio_datafim_2").attr("name","desvio_datafim_2");
			$(".desvio_datafim_3").attr("name","desvio_datafim");
			$(".desvio_datafim_4").attr("name","desvio_datafim_4");
			$(".desvio_datafim_5").attr("name","desvio_datafim_5");
		});
		
		$("#option_radio5").click(function (){
			$(".desvio_salario_1").prop("disabled", true);
			$('.desvio_salario_1').attr('id','desvio_salario_1');	
			$(".desvio_salario_2").prop("disabled", true);
			$('.desvio_salario_2').attr('id','desvio_salario_2');	
			$(".desvio_salario_3").prop("disabled", true);
			$('.desvio_salario_3').attr('id','desvio_salario_3');	
			$(".desvio_salario_4").prop("disabled", false);
			$('.desvio_salario_4').attr('id','desvio_salario');	
			$(".desvio_salario_5").prop("disabled", true);
			$('.desvio_salario_5').attr('id','desvio_salario_5');	
			
			
			$(".desvio_datainicio_1").attr("name","desvio_datainicio_1");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio_2");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio_3");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio_5");
			$(".desvio_datafim_1").attr("name","desvio_datafim_1");
			$(".desvio_datafim_2").attr("name","desvio_datafim_2");
			$(".desvio_datafim_3").attr("name","desvio_datafim_3");
			$(".desvio_datafim_4").attr("name","desvio_datafim");
			$(".desvio_datafim_5").attr("name","desvio_datafim_5");
		});
	
		$("#option_radio6").click(function (){
			$(".desvio_salario_1").prop("disabled", true);
			$('.desvio_salario_1').attr('id','desvio_salario_1');	
			$(".desvio_salario_2").prop("disabled", true);
			$('.desvio_salario_2').attr('id','desvio_salario_2');	
			$(".desvio_salario_3").prop("disabled", true);
			$('.desvio_salario_3').attr('id','desvio_salario_3');	
			$(".desvio_salario_4").prop("disabled", true);
			$('.desvio_salario_4').attr('id','desvio_salario_4');	
			$(".desvio_salario_5").prop("disabled", false);
			$('.desvio_salario_5').attr('id','desvio_salario');	
			
			
			$(".desvio_datainicio_1").attr("name","desvio_datainicio_1");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio_2");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio_3");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio_4");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio");
			$(".desvio_datafim_1").attr("name","desvio_datafim_1");
			$(".desvio_datafim_2").attr("name","desvio_datafim_2");
			$(".desvio_datafim_3").attr("name","desvio_datafim_3");
			$(".desvio_datafim_4").attr("name","desvio_datafim_4");
			$(".desvio_datafim_5").attr("name","desvio_datafim");
		});
		
		// btn escolhe função a ser ativada
		$("#funcaodesv_none").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline disabled');
			$("#radio_outrasfun").prop("disabled", true);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");
			$(".desvio_salario_3").attr("id","desvio_salario_3");
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");

			$(".desvio_datainicio_1").attr("name","desvio_datainicio_1");
			$(".desvio_datainicio_2").attr("name","desvio_datainicio_2");
			$(".desvio_datainicio_3").attr("name","desvio_datainicio_3");
			$(".desvio_datainicio_4").attr("name","desvio_datainicio_4");
			$(".desvio_datainicio_5").attr("name","desvio_datainicio_5");
			$(".desvio_datafim_1").attr("name","desvio_datafim_1");
			$(".desvio_datafim_2").attr("name","desvio_datafim_2");
			$(".desvio_datafim_3").attr("name","desvio_datafim_3");
			$(".desvio_datafim_4").attr("name","desvio_datafim_4");
			$(".desvio_datafim_5").attr("name","desvio_datafim_5");
			
			$("#option_radio2").prop("checked", true);
			$("#option_radio3").prop("checked", false);
			$("#option_radio4").prop("checked", false);
			$("#option_radio5").prop("checked", false);
			$("#option_radio6").prop("checked", false);
			$("#desvio_cargo_1,#desvio_salario,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", true);
			$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", true);
			$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", true);
			$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", true);
			$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", true);
		});

		$("#funcaodesv_1").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline');
			$("#radio_outrasfun").prop("disabled", false);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");
			$(".desvio_salario_3").attr("id","desvio_salario_3");	
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");
			
			$("#option_radio2").prop("checked", true);
			$("#desvio_cargo_1,.desvio_salario_1,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", false);
			$("#desvio_cargo_2,#desvio_salario_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", true);
			$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", true);
			$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", true);
			$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", true);
		});

		$("#funcaodesv_2").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline');
			$("#radio_outrasfun").prop("disabled", false);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");
			$(".desvio_salario_3").attr("id","desvio_salario_3");
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");
			
			$("#desvio_cargo_1,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", false);
			$("#desvio_cargo_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", false);
			$("#desvio_cargo_3,#desvio_salario_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", true);
			$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", true);
			$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", true);
		});

		$("#funcaodesv_3").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline');
			$("#radio_outrasfun").prop("disabled", false);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");
			$(".desvio_salario_3").attr("id","desvio_salario_3");
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");
			
			$("#desvio_cargo_1,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", false);
			$("#desvio_cargo_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", false);
			$("#desvio_cargo_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", false);
			$("#desvio_cargo_4,#desvio_salario_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", true);
			$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", true);
		});

		$("#funcaodesv_4").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline');
			$("#radio_outrasfun").prop("disabled", false);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");	
			$(".desvio_salario_3").attr("id","desvio_salario_3");
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");
			
			$("#desvio_cargo_1,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", false);
			$("#desvio_cargo_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", false);
			$("#desvio_cargo_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", false);
			$("#desvio_cargo_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", false);
			$("#desvio_cargo_5,#desvio_salario_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", true);
		});

		$("#funcaodesv_5").click(function (){
			$('#label_radio_outrfun').attr('class','radio-inline');
			$("#radio_outrasfun").prop("disabled", false);
			
			$(".desvio_salario_1").attr("id","desvio_salario");
			$(".desvio_salario_2").attr("id","desvio_salario_2");	
			$(".desvio_salario_3").attr("id","desvio_salario_3");	
			$(".desvio_salario_4").attr("id","desvio_salario_4");
			$(".desvio_salario_5").attr("id","desvio_salario_5");
			
			$("#desvio_cargo_1,#desvio_datainicio_1,#desvio_datafim_1,#option_radio2").prop("disabled", false);
			$("#desvio_cargo_2,#desvio_datainicio_2,#desvio_datafim_2,#option_radio3").prop("disabled", false);
			$("#desvio_cargo_3,#desvio_datainicio_3,#desvio_datafim_3,#option_radio4").prop("disabled", false);
			$("#desvio_cargo_4,#desvio_datainicio_4,#desvio_datafim_4,#option_radio5").prop("disabled", false);
			$("#desvio_cargo_5,#desvio_datainicio_5,#desvio_datafim_5,#option_radio6").prop("disabled", false);
		});
	});
		</script>
	</div>
	</div><!-- tab Outras Funções -->
    <div class="tab-pane fade" id="tab15">
<script type="text/javascript">
$(document).on('click', '.panel-heading span.clickable', function(e){
    var $this = $(this);
	if(!$this.hasClass('panel-collapsed')) {
		$this.parents('.panel').find('.panel-body').slideUp();
		$this.addClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	} else {
		$this.parents('.panel').find('.panel-body').slideDown();
		$this.removeClass('panel-collapsed');
		$this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	}
})
</script>
<style type="text/css">
.row{
    margin-top:40px;
    padding: 0 10px;
}

.clickable{
    cursor: pointer;   
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
</style>
<div class="container">
    <div class="row">
		<div class="col-md-14">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Informação do dano moral</h3>
					<span class="pull-right clickable panel-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body" style="display:none;">
                <textarea class="form-control" id="obs_dano" name="obs_dano" rows="15" placeholder="Campo exclusivo para informações do dano moral realizado no momento do cadastro"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>               
<div class="container">
    <div class="row">
		<div class="col-md-14">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Configurações do dano moral</h3>
					<span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
				</div>
				<div class="panel-body">
                <textarea id="textarea_danomoral" name="textarea_danomoral" class="textarea" rows="15">
                <p style="text-indent: 17.05em; margin-top: 0">
                Foram emitidos juízos de valor de caráter depreciativo, e moral:
                <b>
                <u>
                CONTINUE...
                </u>
                </b>
                </p>
                </textarea>
				</div>
			</div>
		</div>
	</div>
</div>    
<div class="container">
    <div class="row">
		<div class="col-md-3">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title">Salário minimo atual</h3>
					<span class="pull-right clickable panel-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span>
				</div>
				<div class="panel-body" style="display:none;">
                <input type="text" class="form-control" value="937.00" id="salario_minimo_hoje" name="salario_minimo_hoje" disabled>
				<input type="hidden" class="form-control" value="37080.00" id="limt_hordinario" name="limt_hordinario">
				<input type="hidden" class="form-control" value="1874.00" id="limt_sumario" name="limt_sumario">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
//script para receber salario minino atual
	
</script>
                              
	</div><!-- tab Dano Moral -->
    <div class="tab-pane fade" id="tab16">
                <div class="form-group col-md-5">
					<label>Agente periculoso <small>(separado por virgula)</small> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe os agentes periculosos separado por virgula e espaço, a forma que for escrita no campo será a forma que ira ser apresentada na petição inicial. EX.: Gasolina, Altura, Armas"></span></label><br>
                <input class="form-control" id="obj_periculoso" name="obj_periculoso" data-role="tagsinput">
<input type="hidden" class="form-control" id="txt_conf_peri1" name="txt_conf_peri1" value="temos que a reclamada jamais remunerou lhe com o adicional de periculosidade devido" disabled>
<input type="hidden" class="form-control" id="txt_conf_peri2" name="txt_conf_peri2" value="temos que a reclamada somente veio a reconhecer o adiconal de periculosidade após a seguinte data:">
                </div>
                <div class="form-group col-md-4">
					<label>Mês/Ano do reconhecimento periculoso <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe a data do reconhecimento periculoso pelo empregador no caso de reconhecimento do agente periculoso após contratação, certifique-se desta opção estar habilitada"></span></label>
                <select type="text" class="form-control" id="mes_periculoso1" name="mes_periculoso1">
                <option value="janeiro de" selected>Janeiro</option>
                <option value="fevereiro de">Fevereiro</option>
                <option value="março de">Março</option>
                <option value="abril de">Abril</option>
                <option value="maio de">Maio</option>
                <option value="junho de">Junho</option>
                <option value="julho de">Julho</option>
                <option value="agosto de">Agosto</option>
                <option value="setembro de">Setembro</option>
                <option value="outubro de">Outubro</option>
                <option value="novembro de">Novembro</option>
                <option value="dezembro de">Dezembro</option>
                </select>
                <select type="text" class="form-control" id="ano_periculoso1" name="ano_periculoso1">
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015" selected>2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                </select>
                </div>
                <div class="form-group col-md-3">
                <label>Reconhecimento do adicional <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe se o adicional foi reconhecido ou não foi reconhecido pelo empregador.: Off/Cinza (Não reconhecido) On/Azul (Reconhecido)"></span></label>
                                    <div id="check_conf_periculoso">
                                    <br>
                                        <label class="switch">
    <input type="checkbox" checked onClick="bloqdesbloq('txt_conf_peri1');bloqdesbloq('txt_conf_peri2');bloqdesbloq('mes_periculoso1');bloqdesbloq('ano_periculoso1')" id="swit_periculoso">
                                        <div class="slider round"></div>
                                        </label>
                                    </div>
                </div>
	</div><!-- tab adicional de periculosidade -->
    <div class="tab-pane fade" id="tab17">
                <div class="form-group col-md-5">
                <label>Agente insalubre <small>(separado por virgula)</small> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe os agentes insalubre separado por virgula e espaço, a forma que for escrita no campo será a forma que ira ser apresentada na petição inicial. EX.: Cloro, Acido, Pó, Barulho"></span></label><br>
                <input class="form-control" id="obj_insalubre" name="obj_insalubre" data-role="tagsinput">
<input type="hidden" class="form-control" id="txt_conf_insa1" name="txt_conf_insa1" value="não vindo a reconher o adicional até a presente data" disabled>
<input type="hidden" class="form-control" id="txt_conf_insa2" name="txt_conf_insa2" value="somente vindo a reconhecer o adicional devido em">
				</div>
                <div class="form-group col-md-4">
					<label>Mês/Ano do reconhecimento insalubre <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe a data do reconhecimento insalubre pelo empregador em casos de reconhecimento do agente insalubre após contratação, certifique-se desta opção estar habilitada"></span></label>
                <select type="text" class="form-control" id="mes_insalubre1" name="mes_insalubre1">
                <option value="janeiro de" selected>Janeiro</option>
                <option value="fevereiro de">Fevereiro</option>
                <option value="março de">Março</option>
                <option value="abril de">Abril</option>
                <option value="maio de">Maio</option>
                <option value="junho de">Junho</option>
                <option value="julho de">Julho</option>
                <option value="agosto de">Agosto</option>
                <option value="setembro de">Setembro</option>
                <option value="outubro de">Outubro</option>
                <option value="novembro de">Novembro</option>
                <option value="dezembro de">Dezembro</option>
                </select>
                <select type="text" class="form-control" id="ano_insalubre1" name="ano_insalubre1">
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015" selected>2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                </select>
                </div>
                <div class="form-group col-md-3">
                <label>Reconhecimento do adicional <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe se o adicional foi reconhecido ou não foi reconhecido pelo empregador.: Off/Cinza (Não reconhecido) On/Azul (Reconhecido)"></span></label>
                                    <div id="check_conf_insalubre">
                                    <br>
                                        <label class="switch">
    <input type="checkbox" checked onClick="bloqdesbloq('txt_conf_insa1');bloqdesbloq('txt_conf_insa2');bloqdesbloq('mes_insalubre1');bloqdesbloq('ano_insalubre1')" id="swit_avisopre">
                                        <div class="slider round"></div>
                                        </label>
                                    </div>
                </div>
	</div><!-- tab adicional de isalubridade -->
    <div class="tab-pane fade" id="tab18">
                <h3>&nbsp;Convenção Coletiva - Reajuste <small>(convenção coletiva dos trabalhadores)</small></h3>
                <div class="form-group col-md-2">
                <label for="titulo">Posição cláusula <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe qual é a cláusula do reajuste conforme CCT da categoria do trabalhador. Obs.: Use apenas numeros para definir Ex.:(Primeira = 1) o resultado na inicial será (Cláusula 1ª)"></span></label>
                <input type="text" class="form-control" id="reaj_clausula" name="reaj_clausula">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Rejuste dia</label>
                <select type="text" class="form-control" id="reaj_day" name="reaj_day">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
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
                <label for="titulo">Rejuste mês</label>
                <select type="text" class="form-control" id="reaj_mes" name="reaj_mes">
                <option value="janeiro" selected>Janeiro</option>
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
                <label for="titulo">Rejuste ano</label>
                <select type="text" class="form-control" id="reaj_ano" name="reaj_ano">
                            <option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017" selected>2017</option>
                            <option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Porcentual <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe qual é o porcentual do reajuste conforme covenção coletiva dos trabalhadores. Use apenas numeros e virgula"></span></label>
                <input type="text" class="form-control" value="0" id="reaj_%" name="reaj_%">
                </div>
                <div class="form-group col-md-2 transparente">
                <label for="titulo">funções da área</label>
                <input type="text" class="form-control" value="" id="" name="" disabled>
                </div>
                <div class="form-group col-md-4">
                <label for="titulo">base do salário</label>
                <select type="text" class="form-control" id="reaj_txtbasesal" name="reaj_txtbasesal">
                <option value="de até" selected>RECEBE ATÉ SALÁRIO BASE</option>
                <option value="de">RECEBE O SALÁRIO BASE</option>
                <option value="acima de">RECEBE ACIMA DO SALÁRIO BASE</option>
                <option value="inferior que">RECEBE ABAIXO DO SALÁRIO BASE</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">reajuste base</label>
                <input type="text" class="form-control" value="0.00" id="reaj_salbs2" name="reaj_salbs2" onkeypress="return(MascaraMoeda(this,'','.',event))">
                </div>
	</div><!-- tab reajuste salarial -->
    <div class="tab-pane fade" id="tab19">
                <h3>&nbsp;Convenção Coletiva - Vigência <small>(convenção coletiva dos trabalhadores)</small></h3>
                <div class="form-group col-md-2">
                <label for="titulo">Cláusula vigência <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Digite qual é a cláusula que informa a vigência da CCT mencionada. Obs.: Use apenas numeros para definir Ex.:(Primeira = 1) o resultado na inicial será (Cláusula 1ª)"></span></label>
                <input type="number" class="form-control" id="vigen_clausula" name="vigen_clausula">
                </div>
                <div class="form-group col-md-2 has-success">
                <label for="titulo">Vigência dia</label>
                <select type="text" class="form-control" id="vigen_inicio_dia" name="vigen_inicio_dia">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
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
                <div class="form-group col-md-2 has-success">
                <label for="titulo">Vigência mês</label>
                <select type="text" class="form-control" id="vigen_inicio_mes" name="vigen_inicio_mes">
                <option value="janeiro" selected>Janeiro</option>
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
                <div class="form-group col-md-2 has-success">
                <label for="titulo">Vigência ano</label>
                <select type="text" class="form-control" id="vigen_inicio_ano" name="vigen_inicio_ano">
                            <option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017" selected>2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>                </select>
                </div>
                <div class="form-group col-md-4 transparente">
					<label for="title">div transparente</label>
               <input type="text" class="form-control" id="" name="" disabled>
				</div> 
                <div class="form-group col-md-2 has-success">
                <label for="titulo">fim da vigência dia</label>
                <select type="text" class="form-control" id="vigen_fim_dia" name="vigen_fim_dia">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
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
                <div class="form-group col-md-2 has-success">
                <label for="titulo">fim da vigência mês</label>
                <select type="text" class="form-control" id="vigen_fim_mes" name="vigen_fim_mes">
                <option value="janeiro" selected>Janeiro</option>
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
                <div class="form-group col-md-2 has-success">
                <label for="titulo">fim da vigência ano</label>
                <select type="text" class="form-control" id="vigen_fim_ano" name="vigen_fim_ano">
                            <option value="2020" selected>2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option>                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Última cláusula <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Informe qual é a posição da ultima cláusula da atual covenção. Obs.: Use apenas numeros para definir Ex.:(Trigésima quarta = 34) o resultado na inicial será (Cláusula 34ª)"></span></label>
                <input type="number" class="form-control" id="vigen_fim_clausula" name="vigen_fim_clausula">
                </div>
	</div><!-- tab vigencia da covenção coletiva dos trabalhadores -->
    <div class="tab-pane fade" id="tab20">
                <h3>&nbsp;Pleiteia</h3>
                <div class="form-group col-md-4">
                <div class="checkbox">
            <label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_1')" id="" name=""><u>Vinculo empregaticio</u></label>
                </div>
                <label>Reconhecimento do vinculo pelo empregador anotado em CTPS</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_2')" id="" name=""><u>Expedir INSS,DRT,CEF e denunciar</u></label>
                </div>
                <label>Expedição de Oficios INSS, DRT, CEF e denunciar iregularidades para sanções</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_3')" id="" name=""><u>Outorga GR's e RE's para apurar</u></label>
                </div>
                <label>Outorga guias GR's e RE's para apuração de diferença de FGTS</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_4')" id="" name="" checked><u>Justiça Gratuita</u></label>
                </div>
                <label>Benefícios da justiça gratuita juntamente com declaração de hipossuficiência</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_5')" id="" name=""><u>Apresentação GR's e RE's para apurar</u></label>
                </div>
                <label>Outorga guias GR's e RE's para apuração de diferença de depósito fundiários</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_6')" id="" name=""><u>Anotação da data de baixa na CTPS</u></label>
                </div>
                <label>Anotação da data de baixa na CTPS para que surta os efeitos previdenciários</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_7')" id="" name=""><u>Decretação da responsábilidade subsidiária</u></label>
                </div>
                <label>Decretação da responsabilidade subsidiária das reclamadas para que surta efeitos</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_8')" id="" name=""><u>Nulidade de contrato de estágio</u></label>
                </div>
                <label>Nulidade do contrato de estágiario nos termos do fundamentos</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_9')" id="" name=""><u>Nulidade de contrato de aprendiz</u></label>
                </div>
                <label>Nulidade do contrato de aprendiz nos termos do fundamentos</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_10')" id="" name=""><u>Nulidade de contrato de estágio após</u></label>
                </div>
                <label>Nulidade do contrato de estágiario assinado após contratação</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_11')" id="" name=""><u>Nulidade de contrato de aprendiz após</u></label>
                </div>
                <label>Nulidade do contrato de aprendiz assinado após contratação</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_none_12')" id="" name=""><u>Aplicação de indenização do art. 404 CC</u></label>
                </div>
                <label>Aplicação da indenização compensatória prevista no artigo 404 do CC, fundamentado.</label>
                </div>
                
                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_personalizado1')" id="" name=""><u>Pleiteia personalizado</u></label>
                </div>
                <input type="text" class="form-control" id="pl_personalizado1" name="pl_personalizado1" disabled>
                </div>

                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_personalizado2')" id="" name=""><u>Pleiteia personalizado</u></label>
                </div>
                <input type="text" class="form-control" id="pl_personalizado2" name="pl_personalizado2" disabled>
                </div>

                <div class="form-group col-md-4">
                <div class="checkbox">
<label><input class="checkbox" type="checkbox" onClick="bloqdesbloq('pl_personalizado3')" id="" name=""><u>Pleiteia personalizado</u></label>
                </div>
                <input type="text" class="form-control" id="pl_personalizado3" name="pl_personalizado3" disabled>
                </div>
                <!-- input none oculta -->
                	<div id="dados-none-pleteia" hidden="">
                                <div class="form-group col-md-2">
                                <label for="text">None Vinculo</label>
                                <input type="text" class="form-control" id="pl_none_1" name="pl_none_1" value="none">
                                </div>

                                <div class="form-group col-md-2">
                                <label for="text">None Expedir INSS</label>
                                <input type="text" class="form-control" id="pl_none_2" name="pl_none_2" value="none">
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Outorga Guias</label>
                                <input type="text" class="form-control" id="pl_none_3" name="pl_none_3" value="none">
                                </div>

                                <div class="form-group col-md-2">
                                <label for="text">None Justiça Gratuita</label>
                                <input type="text" class="form-control" id="pl_none_4" name="pl_none_4" value="none" disabled>
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Apresentação Gruias</label>
                                <input type="text" class="form-control" id="pl_none_5" name="pl_none_5" value="none">
                                </div>

                                <div class="form-group col-md-2">
                                <label for="text">None Anotação CTPS</label>
                                <input type="text" class="form-control" id="pl_none_6" name="pl_none_6" value="none">
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Subsidiaria</label>
                                <input type="text" class="form-control" id="pl_none_7" name="pl_none_7" value="none">
                                </div>

                                <div class="form-group col-md-2">
                                <label for="text">None Nulidade estagio</label>
                                <input type="text" class="form-control" id="pl_none_8" name="pl_none_8" value="none">
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Nulidade Aprendiz</label>
                                <input type="text" class="form-control" id="pl_none_9" name="pl_none_9" value="none">
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Nulidade estágio pós</label>
                                <input type="text" class="form-control" id="pl_none_10" name="pl_none_10" value="none">
                                </div>    

                                <div class="form-group col-md-2">
                                <label for="text">None Nulidade aprendiz pós</label>
                                <input type="text" class="form-control" id="pl_none_11" name="pl_none_11" value="none">
                                </div>    
                                
                                <div class="form-group col-md-2">
                                <label for="text">Aplicação 404 CC</label>
                                <input type="text" class="form-control" id="pl_none_12" name="pl_none_12" value="none">
                                </div>    
                    </div>                                        
	</div><!-- tab pleiteia -->
    <div class="tab-pane fade" id="tab21">


	</div>
	<!-- tab vazia -->
                    </form>
	</div>
<script type="text/javascript"> 
  }
</script>                    
</div>
</body>
    <script src="js/tag/dist/bootstrap-tagsinput.min.js"></script>
</html>
