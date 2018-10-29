<?
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Atualizando dados...</title>
</head>
<body>
<?php
//variaveis ID ocultas
$hide_id_trabalho=$_POST['hide_id_trabalho'];
$hide_id_clientes=$_POST['hide_id_clientes'];
$hide_id_paradigmas=$_POST['hide_id_paradigmas'];
//variaveis dados gerais	
$nomecompleto=$_POST['nomecompleto'];
$nacionalidade=$_POST['nacionalidade'];
$estadocivil=$_POST['estadocivil'];
$nasc_dia=$_POST['nasc_dia'];
$nasc_mes=$_POST['nasc_mes'];
$nasc_ano=$_POST['nasc_ano'];
$rg_num=$_POST['rg_num'];
$rg_origem=$_POST['rg_origem'];
$rg_data_exp=$_POST['rg_data_exp'];
$nome_mae=$_POST['nome_mae'];
$nome_pai=$_POST['nome_pai'];
$on_pai=$_POST['on_pai'];
$pis_num=$_POST['pis_num'];
$ctps_numero=$_POST['ctps_numero'];
$ctps_serie=$_POST['ctps_serie'];
$ctps_uf=$_POST['ctps_uf'];
$end_rua=$_POST['end_rua'];
$end_numero=$_POST['end_numero'];
$end_bairro=$_POST['end_bairro'];
$end_cidade=$_POST['end_cidade'];
$cliente_cep=$_POST['cliente_cep'];
$end_uf=$_POST['end_uf'];
$end_complemento=$_POST['end_complemento'];
$trabalho_ID=$_POST['trabalho_ID'];
$sex_or=$_POST['sex_or'];
$sex_singular=$_POST['sex_singular'];
$comarca_city=$_POST['comarca_city'];
$cli_cel=$_POST['cli_cel'];
$cli_tel=$_POST['cli_tel'];
$cli_mail=$_POST['cli_mail'];
$nome_cargo=$_POST['nome_cargo'];
$data_ent=$_POST['data_ent'];
$data_reg=$_POST['data_reg'];
$data_saida=$_POST['data_saida'];
$cump_aviso_previo=$_POST['cump_aviso_previo'];
$aviso_data=$_POST['aviso_data'];
$aviso_valor=$_POST['aviso_valor'];
$data_homo=$_POST['data_homo'];
$aviso_reducao=$_POST['aviso_reducao'];
$homo_valor=$_POST['homo_valor'];
$qm_homo=$_POST['qm_homo'];
$salario=$_POST['salario'];
$valor_fora=$_POST['valor_fora'];
$remu_total=$_POST['remu_total'];
$hrs_ent_sem=$_POST['hrs_ent_sem'];
$hrs_exit_sem=$_POST['hrs_exit_sem'];
$hrs_almo_sem=$_POST['hrs_almo_sem'];
$hrs_ent_sex=$_POST['hrs_ent_sex'];
$hrs_exit_sex=$_POST['hrs_exit_sex'];
$hrs_almo_sex=$_POST['hrs_almo_sex'];
$hrs_ent_sab=$_POST['hrs_ent_sab'];
$hrs_exit_sab=$_POST['hrs_exit_sab'];
$hrs_almo_sab=$_POST['hrs_almo_sab'];
$hrs_ent_dom=$_POST['hrs_ent_dom'];
$hrs_exit_dom=$_POST['hrs_exit_dom'];
$hrs_almo_dom=$_POST['hrs_almo_dom'];
$escala_trab=$_POST['escala_trab'];
$hrs_ext_antes=$_POST['hrs_ext_antes'];
$hrs_ext_apos=$_POST['hrs_ext_apos'];
$hrs_ext_media=$_POST['hrs_ext_media'];
$sab_ext_porc=$_POST['sab_ext_porc'];
$dom_ext_porc=$_POST['dom_ext_porc'];
$ext_porcento=$_POST['ext_porcento'];
$noite_ent=$_POST['noite_ent'];
$noite_exit=$_POST['noite_exit'];
$noite_almo=$_POST['noite_almo'];
$adc_noite_vl=$_POST['adc_noite_vl'];
$trab_noite=$_POST['trab_noite'];
$ext_pago=$_POST['ext_pago'];
$recebeu_homo=$_POST['recebeu_homo'];
$adc_noite_porc=$_POST['adc_noite_porc'];
$insalubre=$_POST['insalubre'];
$periculoso=$_POST['periculoso'];
$receb_VT=$_POST['receb_VT'];
$VT_valor=$_POST['VT_valor'];
$cesta_basica=$_POST['cesta_basica'];
$cesta_valor=$_POST['cesta_valor'];
$recebe_VR=$_POST['recebe_VR'];
$VR_valor=$_POST['VR_valor'];
$receb_holerith=$_POST['receb_holerith'];
$receb_aviso_previo=$_POST['receb_aviso_previo'];
$inic_aviso_previo=$_POST['inic_aviso_previo'];
$receb_dec=$_POST['receb_dec'];
$dec_data=$_POST['dec_data'];
$dec_data2=$_POST['dec_data2'];
$dec_data3=$_POST['dec_data3'];
$dec_data4=$_POST['dec_data4'];
$dec_data5=$_POST['dec_data5'];
$tev_ferias=$_POST['tev_ferias'];
$ferias_quant=$_POST['ferias_quant'];
$perio_ferias=$_POST['perio_ferias'];
$trab_ferias=$_POST['trab_ferias'];
$plr_valor=$_POST['plr_valor'];
$g_fgts=$_POST['g_fgts'];
$g_sd=$_POST['g_sd'];
$filho_14=$_POST['filho_14'];
$rec_sal_fam=$_POST['rec_sal_fam'];
$salario_fam=$_POST['salario_fam'];
$obs_adv=$_POST['obs_adv'];
$data_quita=$_POST['data_quita'];
$recebeu_adc_noite=$_POST['recebeu_adc_noite'];
$p_nome_1=$_POST['p_nome_1'];	  
$p_nome_2=$_POST['p_nome_2'];	  
$p_nome_3=$_POST['p_nome_3'];	  
$p_nome_4=$_POST['p_nome_4'];	  
$p_nome_5=$_POST['p_nome_5'];	
$p_salario_1=$_POST['p_salario_1'];	  
$p_salario_2=$_POST['p_salario_2'];	  
$p_salario_3=$_POST['p_salario_3'];	  
$p_salario_4=$_POST['p_salario_4'];	  
$p_salario_5=$_POST['p_salario_5'];	 
$p_cargo_1=$_POST['p_cargo_1'];
$p_cargo_2=$_POST['p_cargo_2'];
$p_cargo_3=$_POST['p_cargo_3'];
$p_cargo_4=$_POST['p_cargo_4'];
$p_cargo_5=$_POST['p_cargo_5'];
$p_inicio_1=$_POST['p_inicio_1'];
$p_inicio_2=$_POST['p_inicio_2'];
$p_inicio_3=$_POST['p_inicio_3'];
$p_inicio_4=$_POST['p_inicio_4'];
$p_inicio_5=$_POST['p_inicio_5'];
$p_tempo_1=$_POST['p_tempo_1'];
$p_tempo_2=$_POST['p_tempo_2'];
$p_tempo_3=$_POST['p_tempo_3'];
$p_tempo_4=$_POST['p_tempo_4'];
$p_tempo_5=$_POST['p_tempo_5'];
$desvio_cargo_1=$_POST['desvio_cargo_1'];
$desvio_cargo_2=$_POST['desvio_cargo_2'];
$desvio_cargo_3=$_POST['desvio_cargo_3'];
$desvio_cargo_4=$_POST['desvio_cargo_4'];
$desvio_cargo_5=$_POST['desvio_cargo_5'];
$desvio_salario_1=$_POST['desvio_salario_1'];
$desvio_salario_2=$_POST['desvio_salario_2'];
$desvio_salario_3=$_POST['desvio_salario_3'];
$desvio_salario_4=$_POST['desvio_salario_4'];
$desvio_salario_5=$_POST['desvio_salario_5'];
$desvio_datainicio_1=$_POST['desvio_datainicio_1'];
$desvio_datainicio_2=$_POST['desvio_datainicio_2'];
$desvio_datainicio_3=$_POST['desvio_datainicio_3'];
$desvio_datainicio_4=$_POST['desvio_datainicio_4'];
$desvio_datainicio_5=$_POST['desvio_datainicio_5'];
$desvio_datafim_1=$_POST['desvio_datafim_1'];
$desvio_datafim_2=$_POST['desvio_datafim_2'];
$desvio_datafim_3=$_POST['desvio_datafim_3'];
$desvio_datafim_4=$_POST['desvio_datafim_4'];
$desvio_datafim_5=$_POST['desvio_datafim_5'];
$emp_segunda=$_POST['emp_segunda'];
$tipo_emp_segunda=$_POST['tipo_emp_segunda'];
$cnpj_segunda=$_POST['cnpj_segunda'];
$cep_segunda=$_POST['cep_segunda'];
$rua_emp_segunda=$_POST['rua_emp_segunda'];
$num_emp_segunda=$_POST['num_emp_segunda'];
$bairro_emp_segunda=$_POST['bairro_emp_segunda'];
$city_emp_segunda=$_POST['city_emp_segunda'];
$uf_emp_segunda=$_POST['uf_emp_segunda'];
$comp_emp_segunda=$_POST['comp_emp_segunda'];
$emp_terceira=$_POST['emp_terceira'];
$tipo_emp_terceira=$_POST['tipo_emp_terceira'];
$cnpj_terceira=$_POST['cnpj_terceira'];
$cep_terceira=$_POST['cep_terceira'];
$rua_emp_terceira=$_POST['rua_emp_terceira'];
$num_emp_terceira=$_POST['num_emp_terceira'];
$bairro_emp_terceira=$_POST['bairro_emp_terceira'];
$city_emp_terceira=$_POST['city_emp_terceira'];
$uf_emp_terceira=$_POST['uf_emp_terceira'];
$comp_emp_terceira=$_POST['comp_emp_terceira'];
$emp_quarta=$_POST['emp_quarta'];
$tipo_emp_quarta=$_POST['tipo_emp_quarta'];
$cnpj_quarta=$_POST['cnpj_quarta'];
$cep_quarta=$_POST['cep_quarta'];
$rua_emp_quarta=$_POST['rua_emp_quarta'];
$num_emp_quarta=$_POST['num_emp_quarta'];
$bairro_emp_quarta=$_POST['bairro_emp_quarta'];
$city_emp_quarta=$_POST['city_emp_quarta'];
$uf_emp_quarta=$_POST['uf_emp_quarta'];
$comp_emp_quarta=$_POST['comp_emp_quarta'];
$obs_dano=$_POST['obs_dano'];
	
	
$sql1 = ("UPDATE adv_clientes SET nomecompleto='$nomecompleto', nacionalidade='$nacionalidade', estadocivil='$estadocivil', nasc_dia='$nasc_dia',  nasc_mes='$nasc_mes', nasc_ano='$nasc_ano', rg_num='$rg_num', rg_origem='$rg_origem', rg_data_exp='$rg_data_exp', nome_mae='$nome_mae', nome_pai='$nome_pai', on_pai='$on_pai', pis_num='$pis_num', ctps_numero='$ctps_numero', ctps_serie='$ctps_serie',  ctps_uf='$ctps_uf',  end_rua='$end_rua', end_numero='$end_numero', end_bairro='$end_bairro', end_cidade='$end_cidade', cliente_cep='$cliente_cep', end_uf='$end_uf', end_complemento='$end_complemento', trabalho_ID='$trabalho_ID', sex_or='$sex_or', sex_singular='$sex_singular', comarca_city='$comarca_city', cli_cel='$cli_cel', cli_tel='$cli_tel', cli_mail='$cli_mail' WHERE id='$hide_id_clientes'");

$sql2 = ("UPDATE adv_cargos SET nome_cargo='$nome_cargo', data_ent='$data_ent', data_reg='$data_reg', data_saida='$data_saida', cump_aviso_previo='$cump_aviso_previo', aviso_data='$aviso_data', aviso_valor='$aviso_valor', data_homo='$data_homo', aviso_reducao='$aviso_reducao', qm_homo='$qm_homo', recebeu_homo='$recebeu_homo', homo_valor='$homo_valor', salario='$salario', valor_fora='$valor_fora', remu_total='$remu_total', hrs_ent_sem='$hrs_ent_sem', hrs_exit_sem='$hrs_exit_sem', hrs_almo_sem='$hrs_almo_sem', hrs_ent_sex='$hrs_ent_sex', hrs_exit_sex='$hrs_exit_sex', hrs_almo_sex='$hrs_almo_sex', hrs_ent_sab='$hrs_ent_sab', hrs_exit_sab='$hrs_exit_sab', hrs_almo_sab='$hrs_almo_sab', hrs_ent_dom='$hrs_ent_dom', hrs_exit_dom='$hrs_exit_dom', hrs_almo_dom='$hrs_almo_dom', escala_trab='$escala_trab', hrs_ext_antes='$hrs_ext_antes', hrs_ext_apos='$hrs_ext_apos', hrs_ext_media='$hrs_ext_media', sab_ext_porc='$sab_ext_porc', dom_ext_porc='$dom_ext_porc', ext_pago='$ext_pago', ext_porcento='$ext_porcento', noite_ent='$noite_ent', noite_exit='$noite_exit', noite_almo='$noite_almo', adc_noite_vl='$adc_noite_vl', trab_noite='$trab_noite', adc_noite_porc='$adc_noite_porc', insalubre='$insalubre', periculoso='$periculoso', receb_VT='$receb_VT', VT_valor='$VT_valor', cesta_basica='$cesta_basica', cesta_valor='$cesta_valor', recebe_VR='$recebe_VR', VR_valor='$VR_valor', receb_holerith='$receb_holerith', receb_aviso_previo='$receb_aviso_previo', inic_aviso_previo='$inic_aviso_previo', receb_dec='$receb_dec', dec_data='$dec_data', dec_data2='$dec_data2', dec_data3='$dec_data3', dec_data4='$dec_data4', dec_data5='$dec_data5', tev_ferias='$tev_ferias', ferias_quant='$ferias_quant', perio_ferias='$perio_ferias', trab_ferias='$trab_ferias', plr_valor='$plr_valor', g_fgts='$g_fgts', g_sd='$g_sd', filho_14='$filho_14', rec_sal_fam='$rec_sal_fam', salario_fam='$salario_fam', obs_adv='$obs_adv', data_quita='$data_quita', recebeu_adc_noite='$recebeu_adc_noite', desvio_cargo_1='$desvio_cargo_1', desvio_cargo_2='$desvio_cargo_2', desvio_cargo_3='$desvio_cargo_3', desvio_cargo_4='$desvio_cargo_4', desvio_cargo_5='$desvio_cargo_5', desvio_salario_1='$desvio_salario_1', desvio_salario_2='$desvio_salario_2', desvio_salario_3='$desvio_salario_3', desvio_salario_4='$desvio_salario_4', desvio_salario_5='$desvio_salario_5', desvio_datainicio_1='$desvio_datainicio_1', desvio_datainicio_2='$desvio_datainicio_2', desvio_datainicio_3='$desvio_datainicio_3', desvio_datainicio_4='$desvio_datainicio_4', desvio_datainicio_5='$desvio_datainicio_5', desvio_datafim_1='$desvio_datafim_1', desvio_datafim_2='$desvio_datafim_2', desvio_datafim_3='$desvio_datafim_3',	desvio_datafim_4='$desvio_datafim_4', desvio_datafim_5='$desvio_datafim_5', emp_segunta='$emp_segunda', tipo_emp_segunda='$tipo_emp_segunda', cnpj_segunda='$cnpj_segunda', cep_segunda='$cep_segunda', rua_emp_segunda='$rua_emp_segunda', num_emp_segunda='$num_emp_segunda', bairro_emp_segunda='$bairro_emp_segunda', city_emp_segunda='$city_emp_segunda', uf_emp_segunda='$uf_emp_segunda', comp_emp_segunda='$comp_emp_segunda', emp_terceira='$emp_terceira', tipo_emp_terceira='$tipo_emp_terceira', cnpj_terceira='$cnpj_terceira', cep_terceira='$cep_terceira', rua_emp_terceira='$rua_emp_terceira', num_emp_terceira='$num_emp_terceira', bairro_emp_terceira='$bairro_emp_terceira', city_emp_terceira='$city_emp_terceira', uf_emp_terceira='$uf_emp_terceira', comp_emp_terceira='$comp_emp_terceira', emp_quarta='$emp_quarta', tipo_emp_quarta='$tipo_emp_quarta', cnpj_quarta='$cnpj_quarta', cep_quarta='$cep_quarta', rua_emp_quarta='$rua_emp_quarta', num_emp_quarta='$num_emp_quarta', bairro_emp_quarta='$bairro_emp_quarta', city_emp_quarta='$city_emp_quarta', uf_emp_quarta='$uf_emp_quarta', comp_emp_quarta='$comp_emp_quarta', obs_dano='$obs_dano' WHERE id_cargo='$hide_id_trabalho'");


$sql3 = ("UPDATE paradigmas SET p_nome_1='$p_nome_1', p_nome_2='$p_nome_2', p_nome_3='$p_nome_3', p_nome_4='$p_nome_4', p_nome_5='$p_nome_5', p_salario_1='$p_salario_1', p_salario_2='$p_salario_2', p_salario_3='$p_salario_3', p_salario_4='$p_salario_4', p_salario_5='$p_salario_5', p_cargo_1='$p_cargo_1', p_cargo_2='$p_cargo_2', p_cargo_3='$p_cargo_3', p_cargo_4='$p_cargo_4', p_cargo_5='$p_cargo_5', p_inicio_1='$p_inicio_1', p_inicio_2='$p_inicio_2', p_inicio_3='$p_inicio_3', p_inicio_4='$p_inicio_4', p_inicio_5='$p_inicio_5', p_tempo_1='$p_tempo_1', p_tempo_2='$p_tempo_2', p_tempo_3='$p_tempo_3', p_tempo_4='$p_tempo_4', p_tempo_5='$p_tempo_5' WHERE paradigmas_id='$hide_id_paradigmas'");	
	
if ($conexao->query($sql1) === TRUE) {
	if($conexao->query($sql2) === TRUE) {
		if($conexao->query($sql3) === TRUE) {
echo"<script type='text/javascript'>";
echo "window.location='index.php';alert('Reclamante $nomecompleto atualizado com sucesso!')";
echo "</script>";				
		};		
	};
} else {
    echo "Error updating record: " . $conexao->error;
};
$conexao->close();
?>
</body>
</html>