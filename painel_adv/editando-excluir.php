<?php
include 'config2.php';
include 'config.php';

$id_edit = intval($_GET['usuario']);

//conexão dados trabalhador
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
$trabalho_ID=$_POST['trabalho_ID'];

//conexão cargo
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
$hrs_ent_sab=$_POST['hrs_ent_sab'];
$hrs_exit_sab=$_POST['hrs_exit_sab'];
$hrs_almo_sab=$_POST['hrs_almo_sab'];
$hrs_ent_dom=$_POST['hrs_ent_dom'];
$hrs_exit_dom=$_POST['hrs_exit_dom'];
$hrs_almo_dom=$_POST['hrs_almo_dom'];
$sab_ext_porc=$_POST['sab_ext_porc'];
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
$paradigma_nome=$_POST['paradigma_nome'];
$paradigma_valor=$_POST['paradigma_valor'];
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
$tev_ferias=$_POST['tev_ferias'];
$ferias_quant=$_POST['ferias_quant'];
$perio_ferias=$_POST['perio_ferias'];
$trab_ferias=$_POST['trab_ferias'];
$g_fgts=$_POST['g_fgts'];
$g_sd=$_POST['g_sd'];
$filho_14=$_POST['filho_14'];
$rec_sal_fam=$_POST['rec_sal_fam'];
$salario_fam=$_POST['salario_fam'];
$obs_adv=$_POST['obs_adv'];


$sql_code = "SELECT * FROM adv_clientes WHERE id = '$id_edit'";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$linha = $sql_query->fetch_assoc();

$_POST['nomecompleto'] = $linha['nomecompleto'];
$_POST['nacionalidade'] = $linha['nacionalidade'];
$_POST['estadocivil'] = $linha['estadocivil'];
$_POST['nasc_dia'] = $linha['nasc_dia'];
$_POST['nasc_mes'] = $linha['nasc_mes'];
$_POST['nasc_ano'] = $linha['nasc_ano'];
$_POST['rg_num'] = $linha['rg_num'];
$_POST['rg_origem'] = $linha['rg_origem'];
$_POST['rg_data_exp'] = $linha['rg_data_exp'];
$_POST['cliente_cpf'] = $linha['cliente_cpf'];
$_POST['nome_mae'] = $linha['nome_mae'];
$_POST['nome_pai'] = $linha['nome_pai'];
$_POST['pis_num'] = $linha['pis_num'];
$_POST['ctps_numero'] = $linha['ctps_numero'];
$_POST['ctps_serie'] = $linha['ctps_serie'];
$_POST['ctps_uf'] = $linha['ctps_uf'];
$_POST['end_rua'] = $linha['end_rua'];
$_POST['end_numero'] = $linha['end_numero'];
$_POST['end_bairro'] = $linha['end_bairro'];
$_POST['end_cidade'] = $linha['end_cidade'];
$_POST['cliente_cep'] = $linha['cliente_cep'];
$_POST['end_uf'] = $linha['end_uf'];
$_POST['end_complemento'] = $linha['end_complemento'];
$_POST['sex_or'] = $linha['sex_or'];
$_POST['sex_singular'] = $linha['sex_singular'];
$_POST['comarca_city'] = $linha['comarca_city'];
$_POST['cli_cel'] = $linha['cli_cel'];
$_POST['cli_tel'] = $linha['cli_tel'];
$_POST['trabalho_ID'] = $linha['trabalho_ID'];






$sql = mysql_query ("INSERT INTO adv_cargos (nome_cargo, data_ent, data_reg, data_saida, cump_aviso_previo, aviso_data, aviso_valor, data_homo, aviso_reducao, qm_homo, recebeu_homo, homo_valor, salario, valor_fora, remu_total, hrs_ent_sem, hrs_exit_sem, hrs_almo_sem, hrs_ent_sab, hrs_exit_sab, hrs_almo_sab, hrs_ent_dom, hrs_exit_dom, hrs_almo_dom, sab_ext_porc, ext_pago, ext_porcento, noite_ent, noite_exit, noite_almo, adc_noite_vl, trab_noite, adc_noite_porc, insalubre, periculoso, paradigma_nome, paradigma_valor, receb_VT, VT_valor, cesta_basica, cesta_valor, recebe_VR, VR_valor, receb_holerith, receb_aviso_previo, inic_aviso_previo, receb_dec, dec_data, tev_ferias, ferias_quant, perio_ferias, trab_ferias, g_fgts, g_sd, filho_14, rec_sal_fam, salario_fam, obs_adv)

VALUES ('$nome_cargo', '$data_ent', '$data_reg', '$data_saida', '$cump_aviso_previo', '$aviso_data', '$aviso_valor', '$data_homo', '$aviso_reducao', '$qm_homo', '$recebeu_homo', '$homo_valor', '$salario', '$valor_fora', '$remu_total', '$hrs_ent_sem', '$hrs_exit_sem', '$hrs_almo_sem', '$hrs_ent_sab', '$hrs_exit_sab', '$hrs_almo_sab', '$hrs_ent_dom', '$hrs_exit_dom', '$hrs_almo_dom', '$sab_ext_porc', '$ext_pago', $ext_porcento, '$noite_ent', '$noite_exit', '$noite_almo', '$adc_noite_vl', '$trab_noite', '$adc_noite_porc', '$insalubre', '$periculoso', '$paradigma_nome', '$paradigma_valor', '$receb_VT', '$VT_valor', '$cesta_basica', '$cesta_valor', '$recebe_VR', '$VR_valor', '$receb_holerith', '$receb_aviso_previo', '$inic_aviso_previo', '$receb_dec', '$dec_data', '$tev_ferias', '$ferias_quant', '$perio_ferias', '$trab_ferias', '$g_fgts', '$g_sd', '$filho_14', '$rec_sal_fam', '$salario_fam', '$obs_adv')");


$idcargo = mysql_insert_id();


$sql .= mysql_query ("INSERT INTO adv_clientes (cargo_id, nomecompleto, nacionalidade, estadocivil, nasc_dia, nasc_mes, nasc_ano, rg_num, rg_origem, rg_data_exp, cliente_cpf, nome_mae, nome_pai, pis_num, ctps_numero, ctps_serie, ctps_uf, end_rua, end_numero, end_bairro, end_cidade, cliente_cep, end_uf, end_complemento, comarca_city, sex_singular, sex_or, cli_cel, cli_tel, trabalho_ID)

VALUES ('$idcargo', '$nomecompleto', '$nacionalidade', '$estadocivil', '$nasc_dia', '$nasc_mes', '$nasc_ano', '$rg_num', '$rg_origem', '$rg_data_exp', '$cliente_cpf', '$nome_mae', '$nome_pai', '$pis_num', '$ctps_numero', '$ctps_serie', '$ctps_uf', '$end_rua', '$end_numero', '$end_bairro', '$end_cidade', '$cliente_cep', '$end_uf', '$end_complemento', '$comarca_city', '$sex_singular', '$sex_or', '$cli_cel', '$cli_tel', '$trabalho_ID')");



echo"<script type='text/javascript'>";
echo "window.location='index.php';alert('Cliente $nomecompleto atualizado com sucesso!')";
echo "</script>";
?>
