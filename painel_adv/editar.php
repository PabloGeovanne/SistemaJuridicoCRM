<div id="include">
<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Atualizar dados de Clientes</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

<script type="text/javascript">
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

function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

//bloqueia e desbloqueia input nome pai
function bloquearInput(){
            var input = document.getElementById('nome_pai');

            if(input.readOnly){
                input.readOnly = false;
            }else{
                input.readOnly = true;
            }
        }
//faz calculo automatico salario + por fora
String.prototype.formatMoney = function() {
    var v = this;

    if(v.indexOf('.') === -1) {
        v = v.replace(/([\d]+)/, "$1,00");
    }

    v = v.replace(/([\d]+)\.([\d]{1})$/, "$1,$20");
    v = v.replace(/([\d]+)\.([\d]{2})$/, "$1,$2");

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
<?php

$id_edit = $_GET['usuario'];
	

		$sql = ("SELECT *
		FROM adv_clientes ac 
		INNER JOIN adv_empresas ae ON (ac.trabalho_ID = ae.id_emp) 
		INNER JOIN adv_cargos acg ON (ac.cargo_ID = acg.id_cargo)
		INNER JOIN paradigmas pag ON (ac.id_paradigmas = pag.paradigmas_id)
		WHERE ac.id = '$id_edit'");
	
		$sqli_result = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_assoc($sqli_result);		
	
	//dados cliente	  
	$nomecompleto = $dados['nomecompleto'];
	$nacionalidade = $dados['nacionalidade'];
	$rg_num = $dados['rg_num'];
	$estadocivil = $dados['estadocivil'];
	$rg_origem = $dados['rg_origem'];
	$rg_data_exp = $dados['rg_data_exp'];
	$cliente_cpf = $dados['cliente_cpf'];
	$nome_mae = $dados['nome_mae'];
	$nome_pai = $dados['nome_pai'];
	$on_pai = $dados['on_pai'];
	$pis_num = $dados['pis_num'];
	$ctps_numero = $dados['ctps_numero'];
	$ctps_serie = $dados['ctps_serie'];
	$ctps_uf = $dados['ctps_uf'];
	$end_rua = $dados['end_rua'];
	$end_numero = $dados['end_numero'];
	$end_bairro = $dados['end_bairro'];
	$end_cidade = $dados['end_cidade'];
	$cliente_cep = $dados['cliente_cep'];
	$end_uf = $dados['end_uf'];
	$end_complemento = $dados['end_complemento'];
	$nome_emp = $dados['nome_emp'];
	$trabalho_ID = $dados['trabalho_ID'];
	$sex_or = $dados['sex_or'];
	$sex_singular = $dados['sex_singular'];
	$comarca_city = $dados['comarca_city'];
	$cli_cel = $dados['cli_cel'];
	$cli_tel = $dados['cli_tel'];
	$cli_mail = $dados['cli_mail'];
	$nasc_dia = $dados['nasc_dia'];
	$nasc_mes = $dados['nasc_mes'];
	$nasc_ano = $dados['nasc_ano'];
	$id = $dados['id'];
	
	//dados cargos DB
	$cargo_id = $dados['cargo_id'];
	$nome_cargo = $dados['nome_cargo'];
	$data_ent = $dados['data_ent'];
	$data_reg = $dados['data_reg'];
	$data_saida = $dados['data_saida'];
	$cump_aviso_previo = $dados['cump_aviso_previo'];
	$aviso_valor = $dados['aviso_valor'];
	$aviso_data = $dados['aviso_data'];
	$aviso_reducao = $dados['aviso_reducao'];
	$data_homo = $dados['data_homo'];
	$recebeu_homo = $dados['recebeu_homo'];
	$qm_homo = $dados['qm_homo'];
	$homo_valor = $dados['homo_valor'];
	$salario = $dados['salario'];
	$valor_fora = $dados['valor_fora'];
	$remu_total = $dados['remu_total'];
		
	$hrs_ent_sem = $dados['hrs_ent_sem'];
	$hrs_exit_sem = $dados['hrs_exit_sem'];
	$hrs_ent_sex = $dados['hrs_ent_sex'];
	$hrs_exit_sex = $dados['hrs_exit_sex'];
	$hrs_almo_sex = $dados['hrs_almo_sex'];
	$hrs_almo_sem = $dados['hrs_almo_sem'];
	$hrs_ent_sab = $dados['hrs_ent_sab'];
	$hrs_exit_sab = $dados['hrs_exit_sab'];
	$hrs_almo_sab = $dados['hrs_almo_sab'];
	$hrs_ent_dom = $dados['hrs_ent_dom'];
	$hrs_exit_dom = $dados['hrs_exit_dom'];
	$hrs_almo_dom = $dados['hrs_almo_dom'];
	$escala_trab = $dados['escala_trab'];
	$hrs_ext_antes = $dados['hrs_ext_antes'];
	$hrs_ext_apos = $dados['hrs_ext_apos'];
	$hrs_ext_media = $dados['hrs_ext_media'];
	$sab_ext_porc = $dados['sab_ext_porc'];	
	$dom_ext_porc = $dados['dom_ext_porc'];
	$ext_pago = $dados['ext_pago'];
	$ext_porcento = $dados['ext_porcento'];
	$noite_ent = $dados['noite_ent'];
	$noite_exit = $dados['noite_exit'];
	$noite_almo = $dados['noite_almo'];
	$adc_noite_vl = $dados['adc_noite_vl'];
	$trab_noite = $dados['trab_noite'];
	$adc_noite_porc = $dados['adc_noite_porc'];
	$insalubre = $dados['insalubre'];
	$periculoso = $dados['periculoso'];
	$receb_VT = $dados['receb_VT'];
	$VT_valor = $dados['VT_valor'];
	$cesta_basica = $dados['cesta_basica'];
	$cesta_valor = $dados['cesta_valor'];
	$recebe_VR = $dados['recebe_VR'];
	$VR_valor = $dados['VR_valor'];
	$receb_holerith = $dados['receb_holerith'];
	$receb_aviso_previo = $dados['receb_aviso_previo'];
	$inic_aviso_previo = $dados['inic_aviso_previo'];
	$receb_dec = $dados['receb_dec'];
		  
	$dec_data = $dados['dec_data'];
	$dec_data2 = $dados['dec_data2'];
	$dec_data3 = $dados['dec_data3'];
	$dec_data4 = $dados['dec_data4'];
	$dec_data5 = $dados['dec_data5'];
		  
		  
	$tev_ferias = $dados['tev_ferias'];
	$ferias_quant = $dados['ferias_quant'];
	$perio_ferias = $dados['perio_ferias'];
	$trab_ferias = $dados['trab_ferias'];
	$plr_valor = $dados['plr_valor'];
	$g_fgts = $dados['g_fgts'];
	$g_sd = $dados['g_sd'];
	$filho_14 = $dados['filho_14'];
	$rec_sal_fam = $dados['rec_sal_fam'];
	$salario_fam = $dados['salario_fam'];
	$obs_adv = $dados['obs_adv'];
	
	$data_quita = $dados['data_quita'];
	$recebeu_adc_noite = $dados['recebeu_adc_noite'];
	$paradigmas_id = $dados['paradigmas_id'];
	$p_nome_1 = $dados['p_nome_1'];	  
	$p_nome_2 = $dados['p_nome_2'];	  
	$p_nome_3 = $dados['p_nome_3'];	  
	$p_nome_4 = $dados['p_nome_4'];	  
	$p_nome_5 = $dados['p_nome_5'];	
		  
	$p_salario_1 = $dados['p_salario_1'];	  
	$p_salario_2 = $dados['p_salario_2'];	  
	$p_salario_3 = $dados['p_salario_3'];	  
	$p_salario_4 = $dados['p_salario_4'];	  
	$p_salario_5 = $dados['p_salario_5'];	 
		  
	$p_cargo_1 = $dados['p_cargo_1'];
	$p_cargo_2 = $dados['p_cargo_2'];
	$p_cargo_3 = $dados['p_cargo_3'];
	$p_cargo_4 = $dados['p_cargo_4'];
	$p_cargo_5 = $dados['p_cargo_5'];

	$p_inicio_1 = $dados['p_inicio_1'];
	$p_inicio_2 = $dados['p_inicio_2'];
	$p_inicio_3 = $dados['p_inicio_3'];
	$p_inicio_4 = $dados['p_inicio_4'];
	$p_inicio_5 = $dados['p_inicio_5'];
		  
	$p_tempo_1 = $dados['p_tempo_1'];
	$p_tempo_2 = $dados['p_tempo_2'];
	$p_tempo_3 = $dados['p_tempo_3'];
	$p_tempo_4 = $dados['p_tempo_4'];
	$p_tempo_5 = $dados['p_tempo_5'];
		  
		  $desvio_cargo_1 = $dados['desvio_cargo_1'];
		  $desvio_cargo_2 = $dados['desvio_cargo_2'];
		  $desvio_cargo_3 = $dados['desvio_cargo_3'];
		  $desvio_cargo_4 = $dados['desvio_cargo_4'];
		  $desvio_cargo_5 = $dados['desvio_cargo_5'];
		  
		  $desvio_salario_1 = $dados['desvio_salario_1'];
		  $desvio_salario_2 = $dados['desvio_salario_2'];
		  $desvio_salario_3 = $dados['desvio_salario_3'];
		  $desvio_salario_4 = $dados['desvio_salario_4'];
		  $desvio_salario_5 = $dados['desvio_salario_5'];
		  
		  $desvio_datainicio_1 = $dados['desvio_datainicio_1'];
		  $desvio_datainicio_2 = $dados['desvio_datainicio_2'];
		  $desvio_datainicio_3 = $dados['desvio_datainicio_3'];
		  $desvio_datainicio_4 = $dados['desvio_datainicio_4'];
		  $desvio_datainicio_5 = $dados['desvio_datainicio_5'];
		  
		  $desvio_datafim_1 = $dados['desvio_datafim_1'];
		  $desvio_datafim_2 = $dados['desvio_datafim_2'];
		  $desvio_datafim_3 = $dados['desvio_datafim_3'];
		  $desvio_datafim_4 = $dados['desvio_datafim_4'];
		  $desvio_datafim_5 = $dados['desvio_datafim_5'];
	$emp_segunda = $dados['emp_segunta'];
	$tipo_emp_segunda = $dados['tipo_emp_segunda'];
	$cnpj_segunda = $dados['cnpj_segunda'];
	$cep_segunda = $dados['cep_segunda'];
	$rua_emp_segunda = $dados['rua_emp_segunda'];
	$num_emp_segunda = $dados['rua_emp_segunda'];
	$bairro_emp_segunda = $dados['bairro_emp_segunda'];
	$city_emp_segunda = $dados['city_emp_segunda'];
	$uf_emp_segunda = $dados['uf_emp_segunda'];
	$comp_emp_segunda = $dados['comp_emp_segunda'];

	$emp_terceira = $dados['emp_terceira'];
	$tipo_emp_terceira = $dados['tipo_emp_terceira'];
	$cnpj_terceira = $dados['cnpj_terceira'];
	$cep_terceira = $dados['cep_terceira'];
	$rua_emp_terceira = $dados['rua_emp_terceira'];
	$num_emp_terceira = $dados['num_emp_terceira'];
	$bairro_emp_terceira = $dados['bairro_emp_terceira'];
	$city_emp_terceira = $dados['city_emp_terceira'];
	$uf_emp_terceira = $dados['uf_emp_terceira'];
	$comp_emp_terceira = $dados['comp_emp_terceira'];
		  
	$emp_quarta = $dados['emp_quarta'];
	$tipo_emp_quarta = $dados['tipo_emp_quarta'];
	$cnpj_quarta = $dados['cnpj_quarta'];
	$cep_quarta = $dados['cep_quarta'];
	$rua_emp_quarta = $dados['rua_emp_quarta'];
	$num_emp_quarta = $dados['num_emp_quarta'];
	$bairro_emp_quarta = $dados['bairro_emp_quarta'];
	$city_emp_quarta = $dados['city_emp_quarta'];
	$uf_emp_quarta = $dados['uf_emp_quarta'];
	$comp_emp_quarta = $dados['comp_emp_quarta'];

	$obs_dano = $dados['obs_dano'];
	
?>
	<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>PAGINA DE ATUALIZAÇÃO CADASTRAL</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Atualizar dados do reclamante</h2>
		</header>
    </div>
        <div id="for-container">
        <br>
<ol class="breadcrumb">
	<li><a href="index.php">Home</a></li>
	<li class="active">Editar Reclamante</li>
</ol>
						<form name="signup" method="post" action="atualizando.php">
                        <div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span></button>
                        <h4>Atenção!</h4>
<span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Antes de atualizar verifique se todos os campos <span class="glyphicon glyphicon-asterisk icocads" aria-hidden="true"></span> estão preenchidos corretamente
						</div>
    <div class="bt_cadastrar_cli">
	<button type="submit" class="btn btn-primary" title="Erro no formulario" data-container="body" data-toggle="popover" data-placement="top" data-content="Verifique todos os campos e abas se estão preenchidas corretamente.">
  Atualizar
	</button>
	</div>
                        <br>
    <div class="tabbable">
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
<div class="form-group col-md-1" hidden="true">
<input type="text" class="form-control" id="hide_id_trabalho" name="hide_id_trabalho" required="required" value="<?php print $cargo_id ?>">
<input type="text" class="form-control" id="hide_id_clientes" name="hide_id_clientes" required="required" value="<?php print $id ?>">
<input type="text" class="form-control" id="hide_id_paradigmas" name="hide_id_paradigmas" required="required" value="<?php print $paradigmas_id ?>">
</div><!-- ID OCULTOS -->
                       	<div class="form-group col-md-3">
                            <label for="titulo">Nome completo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nomecompleto" name="nomecompleto" required="required" value="<?php print $nomecompleto ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Sexo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="sexo01" name="sexo01" required>
                                <option <?php echo $sex_singular=='o'?'selected':'';?> >-- Masculino --</option>
                                <option <?php echo $sex_singular=='a'?'selected':'';?> >-- Feminino --</option>
                            </select>                                                  
                        </div>
                        	<div hidden="true">
                            <div class="form-group col-md-2" title="">
                                    <label class="sexo-letras">Sexo02</label>
                                    <select class="form-control" id="sex_singular" name="sex_singular" required>
										<option <?php echo $sex_singular=='o'?'selected':'';?> >o</option>
										<option <?php echo $sex_singular=='a'?'selected':'';?> >a</option>
                                    </select>
                            </div>                            
                            <div class="form-group col-md-2" title="">
                                    <label class="sexo-letras">Sexo03</label>
                                    <select class="form-control" id="sex_or" name="sex_or">
										<option <?php echo $sex_singular==''?'selected':'';?> ></option>
										<option <?php echo $sex_singular=='a'?'selected':'';?> >a</option>
                                    </select>
                            </div>
                            </div>                                       
                        <div class="form-group col-md-2">
                            <label for="titulo">Nacionalidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required="required" value="<?php print $nacionalidade ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">Estado civil <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="estadocivil" name="estadocivil" required>
                                <option value="solteiro" <?php echo $estadocivil=='solteiro'?'selected':'';?> >Solteiro</option>
                                <option value="solteira" <?php echo $estadocivil=='solteira'?'selected':'';?> >Solteira</option>
                                <option value="casado" <?php echo $estadocivil=='casado'?'selected':'';?> >Casado</option>
                                <option value="casada" <?php echo $estadocivil=='casada'?'selected':'';?> >Casada</option>
                                <option value="separado" <?php echo $estadocivil=='separado'?'selected':'';?> >Separado</option>
                                <option value="separada" <?php echo $estadocivil=='separada'?'selected':'';?> >Separada</option>
                                <option value="viúvo" <?php echo $estadocivil=='viúvo'?'selected':'';?> >Viúvo</option>
                                <option value="viúva" <?php echo $estadocivil=='viúva'?'selected':'';?> >Viúva</option>
                                <option value="divorciado" <?php echo $estadocivil=='divorciado'?'selected':'';?> >Divorciado</option>
                                <option value="divorciada" <?php echo $estadocivil=='divorciada'?'selected':'';?> >Divorciada</option>
                            </select>                                                  
                        </div>
                        <div class="form-group col-md-3">
                            <label for="text">Cargo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_cargo" name="nome_cargo" required="required" value="<?php print $nome_cargo ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Dia <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> N..</small></label>
                            <select type="text" class="form-control" id="nasc_dia" name="nasc_dia" required>
                                <option value="1" <?php echo $nasc_dia=='1'?'selected':'';?> >01</option>
                                <option value="2" <?php echo $nasc_dia=='2'?'selected':'';?> >02</option>
                                <option value="3" <?php echo $nasc_dia=='3'?'selected':'';?> >03</option>
                                <option value="4" <?php echo $nasc_dia=='4'?'selected':'';?> >04</option>
                                <option value="5" <?php echo $nasc_dia=='5'?'selected':'';?> >05</option>
                                <option value="6" <?php echo $nasc_dia=='6'?'selected':'';?> >06</option>
                                <option value="7" <?php echo $nasc_dia=='7'?'selected':'';?> >07</option>
                                <option value="8" <?php echo $nasc_dia=='8'?'selected':'';?> >08</option>
                                <option value="9" <?php echo $nasc_dia=='9'?'selected':'';?> >09</option>
                                <option value="10" <?php echo $nasc_dia=='10'?'selected':'';?> >10</option>
                                <option value="11" <?php echo $nasc_dia=='11'?'selected':'';?> >11</option>
                                <option value="12" <?php echo $nasc_dia=='12'?'selected':'';?> >12</option>
                                <option value="13" <?php echo $nasc_dia=='13'?'selected':'';?> >13</option>
                                <option value="14" <?php echo $nasc_dia=='14'?'selected':'';?> >14</option>
                                <option value="15" <?php echo $nasc_dia=='15'?'selected':'';?> >15</option>
                                <option value="16" <?php echo $nasc_dia=='16'?'selected':'';?> >16</option>
                                <option value="17" <?php echo $nasc_dia=='17'?'selected':'';?> >17</option>
                                <option value="18" <?php echo $nasc_dia=='18'?'selected':'';?> >18</option>
                                <option value="19" <?php echo $nasc_dia=='19'?'selected':'';?> >19</option>
                                <option value="20" <?php echo $nasc_dia=='20'?'selected':'';?> >20</option>
                                <option value="21" <?php echo $nasc_dia=='21'?'selected':'';?> >21</option>
                                <option value="22" <?php echo $nasc_dia=='22'?'selected':'';?> >22</option>
                                <option value="23" <?php echo $nasc_dia=='23'?'selected':'';?> >23</option>
                                <option value="24" <?php echo $nasc_dia=='24'?'selected':'';?> >24</option>
                                <option value="25" <?php echo $nasc_dia=='25'?'selected':'';?> >25</option>
                                <option value="26" <?php echo $nasc_dia=='26'?'selected':'';?> >26</option>
                                <option value="27" <?php echo $nasc_dia=='27'?'selected':'';?> >27</option>
                                <option value="28" <?php echo $nasc_dia=='28'?'selected':'';?> >28</option>
                                <option value="29" <?php echo $nasc_dia=='29'?'selected':'';?> >29</option>
                                <option value="30" <?php echo $nasc_dia=='30'?'selected':'';?> >30</option>
                                <option value="31" <?php echo $nasc_dia=='31'?'selected':'';?> >31</option>
                            </select>                                                  
                        </div>
                        <div class="form-group col-md-2">
                        <label for="valor_venda">Mês <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> Nascimento</small></label>
                            <select type="text" class="form-control" id="nasc_mes" name="nasc_mes" required>
                                <option value="janeiro" <?php echo $nasc_mes=='janeiro'?'selected':'';?> >Janeiro</option>
                                <option value="fevereiro" <?php echo $nasc_mes=='fevereiro'?'selected':'';?> >Fevereiro</option>
                                <option value="março" <?php echo $nasc_mes=='março'?'selected':'';?> >Março</option>
                                <option value="abril" <?php echo $nasc_mes=='abril'?'selected':'';?> >Abril</option>
                                <option value="maio" <?php echo $nasc_mes=='maio'?'selected':'';?> >Maio</option>
                                <option value="junho" <?php echo $nasc_mes=='junho'?'selected':'';?> >Junho</option>
                                <option value="julho" <?php echo $nasc_mes=='julho'?'selected':'';?> >Julho</option>
                                <option value="agosto" <?php echo $nasc_mes=='agosto'?'selected':'';?> >Agosto</option>
                                <option value="setembro" <?php echo $nasc_mes=='setembro'?'selected':'';?> >Setembro</option>
                                <option value="outubro" <?php echo $nasc_mes=='outubro'?'selected':'';?> >Outubro</option>
                                <option value="novembro" <?php echo $nasc_mes=='novembro'?'selected':'';?> >Novembro</option>
                                <option value="dezembro" <?php echo $nasc_mes=='dezembro'?'selected':'';?> >Dezembro</option>
                             </select>

                        </div>
                        <div class="form-group col-md-2">
                            <label for="status">Ano <span class="glyphicon glyphicon-asterisk icocads"></span><small class="nasc"> Nascimento</small></label>
                            <select type="text" class="form-control" id="nasc_ano" name="nasc_ano" required>
                            <option value="2017" <?php echo $nasc_ano=='2017'?'selected':'';?> >2017</option>
                            <option value="2016" <?php echo $nasc_ano=='2016'?'selected':'';?> >2016</option><option value="2015" <?php echo $nasc_ano=='2015'?'selected':'';?> >2015</option><option value="2014" <?php echo $nasc_ano=='2014'?'selected':'';?> >2014</option><option value="2013" <?php echo $nasc_ano=='2013'?'selected':'';?> >2013</option><option value="2012" <?php echo $nasc_ano=='2012'?'selected':'';?> >2012</option><option value="2011" <?php echo $nasc_ano=='2011'?'selected':'';?> >2011</option><option value="2010" <?php echo $nasc_ano=='2010'?'selected':'';?> >2010</option><option value="2009" <?php echo $nasc_ano=='2009'?'selected':'';?> >2009</option><option value="2008" <?php echo $nasc_ano=='2008'?'selected':'';?> >2008</option><option value="2007" <?php echo $nasc_ano=='2007'?'selected':'';?> >2007</option><option value="2006" <?php echo $nasc_ano=='2006'?'selected':'';?> >2006</option><option value="2005" <?php echo $nasc_ano=='2005'?'selected':'';?> >2005</option><option value="2004" <?php echo $nasc_ano=='2004'?'selected':'';?> >2004</option><option value="2003" <?php echo $nasc_ano=='2003'?'selected':'';?> >2003</option><option value="2002" <?php echo $nasc_ano=='2002'?'selected':'';?> >2002</option><option value="2001" <?php echo $nasc_ano=='2001'?'selected':'';?> >2001</option><option value="2000" <?php echo $nasc_ano=='2000'?'selected':'';?> >2000</option><option value="1999" <?php echo $nasc_ano=='1999'?'selected':'';?> >1999</option><option value="1998" <?php echo $nasc_ano=='1998'?'selected':'';?> >1998</option><option value="1997" <?php echo $nasc_ano=='1997'?'selected':'';?> >1997</option><option value="1996" <?php echo $nasc_ano=='1996'?'selected':'';?> >1996</option><option value="1995" <?php echo $nasc_ano=='1995'?'selected':'';?> >1995</option><option value="1994" <?php echo $nasc_ano=='1994'?'selected':'';?> >1994</option><option value="1993" <?php echo $nasc_ano=='1993'?'selected':'';?> >1993</option><option value="1992" <?php echo $nasc_ano=='1992'?'selected':'';?> >1992</option><option value="1991" <?php echo $nasc_ano=='1991'?'selected':'';?> >1991</option><option value="1990" <?php echo $nasc_ano=='1990'?'selected':'';?> >1990</option><option value="1989" <?php echo $nasc_ano=='1989'?'selected':'';?> >1989</option><option value="1988" <?php echo $nasc_ano=='1988'?'selected':'';?> >1988</option><option value="1987" <?php echo $nasc_ano=='1987'?'selected':'';?> >1987</option><option value="1986" <?php echo $nasc_ano=='1986'?'selected':'';?> >1986</option><option value="1985" <?php echo $nasc_ano=='1985'?'selected':'';?> >1985</option><option value="1984" <?php echo $nasc_ano=='1984'?'selected':'';?> >1984</option><option value="1983" <?php echo $nasc_ano=='1983'?'selected':'';?> >1983</option><option value="1982" <?php echo $nasc_ano=='1982'?'selected':'';?> >1982</option><option value="1981" <?php echo $nasc_ano=='1981'?'selected':'';?> >1981</option><option value="1980" <?php echo $nasc_ano=='1980'?'selected':'';?> >1980</option><option value="1979" <?php echo $nasc_ano=='1979'?'selected':'';?> >1979</option><option value="1978" <?php echo $nasc_ano=='1978'?'selected':'';?> >1978</option><option value="1977" <?php echo $nasc_ano=='1977'?'selected':'';?> >1977</option><option value="1976" <?php echo $nasc_ano=='1976'?'selected':'';?> >1976</option><option value="1975" <?php echo $nasc_ano=='1975'?'selected':'';?> >1975</option><option value="1974" <?php echo $nasc_ano=='1974'?'selected':'';?> >1974</option><option value="1973" <?php echo $nasc_ano=='1973'?'selected':'';?> >1973</option><option value="1972" <?php echo $nasc_ano=='1972'?'selected':'';?> >1972</option><option value="1971" <?php echo $nasc_ano=='1971'?'selected':'';?> >1971</option><option value="1970" <?php echo $nasc_ano=='1970'?'selected':'';?> >1970</option><option value="1969" <?php echo $nasc_ano=='1969'?'selected':'';?> >1969</option><option value="1968" <?php echo $nasc_ano=='1968'?'selected':'';?> >1968</option><option value="1967" <?php echo $nasc_ano=='1967'?'selected':'';?> >1967</option><option value="1966" <?php echo $nasc_ano=='1966'?'selected':'';?> >1966</option><option value="1965" <?php echo $nasc_ano=='1965'?'selected':'';?> >1965</option><option value="1964" <?php echo $nasc_ano=='1964'?'selected':'';?> >1964</option><option value="1963" <?php echo $nasc_ano=='1963'?'selected':'';?> >1963</option><option value="1962" <?php echo $nasc_ano=='1962'?'selected':'';?> >1962</option><option value="1961" <?php echo $nasc_ano=='1961'?'selected':'';?> >1961</option><option value="1960" <?php echo $nasc_ano=='1960'?'selected':'';?> >1960</option><option value="1959" <?php echo $nasc_ano=='1959'?'selected':'';?> >1959</option><option value="1958" <?php echo $nasc_ano=='1958'?'selected':'';?> >1958</option><option value="1957" <?php echo $nasc_ano=='1957'?'selected':'';?> >1957</option><option value="1956" <?php echo $nasc_ano=='1956'?'selected':'';?> >1956</option><option value="1955" <?php echo $nasc_ano=='1955'?'selected':'';?> >1955</option><option value="1954" <?php echo $nasc_ano=='1954'?'selected':'';?> >1954</option><option value="1953" <?php echo $nasc_ano=='1953'?'selected':'';?> >1953</option><option value="1952" <?php echo $nasc_ano=='1952'?'selected':'';?> >1952</option><option value="1951" <?php echo $nasc_ano=='1951'?'selected':'';?> >1951</option><option value="1950" <?php echo $nasc_ano=='1950'?'selected':'';?> >1950</option><option value="1949" <?php echo $nasc_ano=='1949'?'selected':'';?> >1949</option><option value="1948" <?php echo $nasc_ano=='1948'?'selected':'';?> >1948</option><option value="1947" <?php echo $nasc_ano=='1947'?'selected':'';?> >1947</option><option value="1946" <?php echo $nasc_ano=='1946'?'selected':'';?> >1946</option><option value="1945" <?php echo $nasc_ano=='1945'?'selected':'';?> >1945</option><option value="1944" <?php echo $nasc_ano=='1944'?'selected':'';?> >1944</option><option value="1943" <?php echo $nasc_ano=='1943'?'selected':'';?> >1943</option><option value="1942" <?php echo $nasc_ano=='1942'?'selected':'';?> >1942</option><option value="1941" <?php echo $nasc_ano=='1941'?'selected':'';?> >1941</option><option value="1940" <?php echo $nasc_ano=='1940'?'selected':'';?> >1940</option><option value="1939" <?php echo $nasc_ano=='1939'?'selected':'';?> >1939</option><option value="1938" <?php echo $nasc_ano=='1938'?'selected':'';?> >1938</option><option value="1937" <?php echo $nasc_ano=='1937'?'selected':'';?> >1937</option><option value="1936" <?php echo $nasc_ano=='1936'?'selected':'';?> >1936</option><option value="1935" <?php echo $nasc_ano=='1935'?'selected':'';?> >1935</option><option value="1934" <?php echo $nasc_ano=='1934'?'selected':'';?> >1934</option><option value="1933" <?php echo $nasc_ano=='1933'?'selected':'';?> >1933</option><option value="1932" <?php echo $nasc_ano=='1932'?'selected':'';?> >1932</option><option value="1931" <?php echo $nasc_ano=='1931'?'selected':'';?> >1931</option><option value="1930" <?php echo $nasc_ano=='1930'?'selected':'';?> >1930</option><option value="1929" <?php echo $nasc_ano=='1929'?'selected':'';?> >1929</option><option value="1928" <?php echo $nasc_ano=='1928'?'selected':'';?> >1928</option><option value="1927" <?php echo $nasc_ano=='1927'?'selected':'';?> >1927</option><option value="1926" <?php echo $nasc_ano=='1926'?'selected':'';?> >1926</option><option value="1925" <?php echo $nasc_ano=='1925'?'selected':'';?> >1925</option><option value="1924" <?php echo $nasc_ano=='1924'?'selected':'';?> >1924</option><option value="1923" <?php echo $nasc_ano=='1923'?'selected':'';?> >1923</option><option value="1922" <?php echo $nasc_ano=='1922'?'selected':'';?> >1922</option><option value="1921" <?php echo $nasc_ano=='1921'?'selected':'';?> >1921</option><option value="1920" <?php echo $nasc_ano=='1920'?'selected':'';?> >1920</option><option value="1919" <?php echo $nasc_ano=='1919'?'selected':'';?> >1919</option><option value="1918" <?php echo $nasc_ano=='1918'?'selected':'';?> >1918</option><option value="1917" <?php echo $nasc_ano=='1917'?'selected':'';?> >1917</option><option value="1916" <?php echo $nasc_ano=='1916'?'selected':'';?> >1916</option><option value="1915" <?php echo $nasc_ano=='1915'?'selected':'';?> >1915</option><option value="1914" <?php echo $nasc_ano=='1914'?'selected':'';?> >1914</option><option value="1913" <?php echo $nasc_ano=='1913'?'selected':'';?> >1913</option><option value="1912" <?php echo $nasc_ano=='1912'?'selected':'';?> >1912</option><option value="1911" <?php echo $nasc_ano=='1911'?'selected':'';?> >1911</option><option value="1910" <?php echo $nasc_ano=='1910'?'selected':'';?> >1910</option><option value="1909" <?php echo $nasc_ano=='1909'?'selected':'';?> >1909</option><option value="1908" <?php echo $nasc_ano=='1908'?'selected':'';?> >1908</option><option value="1907" <?php echo $nasc_ano=='1907'?'selected':'';?> >1907</option><option value="1906" <?php echo $nasc_ano=='1906'?'selected':'';?> >1906</option><option value="1905" <?php echo $nasc_ano=='1905'?'selected':'';?> >1905</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">RG <span class="glyphicon glyphicon-asterisk icocads"></span></label>
       <input type="text" class="form-control" id="rg_num" name="rg_num" OnKeyPress="formatar('##.###.###-#', this)" required="required" value="<?php print $rg_num ?>">
                        </div>  
                        <div class="form-group col-md-1">
                            <label for="titulo">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="rg_origem" name="rg_origem" required>
                                    <option value="AC" <?php echo $rg_origem=='AC'?'selected':'';?> >AC</option> 
                                    <option value="AL" <?php echo $rg_origem=='AL'?'selected':'';?> >AL</option> 
                                    <option value="AM" <?php echo $rg_origem=='AM'?'selected':'';?> >AM</option> 
                                    <option value="AP" <?php echo $rg_origem=='AP'?'selected':'';?> >AP</option> 
                                    <option value="BA" <?php echo $rg_origem=='BA'?'selected':'';?> >BA</option> 
                                    <option value="CE" <?php echo $rg_origem=='CE'?'selected':'';?> >CE</option> 
                                    <option value="DF" <?php echo $rg_origem=='DF'?'selected':'';?> >DF</option> 
                                    <option value="ES" <?php echo $rg_origem=='ES'?'selected':'';?> >ES</option> 
                                    <option value="GO" <?php echo $rg_origem=='GO'?'selected':'';?> >GO</option> 
                                    <option value="MA" <?php echo $rg_origem=='MA'?'selected':'';?> >MA</option> 
                                    <option value="MT" <?php echo $rg_origem=='MT'?'selected':'';?> >MT</option> 
                                    <option value="MS" <?php echo $rg_origem=='MS'?'selected':'';?> >MS</option> 
                                    <option value="MG" <?php echo $rg_origem=='MG'?'selected':'';?> >MG</option> 
                                    <option value="PA" <?php echo $rg_origem=='PA'?'selected':'';?> >PA</option> 
                                    <option value="PB" <?php echo $rg_origem=='PB'?'selected':'';?> >PB</option> 
                                    <option value="PR" <?php echo $rg_origem=='PR'?'selected':'';?> >PR</option> 
                                    <option value="PE" <?php echo $rg_origem=='PE'?'selected':'';?> >PE</option> 
                                    <option value="PI" <?php echo $rg_origem=='PI'?'selected':'';?> >PI</option> 
                                    <option value="RJ" <?php echo $rg_origem=='RJ'?'selected':'';?> >RJ</option> 
                                    <option value="RN" <?php echo $rg_origem=='RN'?'selected':'';?> >RN</option> 
                                    <option value="RO" <?php echo $rg_origem=='RO'?'selected':'';?> >RO</option> 
                                    <option value="RS" <?php echo $rg_origem=='RS'?'selected':'';?> >RS</option> 
                                    <option value="RR" <?php echo $rg_origem=='RR'?'selected':'';?> >RR</option> 
                                    <option value="SC" <?php echo $rg_origem=='SC'?'selected':'';?> >SC</option> 
                                    <option value="SE" <?php echo $rg_origem=='SE'?'selected':'';?> >SE</option> 
                                    <option value="SP" <?php echo $rg_origem=='SP'?'selected':'';?> >SP</option> 
                                    <option value="TO" <?php echo $rg_origem=='TO'?'selected':'';?> >TO</option>
                        </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">RG/Emissão <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="date" class="form-control" id="rg_data_exp" name="rg_data_exp" required value="<?php print $rg_data_exp ?>">
                        </div>
                        <div class="form-group col-md-2 has-error">
                            <label for="text">CPF/MF <span class="glyphicon glyphicon-asterisk icocads"></span> <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" title="Não é possivel realizar alteração do CPF após o reclamante ser cadastrado"></span></label>
<input type="text" class="form-control" id="cliente_cpf" name="cliente_cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" required="required" value="<?php print $cliente_cpf ?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_compra">Nome da Mãe <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="nome_mae" name="nome_mae" value="<?php print $nome_mae ?>">
                        </div>                            
                        <div class="form-group col-md-2" id="div_pai">
                            <label for="valor_venda">Nome do Pai</span></label>
                            <input type="text" class="form-control" id="nome_pai" name="nome_pai" value="<?php print $nome_pai ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="valor_compra">Pai</label>
                            <br>
                        <label class="switch" data-toggle="tooltip" data-placement="top" title="Ativar/Desativar o registro de pai">
                        <input type="checkbox" checked id="check_pai" name="check_pai[]" value="e de">
                        <div class="slider round"></div>
                        </label>
                        <div class="div_pai_on" hidden="true">
                            <input type="text" class="form-control" id="on_pai" name="on_pai" value="<?php print $on_pai ?>">
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
        <input type="text" class="form-control" id="pis_num" name="pis_num" maxlength="14" OnKeyPress="formatar('###.#####.##-#', this)" value="<?php print $pis_num ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">CTPS</label>
                            <input type="text" class="form-control" id="ctps_numero" name="ctps_numero" value="<?php print $ctps_numero ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="titulo">CTPS | Série</label>
                            <input type="text" class="form-control" id="ctps_serie" name="ctps_serie" value="<?php print $ctps_serie ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="valor_venda">CTPS|Estado</label><!-- option fazer -->
                            <select type="text" class="form-control" id="ctps_uf" name="ctps_uf">
                                    <option value="AC" <?php echo $ctps_uf=='AC'?'selected':'';?> >Acre</option> 
                                    <option value="AL" <?php echo $ctps_uf=='AL'?'selected':'';?> >Alagoas</option> 
                                    <option value="AM" <?php echo $ctps_uf=='AM'?'selected':'';?> >Amazonas</option> 
                                    <option value="AP" <?php echo $ctps_uf=='AP'?'selected':'';?> >Amapá</option> 
                                    <option value="BA" <?php echo $ctps_uf=='BA'?'selected':'';?> >Bahia</option> 
                                    <option value="CE" <?php echo $ctps_uf=='CE'?'selected':'';?> >Ceará</option> 
                                    <option value="DF" <?php echo $ctps_uf=='DF'?'selected':'';?> >Distrito Federal</option> 
                                    <option value="ES" <?php echo $ctps_uf=='ES'?'selected':'';?> >Espírito Santo</option> 
                                    <option value="GO" <?php echo $ctps_uf=='GO'?'selected':'';?> >Goiás</option> 
                                    <option value="MA" <?php echo $ctps_uf=='MA'?'selected':'';?> >Maranhão</option> 
                                    <option value="MT" <?php echo $ctps_uf=='MT'?'selected':'';?> >Mato Grosso</option> 
                                    <option value="MS" <?php echo $ctps_uf=='MS'?'selected':'';?> >Mato Grosso do Sul</option> 
                                    <option value="MG" <?php echo $ctps_uf=='MG'?'selected':'';?> >Minas Gerais</option> 
                                    <option value="PA" <?php echo $ctps_uf=='PA'?'selected':'';?> >Pará</option> 
                                    <option value="PB" <?php echo $ctps_uf=='PB'?'selected':'';?> >Paraíba</option> 
                                    <option value="PR" <?php echo $ctps_uf=='PR'?'selected':'';?> >Paraná</option> 
                                    <option value="PE" <?php echo $ctps_uf=='PE'?'selected':'';?> >Pernambuco</option> 
                                    <option value="PI" <?php echo $ctps_uf=='PI'?'selected':'';?> >Piauí</option> 
                                    <option value="RJ" <?php echo $ctps_uf=='RJ'?'selected':'';?> >Rio de Janeiro</option> 
                                    <option value="RN" <?php echo $ctps_uf=='RN'?'selected':'';?> >Rio Grande do Norte</option> 
                                    <option value="RO" <?php echo $ctps_uf=='RO'?'selected':'';?> >Rondônia</option> 
                                    <option value="RS" <?php echo $ctps_uf=='RS'?'selected':'';?> >Rio Grande do Sul</option> 
                                    <option value="RR" <?php echo $ctps_uf=='RR'?'selected':'';?> >Roraima</option> 
                                    <option value="SC" <?php echo $ctps_uf=='SC'?'selected':'';?> >Santa Catarina</option> 
                                    <option value="SE" <?php echo $ctps_uf=='SE'?'selected':'';?> >Sergipe</option> 
                                    <option value="SP" <?php echo $ctps_uf=='SP'?'selected':'';?> >São Paulo</option> 
                                    <option value="TO" <?php echo $ctps_uf=='TO'?'selected':'';?> >Tocantins</option>
                                    </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status">CEP <span class="glyphicon glyphicon-asterisk icocads"></span><small> busca automática</small></label>
                <input type="text" class="form-control" id="cliente_cep" name="cliente_cep" maxlength="9" OnKeyPress="formatar('#####-###', this)" required value="<?php print $cliente_cep ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="titulo">Endereço <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_rua" name="end_rua" required="required" value="<?php print $end_rua ?>">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="text">Nº <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_numero" name="end_numero" required="required" value="<?php print $end_numero ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_compra">Bairro</label>
                            <input type="text" class="form-control" id="end_bairro" name="end_bairro" value="<?php print $end_bairro ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="valor_venda">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <input type="text" class="form-control" id="end_cidade" name="end_cidade" required="required" value="<?php print $end_cidade ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="data_cadastro">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control" id="end_uf" name="end_uf" required>
                                    <option value="AC" <?php echo $end_uf=='AC'?'selected':'';?> >AC</option> 
                                    <option value="AL" <?php echo $end_uf=='AL'?'selected':'';?> >AL</option> 
                                    <option value="AM" <?php echo $end_uf=='AM'?'selected':'';?> >AM</option> 
                                    <option value="AP" <?php echo $end_uf=='AP'?'selected':'';?> >AP</option> 
                                    <option value="BA" <?php echo $end_uf=='BA'?'selected':'';?> >BA</option> 
                                    <option value="CE" <?php echo $end_uf=='CE'?'selected':'';?> >CE</option> 
                                    <option value="DF" <?php echo $end_uf=='DF'?'selected':'';?> >DF</option> 
                                    <option value="ES" <?php echo $end_uf=='ES'?'selected':'';?> >ES</option> 
                                    <option value="GO" <?php echo $end_uf=='GO'?'selected':'';?> >GO</option> 
                                    <option value="MA" <?php echo $end_uf=='MA'?'selected':'';?> >MA</option> 
                                    <option value="MT" <?php echo $end_uf=='MT'?'selected':'';?> >MT</option> 
                                    <option value="MS" <?php echo $end_uf=='MS'?'selected':'';?> >MS</option> 
                                    <option value="MG" <?php echo $end_uf=='MG'?'selected':'';?> >MG</option> 
                                    <option value="PA" <?php echo $end_uf=='PA'?'selected':'';?> >PA</option> 
                                    <option value="PB" <?php echo $end_uf=='PB'?'selected':'';?> >PB</option> 
                                    <option value="PR" <?php echo $end_uf=='PR'?'selected':'';?> >PR</option> 
                                    <option value="PE" <?php echo $end_uf=='PE'?'selected':'';?> >PE</option> 
                                    <option value="PI" <?php echo $end_uf=='PI'?'selected':'';?> >PI</option> 
                                    <option value="RJ" <?php echo $end_uf=='RJ'?'selected':'';?> >RJ</option> 
                                    <option value="RN" <?php echo $end_uf=='RN'?'selected':'';?> >RN</option> 
                                    <option value="RO" <?php echo $end_uf=='RO'?'selected':'';?> >RO</option> 
                                    <option value="RS" <?php echo $end_uf=='RS'?'selected':'';?> >RS</option> 
                                    <option value="RR" <?php echo $end_uf=='RR'?'selected':'';?> >RR</option> 
                                    <option value="SC" <?php echo $end_uf=='SC'?'selected':'';?> >SC</option> 
                                    <option value="SE" <?php echo $end_uf=='SE'?'selected':'';?> >SE</option> 
                                    <option value="SP" <?php echo $end_uf=='SP'?'selected':'';?> >SP</option> 
                                    <option value="TO" <?php echo $end_uf=='TO'?'selected':'';?> >TO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                                <label for="status">Complemento</label>
                                <input type="text" class="form-control" id="end_complemento" name="end_complemento" value="<?php print $end_complemento ?>">
                        </div>
                        <div class="form-group col-md-4">
                                <label for="status">E-mail</label>
                                <input type="email" class="form-control" id="cli_mail" name="cli_mail" value="<?php print $cli_mail ?>">
                        </div>
                        <div class="form-group col-md-5">
                            <label for="status">Buscar reclamada <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                            <select type="text" class="form-control chosen-select" data-placeholder="Buscar Reclamada cadastrada..." id="trabalho_ID" name="trabalho_ID">
								<optgroup>Outras reclamada</optgroup>
                               <?php                                
                                $nome_empresa = ("SELECT * FROM adv_empresas");
								$sqli_result = mysqli_query($conexao, $nome_empresa);
								while($row = mysqli_fetch_assoc($sqli_result)){	
									   
								$id_emp = $row['id_emp'];
								$nome_emp = $row['nome_emp'];
								$cnpj_cpf = $row['cnpj_cpf'];
                                ?>
		<option value="<?= $id_emp ?>" <? if($id_emp==$trabalho_ID)echo "Selected";?>><?= $nome_emp ?> | <?= $cnpj_cpf ?></option>
								<?}?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="titulo">Comarca Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
<select type="text" class="form-control chosen-select" data-placeholder="Buscar comarcas do Brasil..." id="comarca_city" name="comarca_city" required>
<option value="" selected>selecionar</option>
<optgroup label="Comarcas do Acre">
<option value="Acrelândia-AC"<?php echo $comarca_city=='Acrelândia-AC'?'selected':'';?>>Acrelândia-AC</option>
<option value="Assis Brasil-AC"<?php echo $comarca_city=='Assis Brasil-AC'?'selected':'';?>>Assis Brasil-AC</option>
<option value="Bujari-AC"<?php echo $comarca_city=='Bujari-AC'?'selected':'';?>>Bujari-AC</option>
<option value="Capixaba-AC"<?php echo $comarca_city=='Capixaba-AC'?'selected':'';?>>Capixaba-AC</option>
<option value="Feijó-AC"<?php echo $comarca_city=='Feijó-AC'?'selected':'';?>>Feijó-AC</option>
<option value="Mâncio Lima-AC"<?php echo $comarca_city=='Mâncio Lima-AC'?'selected':'';?>>Mâncio Lima-AC</option>
<option value="Manoel Urbano-AC"<?php echo $comarca_city=='Manoel Urbano-AC'?'selected':'';?>>Manoel Urbano-AC</option>
<option value="Marechal Thaumaturgo-AC"<?php echo $comarca_city=='Marechal Thaumaturgo-AC'?'selected':'';?>>Marechal Thaumaturgo-AC</option>
<option value="Porto Acre-AC"<?php echo $comarca_city=='Porto Acre-AC'?'selected':'';?>>Porto Acre-AC</option>
<option value="Porto Walter-AC"<?php echo $comarca_city=='Porto Walter-AC'?'selected':'';?>>Porto Walter-AC</option>
<option value="Rodrigues Alves-AC"<?php echo $comarca_city=='Rodrigues Alves-AC'?'selected':'';?>>Rodrigues Alves-AC</option>
<option value="Santa Rosa do Purus-AC"<?php echo $comarca_city=='Santa Rosa do Purus-AC'?'selected':'';?>>Santa Rosa do Purus-AC</option>
<option value="Tarauacá-AC"<?php echo $comarca_city=='Tarauacá-AC"'?'selected':'';?>>Tarauacá-AC</option>
<option value="Jordão-AC"<?php echo $comarca_city=='Jordão-AC'?'selected':'';?>>Jordão-AC</option>
<option value="Rio Branco-AC"<?php echo $comarca_city=='Rio Branco-AC'?'selected':'';?>>Rio Branco-AC</option>
<option value="Brasiléia-AC"<?php echo $comarca_city=='Brasiléia-AC'?'selected':'';?>>Brasiléia-AC</option>
<option value="Cruzeiro do Sul-AC"<?php echo $comarca_city=='Cruzeiro do Sul-AC'?'selected':'';?>>Cruzeiro do Sul-AC</option>
<option value="Epitaciolândia-AC"<?php echo $comarca_city=='Epitaciolândia-AC'?'selected':'';?>>Epitaciolândia-AC</option>
<option value="Plácido de Castro-AC"<?php echo $comarca_city=='Plácido de Castro-AC'?'selected':'';?>>Plácido de Castro-AC</option>
<option value="Senador Guiomard-AC"<?php echo $comarca_city=='Senador Guiomard-AC'?'selected':'';?>>Senador Guiomard-AC</option>
<option value="Sena Madureira-AC"<?php echo $comarca_city=='Sena Madureira-AC'?'selected':'';?>>Sena Madureira-AC</option>
<option value="Xapuri-AC"<?php echo $comarca_city=='Xapuri-AC'?'selected':'';?>>Xapuri-AC</option>
<optgroup label="Comarcas do Rio Grande do Sul">
<option value="Agudo-RS"<?php echo $comarca_city=='Agudo-RS'?'selected':'';?>>Agudo-RS</option>
<option value="Alegrete-RS"<?php echo $comarca_city=='Alegrete-RS'?'selected':'';?>>Alegrete-RS</option>
<option value="Alvorada-RS"<?php echo $comarca_city=='Alvorada-RS'?'selected':'';?>>Alvorada-RS</option>
<option value="Antônio Prado-RS"<?php echo $comarca_city=='Antônio Prado-RS'?'selected':'';?>>Antônio Prado-RS</option>
<option value="Arroio do Meio-RS"<?php echo $comarca_city=='Arroio do Meio-RS'?'selected':'';?>>Arroio do Meio-RS</option>
<option value="Arroio do Tigre-RS"<?php echo $comarca_city=='Arroio do Tigre-RS'?'selected':'';?>>Arroio do Tigre-RS</option>
<option value="Arroio Grande-RS"<?php echo $comarca_city=='Arroio Grande-RS'?'selected':'';?>>Arroio Grande-RS</option>
<option value="Arvorezinha-RS"<?php echo $comarca_city=='Arvorezinha-RS'?'selected':'';?>>Arvorezinha-RS</option>
<option value="Augusto Pestana-RS"<?php echo $comarca_city=='Augusto Pestana-RS'?'selected':'';?>>Augusto Pestana-RS</option>
<option value="Bagé-RS"<?php echo $comarca_city=='Bagé-RS'?'selected':'';?>>Bagé-RS</option>
<option value="Barra do Ribeiro-RS"<?php echo $comarca_city=='Barra do Ribeiro-RS'?'selected':'';?>>Barra do Ribeiro-RS</option>
<option value="Bento Gonçalves-RS"<?php echo $comarca_city=='Bento Gonçalves-RS'?'selected':'';?>>Bento Gonçalves-RS</option>
<option value="Bom Jesus-RS"<?php echo $comarca_city=='Bom Jesus-RS'?'selected':'';?>>Bom Jesus-RS</option>
<option value="Butiá-RS"<?php echo $comarca_city=='Butiá-RS'?'selected':'';?>>Butiá-RS</option>
<option value="Caçapava do Sul-RS"<?php echo $comarca_city=='Caçapava do Sul-RS'?'selected':'';?>>Caçapava do Sul-RS</option>
<option value="Cacequi-RS"<?php echo $comarca_city=='Cacequi-RS'?'selected':'';?>>Cacequi-RS</option>
<option value="Cachoeira do Sul-RS"<?php echo $comarca_city=='Cachoeira do Sul-RS'?'selected':'';?>>Cachoeira do Sul-RS</option>
<option value="Cachoeirinha-RS"<?php echo $comarca_city=='Cachoeirinha-RS'?'selected':'';?>>Cachoeirinha-RS</option>
<option value="Camaquã-RS"<?php echo $comarca_city=='Camaquã-RS'?'selected':'';?>>Camaquã-RS</option>
<option value="Campina das Missões-RS"<?php echo $comarca_city=='Campina das Missões-RS'?'selected':'';?>>Campina das Missões-RS</option>
<option value="Campo Bom-RS"<?php echo $comarca_city=='Campo Bom-RS'?'selected':'';?>>Campo Bom-RS</option>
<option value="Campo Novo-RS"<?php echo $comarca_city=='Campo Novo-RS'?'selected':'';?>>Campo Novo-RS</option>
<option value="Candelária-RS"<?php echo $comarca_city=='Candelária-RS'?'selected':'';?>>Candelária-RS</option>
<option value="Canela-RS"<?php echo $comarca_city=='Canela-RS'?'selected':'';?>>Canela-RS</option>
<option value="Canguçu-RS"<?php echo $comarca_city=='Canguçu-RS'?'selected':'';?>>Canguçu-RS</option>
<option value="Canoas-RS"<?php echo $comarca_city=='Canoas-RS'?'selected':'';?>>Canoas-RS</option>
<option value="Capão da Canoa-RS"<?php echo $comarca_city=='Capão da Canoa-RS'?'selected':'';?>>Capão da Canoa-RS</option>
<option value="Carazinho-RS"<?php echo $comarca_city=='Carazinho-RS'?'selected':'';?>>Carazinho-RS</option>
<option value="Carlos Barbosa-RS"<?php echo $comarca_city=='Carlos Barbosa-RS'?'selected':'';?>>Carlos Barbosa-RS</option>
<option value="Casca-RS"<?php echo $comarca_city=='Casca-RS'?'selected':'';?>>Casca-RS</option>
<option value="Catuípe-RS"<?php echo $comarca_city=='Catuípe-RS'?'selected':'';?>>Catuípe-RS</option>
<option value="Caxias do Sul-RS"<?php echo $comarca_city=='Caxias do Sul-RS'?'selected':'';?>>Caxias do Sul-RS</option>
<option value="Cerro Largo-RS"<?php echo $comarca_city=='Cerro Largo-RS'?'selected':'';?>>Cerro Largo-RS</option>
<option value="Charqueadas-RS"<?php echo $comarca_city=='Charqueadas-RS'?'selected':'';?>>Charqueadas-RS</option>
<option value="Constantina-RS"<?php echo $comarca_city=='Constantina-RS'?'selected':'';?>>Constantina-RS</option>
<option value="Coronel Bicaco-RS"<?php echo $comarca_city=='Coronel Bicaco-RS'?'selected':'';?>>Coronel Bicaco-RS</option>
<option value="Crissiumal-RS"<?php echo $comarca_city=='Crissiumal-RS'?'selected':'';?>>Crissiumal-RS</option>
<option value="Cruz Alta-RS"<?php echo $comarca_city=='Cruz Alta-RS'?'selected':'';?>>Cruz Alta-RS</option>
<option value="Dois Irmãos-RS"<?php echo $comarca_city=='Dois Irmãos-RS'?'selected':'';?>>Dois Irmãos-RS</option>
<option value="Dom Pedrito-RS"<?php echo $comarca_city=='Dom Pedrito-RS'?'selected':'';?>>Dom Pedrito-RS</option>
<option value="Eldorado do Sul-RS"<?php echo $comarca_city=='Eldorado do Sul-RS'?'selected':'';?>>Eldorado do Sul-RS</option>
<option value="Encantado-RS"<?php echo $comarca_city=='Encantado-RS'?'selected':'';?>>Encantado-RS</option>
<option value="Encruzilhada do Sul-RS"<?php echo $comarca_city=='Encruzilhada do Sul-RS'?'selected':'';?>>Encruzilhada do Sul-RS</option>
<option value="Erechim-RS"<?php echo $comarca_city=='Erechim-RS'?'selected':'';?>>Erechim-RS</option>
<option value="Espumoso-RS"<?php echo $comarca_city=='Espumoso-RS'?'selected':'';?>>Espumoso-RS</option>
<option value="Estância Velha-RS"<?php echo $comarca_city=='Estância Velha-RS'?'selected':'';?>>Estância Velha-RS</option>
<option value="Esteio-RS"<?php echo $comarca_city=='Esteio-RS'?'selected':'';?>>Esteio-RS</option>
<option value="Estrela-RS"<?php echo $comarca_city=='Estrela-RS'?'selected':'';?>>Estrela-RS</option>
<option value="Farroupilha-RS"<?php echo $comarca_city=='Farroupilha-RS'?'selected':'';?>>Farroupilha-RS</option>
<option value="Faxinal do Soturno-RS"<?php echo $comarca_city=='Faxinal do Soturno-RS'?'selected':'';?>>Faxinal do Soturno-RS</option>
<option value="Feliz-RS"<?php echo $comarca_city=='Feliz-RS'?'selected':'';?>>Feliz-RS</option>
<option value="Flores da Cunha-RS"<?php echo $comarca_city=='Flores da Cunha-RS'?'selected':'';?>>Flores da Cunha-RS</option>
<option value="Frederico Westphalen-RS"<?php echo $comarca_city=='Frederico Westphalen-RS'?'selected':'';?>>Frederico Westphalen-RS</option>
<option value="Garibaldi-RS"<?php echo $comarca_city=='Garibaldi-RS'?'selected':'';?>>Garibaldi-RS</option>
<option value="Gaurama-RS"<?php echo $comarca_city=='Gaurama-RS'?'selected':'';?>>Gaurama-RS</option>
<option value="General Câmara-RS"<?php echo $comarca_city=='General Câmara-RS'?'selected':'';?>>General Câmara-RS</option>
<option value="Getúlio Vargas-RS"<?php echo $comarca_city=='Getúlio Vargas-RS'?'selected':'';?>>Getúlio Vargas-RS</option>
<option value="Giruá-RS"<?php echo $comarca_city=='Giruá-RS'?'selected':'';?>>Giruá-RS</option>
<option value="Gramado-RS"<?php echo $comarca_city=='Gramado-RS'?'selected':'';?>>Gramado-RS</option>
<option value="Gravataí-RS"<?php echo $comarca_city=='Gravataí-RS'?'selected':'';?>>Gravataí-RS</option>
<option value="Guaíba-RS"<?php echo $comarca_city=='Guaíba-RS'?'selected':'';?>>Guaíba-RS</option>
<option value="Guaporé-RS"<?php echo $comarca_city=='Guaporé-RS'?'selected':'';?>>Guaporé-RS</option>
<option value="Guarani das Missões-RS"<?php echo $comarca_city=='Guarani das Missões-RS'?'selected':'';?>>Guarani das Missões-RS</option>
<option value="Herval-RS"<?php echo $comarca_city=='Herval-RS'?'selected':'';?>>Herval-RS</option>
<option value="Horizontina-RS"<?php echo $comarca_city=='Horizontina-RS'?'selected':'';?>>Horizontina-RS</option>
<option value="Ibirubá-RS"<?php echo $comarca_city=='Ibirubá-RS'?'selected':'';?>>Ibirubá-RS</option>
<option value="Igrejinha-RS"<?php echo $comarca_city=='Igrejinha-RS'?'selected':'';?>>Igrejinha-RS</option>
<option value="Ijuí-RS"<?php echo $comarca_city=='Ijuí-RS'?'selected':'';?>>Ijuí-RS</option>
<option value="Iraí-RS"<?php echo $comarca_city=='Iraí-RS'?'selected':'';?>>Iraí-RS</option>
<option value="Itaqui-RS"<?php echo $comarca_city=='Itaqui-RS'?'selected':'';?>>Itaqui-RS</option>
<option value="Ivoti-RS"<?php echo $comarca_city=='Ivoti-RS'?'selected':'';?>>Ivoti-RS</option>
<option value="Jaguarão-RS"<?php echo $comarca_city=='Jaguarão-RS'?'selected':'';?>>Jaguarão-RS</option>
<option value="Jaguari-RS"<?php echo $comarca_city=='Jaguari-RS'?'selected':'';?>>Jaguari-RS</option>
<option value="Júlio de Castilhos-RS"<?php echo $comarca_city=='Júlio de Castilhos-RS'?'selected':'';?>>Júlio de Castilhos-RS</option>
<option value="Lagoa Vermelha-RS"<?php echo $comarca_city=='Lagoa Vermelha-RS'?'selected':'';?>>Lagoa Vermelha-RS</option>
<option value="Lajeado-RS"<?php echo $comarca_city=='Lajeado-RS'?'selected':'';?>>Lajeado-RS</option>
<option value="Lavras do Sul-RS"<?php echo $comarca_city=='Lavras do Sul-RS'?'selected':'';?>>Lavras do Sul-RS</option>
<option value="Marau-RS"<?php echo $comarca_city=='Marau-RS'?'selected':'';?>>Marau-RS</option>
<option value="Marcelino Ramos-RS"<?php echo $comarca_city=='Marcelino Ramos-RS'?'selected':'';?>>Marcelino Ramos-RS</option>
<option value="Montenegro-RS"<?php echo $comarca_city=='Montenegro-RS'?'selected':'';?>>Montenegro-RS</option>
<option value="Mostardas-RS"<?php echo $comarca_city=='Mostardas-RS'?'selected':'';?>>Mostardas-RS</option>
<option value="Não-Me-Toque-RS"<?php echo $comarca_city=='Não-Me-Toque-RS'?'selected':'';?>>Não-Me-Toque-RS</option>
<option value="Nonoai-RS"<?php echo $comarca_city=='Nonoai-RS'?'selected':'';?>>Nonoai-RS</option>
<option value="Nova Petrópolis-RS"<?php echo $comarca_city=='Nova Petrópolis-RS'?'selected':'';?>>Nova Petrópolis-RS</option>
<option value="Nova Prata-RS"<?php echo $comarca_city=='Nova Prata-RS'?'selected':'';?>>Nova Prata-RS</option>
<option value="Novo Hamburgo-RS"<?php echo $comarca_city=='Novo Hamburgo-RS'?'selected':'';?>>Novo Hamburgo-RS</option>
<option value="Osório-RS"<?php echo $comarca_city=='Osório-RS'?'selected':'';?>>Osório-RS</option>
<option value="Osório (Terra de Areia)-RS"<?php echo $comarca_city=='Osório (Terra de Areia)-RS'?'selected':'';?>>Osório (Terra de Areia)-RS</option>
<option value="Palmares do Sul-RS"<?php echo $comarca_city=='Palmares do Sul-RS'?'selected':'';?>>Palmares do Sul-RS</option>
<option value="Palmeira das Missões-RS"<?php echo $comarca_city=='Palmeira das Missões-RS'?'selected':'';?>>Palmeira das Missões-RS</option>
<option value="Panambi-RS"<?php echo $comarca_city=='Panambi-RS'?'selected':'';?>>Panambi-RS</option>
<option value="Parobé-RS"<?php echo $comarca_city=='Parobé-RS'?'selected':'';?>>Parobé-RS</option>
<option value="Passo Fundo-RS"<?php echo $comarca_city=='Passo Fundo-RS'?'selected':'';?>>Passo Fundo-RS</option>
<option value="Pedro Osório-RS"<?php echo $comarca_city=='Pedro Osório-RS'?'selected':'';?>>Pedro Osório-RS</option>
<option value="Pelotas-RS"<?php echo $comarca_city=='Pelotas-RS'?'selected':'';?>>Pelotas-RS</option>
<option value="Pinheiro Machado-RS"<?php echo $comarca_city=='Pinheiro Machado-RS'?'selected':'';?>>Pinheiro Machado-RS</option>
<option value="Piratini-RS"<?php echo $comarca_city=='Piratini-RS'?'selected':'';?>>Piratini-RS</option>
<option value="Planalto-RS"<?php echo $comarca_city=='Planalto-RS'?'selected':'';?>>Planalto-RS</option>
<option value="Portão-RS"<?php echo $comarca_city=='Portão-RS'?'selected':'';?>>Portão-RS</option>
<option value="Porto Alegre-RS"<?php echo $comarca_city=='Porto Alegre-RS'?'selected':'';?>>Porto Alegre-RS</option>
<option value="Porto Xavier-RS"<?php echo $comarca_city=='Porto Xavier-RS'?'selected':'';?>>Porto Xavier-RS</option>
<option value="Quaraí-RS"<?php echo $comarca_city=='Quaraí-RS'?'selected':'';?>>Quaraí-RS</option>
<option value="Restinga Seca-RS"<?php echo $comarca_city=='Restinga Seca-RS'?'selected':'';?>>Restinga Seca-RS</option>
<option value="Rio Grande-RS"<?php echo $comarca_city=='Rio Grande-RS'?'selected':'';?>>Rio Grande-RS</option>
<option value="Rio Pardo-RS"<?php echo $comarca_city=='Rio Pardo-RS'?'selected':'';?>>Rio Pardo-RS</option>
<option value="Rodeio Bonito-RS"<?php echo $comarca_city=='Rodeio Bonito-RS'?'selected':'';?>>Rodeio Bonito-RS</option>
<option value="Ronda Alta-RS"<?php echo $comarca_city=='Ronda Alta-RS'?'selected':'';?>>Ronda Alta-RS</option>
<option value="Rosário do Sul-RS"<?php echo $comarca_city=='Rosário do Sul-RS'?'selected':'';?>>Rosário do Sul-RS</option>
<option value="Salto do Jacuí-RS"<?php echo $comarca_city=='Salto do Jacuí-RS'?'selected':'';?>>Salto do Jacuí-RS</option>
<option value="Sananduva-RS"<?php echo $comarca_city=='Sananduva-RS'?'selected':'';?>>Sananduva-RS</option>
<option value="Santa Bárbara do Sul-RS"<?php echo $comarca_city=='Santa Bárbara do Sul-RS'?'selected':'';?>>Santa Bárbara do Sul-RS</option>
<option value="Santa Cruz do Sul-RS"<?php echo $comarca_city=='Santa Cruz do Sul-RS'?'selected':'';?>>Santa Cruz do Sul-RS</option>
<option value="Santa Maria-RS"<?php echo $comarca_city=='Santa Maria-RS'?'selected':'';?>>Santa Maria-RS</option>
<option value="Santa Rosa-RS"<?php echo $comarca_city=='Santa Rosa-RS'?'selected':'';?>>Santa Rosa-RS</option>
<option value="Santa Vitória do Palmar-RS"<?php echo $comarca_city=='Santa Vitória do Palmar-RS'?'selected':'';?>>Santa Vitória do Palmar-RS</option>
<option value="Santana do Livramento-RS"<?php echo $comarca_city=='Santana do Livramento-RS'?'selected':'';?>>Santana do Livramento-RS</option>
<option value="Santiago-RS"<?php echo $comarca_city=='Santiago-RS'?'selected':'';?>>Santiago-RS</option>
<option value="Santo Ângelo-RS"<?php echo $comarca_city=='Santo Ângelo-RS'?'selected':'';?>>Santo Ângelo-RS</option>
<option value="Santo Antônio da Patrulha-RS"<?php echo $comarca_city=='Santo Antônio da Patrulha-RS'?'selected':'';?>>Santo Antônio da Patrulha-RS</option>
<option value="Santo Antônio das Missões-RS"<?php echo $comarca_city=='Santo Antônio das Missões-RS'?'selected':'';?>>Santo Antônio das Missões-RS</option>
<option value="Santo Augusto-RS"<?php echo $comarca_city=='Santo Augusto-RS'?'selected':'';?>>Santo Augusto-RS</option>
<option value="Santo Cristo-RS"<?php echo $comarca_city=='Santo Cristo-RS'?'selected':'';?>>Santo Cristo-RS</option>
<option value="São Borja-RS"<?php echo $comarca_city=='São Borja-RS'?'selected':'';?>>São Borja-RS</option>
<option value="São Francisco de Assis-RS"<?php echo $comarca_city=='São Francisco de Assis-RS'?'selected':'';?>>São Francisco de Assis-RS</option>
<option value="São Francisco de Paula-RS"<?php echo $comarca_city=='São Francisco de Paula-RS'?'selected':'';?>>São Francisco de Paula-RS</option>
<option value="São Gabriel-RS"<?php echo $comarca_city=='São Gabriel-RS'?'selected':'';?>>São Gabriel-RS</option>
<option value="São Jerônimo-RS"<?php echo $comarca_city=='São Jerônimo-RS'?'selected':'';?>>São Jerônimo-RS</option>
<option value="São José do Norte-RS"<?php echo $comarca_city=='São José do Norte-RS'?'selected':'';?>>São José do Norte-RS</option>
<option value="São José do Ouro-RS"<?php echo $comarca_city=='São José do Ouro-RS'?'selected':'';?>>São José do Ouro-RS</option>
<option value="São Leopoldo-RS"<?php echo $comarca_city=='São Leopoldo-RS'?'selected':'';?>>São Leopoldo-RS</option>
<option value="São Lourenço do Sul-RS"<?php echo $comarca_city=='São Lourenço do Sul-RS'?'selected':'';?>>São Lourenço do Sul-RS</option>
<option value="São Luiz Gonzaga-RS"<?php echo $comarca_city=='São Luiz Gonzaga-RS'?'selected':'';?>>São Luiz Gonzaga-RS</option>
<option value="São Marcos-RS"<?php echo $comarca_city=='São Marcos-RS'?'selected':'';?>>São Marcos-RS</option>
<option value="São Pedro do Sul-RS"<?php echo $comarca_city=='São Pedro do Sul-RS'?'selected':'';?>>São Pedro do Sul-RS</option>
<option value="São Sebastião do Caí-RS"<?php echo $comarca_city=='São Sebastião do Caí-RS'?'selected':'';?>>São Sebastião do Caí-RS</option>
<option value="São Sepé-RS"<?php echo $comarca_city=='São Sepé-RS'?'selected':'';?>>São Sepé-RS</option>
<option value="São Valentim-RS"<?php echo $comarca_city=='São Valentim-RS'?'selected':'';?>>São Valentim-RS</option>
<option value="São Vicente do Sul-RS"<?php echo $comarca_city=='São Vicente do Sul-RS'?'selected':'';?>>São Vicente do Sul-RS</option>
<option value="Sapiranga-RS"<?php echo $comarca_city=='Sapiranga-RS'?'selected':'';?>>Sapiranga-RS</option>
<option value="Sapucaia do Sul-RS"<?php echo $comarca_city=='Sapucaia do Sul-RS'?'selected':'';?>>Sapucaia do Sul-RS</option>
<option value="Sarandi-RS"<?php echo $comarca_city=='Sarandi-RS'?'selected':'';?>>Sarandi-RS</option>
<option value="Seberi-RS"<?php echo $comarca_city=='Seberi-RS'?'selected':'';?>>Seberi-RS</option>
<option value="Sobradinho-RS"<?php echo $comarca_city=='Sobradinho-RS'?'selected':'';?>>Sobradinho-RS</option>
<option value="Soledade-RS"<?php echo $comarca_city=='Soledade-RS'?'selected':'';?>>Soledade-RS</option>
<option value="Tapejara-RS"<?php echo $comarca_city=='Tapejara-RS'?'selected':'';?>>Tapejara-RS</option>
<option value="Tapera-RS"<?php echo $comarca_city=='Tapera-RS'?'selected':'';?>>Tapera-RS</option>
<option value="Tapes-RS"<?php echo $comarca_city=='Tapes-RS'?'selected':'';?>>Tapes-RS</option>
<option value="Taquara-RS"<?php echo $comarca_city=='Taquara-RS'?'selected':'';?>>Taquara-RS</option>
<option value="Taquari-RS"<?php echo $comarca_city=='Taquari-RS'?'selected':'';?>>Taquari-RS</option>
<option value="Tenente Portela-RS"<?php echo $comarca_city=='Tenente Portela-RS'?'selected':'';?>>Tenente Portela-RS</option>
<option value="Teutônia-RS"<?php echo $comarca_city=='Teutônia-RS'?'selected':'';?>>Teutônia-RS</option>
<option value="Torres-RS"<?php echo $comarca_city=='Torres-RS'?'selected':'';?>>Torres-RS</option>
<option value="Tramandaí-RS"<?php echo $comarca_city=='Tramandaí-RS'?'selected':'';?>>Tramandaí-RS</option>
<option value="Três Coroas-RS"<?php echo $comarca_city=='Três Coroas-RS'?'selected':'';?>>Três Coroas-RS</option>
<option value="Três de Maio-RS"<?php echo $comarca_city=='Três de Maio-RS'?'selected':'';?>>Três de Maio-RS</option>
<option value="Três Passos-RS"<?php echo $comarca_city=='Três Passos-RS'?'selected':'';?>>Três Passos-RS</option>
<option value="Triunfo-RS"<?php echo $comarca_city=='Triunfo-RS'?'selected':'';?>>Triunfo-RS</option>
<option value="Tucunduva-RS"<?php echo $comarca_city=='Tucunduva-RS'?'selected':'';?>>Tucunduva-RS</option>
<option value="Tupanciretã-RS"<?php echo $comarca_city=='Tupanciretã-RS'?'selected':'';?>>Tupanciretã-RS</option>
<option value="Uruguaiana-RS"<?php echo $comarca_city=='Uruguaiana-RS'?'selected':'';?>>Uruguaiana-RS</option>
<option value="Vacaria-RS"<?php echo $comarca_city=='Vacaria-RS'?'selected':'';?>>Vacaria-RS</option>
<option value="Venâncio Aires-RS"<?php echo $comarca_city=='Venâncio Aires-RS'?'selected':'';?>>Venâncio Aires-RS</option>
<option value="Vera Cruz-RS"<?php echo $comarca_city=='Vera Cruz-RS'?'selected':'';?>>Vera Cruz-RS</option>
<option value="Veranópolis-RS"<?php echo $comarca_city=='Veranópolis-RS'?'selected':'';?>>Veranópolis-RS</option>
<option value="Viamão-RS"<?php echo $comarca_city=='Viamão-RS'?'selected':'';?>>Viamão-RS</option>
								<optgroup label="Comarcas de São Paulo">
<option value="São Paulo-SP" <?php echo $comarca_city=='São Paulo-SP'?'selected':'';?> >São Paulo</option>
<option value="Barueri-SP" <?php echo $comarca_city=='Barueri-SP'?'selected':'';?> >Barueri</option>
<option value="Caieiras-SP" <?php echo $comarca_city=='Caieiras-SP'?'selected':'';?> >Caieiras</option>
<option value="Cajamar-SP" <?php echo $comarca_city=='Cajamar-SP'?'selected':'';?> >Cajamar</option>
<option value="Carapicuiba-SP" <?php echo $comarca_city=='Carapicuiba-SP'?'selected':'';?> >Carapicuíba</option>
<option value="Cotia-SP" <?php echo $comarca_city=='Cotia-SP'?'selected':'';?> >Cotia</option>
<option value="Cubatão-SP" <?php echo $comarca_city=='Cubatão-SP'?'selected':'';?> >Cubatão</option>
<option value="Diadema-SP" <?php echo $comarca_city=='Diadema-SP'?'selected':'';?> >Diadema</option>
<option value="Embu-SP" <?php echo $comarca_city=='Embu-SP'?'selected':'';?> >Embu</option>
<option value="Ferras de Vasconcelos-SP" <?php echo $comarca_city=='Ferras de Vasconcelos-SP'?'selected':'';?> >Ferraz de Vasconcelos</option>
<option value="Franco da Rocha-SP" <?php echo $comarca_city=='Franco da Rocha-SP'?'selected':'';?> >Franco da Rocha</option>
<option value="Guaruja-SP" <?php echo $comarca_city=='Guaruja-SP'?'selected':'';?> >Guarujá</option>
<option value="Guarulhos-SP" <?php echo $comarca_city=='Guarulhos-SP'?'selected':'';?> >Guarulhos</option>
<option value="Itapecerica da Serra-SP" <?php echo $comarca_city=='Itapecerica da Serra-SP'?'selected':'';?> >Itapecerica da Serra</option>
<option value="Itapevi-SP" <?php echo $comarca_city=='Itapevi-SP'?'selected':'';?> >Itapevi</option>
<option value="Itaquaquecetuba-SP" <?php echo $comarca_city=='Itaquaquecetuba-SP'?'selected':'';?> >Itaquaquecetuba</option>
<option value="Jandira-SP" <?php echo $comarca_city=='Jandira-SP'?'selected':'';?> >Jandira</option>
<option value="Mauá-SP" <?php echo $comarca_city=='Mauá-SP'?'selected':'';?> >Mauá</option>
<option value="Mogi das Cruzes-SP" <?php echo $comarca_city=='Mogi das Cruzes-SP'?'selected':'';?> >Mogi das Cruzes</option>
<option value="Osasco-SP" <?php echo $comarca_city=='Osasco-SP'?'selected':'';?> >Osasco</option>
<option value="Poá-SP" <?php echo $comarca_city=='Poá-SP'?'selected':'';?> >Poá</option>
<option value="Praia Grande-SP" <?php echo $comarca_city=='Praia Grande-SP'?'selected':'';?> >Praia Grande</option>
<option value="Ribeirão Pires-SP" <?php echo $comarca_city=='Ribeirão Pires-SP'?'selected':'';?> >Ribeirão Pires</option>
<option value="Santana de Parnaíba-SP" <?php echo $comarca_city=='Santana de Parnaíba-SP'?'selected':'';?> >Santana de Parnaíba</option>
<option value="Santo André-SP" <?php echo $comarca_city=='Santo André-SP'?'selected':'';?> >Santo André</option>
<option value="Santos-SP" <?php echo $comarca_city=='Santos-SP'?'selected':'';?> >Santos</option>
<option value="São Bernardo do Campo-SP" <?php echo $comarca_city=='São Bernardo do Campo-SP'?'selected':'';?> >São Bernardo do Campo</option>
<option value="São Caetano do Sul-SP" <?php echo $comarca_city=='São Caetano do Sul-SP'?'selected':'';?> >São Caetano do Sul</option>
<option value="São Vicente-SP" <?php echo $comarca_city=='São Vicente-SP'?'selected':'';?> >São Vicente</option>
<option value="Sorocaba-SP" <?php echo $comarca_city=='Sorocaba-SP'?'selected':'';?> >Sorocaba</option>
<option value="Suzano-SP" <?php echo $comarca_city=='Suzano-SP'?'selected':'';?> >Suzano</option>
<option value="Taboão da Serra-SP" <?php echo $comarca_city=='Taboão da Serra-SP'?'selected':'';?> >Taboão da Serra</option>
</select>
                        </div>
                        <div class="form-group col-md-2">
    <label for="text">Celular <span class="glyphicon glyphicon-asterisk icocads"></span></label>
    <input type="text" class="form-control" id="cli_cel" name="cli_cel" maxlength="13" OnKeyPress="formatar('## #####-####', this)" required="required" value="<?php print $cli_cel ?>">
                        </div>
                        <div class="form-group col-md-2">
        <label for="text">Telefone Fixo</label>
        <input type="text" class="form-control" id="cli_tel" name="cli_tel" maxlength="13" OnKeyPress="formatar('## ####-####', this)" value="<?php print $cli_tel ?>">
                        </div>                                
</div>
<div class="tab-pane fade" id="aba2">
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
<input type="tel" class="form-control" id="salario" name="salario" onkeyup="soma()" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $salario ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor por fora</label>
<input type="tel" class="form-control" id="valor_fora" name="valor_fora" onkeyup="soma()" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $valor_fora ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Remuneração total</label>
                <input type="text" class="form-control" id="remu_total" name="remu_total" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $remu_total ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Entrada</label>
                <input type="date" class="form-control" id="data_ent" name="data_ent" value="<?php print $data_ent ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Registro</label>
                <input type="date" class="form-control" id="data_reg" name="data_reg" value="<?php print $data_reg ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data Saida</label>
                <input type="date" class="form-control" id="data_saida" name="data_saida" value="<?php print $data_saida ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Teve aviso previo</label>
                <select type="text" class="form-control" id="receb_aviso_previo" name="receb_aviso_previo">
                <option value="não" <?php echo $receb_aviso_previo=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $receb_aviso_previo=='sim'?'selected':'';?> >---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data do aviso</label>
                <input type="date" class="form-control" id="aviso_data" name="aviso_data" value="<?php print $aviso_data ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Inicio do aviso previo</label>
                <input type="date" class="form-control" id="inic_aviso_previo" name="inic_aviso_previo" value="<?php print $inic_aviso_previo ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cumprio aviso prévio?</label>
                <select type="text" class="form-control" id="cump_aviso_previo" name="cump_aviso_previo">
                <option value="não" <?php echo $cump_aviso_previo=='não'?'selected':'';?> >-------- NÃO --------</option>
                <option value="sim" <?php echo $cump_aviso_previo=='sim'?'selected':'';?> >-------- SIM --------</option>
                <option value="parcial" <?php echo $cump_aviso_previo=='parcial'?'selected':'';?> >-------- PARCIAL --------</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Reduziu aviso Prévio</label>
                <select type="text" class="form-control" id="aviso_reducao" name="aviso_reducao">
                <option value="não" <?php echo $aviso_reducao=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="07 dias" <?php echo $aviso_reducao=='07 dias'?'selected':'';?> >---- 07 dias ----</option>
                <option value="02 horas" <?php echo $aviso_reducao=='02 horas'?'selected':'';?> >---- 02 horas ----</option>
                <option value="outros" <?php echo $aviso_reducao=='outros'?'selected':'';?> >---- Outros ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Valor do aviso</label>
                <input type="text" class="form-control" id="aviso_valor" name="aviso_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $aviso_valor ?>">
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
<script>
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
			<input type="text" class="form-control" id="qm_homo" name="qm_homo" value="<?php print $qm_homo ?>" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_data_homo">
                <label for="text">Data da Homologação</label>
                <input type="date" class="form-control" id="data_homo" name="data_homo" value="<?php print $data_homo ?>">
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
                                
<script>
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
                                <div class="form-group col-md-3 has-error" id="div_homo_valor">
                <label for="text">Recebeu na quitação</label>
                <input type="text" class="form-control" id="recebeu_homo" name="recebeu_homo" value="<?php print $recebeu_homo ?>" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_homo_valor">
                <label for="text">Valor da quitação</label>
                <input type="text" class="form-control" id="homo_valor" name="homo_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $homo_valor ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data da quitação</label>
                <input type="date" class="form-control" id="data_quita" name="data_quita" value="<?php print $data_quita ?>">
                                </div>
</div>
<div class="tab-pane fade" id="aba3">
                                <div class="form-group col-md-2">
                <label for="text"  style="color:#F76466"><small>Entrada</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <input type="time" class="form-control" id="hrs_ent_sem" name="hrs_ent_sem" value="<?php print $hrs_ent_sem ?>">
                <label for="text">Sexta-Feira</label>
                <input type="time" class="form-control" id="hrs_ent_sex" name="hrs_ent_sex" value="<?php print $hrs_ent_sex ?>">
                <label for="text">Sábado</label>
                <input type="time" class="form-control" id="hrs_ent_sab" name="hrs_ent_sab" value="<?php print $hrs_ent_sab ?>">
                <label for="text">Domingo</label>
                <input type="time" class="form-control" id="hrs_ent_dom" name="hrs_ent_dom" value="<?php print $hrs_ent_dom ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"  style="color:#F76466"><small>Saida</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <input type="time" class="form-control" id="hrs_exit_sem" name="hrs_exit_sem" value="<?php print $hrs_exit_sem ?>">
                <label for="text">Sexta-Feira</label>
                <input type="time" class="form-control" id="hrs_exit_sex" name="hrs_exit_sex" value="<?php print $hrs_exit_sex ?>">
                <label for="text">Sábado</label>
                <input type="time" class="form-control" id="hrs_exit_sab" name="hrs_exit_sab" value="<?php print $hrs_exit_sab ?>">
                <label for="text">Domingo</label>
                <input type="time" class="form-control" id="hrs_exit_dom" name="hrs_exit_dom" value="<?php print $hrs_exit_dom ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text" style="color:#F76466"><small>Tempo de intervalo</small></label><br>
                <label for="text">Segunda à Quinta</label>
                <select type="text" class="form-control" id="hrs_almo_sem" name="hrs_almo_sem">
		<option value="não trabalha" <?php echo $hrs_almo_sem=='não trabalha'?'selected':'';?> >Não trabalhado</option>
		<option value="sem pausa para descanso" <?php echo $hrs_almo_sem=='sem pausa para descanso'?'selected':'';?> >Não tem</option>
		<option value="00h30m" <?php echo $hrs_almo_sem=='00h30m'?'selected':'';?> >30 minutos</option> 
		<option value="01h00m" <?php echo $hrs_almo_sem=='01h00m'?'selected':'';?> >1 hora</option> 
		<option value="01h30m" <?php echo $hrs_almo_sem=='01h30m'?'selected':'';?> >1 hora e 30 minutos</option> 
		<option value="02h00m" <?php echo $hrs_almo_sem=='02h00m'?'selected':'';?> >2 horas</option> 
		<option value="02h30m" <?php echo $hrs_almo_sem=='02h30m'?'selected':'';?> >2 horas e 30 minutos</option> 
                </select>
                <label for="text">Sexta-Feira</label><!--option fazer-->
                <select type="text" class="form-control" id="hrs_almo_sex" name="hrs_almo_sex">
		<option value="não trabalha" <?php echo $hrs_almo_sex=='não trabalha'?'selected':'';?> >Não trabalhado</option>
		<option value="sem pausa para descanso" <?php echo $hrs_almo_sex=='sem pausa para descanso'?'selected':'';?> >Não tem</option>
		<option value="00h30m" <?php echo $hrs_almo_sex=='00h30m'?'selected':'';?> >30 minutos</option> 
		<option value="01h00m" <?php echo $hrs_almo_sex=='01h00m'?'selected':'';?> >1 hora</option> 
		<option value="01h30m" <?php echo $hrs_almo_sex=='01h30m'?'selected':'';?> >1 hora e 30 minutos</option> 
		<option value="02h00m" <?php echo $hrs_almo_sex=='02h00m'?'selected':'';?> >2 horas</option> 
		<option value="02h30m" <?php echo $hrs_almo_sex=='02h30m'?'selected':'';?> >2 horas e 30 minutos</option> 
                </select>
                <label for="text">Sábado</label><!--option fazer-->
                <select type="text" class="form-control" id="hrs_almo_sab" name="hrs_almo_sab">
		<option value="não trabalha" <?php echo $hrs_almo_sab=='não trabalha'?'selected':'';?> >Não trabalhado</option>
		<option value="sem pausa para descanso" <?php echo $hrs_almo_sab=='sem pausa para descanso'?'selected':'';?> >Não tem</option>
		<option value="00h30m" <?php echo $hrs_almo_sab=='00h30m'?'selected':'';?> >30 minutos</option> 
		<option value="01h00m" <?php echo $hrs_almo_sab=='01h00m'?'selected':'';?> >1 hora</option> 
		<option value="01h30m" <?php echo $hrs_almo_sab=='01h30m'?'selected':'';?> >1 hora e 30 minutos</option> 
		<option value="02h00m" <?php echo $hrs_almo_sab=='02h00m'?'selected':'';?> >2 horas</option> 
		<option value="02h30m" <?php echo $hrs_almo_sab=='02h30m'?'selected':'';?> >2 horas e 30 minutos</option> 
                </select>
                <label for="text">Domingo</label><!--option fazer-->
                <select type="text" class="form-control" id="hrs_almo_dom" name="hrs_almo_dom">
		<option value="não trabalha" <?php echo $hrs_almo_dom=='não trabalha'?'selected':'';?> >Não trabalhado</option>
		<option value="sem pausa para descanso" <?php echo $hrs_almo_dom=='sem pausa para descanso'?'selected':'';?> >Não tem</option>
		<option value="00h30m" <?php echo $hrs_almo_dom=='00h30m'?'selected':'';?> >30 minutos</option> 
		<option value="01h00m" <?php echo $hrs_almo_dom=='01h00m'?'selected':'';?> >1 hora</option> 
		<option value="01h30m" <?php echo $hrs_almo_dom=='01h30m'?'selected':'';?> >1 hora e 30 minutos</option> 
		<option value="02h00m" <?php echo $hrs_almo_dom=='02h00m'?'selected':'';?> >2 horas</option> 
		<option value="02h30m" <?php echo $hrs_almo_dom=='02h30m'?'selected':'';?> >2 horas e 30 minutos</option> 
                </select>
                                </div>
                                <div class="form-group col-md-6">
                <label for="text" style="color:#F76466"><small>Horas noturnas</small></label><br>
                <label for="text">Trabalhou anoite?</label>
                <select type="text" class="form-control" id="trab_noite" name="trab_noite">
                <option value="não" <?php echo $trab_noite=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $trab_noite=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="só trabalhou anoite" <?php echo $trab_noite=='só trabalhou anoite'?'selected':'';?> >---- SEMPRE ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario entrada noturno</label>
                <input type="time" class="form-control" id="noite_ent" name="noite_ent" value="<?php print $noite_ent ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario saida</label>
                <input type="time" class="form-control" id="noite_exit" name="noite_exit" value="<?php print $noite_exit ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Horario intervalo</label>
                <select type="text" class="form-control" id="noite_almo" name="noite_almo">
		<option value="não trabalha" <?php echo $noite_almo=='não trabalha'?'selected':'';?> >Não trabalhado</option>
		<option value="sem pausa para descanso" <?php echo $noite_almo=='sem pausa para descanso'?'selected':'';?> >Não tem</option>
		<option value="00h30m" <?php echo $noite_almo=='00h30m'?'selected':'';?> >30 minutos</option> 
		<option value="01h00m" <?php echo $noite_almo=='01h00m'?'selected':'';?> >1 hora</option> 
		<option value="01h30m" <?php echo $noite_almo=='01h30m'?'selected':'';?> >1 hora e 30 minutos</option> 
		<option value="02h00m" <?php echo $noite_almo=='02h00m'?'selected':'';?> >2 horas</option> 
		<option value="02h30m" <?php echo $noite_almo=='02h30m'?'selected':'';?> >2 horas e 30 minutos</option> 
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu Adc.noturno</label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se a reclamada pagou os adicionais noturnos.">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
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
<script>
$(document).ready(function() {

    $("#nao_r_adc_n").click(function (){
                // desabilita o campo 
		$("#adc_noite_vl").prop("disabled",  false);
		$("#div_adc_noite_vl").prop("hidden",  false);
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
                                <div class="form-group col-md-4 has-error" id="div_adc_noite_vl">
                <label for="text">Recebeu adicional noturno?</label>
                                <input type="text" id="recebeu_adc_noite" name="recebeu_adc_noite" class="form-control" value="<?php print $recebeu_adc_noite ?>" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_adc_noite_vl">
                <label for="text">Valor adicional noturno</label>
    <input type="text" class="form-control" id="adc_noite_vl" name="adc_noite_vl" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $adc_noite_vl ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Adicional noturno%</label>
                <select type="text" class="form-control" id="adc_noite_porc" name="adc_noite_porc">
                <option value="0" <?php echo $adc_noite_porc=='0'?'selected':'';?> >selecionar</option>
                <option value="20" <?php echo $adc_noite_porc=='20'?'selected':'';?> >20%</option>
                <option value="25" <?php echo $adc_noite_porc=='25'?'selected':'';?> >25%</option>
                <option value="30" <?php echo $adc_noite_porc=='30'?'selected':'';?> >30%</option>
                <option value="35" <?php echo $adc_noite_porc=='35'?'selected':'';?> >35%</option>
                <option value="40" <?php echo $adc_noite_porc=='40'?'selected':'';?> >40%</option>
                <option value="45" <?php echo $adc_noite_porc=='45'?'selected':'';?> >45%</option>
                <option value="50" <?php echo $adc_noite_porc=='50'?'selected':'';?> >50%</option>
                <option value="55" <?php echo $adc_noite_porc=='55'?'selected':'';?> >55%</option>
                <option value="60" <?php echo $adc_noite_porc=='60'?'selected':'';?> >60%</option>
                <option value="65" <?php echo $adc_noite_porc=='65'?'selected':'';?> >65%</option>
                <option value="70" <?php echo $adc_noite_porc=='70'?'selected':'';?> >70%</option>
                <option value="75" <?php echo $adc_noite_porc=='75'?'selected':'';?> >75%</option>
                <option value="80" <?php echo $adc_noite_porc=='80'?'selected':'';?> >80%</option>
                <option value="85" <?php echo $adc_noite_porc=='85'?'selected':'';?> >85%</option>
                <option value="90" <?php echo $adc_noite_porc=='90'?'selected':'';?> >90%</option>
                <option value="95" <?php echo $adc_noite_porc=='95'?'selected':'';?> >95%</option>
                <option value="100" <?php echo $adc_noite_porc=='100'?'selected':'';?> >100%</option>
                </select>
                                </div>
                                <div class="form-group col-md-7">
                <label for="text" style="color:#F76466"><small>Recebia horas extra?</small></label><br>
                <label for="text">Recebia horas extra?</label>
                <select type="text" class="form-control" id="ext_pago" name="ext_pago">
                <option value="não" <?php echo $ext_pago=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $ext_pago=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="parcial" <?php echo $ext_pago=='parcial'?'selected':'';?> >---- PARCIAL ----</option>
                </select>
                                <div class="col-md-3">
                <label for="text">Extra na entrada</label>
                <input type="time" class="form-control" id="hrs_ext_antes" name="hrs_ext_antes" value="<?php print $hrs_ext_antes ?>">
                                </div>
                                <div class="col-md-3">
                <label for="text">Extra na saida</label>
                <input type="time" class="form-control" id="hrs_ext_apos" name="hrs_ext_apos" value="<?php print $hrs_ext_apos ?>">
                                </div>
                                <div class="col-md-6"><!--option fazzer-->
                <label for="text">Média de horas extras feita</label>
                <select type="text" class="form-control" id="hrs_ext_media" name="hrs_ext_media">
                <option value="não_fazia" <?php echo $hrs_ext_media=='não_fazia'?'selected':'';?> >selecionar</option>
                <option value="1x7 semana" <?php echo $hrs_ext_media=='1x7 semana'?'selected':'';?> >Uma vez na semana</option>
                <option value="2x7 semana" <?php echo $hrs_ext_media=='2x7 semana'?'selected':'';?> >Duas vezes na semana</option>
                <option value="3x7 semana" <?php echo $hrs_ext_media=='3x7 semana'?'selected':'';?> >Três vezes na semana</option>
                <option value="4x7 semana" <?php echo $hrs_ext_media=='4x7 semana'?'selected':'';?> >Quatro vezes na semana</option>
                <option value="5x7 semana" <?php echo $hrs_ext_media=='5x7 semana'?'selected':'';?> >Cinco vezes na semana</option>
                <option value="6x7 semana" <?php echo $hrs_ext_media=='6x7 semana'?'selected':'';?> >Seis Vezes na semana</option>
                <option value="todo dia" <?php echo $hrs_ext_media=='todo dia'?'selected':'';?> >Todos os dias da semana</option>
                <option value="1 x mês" <?php echo $hrs_ext_media=='1 x mês'?'selected':'';?> >Uma vez no mês</option>
                <option value="2 x mês" <?php echo $hrs_ext_media=='2 x mês'?'selected':'';?> >Duas vezes no mês</option>
                <option value="3 x mês" <?php echo $hrs_ext_media=='3 x mês'?'selected':'';?> >Três vezes no mês</option>
                <option value="4 x mês" <?php echo $hrs_ext_media=='4 x mês'?'selected':'';?> >Quatro Vezes no mês</option>
                <option value="muito pouca" <?php echo $hrs_ext_media=='muito pouca'?'selected':'';?> >Muito pouca</option>
                <option value="fazia poucas" <?php echo $hrs_ext_media=='fazia poucas'?'selected':'';?> >Fazia poucas</option>
                <option value="algumas vezes" <?php echo $hrs_ext_media=='algumas vezes'?'selected':'';?> >Algumas vezes</option>
                <option value="fazia muitas" <?php echo $hrs_ext_media=='fazia muitas'?'selected':'';?> >Fazia muitas</option>
                <option value="fazia varias" <?php echo $hrs_ext_media=='fazia varias'?'selected':'';?> >Fazia varias</option>
                <option value="fazia todo dia" <?php echo $hrs_ext_media=='fazia todo dia'?'selected':'';?> >Fazia todos os dias</option>
                </select>
                                </div>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Semanal Porcentual</label>
                <select type="text" class="form-control" id="ext_porcento" name="ext_porcento">
                <option value="0" <?php echo $ext_porcento=='0'?'selected':'';?> >selecionar</option>
                <option value="50" <?php echo $ext_porcento=='50'?'selected':'';?> >50%</option>
                <option value="60" <?php echo $ext_porcento=='60'?'selected':'';?> >60%</option>
                <option value="70" <?php echo $ext_porcento=='70'?'selected':'';?> >70%</option>
                <option value="80" <?php echo $ext_porcento=='80'?'selected':'';?> >80%</option>
                <option value="90" <?php echo $ext_porcento=='90'?'selected':'';?> >90%</option>
                <option value="100" <?php echo $ext_porcento=='100'?'selected':'';?> >100%</option>
                </select>
                                </div>
                              	<div class="form-group col-md-2">
                                <br>
                <label for="text">Sábado porcentual</label>
                <select type="text" class="form-control" id="sab_ext_porc" name="sab_ext_porc">
                <option value="0" <?php echo $sab_ext_porc=='0'?'selected':'';?> >selecionar</option>
                <option value="50" <?php echo $sab_ext_porc=='50'?'selected':'';?> >50%</option>
                <option value="60" <?php echo $sab_ext_porc=='60'?'selected':'';?> >60%</option>
                <option value="70" <?php echo $sab_ext_porc=='70'?'selected':'';?> >70%</option>
                <option value="80" <?php echo $sab_ext_porc=='80'?'selected':'';?> >80%</option>
                <option value="90" <?php echo $sab_ext_porc=='90'?'selected':'';?> >90%</option>
                <option value="100" <?php echo $sab_ext_porc=='100'?'selected':'';?> >100%</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Domingo Porcentual</label>
                <select type="text" class="form-control" id="dom_ext_porc" name="dom_ext_porc">
                <option value="0" <?php echo $dom_ext_porc=='0'?'selected':'';?> >selecionar</option>
                <option value="50" <?php echo $dom_ext_porc=='50'?'selected':'';?> >50%</option>
                <option value="60" <?php echo $dom_ext_porc=='60'?'selected':'';?> >60%</option>
                <option value="70" <?php echo $dom_ext_porc=='70'?'selected':'';?> >70%</option>
                <option value="80" <?php echo $dom_ext_porc=='80'?'selected':'';?> >80%</option>
                <option value="90" <?php echo $dom_ext_porc=='90'?'selected':'';?> >90%</option>
                <option value="100" <?php echo $dom_ext_porc=='100'?'selected':'';?> >100%</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                                <br>
                <label for="text">Escala de trabalho <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Escolha a escala de trabalho com base em dias trabalhados no mês"></span></label>
                <select type="text" class="form-control" id="escala_trab" name="escala_trab">
		<option value="" <?php echo $escala_trab==''?'selected':'';?> >selecionar</option>
		<option value="24" <?php echo $escala_trab=='24'?'selected':'';?> >5x1 ou 6x1 - 24 dias mês</option>
		<option value="20" <?php echo $escala_trab=='20'?'selected':'';?> >5x2 - 20 dias mês</option> 
		<option value="15" <?php echo $escala_trab=='15'?'selected':'';?> >12x36 ou 18x32 - 15 dias mês</option> 
		<option value="12" <?php echo $escala_trab=='12'?'selected':'';?> >24x48 - 12 dias mês</option> 
                </select>
                                </div>
</div>
<div class="tab-pane fade" id="aba4">                       
                                <div class="form-group col-md-2">
                <label for="text">Recebeu VT</label>
                <select type="text" class="form-control" id="receb_VT" name="receb_VT">
                <option value="" <?php echo $receb_VT==''?'selected':'';?> >selecionar</option>
                <option value="não" <?php echo $receb_VT=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $receb_VT=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="parcial" <?php echo $receb_VT=='parcial'?'selected':'';?> >---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VT: valor diario</label>
                <input type="text" class="form-control" id="VT_valor" name="VT_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $VT_valor ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu C.Basica</label>
                <select type="text" class="form-control" id="cesta_basica" name="cesta_basica">
                <option value="" <?php echo $cesta_basica==''?'selected':'';?> >selecionar</option>
                <option value="não" <?php echo $cesta_basica=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $cesta_basica=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="parcial" <?php echo $cesta_basica=='parcial'?'selected':'';?> >---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Cesta basica: mês</label>
<input type="text" class="form-control" id="cesta_valor" name="cesta_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $cesta_valor ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu VR</label>
                <select type="text" class="form-control" id="recebe_VR" name="recebe_VR">
                <option value="" <?php echo $recebe_VR==''?'selected':'';?> >selecionar</option>
                <option value="não" <?php echo $recebe_VR=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $recebe_VR=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="parcial" <?php echo $recebe_VR=='parcial'?'selected':'';?> >---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">VR: valor diario</label>
                <input type="text" class="form-control" id="VR_valor" name="VR_valor" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $VR_valor ?>">
                                </div>
                                <div class="form-group col-md-2">
				<label for="text" class="transparente"><small>Recebeu 13º</small></label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se o reclamante recebeu os décimos 13º salários dos ultimos anos trabalhados.">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                Pagamento 13º Salário
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
                                <li><a id="13_sim" href="#aba2">Foi pago</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="13_nao" href="#aba2">Não foi pago</a></li>
                                <li><a id="13_part" href="#aba2">Pago parcialmente</a></li>
                                </ul>
                                </div>
<script>
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
		$("#13_descdiv").prop("hidden", false);
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
                                <div id="13_descdiv">
                                <div class="form-group col-md-3 has-error">
								<label for="text"><small>Recebeu 13º</small></label>
                <input type="text" class="form-control" id="receb_dec" name="receb_dec" value="<?php print $receb_dec ?>" readonly>
								</div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data" name="dec_data" value="<?php print $dec_data ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data2" name="dec_data2" value="<?php print $dec_data2 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data3" name="dec_data3" value="<?php print $dec_data3 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data4" name="dec_data4" value="<?php print $dec_data4 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text"><small>13º irregular|mês &amp; ano</small></label>
                <input type="month" class="form-control" id="dec_data5" name="dec_data5" value="<?php print $dec_data5 ?>">
                                </div>
                                </div>
                                <div class="form-group col-md-2">
								<label for="text" class="transparente"><small>Gozou férias</small></label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="bottom" title="Informe se o reclamante recebeu as ferias no periodo de trabalho.">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                Periodo de Férias
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
<script type="text/javascript">
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
		$("#feriasdiv").prop("hidden", false);
			$('#tev_ferias').each(function () {
			$(this).val("Não gozou férias!");
			});
	});
    
    $("#ferias_sim").click(function (){
                // desabilita o campo 
		$("#ferias_quant").prop("disabled",  false);
		$("#trab_ferias").prop("disabled", false);
		$("#perio_ferias").prop("disabled", false);
		$("#feriasdiv").prop("hidden", false);
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
                                <div id="feriasdiv"> 
                                <div class="form-group col-md-3 has-error">
                                <label for="text"><small>Gozou férias</small></label>
                                <input type="text" class="form-control" id="tev_ferias" name="tev_ferias" value="<?php print $tev_ferias ?>" readonly>
                                </div>  
                                <div class="form-group col-md-3"><!-- option fazer-->
                                <label for="text"><small>Pedir quantas férias</small></label>
                                <select type="text" class="form-control" id="ferias_quant" name="ferias_quant">
	<option value="não selecionado" <?php echo $ferias_quant=='não selecionado'?'selected':'';?> >selecionar</option>
	<option value="proporcional" <?php echo $ferias_quant=='proporcional'?'selected':'';?> >mês proporcional</option>
	<option value="1" <?php echo $ferias_quant=='1'?'selected':'';?> >Uma férias</option>
	<option value="1+proporcional" <?php echo $ferias_quant=='1+proporcional'?'selected':'';?> >Uma férias + proporcional</option>
	<option value="2" <?php echo $ferias_quant=='2'?'selected':'';?> >Duas férias</option>
	<option value="2+proporcionais" <?php echo $ferias_quant=='2+proporcionais'?'selected':'';?> >Duas férias + proporcionais</option>
	<option value="3" <?php echo $ferias_quant==''?'selected':'3';?> >Três férias</option>
	<option value="3+proporcionais" <?php echo $ferias_quant=='3+proporcionais'?'selected':'';?> >Três férias + proporcionais</option>
	<option value="4" <?php echo $ferias_quant==''?'selected':'4';?> >Quatro férias</option>
	<option value="4+proporcionais" <?php echo $ferias_quant=='4+proporcionais'?'selected':'';?> >Quatro férias + proporcionais</option>
	<option value="5" <?php echo $ferias_quant=='5'?'selected':'';?> >Cinco férias</option>
	<option value="todas as férias" <?php echo $ferias_quant=='todas as férias'?'selected':'';?> >Todas as férias permitidas</option>
                                </select>
                                </div>
                                <div class="form-group col-md-2"><!-- option fazer -->
                                <label for="text"><small>Trabalhou nas férias</small></label>
                                <select type="text" class="form-control" id="trab_ferias" name="trab_ferias">
                                <option value="não" <?php echo $trab_ferias=='não'?'selected':'';?> >---- NÃO ----</option>
                                <option value="sim" <?php echo $trab_ferias=='sim'?'selected':'';?> >---- SIM ----</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="text"><small>Periodo de férias trabalhadas</small></label>
                                <input type="text" class="form-control" id="perio_ferias" name="perio_ferias" value="<?php print $perio_ferias ?>">
                                </div>
                                </div>  
                                <div class="form-group col-md-2">
                <label for="text">Recebeu Holerites</label>
                <select type="text" class="form-control" id="receb_holerith" name="receb_holerith">
                <option value="" <?php echo $receb_holerith==''?'selected':'';?> >selecionar</option>
                <option value="não" <?php echo $receb_holerith=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $receb_holerith=='sim'?'selected':'';?> >---- SIM ----</option>
                <option value="parcial" <?php echo $receb_holerith=='parcial'?'selected':'';?> >---- PARCIAL ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">PLR: valor anual</label>
                <input type="text" class="form-control" id="plr_valor" name="plr_valor" onkeypress="return(MascaraMoeda(this,'','.',event))" value="<?php print $plr_valor ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Recebeu FGTS</label>
                <select type="text" class="form-control" id="g_fgts" name="g_fgts">
                <option value="não" <?php echo $g_fgts=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim"<?php echo $g_fgts=='sim'?'selected':'';?>>---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Seguro-desemprego</label>
                <select type="text" class="form-control" id="g_sd" name="g_sd">
                <option value="não" <?php echo $g_sd=='não'?'selected':'';?> >---- NÃO ----</option>
                <option value="sim" <?php echo $g_sd=='sim'?'selected':'';?> >---- SIM ----</option>
                </select>
                                </div>
                                <div class="form-group col-md-2">
                <label for="text" class="transparente">Filho menor</label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="left" title="Informe se o reclamante possui filhos com 14 anos ou idade inferior.">
                                <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">
                                Filho menor de 14 anos
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
                                <div class="form-group col-md-2 has-error">
                <label for="text">Filho de 14 anos menos</label>
                <input type="text" class="form-control" id="filho_14" name="filho_14" value="<?php print $filho_14 ?>" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_salario_familia">
                <label for="text" class="transparente">S.familia</label>
                                <div class="btn-group dropup" data-toggle="tooltip" data-placement="left" title="Informe se o reclamante recebia salário familia.">
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
                <input type="text" class="form-control" id="rec_sal_fam" name="rec_sal_fam" value="<?php print $rec_sal_fam ?>" readonly>
                                </div>
                                <div class="form-group col-md-2" id="div_salariofm_vlmes">
                <label for="text">Valor S.Familia <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Informar o valor da tabela ou o valor que a reclamante pagou cada mês!"></span> <span id="vl_salariof_info" class="glyphicon glyphicon-info-sign" aria-hidden="true" onClick="abrirpopup('http://www.guiatrabalhista.com.br/guia/salario_familia.htm');" data-toggle="tooltip" data-placement="top" title="Clique e verifique o valor mensal do benêficio"></span></label>
                <input type="text" class="form-control" id="salario_fam" name="salario_fam" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $salario_fam ?>">
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
<div class="tab-pane fade" id="aba5">
                                <div class="form-group col-md-12">
                                <label for="text" style="color:#F76466;">
                                <small>Escolha a quantidade de paradigmas: MAX. 0-5</small>
                                </label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="paradigma_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!" disabled>
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="paradigma_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um paradigma" disabled>
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
    </button>
    <button type="button" id="paradigma_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois paradigmas" disabled>
    							<span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="paradigma_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três paradigmas" disabled>
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span>
    </button>
    <button type="button" id="paradigma_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro paradigmas" disabled>
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span></span>
    </button>
    <button type="button" id="paradigma_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco paradigmas" disabled>
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></span></span></span></span>
    </button>
                                </div>
                                </div>
                                <div id="all_paradigmas">
            <div id="paradigma_name1"> <!-- div paradigma um -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Primeiro paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_1" name="p_nome_1" value="<?php print $p_nome_1 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_1" name="p_salario_1" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $p_salario_1 ?>">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_1" name="p_cargo_1" value="<?php print $p_cargo_1 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_1" name="p_inicio_1" value="<?php print $p_inicio_1 ?>">
                                </div>
                                <div class="form-group col-md-2"><!-- option fazer-->
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_1" name="p_tempo_1">
                	<option value="-6 meses" <?php echo $p_tempo_1=='-6 meses'?'selected':'';?> >menos de 6 mês</option>
                	<option value="6 meses" <?php echo $p_tempo_1=='6 meses'?'selected':'';?> >6 mês</option>
                	<option value="1 ano" <?php echo $p_tempo_1=='1 ano'?'selected':'';?> >1 ano</option>
                	<option value="1 ano e 6 mês" <?php echo $p_tempo_1=='1 ano e 6 mês'?'selected':'';?> >1 ano e 6 mês</option>
                	<option value="2 anos" <?php echo $p_tempo_1=='2 anos'?'selected':'';?> >2 anos</option>
                	<option value="2 anos e 6 mês" <?php echo $p_tempo_1=='2 anos e 6 mês'?'selected':'';?> >2 anos e 6 mês</option>
                	<option value="3 anos" <?php echo $p_tempo_1=='3 anos'?'selected':'';?> >3 anos</option>
                	<option value="4 anos" <?php echo $p_tempo_1=='4 anos"'?'selected':'';?> >4 anos</option>
                	<option value="5 anos ou mais" <?php echo $p_tempo_1=='5 anos ou mais'?'selected':'';?> >5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma um -->
            <div id="paradigma_name2"> <!-- div paradigma dois -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Segunda paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_2" name="p_nome_2" value="<?php print $p_nome_2 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_2" name="p_salario_2" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $p_salario_2 ?>">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_2" name="p_cargo_2" value="<?php print $p_cargo_2 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_2" name="p_inicio_2" value="<?php print $p_inicio_2 ?>">
                                </div>
                                <div class="form-group col-md-2"><!--option fazer-->
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_2" name="p_tempo_2">
                	<option value="-6 meses" <?php echo $p_tempo_2=='-6 meses'?'selected':'';?> >menos de 6 mês</option>
                	<option value="6 meses" <?php echo $p_tempo_2=='6 meses'?'selected':'';?> >6 mês</option>
                	<option value="1 ano" <?php echo $p_tempo_2=='1 ano'?'selected':'';?> >1 ano</option>
                	<option value="1 ano e 6 mês" <?php echo $p_tempo_2=='1 ano e 6 mês'?'selected':'';?> >1 ano e 6 mês</option>
                	<option value="2 anos" <?php echo $p_tempo_2=='2 anos'?'selected':'';?> >2 anos</option>
                	<option value="2 anos e 6 mês" <?php echo $p_tempo_2=='2 anos e 6 mês'?'selected':'';?> >2 anos e 6 mês</option>
                	<option value="3 anos" <?php echo $p_tempo_2=='3 anos'?'selected':'';?> >3 anos</option>
                	<option value="4 anos" <?php echo $p_tempo_2=='4 anos"'?'selected':'';?> >4 anos</option>
                	<option value="5 anos ou mais" <?php echo $p_tempo_2=='5 anos ou mais'?'selected':'';?> >5 anos ou mais</option>2
                </select>
                                </div>
            </div> <!-- fecha paradigma dois -->
            <div id="paradigma_name3"> <!-- div paradigma três-->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Terceira paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_3" name="p_nome_3" value="<?php print $p_nome_3 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_3" name="p_salario_3"  onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $p_salario_3 ?>">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_3" name="p_cargo_3" value="<?php print $p_cargo_3 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_3" name="p_inicio_3" value="<?php print $p_inicio_3 ?>">
                                </div>
                                <div class="form-group col-md-2"><!-- option fazer-->
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_3" name="p_tempo_3">
                	<option value="-6 meses" <?php echo $p_tempo_3=='-6 meses'?'selected':'';?> >menos de 6 mês</option>
                	<option value="6 meses" <?php echo $p_tempo_3=='6 meses'?'selected':'';?> >6 mês</option>
                	<option value="1 ano" <?php echo $p_tempo_3=='1 ano'?'selected':'';?> >1 ano</option>
                	<option value="1 ano e 6 mês" <?php echo $p_tempo_3=='1 ano e 6 mês'?'selected':'';?> >1 ano e 6 mês</option>
                	<option value="2 anos" <?php echo $p_tempo_3=='2 anos'?'selected':'';?> >2 anos</option>
                	<option value="2 anos e 6 mês" <?php echo $p_tempo_3=='2 anos e 6 mês'?'selected':'';?> >2 anos e 6 mês</option>
                	<option value="3 anos" <?php echo $p_tempo_3=='3 anos'?'selected':'';?> >3 anos</option>
                	<option value="4 anos" <?php echo $p_tempo_3=='4 anos"'?'selected':'';?> >4 anos</option>
                	<option value="5 anos ou mais" <?php echo $p_tempo_3=='5 anos ou mais'?'selected':'';?> >5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma três -->
            <div id="paradigma_name4"> <!-- div paradigma quatro -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quarta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_4" name="p_nome_4" value="<?php print $p_nome_4 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_4" name="p_salario_4" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $p_salario_4 ?>">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_4" name="p_cargo_4" value="<?php print $p_cargo_4 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_4" name="p_inicio_4" value="<?php print $p_inicio_4 ?>">
                                </div>
                                <div class="form-group col-md-2"><!-- option fazer-->
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_4" name="p_tempo_4">
                	<option value="-6 meses" <?php echo $p_tempo_4=='-6 meses'?'selected':'';?> >menos de 6 mês</option>
                	<option value="6 meses" <?php echo $p_tempo_4=='6 meses'?'selected':'';?> >6 mês</option>
                	<option value="1 ano" <?php echo $p_tempo_4=='1 ano'?'selected':'';?> >1 ano</option>
                	<option value="1 ano e 6 mês" <?php echo $p_tempo_4=='1 ano e 6 mês'?'selected':'';?> >1 ano e 6 mês</option>
                	<option value="2 anos" <?php echo $p_tempo_4=='2 anos'?'selected':'';?> >2 anos</option>
                	<option value="2 anos e 6 mês" <?php echo $p_tempo_4=='2 anos e 6 mês'?'selected':'';?> >2 anos e 6 mês</option>
                	<option value="3 anos" <?php echo $p_tempo_4=='3 anos'?'selected':'';?> >3 anos</option>
                	<option value="4 anos" <?php echo $p_tempo_4=='4 anos"'?'selected':'';?> >4 anos</option>
                	<option value="5 anos ou mais" <?php echo $p_tempo_4=='5 anos ou mais'?'selected':'';?> >5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma quatro -->
            <div id="paradigma_name5"> <!-- div paradigma cinco -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quinta paradgma :</small></label>
              <label for="text">nome completo</label>
                <input type="text" class="form-control" id="p_nome_5" name="p_nome_5" value="<?php print $p_nome_5 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Salario</label>
                <input type="text" class="form-control" id="p_salario_5" name="p_salario_5" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $p_salario_5 ?>">
                                </div>
                                <div class="form-group col-md-3">
                <label for="text">cargo do paradigma</label>
                <input type="text" class="form-control" id="p_cargo_5" name="p_cargo_5" value="<?php print $p_cargo_5 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">inicio da função</label>
                <input type="text" class="form-control" id="p_inicio_5" name="p_inicio_5" value="<?php print $p_inicio_5 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">tempo trabalhando</label>
                <select type="text" class="form-control" id="p_tempo_5" name="p_tempo_5">
                	<option value="-6 meses" <?php echo $p_tempo_5=='-6 meses'?'selected':'';?> >menos de 6 mês</option>
                	<option value="6 meses" <?php echo $p_tempo_5=='6 meses'?'selected':'';?> >6 mês</option>
                	<option value="1 ano" <?php echo $p_tempo_5=='1 ano'?'selected':'';?> >1 ano</option>
                	<option value="1 ano e 6 mês" <?php echo $p_tempo_5=='1 ano e 6 mês'?'selected':'';?> >1 ano e 6 mês</option>
                	<option value="2 anos" <?php echo $p_tempo_5=='2 anos'?'selected':'';?> >2 anos</option>
                	<option value="2 anos e 6 mês" <?php echo $p_tempo_5=='2 anos e 6 mês'?'selected':'';?> >2 anos e 6 mês</option>
                	<option value="3 anos" <?php echo $p_tempo_5=='3 anos'?'selected':'';?> >3 anos</option>
                	<option value="4 anos" <?php echo $p_tempo_5=='4 anos"'?'selected':'';?> >4 anos</option>
                	<option value="5 anos ou mais" <?php echo $p_tempo_5=='5 anos ou mais'?'selected':'';?> >5 anos ou mais</option>
                </select>
                                </div>
            </div> <!-- fecha paradigma cinco -->
            					</div>
     <script type="text/javascript">
$(document).ready(function() {

    $("#paradigma_none").click(function (){
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

    $("#paradigma_1").click(function (){
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
	
    $("#paradigma_2").click(function (){
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
	
    $("#paradigma_3").click(function (){
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
	
    $("#paradigma_4").click(function (){
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
    <button type="button" id="funcaodesv_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!" disabled>
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="funcaodesv_1" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas um desvio de função" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
    </button>
    <button type="button" id="funcaodesv_2" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas dois desvio de função" disabled>
    							<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="funcaodesv_3" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três desvio de função" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span>
    </button>
    <button type="button" id="funcaodesv_4" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Quatro desvio de função" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span>
    </button>
    <button type="button" id="funcaodesv_5" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Cinco desvio de função" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span></span></span>
    </button>
                                </div>
                                </div>
                                <div id="all_funcaodesv">
            <div id="funcaodesv_name1"> <!-- div desvio de função um -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Primeiro desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_1" name="desvio_cargo_1" value="<?php print $desvio_cargo_1 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_1" name="desvio_salario_1" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $desvio_salario_1 ?>">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_1" name="desvio_divoff_1" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_1" name="desvio_datainicio_1" value="<?php print $desvio_datainicio_1 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_1" name="desvio_datafim_1" value="<?php print $desvio_datafim_1 ?>">
                                </div>
            </div> <!-- fecha função um -->
            <div id="funcaodesv_name2"> <!-- div desvio de função dois -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Segundo desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_2" name="desvio_cargo_2" value="<?php print $desvio_cargo_2 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_2" name="desvio_salario_2" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $desvio_salario_2 ?>">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_2" name="desvio_divoff_2" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_2" name="desvio_datainicio_2" value="<?php print $desvio_datainicio_2 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_2" name="desvio_datafim_2" value="<?php print $desvio_datafim_2 ?>">
                                </div>
            </div> <!-- fecha função dois -->
            <div id="funcaodesv_name3"> <!-- div desvio de função três-->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Terceiro desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_3" name="desvio_cargo_3" value="<?php print $desvio_cargo_3 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_3" name="desvio_salario_3" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $desvio_salario_3 ?>">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_3" name="desvio_divoff_3" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_3" name="desvio_datainicio_3" value="<?php print $desvio_datainicio_3 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_3" name="desvio_datafim_3" value="<?php print $desvio_datafim_3 ?>">
                                </div>
            </div> <!-- fecha função três -->
            <div id="funcaodesv_name4"> <!-- div desvio de função quatro -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quarto desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_4" name="desvio_cargo_4" value="<?php print $desvio_cargo_4 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_4" name="desvio_salario_4" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $desvio_salario_4 ?>">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_4" name="desvio_divoff_4" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_4" name="desvio_datainicio_4" value="<?php print $desvio_datainicio_4 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_4" name="desvio_datafim_4" value="<?php print $desvio_datafim_4 ?>">
                                </div>
            </div> <!-- fecha função quatro -->
            <div id="funcaodesv_name5"> <!-- div desvio de função cinco -->
                                <div class="form-group col-md-3">
              <label for="text" style="color:#F76466;"><small>Quinto desvio :</small></label>
              <label for="text">Cargo desviado</label>
                <input type="text" class="form-control" id="desvio_cargo_5" name="desvio_cargo_5" value="<?php print $desvio_cargo_5 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Piso salarial</label>
                <input type="text" class="form-control" id="desvio_salario_5" name="desvio_salario_5" onKeyPress="return(MascaraMoeda(this,'','.',event))" value="<?php print $desvio_salario_5 ?>">
                                </div>
                                <div class="form-group col-md-3 transparente">
                <label for="text">div disabled</label>
                <input type="text" class="form-control" id="desvio_divoff_5" name="desvio_divoff_5" disabled="true">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data inicio na função</label>
                <input type="date" class="form-control" id="desvio_datainicio_5" name="desvio_datainicio_5" value="<?php print $desvio_datainicio_5 ?>">
                                </div>
                                <div class="form-group col-md-2">
                <label for="text">Data fim da função</label>
                <input type="date" class="form-control" id="desvio_datafim_5" name="desvio_datafim_5" value="<?php print $desvio_datafim_5 ?>">
                                </div>
            </div> <!-- fecha função cinco -->
            					</div>
     <script type="text/javascript">
$(document).ready(function() {

    $("#funcaodesv_none").click(function (){
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

    $("#funcaodesv_1").click(function (){
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
	
    $("#funcaodesv_2").click(function (){
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
	
    $("#funcaodesv_3").click(function (){
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
	
    $("#funcaodesv_4").click(function (){
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
    <textarea class="form-control" id="insalubre" name="insalubre" rows="2" maxlength="60" placeholder="Digite sua observação insalubre em até 60 caracteres..."><?php print $insalubre ?></textarea>
                                </div>
                                <div class="form-group col-md-6" id="text_obs_periculoso">
                <label for="text">Periculosidade:  <span style="color:#F76466;">Max:. <span id="counts_txt_periculoso">&nbsp;</span></span></label>
    <textarea class="form-control" id="periculoso" name="periculoso" rows="2" maxlength="60"  placeholder="Digite sua observação periculosa em até 60 caracteres..."><?php print $periculoso ?></textarea>
                                </div>
                                <div class="form-group col-md-12" id="text_obs_adv">
                <label for="text">Observações do Advogado: <span style="color:#F76466;">Max:. <span id="counts_txt_obs_adv">&nbsp;</span></span></label>
    <textarea class="form-control" id="obs_adv" name="obs_adv" rows="5" maxlength="1000" placeholder="Digite sua observação resumida em até 1000 caracteres..."><?php print $obs_adv ?></textarea>
                                </div>
    <script type="text/javascript">
var textobsadv = new Spry.Widget.ValidationTextarea("text_obs_adv", {maxChars:1000,counterType:"chars_remaining",counterId:"counts_txt_obs_adv", isRequired:false});
var textinsalubre = new Spry.Widget.ValidationTextarea("text_obs_insalubre", {maxChars:60,counterType:"chars_remaining",counterId:"counts_txt_insalubre", isRequired:false});
var textpericuloso = new Spry.Widget.ValidationTextarea("text_obs_periculoso", {maxChars:60,counterType:"chars_remaining",counterId:"counts_txt_periculoso", isRequired:false});
	</script>                            
</div>
<div class="tab-pane fade" id="aba8">
<div class="form-group col-md-12"> 
	<label for="text" style="color:#F76466;">
			<small>Escolha a quantidade de outras reclamada que será incluida no processo! MAX.: 3</small>
	</label>
                                <br>
                                <div class="btn-group" data-toggle="buttons-radio">
    <button type="button" id="reclamadas_none" class="btn btn-danger active" data-toggle="tooltip" data-placement="top" title="Desativado!" disabled>
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </button>
    <button type="button" id="reclamadas_2" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Apenas uma outra reclamada" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
    </button>
    <button type="button" id="reclamadas_3" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Apenas duas outras reclamadas" disabled>
    							<span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span>
    </button>
    <button type="button" id="reclamadas_4" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Três outras outras reclamdas" disabled>
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true">
                                <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span></span></span>
    </button>
                                </div>
     <script type="text/javascript">
$(document).ready(function() {

    $("#reclamadas_none").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunda,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", false);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", false);
	});

    $("#reclamadas_2").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunda,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", false);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", false);
	});
	
    $("#reclamadas_3").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunda,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
		$("#terceira_reclamada").prop("hidden", false);
		$("#emp_terceira,#tipo_emp_terceira,#cnpj_terceira,#cep_terceira,#rua_emp_terceira,#num_emp_terceira,#bairro_emp_terceira,#city_emp_terceira,#uf_emp_terceira,#comp_emp_terceira").prop("disabled", false);
		
		$("#quarta_reclamada").prop("hidden", false);
		$("#emp_quarta,#tipo_emp_quarta,#cnpj_quarta,#cep_quarta,#rua_emp_quarta,#num_emp_quarta,#bairro_emp_quarta,#city_emp_quarta,#uf_emp_quarta,#comp_emp_quarta").prop("disabled", false);
	});
	
    $("#reclamadas_4").click(function (){
		$("#segunda_reclamada").prop("hidden", false);
		$("#emp_segunda,#tipo_emp_segunda,#cnpj_segunda,#cep_segunda,#rua_emp_segunda,#num_emp_segunda,#bairro_emp_segunda,#city_emp_segunda,#uf_emp_segunda,#comp_emp_segunda").prop("disabled", false);
		
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
<fieldset id="segunda_reclamada">
<br>
                <div class="form-group col-md-3">
                <label for="text" style="color:#F76466;"><small>Segunda reclamada :</small></label>
                <label for="titulo">Razão Social</label>
                <input type="text" class="form-control" id="emp_segunda" name="emp_segunda" value="<?php print $emp_segunda ?>">
                </div>
                <div class="form-group col-md-2"><!-- option fazer-->
                <label for="titulo">Tipo de empresa</label>
                <select type="text" class="form-control" id="tipo_emp_segunda" name="tipo_emp_segunda">
                <option value="juridica" <?php echo $p_tempo_5=='juridica'?'selected':'';?> >juridica</option>
                <option value="fisica" <?php echo $tipo_emp_segunda=='fisica'?'selected':'';?> >fisica</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CNPJ 02ª</label>
                <input type="text" class="form-control" id="cnpj_segunda" name="cnpj_segunda" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' value="<?php print $cnpj_segunda ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_segunda" name="cep_segunda" maxlength="9" OnKeyPress="formatar('#####-###', this)" value="<?php print $cep_segunda ?>">
                </div>
                <div class="form-group col-md-3">
                <label for="titulo">Logradoura</label>
                <input type="text" class="form-control" id="rua_emp_segunda" name="rua_emp_segunda" value="<?php print $rua_emp_segunda ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_segunda" name="num_emp_segunda" value="<?php print $num_emp_segunda ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_segunda" name="bairro_emp_segunda" value="<?php print $bairro_emp_segunda ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_segunda" name="city_emp_segunda" value="<?php print $city_emp_segunda ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_segunda" name="uf_emp_segunda" maxlength="2" value="<?php print $uf_emp_segunda ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_segunda" name="comp_emp_segunda" value="<?php print $comp_emp_segunda ?>">
                </div>
</fieldset> 
<br>               
<!-- Terceira reclamada -->
<fieldset id="terceira_reclamada">
                <div class="form-group col-md-3">
                <label for="text" style="color:#F76466;"><small>Terceira reclamada :</small></label>
                <label for="titulo">Razão Social</label>
                <input type="text" class="form-control" id="emp_terceira" name="emp_terceira" value="<?php print $emp_terceira ?>">
                </div>
                <div class="form-group col-md-2"><!--option fazer-->
                <label for="titulo">Tipo de empresa</label>
                <select type="text" class="form-control" id="tipo_emp_terceira" name="tipo_emp_terceira">
                <option value="juridica" <?php echo $tipo_emp_terceira=='juridica'?'selected':'';?> >juridica</option>
                <option value="fisica" <?php echo $tipo_emp_terceira=='fisica'?'selected':'';?> >fisica</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CNPJ 03ª</label>
                <input type="text" class="form-control" id="cnpj_terceira" name="cnpj_terceira" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' value="<?php print $cnpj_terceira ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_terceira" name="cep_terceira" maxlength="9" OnKeyPress="formatar('#####-###', this)" value="<?php print $cep_terceira ?>">
                </div>
                <div class="form-group col-md-3">
                <label for="titulo">Logradoura</label>
                <input type="text" class="form-control" id="rua_emp_terceira" name="rua_emp_terceira" value="<?php print $rua_emp_terceira ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_terceira" name="num_emp_terceira" value="<?php print $num_emp_terceira ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_terceira" name="bairro_emp_terceira" value="<?php print $bairro_emp_terceira ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_terceira" name="city_emp_terceira" value="<?php print $city_emp_terceira ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_terceira" name="uf_emp_terceira" maxlength="2" value="<?php print $uf_emp_terceira ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_terceira" name="comp_emp_terceira" value="<?php print $comp_emp_terceira ?>">
                </div>
</fieldset>
<br>                
<!-- Quarta Reclamada -->
<fieldset id="quarta_reclamada">
                <div class="form-group col-md-3">
                <label for="text" style="color:#F76466;"><small>Quarta reclamada :</small></label>
                <label for="titulo">Razão Social</label>
                <input type="text" class="form-control" id="emp_quarta" name="emp_quarta" value="<?php print $emp_quarta ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Tipo de empresa</label>
                <select type="text" class="form-control" id="tipo_emp_quarta" name="tipo_emp_quarta">
                <option value="juridica" <?php echo $tipo_emp_quarta=='juridica'?'selected':'';?> >juridica</option>
                <option value="fisica" <?php echo $tipo_emp_quarta=='fisica'?'selected':'';?> >fisica</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CNPJ 04ª</label>
                <input type="text" class="form-control" id="cnpj_quarta" name="cnpj_quarta" maxlength="17" onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' value="<?php print $cnpj_quarta ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">CEP</label>
                <input type="text" class="form-control" id="cep_quarta" name="cep_quarta" maxlength="9" OnKeyPress="formatar('#####-###', this)" value="<?php print $cep_quarta ?>">
                </div>
                <div class="form-group col-md-3">
                <label for="titulo">Logradoura</label>
                <input type="text" class="form-control" id="rua_emp_quarta" name="rua_emp_quarta" value="<?php print $rua_emp_quarta ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">Nº</label>
                <input type="text" class="form-control" id="num_emp_quarta" name="num_emp_quarta" value="<?php print $num_emp_quarta ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Bairro</label>
                <input type="text" class="form-control" id="bairro_emp_quarta" name="bairro_emp_quarta" value="<?php print $bairro_emp_quarta ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Cidade</label>
                <input type="text" class="form-control" id="city_emp_quarta" name="city_emp_quarta" value="<?php print $city_emp_quarta ?>">
                </div>
                <div class="form-group col-md-1">
                <label for="titulo">UF</label>
                <input type="text" class="form-control" id="uf_emp_quarta" name="uf_emp_quarta" maxlength="2" value="<?php print $uf_emp_quarta ?>">
                </div>
                <div class="form-group col-md-2">
                <label for="titulo">Complemento</label>
                <input type="text" class="form-control" id="comp_emp_quarta" name="comp_emp_quarta" value="<?php print $comp_emp_quarta ?>">
                </div>
</fieldset>
</div>
</div>
<div class="tab-pane fade" id="aba9">
                                <div class="form-group col-md-12" id="text_obs_dano">
                <label for="text">Observações de dano moral: <span style="color:#F76466;">Max:. <span id="counts_txt_obs_dano">&nbsp;</span></span></label>
    <textarea class="form-control" id="obs_dano" name="obs_dano" rows="8" maxlength="1000" placeholder="Digite sua observação resumida em até 1000 caracteres..."><?php print $obs_dano ?></textarea>
                                </div>
    <script type="text/javascript">
var textobsadv = new Spry.Widget.ValidationTextarea("text_obs_dano", {maxChars:1000,counterType:"chars_remaining",counterId:"counts_txt_obs_dano", isRequired:false});
	</script>
</div>    
    </div>
	</div>
                        </form>
<br><br><br><br><br><br><br><br><br><br>
		</div>
</body>
</html>
