<?php
require_once("../../sessao/sessao.php");
	
$nome_pai = $_POST['nome_pai'];
	if(empty($nome_pai)){
		$on_pai = "";
	}else{
		$on_pai = " e de ";
	};
$sex_singular_On = $_POST['sex_singular'];
	if($sex_singular_On == "o"){
		$sex_singular = "o";
		$sex_or = "";
	}elseif($sex_singular_On == "a"){
		$sex_singular = "a";
		$sex_or = "a";
	}else{
		
		$error = "1";
	};
$other_empOn = $_POST['other_emp'];
	if($other_empOn == "on"){
		$other_empOn = " e outras";
	}else{
		$other_empOn = "";
	};
$emp_tipo = $_POST['emp_tipo'];
	if($emp_tipo == "jurídica"){
		$emp_tipo_cnpjcpf = "CNPJ";
	}else{
		$emp_tipo_cnpjcpf = "CPF";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PROCURAÇÃO - WORD</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
	
        <script src="../js/tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="vendor/FileSaver.js"></script>
        <script src="vendor/html-docx.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
        
</head>
<body>
<?php 
//algoritimo para caso de erro - mostrar menssagem na tela
	if($error == "1"){
		echo "<div class='alert alert-warning alert-dismissible' role='alert'>\n";
		echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><small><span aria-hidden='true' class='glyphicon glyphicon-remove'></span></small></button>\n";
		echo "<strong>Atenção!</strong> Houve um erro ao gerar o documento <span class='label label-danger'>VOLTE</span> e tente novamente.\n";
		echo "</div>\n";
		echo "<style type='text/css'>\n";
		echo "#content, #convert, #download-area {display: none;}\n";
		echo ".page-orientation {display: none;}\n";
		echo "<\style>";
		echo "<br>";
	}
	
?>
  <textarea class="content" id="content" cols="60" rows="21">
<div id="page-content">
		<div id="heatxt">
<p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-bottom:0px;">DR. <?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
</p>
<p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-top:0px; margin-bottom:0px;">
<?php echo htmlspecialchars($_POST['adv_cargo']); ?>
</p>
<p style="text-align:center;font-weight:600;margin-top:0px;">
___________________________________________________________________
</p>
  		</div>
<p style="margin-top:30px;text-align:center;font-size:24px;font-weight:bold;font-family:Times New Roman">
PROCURAÇÃO  &ldquo;AD JUDICIA&rdquo;
</p>
  <p>&nbsp;</p>
  <div style="margin-left:7%;text-align:justify;width:80%;height:auto;font-family:Arial;font-size:16px;">
<p style="text-indent: 8.05em;">
<b style="font-size:18px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['nomecompleto']); ?>
</b>, <?php echo htmlspecialchars($_POST['nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['estadocivil']); ?>, <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, nascid<? echo $sex_singular ?> em <?php echo htmlspecialchars($_POST['nasc_dia']); ?> de <?php echo htmlspecialchars($_POST['nasc_mes']); ?> de <?php echo htmlspecialchars($_POST['nasc_ano']); ?>, portador<? echo $sex_or ?> da cédula de identidade RG nº <?php echo htmlspecialchars($_POST['rg_num']); ?> - SSP/<?php echo htmlspecialchars($_POST['rg_origem']); ?>, expedido em <?php echo htmlspecialchars($_POST['rg_data_exp']); ?>, inscrit<? echo $sex_singular ?> no CPF/MF nº <?php echo htmlspecialchars($_POST['cliente_cpf_num']); ?>, filh<? echo $sex_singular ?> de <b style="font-size:18px;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_mae']); ?></b><? echo $on_pai ?><b style="font-size:18px;text-transform:uppercase;"><? echo $nome_pai ?></b>, inscrit<? echo $sex_singular ?> no PIS sob nº <?php echo htmlspecialchars($_POST['pis_num']); ?>, CTPS nº <?php echo htmlspecialchars($_POST['ctps_numero']); ?>, série <?php echo htmlspecialchars($_POST['ctps_serie']); ?>-<?php echo htmlspecialchars($_POST['ctps_uf']); ?>, residente e domiciliad<? echo $sex_singular ?> <?php echo htmlspecialchars($_POST['end_type']); ?> <?php echo htmlspecialchars($_POST['end_rua']); ?> nº <?php echo htmlspecialchars($_POST['end_numero']); ?> – <?php echo htmlspecialchars($_POST['end_complemento']); ?> - <?php echo htmlspecialchars($_POST['end_bairro']); ?> - CEP <?php echo htmlspecialchars($_POST['cliente_cep']); ?> - município de <?php echo htmlspecialchars($_POST['end_cidade']); ?>-<?php echo htmlspecialchars($_POST['end_uf']); ?>.
</p>
<p style="text-indent: 8.05em;">
Pelo presente instrumento de procuração, nomeia e constitui <?php echo htmlspecialchars($_POST['adv_sex_singular']); ?> procurador<?php echo htmlspecialchars($_POST['adv_sex_or']); ?>, 
<b style="font-size:18px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
</b>, <?php echo htmlspecialchars($_POST['adv_nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['adv_estado_civil']); ?>, <?php echo htmlspecialchars($_POST['adv_cargo']); ?>, inscrit<?php echo htmlspecialchars($_POST['adv_sex_singular']); ?> na OAB/SP sob o nº <?php echo htmlspecialchars($_POST['oab']); ?>, portador<?php echo htmlspecialchars($_POST['adv_sex_or']); ?> do cadastro de pessoas físicas do Ministério da Fazenda sob nº <?php echo htmlspecialchars($_POST['adv_cpf']); ?> com escritório na <?php echo htmlspecialchars($_POST['adv_rua']); ?> nº <?php echo htmlspecialchars($_POST['adv_numero_casa']); ?> - <?php echo htmlspecialchars($_POST['adv_complemento']); ?> - CEP <?php echo htmlspecialchars($_POST['adv_cep']); ?> - <?php echo htmlspecialchars($_POST['adv_bairro']); ?> - <?php echo htmlspecialchars($_POST['adv_cidade']); ?>-<?php echo htmlspecialchars($_POST['adv_estado']); ?> - telefone: <?php echo htmlspecialchars($_POST['adv_tel1']); ?> - <?php echo htmlspecialchars($_POST['adv_tel2']); ?> - <?php echo htmlspecialchars($_POST['adv_tel3']); ?>
</p>
<p style="text-indent: 8.05em;">A quem confere amplos poderes para o foro em geral, com a cláusula “AD-JUDICIA” em qualquer Juízo, Instância ou Tribunal, podendo propor contra quem de direito as ações competentes e defendê-las nas contrárias, seguindo umas e outras, até final decisão, usando os recursos legais e acompanhando-os, conferindo-lhe, ainda, poderes especiais para confessar, desistir, transigir, firmar compromissos ou acordos, receber e dar quitação, agindo em conjunto ou separadamente, podendo ainda substabelecer está em outrem, com ou sem reserva de iguais poderes, especialmente para propor reclamação trabalhista contra 
<b style="font-size:18px;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_emp']); ?><? echo $other_empOn ?></b>, perante uma das Varas do Trabalho da comarca de <?php echo htmlspecialchars($_POST['comarca_city']); ?>.
</p>
  </div>
    <p>&nbsp;</p>
<div style="text-align:center;">
<p style="text-align:center;font-family:arial;font-size:16px;">
<?php echo htmlspecialchars($_POST['adv_cidade']); ?>, 
<?php echo htmlspecialchars($_POST['datahoje']); ?>
</p>
<br>
<br>
<div style="margin-left:25%;margin-right:25%;width:50%;text-align:center">
<p style="margin-bottom:-15;">__________________________________________</p>
<p style="margin-top:-15px;">
<b style="font-size:18px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['nomecompleto']); ?>
</b>
</p>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div style="margin-left:7%;text-align:justify;width:80%;height:auto;font-family:Arial;font-size:13px;">
    <div class="heatxt">
<p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-bottom:0px;">
DR. <?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
</p>
<p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-top:0px;margin-bottom:0px;">
<?php echo htmlspecialchars($_POST['adv_cargo']); ?>
</p>
<p style="text-align:center;font-weight:600;margin-top:0px;">
___________________________________________________________________
</p>
	</div>
  <p><center><h3><b>CONTRATO  DE HONORÁRIOS ADVOCATÍCIOS</b></h3></center></p>
    <div style="font-size:16px;">
<p style="text-indent: 8.05em;">
Pelo  presente instrumento particular, contrato de prestação de serviços de advogado, de um lado na qualidade de contratad<?php echo htmlspecialchars($_POST['adv_sex_singular']); ?>, 
<strong>
<b style="font-size:18px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
</b>
</strong> 
<?php echo htmlspecialchars($_POST['adv_nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['adv_estado_civil']); ?>, <?php echo htmlspecialchars($_POST['adv_cargo']); ?>, RG <?php echo htmlspecialchars($_POST['adv_rg']); ?> SSP/<?php echo htmlspecialchars($_POST['adv_ssp']); ?> inscrit<?php echo htmlspecialchars($_POST['adv_sex_singular']); ?> no  cadastro de pessoas físicas do Ministério da Fazenda sob nº <?php echo htmlspecialchars($_POST['adv_cpf']); ?>, com  inscrição na OAB/SP sob o nº <?php echo htmlspecialchars($_POST['oab']); ?>, com escritório na <?php echo htmlspecialchars($_POST['adv_rua']); ?> nº <?php echo htmlspecialchars($_POST['adv_numero_casa']); ?>  - <?php echo htmlspecialchars($_POST['adv_complemento']); ?> - CEP <?php echo htmlspecialchars($_POST['adv_cep']); ?> - <?php echo htmlspecialchars($_POST['adv_bairro']); ?> - <?php echo htmlspecialchars($_POST['adv_cidade']); ?>-<?php echo htmlspecialchars($_POST['adv_estado']); ?>, telefones: <?php echo htmlspecialchars($_POST['adv_tel1']); ?> e <?php echo htmlspecialchars($_POST['adv_tel2']); ?> – <?php echo htmlspecialchars($_POST['adv_tel2']); ?>,
e de outro lado, na qualidade de contratante, <? echo $sex_singular ?> senhor<? echo $sex_or ?> <strong><b style="font-size:18px;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nomecompleto']); ?></b></strong><strong>,</strong> </b></strong> <?php echo htmlspecialchars($_POST['nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['estadocivil']); ?>, <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, nascid<? echo $sex_singular ?> em <?php echo htmlspecialchars($_POST['nasc_dia']); ?> de <?php echo htmlspecialchars($_POST['nasc_mes']); ?> de <?php echo htmlspecialchars($_POST['nasc_ano']); ?> portador<? echo $sex_or ?> da cédula  de identidade RG nº <?php echo htmlspecialchars($_POST['rg_num']); ?> SSP/<?php echo htmlspecialchars($_POST['rg_origem']); ?>, expedido em inscrit<? echo $sex_singular ?> no CPF/MF nº <?php echo htmlspecialchars($_POST['cliente_cpf_num']); ?>,  filh<? echo $sex_singular ?> de <b style="font-size:18px;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_mae']); ?></b><? echo $on_pai ?><b style="font-size:18px;text-transform:uppercase;"><? echo $nome_pai ?></b>, inscrit<? echo $sex_singular ?> no PIS sob nº <?php echo htmlspecialchars($_POST['pis_num']); ?>, CTPS nº <?php echo htmlspecialchars($_POST['ctps_numero']); ?>, série <?php echo htmlspecialchars($_POST['ctps_serie']); ?>-<?php echo htmlspecialchars($_POST['ctps_uf']); ?> residente e domiciliad<? echo $sex_singular ?> <?php echo htmlspecialchars($_POST['end_type']); ?> <?php echo htmlspecialchars($_POST['end_rua']); ?> nº  <?php echo htmlspecialchars($_POST['end_numero']); ?> – <?php echo htmlspecialchars($_POST['end_bairro']); ?> - CEP <?php echo htmlspecialchars($_POST['cliente_cep']); ?> -  município  de <?php echo htmlspecialchars($_POST['end_cidade']); ?>-<?php echo htmlspecialchars($_POST['end_uf']); ?>.
</p>
<p style="margin-bottom:0%;text-indent: 8.05em;">
Têm  entre justo e contratado o seguinte:
</p>
<p style="margin-bottom:0%;text-indent: 8.05em;">
1º - O primeiro  acima qualificado, de ora em diante denominad<?php echo htmlspecialchars($_POST['adv_sex_singular']); ?> simplesmente advogad<?php echo htmlspecialchars($_POST['adv_sex_singular']); ?>, face ao  mandato judicial ou extrajudicial que lhe foi outorgado, se obriga a prestar seus serviços profissionais na defesa dos direitos do segundo dos acima  qualificados, de ora em diante denominad<? echo $sex_singular ?> simplesmente outorgante, na ação  trabalhista a ser promovida contra a empresa 
<strong>
<b style="font-size:18px;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_emp']); ?></b>
</strong>
  pessoa <?php echo htmlspecialchars($_POST['emp_tipo']); ?>, inscrita no <? echo $emp_tipo_cnpjcpf ?> de <b>nº <?php echo htmlspecialchars($_POST['cnpj_cpf']); ?><? echo $other_empOn ?></b>, 
em qualquer Juízo, Instância ou  Tribunal, devendo desincumbir-se com zelo e atividade do seu encargo.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
2º - <em style="text-transform:uppercase;"><? echo $sex_singular ?></em> outorgante  pagará ao advogado em remuneração de seus serviços contratados, os honorários  advocatícios ora estabelecidos em <?php echo htmlspecialchars($_POST['adv_honorario']); ?>, inclusive sobre eventual levantamento do  FGTS junto à Caixa Econômica Federal, inclusive sobre acordo entre as partes se  houver, em qualquer fase, Instância ou Tribunal, que serão pagos da seguinte  forma:
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
a) - Em caso de  levantamento integral em espécie do valor equivalente ao processo findo, será  descontado no ato a porcentagem de <?php echo htmlspecialchars($_POST['adv_honorario']); ?>.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
Livres de imposto de renda e outros  descontos pertinentes.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
b) - Em caso de acordo  nos autos para por fim à demanda, sempre com a anuência do ora contratante, o  contratado poderá descontar seus honorários advocatícios de uma só vez à base  de <?php echo htmlspecialchars($_POST['adv_honorario']); ?> do valor total da composição, podendo também descontá-los  proporcionalmente sempre que houver o pagamento das parcelas convencionadas.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
Parágrafo único  - Os honorários recebidos da parte contrária, como sucumbência de acordo com os  percentuais previstos no artigo 20 do Código de Processo Civil, pertencerão ao  advogado ora contratado.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
3º - As  custas e despesas processuais e extrajudiciais, inclusive despesas de viagens,  diárias, etc.., correrão por conta do contratante.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
4º - O  contratante deverá fornecer ao advogado contratado os documentos, informações e  rol de testemunhas necessárias ao bom e rápido andamento da ação ou para  satisfazer exigências do processo ou extrajudiciais, etc., dentro dos prazos  legais.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
5º - Ficará  o advogado contratado isento de qualquer responsabilidade pela entrega de  documentos e cumprimento das exigências acima, quando feitas fora dos prazos  estabelecidos por lei.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
6º - O total  dos honorários poderá ser exigido imediatamente, se houver composição ou  desistência, por qualquer das partes litigantes, realizadas, dentro ou fora do  processo, por quaisquer circunstâncias não determinada pelo advogado, inclusive  caso fortuito e força maior, ou, ainda, se lhe for cessado o mandato sem culpa  do advogado contratado.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
Fica eleito  o foro da comarca de <?php echo htmlspecialchars($_POST['adv_cidade']); ?>-<?php echo htmlspecialchars($_POST['adv_estado']); ?>, para dirimir qualquer dúvida pertinente a este  contrato, com renúncia expressa de qualquer outro por mais privilegiado que  seja.
</p>
<p style="margin-top:0%;margin-bottom:0%;text-indent: 8.05em;">
E por  estarem as partes assim contratadas firmam o presente contrato particular em  duas vias de igual teor na presença de testemunhas que conhecimento tiveram ou  a tudo presenciaram.
</p>
<p style="margin-top:0%;text-indent: 8.05em;">
E por estarem  juntos e contratados, firmam o presente contrato na presença das testemunhas  abaixo, para que produza os efeitos legais.<br>
</p>
<br>
<div style="text-align:center;font-size:16px;">
<p style="text-align:center;font-family:arial;">
<?php echo htmlspecialchars($_POST['adv_cidade']); ?>, <?php echo htmlspecialchars($_POST['datahoje']); ?>
</p>
<br><br>
    <div style="margin-left:25%;margin-right:25%;width:50%;text-align:left">
    <p style="margin-bottom:-15;">
    _______________________________
    </p>
    <p style="margin-top:-15px;">
    <b style="font-size:18px;text-transform:uppercase;">
	<?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
    </b>
	<br>
    <small> - contratado</small>
    </p>
    <p style="margin-bottom:-15;">
    _______________________________
    </p>
<p style="margin-top:-15px;">
<b style="font-size:18px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['nomecompleto']); ?>
</b>
<br>
<small> - contratante</small>
</p>
    </div>
</div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="heatxt">
    <p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-bottom:0px;">
    DR. <?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?>
    </p>
<p style="text-align:center;color:#A0A0A0;font-size:18px;font-family:unifrakturcook;text-transform:uppercase;margin-top:0px;margin-bottom:0px;">
<?php echo htmlspecialchars($_POST['adv_cargo']); ?>
</p>
  <p style="text-align:center;margin-top:0px;">
  _______________________________________________________________
  </p>
	</div>
  <div style="font-size:14px;text-align:center;">
  <p>
  <strong><u><h4>DECLARAÇÃO  DE HIPOSSUFICIÊNCIA</h4></u></strong>
  </p>
  <br>
  <div style="text-align:justify; font-size:16.5px;">
  <p style="text-indent: 8.05em;">
  Eu, 
  <b style="font-size:16.5px;text-transform:uppercase;">
  <?php echo htmlspecialchars($_POST['nomecompleto']); ?>
  </b>
  , <?php echo htmlspecialchars($_POST['nacionalidade']); ?>, <?php echo htmlspecialchars($_POST['estadocivil']); ?>, <?php echo htmlspecialchars($_POST['nome_cargo']); ?>, nascid<? echo $sex_singular ?> em <?php echo htmlspecialchars($_POST['nasc_dia']); ?>  de <?php echo htmlspecialchars($_POST['nasc_mes']); ?> de <?php echo htmlspecialchars($_POST['nasc_ano']); ?>, portador<? echo $sex_or ?> da cédula de Identidade RG nº <?php echo htmlspecialchars($_POST['rg_num']); ?>-SSP/<?php echo htmlspecialchars($_POST['rg_origem']); ?>,  expedid<? echo $sex_singular ?> em <?php echo htmlspecialchars($_POST['rg_data_exp']); ?>, inscrit<? echo $sex_singular ?> no CPF/MF nº <?php echo htmlspecialchars($_POST['cliente_cpf_num']); ?>, filh<? echo $sex_singular ?> de <b style="font-size:16.5;text-transform:uppercase;"><?php echo htmlspecialchars($_POST['nome_mae']); ?></b><? echo $on_pai ?><b style="font-size:16.5;text-transform:uppercase;"><? echo $nome_pai ?></b>, inscrit<? echo $sex_singular ?> no  PIS sob nº <?php echo htmlspecialchars($_POST['pis_num']); ?>, CTPS nº <?php echo htmlspecialchars($_POST['ctps_numero']); ?>, série <?php echo htmlspecialchars($_POST['ctps_serie']); ?>-<?php echo htmlspecialchars($_POST['ctps_uf']); ?>, residente e domiciliad<? echo $sex_singular ?> <?php echo htmlspecialchars($_POST['end_type']); ?> <?php echo htmlspecialchars($_POST['end_rua']); ?> nº <?php echo htmlspecialchars($_POST['end_numero']); ?> – <?php echo htmlspecialchars($_POST['end_bairro']); ?> - CEP <?php echo htmlspecialchars($_POST['cliente_cep']); ?> - município de <?php echo htmlspecialchars($_POST['end_cidade']); ?>-<?php echo htmlspecialchars($_POST['end_uf']); ?>, <strong>DECLARO</strong> para os devidos fins de direito e sob as penas da lei que  estou desempregad<? echo $sex_singular ?> vivendo de "bicos" em estado de miserabilidade, na acepção da palavra, não podendo dispor de qualquer numerário para pagamento de custas e  outras expensas processuais sem prejuízo do meu sustento e  de minha família,  por essa razão, venho requerer os benefícios da Justiça gratuita nos termos do artigo 7º, inciso LXXIV, da Constituição Federal, combinado com a Lei 1060/1950, em seus artigos e incisos, onde couber.
  </p>
  </div>
<div style="text-align:center;">
<p style="text-align:center;font-family:arial;font-size:16px;">
<?php echo htmlspecialchars($_POST['adv_cidade']); ?>, <?php echo htmlspecialchars($_POST['datahoje']); ?>
</p>
<br>
<div style="text-align:center;">
<p style="margin-bottom:-15;">
___________________________________________________
</p>
<p style="margin-top:-15px;">
<b style="font-size:16.5px;text-transform:uppercase;">
<?php echo htmlspecialchars($_POST['nomecompleto']); ?>
</b>
</p>
</div>
</div>
  </div>
  </div>
  </div>
  </div>
  </textarea>
  <div class="page-orientation">
    <span>Orinentação de pagina:</span>
    <label><input type="radio" name="orientation" value="portrait" checked>Retrato</label>
    <label><input type="radio" name="orientation" value="landscape">Paissagem</label>
<div style="margin-top:20px;position:absolute;margin-left:45%;" class="fb-like" data-href="https://inicialtrabalhista.com" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true">
</div>
  </div>
  <button class="btn btn-primary" id="convert">
  <span class="glyphicon glyphicon-file" aria-hidden="true"></span> Baixar para word
  </button>
  <div id="download-area"></div>
<br><br>
<div id="fb-root"></div>
<script type="text/javascript">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
    tinymce.init({
      selector: '.content',
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen fullpage",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | " +
        "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | " +
        "link image"
    });
    document.getElementById('convert').addEventListener('click', function(e) {
      e.preventDefault();
      convertImagesToBase64()
      // for demo purposes only we are using below workaround with getDoc() and manual
      // HTML string preparation instead of simple calling the .getContent(). Becasue
      // .getContent() returns HTML string of the original document and not a modified
      // one whereas getDoc() returns realtime document - exactly what we need.
      var contentDocument = tinymce.get('content').getDoc();
      var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
      var orientation = document.querySelector('.page-orientation input:checked').value;
      var converted = htmlDocx.asBlob(content, {orientation: orientation});

      saveAs(converted, '<?php echo htmlspecialchars($_POST['nomecompleto']); ?>-Procuração.docx');

      var link = document.createElement('a');
      link.href = URL.createObjectURL(converted);
      link.download = '<?php echo htmlspecialchars($_POST['nomecompleto']); ?>-Procuração.docx';
      link.appendChild(
        document.createTextNode('Clique aqui para fazer download caso não inicie automaticamente'));
      var downloadArea = document.getElementById('download-area');
      downloadArea.innerHTML = '';
      downloadArea.appendChild(link);
    });

    function convertImagesToBase64 () {
      contentDocument = tinymce.get('content').getDoc();
      var regularImages = contentDocument.querySelectorAll("img");
      var canvas = document.createElement('canvas');
      var ctx = canvas.getContext('2d');
      [].forEach.call(regularImages, function (imgElement) {
        // preparing canvas for drawing
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        canvas.width = imgElement.width;
        canvas.height = imgElement.height;

        ctx.drawImage(imgElement, 0, 0);
        // by default toDataURL() produces png image, but you can also export to jpeg
        // checkout function's documentation for more details
        var dataURL = canvas.toDataURL();
        imgElement.setAttribute('src', dataURL);
      })
      canvas.remove();
    }
  </script>
</body>
</html>