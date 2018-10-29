<?php
require_once("../sessao/sessao.php");
require_once("../config.php");	

	$oab   = $_SESSION['oab'];
	$senha   = $_SESSION['senha'];
	
	$verb_val_inp03 = $_POST['verb_val_inp03'];
	$salario = $_POST['salario'];
	$valor_fora = $_POST['valor_fora'];
	$remu_total = $_POST['remu_total'];
	$homo_valor = $_POST['homo_valor'];
	$reaj_salbs2 = $_POST['reaj_salbs2'];
	$data_ent = $_POST['data_ent'];	
	
class Function_Horas_Parte{
    public static function get_data_array($data,$part=''){
       $data_ = array();
       $data_["ano"] = substr($data,0,4);
       $data_["mes"] = substr($data,5,2);
       $data_["dia"] = substr($data,8,2);
       if(empty($part))return $data_;
       return $data_[$part];
    }
     
    public static function get_data_array_br($data,$part=''){
       $data_ = array();
       $data_["ano"] = substr($data,6,4);
       $data_["mes"] = substr($data,3,2);
       $data_["dia"] = substr($data,0,2);
       if(empty($part))return $data_;
       return $data_[$part];
    }   
}
 
$data = "$data_ent";
	
$anderson_makiyama_functions = new Function_Horas_Parte();
$data_array = $anderson_makiyama_functions->get_data_array_br($data);
//variavel form inicial.php
	
$hrs_ent = $_POST['1hrs_ent'];
$min_ent = $_POST['1min_ent'];
	if(empty($hrs_ent || $min_ent)){
		$hrsmin_ent = "__:__";
	}else{
$hrsmin_ent = $hrs_ent.h.$min_ent.m;
	};
	
$hrs_saida = $_POST['1hrs_saida2'];
$min_saida = $_POST['1min_saida2'];
	if(empty($hrs_saida && $min_saida)){
		$hrsmin_saida = "__:__";
	}else{
$hrsmin_saida = $hrs_saida.h.$min_saida.m;
	};
	
$hrs_int_e = $_POST['1hrs_int_e'];
$min_int_e = $_POST['1min_int_e'];
$hrs_int_entrada = $hrs_int_e.':'.$min_int_e;
	
$hrs_int_s = $_POST['1hrs_int_s'];
$min_int_s = $_POST['1min_int_s'];
$hrs_int_saida = $hrs_int_s.':'.$min_int_s;
	if($hrs_int_entrada == $hrs_int_saida){
		$hrs_intervalo = "sem tempo";
	}else{
		$hrs_intervalo = "realizando o horario das ".$hrs_int_entrada." até as ".$hrs_int_saida;
	};
	
$escala_trab = $_POST['escala_trab'];
	if(empty($escala_trab)){
		$escala_trab2 = ".";
	}else{
		$escala_trab2 = ", perfazendo uma escala de trabalho ". $escala_trab;
	};

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Ajuste de Inicial</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
 <script src="js/tinymce/js/tinymce/tinymce.min.js"></script>
 <script type="text/javascript">tinymce.init({ selector:'textarea' });</script>
    <script type="text/javascript">
	//Script desabilita texto areas
    function aba2x1() {
        sah1(document.getElementById("aba2_contrab_01"));
    }
    function aba2x2() {
        sah1(document.getElementById("aba2_contrab_02"));
    }
    function aba2x3() {
        sah1(document.getElementById("aba2_contrab_03"));
    }
    function aba2x4() {
        sah1(document.getElementById("aba2_contrab_04"));
    }
    function aba2x5() {
        sah1(document.getElementById("aba2_contrab_05"));
    }
    function aba2x6() {
        sah1(document.getElementById("aba2_contrab_06"));
    }
    function aba3x1() {
        sah1(document.getElementById("aba3_dasfuncao_01"));
    }
    function aba3x2() {
        sah1(document.getElementById("aba3_dasfuncao_02"));
    }
    function aba3x3() {
        sah1(document.getElementById("aba3_dasfuncao_03"));
    }
    function aba4x1() {
        sah1(document.getElementById("aba4_lei7238/84_01"));
    }
    function aba5x1() {
        sah1(document.getElementById("aba5_pgfora_01"));
    }
    function aba6x1() {
        sah1(document.getElementById("aba6_jornadatrab_01"));
    }
    function aba7x1() {
        sah1(document.getElementById("aba7_hrsextraord_01"));
    }
    function aba8x1() {
        sah1(document.getElementById("aba8_integracoes_01"));
    }
    function aba9x1() {
        sah1(document.getElementById("aba9_verbasrecisorias_01"));
    }
    function aba10x1() {
        sah1(document.getElementById("aba10_fgts_01"));
    }
    function aba11x1() {
        sah1(document.getElementById("aba11_art467_01"));
    }
    function aba12x1() {
        sah1(document.getElementById("aba12_compensacao_01"));
    }
    function aba13x1() {
        sah1(document.getElementById("aba13_indeseguro_01"));
    }
    function aba14x1() {
        sah1(document.getElementById("aba14_perdadanos404_01"));
    }
    function aba15x1() {
        sah1(document.getElementById("aba15_jusgratuita_01"));
    }
    function aba16x1() {
        sah1(document.getElementById("aba16_expoficios_01"));
    }
    function aba1d3x1() {
        sah1(document.getElementById("aba1_3_desvio_acumulo_01"));
    }
    function aba1d3x1_2() {
        sah1(document.getElementById("aba1_3_desvio_acumulo_02"));
    }
    function aba19x1() {
        sah1(document.getElementById("aba19_dano_moral_01"));
    }
	function aba20x1() {
        sah1(document.getElementById("aba20_art_477"));
		}
	function aba21x1() {
        sah1(document.getElementById("aba21_insalubridade_01"));
		}
	function aba32x1() {
        sah1(document.getElementById("aba32_adctranfer_01"));
		} 
	function aba33x1() {
        sah1(document.getElementById("aba24_equiparacao_01"));
		} 
	function aba31x1() {
        sah1(document.getElementById("aba22_periculosidade_01"));
		} 
	function aba31x2() {
        sah1(document.getElementById("aba22_periculosidade_02"));
		} 
	function aba34x1() {
        sah1(document.getElementById("aba25_plr_01"));
		} 
	function aba35x1() {
        sah1(document.getElementById("aba26_intervalos_01"));
		} 
	function aba36x1() {
        sah1(document.getElementById("aba27_valerefeição_01"));
		} 
	function aba37x1() {
        sah1(document.getElementById("aba28_cestabasica_01"));
		} 
	function aba38x1() {
        sah1(document.getElementById("aba29_hrsnoturnareduzida_01"));
		} 
	function aba39x1() {
        sah1(document.getElementById("aba30_hrsnoturna_01"));
		} 
	function aba40x1() {
        sah1(document.getElementById("aba31_hrsnoturnareduzida_01"));
		} 
	function aba41x1() {
        sah1(document.getElementById("aba32_hrsdomferiados_01"));
		} 
	function aba42x1() {
        sah1(document.getElementById("aba33_descontoindevido_01"));
		}	
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
	//função script para iniciar o texto area desativado
	window.onload = function(){
aba2x2();esconder('area2');aba2x3();esconder('area3');aba2x4();esconder('area4');
aba2x5();esconder('area5');aba2x6();esconder('area6');aba3x2();esconder('area8');
aba3x3();esconder('area9');aba4x1();esconder('area10');aba5x1();esconder('area11');
aba6x1();esconder('area12');aba7x1();esconder('area13');aba8x1();esconder('area14');
aba9x1();esconder('area15');aba10x1();esconder('area16');aba11x1();esconder('area17');
aba12x1();esconder('area18');aba13x1();esconder('area19');aba14x1();esconder('area20');
aba15x1();esconder('area21');aba16x1();esconder('area22');aba1d3x1();esconder('area24');
aba32x1();esconder('area32');aba31x1();esconder('area31');aba31x2();esconder('area31x2')
aba21x1();esconder('area30');aba20x1();esconder('area29');aba19x1();esconder('area25');
aba35x1();esconder('area35');aba34x1();esconder('area34');aba36x1();esconder('area36');
aba37x1();esconder('area37');aba38x1();esconder('area38');aba39x1();esconder('area39');
aba40x1();esconder('area40');aba1d3x1_2();esconder('area24_2');aba33x1();esconder('area33');
aba41x1();esconder('area41');aba42x1();esconder('area42');
btn_jornada();
}
	//função para ocultar texto area
function esconder(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';
}
    </script>
</head>
<body>
<?php
include 'menu_nav.php';
?>
<div class='container'>
<header class="row">
	<h1 class='text-center text-primary'>TÓPICOS - INICIAL TRABALHISTA</h1>
</header>
<br><br><br><br><br>
<div class="row" id="page-content">
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li><a href="inicial.php">Inicial</a></li>
	<li class="active">Parte 2</li>
</ol>
<br>
         		  <form action="" name="testeform" target="_black" method="post">
                    <p>
						<button type="submit" name="views" class="btn btn-primary" OnClick="document.testeform.action='inicial_word/index.php';document.testeform.submit();">
							<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Office Word
						</button>
                    </p>
<br>
 <div class="tabbable tabs-left"> 
 <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">dados iniciais</a></li>
    <li><a href="#tab2" data-toggle="tab">contrato de trabalho</a></li>
    <li><a href="#tab3" data-toggle="tab">funções exercidas</a></li>
    <li><a href="#tab18" data-toggle="tab">acumulo/desvio de função</a></li>
    <li><a href="#tab24" data-toggle="tab">equiparação salarial</a></li>
    <li><a href="#tab23" data-toggle="tab">adicional de transferência</a></li>
    <li><a href="#tab4" data-toggle="tab">lei 7.238/84</a></li>
    <li><a href="#tab5" data-toggle="tab">salário por fora</a></li>
    <li><a href="#tab25" data-toggle="tab">participação de lucros</a></li>
    <li><a href="#tab6" data-toggle="tab">jornadas de trabalho</a></li>
    <li><a href="#tab7" data-toggle="tab">horas extras</a></li>
    <li><a href="#tab26" data-toggle="tab">intervalo</a></li>
    <li><a href="#tab32" data-toggle="tab">extras aos domingos e feriados</a></li>
    <li><a href="#tab29" data-toggle="tab">horas noturna reduzida</a></li>
    <li><a href="#tab30" data-toggle="tab">adicional noturna</a></li>
    <li><a href="#tab31" data-toggle="tab">adicional noturno e horas reduzida</a></li>
    <li><a href="#tab8" data-toggle="tab">integrações</a></li>
    <li><a href="#tab22" data-toggle="tab">periculosidade</a></li>
    <li><a href="#tab21" data-toggle="tab">insalubridade</a></li>
    <li><a href="#tab9" data-toggle="tab">verbas recisórias</a></li>
    <li><a href="#tab10" data-toggle="tab">fundo de garantia</a></li>
    <li><a href="#tab11" data-toggle="tab">artigo 467 CLT</a></li>
    <li><a href="#tab20" data-toggle="tab">artigo 477 CLT</a></li>
    <li><a href="#tab27" data-toggle="tab">dos vales refeições</a></li>
    <li><a href="#tab28" data-toggle="tab">cesta básica</a></li>
    <li><a href="#tab33" data-toggle="tab">desconto indevido</a></li>
    <li><a href="#tab12" data-toggle="tab">compensação</a></li>
    <li><a href="#tab19" data-toggle="tab">dano moral</a></li>
    <li><a href="#tab13" data-toggle="tab">seguro desemprego</a></li>
    <li><a href="#tab14" data-toggle="tab">perda e danos 404 CC</a></li>
    <li><a href="#tab15" data-toggle="tab">justiça gratuita</a></li>
    <li><a href="#tab16" data-toggle="tab">expedição e oficios</a></li>
    <li><a href="#tab100" data-toggle="tab">verbas liquidas</a></li>
    <li><a href="#tab101" data-toggle="tab">pleteia ainda</a></li>
    <li><a href="#tab102" data-toggle="tab">requerimentos</a></li>
  </ul>
  <br>
  <div class="tab-content">
<div class="tab-pane fade in active" id="tab1">
     <textarea id="aba1_ddsgeral" name="aba1_ddsgeral" rows="25">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<div><p style="text-indent:17.05em;margin-top:0%"><b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nomecompleto']); ?></b>, filh<?php echo htmlspecialchars($_POST['sex_singular']); ?> de <b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_mae']); ?></b> e de <b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_pai']); ?></b>, <?php echo htmlspecialchars($_POST['nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['estadocivil']); ?>, <b><?php echo htmlspecialchars($_POST['nome_cargo']); ?></b>, nascid<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <b style="text-decoration:underline;"><?php echo htmlspecialchars($_POST['nasc_dia']); ?> de <?php echo htmlspecialchars($_POST['nasc_mes']); ?> de <?php echo htmlspecialchars($_POST['nasc_ano']); ?></b>, portador<?php echo htmlspecialchars($_POST['sex_or']); ?> do RG. n.º <b><?php echo htmlspecialchars($_POST['rg_num']); ?>-SSP/<?php echo htmlspecialchars($_POST['rg_origem']); ?></b>, expedido em <?php echo htmlspecialchars($_POST['rg_data_exp']); ?>, PIS nº <b><?php echo htmlspecialchars($_POST['pis_num']); ?></b>, inscrit<?php echo htmlspecialchars($_POST['sex_singular']); ?> no CPF/MF sob o n.º <b><?php echo htmlspecialchars($_POST['cliente_cpf_num']); ?></b> e da CTPS nº <b><?php echo htmlspecialchars($_POST['ctps_numero']); ?></b>, série <b><?php echo htmlspecialchars($_POST['ctps_serie']); ?>-<?php echo htmlspecialchars($_POST['ctps_uf']); ?></b>, residente e domiciliad<?php echo htmlspecialchars($_POST['sex_singular']); ?> na <?php echo htmlspecialchars($_POST['end_rua']); ?>, <?php echo htmlspecialchars($_POST['end_numero']); ?>, <?php echo htmlspecialchars($_POST['end_complemento']); ?>, <?php echo htmlspecialchars($_POST['end_bairro']); ?>, em <?php echo htmlspecialchars($_POST['end_cidade']); ?>-<?php echo htmlspecialchars($_POST['end_uf']); ?> - CEP <?php echo htmlspecialchars($_POST['cliente_cep']); ?>, por seu advogado que está subscreve, vem, com o devido e costumeiro acatamento à presença de Vossa Excelência, propor a presente <b>RECLAMAÇÃO TRABALHISTA</b> pelo <b>PROCEDIMENTO  <?php echo htmlspecialchars($_POST['rito']); ?></b>, em face de</p>
</div> 
<!-- 1ª reclamada -->
<div style="font-size:16px;"><p style="text-indent: 17.05em;margin-top:0%"><b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_emp']); ?></b>, pessoa <?php echo htmlspecialchars($_POST['emp_tipo']); ?> de direito privado, inscrita no CNPJ sob nº <b><?php echo htmlspecialchars($_POST['cnpj_cpf']); ?></b>, estabelecida na <?php echo htmlspecialchars($_POST['emp_rua']); ?> nº  <?php echo htmlspecialchars($_POST['emp_num']); ?>, <?php echo htmlspecialchars($_POST['emp_comp']); ?> – <?php echo htmlspecialchars($_POST['emp_bairro']); ?> – <?php echo htmlspecialchars($_POST['emp_city']); ?>-<?php echo htmlspecialchars($_POST['emp_uf']); ?>., CEP <?php echo htmlspecialchars($_POST['emp_cep']); ?>, </p>
</div>
<!-- 2ª reclamada -->
<div style="font-size:16px;text-indent:17.05em;" <?php echo htmlspecialchars($_POST['emp_2_ok']); ?>>
<b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['emp_segunta']); ?></b>, pessoa <?php echo htmlspecialchars($_POST['tipo_emp_segunda']); ?> de direito privado, inscrita no CPF/CNPJ sob nº <b><?php echo htmlspecialchars($_POST['cnpj_segunda']); ?></b>, estabelecida na <?php echo htmlspecialchars($_POST['rua_emp_segunda']); ?> – nº <?php echo htmlspecialchars($_POST['num_emp_segunda']); ?> <?php echo htmlspecialchars($_POST['comp_emp_segunda']); ?> - CEP <?php echo htmlspecialchars($_POST['cep_segunda']); ?> - <?php echo htmlspecialchars($_POST['bairro_emp_segunda']); ?> - <?php echo htmlspecialchars($_POST['city_emp_segunda']); ?>-<?php echo htmlspecialchars($_POST['uf_emp_segunda']); ?>.
</div>

<!-- 3ª reclamada -->
<div style="font-size:16px;text-indent:17.05em;" <?php echo htmlspecialchars($_POST['emp_3_ok']); ?>>
<b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['emp_terceira']); ?></b>, pessoa <?php echo htmlspecialchars($_POST['tipo_emp_terceira']); ?> de direito privado, inscrita no CPF/CNPJ sob nº <b><?php echo htmlspecialchars($_POST['cnpj_terceira']); ?></b>, estabelecida na <?php echo htmlspecialchars($_POST['rua_emp_terceira']); ?> – nº <?php echo htmlspecialchars($_POST['num_emp_terceira']); ?> <?php echo htmlspecialchars($_POST['comp_emp_terceira']); ?> - CEP <?php echo htmlspecialchars($_POST['cep_terceira']); ?> - <?php echo htmlspecialchars($_POST['bairro_emp_terceira']); ?> - <?php echo htmlspecialchars($_POST['city_emp_terceira']); ?>-<?php echo htmlspecialchars($_POST['uf_emp_terceira']); ?>.
</div>

<!-- 4ª reclamada -->
<div style="font-size:16px;text-indent:17.05em;" <?php echo htmlspecialchars($_POST['emp_4_ok']); ?>>
<b style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['emp_quarta']); ?></b>, pessoa <?php echo htmlspecialchars($_POST['tipo_emp_quarta']); ?> de direito privado, inscrita no CPF/CNPJ sob nº <b><?php echo htmlspecialchars($_POST['cnpj_quarta']); ?></b>, estabelecida na <?php echo htmlspecialchars($_POST['rua_emp_quarta']); ?> – nº <?php echo htmlspecialchars($_POST['num_emp_quarta']); ?> <?php echo htmlspecialchars($_POST['comp_emp_quarta']); ?> - CEP <?php echo htmlspecialchars($_POST['cep_quarta']); ?> - <?php echo htmlspecialchars($_POST['bairro_emp_quarta']); ?> - <?php echo htmlspecialchars($_POST['city_emp_quarta']); ?>-<?php echo htmlspecialchars($_POST['uf_emp_quarta']); ?>.
</div>

<div style="text-indent:17.05em;margin-bottom:0%;">
pelos motivos de fato e de direito que a seguir aduz:
</div>

<div <?php echo($_POST['on_emp_sub']); ?>>
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;" <?php echo($_POST['on_emp_sub']); ?>>
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA RESPONSABILIDADE SUBSIDIARIA DAS RECLAMADAS</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em;font-family:Book Antiqua;font-size:16px;">Informa o reclamante que foi contratado pela primeira reclamada, porém prestava serviços a<?php echo htmlspecialchars($_POST['txt_2_3_4_s']); ?> <?php echo htmlspecialchars($_POST['txt_2_3_4']); ?> reclamada<?php echo htmlspecialchars($_POST['txt_2_3_4_s']); ?> em todo o lapso laboral, razão pela qual requer que, seja a<?php echo htmlspecialchars($_POST['txt_2_3_4_s']); ?> <?php echo htmlspecialchars($_POST['txt_2_3_4']); ?> reclamada<?php echo htmlspecialchars($_POST['txt_2_3_4_s']); ?> declarada responsável subsidiariamente aos termos da presente ação, sendo que a decretação subsidiaria encontra respaldo na Sumula 331 e OJ-SDI1-1, abaixo inserida que assim se dispõem:
</p>    

<table align="center" style="width:600px;height:auto;border:1px solid;background-color:#cccccc;text-align:justify;font-weight:bold;" <?php echo($_POST['on_emp_sub']); ?>>
<tbody>
<tr>
<td>
<p>SUM-331	CONTRATO DE PRESTAÇÃO DE SERVIÇOS. LEGALIDADE (nova redação do item IV e inseridos os itens V e VI à redação) - Res. 174/2011, DEJT divulgado em 27, 30 e 31.05.2011</p>
<p>Súmula alterada (inciso IV)  - Res. 96/2000, DJ 18, 19 e 20.09.2000 Nº 331 (...)</p>
<p>
IV - O inadimplemento das obrigações trabalhistas, por parte do empregador, implica a responsabilidade subsidiária do tomador dos serviços, quanto àquelas obrigações, inclusive quanto aos órgãos da administração direta, das autarquias, das fundações públicas, das empresas públicas e das sociedades de economia mista, desde que hajam participado da relação processual e constem também do título executivo judicial (art. 71 da Lei nº 8.666, de 21.06.1993).
</p>
</td>
</tr>
</tbody>
</table>
<p style="margin-bottom:0%;margin-top:0%;"></p>
</div>

<div <?php echo($_POST['on_emp_sol']); ?>>
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;" <?php echo($_POST['on_emp_sol']); ?>>
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA RESPONSABILIDADE SOLIDARIA DAS RECLAMADAS</strong></p>
</td>
</tr>
</tbody>
</table>
<div <?php echo htmlspecialchars($_POST['sub_txt_none']); ?>>
<p style="margin-bottom: 0%;text-indent: 17.05em;">As empresas, face o que dispõe o artigo 455, da CLT: Art. 455 - Nos contratos de subempreitada responderá o subempreiteiro pelas obrigações derivadas do contrato de trabalho que celebrar, cabendo, todavia, aos empregados, o direito de reclamação contra o empreiteiro principal pelo inadimplemento daquelas obrigações por parte do primeiro. Parágrafo único - Ao empreiteiro principal fica ressalvada, nos termos da lei civil, ação regressiva contra o subempreiteiro e a retenção de importâncias a este devidas, para a garantia das obrigações previstas neste artigo. No caso de omissão do acima, e em quaisquer hipóteses, responderão principal e solidariamente pelas obrigações trabalhistas e previdenciárias dos empregados, inclusive pelo cumprimento da presente Convenção Coletiva de Trabalho.</p>
</div>
<p style="text-indent:17.05em;">“No caso de omissão do acima, e em quaisquer hipóteses, responderão principal e solidariamente pelas obrigações trabalhistas e previdenciárias dos empregados, inclusive pelo cumprimento da presente Convenção Coletiva de Trabalho”
</p>
</div>

<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p style="text-decoration:underline;margin:0;"><b>Preliminarmente</b></p>
<p style="text-decoration:underline;margin:0;"><b>I - Da Legitimidade da Justiça do Trabalho</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em;"><font style="text-transform:uppercase"><?php echo htmlspecialchars($_POST['sex_singular']); ?></font> reclamante deixa de submeter o presente litígio à apreciação da Comissão de Conciliação Prévia (Lei nº 9958/2000), por entender que a propositura da presente diretamente junto a esta Justiça Especializada, encontra respaldo no artigo 5º inciso XXXV, da Constituição Federal de 1988, cujo teor pedimos vênia para transcrever:
</p>
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
<tbody>
<tr>
<td style="text-align:justify;">
<p>Art. 5º - Inciso XXXV da CF/88 – <strong>a lei não excluirá da apreciação do Poder Judiciário lesão ou ameaça a direito;</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em;">Importante salientar que esse entendimento já se encontra cristalizado, através da UNIFORMIZAÇÃO DE JURISPRUDÊNCIA do Egrégio Tribunal Regional do Trabalho da 2ª Região, através da Súmula nº 2, cujo teor pedimos vênia para transcrever:</p>
<table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p style="margin-bottom:0%;">COMISSÃO DE CONCILIAÇÃO PRÉVIA – EXTINÇÃO DO PROCESSO</p> 
<p style="margin-top:0%;">(Resolução Administrativa nº 08/2002 – DJE  12/11/2002)</p>
<p style="text-align:justify;"><strong>“O comparecimento perante a Comissão de Conciliação Prévia é uma faculdade assegurada ao Obreiro, objetivando a obtenção de um título executivo extrajudicial, conforme previsto pelo artigo 625-E, parágrafo único da CLT, mas não constitui condição de ação, nem tampouco pressuposto processual na reclamatória trabalhista, diante do comando emergente do artigo 5º, XXXV, da Constituição Federal”</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em;">Ante o exposto, “permissa máxima vênia”, é legítima a presença da<?php echo htmlspecialchars($_POST['t_s_r']); ?> reclamada<?php echo htmlspecialchars($_POST['t_s_r']); ?> perante essa Justiça Especializada, pelo que requer o recebimento e regular processamento do presente para que surtam seus legais efeitos.</p>
</div>
    </textarea>
</div>
<div class="tab-pane fade" id="tab2">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;">
SEM AVISO PREVIO-REGISTRO CORRETO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Desativar" onclick="aba2x1();esconder('area1')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" /></p>
<div id="area1">
<textarea id="aba2_contrab_01" name="aba2_contrab_01" rows="25" class="demo">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">Foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da reclamada em <?php echo htmlspecialchars($_POST['data_reg']); ?>, sendo sumariamente demitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_saida']); ?> não sendo pré avisad<?php echo htmlspecialchars($_POST['sex_singular']); ?> de sua imotivada dispensa.</p>
</div>
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">SEM AVISO PREVIO-REGISTRO APÓS ENTRADA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativa" onclick="aba2x2();esconder('area2')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" /></p>
<div id="area2">
<textarea id="aba2_contrab_02" name="aba2_contrab_02" style="height:80%;">
    <div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">Foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da reclamada em <?php echo htmlspecialchars($_POST['data_ent']); ?>, sendo registrad<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_reg']); ?> e sumariamente demitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_saida']); ?> não sendo pré avisad<?php echo htmlspecialchars($_POST['sex_singular']); ?> de sua imotivada dispensa.</p>
    </div>
        <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <p style=""><strong>DO RECONHECIMENTO DO VÍNCULO</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
<div style="font-family:Book Antiqua;font-size:16px;text-align:justify;">
<div><p style="text-indent: 17.05em; margin-top: 0">Com estas manobras astutas da Reclamada, não teve a oportunidade de ser optante pelo regime do FGTS durante o interstício mourejado sem o devido registro, infringindo dessa forma a Ré os artigos 29 e seguintes da CLT, bem como a Lei 8.036/1990, seus artigos, onde couber, incorrendo nas multas previstas nos artigos 47 e 48 da CLT, incorrendo ainda nos delitos previstos nos artigos 168, 203 e 297, parágrafo 4º do Código Penal, requerendo após apuradas as irregularidades ora noticiadas, expedição de ofício ao digníssimo e zeloso representante do Ministério Público Federal, Delegacia Regional do Trabalho, INSS e Caixa Econômica Federal, relatando as ocorrências praticadas na fraudulenta forma de contratação para as providências</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Esclarece ao Reclamante que desconhecia qualquer outra contratação junto à Ré que não seja regido pela CLT, ressaltando-se que sempre prestou serviços exclusivamente para a Ré, de forma ininterrupta, ressaltando-se que algumas empresas utilizam-se dessa espécie de contratação para não proceder com o regular registro de seus empregados, optando pela fraude repudiada no artigo 9º da CLT.</p></div> 
                                             
<div><p style="text-indent: 17.05em; margin-top: 0">A jurisprudência já é unânime no sentido de que:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Sempre que se verifica fraude às garantias trabalhistas e sociais asseguradas no ordenamento legal constitucional vigente não se autoriza inobservância à regra.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Evidente que a Reclamada, regularmente instituída, não atendia aos princípios básicos, na medida em que há indícios de que ela estivesse voltada para atender somente aos seus próprios interesses, jamais de seus empregados, apenas os colocando a qualquer sorte no mercado de trabalho junto a outra empresas às vezes intitulada de tomadoras de serviços, ressaltando-se que essas empresas costumam manter em seu quadro de pessoal centenas e centenas de empregados, utilizando-se de manobras astutas e fraudulentas defeso no artigo 9º  da  CLT), na  exploração de mão de obra alheia, objetivando  apenas o enriquecimento sem causa, defeso em lei, vez que deixa de recolher os encargos sociais e trabalhistas, beneficiando-se com a sonegação.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu” caracterizam-se os requisitos elencados nos artigos 2º e 3º do Diploma consolidado, durante todo o período em que perdurou a prestação de serviços, conforme abaixo demonstrado:</p></div>     
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">PESSOALIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito este, no qual o empregado se obriga a prestar pessoalmente os serviços a terceiros, é um fato marcante, a corroborar a tese de existência do vínculo empregatício, na hipótese vertente, haja vista que, caso tivesse necessidade de se ausentar em um determinado dia, por qualquer motivo, não poderia se fazer substituir por outra pessoa;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">SUBORDINAÇÃO:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito no qual entendem os nosso Tribunais, bem como a nossa melhor doutrina, como sendo a situação onde o empregado presta serviços para o empregador sob a dependência deste, com limitação de autonomia e submissão á autoridade do mesmo:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu”, o Reclamante, durante a vigência do pacto laboral, sempre esteve subordinada diretamente a Reclamada, não podendo sequer chegar atrasada em seu trabalho, inclusive em razão de grande demanda de serviço que sempre acarretou até mesmo o labor em sobre tempo habitual na jornada, sem prévia autorização da Reclamada, o que é um fato marcante na demonstração de que era a demandante subalterna da Ré;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">CONTINUIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Elemento pelo qual o empregado realiza o seu trabalho de modo constante, inalterado e permanente, a um destinatário, de forma a manter habitualidade, constância no desenvolvimento de sua atividade dentro da mesma organização empresarial, elemento este que, sem qualquer sombra de dúvida, se encontra presente na relação mantida entre o Reclamante e a Reclamada;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">ATIVIDADE PREPONDERANTE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Por derradeiro, releva salientar que a atividade preponderante da Reclamada é o ramo de construção e acabamento, o que implica na impossibilidade de contratação de mão de obra que não seja regida pelo Diploma consolidado;</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">A bem de se ver, pela existência dos requisitos acima declinados, sem prejuízo dos demais, exigidos por lei, concomitantemente, que a prestação dos serviços do Reclamante para com a Reclamada se deu de modo contínuo, pessoal e sob subordinação, o que enseja a declaração de vínculo empregatício entre o Autor e a Reclamada, deflagrando-se, a partir daí, os direitos decorrentes deste liame, na conformidade das pretensões elencadas nesta peça propedêutica, anulando-se qualquer outra modalidade fraudulenta, nos termos do artigo 9º da CLT, combinado com os artigos 186 e 942 do novo Código Civil, aplicados subsidiariamente à CLT, conforme artigo 8º, parágrafo único do mesmo diploma legal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Conforme dispõe o artigo 9º da Consolidação das Leis do Trabalho, que pedimos vênia para transcrevê-lo.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“Serão nulos de pleno direito os atos praticados com o objetivo de desvirtuar, impedir ou fraudar a aplicação dos preceitos contidos na presente Consolidação”.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Dessa forma, requer de Vossa Excelência a anulação dos “pseudos” contratos engendrados pela Ré, no ímpeto de descaracterizar a relação de trabalho mantida entre o Reclamante e a Reclamada, tentando impedir, com as manobras astutas por ela praticada, a aplicação dos preceitos contidos na CLT, (artigo 3º) devendo ser exortada e coibida essa verdadeira “engenhoca” prática de contratação, “data vênia”, defeso em lei n(artigos 9º, 29, 47 e 48 da CLT, combinados com os artigos 168-A, 203 e 297, parágrafo 4º do Código Penal).</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Pelo embate praticado à CLT pela Reclamada, objetivando apenas vantagens ilícitas e enriquecimento sem causa, defeso em lei, em prol do mourejo alheio, o Reclamante impugna, desde já, os “malsinados contratos” com a Reclamada, os quais, repita-se, não passam de um ardil engendrado pela Reclamada, com o único objetivo de burlar a legislação do trabalho, subtraindo direitos sagrados do trabalhador, e ainda mais, “surrupiando”, data vênia, parte do seu rendimento mensal, defeso no artigo 7º, inciso X da Carta da República e artigo 168 e 168-A do Código Penal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Destarte, estando presentes “In casu” os pressupostos para a configuração da relação de trabalho e, sendo nulos de pleno direito os “pseudos” contratos firmados por intermédio da Reclamada, impõe-se o reconhecimento do vínculo empregatício havido entre reclamante e Reclamada em todo o interstício mourejado que perdurou o contrato de trabalho, considerando-se a projeção do aviso 487, II, parágrafo 1º da CLT), com as anotações pertinentes na CTPS do obreiro pela Reclamada, reiterando-se o pedido de expedição de ofícios ao digníssimo e diligente representante do Ministério Público Federal e demais instituições já mencionadas em linhas atrás.</p></div>
<div style="text-indent: 17.05em; margin-top: 0">Face ao exposto, pretende o Autor, o reconhecimento do vínculo empregatício, referente ao período de <b><u><?php echo htmlspecialchars($_POST['data_ent']); ?> até o dia <?php echo htmlspecialchars($_POST['data_reg']); ?>, considerando-se a projeção do aviso prévio, nos termos do artigo 487, parágrafos 1º, acrescidos dos reflexos dos parágrafos 5º e 6º, do artigo retro da CLT,</u></b> com as devidas anotações em sua CTPS, sob penas da própria secretaria dessa digna Vara do Trabalho fazê-lo, bem como, considerar o referido período no cômputo do tempo de serviço para todos os efeitos legais, inclusive para fins previdenciários, notadamente para pagamento de 13º salários, férias + 1/3,  condenando-se ainda a Ré, ao pagamento dos depósitos fundiários (artigos 9º e 22º do FGTS) do período e sobre verbas salariais devidas, o que ora se requer.</div>
<div style="text-indent: 17.05em; margin-top: 0">O procedimento da reclamada de não efetuar as anotações determinadas no artigo 29 da CLT, constitui crime por frustrar direito assegurado por lei trabalhista, nos termos do § 42 do art. 297 do Código Penal, enquadrando-se também no tipo penal estabelecido no art. 9º da Lei nº 8212/91.</div> 
<div style="text-indent: 17.05em; margin-top: 0">Impõe-se, destarte, o envio de ofício ao Ministério Público Federal para a apuração criminal pertinente, devendo a reclamada responder na pessoa do seu responsável legal. Para melhor sedimentar o acima descrito, pedimos "vênia" para transcrever Jurisprudência pertinente ao assunto:</div>
<div><p>
<table align="right" style="width:316px;height:172px;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>Existência de Dolo - TACRSP. Frustração de direito assegurado por lei trabalhista. Ausência de Registro do Empregado. Dolo. Caracterização. Possibilidade. "O simples fato de não se registrar empregado, quando de sua contratação, ou início da prestação de serviços, é suficiente a caracterização do delito do art. 203 do C.P., pois, se encontra presente em tal conduta, o dolo, elemento subjetivo do tipo, qual seja, a vontade consciente de frustrar direito trabalhista". (RJDTACRIM 17/177).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br><br><br><br><br><br>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A reclamada deverá reconhecer o vínculo empregatício com o obreiro, efetuando as anotações necessárias na CTPS, conforme determina o artigo 29 da CLT e Lei nº 7.855/89, por ocasião da audiência inaugural, com baixa projetada referente ao aviso prévio, eis que o período do aviso prévio constitui tempo de serviço para todos os efeitos legais, à luz do que prevê a Orientação Jurisprudencial SDI-1 nº 82, do TST.</p>
</div>
<div><p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Carteira de Trabalho. Anotações- A data da saída a ser anotada na CTPS deve corresponder à do término do prazo do aviso prévio, ainda que indenizado". (DJ 28/04/97).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br>
<div align="right">
<p style="text-indent: 17.05em; margin-top: 0">No mesmo sentido, assim entendem nossos Tribunais:</p>
</div>
<br>
<div><p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Anotação da Carteira de trabalho. O período do aviso prévio, indenizado, constitui tempo de serviço para todos os efeitos legais, nos moldes do art. 487, § 12 da CLT. Se assim dispõe a regra legal, o referido lapso deve ser contado também para efeito de anotação na Carteira de Trabalho (TST-RR 168.291/95.0, Roberto Della Manna, Ac. 3!! T., 2.949/96).</p>
<p>"Mesmo quando não há trabalho no curso do aviso prévio, desligado	imediatamente o empregado e pago o valor correspondente, o período integra o tempo de serviço, o que indica claramente a natureza salarial daquele pagamento. Consequentemente, não há por que excluir esse valor do cálculo do FGTS". (TST, ED-RR 4.765/90.5, Cnéa Moreira. Ac. SDI420/93).</p>
</td>
</tr>
</tbody>
</table>
</p></div>
    </div>
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">AVISO PREVIO-REGISTRO CORRETO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativa" onclick="aba2x3();esconder('area3')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" /></p>
<div id="area3">
<textarea id="aba2_contrab_03" name="aba2_contrab_03">
    <div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">Foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da reclamada em <?php echo htmlspecialchars($_POST['data_reg']); ?>, sendo sumariamente demitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_saida']); ?> e pré avisad<?php echo htmlspecialchars($_POST['sex_singular']); ?> de sua imotivada dispensa na data <?php echo htmlspecialchars($_POST['aviso_data']); ?>.</p>
    </div>
</textarea>
</div>    	
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">AVISO PREVIO-REGISTRO APÓS ENTRADA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativa" onclick="aba2x4();esconder('area4')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" /></p>
<div id="area4">
<textarea id="aba2_contrab_04" name="aba2_contrab_04" style="height:80%;">
    <div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">Foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da reclamada em <?php echo htmlspecialchars($_POST['data_ent']); ?>, sendo registrad<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_reg']); ?> e sumariamente demitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> em <?php echo htmlspecialchars($_POST['data_saida']); ?> e pré avisad<?php echo htmlspecialchars($_POST['sex_singular']); ?> de sua imotivada dispensa na data <?php echo htmlspecialchars($_POST['aviso_data']); ?>.</p>
    </div>
        <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <p style=""><strong>DO RECONHECIMENTO DO VÍNCULO</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
<div style="font-family:Book Antiqua;font-size:16px;text-align:justify;">
<div><p style="text-indent: 17.05em; margin-top: 0">Com estas manobras astutas da Reclamada, não teve a oportunidade de ser optante pelo regime do FGTS durante o interstício mourejado sem o devido registro, infringindo dessa forma a Ré os artigos 29 e seguintes da CLT, bem como a Lei 8.036/1990, seus artigos, onde couber, incorrendo nas multas previstas nos artigos 47 e 48 da CLT, incorrendo ainda nos delitos previstos nos artigos 168, 203 e 297, parágrafo 4º do Código Penal, requerendo após apuradas as irregularidades ora noticiadas, expedição de ofício ao digníssimo e zeloso representante do Ministério Público Federal, Delegacia Regional do Trabalho, INSS e Caixa Econômica Federal, relatando as ocorrências praticadas na fraudulenta forma de contratação para as providências</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Esclarece ao Reclamante que desconhecia qualquer outra contratação junto à Ré que não seja regido pela CLT, ressaltando-se que sempre prestou serviços exclusivamente para a Ré, de forma ininterrupta, ressaltando-se que algumas empresas utilizam-se dessa espécie de contratação para não proceder com o regular registro de seus empregados, optando pela fraude repudiada no artigo 9º da CLT.</p></div> 
                                             
<div><p style="text-indent: 17.05em; margin-top: 0">A jurisprudência já é unânime no sentido de que:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Sempre que se verifica fraude às garantias trabalhistas e sociais asseguradas no ordenamento legal constitucional vigente não se autoriza inobservância à regra.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Evidente que a Reclamada, regularmente instituída, não atendia aos princípios básicos, na medida em que há indícios de que ela estivesse voltada para atender somente aos seus próprios interesses, jamais de seus empregados, apenas os colocando a qualquer sorte no mercado de trabalho junto a outra empresas às vezes intitulada de tomadoras de serviços, ressaltando-se que essas empresas costumam manter em seu quadro de pessoal centenas e centenas de empregados, utilizando-se de manobras astutas e fraudulentas defeso no artigo 9º  da  CLT), na  exploração de mão de obra alheia, objetivando  apenas o enriquecimento sem causa, defeso em lei, vez que deixa de recolher os encargos sociais e trabalhistas, beneficiando-se com a sonegação.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu” caracterizam-se os requisitos elencados nos artigos 2º e 3º do Diploma consolidado, durante todo o período em que perdurou a prestação de serviços, conforme abaixo demonstrado:</p></div>     
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">PESSOALIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito este, no qual o empregado se obriga a prestar pessoalmente os serviços a terceiros, é um fato marcante, a corroborar a tese de existência do vínculo empregatício, na hipótese vertente, haja vista que, caso tivesse necessidade de se ausentar em um determinado dia, por qualquer motivo, não poderia se fazer substituir por outra pessoa;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">SUBORDINAÇÃO:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito no qual entendem os nosso Tribunais, bem como a nossa melhor doutrina, como sendo a situação onde o empregado presta serviços para o empregador sob a dependência deste, com limitação de autonomia e submissão á autoridade do mesmo:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu”, o Reclamante, durante a vigência do pacto laboral, sempre esteve subordinada diretamente a Reclamada, não podendo sequer chegar atrasada em seu trabalho, inclusive em razão de grande demanda de serviço que sempre acarretou até mesmo o labor em sobre tempo habitual na jornada, sem prévia autorização da Reclamada, o que é um fato marcante na demonstração de que era a demandante subalterna da Ré;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">CONTINUIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Elemento pelo qual o empregado realiza o seu trabalho de modo constante, inalterado e permanente, a um destinatário, de forma a manter habitualidade, constância no desenvolvimento de sua atividade dentro da mesma organização empresarial, elemento este que, sem qualquer sombra de dúvida, se encontra presente na relação mantida entre o Reclamante e a Reclamada;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">ATIVIDADE PREPONDERANTE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Por derradeiro, releva salientar que a atividade preponderante da Reclamada é o ramo de construção e acabamento, o que implica na impossibilidade de contratação de mão de obra que não seja regida pelo Diploma consolidado;</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">A bem de se ver, pela existência dos requisitos acima declinados, sem prejuízo dos demais, exigidos por lei, concomitantemente, que a prestação dos serviços do Reclamante para com a Reclamada se deu de modo contínuo, pessoal e sob subordinação, o que enseja a declaração de vínculo empregatício entre o Autor e a Reclamada, deflagrando-se, a partir daí, os direitos decorrentes deste liame, na conformidade das pretensões elencadas nesta peça propedêutica, anulando-se qualquer outra modalidade fraudulenta, nos termos do artigo 9º da CLT, combinado com os artigos 186 e 942 do novo Código Civil, aplicados subsidiariamente à CLT, conforme artigo 8º, parágrafo único do mesmo diploma legal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Conforme dispõe o artigo 9º da Consolidação das Leis do Trabalho, que pedimos vênia para transcrevê-lo.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“Serão nulos de pleno direito os atos praticados com o objetivo de desvirtuar, impedir ou fraudar a aplicação dos preceitos contidos na presente Consolidação”.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Dessa forma, requer de Vossa Excelência a anulação dos “pseudos” contratos engendrados pela Ré, no ímpeto de descaracterizar a relação de trabalho mantida entre o Reclamante e a Reclamada, tentando impedir, com as manobras astutas por ela praticada, a aplicação dos preceitos contidos na CLT, (artigo 3º) devendo ser exortada e coibida essa verdadeira “engenhoca” prática de contratação, “data vênia”, defeso em lei n(artigos 9º, 29, 47 e 48 da CLT, combinados com os artigos 168-A, 203 e 297, parágrafo 4º do Código Penal).</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Pelo embate praticado à CLT pela Reclamada, objetivando apenas vantagens ilícitas e enriquecimento sem causa, defeso em lei, em prol do mourejo alheio, o Reclamante impugna, desde já, os “malsinados contratos” com a Reclamada, os quais, repita-se, não passam de um ardil engendrado pela Reclamada, com o único objetivo de burlar a legislação do trabalho, subtraindo direitos sagrados do trabalhador, e ainda mais, “surrupiando”, data vênia, parte do seu rendimento mensal, defeso no artigo 7º, inciso X da Carta da República e artigo 168 e 168-A do Código Penal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Destarte, estando presentes “In casu” os pressupostos para a configuração da relação de trabalho e, sendo nulos de pleno direito os “pseudos” contratos firmados por intermédio da Reclamada, impõe-se o reconhecimento do vínculo empregatício havido entre reclamante e Reclamada em todo o interstício mourejado que perdurou o contrato de trabalho, considerando-se a projeção do aviso 487, II, parágrafo 1º da CLT), com as anotações pertinentes na CTPS do obreiro pela Reclamada, reiterando-se o pedido de expedição de ofícios ao digníssimo e diligente representante do Ministério Público Federal e demais instituições já mencionadas em linhas atrás.</p></div>
<div style="text-indent: 17.05em; margin-top: 0">Face ao exposto, pretende o Autor, o reconhecimento do vínculo empregatício, referente ao período de <b><u><?php echo htmlspecialchars($_POST['data_ent']); ?> até o dia <?php echo htmlspecialchars($_POST['data_reg']); ?>, considerando-se a projeção do aviso prévio, nos termos do artigo 487, parágrafos 1º, acrescidos dos reflexos dos parágrafos 5º e 6º, do artigo retro da CLT,</u></b> com as devidas anotações em sua CTPS, sob penas da própria secretaria dessa digna Vara do Trabalho fazê-lo, bem como, considerar o referido período no cômputo do tempo de serviço para todos os efeitos legais, inclusive para fins previdenciários, notadamente para pagamento de 13º salários, férias + 1/3,  condenando-se ainda a Ré, ao pagamento dos depósitos fundiários (artigos 9º e 22º do FGTS) do período e sobre verbas salariais devidas, o que ora se requer.</div>
<div style="text-indent: 17.05em; margin-top: 0">O procedimento da reclamada de não efetuar as anotações determinadas no artigo 29 da CLT, constitui crime por frustrar direito assegurado por lei trabalhista, nos termos do § 42 do art. 297 do Código Penal, enquadrando-se também no tipo penal estabelecido no art. 9º da Lei nº 8212/91.</div> 
<div style="text-indent: 17.05em; margin-top: 0">Impõe-se, destarte, o envio de ofício ao Ministério Público Federal para a apuração criminal pertinente, devendo a reclamada responder na pessoa do seu responsável legal. Para melhor sedimentar o acima descrito, pedimos "vênia" para transcrever Jurisprudência pertinente ao assunto:</div>
<div><p>
<table align="right" style="width:316px;height:172px;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>Existência de Dolo - TACRSP. Frustração de direito assegurado por lei trabalhista. Ausência de Registro do Empregado. Dolo. Caracterização. Possibilidade. "O simples fato de não se registrar empregado, quando de sua contratação, ou início da prestação de serviços, é suficiente a caracterização do delito do art. 203 do C.P., pois, se encontra presente em tal conduta, o dolo, elemento subjetivo do tipo, qual seja, a vontade consciente de frustrar direito trabalhista". (RJDTACRIM 17/177).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br><br><br><br><br><br>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A reclamada deverá reconhecer o vínculo empregatício com o obreiro, efetuando as anotações necessárias na CTPS, conforme determina o artigo 29 da CLT e Lei nº 7.855/89, por ocasião da audiência inaugural, com baixa projetada referente ao aviso prévio, eis que o período do aviso prévio constitui tempo de serviço para todos os efeitos legais, à luz do que prevê a Orientação Jurisprudencial SDI-1 nº 82, do TST.</p>
</div>
<div><p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Carteira de Trabalho. Anotações- A data da saída a ser anotada na CTPS deve corresponder à do término do prazo do aviso prévio, ainda que indenizado". (DJ 28/04/97).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br>
<div align="right">
<p style="text-indent: 17.05em; margin-top: 0">No mesmo sentido, assim entendem nossos Tribunais:</p>
</div>
<div><p>
<br>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Anotação da Carteira de trabalho. O período do aviso prévio, indenizado, constitui tempo de serviço para todos os efeitos legais, nos moldes do art. 487, § 12 da CLT. Se assim dispõe a regra legal, o referido lapso deve ser contado também para efeito de anotação na Carteira de Trabalho (TST-RR 168.291/95.0, Roberto Della Manna, Ac. 3!! T., 2.949/96).</p>
<p>"Mesmo quando não há trabalho no curso do aviso prévio, desligado	imediatamente o empregado e pago o valor correspondente, o período integra o tempo de serviço, o que indica claramente a natureza salarial daquele pagamento. Consequentemente, não há por que excluir esse valor do cálculo do FGTS". (TST, ED-RR 4.765/90.5, Cnéa Moreira. Ac. SDI420/93).</p>
</td>
</tr>
</tbody>
</table>
</p></div>
    </div>     
</textarea>
</div>    
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">SEM REGISTRO-TRABALHANDO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativa" onclick="aba2x5();esconder('area5')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" /></p>
<div id="area5">
<textarea id="aba2_contrab_05" name="aba2_contrab_05" style="height:80%;">
        <div style="font-family:Book Antiqua;text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">O Reclamante foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da Reclamada em <?php echo htmlspecialchars($_POST['data_ent']); ?> <strong style="text-transform:uppercase;">NÃO SENDO REGISTRAD<?php echo htmlspecialchars($_POST['sex_singular']); ?> EM SUA CTPS</strong>, em total desrespeito e desdém preconizado pelos artigos, 13, 29, 41, 47, 54 e 55 da Lei Consolidada, <b><u>não foi registrad<?php echo htmlspecialchars($_POST['sex_singular']); ?> dentro do prazo legal.</u></b></p>
        </div>
            <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            <p style=""><strong>DO RECONHECIMENTO DO VÍNCULO</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
<div style="font-family:Book Antiqua;font-size:16px;text-align:justify;">
<div><p style="text-indent: 17.05em; margin-top: 0">Com estas manobras astutas da Reclamada, não teve a oportunidade de ser optante pelo regime do FGTS durante o interstício mourejado sem o devido registro, infringindo dessa forma a Ré os artigos 29 e seguintes da CLT, bem como a Lei 8.036/1990, seus artigos, onde couber, incorrendo nas multas previstas nos artigos 47 e 48 da CLT, incorrendo ainda nos delitos previstos nos artigos 168, 203 e 297, parágrafo 4º do Código Penal, requerendo após apuradas as irregularidades ora noticiadas, expedição de ofício ao digníssimo e zeloso representante do Ministério Público Federal, Delegacia Regional do Trabalho, INSS e Caixa Econômica Federal, relatando as ocorrências praticadas na fraudulenta forma de contratação para as providências</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Esclarece ao Reclamante que desconhecia qualquer outra contratação junto à Ré que não seja regido pela CLT, ressaltando-se que sempre prestou serviços exclusivamente para a Ré, de forma ininterrupta, ressaltando-se que algumas empresas utilizam-se dessa espécie de contratação para não proceder com o regular registro de seus empregados, optando pela fraude repudiada no artigo 9º da CLT.</p></div> 
                                                 
<div><p style="text-indent: 17.05em; margin-top: 0">A jurisprudência já é unânime no sentido de que:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Sempre que se verifica fraude às garantias trabalhistas e sociais asseguradas no ordenamento legal constitucional vigente não se autoriza inobservância à regra.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Evidente que a Reclamada, regularmente instituída, não atendia aos princípios básicos, na medida em que há indícios de que ela estivesse voltada para atender somente aos seus próprios interesses, jamais de seus empregados, apenas os colocando a qualquer sorte no mercado de trabalho junto a outra empresas às vezes intitulada de tomadoras de serviços, ressaltando-se que essas empresas costumam manter em seu quadro de pessoal centenas e centenas de empregados, utilizando-se de manobras astutas e fraudulentas defeso no artigo 9º  da  CLT), na  exploração de mão de obra alheia, objetivando  apenas o enriquecimento sem causa, defeso em lei, vez que deixa de recolher os encargos sociais e trabalhistas, beneficiando-se com a sonegação.</p></div>
 <div><p style="text-indent: 17.05em; margin-top: 0">“In casu” caracterizam-se os requisitos elencados nos artigos 2º e 3º do Diploma consolidado, durante todo o período em que perdurou a prestação de serviços, conforme abaixo demonstrado:</p></div>     
 <div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">PESSOALIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito este, no qual o empregado se obriga a prestar pessoalmente os serviços a terceiros, é um fato marcante, a corroborar a tese de existência do vínculo empregatício, na hipótese vertente, haja vista que, caso tivesse necessidade de se ausentar em um determinado dia, por qualquer motivo, não poderia se fazer substituir por outra pessoa;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">SUBORDINAÇÃO:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito no qual entendem os nosso Tribunais, bem como a nossa melhor doutrina, como sendo a situação onde o empregado presta serviços para o empregador sob a dependência deste, com limitação de autonomia e submissão á autoridade do mesmo:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu”, o Reclamante, durante a vigência do pacto laboral, sempre esteve subordinada diretamente a Reclamada, não podendo sequer chegar atrasada em seu trabalho, inclusive em razão de grande demanda de serviço que sempre acarretou até mesmo o labor em sobre tempo habitual na jornada, sem prévia autorização da Reclamada, o que é um fato marcante na demonstração de que era a demandante subalterna da Ré;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">CONTINUIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Elemento pelo qual o empregado realiza o seu trabalho de modo constante, inalterado e permanente, a um destinatário, de forma a manter habitualidade, constância no desenvolvimento de sua atividade dentro da mesma organização empresarial, elemento este que, sem qualquer sombra de dúvida, se encontra presente na relação mantida entre o Reclamante e a Reclamada;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">ATIVIDADE PREPONDERANTE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Por derradeiro, releva salientar que a atividade preponderante da Reclamada é o ramo de construção e acabamento, o que implica na impossibilidade de contratação de mão de obra que não seja regida pelo Diploma consolidado;</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">A bem de se ver, pela existência dos requisitos acima declinados, sem prejuízo dos demais, exigidos por lei, concomitantemente, que a prestação dos serviços do Reclamante para com a Reclamada se deu de modo contínuo, pessoal e sob subordinação, o que enseja a declaração de vínculo empregatício entre o Autor e a Reclamada, deflagrando-se, a partir daí, os direitos decorrentes deste liame, na conformidade das pretensões elencadas nesta peça propedêutica, anulando-se qualquer outra modalidade fraudulenta, nos termos do artigo 9º da CLT, combinado com os artigos 186 e 942 do novo Código Civil, aplicados subsidiariamente à CLT, conforme artigo 8º, parágrafo único do mesmo diploma legal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Conforme dispõe o artigo 9º da Consolidação das Leis do Trabalho, que pedimos vênia para transcrevê-lo.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“Serão nulos de pleno direito os atos praticados com o objetivo de desvirtuar, impedir ou fraudar a aplicação dos preceitos contidos na presente Consolidação”.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Dessa forma, requer de Vossa Excelência a anulação dos “pseudos” contratos engendrados pela Ré, no ímpeto de descaracterizar a relação de trabalho mantida entre o Reclamante e a Reclamada, tentando impedir, com as manobras astutas por ela praticada, a aplicação dos preceitos contidos na CLT, (artigo 3º) devendo ser exortada e coibida essa verdadeira “engenhoca” prática de contratação, “data vênia”, defeso em lei n(artigos 9º, 29, 47 e 48 da CLT, combinados com os artigos 168-A, 203 e 297, parágrafo 4º do Código Penal).</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Pelo embate praticado à CLT pela Reclamada, objetivando apenas vantagens ilícitas e enriquecimento sem causa, defeso em lei, em prol do mourejo alheio, o Reclamante impugna, desde já, os “malsinados contratos” com a Reclamada, os quais, repita-se, não passam de um ardil engendrado pela Reclamada, com o único objetivo de burlar a legislação do trabalho, subtraindo direitos sagrados do trabalhador, e ainda mais, “surrupiando”, data vênia, parte do seu rendimento mensal, defeso no artigo 7º, inciso X da Carta da República e artigo 168 e 168-A do Código Penal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Destarte, estando presentes “In casu” os pressupostos para a configuração da relação de trabalho e, sendo nulos de pleno direito os “pseudos” contratos firmados por intermédio da Reclamada, impõe-se o reconhecimento do vínculo empregatício havido entre reclamante e Reclamada em todo o interstício mourejado que perdurou o contrato de trabalho, considerando-se a projeção do aviso 487, II, parágrafo 1º da CLT), com as anotações pertinentes na CTPS do obreiro pela Reclamada, reiterando-se o pedido de expedição de ofícios ao digníssimo e diligente representante do Ministério Público Federal e demais instituições já mencionadas em linhas atrás.</p></div>
<div style="text-indent: 17.05em; margin-top: 0">Face ao exposto, pretende o Autor, o reconhecimento do vínculo empregatício, referente ao período de <b><u><?php echo htmlspecialchars($_POST['data_ent']); ?> até o dia de sua dispensa, considerando-se a projeção do aviso prévio, nos termos do artigo 487, parágrafos 1º, acrescidos dos reflexos dos parágrafos 5º e 6º, do artigo retro da CLT,</u></b> com as devidas anotações em sua CTPS, sob penas da própria secretaria dessa digna Vara do Trabalho fazê-lo, bem como, considerar o referido período no cômputo do tempo de serviço para todos os efeitos legais, inclusive para fins previdenciários, notadamente para pagamento de 13º salários, férias + 1/3,  condenando-se ainda a Ré, ao pagamento dos depósitos fundiários (artigos 9º e 22º do FGTS) do período e sobre verbas salariais devidas, o que ora se requer.</div>
<div style="text-indent: 17.05em; margin-top: 0">O procedimento da reclamada de não efetuar as anotações determinadas no artigo 29 da CLT, constitui crime por frustrar direito assegurado por lei trabalhista, nos termos do § 42 do art. 297 do Código Penal, enquadrando-se também no tipo penal estabelecido no art. 9º da Lei nº 8212/91.</div> 
<div style="text-indent: 17.05em; margin-top: 0">Impõe-se, destarte, o envio de ofício ao Ministério Público Federal para a apuração criminal pertinente, devendo a reclamada responder na pessoa do seu responsável legal. Para melhor sedimentar o acima descrito, pedimos "vênia" para transcrever Jurisprudência pertinente ao assunto:</div>
<div><p>
<table align="right" style="width:316px;height:172px;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>Existência de Dolo - TACRSP. Frustração de direito assegurado por lei trabalhista. Ausência de Registro do Empregado. Dolo. Caracterização. Possibilidade. "O simples fato de não se registrar empregado, quando de sua contratação, ou início da prestação de serviços, é suficiente a caracterização do delito do art. 203 do C.P., pois, se encontra presente em tal conduta, o dolo, elemento subjetivo do tipo, qual seja, a vontade consciente de frustrar direito trabalhista". (RJDTACRIM 17/177).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br><br><br><br><br><br>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A reclamada deverá reconhecer o vínculo empregatício com o obreiro, efetuando as anotações necessárias na CTPS, conforme determina o artigo 29 da CLT e Lei nº 7.855/89, por ocasião da audiência inaugural, com baixa projetada referente ao aviso prévio, eis que o período do aviso prévio constitui tempo de serviço para todos os efeitos legais, à luz do que prevê a Orientação Jurisprudencial SDI-1 nº 82, do TST.</p>
</div>
<div><p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Carteira de Trabalho. Anotações- A data da saída a ser anotada na CTPS deve corresponder à do término do prazo do aviso prévio, ainda que indenizado". (DJ 28/04/97).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br>
<div align="right">
<p style="text-indent: 17.05em; margin-top: 0">No mesmo sentido, assim entendem nossos Tribunais:</p>
</div>
<br>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Anotação da Carteira de trabalho. O período do aviso prévio, indenizado, constitui tempo de serviço para todos os efeitos legais, nos moldes do art. 487, § 12 da CLT. Se assim dispõe a regra legal, o referido lapso deve ser contado também para efeito de anotação na Carteira de Trabalho (TST-RR 168.291/95.0, Roberto Della Manna, Ac. 3!! T., 2.949/96).</p>
<p>"Mesmo quando não há trabalho no curso do aviso prévio, desligado	imediatamente o empregado e pago o valor correspondente, o período integra o tempo de serviço, o que indica claramente a natureza salarial daquele pagamento. Consequentemente, não há por que excluir esse valor do cálculo do FGTS". (TST, ED-RR 4.765/90.5, Cnéa Moreira. Ac. SDI420/93).</p>
</td>
</tr>
</tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </div>    
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">
SEM REGISTRO-DEMITIDO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativa" onclick="aba2x6();esconder('area6')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" />
</p>
<div id="area6">
<textarea id="aba2_contrab_06" name="aba2_contrab_06" style="height:80%;">
    <div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<div><p style="text-indent: 17.05em; margin-top: 0">O Reclamante foi admitid<?php echo htmlspecialchars($_POST['sex_singular']); ?> aos serviços da Reclamada em <?php echo htmlspecialchars($_POST['data_ent']); ?> <strong>NÃO SENDO REGISTRAD<span style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['sex_singular']); ?></span> EM SUA CTPS</strong>, e sumariamente demitido em <?php echo htmlspecialchars($_POST['data_saida']); ?> em total desrespeito e desdém preconizado pelos artigos, 13, 29, 41, 47, 54 e 55 da Lei Consolidada, não foi registrad<?php echo htmlspecialchars($_POST['sex_singular']); ?> dentro do prazo legal.</p></div>
        <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <p style=""><strong>DO RECONHECIMENTO DO VÍNCULO</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
<div style="font-family:Book Antiqua;font-size:16px;text-align:justify;">
<div><p style="text-indent: 17.05em; margin-top: 0">Com estas manobras astutas da Reclamada, não teve a oportunidade de ser optante pelo regime do FGTS durante o interstício mourejado sem o devido registro, infringindo dessa forma a Ré os artigos 29 e seguintes da CLT, bem como a Lei 8.036/1990, seus artigos, onde couber, incorrendo nas multas previstas nos artigos 47 e 48 da CLT, incorrendo ainda nos delitos previstos nos artigos 168, 203 e 297, parágrafo 4º do Código Penal, requerendo após apuradas as irregularidades ora noticiadas, expedição de ofício ao digníssimo e zeloso representante do Ministério Público Federal, Delegacia Regional do Trabalho, INSS e Caixa Econômica Federal, relatando as ocorrências praticadas na fraudulenta forma de contratação para as providências</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Esclarece ao Reclamante que desconhecia qualquer outra contratação junto à Ré que não seja regido pela CLT, ressaltando-se que sempre prestou serviços exclusivamente para a Ré, de forma ininterrupta, ressaltando-se que algumas empresas utilizam-se dessa espécie de contratação para não proceder com o regular registro de seus empregados, optando pela fraude repudiada no artigo 9º da CLT.</p></div> 
                                             
<div><p style="text-indent: 17.05em; margin-top: 0">A jurisprudência já é unânime no sentido de que:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Sempre que se verifica fraude às garantias trabalhistas e sociais asseguradas no ordenamento legal constitucional vigente não se autoriza inobservância à regra.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Evidente que a Reclamada, regularmente instituída, não atendia aos princípios básicos, na medida em que há indícios de que ela estivesse voltada para atender somente aos seus próprios interesses, jamais de seus empregados, apenas os colocando a qualquer sorte no mercado de trabalho junto a outra empresas às vezes intitulada de tomadoras de serviços, ressaltando-se que essas empresas costumam manter em seu quadro de pessoal centenas e centenas de empregados, utilizando-se de manobras astutas e fraudulentas defeso no artigo 9º  da  CLT), na  exploração de mão de obra alheia, objetivando  apenas o enriquecimento sem causa, defeso em lei, vez que deixa de recolher os encargos sociais e trabalhistas, beneficiando-se com a sonegação.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu” caracterizam-se os requisitos elencados nos artigos 2º e 3º do Diploma consolidado, durante todo o período em que perdurou a prestação de serviços, conforme abaixo demonstrado:</p></div>     
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">PESSOALIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito este, no qual o empregado se obriga a prestar pessoalmente os serviços a terceiros, é um fato marcante, a corroborar a tese de existência do vínculo empregatício, na hipótese vertente, haja vista que, caso tivesse necessidade de se ausentar em um determinado dia, por qualquer motivo, não poderia se fazer substituir por outra pessoa;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">SUBORDINAÇÃO:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Requisito no qual entendem os nosso Tribunais, bem como a nossa melhor doutrina, como sendo a situação onde o empregado presta serviços para o empregador sob a dependência deste, com limitação de autonomia e submissão á autoridade do mesmo:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“In casu”, o Reclamante, durante a vigência do pacto laboral, sempre esteve subordinada diretamente a Reclamada, não podendo sequer chegar atrasada em seu trabalho, inclusive em razão de grande demanda de serviço que sempre acarretou até mesmo o labor em sobre tempo habitual na jornada, sem prévia autorização da Reclamada, o que é um fato marcante na demonstração de que era a demandante subalterna da Ré;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">CONTINUIDADE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Elemento pelo qual o empregado realiza o seu trabalho de modo constante, inalterado e permanente, a um destinatário, de forma a manter habitualidade, constância no desenvolvimento de sua atividade dentro da mesma organização empresarial, elemento este que, sem qualquer sombra de dúvida, se encontra presente na relação mantida entre o Reclamante e a Reclamada;</p></div>
<div><p style="text-decoration:underline;font-weight:bold;font-size:16px;">ATIVIDADE PREPONDERANTE:</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Por derradeiro, releva salientar que a atividade preponderante da Reclamada é o ramo de construção e acabamento, o que implica na impossibilidade de contratação de mão de obra que não seja regida pelo Diploma consolidado;</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">A bem de se ver, pela existência dos requisitos acima declinados, sem prejuízo dos demais, exigidos por lei, concomitantemente, que a prestação dos serviços do Reclamante para com a Reclamada se deu de modo contínuo, pessoal e sob subordinação, o que enseja a declaração de vínculo empregatício entre o Autor e a Reclamada, deflagrando-se, a partir daí, os direitos decorrentes deste liame, na conformidade das pretensões elencadas nesta peça propedêutica, anulando-se qualquer outra modalidade fraudulenta, nos termos do artigo 9º da CLT, combinado com os artigos 186 e 942 do novo Código Civil, aplicados subsidiariamente à CLT, conforme artigo 8º, parágrafo único do mesmo diploma legal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Conforme dispõe o artigo 9º da Consolidação das Leis do Trabalho, que pedimos vênia para transcrevê-lo.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">“Serão nulos de pleno direito os atos praticados com o objetivo de desvirtuar, impedir ou fraudar a aplicação dos preceitos contidos na presente Consolidação”.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Dessa forma, requer de Vossa Excelência a anulação dos “pseudos” contratos engendrados pela Ré, no ímpeto de descaracterizar a relação de trabalho mantida entre o Reclamante e a Reclamada, tentando impedir, com as manobras astutas por ela praticada, a aplicação dos preceitos contidos na CLT, (artigo 3º) devendo ser exortada e coibida essa verdadeira “engenhoca” prática de contratação, “data vênia”, defeso em lei n(artigos 9º, 29, 47 e 48 da CLT, combinados com os artigos 168-A, 203 e 297, parágrafo 4º do Código Penal).</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Pelo embate praticado à CLT pela Reclamada, objetivando apenas vantagens ilícitas e enriquecimento sem causa, defeso em lei, em prol do mourejo alheio, o Reclamante impugna, desde já, os “malsinados contratos” com a Reclamada, os quais, repita-se, não passam de um ardil engendrado pela Reclamada, com o único objetivo de burlar a legislação do trabalho, subtraindo direitos sagrados do trabalhador, e ainda mais, “surrupiando”, data vênia, parte do seu rendimento mensal, defeso no artigo 7º, inciso X da Carta da República e artigo 168 e 168-A do Código Penal.</p></div>
<div><p style="text-indent: 17.05em; margin-top: 0">Destarte, estando presentes “In casu” os pressupostos para a configuração da relação de trabalho e, sendo nulos de pleno direito os “pseudos” contratos firmados por intermédio da Reclamada, impõe-se o reconhecimento do vínculo empregatício havido entre reclamante e Reclamada em todo o interstício mourejado que perdurou o contrato de trabalho, considerando-se a projeção do aviso 487, II, parágrafo 1º da CLT), com as anotações pertinentes na CTPS do obreiro pela Reclamada, reiterando-se o pedido de expedição de ofícios ao digníssimo e diligente representante do Ministério Público Federal e demais instituições já mencionadas em linhas atrás.</p></div>
<div style="text-indent: 17.05em; margin-top: 0">Face ao exposto, pretende o Autor, o reconhecimento do vínculo empregatício, referente ao período de <b><u><?php echo htmlspecialchars($_POST['data_ent']); ?> até o dia <?php echo htmlspecialchars($_POST['data_saida']); ?>, considerando-se a projeção do aviso prévio, nos termos do artigo 487, parágrafos 1º, acrescidos dos reflexos dos parágrafos 5º e 6º, do artigo retro da CLT,</u></b> com as devidas anotações em sua CTPS, sob penas da própria secretaria dessa digna Vara do Trabalho fazê-lo, bem como, considerar o referido período no cômputo do tempo de serviço para todos os efeitos legais, inclusive para fins previdenciários, notadamente para pagamento de 13º salários, férias + 1/3,  condenando-se ainda a Ré, ao pagamento dos depósitos fundiários (artigos 9º e 22º do FGTS) do período e sobre verbas salariais devidas, o que ora se requer.</div>
<div style="text-indent: 17.05em; margin-top: 0">O procedimento da reclamada de não efetuar as anotações determinadas no artigo 29 da CLT, constitui crime por frustrar direito assegurado por lei trabalhista, nos termos do § 42 do art. 297 do Código Penal, enquadrando-se também no tipo penal estabelecido no art. 9º da Lei nº 8212/91.</div> 
<div style="text-indent: 17.05em; margin-top: 0">Impõe-se, destarte, o envio de ofício ao Ministério Público Federal para a apuração criminal pertinente, devendo a reclamada responder na pessoa do seu responsável legal. Para melhor sedimentar o acima descrito, pedimos "vênia" para transcrever Jurisprudência pertinente ao assunto:</div>
<div><p>
<table align="right" style="width:316px;height:172px;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>Existência de Dolo - TACRSP. Frustração de direito assegurado por lei trabalhista. Ausência de Registro do Empregado. Dolo. Caracterização. Possibilidade. "O simples fato de não se registrar empregado, quando de sua contratação, ou início da prestação de serviços, é suficiente a caracterização do delito do art. 203 do C.P., pois, se encontra presente em tal conduta, o dolo, elemento subjetivo do tipo, qual seja, a vontade consciente de frustrar direito trabalhista". (RJDTACRIM 17/177).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br><br><br><br><br><br>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A reclamada deverá reconhecer o vínculo empregatício com o obreiro, efetuando as anotações necessárias na CTPS, conforme determina o artigo 29 da CLT e Lei nº 7.855/89, por ocasião da audiência inaugural, com baixa projetada referente ao aviso prévio, eis que o período do aviso prévio constitui tempo de serviço para todos os efeitos legais, à luz do que prevê a Orientação Jurisprudencial SDI-1 nº 82, do TST.</p>
</div>
<div><p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Carteira de Trabalho. Anotações- A data da saída a ser anotada na CTPS deve corresponder à do término do prazo do aviso prévio, ainda que indenizado". (DJ 28/04/97).</p>
</td>
</tr>
</tbody>
</table>
</p><br></div>
<br><br><br><br>
<div align="right">
<p style="text-indent: 17.05em; margin-top: 0">No mesmo sentido, assim entendem nossos Tribunais:</p>
</div>
<br>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<p>"Anotação da Carteira de trabalho. O período do aviso prévio, indenizado, constitui tempo de serviço para todos os efeitos legais, nos moldes do art. 487, § 12 da CLT. Se assim dispõe a regra legal, o referido lapso deve ser contado também para efeito de anotação na Carteira de Trabalho (TST-RR 168.291/95.0, Roberto Della Manna, Ac. 3!! T., 2.949/96).</p>
<p>"Mesmo quando não há trabalho no curso do aviso prévio, desligado	imediatamente o empregado e pago o valor correspondente, o período integra o tempo de serviço, o que indica claramente a natureza salarial daquele pagamento. Consequentemente, não há por que excluir esse valor do cálculo do FGTS". (TST, ED-RR 4.765/90.5, Cnéa Moreira. Ac. SDI420/93).</p>
</td>
</tr>
</tbody>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
   </div> 
</textarea>
</div>   
</div>    
<div class="tab-pane fade" id="tab3">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">
RESCISÃO DIRETA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Desativar" onClick="aba3x1();esconder('area7')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area7">
<textarea id="aba3_dasfuncao_01" name="aba3_dasfuncao_01">
    <div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
    <p style="text-indent: 17.05em; margin-top: 0">Exercia a função de <?php echo htmlspecialchars($_POST['nome_cargo']); ?> recebendo salário último mensal de R$ <?php echo htmlspecialchars($_POST['salario']); ?>, (<?php echo extenso("$salario",1,$caixa="baixa")?> ), nada recebendo de seus direitos e haveres remuneratórios e indenizatórios por ocasião de sua imotivada dispensa ocorrida em <?php echo htmlspecialchars($_POST['data_saida']); ?>.</p>
    </div>
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">RESCISÃO INDIRETA ASSÉDIO MORAL&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba3x2();esconder('area8')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area8">
<textarea id="aba3_dasfuncao_02" name="aba3_dasfuncao_02" style="height:65%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em;">A reclamada passou a descumprir com o bom desempenho do convívio laboral normal, inerente ao contrato de trabalho, humilhando publicamente e indiretamente <?php echo htmlspecialchars($_POST['sex_singular']); ?> reclamante, que mesmo assim, continuava trabalhando zelosamente na empresa, apesar do crasso assédio moral.</p>

<p style="text-indent: 17.05em;">Importante ressaltar que é obrigação legal do empregador respeitar os direitos trabalhistas, além da personalidade moral de seu empregado e os direitos inerentes a sua dignidade humana.</p>

<p style="text-indent: 17.05em;">A proteção do bem-estar do trabalhador, nada mais é a completa eficácia dos princípios contidos na Constituição Federal, de igualdade e de inviolabilidade da honra, contidos nos incisos III, V e X do art. 5º da Constituição Federal.</p>

<p style="text-indent: 17.05em;">Além do mais viola o próprio princípio da dignidade da pessoa humana, fundamento da República Federativa do Brasil, no art. 1º, III da Constituição Federal.</p>

<p style="text-indent: 17.05em;">Verifica-se em epígrafe o claro motivo de rescisão indireta do contrato de trabalho, nos termos do art. 483, b, e, da CLT que diz:</p>

<p style="text-indent: 17.05em;margin:0;">Art. 483: “O empregado poderá considerar rescindido o contrato e pleitear a devida indenização quando:</p>

<p style="text-indent: 17.05em;margin:0;">b) for tratado pelo empregador ou seus superiores hierárquicos com rigor excessivo;</p>

<p style="text-indent: 17.05em;margin:0;">e) praticar o empregador ou seus prepostos, contra ele ou pessoas de sua família, ato lesivo da honra e boa fama.”</p>

<p style="text-indent: 17.05em;">Diante de tais fatos e circunstâncias, requer-se que seja reconhecida a rescisão indireta do contrato de trabalho com fulcro no art. 483, b, e, da CLT, bem como a condenação no pagamento das seguintes verbas rescisórias: aviso-prévio; férias vencidas + 1/3 constitucional; férias simples e proporcionais + 1/3 constitucional; 13º salário integral e/ou proporcional; depósitos de FGTS de 8% sobre o salário, multa de 40% sobre os depósitos do FGTS; entrega das guias para levantamento do FGTS; entrega da guia de seguro desemprego ou indenização substitutiva nos termos da súmula 389, TST e multa do art. 477, da CLT.</p>
</div>
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">RESCISÃO INDIRETA SALÁRIO POR FORA E ART. 477 CLT&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba3x3();esconder('area9')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area9">
<textarea id="aba3_dasfuncao_03" name="aba3_dasfuncao_03" style="height:40%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<p style="text-indent: 17.05em; margin-top: 0">Exercia a função de <?php echo htmlspecialchars($_POST['nome_cargo']); ?> recebendo salários último mensal de R$ <?php echo htmlspecialchars($_POST['salario']); ?> (<?php echo extenso("$salario",1,$caixa="baixa")?> ) em CTPS, acrescido de R$ <?php echo htmlspecialchars($_POST['valor_fora']); ?>, (<?php echo extenso("$valor_fora",1,$caixa="baixa")?> ), pagos ”por fora”</p> 
<p style="text-indent: 17.05em; margin-top: 0">numa especie de “caixa dois” defeso em lei, perfazendo em média uma remuneração mensal de R$ <?php echo htmlspecialchars($_POST['remu_total']); ?>, (<?php echo extenso("$remu_total",1,$caixa="baixa")?>), sendo parte do pagamento “por fora”, depositado em conta bancária, e parte recebido em mãos, recebendo as verbas remuneratórias que a reclamada reputou como corretas no importe de R$ <?php echo htmlspecialchars($_POST['homo_valor']); ?>, (<?php echo extenso("$homo_valor",1,$caixa="baixa")?>), com atraso, sem contúdo, pagar os <?php echo htmlspecialchars($_POST['dia_inp02']); ?> dias laborados em <b><u>MÊS</u></b> de <b><u>ANO</u></b> e o aviso prévio. Apesar de fornecer o TRCT, (doc. 02 “usque” 03), constando o pré-aviso em <?php echo htmlspecialchars($_POST['aviso_data']); ?>. Entretanto o não cumprimento do aviso já que costa a data <?php echo htmlspecialchars($_POST['aviso_data']); ?> (doc. 02 “usque” 03) e o pagamento do risório valor de R$ <?php echo htmlspecialchars($_POST['homo_valor']); ?>, fora do prazo previsto no artigo 477 parágrafo sexto alínea “a” da CLT, incorrendo na multa prevista no artigo 477 parágrafo 8º do mesmo diploma legal.
Não cumprindo o aviso trabalhando por imposição da Ré, deveria recebê-lo indenizado. Não ocorrendo “in casu”, requer seja indenizado pelo valor equivalente ao seu último salário, nos termos do artigo 487, parágrafo 1º da CLT.</p>
<p style="text-indent: 17.05em; margin-top: 0">Não recebendo as verbas rescisórias no primeiro dia útil imediato à dispensa, (data de afastamento: <?php echo htmlspecialchars($_POST['data_saida']); ?>, data de recebimento parcial das verbas rescisórias: <?php echo htmlspecialchars($_POST['data_quita']); ?>), deverá ser indenizado também pelo valor equivalente ao seu último salário, com fulcro no artigo 477, parágrafo 8ª da CLT, vez que a Ré não foi minudente ao parágrafo 6º, alínea “a” da CLT.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab4">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">
LEI 7.238/84 MULTAS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba4x1();esconder('area10')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area10">
<textarea id="aba4_lei7238/84_01" name="aba4_lei7238/84_01" style="height:80%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">

<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>LEI 7.238/84</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top:0%">Faz jus <?php echo htmlspecialchars($_POST['sex_singular']); ?> reclamante ao recebimento da multa prevista no artigo 9º da Lei 7238/84, acrescida da alíquota de <?php echo htmlspecialchars($_POST['reaj_%']); ?>% sobre as verbas contratuais e rescisórias prevista na cláusula <?php echo htmlspecialchars($_POST['reaj_clausula']); ?>ª da atual convenção coletiva anexa ou outro índice a ser homologado, atualmente em negociação.</p>
<div style="text-align:right;font-weight:bold;">
CLÁUSULA <?php echo htmlspecialchars($_POST['reaj_clausula']); ?> - REAJUSTE SALARIAL
</div>
<div style="text-indent: 17.05em; margin-bottom:0%">Será concedido um reajuste em <?php echo htmlspecialchars($_POST['reaj_day']); ?> de <?php echo htmlspecialchars($_POST['reaj_mes']); ?> de <?php echo htmlspecialchars($_POST['reaj_ano']); ?>, sobre o salário corrigido conforme convenção coletiva anterior, em sua cláusula <?php echo htmlspecialchars($_POST['reaj_clausula']); ?>ª, como resultado da livre negociação para a recomposição salarial do período de <?php echo htmlspecialchars($_POST['data_ent']); ?> a <?php echo htmlspecialchars($_POST['data_saida']); ?>, dandose por cumprida a Lei nº 8880/94 e legislação complementar, nos seguinte termo: a) <?php echo htmlspecialchars($_POST['reaj_%']); ?>% para os trabalhadores da função "<?php echo htmlspecialchars($_POST['nome_cargo']); ?>" que recebem salário mensal <?php echo htmlspecialchars($_POST['reaj_txtbasesal']); ?> R$ <?php echo htmlspecialchars($_POST['reaj_salbs2']); ?>.
</div>
<div style="text-align:right;font-weight:bold;">CLÁUSULA <?php echo htmlspecialchars($_POST['vigen_clausula']); ?>ª – VIGÊNCIA</div>
<div style="text-indent:17.05em;margin-top:0%">As partes fixam a vigência da cláusula <?php echo htmlspecialchars($_POST['reaj_clausula']); ?>ª de <?php echo htmlspecialchars($_POST['vigen_inicio_dia']); ?> de <?php echo htmlspecialchars($_POST['vigen_inicio_mes']); ?> de <?php echo htmlspecialchars($_POST['vigen_inicio_ano']); ?> à <?php echo htmlspecialchars($_POST['vigen_fim_dia']); ?> de <?php echo htmlspecialchars($_POST['vigen_fim_mes']); ?> de <?php echo htmlspecialchars($_POST['vigen_fim_ano']); ?>; as demais cláusulas, ou seja, da cláusula seguinte à <?php echo htmlspecialchars($_POST['vigen_fim_clausula']); ?>ª, de <?php echo htmlspecialchars($_POST['vigen_inicio_dia']); ?> de <?php echo htmlspecialchars($_POST['vigen_inicio_mes']); ?> de <?php echo htmlspecialchars($_POST['vigen_inicio_ano']); ?> à <?php echo htmlspecialchars($_POST['vigen_fim_dia']); ?> de <?php echo htmlspecialchars($_POST['vigen_fim_mes']); ?> de <?php echo htmlspecialchars($_POST['vigen_fim_ano']); ?>.
</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab5">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">
SALARIO PAGO POR FORA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba5x1();esconder('area11')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area11">
<textarea id="aba5_pgfora_01" name="aba5_pgfora_01" style="height:30%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DOS SALARIOS PAGOS “POR FORA”</strong></p>
</td>
</tr>
</tbody>
</table>
<div><p style="text-indent: 17.05em;">Conforme retro mencionado o obreiro recebeu salários “por fora”, à base de R$ <?php echo htmlspecialchars($_POST['valor_fora']); ?>, (<?php echo extenso("$valor_fora",1,$caixa="baixa")?> ),  pagos “por fora” dos holerites.</p></div>
<div><p style="text-indent: 17.05em;">Assim faz jus o obreiro a integração de referidos valores aos salários pagos com os reflexos em 13º salários, férias + 1/3, computo de horas extras, verbas rescisórias e FGTS + 40% o que se requer com fulcro nas Súmulas 45, 63, 76, 94, 108, 115, 172, 215, 226 e 264 do Colendo Tribunal Superior do Trabalho.
</p></div> 
</div>   
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab6">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">
JORNADA DE TRABALHO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba6x1();esconder('area12')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" id="btn_jornada">
</p>
<div id="area12">
<textarea id="aba6_jornadatrab_01" name="aba6_jornadatrab_01" style="height:20%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA JORNADA DE TRABALHO</strong></p>
</td>
</tr>
</tbody>
</table>
<div><p style="text-indent: 17.05em; margin-top: 0">Laborava, das <? echo $hrsmin_ent ?> às <? echo $hrsmin_saida ?> de segunda a domingo e feriados, sem autorização para anotar o extraordinário no controle de frequência, sempre <? echo $hrs_intervalo ?> de intervalos para refeição e descanso<? echo $escala_trab2 ?></span></p></div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab7">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">HORAS EXTRAS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba7x1();esconder('area13')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area13">
<textarea id="aba7_hrsextraord_01" name="aba7_hrsextraord_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DAS HORAS EXTRAORDINÁRIAS</strong></p>
</td>
</tr>
</tbody>
</table>
<div><p style="text-indent: 17.05em; margin-top: 0">Considerando-se a jornada de trabalho declinada, temos que no período contratual o reclamante prestou em média cerca de <?php echo htmlspecialchars($_POST['hrsext_totais']); ?> horas extras mensais, devidas com adicional de <?php echo htmlspecialchars($_POST['ext_porcento']); ?>%, assim entendidas aquelas horas laboradas além da 8ª diária e limitadas a 44 semanais.</p></div>

<div><p style="text-indent: 17.05em; margin-top: 0">Ressalte-se que o adicional de horas extras, encontra-se descrito no incluso instrumento normativo anexo.</p></div>    

<div style="text-align:right;font-weight:bold;">CLÁUSULA QUARTA – JORNADA DE TRABALHO I</div>
<div style="text-indent: 17.05em; margin-top: 0">Estabelecem as partes o adicional de <?php echo htmlspecialchars($_POST['ext_porcento']); ?>% (sessenta por cento) para as horas suplementares trabalhadas de segunda-feira a sábado, desde que não tenham sido incluídas no Banco de Horas, consoante cláusula décima oitava, inciso I.</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab8">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DAS INTEGRAÇÕES&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba8x1();esconder('area14')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area14">
<textarea id="aba8_integracoes_01" name="aba8_integracoes_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DAS INTEGRAÇÕES</strong></p>
</td>
</tr>
</tbody>
</table>    
<div>
<p style="text-indent: 17.05em; margin-top: 0">Por habitual a prestação de serviços em sobrejornada, requeridas, impõe-se que os valores respectivos tenham as incidências previstas nas Súmulas 45, 60, 63, 94, 95, 151 e 172 do Colendo Tribunal Superior do Trabalho.
</p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Os DSR's e feriados que forem apurados sobre as horas extras ora postuladas, por constituírem 'PLUS SALARIAL', devem compor a sua remuneração para fins de pagamento das férias acrescidas de 1/3, dos 13ºs. salários, do aviso prévio, do FGTS acrescido de 40% e dos recolhimentos do INSS.
</p>
</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab9">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DAS VERBAS RESCISÓRIAS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba9x1();esconder('area15')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area15">
<textarea id="aba9_verbasrecisorias_01" name="aba9_verbasrecisorias_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DAS VERBAS RESCISÓRIAS</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">Tendo em vista o não pagamento das verbas rescisórias, conforme declinado, o Reclamante é credor de <?php echo htmlspecialchars($_POST['av_inp01']); ?> dias de aviso prévio, <?php echo htmlspecialchars($_POST['dia_inp02']); ?> dias de saldo salarial mourejado em <u><b>MÊS</b></u> de <b><u>ANO</u></b>, diferença <?php echo htmlspecialchars($_POST['dc_inp01']); ?>/12 de 13º salário proporcional de <b><u>ANO</u></b> e <?php echo htmlspecialchars($_POST['fr_inp01']); ?>/12 de férias proporcionais de <b><u>ANO</u></b>, contando-se a projeção do aviso prévio, requerendo sejam referidos valores pagos em audiência vestibular, observando-se o pagamento constante nos documentos anexo, para não incorrer no “bis in idem”.    </p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab10">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">F.G.T.S&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba10x1();esconder('area16')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area16">
<textarea id="aba10_fgts_01" name="aba10_fgts_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DO F.G.T.S</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Faz jus o Reclamante ao recebimento da diferença do valor equivalente ao FGTS com a incidência dos reflexo de pagamento do salario por fora, sobre as verbas salariais ora postuladas  com  multa de 40%, nos termos do artigo 22 da Lei 8.036/90, o que ora requer, seja pago em audiência vestibular sob pena de execução direta e  aplicação do disposto nos artigos 168 e 203 do Código Penal.
</p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Deverá a reclamada trazer aos autos ainda as guias GR’s e RE’s para apuração dos valores devidos, sob a pena de aplicação do disposto no artigo 359 do CPC de forma subsidiaria, de ambos os períodos laborados.
</p>
</div>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
"FGTS. DIFERENÇAS. RECOLHIMENTO. ÔNUS DA PROVA - Res. 209/2016, DEJT divulgado em 01, 02 e 03.06.2016 É do empregador o ônus da prova em relação à regularidade dos depósitos do FGTS, pois o pagamento é fato extintivo do direito do autor (art. 373, II, do CPC de 2015)." Desta forma adota-se, a partir de então, o entendimento de que é do empregador o ônus da prova da regularidade dos depósitos do FGTS, independentemente de o empregado delimitar o período no qual não teria havido o correto recolhimento, posicionamento este, que se mostra em consonância com o princípio da aptidão para prova ou da distribuição dinâmica do ônus da prova, segundo o qual a prova deve ser produzida pela parte que a detém ou que a ela possui mais fácil acesso. Desta forma, tendo em vista o que dispõe o artigo 26, PU da Lei 8.036/90, além do acima exposto, deverá a ré comprovar nos autos o recolhimento na conta vinculada da reclamante dos depósitos fundiários de todo o pacto laboral, inclusive da multa de 40%, sob pena de pagamento de uma indenização equivalente em pecúnia a R$ 200,00 (duzentos Reais) diários, a ser apurado em regular liquidação de sentença pelo não cumprimento da obrigação de fazer, conforme previsto no artigo 461 do CPC, limitado ao prazo de 30 dias. A partir do 31º (trigésimo primeiro dia), em atenção ao princípio da efetividade das sentenças judiciais, sem prejuízo da cobrança da multa até então vencida.	
</td>
</tr>
</tbody>
</table>
<p></p>
</div>  
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab11">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ARTIGO 467 DA CLT&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba11x1();esconder('area17')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area17">
<textarea id="aba11_art467_01" name="aba11_art467_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DO ARTIGO 467 DA CLT</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Tendo  em vista o não pagamento das verbas rescisórias correta e integralmente, requer seja aplicada a reclamada a pena prevista no artigo 467 da CLT, correspondente a multa de 50% sobre verbas rescisórias devidas (nova redação dada pela Lei 10.272 de 05/09/2001), sendo que os referidos valores deverão ser quitados em audiência vestibular sob pena de execução direta e aplicação do disposto nos artigos 168 e 203 do Código Penal.
</p>
</div> 
</div>   
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab12">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">COMPENSAÇÕES&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba12x1();esconder('area18')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area18">
<textarea id="aba12_compensacao_01" name="aba12_compensacao_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA COMPENSAÇÃO</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Em homenagem ao “non bis in idem” e para não incorrer em litigância de má fé, caso, por eventualidade, tenha a reclamada efetuado o pagamento de parte das verbas postuladas na presente ação, requer sejam compensadas, se, devidamente comprovado nos autos.
</p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A fim de se evitar eventual enriquecimento sem causa d<?php echo htmlspecialchars($_POST['sex_singular']); ?> reclamante, deverá a Reclamada compensar valores que já saldados, sob o mesmo título durante todo interstício mourejado, devendo ser observados, contudo, os ditames da súmula 18 do TST, que limita a compensação na seara laboral às verbas exclusivamente de natureza trabalhista.
</p>	
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
Súmula nº 18 - COMPENSAÇÃO (mantida) - Res. 121/2003, DJ 19, 20 e 21.11.2003. A compensação, na Justiça do Trabalho, está restrita a dívidas de natureza trabalhista. Histórico: Redação original - RA 28/1969, DO-GB 21.08.1969. Defere-se, observando os limites mencionados.
</td>
</tr>
</tbody>
</table>
</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab13">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DO SEGURO DESEMPREGO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<input type="button" value="Ativar" onClick="aba13x1();esconder('area19')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area19">
<textarea id="aba13_indeseguro_01" name="aba13_indeseguro_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DO SEGURO DESEMPREGO</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">No ato da dispensa, a Reclamada não deu cumprimento ao disposto na Lei 7.998/90 e respectivas resoluções do <b>CODEFAT (Conselho Deliberativo do Fundo de Amparo ao Trabalhador)</b>, deixando de fornecer ao Reclamante a comunicação de dispensa e requerimento de Seguro-desemprego, documentos indispensáveis a consecução desse benefício.
</p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Pelo descumprimento de obrigação de ordem pública, deverá a reclamada, arcar com ônus de sua omissão, indenizando <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante em pecúnia, em sintonia com a melhor jurisprudência que apreciando hipótese idêntica, assim se pronuncia:
</p>
</div>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<b>
<i>
Inútil o fornecimento das guias do Seguro-Desemprego, após o transcurso de vários meses da dispensa sem justa causa, procede o pedido de indenização pela falta de entrega da documentação necessária a percepção da vantagem, a cargo do empregador (TRT 8ª Reg. R. EX-OFF 147/92 – Ac. 2ª T. 2.095/92, 20/05/92 – LTr 56 – 11/1259)
</i>
</b>
</td>
</tr>
</tbody>
</table>
<br><br><br><br><br><br><br><br><br>    
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab14">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">PERDAS E DANOS DO ARTIGO 404 CC&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba14x1();esconder('area20')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area20">
<textarea id="aba14_perdadanos404_01" name="aba14_perdadanos404_01" style="height:80%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DAS PERDAS E DANOS INDENIZAÇÃO DO ARTIGO 404 do CC</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Com o advento do novo Código Civil, foi incorporado ao Direito Pátrio a figura da <b>plena reparação do dano</b>, em conformidade com os clássicos ensinamentos de Chiovenda: 
</p>
</div>
<div>
<p>
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td>
<b>
“A atuação da lei não deve representar uma diminuição patrimonial para a parte a cujo favor se efetiva; por ser interesse do Estado que o emprego do processo não se resolva em prejuízo de quem tem razão”.(g.n.)
</b>
</td>
</tr>
</tbody>
</table>
</p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">A ideia que se encontra na Lei, conforme magistério de Silvio Rodrigues, é de “impor ao culpado pelo inadimplemento, o dever de indenizar. <b>Indenizar significa tornar indene, isto é, reparar o prejuízo porventura sofrido”</b>. Ou seja, deve-se livrar o prejudicado de <b>todo e qualquer dano proveniente do ato faltoso.</b>
</p>
<p style="text-indent: 17.05em; margin-top: 0">No caso em apreço, deferidas as verbas pleiteadas pelo autor, certamente haverá dedução dos honorários advocatícios firmados com este patrono, os quais, segundo o costume, foram fixados em 30% sobre o valor de condenação. Tal dedução, decerto, prejudicará a obreira, na medida que não permitirá a satisfação integral do dano, impondo a autora o ônus pelo pagamento de honorários advocatícios que só foram necessários em face da recusa da Reclamada na satisfação voluntária da obrigação.
</p>
<p style="text-indent: 17.05em; margin-top: 0">Conclui-se, portanto, que mesmo que haja condenação na totalidade das verbas perseguidas, o autor ainda será prejudicada, arcando com os danos decorrentes da despesa com o advogado que será abatido do seu crédito.
</p>
<p style="text-indent: 17.05em; margin-top: 0">Ocorre que o Novo Código Civil, em seu artigo 389, prevê não só a reparação por perdas e danos, mas também o pagamento dos honorários advocatícios. Já o artigo 404 do mesmo diploma legal, ao tratar das perdas e danos, <b>incorpora as despesas com advogado como dano a ser suportado pelo devedor</b>, senão vejamos:
</p>
</div>
<div>
<p><table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td>
<p><b>
“Art. 404.</b> As perdas e danos, nas obrigações de pagamento em dinheiro, serão pagas com a atualização monetária segundo índices oficiais regularmente estabelecidos, abrangendo juros, custas <b><u>e honorários de advogado, sem prejuízo da pena convencional.</u></b>”</p>
<br>
<p><b>Parágrafo único</b> – Provado que os juros da mora não cobrem o prejuízo, e não havendo pena convencional, pode o juiz conceder ao credor indenização suplementar.
</p>
</td>
</tr>
</tbody>
</table></p>
</div>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Neste diapasão, concluímos que a reparação dos prejuízos deve ser realizada <i>in totum</i>, sendo que <b>a justa reparação deve produzir resultado idêntico ao da satisfação voluntária.</b></p> 

<p style="text-indent: 17.05em; margin-top: 0">Considerando que as verbas deferidas serão corroídas pela dedução da verba honorária, tal DANO É EVIDENTE e decorre da inadimplência da Ré, sendo devida, por força do disposto nos arts. 389, 402 e 404 do C.C., a reparação de todos os prejuízos sofridos pelo autor, inclusive de 30% do valor da condenação a ser futuramente adimplida a título de honorários advocatícios.
</p>

<p style="text-indent: 17.05em; margin-top: 0">Salienta-se que não se trata de <b>condenação em verba honorária, já que esta tem natureza na relação jurídica processual e tem como beneficiário o profissional do direito</b>, ao passo que <b>a indenização que se persegue tem natureza na relação jurídica material e tem como beneficiário o próprio reclamada</b>, o
qual certamente irá despender parte de seu crédito no pagamento dos honorários advocatícios.</p>

<p style="text-indent: 17.05em; margin-top: 0">Neste sentido caminha o entendimento pretoriano, valendo citar o entendimento do insigne magistrado LUIS PAULO PASOTTI VALENTE, proferido nos autos 2624/02 da 1a Vara do Trabalho de São Paulo, conforme se segue:</p>
</div>
<p><table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td>
<div style="font-weight:bold;">
<p>“Considerando-se o disposto no artigo 404 do Código Civil, impõe-se, para reparação integral do dano sofrido pelo autor e reconhecido no julgado, que a indenização inclua, além de juros e correção monetária, também honorários advocatícios.</p> 

<p>Não se argumente que tal medida encontra óbice no artigo 791 da Consolidação das Leis do Trabalho, porquanto esta norma tem natureza processual, enquanto o fundamento que ora evocado tem caráter de direito material.</p>

<p>Não importa, pois, a faculdade do jus postulandi, e tampouco a sucumbência processual funciona como elemento condicionante da atribuição. Atente-se que o crédito destina-se ao reclamada, não ao patrono, não se aplicando a disposição da Lei 8906/94 (artigo 23), que permite sua execução autônoma.</p> 

<p>Constitui-se parcela do crédito do autor, na reparação do dano original e a ele será liberada, em favor do reclamada, fixando-os, segundo os costumes, em 30% do valor da condenação.” (grifos originais)</p>
</div>
</td>
</tr>
</tbody>
</table></p>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Em relação à indelização prevista no artigo 404 do Código Civil, num  caso semelhante, o douto e culto julgador da 001ª vara do Trabalho da Justiça de Barueri-SP., o doutor e culto julgador LAÉRCIO LOPES DA SILVA, nos autos do processo de nº 0003833-72-2013-5-020-201, ao apreciar um pedido de indenização decidiu de forma brilhante o seguinte entendimento, que pedimos vênia para transcrever abaixo:
</p>
<p style="text-indent: 17.05em; margin-top: 0">“Dos honorários advocatícios e da indenização do art. 404, do código civil. É sabido que os trabalhadores são obrigados a arcar com o pagamento de pelo menos 30% do valor recebido para custear seu advogado, o que lhes causa um evidente prejuízo, ficando o seu ex-empregador sem qualquer responsabilidade em ressarci-lo, numa manifesta injustiça, o que resulta em recebimento pelo exempregado de apenas 70% do que lhe era devido. Apelando à casuística podemos supor que um empregado trabalhe anos para uma empresa e após o desligamento tenha um crédito de R$ 30.000,00. A empresa resolve pagar a totalidade do crédito do autor na audiência inaugural, em dois cheques, sendo um de R$ 21.000,00, correspondente ao crédito do autor e outro de R$ 9.000,00 referentes aos honorários do advogado do reclamante. Ora, nos parece insofismável que o empregado pagou por um erro de outrem e teve um empobrecimento em seu patrimônio e o empregador um enriquecimento sem causa. Para afastar do debate aqueles que preconizam que o autor poderia se valer do jus postulandi , deverá se ter em conta de que ao se utilizar dessa via poderia experimentar um prejuízo muito maior, eis que desconhece a intrincada legislação trabalhista. Ademais, pode-se afirmar que esta alegação equipara-se a valer-se o Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri empregador da própria torpeza, posto que deixa de pagar o empregado, vai a juízo com bom advogado para defender o seu interesse e pretende que o hipossuficiente demande desamparado de advogado habilitado. Ensina-nos Silvio Rodrigues que os direitos trabalhistas nasceram da idéia de que era imoral um empregado trabalhar por certo período para o empregador e posteriormente sair sem receber qualquer tipo de indenização. Pois bem, se assim o era em tempos remotos, ao aceitarmos que o empregado não receba a totalidade dos seus créditos ao ser dispensado voltamos àqueles tempos, valendo ressaltar que os direitos trabalhistas nasceram do princípio da moralidade, princípio este hoje alçado ao status de constitucional. Preceitua a Lei de Introdução ao Direito Brasileiro no art. 5º que “na aplicação da lei, o juiz atenderá aos fins sociais a que ela se dirige e às exigências do bem comum”. Se os direitos trabalhistas são de natureza alimentar e tendo em conta a enorme disparidade de poder econômico entre patrão e empregado, nenhuma brecha há de haver no direito que propicie que o empregado não receba tudo que efetivamente tem direito. Portanto não vemos justificativa para que não se aplique no particular o princípio da restituição integral do que é devido ao empregado, princípio este consagrado na prática do bom direito. Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri De fato, a doutrina e jurisprudência tradicionais se apegam no verbete da Súmula 219, do C.T.S.T., contudo no último quartel do século passado o direito civil cedeu lugar ao direito constitucional que trouxe em seu bojo princípios que se alinham ao princípio da restituição integral como o da razoabilidade ou proporcionalidade; dignidade da pessoa humana e função social do trabalho, etc. Portanto, esta mudança de paradigma no direito pátrio requer uma sacudida total na jurisprudência pois o novo código civil também trouxe instrumentos modernos para a busca do direito justo, também com elementos pós-positivistas. Com os adventos da Constituição Federal de 1988 e o novo Código Civil de 2.002, que trouxeram elementos inovadores, muito de nossa jurisprudência tornou-se velharia do século passado a exemplo da Súmula 219, do C.T.S.T., impondo-se, pois, sua reformulação. Afasto de logo qualquer alegação de julgamento extra petita, posto que a dicção ‘pode o juiz’ do parágrafo único do art. 404, do código civil, indica que a regra é instrumento de eqüidade e pode ser aplicada pelo juiz para equilibrar os prejuízos não cobertos pelos juros de mora. Instrumentos de eqüidade prescindem de pedido na petição inicial, eis que é dever do juiz aproximar a decisão o mais possível da justiça em cada caso. De se notar que o reclamante postulou honorários advocatícios. Depreende-se da leitura do art. 20, do CPC., e é pacífico na jurisprudência e doutrina pátrias, que o juiz aplicará os honorários advocatícios, independentemente de pedido na inicial, o que equivale a dizer que o referido pedido é aceito como pedido implícito. Ora, se nas relações estritamente contratuais onde as partes estão em pé de igualdade na relação jurídica o pedido de honorários pode ser implícito, este fundamento, por analogia ou aplicação subsidiária com maior razão pode ser transportado para o direito do trabalho que Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri tem nas suas verbas especial proteção por se tratarem de verbas de natureza alimentícia. Se se aplicasse ao vertente caso a chamada teoria do diálogo das fontes, teríamos que o direito do trabalho seria um microssistema em relação ao CPC, notadamente em relação aos honorários advocatícios, já que não há norma específica sobre honorários na CLT. Nesse sentido, talvez fosse até despiciendo a aplicação do princípio citado já que não há conflito real ou mesmo aparente de normas, portanto não empecilhos para aplicação do princípio da hierárquica das normas ou simplesmente a analogia, o que fazemos aqui, mas com o art. 404, do Código Civil. Como já dissemos aqui, este dispositivo está sendo empregado não de forma subsidiária, mas sim de forma direta com base no diálogo das fontes, mesmo por que entendemos que o art. 8º, da CLT não impede e aplicação direta do Código Civil. Ademais, como assinala Flávio Monteiro de Barros, “o Código Civil de 2.002 tem entre seus princípios norteadores o da eticidade que confere maior poder ao Juiz para decidir o caso concreto, não só suprindo as lacunas da lei, mas também resolvendo os litígios com base na eqüidade, quando autorizado pelo ordenamento jurídico, ou quando a norma expressa for deficiente ou inajustável para o caso concreto. No novo Código, nem tudo se resolve por meio de preceitos normativos expressos, pois são fartas as referências à eqüidade, à boa-fé, à justa causa e demais critérios éticos. O grande número de hipóteses em que a decisão deve se basear em critérios ético-juridicos amplia, em nome de uma solução mais justa ou eqüitativa, os poderes do magistrado. Como esclarece Miguel Reale, Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código 
do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri no novo Código não prevalece a crença na plenitude hermética do Direito Positivo, sendo reconhecida a imprescindível eticidade do ordenamento. Nesse sentido, é posto o Princípio do Equilíbrio Econômico dos Contratos como base ética de todo Direito Obrigacional” G.N. (Apostila curso a distância federal – modulo I, p.2). Como observa Miguel Reale, referido na mesma obra referida acima, o Brasil têm duas leis fundamentais, a Constituição e o Código Civil, posição com a qual nos filiamos o que é suficiente para se afastar posicionamento contrário a nossa posição com supedâneo no art. 8º, da CLT., porquanto este dispositivo da CLT., não recebe as normas do Código Civil de forma subsidiária, mas sim recepcionaas e as incorpora ao seu texto. E assim o é posto que a Lei de Introdução ao Direito Brasileiro e o próprio Código Civil são sobrenormas aplicadas a todo o ordenamento jurídico. Nesta linha de afastamento de uma crença plena no Direito Positivo, o STF, no recurso extraordinário 161.243-6, determinou a equiparação salarial entre empregado brasileiro em relação aos franceses na empresa “Air France”, que realizavam as atividades idênticas com suporte no princípio constitucional da isonomia, não levando em conta detalhes do art. 461, da CLT., que condiciona a equiparação salarial ao tempo máximo de 2 anos na função e a mesma perfeição técnica no trabalho no desempenho da função. Dessa forma, assentou o STF que os princípios constitucionais têm normatividade direta, acolhendo, pois, a tese do pós-positivismo. Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri Veja-se que o novo Código Civil potencializou o dano causado a outrem reputando-o de ato ilícito, ainda que cometido por mera negligência ou imprudência, no art. 186, significando que as omissões voluntárias e involuntárias devem ser punidas.
</p>
<p style="text-indent: 17.05em; margin-top: 0">Ora, se o empregador dispensa o empregado e não lhe paga os consectários legais obrigando-o a manejar os instrumentos da Justiça, por certo deve arcar com o ônus do pagamento do patrono do ex-empregado. Pensar de outra forma nos remeteria a um período do positivismo mais conservador e não homenagearia o pós-positivismo inaugurado com Carta da República de 1988 e ampliado com o Código Civil de 2.002, negando vigência a estes modernos instrumentos e a seus princípios. Ao cristalizar a doutrina do Direito Constitucional de que os princípios têm normatividade, ampliou-se o campo de atuação do magistrado fora do campo estrito das normas positivadas, tanto que a subsunção tornou-se mecanismo insuficiente para se explicar o mecanismo aplicação das normas e princípios aos casos concretos. E assim o é vez que a subsunção da norma ao suporte fático restou restrita àqueles momentos em que uma determinada norma se conforma a determinado fato ou conjunto de fatos. Já a instrumentalização para aplicação dos princípios prescinde, de ordinário, de um fato previsto em determinada norma para ter vingada a normatividade, operando o juiz num campo bem mais amplo do que o daquele das normas positivadas. E não é por outro motivo que podemos falar hoje em prorrogação constitucional do contrato de trabalho, valendo-nos principalmente do princípio da dignidade humana. Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri As normas que se referem a honorários advocatícios na Justiça do Trabalho não se ajustam mais aos casos julgados, eis que não consideram com ato ilícito aqueles elementos descritos no referido art. 186, do Código Civil, que, de ordinário, estão presentes no momento do desate do contrato de trabalho, máxime quando as verbas a que tinha direito o trabalhador não são satisfeitas. Ora se o principio da eticidade é aplicado aos contratos em geral, prescinde de maior esforço de interpretação a conclusão de que tem de ser necessariamente aplicado aos contratos de trabalho por serem estes verdadeiros contratos de adesão onde não resta outra solução ao empregado senão a de aderir às condições impostas pelo empregador. Tanto tem influência o poder do empregador no contrato de trabalho que garantiu-se às normas trabalhistas a irrenunciabilidade, como porto quase seguro para se aproximar a par conditio no cumprimento do contrato e na sua dissolução. A argumentação em relação aos honorários advocatícios parece ser uma tese que se contrapõe ao positivismo exacerbado que se revela na separação em direito e moral, ficando-se apenas no elemento eficácia social. Contudo, se esta visão conceitual de direito já não serve mais ao direito civil, por maior razão não serve ao direito do trabalho que tem na raiz dos direitos dos trabalhadores o elemento moral e que da mesma forma resiste em admitir que haja diferença entre lei e direito e que o direito e lei se confundem no plano fático. Não se pode confundir a atividade legiferante com a colocação do direito e da justiça à disposição do legislador, posto que legislar não é apoderar-se Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri incondicionalmente do direito, mas apenas e tão-somente traçar linhas mestras dos direitos de forma abstrata. Nesse sentido concluiu o Tribunal Constitucional Federal alemão: “O direito e a justiça não estão à disposição do legislador. A idéia de que um ‘legislador constitucional tudo pode ordenar a seu bel-prazer significaria um retrocesso à mentalidade de um positivismo legal desprovido de valoração, há muito superado na ciência e na prática jurídicas. Foi justamente a época do regime nacional-socialista na Alemanha que ensinou que o legislador também pode estabelecer a injustiça (BVerfGE- Bundesverfassungsgericht, Tribunal Constitucional Federal) 3, 225 (232). Por conseguinte, o }Tribunal Constitucional Federal afirmou a possibilidade de negar aos dispositivos ‘jurídicos’ nacional-socialistas sua validade como direito, uma vez que eles contrariam os princípios fundamentais da justiça de maneira tão evidente que o juiz que pretendesse aplica-los ou reconhecer seus efeitos jurídicos estaria pronunciando a injustiça, e não o direito (BVerfGE 3,58 (119); 6,132 (198). O 11º Decreto infringia esses princípios fundamentais. Nele, a contradição entre esse dispositivo e a justiça alcançou uma medida tão insustentável que ele foi considerado nulo ab initio.... A vinculação tradicional do juiz à lei, um elemento sustentador do princípio da separação dos poderes e, por conseguinte, do estado, foi modificada na Lei Fundamental, ao menos em sua formulação, no sentido de que a jurisprudência está vinculada à ‘lei e ao direito’ (art. 20, §3º). Com isso, segundo o entendimento geral, rejeita-se um positivismo legal estrito. A fórmula mantém a Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri consciência de que, embora, em geral, lei e direito coincidam facticamente, isso não acontece de maneira constante e necessária. O direito não é idêntico à totalidade das leis escritas. Quanto às disposições positivas do poder estatal, pode existir, sob certas circunstâncias, uma excedência de direito, que tem sua fonte no ordenamento jurídico constitucional como um conjunto de sentido e é capaz de operar como corretivo em relação à lei escrita; encontrar essa excedência de direito e concretiza-la é a tarefa da jurisprudência”. (Robert Alexi, conceito e validade do direito. Ed. Martins fontes) Nessa mesma linha de raciocínio temos que considerar a tese do Ministro do Supremo Tribunal Federal Aires Brito de que deve haver um necessário desequilíbrio jurídico em favor do trabalhador para compensar o grande desequilíbrio econômico no contrato de trabalho. Por óbvio que este desequilíbrio jurídico não se fará somente com a aplicação das leis trabalhistas com cunho protetivo, mas também e, sobretudo, pelo juiz na sentença ao analisar as questões fáticas que lhe forem levadas à mesa quando então sopesará o desequilíbrio econômico com outras condições, máxime aquela fundamental em considerar que de um lado do contrato tem-se uma pessoa humana e do outro o interesse pelo lucro. A bem da verdade, se uma das partes do contrato é um ser humano, a outra, em verdade, não é a empresa, mas sim o lucro. O embate que se trava é entre os direitos do trabalhador e a preservação de sua dignidade humana na prestação do trabalho e na contraprestação do mesmo contra o lucro da empresa. Documento elaborado e assinado em meio digital. Validade legal nos termos da Lei n. 11.419/2006. Disponibilização e verificação de autenticidade no site www.trtsp.jus.br. Código do documento: 4769472 Data da assinatura: 14/01/2016, 03:44 PM.Assinado por: LAERCIO LOPES DA SILVA 1a Vara do Trabalho de Barueri Se com o passar do tempo a compreensão do direito tornar-se apenas a pré- compreensão –como disse grande jurista alemão-, isso significa que o direito, como elemento cultural está infenso as mudanças sociais, sobretudo aquelas ligadas aos direitos fundamentais. Ora, se é justamente a jurisprudência quem identifica o que Alexi chama de excedente de direito, se esta resiste a acompanhar as mudanças sociais que determinam avanços no direito, por certo acaba por engessar o próprio direito. E isso pode ocorrer por conta da resistência em entender que lei e direito não coincidem necessariamente na questão fática. Ou seja, a lei pode se amoldar perfeitamente ao suporte fático, sem contudo, ser a melhor opção para o caso concreto diante de um juízo de valoração. Assim, assentado em direito de que quem causa prejuízo a outrem deve ressarcir integralmente (restitutio integrum) a parte contrária, à luz do que dispõe o parágrafo único do art. 404, do Código Civil, condeno a reclamada a pagar ao reclamante uma indenização de 30%, sobre o valor líquido da condenação”.
</p>
<p style="text-indent: 17.05em; margin-top: 0">Em relação ainda à indenização prevista no artigo 404 do Código Civil, noutro caso semelhante, o douto e culto julgador da 004ª Vara do Trabalho da Justiça de Barueri-SP., o Excelentíssimo senhor doutor JEAN MARCEL MARIANO DE OLIVEIRA, nos autos do processo de nº 1002416-53-2016-5-02-0204, em trâmite perante à 004ª Vara do Trabalho da Comarca de Barueri-SP., ao apreciar um pedido de indenização decidiu de forma brilhante o seguinte entendimento, que também pedimos vênia para transcrever abaixo:
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
DA INDENIZAÇÃO POR HONORÁRIOS ADVOCATÍCIOS Postula a reclamante a condenação da reclamada ao pagamento de indenização compensatória por valores que terá que desembolsar a título de honorários advocatícios posto que se a reclamada tivesse cumprido com suas obrigações trabalhistas, não teria que propor a presente ação. Inicialmente, formou-se este juízo o entendimento de que tal postulação seria improcedente, posto que a condenação ao pagamento de indenização pressuporia, salvo em caso de responsabilidade objetiva, a existência de conduta lesiva por parte de alguém, sendo que no direito do trabalho brasileiro vigora o "jus postulandi", razão pela qual não seria o reclamante obrigado a contratar advogado para o patrocínio da presente demanda e, se assim tivesse procedido, agiria por mera liberalidade, o que não poderia ser imputado contra a reclamada. Contudo, após estudos mais aprofundados, reviu-se o entendimento. A esse respeito, brilhantemente decidiu o magistrado JORGE LUIZ SOUTO MAIOR, na reclamação trabalhista nº 00537.1999.049.15.00.8 que: "...Sob a perspectiva do conceito de processo efetivo, ou seja, aquele que é eficiente para dar a cada um o que é seu por direito e nada além disso, a presença do advogado é fator decisivo para que a consecução deste ideal. Com efeito, nos processos trabalhistas, não raramente, discutem-se temas como: interrupção da prescrição; ilegitimidade de parte, em decorrência de subempreitada, sucessão, terceirização, grupo de empresas; litispendência; personalidade jurídica; desconsideração da personalidade jurídica; tutela antecipada; ação monitória; contagem de prazos; nulidades processuais; ônus da prova etc... Mesmo a avaliação dos efeitos dos fatos ocorridos na relação jurídica sob a ótica do direito material nem sempre é muito fácil. Vide, por exemplo, as controvérsias que pendem sobre temas como: aviso prévio cumprido em casa; subordinação jurídica; política salarial; direito adquirido; horas in itinere; salário in natura; integrações de verbas de natureza salarial; contratos a prazo; estabilidades provisórias, etc..., ou seja, saber sobre direitos trabalhistas, efetivamente, não é tarefa para leigos. Juízes e advogados organizam e participam de congressos, para tentar entender um pouco mais a respeito desses temas e muitas vezes acabam saindo com mais dúvidas. Imaginem, então, o trabalhador..." Desta forma, nota-se que a reclamante não teria condições de demandar desacompanhado de advogado, até mesmo porque a reclamada esteve devidamente representada, o que se traduziria em desigualdade processual. Neste sentido, por culpa exclusiva da reclamada, que não cumpriu com suas obrigações trabalhistas espontaneamente, não se mostra justo, nem jurídico, que a reclamante receba seus haveres apenas parcialmente, já que terá que arcar com os honorários advocatícios do seu patrono. Assim sendo, na forma do disposto no artigo 404 do Código Civil, defiro em favor da reclamante indenização pelas despesas com honorários advocatícios, em valor equivalente a 30% do total da condenação, conforme requerido. Tal crédito pertence à reclamante, não ao patrono, não se aplicando o disposto no artigo 23 da Lei 8906/94, posto que se constitui em parcela do crédito da reclamante, na reparação do dano original, não se confundindo com honorários de sucumbência, estes que são devidos na Justiça do Trabalho apenas nas hipóteses da Lei 5584/70.
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">Pelo exposto é forçoso concluir que, a fim de efetivar a justa e íntegra reparação, deve a reclamada ser condenada nos danos relativos às despesas que o reclamada terá a título de honorários advocatícios, no patamar de 30% do valor da condenação, o que desde logo se requer.
</p>
</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab15">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DA JUSTIÇA GRATUITA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba15x1();esconder('area21')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area21">
<textarea id="aba15_jusgratuita_01" name="aba15_jusgratuita_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA JUSTIÇA GRATUITA</strong></p>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent: 17.05em; margin-top: 0">Declara <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante, (doc. 02, declaração de hipossuficiência anexo), não ter condições de arcar com qualquer tipo de custas ou taxas processuais, inclusive periciais, que possa advir da referida Reclamação, sem prejuízo ao seu sustento; encontrando-se na condição de pessoa pobre, na acepção jurídica do termo, requerendo assim, os benefícios da justiça gratuita, nos termos da Lei 1060/50, combinada com o artigo 14, parágrafo 1º. da Lei 5584/70 e artigo 1º, da Lei 7115/83.
</p>
<p style="text-indent: 17.05em; margin-top: 0">Por pobreza declarada, (doc .02), cabe os benefício da justiça gratuita, especialmente, após o advento da CF/88, que determina o livre acesso ao judiciário (artigo 5º, inciso XXXIV) e garantia de assistência judiciária aos necessitados (artigo 5º, inciso LXXIV), com fundamento no acima exposto.
</p>
</div>
</div>   
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab16">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">EXPEDIÇÃO DE OFÍCIOS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba16x1();esconder('area22')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area22">
<textarea id="aba16_expoficios_01" name="aba16_expoficios_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DA EXPEDIÇÃO DE OFÍCIOS</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em;">À vista do exposto e das irregularidades apontadas, requer <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante, sejam expedidos ofícios dos seguintes órgãos abaixo:
</p>
<p style="text-indent: 17.05em; margin: 0"><u><b>Caixa Econômica Federal</b></u></p>
<p style="text-indent: 17.05em; margin: 0"><u><b>Delegacia Regional do Trabalho e</b></u></p>  
<p style="text-indent: 17.05em; margin: 0"><u><b>Instituto Nacional da Seguridade Social,</b></u></p> 
<p style="margin-top: 0">para as sanções disciplinares cabíveis.</p> 
<p style="text-indent: 17.05em; margin-top: 0">Também requer, em especial, que Vossa Excelência determine expedição de ofícios ao Ministério Público, para possível enquadramento, não só da<?php echo htmlspecialchars($_POST['t_s_r']); ?> reclamada<?php echo htmlspecialchars($_POST['t_s_r']); ?>, mas de seus representantes legais, por terem infringido os artigos 203 do Código Penal e 7º, inciso X da Constituição Federal.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab18">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DESVIO OU ACUMULO DE FUNÇÃO <U>INTINERANTE</U>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba1d3x1();esconder('area24')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area24">
<textarea id="aba1_3_desvio_acumulo_01" name="aba1_3_desvio_acumulo_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DOS DESVIO/ACUMULO DE FUNÇÃO</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
Ressalte-se  que <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante fora contratad<?php echo htmlspecialchars($_POST['sex_singular']); ?> para exercer a função INTERNAMENTE de <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, porém, por determinação da reclamada, exercia também a função de <b><?php echo htmlspecialchars($_POST['desvio_cargo_1']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_2']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_3']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_4']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_5']); ?></b> intinerante, ou seja fora da sede da reclamada, chegando a laborar em outros estados da federação e diversas cidades por determinação da reclamada.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Desta forma, requer o pagamento em audiência vestibular do adicional por desvio/acúmulo de função, devido ao longo da data <?php echo htmlspecialchars($_POST['desvio_datainicio']); ?> até <?php echo htmlspecialchars($_POST['desvio_datafim']); ?>, à base de <?php echo htmlspecialchars($_POST['desv_porc_input01']); ?>% do piso salarial d<?php echo htmlspecialchars($_POST['sex_singular']); ?> autor<?php echo htmlspecialchars($_POST['sex_or']); ?>, com a devida integração de seus valores para efeitos  de reflexos em   13º salários, férias + 1/3 de todo o periodo laborado, além de depósitos fundiários + 40% e verbas rescisórias (aviso prévio e saldo de salários), conforme determinam as Súmulas 45, 63, 76, 94, 108, 115, 172, 215, 226 e 264  do Colendo Tribunal Superior do Trabalho e entendimentos adotados em nossos Tribunais  que assim se pronunciam
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<p style="margin:0;">TIPO.: RECURSO ORDINÁRIO</p> 
<p style="margin:0;">DATA DE JULGAMENTO.: 07/06/2005</p>
<p style="margin:0;">RELATOR(A).: VALDIR FLORINDO</p>
<p style="margin:0;">REVISOR(A).: IVANI CONTINI BRAMANTE</p>
<p style="margin:0;">ACORDÃO Nº.: 20050360927</p>
<p style="margin:0;">PROCESSO Nº 01794-2003-038-02-00-1    ANO 2004    TURMA 6ª</p>
<p style="margin:0;">DATA DE PUBLICAÇÃO.: 24/06/2005</p>
<p style="margin:0;">PARTES.:</p>
<p style="margin:0;">RECORRENTE(S)</p>
<p style="margin:0;">BOLSA DE MERCADORIA & FUTUROS BM&F</p>
<p style="margin:0;">RECORRIDO(S)</p>
<p style="margin-top:0;">MARCELO FERREIRA DE OLIVEIRA</p>

<p>EMENTA.:</p>

<p>ACUMULO DE FUNÇÃO. CONFIGURAÇÃO. Exercendo o reclamante dupla atividade de forma simultânea, viu-se desobrigada de contratar novo empregado, gerando assim prejuízos não só de ordem financeira ao empregado, mas também de origem orgânica, dado o evidente desgaste físico. A formalização do contrato de emprego depende do ajuste de vontade das partes, pelo que, o que for pactuado, tem caráter de imutabilidade, ressalvando-se a alteração permitida por mútuo consentimento, desde que a modificação do contrato, é claro, não traga prejuízos diretos ou indiretos ao empregado, segundo o disposto no artigo 468 Consolidado. <u>O recorrido teve seu contrato modificado apenas ao alvedrio do empregador, que lhe atribuiu uma carga maior de trabalho sem a devida contraprestação salarial, reputando-se tal alteração em desequilíbrio a natureza cumulativa e onerosa decorrente da relação de emprego.<u> Exsurge desta forma, o direito do autor em receber o adicional de acumulo de função, conforme reconhecido pelo MM Juízo “a quo” (grifos nosso).</p>
</td>
</tr>
</tbody>
</table>
<p></p>
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>ADICIONAL DE TRANFERÊNCIA</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
Dispõe o art. 469, da CLT que é vedado transferir o empregado sem a sua anuência para localidade diversa da que resultar do contrato, não se considerando transferência a que não acarretar necessariamente a mudança do seu domicílio.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Por sua vez, o empregador poderá transferir o empregado sem sua anuência quando a transferência decorra de real necessidade de serviço, quando esta condição seja inerente à função, como, por exemplo, no caso de vendedor-viajante, ou ainda quando conste expressamente no contrato de trabalho, devendo, para tanto, ser apontada na ficha ou livro de registro e na CTPS do empregado.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Vale dizer que, mesmo prevendo expressa ou implicitamente no contrato a condição de transferência, não havendo necessidade real de serviço, considera-se abusiva a transferência, conforme prevê a Súmula 43 do, c. TST, <i>in verbis</i>:
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<b>Súmula 43 TST:</b> "TRANSFERÊNCIA. Presume-se abusiva a transferência de que trata o § 1º do art. 469 da CLT, sem comprovação da necessidade do serviço."</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
Ainda, havendo transferência do empregado para outra cidade, <b><u>todas as despesas dela decorrentes ficarão a cargo do empregador</u></b>. Havendo transferência para outro local de trabalho, que não acarrete mudança de domicílio, mas que venha lhe acarretar maiores despesas, o empregador igualmente deverá arcar com essas diferenças, consoante o disposto na Súmula 29, do c.TST, <i>in verbis</i>:
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<b>Súmula 29 TST:</b> Empregado transferido, por ato unilateral do empregador, para local mais distante de sua residência, tem direito a suplemento salarial correspondente ao acréscimo da despesa de transporte.
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
Há que se considerar ainda que <b><u>o adicional somente será devido quando a transferência do empregado for provisória, assim entendida quando inferior a 3 anos</u></b>, conforme amplo entendimento jurisprudencial.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
<i>In casu</i>, <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante foi transferid<?php echo htmlspecialchars($_POST['sex_singular']); ?> pela Reclamada para a cidade de CIDADE 1, CIDADE 2, CIDADE 3 em 01/05/2002, sem que tenha constado na ficha de registro e na CTPS d<?php echo htmlspecialchars($_POST['sex_singular']); ?> Autor<?php echo htmlspecialchars($_POST['sex_or']); ?> os reais motivos que levaram à transferência d<?php echo htmlspecialchars($_POST['sex_singular']); ?> Obreiro<?php echo htmlspecialchars($_POST['sex_singular']); ?>. Ausente pois a condição explícita para o permissivo da transferência. 
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Nem tampouco a condição implícita fora satisfeita, porquanto <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante não laborava em atividade que implicitamente fosse inerente à função contratada.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Neste sentido, <b><u>é devido ao Autor o adicional de transferência, no importe de 30% da maior remuneração percebida durante todo o período em que fora transferido</u></b>.
</p>

</div>
</textarea>
</div>
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DESVIO OU ACUMULO DE FUNÇÃO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba1d3x1_2();esconder('area24_2')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area24_2">
<textarea id="aba1_3_desvio_acumulo_02" name="aba1_3_desvio_acumulo_02" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DOS DESVIO/ACUMULO DE FUNÇÃO</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
A função exercida pelo empregado pode compreender um conjunto de tarefas e atribuições. Para a configuração do desvio ou acúmulo de função, as tarefas acumuladas dever ser incompatíveis com aquela para a qual fora contratado o trabalhador.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
<i>In casu</i>, <u>além da função de <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, a Reclamada exigia que o Reclamante trabalhasse ainda como <?php echo htmlspecialchars($_POST['desvio_cargo_1']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_2']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_3']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_4']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_5']); ?></u>.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Desta forma, nada obstante exercida pelo Obreiro no curso do pacto laboral a função contratada, o exercício das atividades de <?php echo htmlspecialchars($_POST['desvio_cargo_1']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_2']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_3']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_4']); ?>,<?php echo htmlspecialchars($_POST['desvio_cargo_5']); ?> não estava incluído na cláusula geral, prevista no parágrafo único do art. 456 da CLT.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
De fato, são atividades completamente distintas, tendo inclusive proteção convencional individualizadas.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Vale ressaltar que a Reclamada não fez constar na CTPS do Reclamante e na folha de registro de empregado a alteração contratual, como era obrigada a fazê-lo, em atenção ao disposto no art. 468, da CLT, na medida em que o acúmulo de função se traduziu em evidentes e notórios prejuízos ao Obreiro, face o maior desgaste à sua saúde.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Aplicam-se ainda ao caso o disposto nos art. 422 e 884, do CCB, em relação aos princípios de probidade e boa-fé e ao enriquecimento à custa de outrem.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
A luz dos dispositivos apontados verifica-se que não se admite o enriquecimento sem causa nas relações trabalhistas já que, atribuindo funções além daquelas originalmente contratadas, o empregador está se beneficiando do trabalho sem em contrapartida retribuir o valor devido.
</p>
<p style="text-indent: 17.05em; margin-top: 0">
Neste caso, decidiu o Tribunal Regional do Trabalho da 11ª Região, <i>in verbis</i>:
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
“Comprovado nos autos que o reclamante acumulava as funções de Operador de Produção I, II e III, correta a decisão que deferiu diferença salarial a título de acúmulo de funções, arbitrando o percentual de 30% sobre o seu salário base. (RO ¬ 0162000-47.2009.5.11.018 – Relª Luíza Maria de Pompei Falabela Veiga)
</td>
</tr>
</tbody>
</table>
<p style="text-indent: 17.05em; margin-top: 0">
Por todo exposto, considerando o labor em acúmulo de função imposto pela Reclamada, bem como a ausência de justa contraprestação, resta evidenciado a violação aos dispositivos supramencionados e <u><b>faz jus <?php echo htmlspecialchars($_POST['sex_singular']); ?> Obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?> ao adicional por acúmulo de função no importe de <?php echo htmlspecialchars($_POST['desv_porc_input01']); ?>% sobre a remuneração,</b></u> durante a data <?php echo htmlspecialchars($_POST['desvio_datainicio']); ?> até <?php echo htmlspecialchars($_POST['desvio_datafim']); ?>, bem como à devida integração na remuneração, condenando a Reclamada no pagamento das respectivas diferenças em, v.g., 13º salários, férias+1/3, horas extras, DSR e feriados, FGTS+40% e aviso prévio.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab19">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DO DANO MORAL&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba19x1();esconder('area25')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area25">
<textarea id="aba19_dano_moral_01" name="aba19_dano_moral_01" style="height:50%;">
<div style="font-family:Book Antiqua;text-align:justify;font-size:16px;">
<table style="margin-right: auto;margin-left: auto;width:650px;height:auto;background-color:#cccccc;border-color:#000000;border:1px solid;bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><strong>DO DANO MORAL</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;font-weight:bold;">A NORMA CONSTITUCIONAL</p>

<p style="text-indent:17.05em;margin-bottom:0">Diz a CF/88, no inciso: X do artigo 5º, o seguinte:</p>
<p style="text-indent:17.05em;margin:0;font-weight:bold;">"são invioláveis a intimidade, a vida privada, a honra e a imagem das pessoas, assegurado o direito a indenização pelo dano material decorrente de sua violação."</p>

<p style="text-indent:17.05em;">Por esta norma, ressai que o sistema positivo concede a devida proteção ao dano moral, decorrente também de lesão à honra e a dignidade das pessoas.</p>

<p style="text-indent:17.05em;margin-bottom:0"> Em análise a esta norma, diz o constitucionalista JOSÉ AFONSO DA SILVA:</p>

<p style="text-indent:17.05em;margin:0">"A Constituição empresta muita importância à moral como valor ético-social da pessoa e da família, que se impõe respeito dos meios de comunicação social (art. 22). Ela, mais que as outras, realçou o valor da moral individual, tornando-a mesmo um bem indenizável (art. 5º, V e X). A moral individual sintetiza a honra da pessoa, o bom nome, a boa fama, a reputação que integram vida humana como dimensão imaterial. Ela e seus componentes são atributos sem os quais a pessoa fica reduzida a uma condição de animal de pequena significação. Daí porque o respeito à integridade moral do indivíduo assume feição fundamental. Por isso é que o Direito Penal tutela a honra contra a calúnia, a difamação e a injúria." Curso de Direito Constitucional Positivo, 9ª edição, 2ª tiragem. Editora Malheiros. São Paulo, p. 184.</p>

<p style="text-indent:17.05em;margin:0">Isto finda a controvérsia jurídica antes existente acerca do fundamento legal para que se concedesse indenização por ocasião de danos imateriais.</p>

<p style="text-indent: 17.05em;margin-top: 0">Põe o dispositivo proteção contra àqueles que provocam agressão na dignidade das pessoas, o que faz elevar a honra a bem jurídico civilmente amparado.</p>

<p style="text-indent: 17.05em; margin-top: 0">Entretanto, neste caso concreto, vislumbra-se alguma honra a ser protegida? Houve dignidade vilipendiada? É possível a subjetivação tanto da honra como da dignidade, para efeito de configurar o dano moral assacado contra os autores? Sim. Sim. Sim.</p>

<p style="text-indent: 17.05em; margin-top: 0">Na doutrina de ANÍBAL BRUNO se encontra os seguinte escólio:</p>

<p style="text-indent:17.05em;margin-top:0;font-weight:bolder;">"Injúria é a palavra ou gesto ultrajante com que o agente ofende o sentimento de dignidade da vítima...
Na sua essência, é a injúria uma manifestação de desrespeito e desprezo, um juízo depreciativo capaz de ofender a honra da vítima no seu aspecto subjetivo. Pode referir-se a condições pessoais do ofendido, do seu corpo, do seu espírito, da sua cultura, da sua moral, ou ainda da sua qualificação profissional na sociedade ou da sua capacidade profissional." CRIMES CONTRA A HONRA. 3ª edição, Editora Rio, Rio de Janeiro, 1975, p. 301.</p>

<p style="text-indent: 17.05em; margin-top: 0">O professor JOÃO CASILO, em monografia acerca do tema, expõe um conceito pessoal de dano moral, bastante aplicável ao caso em tela:</p>

<p style="text-indent: 17.05em; margin-top: 0">"A verdade é que uma conceituação mais adequada aos nossos dias exige que o dano seja entendido como resultado da ofensa por terceiro a um direito, patrimonial ou não, que confere ao ofendido, como conseqüência, a pretensão a uma indenização. Esta abrangência do conceito de dano toma maior importância, se a lesão é contra a pessoa humana, exigindo uma correspondente compensação.</p>

<p style="text-indent: 17.05em; margin-top: 0">Para que haja a ofensa, basta que o direito titulado seja violado..." DANO A PESSOA E SUA INDENIZAÇÃO. Editora Saraiva, São Paulo, p. 29, 1987.</p>

<p style="text-indent: 17.05em; margin-top: 0">Por esta doutrina, infere-se que o conceito de dano também abrange o dano moral.</p>

<p style="text-indent: 17.05em; margin-top: 0">O jurista ANTONIO CHAVES diz o seguinte:</p>

<p style="text-indent: 17.05em; margin-top: 0">"Dano moral é a dor resultante da violação de um bem juridicamente tutelado sem repercussão patrimonial. Seja a dor física - dor - sensação como denomina Carpenter - nascida de uma lesão material; seja dor moral - dor - sensação - de causa material." (TRATADO DE DIREITO CIVIL. Vol. III, São Paulo, Revista dos Tribunais, p. 573, 1985).</p>

<p style="text-indent: 17.05em; margin-top: 0">O Magistrado Clayton Reis, da Comarca de Curitiba, Estado do Paraná, tem como escólio o seguinte:</p>

<p style="text-indent: 17.05em; margin-top: 0">"Todavia, há circunstâncias em que o ato lesivo afeta a personalidade do indivíduo, sua honra, sua integridade psíquica, seu bem-estar íntimo, suas virtudes, enfim, causando-lhe mal-estar ou uma indisposição de natureza espiritual - pateme d'animo - na expressão dos tratadistas italianos." DANO MORAL. Forense, Rio de Janeiro, 1991, p. 4.</p>

<p style="text-indent: 17.05em; margin-top: 0">Ele ainda diz:</p>

<p style="text-indent: 17.05em; margin-top: 0">"A constatação da existência de um patrimônio moral e a conseqüente necessidade de sua reparação, na hipótese de dano, constituem marco importante no processo evolutivo das civilizações. Isto porque representa a defesa dos direitos do espírito humano e dos valores que compõem a personalidade do homo sapiens." Obra citada, p. 7.</p>

<p style="text-indent: 17.05em; margin-top: 0">Verifica-se, então, que a norma constitucional e doutrina fornecem o amparo à existência do dano moral, e à sua reparabilidade.</p>

<p style="text-align:center;font-weight:bold;">DA CONFIGURAÇÃO DO DANO</p>

<p style="text-indent: 17.05em; margin-top: 0">Diante da exposição fática, observa-se que os autores foram vilipendiados na sua dignidade.</p>

<div><?php echo htmlspecialchars($_POST['textarea_danomoral']); ?></div>

<p style="text-indent: 17.05em; margin-top: 0">Tudo isto aos olhos dos demais funcionários, que prostravam-se a rir do autor em pleno horário de serviços e, na frente dos clientes </p>
<p style="text-indent: 17.05em; margin-top: 0">DA RESPONSABILIDADE OBJETIVA</p>

<p style="text-indent: 17.05em; margin-top: 0">O dano moral foi causado por pessoas que possuem vínculo de trabalho com a requerida, e no exercício de atribuição funcional.</p>

<p style="text-indent: 17.05em; margin-top: 0">O evento ocorreu dentro de sua sede, nesta cidade.</p>

<p style="text-indent: 17.05em; margin-top: 0">Por isso, vem a dicção do artigo 186 do Código Civil:</p>

<p style="text-indent: 17.05em; margin-top: 0">"Aquele que, por ação ou omissão voluntária, negligência, ou imprudência, violar direito e causar dano a outrem, ainda que exclusivamente moral, comete ato ilícito."</p>

<p style="text-indent: 17.05em; margin-top: 0">Em complemento, expressa o inciso III, do artigo 932 do Código Civil:</p>
<p style="text-indent: 17.05em; margin-top: 0">"São também responsáveis pela reparação civil:</p>
...

<p style="text-indent: 17.05em; margin-top: 0">III - o empregador ou comitente, por seus empregados, serviçais e prepostos, no exercício do trabalho que lhes competir, ou em razão dele (art. 932)."</p>

<p style="text-indent: 17.05em; margin-top: 0">Durante todo o período, então, estavam representando a pessoa jurídica supostamente lesionada.</p>

<p style="text-indent: 17.05em; margin-top: 0">Infere-se, desse modo, que a requerida é responsável pelos atos praticados pelos seus executivos. Devendo, então, responder pelos prejuízos causados por eles.</p>

<p style="text-indent: 17.05em; margin-top: 0">3. DA INDENIZAÇÃO</p>

<p style="text-indent: 17.05em; margin-top: 0">O inciso X do artigo 5º da CF/88 garante aos ofendidos, o direito de serem indenizados nos casos como o que aqui se discute.</p>

<p style="text-indent: 17.05em; margin-top: 0">Infraconstitucionalmente, dispõe o artigo 953 do Código Civil, que a indenização por injúria, difamação ou calúnia consistirá na reparação do dano que delas resulte ao ofendido.</p>

<p style="text-indent: 17.05em; margin-top: 0">Por sua vez, o seu parágrafo único acrescenta que:</p>

<p style="text-indent: 17.05em; margin-top: 0">"Se o ofendido não puder provar o prejuízo material, caberá ao juiz fixar, eqüitativamente, o valor da indenização, na conformidade das circunstâncias do caso."</p>

<p style="text-indent: 17.05em; margin-top: 0">Pela exposição fática, ilai-se que não se configura um aspecto patrimonial para a determinação de um quantum indenizatório.</p>

<p style="text-indent: 17.05em; margin-top: 0">Mencionando novamente o professor JOÃO CASILO, ele escreve:</p>

<p style="text-indent: 17.05em; margin-top: 0">"Entretanto, nem sempre a ofensa à honra acarreta repercussão patrimonial, causando prejuízo material ao ofendido. Nem por isso deixou de ocorrer a lesão do direito, o dano, no seu mais amplo e moderno entendimento. Havendo dano, deve haver a correspondente indenização." Obra citada, p. 169.</p>

<p style="text-indent: 17.05em; margin-top: 0">PARÂMETROS DA INDENIZAÇÃO</p>

<p style="text-indent: 17.05em; margin-top: 0">Para aferição da repercussão da indenização no patrimônio do responsável, exige a lei que se considere também sua capacidade econômica, porque é corolário do princípio da justiça que, "quem pode o mais paga mais, quem pode o menos paga menos."</p>

<p style="text-indent: 17.05em; margin-top: 0">A requerida pode pagar o mais.</p>

<p style="text-indent: 17.05em; margin-top: 0">A ré é pessoa jurídica de reconhecimento notório, trata-se de uma empresa transnacional e com uma situação financeira equilibrada, haja vista não ser concordatária ou em estado falimentar.</p>

<p style="text-indent: 17.05em; margin-top: 0">Em razão disso, pode perfeitamente suportar o mais. Pois, a insignificância de uma indenização ínfima nenhum efeito pode lhe ocasionar, tornando inócuo o real espírito da sanção civil, que é fazer com que o causador de um dano sinta financeiramente as conseqüências da sua conduta negligente.</p>

<p style="text-indent: 17.05em; margin-top: 0">Por outro lado, o vilipêndio moral sofrido pelos autores, tanto no seu círculo profissional como no particular, é inestimável, principalmente pelo fato de que prestava serviço à requerida há cinco anos, sem ter sofrido nenhuma sanção funcional ou trabalhista, aliado ainda ao constrangimento moral a que foi submetido, estimando assim a indenização em <?php echo htmlspecialchars($_POST['danom_sal_inp01']); ?> salários mínimos.</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab20">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">MULTA DO ARTIGO 477 CLT&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba20x1();esconder('area29')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area29">
<textarea id="aba20_art_477" name="aba20_art_477" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><strong>DA MULTA DO ART. 477, DA CLT</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;margin-top:0">
O não pagamento das verbas rescisórias, a tempo e modo, enseja a aplicação do disposto no art. 477, § 8°, da CLT, o qual dispõe que o não pagamento das verbas rescisórias no prazo legal, importará na condenação do empregador no pagamento de uma multa com valor equivalente ao salário do empregado.
</p>
<p style="text-indent: 17.05em;margin-top:0;">
Pela inobservância do prazo legal, incorreu a Reclamada na multa prevista no § 8º. do citado artigo consolidado, em valor equivalente a um salário da Reclamante.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab21">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL DE INSALUBRIDADE&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba21x1();esconder('area30')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area30">
<textarea id="aba21_insalubridade_01" name="aba21_insalubridade_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#cccccc;border-color:#000000;border:1px solid;bordercolor:#000000;">
<tbody>
<tr>
<td>
<p>
<center>
<b>ADICIONAL DE INSALUBRIDADE</b>
</center>
</p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">Conforme observa-se dos inclusos holerites de pagamento d<?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?>, temos que a reclamada jamais remunerou lhe com o adicional de insalubridade devido, nos termos do artigo 192 da CLT, o que ora requer, tendo em vista que no desempenho de suas funções como <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, permanecia exposto a produtos químicos e prejudiciais ao organismo humano tais como <b><?php echo htmlspecialchars($_POST['obj_insalubre']); ?></b> e outros ofensivos a saúde, <?php echo htmlspecialchars($_POST['txt_conf_insa1']); ?><?php echo htmlspecialchars($_POST['txt_conf_insa2']); ?> <?php echo htmlspecialchars($_POST['mes_insalubre1']); ?> <?php echo htmlspecialchars($_POST['ano_insalubre1']); ?>.</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<b>
SUM-293	ADICIONAL DE INSALUBRIDADE. CAUSA DE PEDIR. AGENTE NOCIVO DIVERSO DO APONTADO NA INICIAL (mantida) - Res. 121/2003, DJ 19, 20 e 21.11.2003
</b>
A verificação mediante perícia de prestação de serviços em condições nocivas, considerado agente insalubre diverso do apontado na inicial, não prejudica o pedido de adicional de insalubridade.
Histórico:
Redação original - Res. 3/1989, DJ 14, 18 e 19.04.1989
</td>
</tr>
</tbody>
</table>
<div style="width:100%">
<p style="text-indent:17.05em;">Pelo exposto, deverá a Ré ser compelida ao pagamento do referido adicional à base de <?php echo htmlspecialchars($_POST['insa_porcentual']); ?>% mensais sobre o salário base d<?php echo htmlspecialchars($_POST['sex_singular']); ?> Autor<?php echo htmlspecialchars($_POST['sex_or']); ?>.</p>
<p style="text-indent:17.05em;">Ressalte-se que o adicional de insalubridade dever ter seu valor computado para efeito de cálculos de horas extras, conforme entendimentos em nossos tribunais abaixo transcritos que observando hipóteses semelhantes assim se pronunciam:</p>
</div>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<b>
SUM-47	 INSALUBRIDADE (mantida) - Res. 121/2003, DJ 19, 20 e 21.11.2003
</b>
O trabalho executado em condições insalubres, em caráter intermitente, não afasta, só por essa circunstância, o direito à percepção do respectivo adicional.
Histórico:
Redação original - RA 41/1973, DJ 14.06.1973
<i>Nº 47 O trabalho executado, em caráter intermitente, em condições insalubres, não afasta, só por essa circunstância, o direito à percepção do respectivo adicional.</i>
</td>
</tr>
</tbody>
</table>
<div>
<p style="text-indent:17.05em;">
Requer ainda, a incidência do adicional de insalubridade nos descansos semanais remunerados e, que ambos integrem o <b>salário</b>, e <b>verbas contratuais</b> do Reclamante, para todos os efeitos legais, ou seja:   nas férias + 1/3 de todo o período laborado; nos 13º salários de todo o período laborado, nos recolhimentos fundiários (artigos 9º e 22º do FGTS) e em verbas rescisórias com base nos <b>Enunciados 45, 63, 76, 94, 108, 115, 172, 215, 226 e 264 do Colendo Tribunal Superior do Trabalho. </b>
</p>
</div>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab22">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL DE PERICULOSIDADE&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba31x1();esconder('area31')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area31">
<textarea id="aba22_periculosidade_01" name="aba22_periculosidade_01" style="height:50%;">
<div style="font-family:Book Antiqua;text-align:justify;font-size:16px;">
<table style="margin-right: auto;margin-left:auto; width:650px;height:auto;background-color:#cccccc;border-color:#000000;border:1px solid; bordercolor:#000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><strong>ADICIONAL DE PERICULOSIDADE</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">Conforme observa-se dos inclusos holerites e pagamento d<?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?>, <?php echo htmlspecialchars($_POST['txt_conf_peri1']); ?><?php echo htmlspecialchars($_POST['txt_conf_peri2']); ?> <?php echo htmlspecialchars($_POST['mes_periculoso1']); ?> <?php echo htmlspecialchars($_POST['ano_periculoso1']); ?>, nos termos do artigo 193 da CLT e seus parágrafo, o que ora requer, tendo em vista que no desempenho de suas funções como <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, trabalhava com <b><?php echo htmlspecialchars($_POST['obj_periculoso']); ?></b>, sendo assim, deverá <?php echo htmlspecialchars($_POST['sex_singular']); ?> mesma ser compelida ao pagamento do referido adicional, consoante o que determina o artigo 193 parágrafo 1º da CLT.</p>
<table align="right" style="width:316px;height:auto;border:0px solid;text-align:justify;font-weight:bold;margin:1px;background-color:#cccccc;">
<tbody>
<tr>
<td>
Art. 193 da CLT
São consideradas atividades ou operações perigosas, na forma da regulamentação aprovada pelo Ministério do Trabalho, aquelas que, por sua natureza ou métodos de trabalho, impliquem o contato permanente com inflamáveis ou explosivos em condições de risco acentuado.
Parágrafo 1º
O trabalho em condições de periculosidade assegura ao empregado um adicional de 30% (trinta por cento) sobre o salário sem os acréscimos resultante de gratificações, prêmios ou participações nos lucros da empresa
</td>
</tr>
</tbody>
</table>
</div>
</textarea>
</div>

<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL DE PERICULOSIDADE, VIGILANTE&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba31x2();esconder('area31x2')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area31x2">
<textarea id="aba22_periculosidade_02" name="aba22_periculosidade_02" style="height:50%;">
<div style="font-family:Book Antiqua;text-align:justify;font-size:16px;">
<table style="margin-right: auto;margin-left:auto; width:650px;height:auto;background-color:#cccccc;border-color:#000000;border:1px solid; bordercolor:#000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><strong>ADICIONAL DE PERICULOSIDADE, VIGILANTE</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
É sabido que as atividades ou condições perigosas são aquelas que, por sua natureza, condições ou métodos de trabalho, expõem os empregados a inflamáveis, explosivos, energia elétrica (art. 193, I) ou a roubos ou outras espécies de violência física nas atividades de segurança pessoal e patrimonial (art. 193, II). Por outro lado, fixa o art. 193, § 1º, da CLT, o grau de incidência do adicional em 30% do salário. Neste sentido, dispõe a NR 16, do MTE.
</p>
<p style="text-indent:17.05em;">
No presente caso, <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante laborava como vigilante e, portanto, esteve durante o periodo após <b><?php echo htmlspecialchars($_POST['mes_periculoso1']); ?> <?php echo htmlspecialchars($_POST['ano_periculoso1']); ?></b> seu contrato de trabalho, exposto a risco acentuado em virtude de exposição permanente a roubos ou outras espécies de violência física, face as atividades profissionais de segurança pessoal ou patrimonial.
</p>
<p style="text-indent:17.05em;">
A Lei nº 12740, vigente a partir de 08/12/2012, reconheceu expressamente o direito dos Vigilantes ao adicional de periculosidade, eis que tais trabalhadores estão a toda evidência sujeitos à violência, em suas atividades profissionais de segurança pessoal e patrimonial.
</p>
<p style="text-indent:17.05em;">
Dessa forma, restou demonstrado o labor em ambiente perigoso, apto a ensejar a <b>condenação do Reclamado no pagamento ao Reclamante do adicional de periculosidade, a ser fixado em 30% do salário.</b>
</p>
<p style="text-indent:17.05em;">
Tem direito, ainda, o Autor à <b>integração do adicional na remuneração</b>, para todos os efeitos legais, nos termos da Súmula 132, do TST, e aos <b>reflexos</b> em 13º salários, Férias+1/3, FGTS+40%, DSR e feriados, aviso prévio, etc.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab23">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL DE TRANFERÊNCIA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba32x1();esconder('area32')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area32">
<textarea id="aba32_adctranfer_01" name="aba32_adctranfer_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#cccccc;border-color:#000000;border:1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>ADICIONAL DE TRANFERÊNCIA</strong></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">Conforme informa o autor o mesmo laborava externo em varias cidades do pais chegando a labora por varios meses em CIDADE 1, CIDADE 2, CIDADE 3 nada recebendo de transferência</p> 

<p style="text-indent:17.05em;">Assim temos que,  neste periodo houve a tranferencia do autor e, enquanto durou o serviço realizado,  morou em local diverso da contratação original.</p>

<p style="text-indent:17.05em;">Desta forma requer o adicional de transferência de 25% no periodo retro descrito nos moldes  do artigo 469 da CLT e seu pragrafo 3º</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
Artigo 469 da CLT § 3º - Em caso de necessidade de serviço o empregador poderá transferir o empregado para localidade diversa da que resultar do contrato, não obstante as restrições do artigo anterior, mas, nesse caso, ficará obrigado a um pagamento suplementar, nunca inferior a 25% (vinte e cinco por cento) dos salários que o empregado percebia naquela localidade, enquanto durar essa situação. (Parágrafo incluído pela Lei nº 6.203, de 17.4.1975)
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">Tal adicional encontra respaldo ainda nos entendimentos abaixo colacionados</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<p style="margin:0;">SUM- 43 TRANSFERÊNCIA (mantida) - Res. 121/2003, DJ 19, 20 e 21.11.2003</p>
<p style="margin:0;">Presume-se abusiva a transferência de que trata o § 1º do art. 469 da CLT, sem comprovação da necessidade do serviço.</p>
<p style="margin-top:0;">Histórico:</p>
<p>Redação original -  RA 41/1973, DJ 14.06.1973</p>
ADICIONAL DE TRANSFERÊNCIA. CARGO DE CONFIANÇA OU PREVISÃO CONTRATUAL DE TRANSFERÊNCIA. DEVIDO. DESDE QUE A TRANSFERÊNCIA SEJA PROVISÓRIA (inserida em 20.11.1997)
O fato de o empregado exercer cargo de confiança ou a existência de previsão de transferência no contrato de trabalho não exclui o direito ao adicional. O pressuposto legal apto a legitimar a percepção do mencionado adicional é a transferência provisória.
</td>
</tr>
</tbody>
</table>

</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab24">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">EQUIPARAÇÃO DE PARADIGMAS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba33x1();esconder('area33')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area33">
<textarea id="aba24_equiparacao_01" name="aba24_equiparacao_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#cccccc;border-color:#000000;border:1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>EQUIPARAÇÃO SALARIAL</p></strong>
</td>
</tr>
</tbody>
</table> 
<p style="text-indent:17.05em;">
<font style="text-transform:uppercase"><?php echo htmlspecialchars($_POST['sex_singular']); ?></font> autor<?php echo htmlspecialchars($_POST['sex_or']); ?>, em todo interstício mourejado, sempre exerceu a função de <b><?php echo htmlspecialchars($_POST['nome_cargo']); ?></b>, idêntica às funções do(s) modelo(s) paradígma(s) <b><?php echo htmlspecialchars($_POST['p_nome_select']); ?> <?php echo htmlspecialchars($_POST['p_nome_1']); ?>,<?php echo htmlspecialchars($_POST['p_nome_2']); ?>,<?php echo htmlspecialchars($_POST['p_nome_3']); ?>,<?php echo htmlspecialchars($_POST['p_nome_4']); ?>,<?php echo htmlspecialchars($_POST['p_nome_5']); ?></b>. Ocorre que o(s) modelo(s)   recebiam remuneração maior que a d<?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?>, vez que <?php echo htmlspecialchars($_POST['sex_singular']); ?> Reclamante  percebia <b>R$ <?php echo htmlspecialchars(empty($_POST['salario']) ? '' : number_format($_POST['salario'],2,",",".")) ?> (<?php echo extenso("$salario",1,$caixa="baixa")?>), enquanto</b> o(s) referido(s) modelo(s) recebia(m) <b>R$ <?php echo htmlspecialchars(empty($_POST['p_salario_select']) ? '' : number_format($_POST['p_salario_select'],2,",",".")) ?></b>, por mês, muito embora existisse a identidade de funções, que eram executadas com igual perfeição técnica e igual zelo, defeso no artigo 461 da CLT, que pedimos venia para transcrever abaixo:
</p>
<p style="text-indent:17.05em;">
Artigo 461 - Sendo idêntica a função, a todo trabalho de igual valor, prestado ao mesmo empregador, na mesma localidade, corresponderá igual salário, sem distinção de sexo, nacionalidade ou idade. (Redação dada pela Lei nº 1.723, de 8.11.1952).
</p>
<p style="text-indent:17.05em;">
§ 1º - Trabalho de igual valor, para os fins deste Capítulo, será o que for feito com igual produtividade e com a mesma perfeição técnica, entre pessoas cuja diferença de tempo de serviço não for superior a 2 (dois) anos. (Redação dada pela Lei nº 1.723, de 8.11.1952).
</p>
<p style="text-indent:17.05em;">
§ 2º - Os dispositivos deste artigo não prevalecerão quando o empregador tiver pessoal  organizado em quadro de carreira, hipótese em que as promoções deverão obedecer aos critérios de antigüidade e merecimento. (Redação dada pela Lei nº 1.723, de 8.11.1952).
</p>
<p style="text-indent:17.05em;">
§ 3º - No caso do parágrafo anterior, as promoções deverão ser feitas alternadamente por merecimento e por antingüidade, dentro de cada categoria profissional. (Incluído pela Lei nº 1.723, de 8.11.1952).
</p>
<p style="text-indent:17.05em;">
§ 4º - O trabalhador readaptado em nova função por motivo de deficiência física ou mental atestada pelo órgão competente da Previdência Social não servirá de paradigma para fins de equiparação salarial. (Incluído pela Lei nº 5.798, de 31.8.1972).
</p>
<p style="text-indent:17.05em;">
Informa ainda <?php echo htmlspecialchars($_POST['sex_singular']); ?> autor<?php echo htmlspecialchars($_POST['sex_or']); ?> que o(a) paradígma Senhor(a) <b><?php echo htmlspecialchars($_POST['p_nome_select']); ?></b> ingressou na Ré <b><?php echo htmlspecialchars($_POST['p_inicio_select']); ?> sua admissão</b>, já percebendo salário superior, mesmo, repita-se, exercendo as mesmas funções.
</p>
<p style="text-indent:17.05em;">
Pelo exposto, faz jus e requer <?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?> o recebimento das diferenças saláriais pela equiparação salarial pretendida, especialmente com o modelo <b><?php echo htmlspecialchars($_POST['p_nome_select']); ?></b>, em todo o lapso laboral,  nos termos do artigo  461 da CLT.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab25">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DO PLR&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba34x1();esconder('area34')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area34">
<textarea id="aba25_plr_01" name="aba25_plr_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DA PARTICIPAÇÃO EM LUCROS E RESULTADOS</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">Conforme inclusas Convenções Coletivas de trabalho, tem <?php echo htmlspecialchars($_POST['sex_singular']); ?> autor<?php echo htmlspecialchars($_POST['sex_or']); ?> garantid<?php echo htmlspecialchars($_POST['sex_singular']); ?> a remuneração anual a título de Participação em lucros e resultados, o que requer seja outorgado em audiência vestibular, eis que a reclamada não observou os dispositivos legais, não a remunerou com a PLR mesmo que parcial, devendo tais valores serem pagos em audiência vestibular</p>

<p style="text-indent:17.05em;">Assim sendo requer o pagamento das referidas participações em lucros e resultados devidos em audiência vestibular, no importe de <?php echo htmlspecialchars($_POST['plr_val_inp01']); ?> R$  (ref. Aos <?php echo htmlspecialchars($_POST['plr_mes_inp01']); ?> meses laborados com base no valor de <?php echo htmlspecialchars($_POST['plr_valor']); ?> R$ conforme  CCT clausula __ª), sob pena de execução direta e aplicação do disposto nos artigos 168 e 203 do código penal sobre os representantes legais da reclamada, requerendo seja o valor devido pago pelo piso base atualizado, nos termos da legislação vigente.</p> 

<p style="text-indent:17.05em;">Requer ainda a integração da PLR  para efeitos de pagamentos de 13º salários, férias, FGTS e horas extras nos termos da Sumula 21 do TST abaixo inserida “in verbis”</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:300px;">
SUM-251	- PARTICIPAÇÃO NOS LUCROS. NATUREZA SALARIAL. (cancelamento mantido) - Res. 121/2003, DJ 19, 20 e 21.11.2003 - Referência art. 7º, XI, CF/1988
<br> 
A parcela participação nos lucros da empresa, habitualmente paga, tem natureza salarial, para todos os efeitos legais.
</td>
</tr>
</tbody>
</table>
<p style="margin:0;"></p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab26">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DO INTERVALOS&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba35x1();esconder('area35')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area35">
<textarea id="aba26_intervalos_01" name="aba26_intervalos_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DOS INTERVALOS</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
<span style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['sex_singular']); ?></span> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?>,  conforme declinado, jamais gozou de intervalos para refeição e descanso, de uma hora, conforme determina o artigo 71 da CLT, fazendo jus, portanto, a conversão de tais intervalos em horas extras e seu pagamento com o adicional de <?php echo htmlspecialchars($_POST['ext_porcento']); ?>%, conforme determina a CCT anexa e, tendo em vista o exposto no parágrafo 4º do referido artigo 71 da CLT, sendo certo que prestou ao longo do lapso a média de <?php echo htmlspecialchars($_POST['int_hrs_inp01']); ?> horas extras ao mes, as quais faz jus e requer seja pagas em audiência vestibular.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab27">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DOS VALES REFEIÇÕES&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba36x1();esconder('area36')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area36">
<textarea id="aba27_valerefeição_01" name="aba27_valerefeição_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DOS VALES REFEIÇÕES</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;margin-top:0">Conforme inclusos instrumentos normativos da categoria clausula __ª, <?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?> tem assegurada os vales refeição diarios de R$ <?php echo htmlspecialchars($_POST['VR_valor']); ?> cada,   que jamais foi fornecido pela reclamada.
</p>
<p style="text-indent:17.05em;margin-top:0">
Desta forma requer-se seja a mesmo compelida  no pagamento dos vales refeição no valor de R$ <?php echo htmlspecialchars($_POST['VR_valor']); ?> por dia efetivamente laborado e pertinentes a todo o lapso laboral, em audiência vestibular, sob pena de execução pelo valor correspondente.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab28">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DA CESTA BÁSICA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba37x1();esconder('area37')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area37">
<textarea id="aba28_cestabasica_01" name="aba28_cestabasica_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DA CESTA BÁSICA</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;margin-top:0">
Conforme inclusos instrumentos normativos da categoria <?php echo htmlspecialchars($_POST['sex_singular']); ?> autor<?php echo htmlspecialchars($_POST['sex_or']); ?> tem assegurad<?php echo htmlspecialchars($_POST['sex_singular']); ?> a cesta básica de alimentos, que jamais foi fornecida pela reclamada
</p>
<p style="text-indent:17.05em;margin-top:0">
Desta forma requer-se seja a reclamada compelida no forneciemento das cestas básicas devidas ou seu pagamento em pecunia pelo valor da cesta básica regional vigente, em audiência vestibular, sob pena de execução pelo valor correspondente.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab29">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL NOTURNO HORAS REDUZIDA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba38x1();esconder('area38')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area38">
<textarea id="aba29_hrsnoturnareduzida_01" name="aba29_hrsnoturnareduzida_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DO ADICIONAL NOTURNO HORAS NOTURNAS REDUZIDAS</b></p>
</td>
</tr>
</tbody>
</table>
<p>Conforme observa-se da jornada declinada em linhas retro, temos que <?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?> laborou em média cerca de 189 horas noturnas ao mês (relativas a jornada entre <?php echo htmlspecialchars($_POST['noite_ent']); ?>h e <?php echo htmlspecialchars($_POST['noite_exit']); ?>h do dia seguinte), ocorre que a reclamada jamais remunerou as referidas horas com o adicional de <?php echo htmlspecialchars($_POST['adc_noite_porc']); ?>% sobre a hora normal, conforme determina a clausula dissidial do incluso instrumento normativo, o que requer o obreiro seja pago em audiência vestibular</p>

<p>Ressalte-se que tendo em vista a jornada noturna descrita, tem direito ainda o obreiro e ora requer o pagamento da hora noturna reduzida, tendo em vista que conforme artigo 73 parágrafo 1º da CLT, a hora noturna laborada, corresponde a 52´30´´ (Cinqüenta e dois minutos e trinta segundos),  o que gera por ficção legal a hora noturna reduzida, sendo certo que no lapso laboral e pelo labor descrito, faz jus o obreiro ao pagamento das horas noturnas reduzidas que devem ser remuneradas com o adicional de __% previsto nas CCT anexas.</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab30">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DIFERENÇA DO ADICIONAL NOTURNO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba39x1();esconder('area39')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area39">
<textarea id="aba30_hrsnoturna_01" name="aba30_hrsnoturna_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>ADICIONAL NOTURNO</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
A <u><b>Constituição Federal</b></u>, no seu artigo <u><b>7º</b></u>, inciso <u><b>IX</b></u>, estabelece que são direitos dos trabalhadores, além de outros, remuneração do trabalho noturno superior à do diurno.
</p>
<p style="text-indent:17.05em;">
O adicional noturno, bem como as horas extras noturnas, pagos com habitualidade, integram o salário para todos os efeitos legais, conforme Enunciado I da Súmula TST nº 60, dessa forma, e acrescentando o fato do reclamante receber tais benefícios com habitualidade, é que se requer que os mesmos sejam incorporados ao salário do reclamante para o cômputo de todas as parcelas de direito.
</p>
<p style="text-indent:17.05em;">
Conforme observa-se dos envelopes de pagamento <?php echo htmlspecialchars($_POST['sex_singular']); ?> autor<?php echo htmlspecialchars($_POST['sex_or']); ?> recebia parciais horas de adicional noturno pelo labor após as 22h00m, fazendo jus porem as diferenças a sem apuradas em regular liquidação de sentença.
 </p>
<p style="text-indent:17.05em;">
Por ter trabalhado durante todo o pacto laboral após as 22:00 horas <?php echo htmlspecialchars($_POST['sex_singular']); ?> reclamante faz jus ao pagamento e a incorporação do adicional noturno pago e devido, com acréscimo legal de 20% e ainda a redução do horário noturno conforme estipula o § 1º do art. 73 da CLT o que também é devido.
<p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab31">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">ADICIONAL NOTURNO E HORAS REDUZIDA&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba40x1();esconder('area40')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area40">
<textarea id="aba31_hrsnoturnareduzida_01" name="aba31_hrsnoturnareduzida_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DO ADICIONAL NOTURNO HORAS NOTURNAS REDUZIDAS</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
Conforme observa-se da jornada declinada em linhas retro, temos que <?php echo htmlspecialchars($_POST['sex_singular']); ?> obreir<?php echo htmlspecialchars($_POST['sex_singular']); ?> laborou em média cerca de 189 horas noturnas ao mês (relativas a jornada entre <?php echo htmlspecialchars($_POST['noite_ent']); ?>h e <?php echo htmlspecialchars($_POST['noite_exit']); ?>h do dia seguinte), ocorre que a reclamada jamais remunerou as referidas horas com o adicional de <?php echo htmlspecialchars($_POST['adc_noite_porc']); ?>% sobre a hora normal, conforme determina a clausula dissidial do incluso instrumento normativo, o que requer o obreiro seja pago em audiência vestibular
</p>
<p style="text-indent:17.05em;">
Ressalte-se que tendo em vista a jornada noturna descrita, tem direito ainda o obreiro e ora requer o pagamento da hora noturna reduzida, tendo em vista que conforme artigo 73 parágrafo 1º da CLT, a hora noturna laborada, corresponde a 52´30´´ (Cinqüenta e dois minutos e trinta segundos),  o que gera por ficção legal a hora noturna reduzida, sendo certo que no lapso laboral e pelo labor descrito, faz jus o obreiro ao pagamento das horas noturnas reduzidas que devem ser remuneradas com o adicional de __% previsto nas CCT anexas.
</p>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab32">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">HORAS EXTRAS DOMINGO/FERIADO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba41x1();esconder('area41')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area41">
<textarea id="aba32_hrsdomferiados_01" name="aba32_hrsdomferiados_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>HORAS EXTRAS TRABALHADAS AOS DOMINGOS E FERIADOS</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
<span style="text-transform:uppercase;"><?php echo htmlspecialchars($_POST['sex_singular']); ?></span> Reclamante trabalhou em domingos e feriados durante todo o pacto laboral, sem a devida folga correspondente aos domingos e feriados.
</p>
<p style="text-indent:17.05em;">
O labor em domingos e feriados, sem a correspondente folga até o sétimo dia consecutivo, autoriza seu pagamento em dobro, sem prejuízo da remuneração relativa ao repouso semanal, a teor do disposto na Súmula 146 do TST e da Orientação Jurisprudencial 410 da SDI - 1 do TST, bem com respectivos reflexos em horas extras, 13º salários, férias+1/3, FGTS+40% e aviso prévio.
</p>
<p style="text-indent:17.05em;">
É neste sentido o entendimento do Tribunal Regional do Trabalho da 3ª Região, in verbis:
</p>
<p style="text-indent:17.05em;">Tal adicional encontra respaldo ainda nos entendimentos abaixo colacionados</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
HORAS EXTRAS. TRABALHO EM REPOUSOS SEMANAIS REMUNERADOS E FERIADOS. Hipótese em que se verifica a exigência de labor por mais de sete dias consecutivos sem a concessão de folga ou pagamento da jornada suplementar. Horas extras devidas em face do labor em repousos semanais remunerados e feriados. Aplicação da OJ nº 410 DA SDI-I do TST. (TRT 4ª Região, 0000580-59.2012.5.04.0103, Relator George Achutti, Data de Julgamento: 16/05/2013).
</td>
</tr>
</tbody>
</table>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab100">
<div id="area26">
<textarea id="aba100_verbasliquidas_01" name="aba100_verbasliquidas_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>Ante todo o exposto, pleiteia as verbas liquidas devidas</strong></p>
</td>
</tr>
</tbody>
</table>
<br />
<table style="margin-right:auto;margin-left:auto;width:640px;height:auto;border:1px solid;">
<tbody>
<tr style="height:35px;display:<?php echo ($_POST['av_none01']); ?>;">
<td style="width: 506px;border:0px solid;border-color:#cccccc;">
<p>
<strong>
<?php echo htmlspecialchars($_POST['position1']); ?><?php echo htmlspecialchars($_POST['oculto_inp01']); ?>
</strong>
</p>

<div>
<?php echo htmlspecialchars($_POST['av_inp01']); ?> <?php echo htmlspecialchars($_POST['txt_inp01']); ?>
</div>

<div>
<?php echo htmlspecialchars($_POST['dia_inp02']); ?> <?php echo htmlspecialchars($_POST['txt_inp02']); ?>
</div>
</td>
<td style="width: 128px;border:0px solid;border-color:#cccccc;">
<p>&nbsp;</p>
<div>
<?php echo htmlspecialchars($_POST['moeda1']); ?>
<?php echo htmlspecialchars(empty($_POST['val_inp01']) ? '' : number_format($_POST['val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['av_apurar_inp01']); ?>
</div>

<div>
<?php echo htmlspecialchars($_POST['moeda2']); ?> 
<?php echo htmlspecialchars(empty($_POST['val_inp02']) ? '' : number_format($_POST['val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dia_apurar_inp01']); ?>
</div>

</td>
</tr> <!-- aviso prévio & sando de salario -->
<tr style="height:auto;display:<?php echo ($_POST['fr_none02']); ?>;">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position2']); ?><?php echo htmlspecialchars($_POST['fr_oculto_inp01']); ?>
</strong></p>
<div><?php echo htmlspecialchars($_POST['fr_inp01']); ?> <?php echo htmlspecialchars($_POST['fr_txt_inp01']); ?></div>
<div><?php echo htmlspecialchars($_POST['fr_txt_inp02']); ?></div>
<div><?php echo htmlspecialchars($_POST['fr_txt_inp03']); ?></div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda3']); ?> 
<?php echo htmlspecialchars(empty($_POST['fr_val_inp01']) ? '' : number_format($_POST['fr_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fr_apura_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda4']); ?> 
<?php echo htmlspecialchars(empty($_POST['fr_val_inp02']) ? '' : number_format($_POST['fr_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fr_apura_inp02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda5']); ?> 
<?php echo htmlspecialchars(empty($_POST['fr_val_inp03']) ? '' : number_format($_POST['fr_val_inp03'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fr_apura_inp03']); ?>
</div>
</td>
</tr> <!-- férias -->
<tr style="height:auto; display:<?php echo ($_POST['13_none03']); ?>">
<td style="width:506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position3']); ?><?php echo htmlspecialchars($_POST['dc_oculto_inp01']); ?>
</strong></p>
<div><?php echo htmlspecialchars($_POST['dc_inp01']); ?> <?php echo htmlspecialchars($_POST['dc_txt_inp01']); ?></div>
<div><?php echo htmlspecialchars($_POST['dc_inp02']); ?> <?php echo htmlspecialchars($_POST['dc_txt_inp02']); ?></div>
<div><?php echo htmlspecialchars($_POST['dc_inp03']); ?> <?php echo htmlspecialchars($_POST['dc_txt_inp03']); ?></div>
<div><?php echo htmlspecialchars($_POST['dc_inp04']); ?> <?php echo htmlspecialchars($_POST['dc_txt_inp04']); ?></div>
<div><?php echo htmlspecialchars($_POST['dc_inp05']); ?> <?php echo htmlspecialchars($_POST['dc_txt_inp05']); ?></div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda6']); ?> 
<?php echo htmlspecialchars(empty($_POST['dc_val_inp01']) ? '' : number_format($_POST['dc_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dc_apura_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda6_2']); ?> 
<?php echo htmlspecialchars(empty($_POST['dc_val_inp02']) ? '' : number_format($_POST['dc_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dc_apura_inp02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda6_3']); ?> 
<?php echo htmlspecialchars(empty($_POST['dc_val_inp03']) ? '' : number_format($_POST['dc_val_inp03'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dc_apura_inp03']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda6_4']); ?> 
<?php echo htmlspecialchars(empty($_POST['dc_val_inp04']) ? '' : number_format($_POST['dc_val_inp04'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dc_apura_inp04']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda6_5']); ?> 
<?php echo htmlspecialchars(empty($_POST['dc_val_inp05']) ? '' : number_format($_POST['dc_val_inp05'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['dc_apura_inp05']); ?>
</div>
</td>
</tr> <!-- décimo terceiro -->
<tr style="height:auto;display:<?php echo ($_POST['da_none04']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position4']); ?><?php echo htmlspecialchars($_POST['desv_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['desv_mes_input01']); ?> <?php echo htmlspecialchars($_POST['input_text_desv']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['mes_input_desvdsr']); ?> <?php echo htmlspecialchars($_POST['input_text_desvdsr']); ?></div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda7']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_desv']) ? '' : number_format($_POST['input_val_desv'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['input_apura_desv']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda8']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_desvdsr']) ? '' : number_format($_POST['input_val_desvdsr'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['input_apura_desvdsr']); ?>
</div>
</td>
</tr> <!-- desvio acumulo de função -->
<tr style="height:auto;display:<?php echo ($_POST['df_none05']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position5']); ?>
<?php echo htmlspecialchars($_POST['dmgo_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['input_mes_dmgo']); ?> 
<?php echo htmlspecialchars($_POST['input_text_dmgo']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda9']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_dmgo']) ? '' : number_format($_POST['input_val_dmgo'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['input_apura_dmgo']); ?>
</div>
</td>
</tr> <!-- domingo e feriado -->
<tr style="height:auto; display:<?php echo ($_POST['hre_none06']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position6']); ?>
<?php echo htmlspecialchars($_POST['hrextra_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['hr_inp01']); ?> 
<?php echo htmlspecialchars($_POST['hr_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['hr_inp02']); ?> 
<?php echo htmlspecialchars($_POST['hr_txt_inp02']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda10']); ?> 
<?php echo htmlspecialchars(empty($_POST['hr_val_inp01']) ? '' : number_format($_POST['hr_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['hrsext_apurar_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda11']); ?> 
<?php echo htmlspecialchars(empty($_POST['hr_val_inp02']) ? '' : number_format($_POST['hr_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['hrsext_apurar_inp02']); ?>
</div>
</td>
</tr> <!-- horas extras -->
<tr style="height:auto; display:<?php echo ($_POST['in_none07']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position7']); ?>
<?php echo htmlspecialchars($_POST['int_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['int_inp01']); ?> 
<?php echo htmlspecialchars($_POST['int_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['int_inp02']); ?> 
<?php echo htmlspecialchars($_POST['int_txt_inp02']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda12']); ?> 
<?php echo htmlspecialchars(empty($_POST['int_val_inp01']) ? '' : number_format($_POST['int_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inter_apurar_01']); ?>
</div>
<div><?php echo htmlspecialchars($_POST['moeda13']); ?> 
<?php echo htmlspecialchars(empty($_POST['int_val_inp02']) ? '' : number_format($_POST['int_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inter_apurar_02']); ?>
</div>
</td>
</tr> <!-- intervalo -->
<tr style="height:auto;display:<?php echo ($_POST['adp_none08']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position8']); ?><?php echo htmlspecialchars($_POST['adcp_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['adcp_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['adcp_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['adcp_mes_inp02']); ?> <?php echo htmlspecialchars($_POST['adcp_txt_inp02']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda14']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_adcp01']) ? '' : number_format($_POST['input_val_adcp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['adc_apurar_01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda15']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_adcp02']) ? '' : number_format($_POST['input_val_adcp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['adc_apurar_02']); ?>
</div>
</td>
</tr> <!-- adicional de periculosidade -->
<tr style="height:auto;display:<?php echo ($_POST['insa_none08_1']); ?>;">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position8_1']); ?><?php echo htmlspecialchars($_POST['insa_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['insa_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['insa_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['insa_mes_inp02']); ?> <?php echo htmlspecialchars($_POST['insa_txt_inp02']); ?>
</div>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda14_1']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_insa01']) ? '' : number_format($_POST['input_val_insa01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['insa_apurar_01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda14_2']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_insa02']) ? '' : number_format($_POST['input_val_insa02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['insa_apurar_02']); ?>
</div>
</td>
</tr> <!-- adicional de insalubridade -->
<tr style="height:auto; display:<?php echo ($_POST['trn_none09']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position9']); ?><?php echo htmlspecialchars($_POST['trans_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['trans_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['trans_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['trans_mes_inp02']); ?> <?php echo htmlspecialchars($_POST['trans_txt_inp02']); ?>
</div>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda16']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_transfe01']) ? '' : number_format($_POST['input_val_transfe01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['transfe_apurar_01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda17']); ?> 
<?php echo htmlspecialchars(empty($_POST['input_val_transfe02']) ? '' : number_format($_POST['input_val_transfe02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['transfe_apurar_02']); ?>
</div>
</td>
</tr> <!-- transferencia -->
<tr style="height:auto;display:<?php echo ($_POST['467_none10']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<p><strong>
<?php echo htmlspecialchars($_POST['position10']); ?><?php echo htmlspecialchars($_POST['467_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['467_mes_disabled_inp01']); ?> <?php echo htmlspecialchars($_POST['467_txt_inp01']); ?></div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda18']); ?> 
<?php echo htmlspecialchars(empty($_POST['467_val_inp01']) ? '' : number_format($_POST['467_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['467_apurar_01']); ?>
</div>
</td>
</tr> <!-- 467 da clt -->
<tr style="height:auto;display:<?php echo ($_POST['plr_none22']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<p><strong>
<?php echo htmlspecialchars($_POST['position22']); ?><?php echo htmlspecialchars($_POST['plr_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['plr_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['plr_txt_inp01']); ?>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda36']); ?> 
<?php echo htmlspecialchars(empty($_POST['plr_val_inp01']) ? '' : number_format($_POST['plr_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['plr_apurar_01']); ?>
</div>
</td>
</tr> <!-- plr -->
<tr style="height:auto;display:<?php echo ($_POST['vr_none11']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position11']); ?><?php echo htmlspecialchars($_POST['vr_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['vr_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['vr_txt_inp01']); ?></div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda19']); ?> 
<?php echo htmlspecialchars(empty($_POST['vr_val_inp01']) ? '' : number_format($_POST['vr_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['vr_apurar_01']); ?>
</div>
</td>
</tr> <!-- vales refeições e cesta basica -->
<tr style="height:auto;display:<?php echo ($_POST['di_none12']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position12']); ?><?php echo htmlspecialchars($_POST['desc_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['desc_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['desc_txt_inp01']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda20']); ?> 
<?php echo htmlspecialchars(empty($_POST['desc_val_01']) ? '' : number_format($_POST['desc_val_01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['desc_apurar_01']); ?>
</div>
</td>
</tr> <!-- desconto indevido -->
<tr style="height:auto;display:<?php echo ($_POST['dmm_none13']); ?>">
<td style="width: 506px; height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position13']); ?><?php echo htmlspecialchars($_POST['danom_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['danom_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['danom_txt_inp01']); ?>
</div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda21']); ?> 
<?php echo htmlspecialchars(empty($_POST['danom_val_01']) ? '' : number_format($_POST['danom_val_01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['danom_apurar_01']); ?>
</div>
</td>
</tr> <!-- dano moral e material -->
<tr style="height:auto;display:<?php echo ($_POST['477_none14']); ?>">
<td style="width: 506px;height:auto;border:0px solid;border-color:#cccccc;">
<p><strong>
<?php echo htmlspecialchars($_POST['position14']); ?><?php echo htmlspecialchars($_POST['477_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['477_mes_desabled_inp01']); ?> <?php echo htmlspecialchars($_POST['477_txt_inp01']); ?></div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;"><br>
<div>
<?php echo htmlspecialchars($_POST['moeda22']); ?> 
<?php echo htmlspecialchars(empty($_POST['477_val_inp01']) ? '' : number_format($_POST['477_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['477_apurar_01']); ?>
</div>
</td>
</tr> <!-- 477 da clt -->
<tr style="height:auto;display:<?php echo ($_POST['inss_none15']); ?>">
<td style="width: 506px; height: auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position15']); ?><?php echo htmlspecialchars($_POST['inss_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['inss_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['inss_txt_inp01']); ?></div>
</div>
</td>
<td style="width: 128px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<?php echo htmlspecialchars($_POST['moeda23']); ?> 
<?php echo htmlspecialchars(empty($_POST['inss_val_01']) ? '' : number_format($_POST['inss_val_01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inss_apurar_01']); ?>
</div>
</td>
</tr> <!-- inss -->
<tr style="height:auto; display:<?php echo ($_POST['int_none16']); ?>">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position16']); ?><?php echo htmlspecialchars($_POST['integracoes_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['inte_mes_desabled_inp01']); ?> <?php echo htmlspecialchars($_POST['inte_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['inte_mes_desabled_inp02']); ?> <?php echo htmlspecialchars($_POST['inte_txt_inp02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['inte_mes_desabled_inp03']); ?> <?php echo htmlspecialchars($_POST['inte_txt_inp03']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['inte_mes_desabled_inp04']); ?> <?php echo htmlspecialchars($_POST['inte_txt_inp04']); ?>
</div>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['']); ?> <?php echo htmlspecialchars($_POST['inte_apurar_01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda25']); ?> 
<?php echo htmlspecialchars(empty($_POST['inte_val_inp02']) ? '' : number_format($_POST['inte_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inte_apurar_02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda26']); ?> 
<?php echo htmlspecialchars(empty($_POST['inte_val_inp03']) ? '' : number_format($_POST['inte_val_inp03'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inte_apurar_03']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda27']); ?> 
<?php echo htmlspecialchars(empty($_POST['inte_val_inp04']) ? '' : number_format($_POST['inte_val_inp04'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['inte_apurar_04']); ?>
</div>
</td>
</tr> <!-- integrções -->
<tr style="height:auto;display:<?php echo ($_POST['fgts_none17']); ?>">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position17']); ?><?php echo htmlspecialchars($_POST['FGTS_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['FGTS_inp01']); ?> <?php echo htmlspecialchars($_POST['FGTS_txt_inp01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['FGTS_inp02']); ?> <?php echo htmlspecialchars($_POST['FGTS_txt_inp02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['FGTS_inp03']); ?> <?php echo htmlspecialchars($_POST['FGTS_txt_inp03']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['FGTS_inp04']); ?> <?php echo htmlspecialchars($_POST['FGTS_txt_inp04']); ?>
</div>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda28']); ?> 
<?php echo htmlspecialchars(empty($_POST['FGTS_val_inp01']) ? '' : number_format($_POST['FGTS_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fgts_apurar_01']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda29']); ?> 
<?php echo htmlspecialchars(empty($_POST['FGTS_val_inp02']) ? '' : number_format($_POST['FGTS_val_inp02'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fgts_apurar_02']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda30']); ?> 
<?php echo htmlspecialchars(empty($_POST['FGTS_val_inp03']) ? '' : number_format($_POST['FGTS_val_inp03'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fgts_apurar_03']); ?>
</div>
<div>
<?php echo htmlspecialchars($_POST['moeda31']); ?> 
<?php echo htmlspecialchars(empty($_POST['FGTS_val_inp04']) ? '' : number_format($_POST['FGTS_val_inp04'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['fgts_apurar_04']); ?>
</div>
</td>
</tr> <!-- fgts -->
<tr style="height:auto;display:<?php echo ($_POST['sd_none18']); ?>">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position18']); ?><?php echo htmlspecialchars($_POST['seg_oculto_inp01']); ?>
</strong></p>
<div>
<?php echo htmlspecialchars($_POST['seg_mes_inp01']); ?> <?php echo htmlspecialchars($_POST['seg_txt_inp01']); ?>
</div>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<p></p>
<div>
<?php echo htmlspecialchars($_POST['moeda32']); ?> 
<?php echo htmlspecialchars(empty($_POST['seg_val_inp01']) ? '' : number_format($_POST['seg_val_inp01'],2,",",".")) ?>
<?php echo htmlspecialchars($_POST['seg_apurar_01']); ?>
</div>
</td>
</tr> <!-- seguro desemprego -->
<tr style="height:auto;background-color:#cccccc;">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong><?php echo htmlspecialchars($_POST['position19']); ?> <?php echo htmlspecialchars($_POST['sub_txt_inp01']); ?></strong></p>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<?php echo htmlspecialchars($_POST['moeda33']); ?> 
<?php echo htmlspecialchars(empty($_POST['sub_val_inp01']) ? '' : number_format($_POST['sub_val_inp01'],2,",",".")) ?>
</td>
</tr> <!-- sub total -->
<tr style="height:auto;background-color:#cccccc;display:<?php echo htmlspecialchars($_POST['404_none20']); ?>">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong>
<?php echo htmlspecialchars($_POST['position20']); ?> <?php echo htmlspecialchars($_POST['404_txt_inp02']); ?></strong></p>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<?php echo htmlspecialchars($_POST['moeda34']); ?> 
<?php echo htmlspecialchars(empty($_POST['404_val_inp02']) ? '' : number_format($_POST['404_val_inp02'],2,",",".")) ?>
</td>
</tr> <!-- 404 cc -->
<tr style="height:auto;background-color:#cccccc;">
<td style="width:506px;height:auto;border:0px solid;border-color:#cccccc;">
<div>
<p><strong><?php echo htmlspecialchars($_POST['position21']); ?> <?php echo htmlspecialchars($_POST['verb_txt_inp03']); ?></strong></p>
</div>
</td>
<td style="width:128px;height:auto;border:0px solid;border-color:#cccccc;">
<div><?php echo htmlspecialchars($_POST['moeda35']); ?> 
<?php echo htmlspecialchars(empty($_POST['verb_val_inp03']) ? '' : number_format($_POST['verb_val_inp03'],2,",",".")) ?>
<br/><?php echo htmlspecialchars($_POST['verb_apurar_inp03']); ?>
</div>
</td>
</tr> <!-- verbas a receber -->
</tbody>
</table>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab101">
<div id="area27">
<textarea id="aba20_pleteiainda_01" name="aba20_pleteiainda_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<br>
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#cccccc;border-color:#000000;border:1px solid;border-color:#000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>Pleiteia ainda:</strong></p>
</td>
</tr>
</tbody>
</table>
<ol  type="A" start="A" style="height:auto;width:auto;margin-left:auto;margin-right:auto;border:0.5px solid;border-color:#000000;font-weight:bolder;">
	<li style="display:<?php echo ($_POST['pl_none_1']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Reconhecimento do vínculo empregatício com a devida anota&ccedil;&atilde;o da data de admiss&atilde;o e de baixa na CTPS dos obreiros&nbsp;para que surta seus regulares efeitos jur&iacute;dicos.</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_2']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Expedi&ccedil;&atilde;o de of&iacute;cios ao INSS, DRT e CEF denunciando as irregularidades apontadas para as san&ccedil;&otilde;es cab&iacute;veis</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_3']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Outorga das guias GR&acute;s e RE&acute;s para fins de apura&ccedil;&atilde;o das diferen&ccedil;as de FGTS do per&iacute;odo </b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_4']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Benef&iacute;cios da justi&ccedil;a gratuita</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_5']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Apresenta&ccedil;&atilde;o das Guias GR&acute;s e RE&acute;s para fins de apura&ccedil;&atilde;o de diferen&ccedil;as de dep&oacute;sitos fundi&aacute;rios</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_6']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Anota&ccedil;&atilde;o da data de baixa na CTPS do obreiro para que surtam seus legais e previdenci&aacute;rios efeitos.</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_7']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Decreta&ccedil;&atilde;o em audi&ecirc;ncia vestibular da responsabilidade subsidi&aacute;ria das reclamadas, para que surtam seus legais efeitos</b></span>
        </div>
	</li>
	<li style="display:<?php echo ($_POST['pl_none_8']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Nulidade do contrato de estágio nos termos fundamentados e para que surtam seus legais e jurídicos fins</b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_9']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Nulidade do contrato de aprendiz nos termos fundamentados e para que surtam seus legais e jurídicos fins</b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_10']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Nulidade do contrato de aprendiz assinado em datas posterior a contratação conforme nos termos fundamentados e para que surtam seus legais e jurídicos fins</b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_11']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Nulidade do contrato de estágio assinado em datas posterior a contratação conforme nos termos fundamentados e para que surtam seus legais e jurídicos fins</b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_12']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b>Aplicação da indenização compensatória prevista no artigo 404 do CC, conforme fundamentado.</b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_13']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b><?php echo htmlspecialchars($_POST['pl_personalizado1']); ?></b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_14']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b><?php echo htmlspecialchars($_POST['pl_personalizado2']); ?></b></span>
        </div>
	</li>
    
	<li style="display:<?php echo ($_POST['pl_none_15']); ?>;">
    	<div style="border:0.5px solid;border-color:#000000;">
		<span></span>
		<span><b><?php echo htmlspecialchars($_POST['pl_personalizado3']); ?></b></span>
        </div>
	</li>
</ol>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab102">
<div id="area28">
<textarea id="aba21_requerimentos_01" name="aba21_requerimentos_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">    
<table style="margin-top:0;margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#cccccc;border-color:#000000;border:1px solid;border-color:#000000;">
<tbody>
<tr>
<td style="text-align: center;">
<p><strong>DOS REQUERIMENTOS:</strong></p>
</td>
</tr>
</tbody>
</table>
<ol start="1" type="1">
<li style="text-indent:16.05em;">
<p style="margin:24px;">
Requer, seja a<?php echo htmlspecialchars($_POST['t_s_r']); ?> Reclamada<?php echo htmlspecialchars($_POST['t_s_r']); ?> notificada<?php echo htmlspecialchars($_POST['t_s_r']); ?> para que, querendo, conteste a presente reclamatória, devendo apresentar com as defesas todos os documentos impeditivos, modificativos ou extintivos dos direitos postulados, inclusive seu contrato social e as respectivas alterações, sob pena de serem admitidos como verdadeiros os fatos articulados, tornando-se preclusa a eventual prova em contrário (artigo 373, inciso II, e artigo 400, incisos I e II, do Novo Código de Processo Civil), se os documentos forem preexistentes na reclamada.
</p>
</li>
<li style="text-indent:16.05em;">
<p style="margin:24px;">
Requer, ainda, o<?php echo htmlspecialchars($_POST['t_s_r']); ?> depoimento<?php echo htmlspecialchars($_POST['t_s_r']); ?> pessoal do<?php echo htmlspecialchars($_POST['t_s_r']); ?> representante<?php echo htmlspecialchars($_POST['t_s_r']); ?> legal da<?php echo htmlspecialchars($_POST['t_s_r']); ?> Reclamada<?php echo htmlspecialchars($_POST['t_s_r']); ?>, sob as consequências da confissão, a oitiva de testemunhas e produção das demais provas em Direito, sem exclusão de qualquer, juntada de novos documentos nos termos do artigo 435 do Código de Processo Civil, com vista à parte contrária, com fulcro no artigo 437, parágrafo 1º do mesmo álbum processual civil, requerendo ainda a aplicação do artigo 438 do CPC., para o fiel desate do feito.
</p>
</li>
<li style="text-indent:16.05em;">
<p style="margin:24px;">
Aguarda, a final, a decretação da procedência desta ação, condenando-se a<?php echo htmlspecialchars($_POST['t_s_r']); ?> Reclamada<?php echo htmlspecialchars($_POST['t_s_r']); ?><?php echo htmlspecialchars($_POST['txt_sub_req_2']); ?><?php echo htmlspecialchars($_POST['txt_sub_req_3']); ?><?php echo htmlspecialchars($_POST['txt_sub_req_4']); ?><?php echo htmlspecialchars($_POST['txt_sol_requerimento']); ?><?php echo htmlspecialchars($_POST['txt_sub_requerimento']); ?> ao pagamento do principal, acrescido de correção monetária e juros de mora, sendo que estes últimos a partir da data de distribuição. 
</p>
<table style="margin-right:auto;margin-left:auto;height:auto;border:1px solid;float:center;font-weight:bold;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td style="width:916px;">
<p>
APLICABILIDADE DO ARTIGO 523 DA LEI 13.105/15 (NCPC) AO PROCESSO DO TRABALHO A Lei nº 13.105/2015 (NCPC), em seu artigo 523, estipula o acréscimo da multa de 10% (dez por cento) ao valor líquido da condenação ou fixado por liquidação, caso o devedor não efetue o pagamento no prazo de 15 (quinze) dias, contados da intimação para pagamento. A despeito da celeuma acerca da aplicabilidade das novas normas atinentes à execução ao Processo do Trabalho, o preceito punitivo em questão em nada afronta a regulamentação da execução trabalhista prevista nos artigos 876 a 892 da CLT, senão vejamos. O recurso ao direito processual comum como fonte subsidiária do Processo do Trabalho, como se sabe, dá-se na hipótese de existência de omissões no diploma celetista e desde que haja compatibilidade com os princípios processuais trabalhistas, nos termos do artigo 769 da CLT. A multa de 10% (dez por cento) prevista no artigo 523 situa-se no Título II do NCPC, o qual disciplina o procedimento ordinário de cumprimento de sentença. Com efeito, o referido título trata da fase de cumprimento espontâneo da sentença, inovação trazida já com a Lei nº 11.232/2005, artigo 475-J, que consagrou o chamado processo sincrético no ordenamento processual pátrio. Portanto, considerando-se que: 1) a multa é aplicada ainda na fase de conhecimento; 2) a CLT apresenta lacuna normativa; e 3) não há incompatibilidade com os Princípios do Processo do Trabalho, visto que a multa visa a compelir o devedor ao pagamento, tornando a entrega da tutela jurisdicional mais célere, não há afronta à sistemática adotada pela CLT para a execução trabalhista. Desta feita, o preceito punitivo contido no artigo 523 revela-se perfeitamente aplicável ao Processo do Trabalho. Ressalte-se que a fase de execução trabalhista inicia-se em momento posterior com a expedição do Mandado de Citação, Penhora e Avaliação (artigo 880 da CLT), do qual constará, a partir de agora, o débito acrescido da multa de 10% (dez por cento), devidamente atualizado. Nesse sentido é a jurisprudência do E. TRT da 2ª região, quando da análise do artigo 475-J do antigo CPC, com a mesma finalidade: "ART. 475 J DO CPC. APLICABILIDADE NO PROCESSO DO TRABALHO. A multa prevista no artigo em questão é aplicável ao Processo do Trabalho, pois ela tem a finalidade de imprimir maior efetividade à sentença, vindo ao encontro do princípio da celeridade que rege este ramo específico do Direito Processual. Frise-se que a CLT é omissa quanto à aplicação da multa, o que permite a sua adoção, nos termos do art. 769 da CLT. Além disso, o Processo do Trabalho é sincrético, inexistindo processo autônomo de execução, tanto que esta até pode ser impulsionada de ofício pelo Juiz. A interpretação sistemática da CLT leva à conclusão de que o legislador, ao utilizar a expressão "citação" no art. 880 da CLT, referiu-se a "intimação" para o devedor cumprir a sentença, de modo que a tutela mandamental prevista no art. 475 J." (TRT - 2ª Região, 4ª Turma, Relatora Ivani Contini Bramante, processo nº 00590200707102001, votação unânime, DO Eletrônico de 28/08/2009). Portanto, nas condenações líquidas (seja na sentença seja na fase própria de liquidação, deverá ser intimado o reclamado de que a condenação ao pagamento de quantia certa, conforme previsão no artigo 523 do CPC, aplicado subsidiariamente ao Processo do Trabalho, por força do artigo 769 da CLT, tem o prazo de 15 (quinze) dias, sob pena da incidência da multa ali prevista, que se contará da intimação da sentença ou, em caso de provimento de recurso, da decisão que determinar o cumprimento do acórdão.
</p>
</td>
</tr>
</tbody>
</table>
</li>
<li style="text-indent:16.05em;">
<p style="margin:24px;">
Atribui a esta causa, apenas para fins de custas e fixação de alçada, o valor de R$ <?php echo number_format(empty("$verb_val_inp03") ? '0' : $verb_val_inp03,2,",",".") ?> (<?php echo extenso("$verb_val_inp03",1,$caixa="baixa")?>).
</p>
</li>
</ol>

<p style="line-height:15px;margin:0px;text-indent: 17.05em;">São estes os termos em que</p>
<p style="line-height:15px;margin:0px;text-indent: 17.05em;">Pede e espera deferimento.</p>
<p style="line-height:15px;margin-top:0px;text-indent: 17.05em;"><?php echo htmlspecialchars($_POST['adv_cidade']); ?>, <?php echo htmlspecialchars($_POST['datahoje']); ?></p>
<p style="line-height:15px;margin:0px;text-indent:17.05em;font-weight:bold;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?></p> 
<p style="line-height:15px;margin:0px;text-indent:17.05em;font-weight:bold;">OAB/<?php echo htmlspecialchars($_POST['adv_uf_oab']); ?> <?php echo htmlspecialchars($_POST['oab']); ?></p>
</o>
<br />
<table style="margin-right:auto;margin-left:auto;width:650px;height:33px;background-color:#FFFFFF;border-color:#000000;border:1px solid">
<tbody>
<tr>
<td>
<p><center><u>* PUBLICAÇÕES / INTIMAÇÕES / NOTIFICAÇÕES *</u></center></p>
<p>
Para os efeitos do artigo 774 da CLT e Súmulas 16 e 37 do TST, requer-se que todas e quaisquer NOTIFICAÇÕES/INTIMAÇÕES/PUBLICAÇÕES, guias de levantamento/alvarás e demais atos sejam direcionadas exclusivamente em nome de <b style="text-transform:uppercase"><?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?></b>, OAB/<?php echo htmlspecialchars($_POST['adv_uf_oab']); ?> n.º <?php echo htmlspecialchars($_POST['oab']); ?>, sob pena de nulidade, com endereço na: <?php echo htmlspecialchars($_POST['adv_rua']); ?>, nº <?php echo htmlspecialchars($_POST['adv_numero_casa']); ?>, <?php echo htmlspecialchars($_POST['adv_complemento']); ?> - CEP <?php echo htmlspecialchars($_POST['adv_cep']); ?> – <?php echo htmlspecialchars($_POST['adv_cidade']); ?>-<?php echo htmlspecialchars($_POST['adv_estado']); ?> - TEL: <?php echo htmlspecialchars($_POST['adv_tel1']); ?> <?php echo htmlspecialchars($_POST['adv_tel2']); ?> <?php echo htmlspecialchars($_POST['adv_tel3']); ?>. 
</p>
</td>
</tr>
</tbody>
</table>
</div>
</textarea>
</div>
</div>
<div class="tab-pane fade" id="tab33">
<p style="text-align:center;font-size:18px;color:#000000;margin-bottom:20px;margin-top:20px;">DO DESCONTO INDEVIDO&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
<input type="button" value="Ativar" onClick="aba42x1();esconder('area42')" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
</p>
<div id="area42">
<textarea id="aba33_descontoindevido_01" name="aba33_descontoindevido_01" style="height:50%;">
<div style="font-family:Book Antiqua; text-align:justify;font-size:16px;">
<table style="margin-right: auto; margin-left: auto; width: 650px; height: 33px; background-color: #cccccc; border-color: #000000; border: 1px solid; bordercolor: #000000;">
<tbody>
<tr>
<td style="text-align:center;">
<p><b>DESCONTO INDEVIDO NO SALÁRIO</b></p>
</td>
</tr>
</tbody>
</table>
<p style="text-indent:17.05em;">
Consoante o disposto no art. 462, § 1º, da CLT, o empregador poderá descontar do salário do empregado valores destinados ao ressarcimento de danos provocados pelo empregado, de forma <u><b>dolosa ou culposa</b></u>, neste último caso, desde que a possibilidade tenha sido acordada pelas partes.
</p>
<p style="text-indent:17.05em;">
Sendo assim, se o empregado não age com dolo ou culpa, ou mesmo não havendo previsão contratual neste último caso, não poderá o empregador descontar do salário do empregado valores a título de ressarcimento.
</p>
<p style="text-indent:17.05em;">
Trata-se do princípio da intangibilidade salarial que veda, peremptoriamente, alterações contratuais que resultem em redução salarial, princípio também assegurado pelo art. 7º, VI, da CF/88.
 </p>
<p style="text-indent:17.05em;">
In casu, a Reclamada descontou do Reclamante os valores de R$ <?php echo htmlspecialchars(empty($_POST['desc_val_01']) ? '' : number_format($_POST['desc_val_01'],2,",",".")) ?>, durante <?php echo htmlspecialchars($_POST['desc_mes_inp01']); ?> meses do pacto laboral, a título de ressarcimento por danos causados ao patrimônio da empresa, tendo em vista que o Obreiro se requer a <b><?php echo htmlspecialchars($_POST['desc_txt_inp01']); ?></u>. No entanto, o Reclamante não agiu com dolo ou culpa nos acidentes, fatos que somente vieram a ocorrer por culpa de terceiros.
<p>
<p style="text-indent:17.05em;">
Além disso, a cláusula inserida no contrato de trabalho do Obreiro que permite ao Reclamado descontar do salário do Autor qualquer importância em caso de dano deve ser declarada nula de pleno direito, na forma do art. 9º, CLT, porquanto não está consoante ao disposto no art. 462, § 1º, da CLT, o qual faz expressa menção ao ressarcimento <u>somente em caso de dolo ou culpa do empregado, o que não ocorreu no presente caso.</u>
</p>
<p style="text-indent:17.05em;">
Neste sentido, é a jurisprudência do Tribunal Regional do Trabalho da 3ª Região, in verbis:
</p>
<table align="right" style="width:316px;height:auto;border:1px solid;float:right;background-color:#cccccc;text-align:justify;">
<tbody>
<tr>
<td>
<b>
<i>
<u>Desconto salarial. Devolução. Descontos salariais. Ausência de comprovação de culpa do empregado. Impossibilidade</u>. Descontos salariais decorrentes de danos causados pelo empregado só são válidos quando o contrato de trabalho contém uma tal previsão e quando o empregador consegue demonstrar que os prejuízos foram causados por dolo ou culpa do trabalhador. Ausente esta demonstração, é de se declarar a ilicitude do desconto efetuado, garantindo-se à reclamante a restituição da importância correspondente. (TRT 3ª Região, 5ª Turma, 0010640-76.2014.5.03.0062, Rel.: Marcus Moura Ferreira, DJ 30/01/2015)
</i>
</b>
</td>
</tr>
</tbody>
</table>
<br><br><br><br><br><br><br><br><br>
<p style="text-indent:17.05em;">
Pelo exposto, é o bastante para que seja reconhecida a nulidade da cláusula contratual de ressarcimento de danos, bem como deverá o Reclamado ser condenado na restituição ao Autor dos valores ilicitamente descontados, durante <?php echo htmlspecialchars($_POST['desc_mes_inp01']); ?> meses do pacto laboral.
</p>
</div>
</textarea>
</div>
</div>
  </div>
  <!-- campos ocutos -->
  <div id="campos_ocultos" hidden="true">
    <div class="form-group col-md-2">
        <label for="text">Comarca</label>
        <input type="text" class="form-control" id="comarca_city" name="comarca_city" value="<?php echo htmlspecialchars($_POST['comarca_city']); ?>">
    </div>                                
    <div class="form-group col-md-2">
        <label for="text">Adv nome</label>
        <input type="text" class="form-control" id="adv_nome" name="adv_nome" value="<?php echo htmlspecialchars($_POST['adv_nome']); ?>">
    </div>    
    <div class="form-group col-md-2">
        <label for="text">Adv Sobrenome</label>
        <input type="text" class="form-control" id="adv_sobre_nome" name="adv_sobre_nome" value="<?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>">
    </div>
    <div class="form-group col-md-2">
        <label for="text">Reclamante nome</label>
        <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" value="<?php echo htmlspecialchars($_POST['nomecompleto']); ?>">
    </div>                                
  </div>    	
 </div>
<br> 
                </form>
<?php
function extenso($valor=0,$tipo=0,$caixa="alta") {
$valor = strval($valor);
$valor = str_replace(",",".",$valor);
if($tipo==1){
$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");
}else{
$pos   = strpos($valor,".");
$valor = substr($valor,0,$pos);
$singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("", "", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");
}
$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezessete", "dezoito", "dezenove");
$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");
$z=0;
$valor = number_format(empty($valor) ? '0' : $valor, 2, ".", ".");
$inteiro = explode(".", $valor);
for($i=0;$i<count($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];
$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($inteiro);$i++) {
$valor = $inteiro[$i];
$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($inteiro)-1-$i;
$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
if ($valor == "000")$z++; elseif ($z > 0) $z--;
if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? " e " : " e ") : " ") . $r;
}
if($caixa=="alta"){
$rt = strtoupper($rt);
}
$maiusculas = array("á","à","â","ã","é","ê","í","ó","ô","õ","ú","û");
$minusculas = array("Á","À","Â","Ã","É","Ê","Í","Ó","Ô","Õ","Ú","Û");
for($i=0;$i<count($maiusculas);$i++){
$rt = str_replace($minusculas[$i],$maiusculas[$i],$rt);	
}     
return $rt;        
}
?> 
</div>
</div>
</body>
</html>
