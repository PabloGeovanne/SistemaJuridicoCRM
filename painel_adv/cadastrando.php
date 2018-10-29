<?
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrando...</title>
</head>
<body>
<?php

//conexão dados trabalhador
$adv_id=$_POST['adv_id'];
$nomecompleto=$_POST['nomecompleto'];
$nacionalidade=$_POST['nacionalidade'];
$estadocivil=$_POST['estadocivil'];
$nasc_dia=$_POST['nasc_dia'];
$nasc_mes=$_POST['nasc_mes'];
$nasc_ano=$_POST['nasc_ano'];
$rg_num=$_POST['rg_num'];
$rg_origem=$_POST['rg_origem'];
$rg_data_exp=$_POST['rg_data_exp'];
$cliente_cpf=$_POST['cliente_cpf'];
$nome_mae=$_POST['nome_mae'];
$on_pai=$_POST['on_pai'];
$nome_pai=$_POST['nome_pai'];
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
$sex_or=$_POST['sex_or'];
$sex_singular=$_POST['sex_singular'];
$comarca_city=$_POST['comarca_city'];
$cli_cel=$_POST['cli_cel'];
$cli_tel=$_POST['cli_tel'];
$cli_mail=$_POST['cli_mail'];
$trabalho_ID=$_POST['trabalho_ID'];
//conexão cargo
$nome_cargo=$_POST['nome_cargo'];
//desvio de função 01
$desvio_cargo_1=$_POST['desvio_cargo_1'];
$desvio_salario_1=$_POST['desvio_salario_1'];
$desvio_datainicio_1=$_POST['desvio_datainicio_1'];
$desvio_datafim_1=$_POST['desvio_datafim_1'];
//desvio de função 02
$desvio_cargo_2=$_POST['desvio_cargo_2'];
$desvio_salario_2=$_POST['desvio_salario_2'];
$desvio_datainicio_2=$_POST['desvio_datainicio_2'];
$desvio_datafim_2=$_POST['desvio_datafim_2'];
//desvio de função 03
$desvio_cargo_3=$_POST['desvio_cargo_3'];
$desvio_salario_3=$_POST['desvio_salario_3'];
$desvio_datainicio_3=$_POST['desvio_datainicio_3'];
$desvio_datafim_3=$_POST['desvio_datafim_3'];
//desvio de função 04
$desvio_cargo_4=$_POST['desvio_cargo_4'];
$desvio_salario_4=$_POST['desvio_salario_4'];
$desvio_datainicio_4=$_POST['desvio_datainicio_4'];
$desvio_datafim_4=$_POST['desvio_datafim_4'];
//desvio de função 05
$desvio_cargo_5=$_POST['desvio_cargo_5'];
$desvio_salario_5=$_POST['desvio_salario_5'];
$desvio_datainicio_5=$_POST['desvio_datainicio_5'];
$desvio_datafim_5=$_POST['desvio_datafim_5'];
$data_ent=$_POST['data_ent'];
$data_reg=$_POST['data_reg'];
$data_saida=$_POST['data_saida'];
$cump_aviso_previo=$_POST['cump_aviso_previo'];
$aviso_data=$_POST['aviso_data'];
$aviso_valor=$_POST['aviso_valor'];
$data_homo=$_POST['data_homo'];
$aviso_reducao=$_POST['aviso_reducao'];
$qm_homo=$_POST['qm_homo'];
$recebeu_homo=$_POST['recebeu_homo'];
$homo_valor=$_POST['homo_valor'];
$data_quita=$_POST['data_quita'];
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
$escala_trab=$_POST['escala_trab'];
$hrs_ext_antes=$_POST['hrs_ext_antes'];
$hrs_ext_apos=$_POST['hrs_ext_apos'];
$hrs_ext_media=$_POST['hrs_ext_media'];
$hrs_exit_dom=$_POST['hrs_exit_dom'];
$hrs_almo_dom=$_POST['hrs_almo_dom'];
$sab_ext_porc=$_POST['sab_ext_porc'];
$dom_ext_porc=$_POST['dom_ext_porc'];
$ext_porcento=$_POST['ext_porcento'];
$ext_pago=$_POST['ext_pago'];
$noite_ent=$_POST['noite_ent'];
$noite_exit=$_POST['noite_exit'];
$noite_almo=$_POST['noite_almo'];
$adc_noite_vl=$_POST['adc_noite_vl'];
$trab_noite=$_POST['trab_noite'];
$recebeu_adc_noite=$_POST['recebeu_adc_noite'];
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
// outras reclamadas
$emp_segunta=$_POST['emp_segunta'];
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
//conexão paradigmas
$p_nome_1=$_POST['p_nome_1'];
$p_salario_1=$_POST['p_salario_1'];
$p_cargo_1=$_POST['p_cargo_1'];
$p_inicio_1=$_POST['p_inicio_1'];
$p_tempo_1=$_POST['p_tempo_1'];
$p_nome_2=$_POST['p_nome_2'];
$p_salario_2=$_POST['p_salario_2'];
$p_cargo_2=$_POST['p_cargo_2'];
$p_inicio_2=$_POST['p_inicio_2'];
$p_tempo_2=$_POST['p_tempo_2'];
$p_nome_3=$_POST['p_nome_3'];
$p_salario_3=$_POST['p_salario_3'];
$p_cargo_3=$_POST['p_cargo_3'];
$p_inicio_3=$_POST['p_inicio_3'];
$p_tempo_3=$_POST['p_tempo_3'];
$p_nome_4=$_POST['p_nome_4'];
$p_salario_4=$_POST['p_salario_4'];
$p_cargo_4=$_POST['p_cargo_4'];
$p_inicio_4=$_POST['p_inicio_4'];
$p_tempo_4=$_POST['p_tempo_4'];
$p_nome_5=$_POST['p_nome_5'];
$p_salario_5=$_POST['p_salario_5'];
$p_cargo_5=$_POST['p_cargo_5'];
$p_inicio_5=$_POST['p_inicio_5'];
$p_tempo_5=$_POST['p_tempo_5'];

$query = ("SELECT * FROM adv_clientes WHERE adv_id='$adv_id' AND cliente_cpf='$cliente_cpf'");
$sqli_result = mysqli_query($conexao, $query);
$rows = mysqli_fetch_assoc($sqli_result);
	
if ($rows != false) {
echo"<script type='text/javascript'>";
echo "window.history.back();alert('Você já realizou o cadastro deste reclamante: $nomecompleto!')";
echo "</script>";
} else {	
$sql1 = "INSERT INTO adv_cargos (nome_cargo, desvio_cargo_1, desvio_salario_1, desvio_datainicio_1, desvio_datafim_1, desvio_cargo_2, desvio_salario_2, desvio_datainicio_2, desvio_datafim_2, desvio_cargo_3, desvio_salario_3, desvio_datainicio_3, desvio_datafim_3, desvio_cargo_4, desvio_salario_4, desvio_datainicio_4, desvio_datafim_4, desvio_cargo_5, desvio_salario_5, desvio_datainicio_5, desvio_datafim_5, data_ent, data_reg, data_saida, cump_aviso_previo, aviso_data, aviso_valor, data_homo, aviso_reducao, qm_homo, recebeu_homo, homo_valor, data_quita, salario, valor_fora, remu_total, hrs_ent_sem, hrs_exit_sem, hrs_almo_sem, hrs_ent_sex, hrs_exit_sex, hrs_almo_sex, hrs_ent_sab, hrs_exit_sab, hrs_almo_sab, hrs_ent_dom, escala_trab, hrs_ext_antes, hrs_ext_apos, hrs_ext_media, hrs_exit_dom, hrs_almo_dom, sab_ext_porc, dom_ext_porc, ext_pago, ext_porcento, noite_ent, noite_exit, noite_almo, adc_noite_vl, trab_noite, recebeu_adc_noite, adc_noite_porc, insalubre, periculoso, receb_VT, VT_valor, cesta_basica, cesta_valor, recebe_VR, VR_valor, receb_holerith, receb_aviso_previo, inic_aviso_previo, receb_dec, dec_data, dec_data2, dec_data3, dec_data4, dec_data5, tev_ferias, ferias_quant, perio_ferias, trab_ferias, plr_valor, g_fgts, g_sd, filho_14, rec_sal_fam, salario_fam, obs_adv, emp_segunta, tipo_emp_segunda, cnpj_segunda, cep_segunda, rua_emp_segunda, num_emp_segunda, bairro_emp_segunda, city_emp_segunda, uf_emp_segunda, comp_emp_segunda, emp_terceira, tipo_emp_terceira, cnpj_terceira, cep_terceira, rua_emp_terceira, num_emp_terceira, bairro_emp_terceira, city_emp_terceira, uf_emp_terceira, comp_emp_terceira, emp_quarta, tipo_emp_quarta, cnpj_quarta, cep_quarta, rua_emp_quarta, num_emp_quarta, bairro_emp_quarta, city_emp_quarta, uf_emp_quarta, comp_emp_quarta, obs_dano)

VALUES ('$nome_cargo', '$desvio_cargo_1', '$desvio_salario_1', '$desvio_datainicio_1', '$desvio_datafim_1', '$desvio_cargo_2', '$desvio_salario_2', '$desvio_datainicio_2', '$desvio_datafim_2', '$desvio_cargo_3', '$desvio_salario_3', '$desvio_datainicio_3', '$desvio_datafim_3', '$desvio_cargo_4', '$desvio_salario_4', '$desvio_datainicio_4', '$desvio_datafim_4', '$desvio_cargo_5', '$desvio_salario_5', '$desvio_datainicio_5', '$desvio_datafim_5', '$data_ent', '$data_reg', '$data_saida', '$cump_aviso_previo', '$aviso_data', '$aviso_valor', '$data_homo', '$aviso_reducao', '$qm_homo', '$recebeu_homo', '$homo_valor', '$data_quita', '$salario', '$valor_fora', '$remu_total', '$hrs_ent_sem', '$hrs_exit_sem', '$hrs_almo_sem', '$hrs_ent_sex', '$hrs_exit_sex', '$hrs_almo_sex', '$hrs_ent_sab', '$hrs_exit_sab', '$hrs_almo_sab', '$hrs_ent_dom', '$escala_trab', '$hrs_ext_antes', '$hrs_ext_apos', '$hrs_ext_media', '$hrs_exit_dom', '$hrs_almo_dom', '$sab_ext_porc', '$dom_ext_porc', '$ext_pago', '$ext_porcento', '$noite_ent', '$noite_exit', '$noite_almo', '$adc_noite_vl', '$trab_noite', '$recebeu_adc_noite', '$adc_noite_porc', '$insalubre', '$periculoso', '$receb_VT', '$VT_valor', '$cesta_basica', '$cesta_valor', '$recebe_VR', '$VR_valor', '$receb_holerith', '$receb_aviso_previo', '$inic_aviso_previo', '$receb_dec', '$dec_data', '$dec_data2', '$dec_data3', '$dec_data4', '$dec_data5', '$tev_ferias', '$ferias_quant', '$perio_ferias', '$trab_ferias', '$plr_valor', '$g_fgts', '$g_sd', '$filho_14', '$rec_sal_fam', '$salario_fam', '$obs_adv', '$emp_segunta', '$tipo_emp_segunda', '$cnpj_segunda', '$cep_segunda', '$rua_emp_segunda', '$num_emp_segunda', '$bairro_emp_segunda', '$city_emp_segunda', '$uf_emp_segunda', '$comp_emp_segunda', '$emp_terceira', '$tipo_emp_terceira', '$cnpj_terceira', '$cep_terceira', '$rua_emp_terceira', '$num_emp_terceira', '$bairro_emp_terceira', '$city_emp_terceira', '$uf_emp_terceira', '$comp_emp_terceira', '$emp_quarta', '$tipo_emp_quarta', '$cnpj_quarta', '$cep_quarta', '$rua_emp_quarta', '$num_emp_quarta', '$bairro_emp_quarta', '$city_emp_quarta', '$uf_emp_quarta', '$comp_emp_quarta', '$obs_dano')";
	
if (mysqli_query($conexao, $sql1)) {
	
$idcargos = mysqli_insert_id($conexao);
	
$sql2 = ("INSERT INTO paradigmas (p_nome_1, p_salario_1, p_cargo_1, p_inicio_1, p_tempo_1, p_nome_2, p_salario_2, p_cargo_2, p_inicio_2, p_tempo_2, p_nome_3, p_salario_3, p_cargo_3, p_inicio_3, p_tempo_3, p_nome_4, p_salario_4, p_cargo_4, p_inicio_4, p_tempo_4, p_nome_5, p_salario_5, p_cargo_5, p_inicio_5, p_tempo_5)

VALUES ('$p_nome_1', '$p_salario_1', '$p_cargo_1', '$p_inicio_1', '$p_tempo_1', '$p_nome_2', '$p_salario_2', '$p_cargo_2', '$p_inicio_2', '$p_tempo_2', '$p_nome_3', '$p_salario_3', '$p_cargo_3', '$p_inicio_3', '$p_tempo_3', '$p_nome_4', '$p_salario_4', '$p_cargo_4', '$p_inicio_4', '$p_tempo_4', '$p_nome_5', '$p_salario_5', '$p_cargo_5', '$p_inicio_5', '$p_tempo_5')");
	
if (mysqli_query($conexao, $sql2)) {
	
$idparadigmas = mysqli_insert_id($conexao);
	
$sql3 = "INSERT INTO adv_clientes (adv_id, cargo_id, id_paradigmas, nomecompleto, nacionalidade, estadocivil, nasc_dia, nasc_mes, nasc_ano, rg_num, rg_origem, rg_data_exp, cliente_cpf, nome_mae, on_pai, nome_pai, pis_num, ctps_numero, ctps_serie, ctps_uf, end_rua, end_numero, end_bairro, end_cidade, cliente_cep, end_uf, end_complemento, comarca_city, sex_singular, sex_or, cli_cel, cli_tel, cli_mail, trabalho_ID)

VALUES ('$adv_id', '$idcargos', '$idparadigmas', '$nomecompleto', '$nacionalidade', '$estadocivil', '$nasc_dia', '$nasc_mes', '$nasc_ano', '$rg_num', '$rg_origem', '$rg_data_exp', '$cliente_cpf', '$nome_mae', '$on_pai', '$nome_pai', '$pis_num', '$ctps_numero', '$ctps_serie', '$ctps_uf', '$end_rua', '$end_numero', '$end_bairro', '$end_cidade', '$cliente_cep', '$end_uf', '$end_complemento', '$comarca_city', '$sex_singular', '$sex_or', '$cli_cel', '$cli_tel', '$cli_mail', '$trabalho_ID')";
	
if (mysqli_query($conexao, $sql3)) {	
	
echo"<script type='text/javascript'>";
echo "window.location='index.php';alert('Reclamante $nomecompleto cadastrado com sucesso!')";
echo "</script>";
	
}else{echo "Error 3º Conexao Tabela Cliente:" . $sql3 . "<br>" . mysqli_error($conexao);}	
}else{echo "Error 2º Conexao Tabela Paradigmas:" . $sql2 . "<br>" . mysqli_error($conexao);}	
}else{echo "Error 1º COnexao: Tabela Cargo" . $sql1 . "<br>" . mysqli_error($conexao);}
mysqli_close($conexao);	
}	
?>
</body>
</html>