<div hidden>
<?php
include '../../sessao/sessao.php';
?>
</div>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ficha Cadastral - <?php echo htmlspecialchars($_POST['nomecompleto']); ?></title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_simples/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="print" href="css/print.css" />
<style type="text/css">

body {
}
table {
}
thead {
}
tr:hover {
  background-color:#3d80df;
  color: #D6D6D6;
}
thead tr:hover {
  background-color: transparent;
  color: inherit;
}
tr:nth-child(even) {
    background-color: #edf5ff;
}
th {
}
th, td {
}
/*CSS btn flutuante*/
#baixar_btn {
position:fixed;
top:10%;
left:5%;
}
#print_btn {
position:fixed;
top:10%;
right:5%;
}

@media print { 
#noprint { display:none; } 
body { background: #fff; }
}
</style>
</head>
<body style="font: 75%/1.6 "Myriad Pro", Frutiger, "Lucida Grande", "Lucida Sans", "Lucida Sans Unicode", Verdana, sans-serif;">
<div id="page-content">
<center>

<table id="playlistTable" style="border-collapse:collapse;width:48em;border:1px solid #666;">
  <h3>CADASTRO DO RECLAMANTE</h3>
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;color:#E34F51;">Informações do reclamante</th>
      <th style="padding: 0.1em 1em;"></th>
    </tr>
  </thead>

  <tbody>
    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;color:#E34F51;"></td>
      <!-- Nome Reclamante -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Nome:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nomecompleto']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Nascimento:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nasc_dia']); ?>/<?php echo htmlspecialchars($_POST['nasc_mes']); ?>/<?php echo htmlspecialchars($_POST['nasc_ano']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Estado Civil:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['estadocivil']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;color:#E34F51;"></td>
      <!-- Numero do RG -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>RG:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['rg_num']); ?> SSP/<?php echo htmlspecialchars($_POST['rg_origem']); ?> Ex <?php echo htmlspecialchars($_POST['rg_data_exp']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>CPF:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['cliente_cpf_num']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>PIS:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['pis_num']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;color:#E34F51;"></td>
      <!-- Numero do RG -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>CEP:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['cliente_cep']); ?> UF.: <?php echo htmlspecialchars($_POST['end_uf']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Endereço:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['end_rua']); ?>, <?php echo htmlspecialchars($_POST['end_numero']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Bairro / Cidade</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['end_bairro']); ?> - <?php echo htmlspecialchars($_POST['end_cidade']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>CTPS:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['ctps_numero']); ?> Série.: <?php echo htmlspecialchars($_POST['ctps_serie']); ?> de <?php echo htmlspecialchars($_POST['ctps_uf']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Celular:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['cli_cel']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Fixo:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['cli_tel']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Mãe:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nome_mae']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Pai:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nome_pai']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <!--<p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Data de Cadastro</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['data']); ?></small>-->
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;color:#E34F51;"><b>Informações do cargo</b></td>
      <td style="padding: 0.1em 1em;"></td>
    </tr>
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
    </tr>
  </thead>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Função principal:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nome_cargo']); ?></small>
      </td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Admissão / Registro:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['data_ent']); ?> | <?php echo htmlspecialchars($_POST['data_reg']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Demissão:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['data_saida']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Aviso (teve|cumprio|reduziu)</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['receb_aviso_previo']); ?> | <?php echo htmlspecialchars($_POST['cump_aviso_previo']); ?> | <?php echo htmlspecialchars($_POST['aviso_reducao']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Aviso previo (notificação | inicio)</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['aviso_data']); ?> | <?php echo htmlspecialchars($_POST['inic_aviso_previo']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Aviso previo valor:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['aviso_valor']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Salario:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['salario']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Por fora:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['valor_fora']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Remuneração toral:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['remu_total']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Horario semanal:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['hrs_ent_sem']); ?> às <?php echo htmlspecialchars($_POST['hrs_exit_sem']); ?> <br>Pausa.: <?php echo htmlspecialchars($_POST['hrs_almo_sem']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Horario na sexta:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['hrs_ent_sex']); ?> às <?php echo htmlspecialchars($_POST['hrs_exit_sex']); ?> <br>Pausa.: <?php echo htmlspecialchars($_POST['hrs_almo_sex']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Horario no sábado:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['hrs_ent_sab']); ?> às <?php echo htmlspecialchars($_POST['hrs_exit_sab']); ?> <br>Pausa.: <?php echo htmlspecialchars($_POST['hrs_almo_sab']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Horario no domingo:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['hrs_ent_dom']); ?> às <?php echo htmlspecialchars($_POST['hrs_exit_dom']); ?> <br>Pausa.: <?php echo htmlspecialchars($_POST['hrs_almo_dom']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Escala de trabalho:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Trabalho noturno:</small>
      </p>
      <small>Teve.:<?php echo htmlspecialchars($_POST['trab_noite']); ?> <br><?php echo htmlspecialchars($_POST['noite_ent']); ?> às <?php echo htmlspecialchars($_POST['noite_exit']); ?> <br>Pausa.: <?php echo htmlspecialchars($_POST['noite_almo']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;color:#E34F51;"><b>Informações da reclamada</b></td>
      <td style="padding: 0.1em 1em;"></td>
    </tr>
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
    </tr>
  </thead>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Reclamada principal:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['nome_emp']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>CNPJ:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['cnpj_cpf']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>CEP:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['emp_cep']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Endereço:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['emp_rua']); ?>, <?php echo htmlspecialchars($_POST['emp_num']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Bairro / Cidade:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['emp_bairro']); ?> | <?php echo htmlspecialchars($_POST['emp_city']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Complemento:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['emp_comp']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;color:#E34F51;"><b>Beneficios do reclamante</b></td>
      <td style="padding: 0.1em 1em;"></td>
    </tr>
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
    </tr>
  </thead>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Vale-Transporte:</small>
      </p>
      <small>Recebia.: <?php echo htmlspecialchars($_POST['receb_VT']); ?> | valor.: <?php echo htmlspecialchars($_POST['VT_valor']); ?> por dia</small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Cesta basica:</small>
      </p>
      <small>Recebia.: <?php echo htmlspecialchars($_POST['cesta_basica']); ?> | valor.: <?php echo htmlspecialchars($_POST['cesta_valor']); ?> mensal</small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Vale-Refeição:</small>
      </p>
      <small>Recebia.: <?php echo htmlspecialchars($_POST['recebe_VR']); ?> | valor.: <?php echo htmlspecialchars($_POST['VR_valor']); ?> por dia</small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Décimo Terceiro :</small>
      </p>
      <small>Recebeu os ultimos 13º.: <?php echo htmlspecialchars($_POST['receb_dec']); ?><br> 13º's há pedir.: 
      <br><?php echo htmlspecialchars($_POST['dec_data']); ?> 
      <br><?php echo htmlspecialchars($_POST['dec_data2']); ?> 
      </small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small></small>
      </p>
      <small>
        <br><?php echo htmlspecialchars($_POST['dec_data3']); ?> 
        <br><?php echo htmlspecialchars($_POST['dec_data4']); ?> 
        <br><?php echo htmlspecialchars($_POST['dec_data5']); ?>
      </small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Férias:</small>
      </p>
      <small>Tirou.: <?php echo htmlspecialchars($_POST['tev_ferias']); ?>
      <br>Pedir.: <?php echo htmlspecialchars($_POST['ferias_quant']); ?> de férias
      <br>Trabalhou nas férias.: <?php echo htmlspecialchars($_POST['trab_ferias']); ?>
      </small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Periodo trabalhado nas férias:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['perio_ferias']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Holerites:</small>
      </p>
      <small>Era entregue.: <?php echo htmlspecialchars($_POST['receb_holerith']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Participação lucros e resultados:</small>
      </p>
      <small>Valor anual.: <?php echo htmlspecialchars($_POST['plr_valor']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Fundo de garantia:</small>
      </p>
      <small>Recebeu.: <?php echo htmlspecialchars($_POST['g_fgts']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Seguro desemprego:</small>
      </p>
      <small>Recebeu.: <?php echo htmlspecialchars($_POST['g_sd']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Sálario familia:</small>
      </p>
      <small>Filhos.: <?php echo htmlspecialchars($_POST['filho_14']); ?> | Recebia.: <?php echo htmlspecialchars($_POST['rec_sal_fam']); ?> 
      <br>valor pago ou de tabela: <?php echo htmlspecialchars($_POST['salario_fam']); ?></small>
      </td>
    </tr>
    
    <tr style="font-weight:normal;text-align: left;background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;"></td>
      <td style="padding: 0.1em 1em;color:#E34F51;"><b>Paradigmas</b></td>
      <td style="padding: 0.1em 1em;"></td>
    </tr>
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
      <th style="padding: 0.1em 1em;"></th>
    </tr>
  </thead>
  
    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Paradigma 01:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['p_nome_1']); ?><br><?php echo htmlspecialchars($_POST['p_cargo_1']); ?><br>salário.: <?php echo htmlspecialchars($_POST['p_salario_1']); ?><br>Inicio.: <?php echo htmlspecialchars($_POST['p_inicio_1']); ?><br> Tempo.:<?php echo htmlspecialchars($_POST['p_tempo_1']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Paradigma 02:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['p_nome_2']); ?><br><?php echo htmlspecialchars($_POST['p_cargo_2']); ?><br>salário.: <?php echo htmlspecialchars($_POST['p_salario_2']); ?><br>Inicio.: <?php echo htmlspecialchars($_POST['p_inicio_2']); ?><br> Tempo.:<?php echo htmlspecialchars($_POST['p_tempo_2']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Paradigma 03:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['p_nome_3']); ?><br><?php echo htmlspecialchars($_POST['p_cargo_3']); ?><br>salário.: <?php echo htmlspecialchars($_POST['p_salario_3']); ?><br>Inicio.: <?php echo htmlspecialchars($_POST['p_inicio_3']); ?><br> Tempo.:<?php echo htmlspecialchars($_POST['p_tempo_3']); ?></small>
      </td>
    </tr>

    <tr style="font-weight:normal;text-align: left;">
      <td style="padding: 0.1em 1em;"></td>
      <!-- Data de Nascimento -->
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Paradigmas 04:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['p_nome_4']); ?><br><?php echo htmlspecialchars($_POST['p_cargo_4']); ?><br>salário.: <?php echo htmlspecialchars($_POST['p_salario_4']); ?><br>Inicio.: <?php echo htmlspecialchars($_POST['p_inicio_4']); ?><br> Tempo.:<?php echo htmlspecialchars($_POST['p_tempo_4']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Paradigmas 05:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['p_nome_5']); ?><br><?php echo htmlspecialchars($_POST['p_cargo_5']); ?><br>salário.: <?php echo htmlspecialchars($_POST['p_salario_5']); ?><br>Inicio.: <?php echo htmlspecialchars($_POST['p_inicio_5']); ?><br> Tempo.:<?php echo htmlspecialchars($_POST['p_tempo_5']); ?></small>
      </td>
      <td style="padding: 0.1em 1em;">
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Outras Reclamadas(Razão Social)</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['emp_segunta']); ?>
      <br><?php echo htmlspecialchars($_POST['emp_terceira']); ?> 
      <br><?php echo htmlspecialchars($_POST['emp_quarta']); ?>
      </small>
      </td>
    </tr>
  </tbody>
</table>
<br>
<br>
<table id="playlistTable" style="border-collapse:collapse;width:48em;border:1px solid #666;">
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="color:#E34F51;text-align:center;">Campo dano moral</th>
    </tr>
  </thead>

  <tbody>
    <tr style="font-weight:normal;text-align: left;">
      <td>
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Informações do dano moral:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['obs_dano']); ?></small>
      </td>
	</tr>
    </tbody>
</table>
<br>
<table id="playlistTable" style="border-collapse:collapse;width:48em;border:1px solid #666;">
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="color:#E34F51;text-align:right;">.</th>
      <th></th>
    </tr>
  </thead>

  <tbody>
    <tr style="font-weight:normal;text-align: left;">
      <td>
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Insalubridade:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['insalubre']); ?></small>
      </td>

      <td>
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Periculosidade:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['periculoso']); ?></small>
      </td>
    </tr>
    
</tbody>
</table>
<br>
<table id="playlistTable" style="border-collapse:collapse;width:48em;border:1px solid #666;">
  <thead style="background:#ccc url(http://www.devfuria.com.br/html-css/tabelas/bar.gif) repeat-x left center;border-top:1px solid #a5a5a5;border-bottom:1px solid #a5a5a5;">
    <tr style="font-weight:normal;text-align: left;">
      <th style="color:#E34F51;text-align:center;">Observações do advogado</th>
    </tr>
  </thead>

  <tbody>
    <tr style="font-weight:normal;text-align: left;">
      <td>
      <p style="margin-bottom:0px;text-decoration:underline;color:E34F51;font-weight:bold;">
      <small>Observações:</small>
      </p>
      <small><?php echo htmlspecialchars($_POST['obs_adv']); ?></small>
      </td>
	</tr>
    </tbody>
</table>

</center>
</div>
<div class="" id="noprint">
                    <a id="baixar_btn" type="button" class="btn btn-danger word-export" OnClick="javascript:void(0)" >
                    <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Baixar Word
                    </a>
                    <a id="print_btn" type="button" class="btn btn-primary" OnClick="window.print();" >
                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir
                    </a>
 </div>
<script src="js/to_word/jquery.min.js"></script> 
<script src="js/to_word/FileSaver.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>
</body>
<script type="text/javascript">
if (typeof jQuery !== "undefined" && typeof saveAs !== "undefined") {
    (function($) {
        $.fn.wordExport = function(fileName) {
            fileName = typeof fileName !== 'undefined' ? fileName : "<?php echo htmlspecialchars($_POST['nomecompleto']); ?> - Procuração";
            var static = {
                mhtml: {
                    top: "Mime-Version: 1.0\nContent-Base: " + location.href + "\nContent-Type: Multipart/related; boundary=\"NEXT.ITEM-BOUNDARY\";type=\"text/html\"\n\n--NEXT.ITEM-BOUNDARY\nContent-Type: text/html; charset=\"utf-8\"\nContent-Location: " + location.href + "\n\n<!DOCTYPE html>\n<html>\n_html_</html>",
                    head: "<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<style>\n_styles_\n</style>\n</head>\n",
                    body: "<body>_body_</body>"
                }
            };
            var options = {
                maxWidth: 624
            };
            // Clone selected element before manipulating it
            var markup = $(this).clone();

            // Remove hidden elements from the output
            markup.each(function() {
                var self = $(this);
                if (self.is(':hidden'))
                    self.remove();
            });

            // Embed all images using Data URLs
            var images = Array();
            var img = markup.find('img');
            for (var i = 0; i < img.length; i++) {
                // Calculate dimensions of output image
                var w = Math.min(img[i].width, options.maxWidth);
                var h = img[i].height * (w / img[i].width);
                // Create canvas for converting image to data URL
                $('<canvas>').attr("id", "jQuery-Word-export_img_" + i).width(w).height(h).insertAfter(img[i]);
                var canvas = document.getElementById("jQuery-Word-export_img_" + i);
                canvas.width = w;
                canvas.height = h;
                // Draw image to canvas
                var context = canvas.getContext('2d');
                context.drawImage(img[i], 0, 0, w, h);
                // Get data URL encoding of image
                var uri = canvas.toDataURL();
                $(img[i]).attr("src", img[i].src);
                img[i].width = w;
                img[i].height = h;
                // Save encoded image to array
                images[i] = {
                    type: uri.substring(uri.indexOf(":") + 1, uri.indexOf(";")),
                    encoding: uri.substring(uri.indexOf(";") + 1, uri.indexOf(",")),
                    location: $(img[i]).attr("src"),
                    data: uri.substring(uri.indexOf(",") + 1)
                };
                // Remove canvas now that we no longer need it
                canvas.parentNode.removeChild(canvas);
            }

            // Prepare bottom of mhtml file with image data
            var mhtmlBottom = "\n";
            for (var i = 0; i < images.length; i++) {
                mhtmlBottom += "--NEXT.ITEM-BOUNDARY\n";
                mhtmlBottom += "Content-Location: " + images[i].contentLocation + "\n";
                mhtmlBottom += "Content-Type: " + images[i].contentType + "\n";
                mhtmlBottom += "Content-Transfer-Encoding: " + images[i].contentEncoding + "\n\n";
                mhtmlBottom += images[i].contentData + "\n\n";
            }
            mhtmlBottom += "--NEXT.ITEM-BOUNDARY--";

            //TODO: load css from included stylesheet
            var styles = "";

            // Aggregate parts of the file together 
            var fileContent = static.mhtml.top.replace("_html_", static.mhtml.head.replace("_styles_", styles) + static.mhtml.body.replace("_body_", markup.html())) + mhtmlBottom;

            // Create a Blob with the file contents
            var blob = new Blob([fileContent], {
                type: "application/msword;charset=utf-8"
            });
            saveAs(blob, fileName + ".doc");
        };
    })(jQuery);
} else {
    if (typeof jQuery === "undefined") {

        console.error("jQuery Word Export: missing dependency (jQuery)");
    }
    if (typeof saveAs === "undefined") {
        console.error("jQuery Word Export: missing dependency (FileSaver.js)");
    };
}

</script>
</html>
