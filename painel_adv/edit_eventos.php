<div id="include">
<?php
require_once("../config.php");
require_once("../sessao/sessao.php");
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Editar Evento < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
}
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
$id_evento_hide = intval($_GET['evento']);

$sqli = "SELECT *, TIME_FORMAT(start_h, '%H:%i') AS start_h, TIME_FORMAT(and_h, '%H:%i') AS and_h FROM agendamentos WHERE id = '$id_evento_hide'";
	
        $sqli_result = mysqli_query($conexao, $sqli);
        $dado = mysqli_fetch_assoc($sqli_result);	
	
	$pasta_id = $dado['pasta_id'];
	$adv_id = $dado['adv_id'];
	$parte1 = $dado['parte1'];
	$parte2 = $dado['parte2'];
	$start_d = $dado['start_d'];
	$start_h = $dado['start_h'];
	$and_d = $dado['and_d'];
	$and_h = $dado['and_h'];
	$comarca_city = $dado['comarca'];
	$vara = $dado['vara'];
	$allday = $dado['allday'];
	$classname = $dado['classname'];
	$proc_num = $dado['proc_num'];
	  
if(isset($dado['proc_num']) && $dado['proc_num'] == ""){
  $proc_num_off = "";
}else{
  $proc_num_off = "readonly";
}
	$andamento = $dado['andamento'];
	$nota = $dado['nota'];

?>
<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>Editar eventos</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Editar eventos do calendario</h2>
		</header>
</div>
<br>
<br>
<div id="for-container">
<br>
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li><a href="ver_pasta.php">Visualizar pastas</a></li>
<li class="active">Adicionar nova pasta</li>
</ol>
<br>
		<form name="add_event" method="post" action="editando_eventos.php">
		<p><input type="submit" class="btn btn-primary" value="Atualizar"/></p>
		<br>
				<div class="form-group col-md-1" hidden="">
					<label for="titulo">ID agendamentos <span class="glyphicon glyphicon-asterisk icocads"></span></label>
					<input type="text" class="form-control" id="agenda_id" name="agenda_id" value="<?php echo $id_evento_hide ?>" required readonly>
				</div>
				<div class="form-group col-md-1" hidden="">
					<label for="titulo">Adv Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
					<input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php echo $adv_id ?>" required>
				</div>
				<div class="form-group col-md-3">
					<label for="titulo">Nº de Processo <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Uma vez cadastrado não será possivel alterar o número de processo!"></span></label>
					<input type="text" class="form-control" id="proc_num" name="proc_num" OnKeyPress="formatar('#######.##.####.#.##.####', this)" maxlength="25" value="<?php print $proc_num ?>" <?php echo $proc_num_off ?>>
				</div>
				<div class="form-group col-md-2">
					<label for="titulo">Fórum Comarca</label>
					<select type="text" class="form-control chosen-select" data-placeholder="Buscar comarcas do Brasil..." id="comarca" name="comarca" required>
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
					<option value="Suzano-SP" <?php echo $comarca_city=='Suzano-SP'?'selected':'';?> >Suzano</option>
					<option value="Taboão da Serra-SP" <?php echo $comarca_city=='Taboão da Serra-SP'?'selected':'';?> >Taboão da Serra</option>
					</select>
				</div>
				<div class="form-group col-md-1">
					<label for="titulo">Vara</label>
					<input type="number" class="form-control" id="vara" name="vara" value="<?php print $vara ?>">
				</div>
				<div class="form-group col-md-3">
					<label for="titulo">Requerente <span class="glyphicon glyphicon-asterisk icocads"></span></label>
					<input type="text" class="form-control" id="parte1" name="parte1" value="<?php print $parte1 ?>" required>
				</div>
				<div class="form-group col-md-3">
					<label for="titulo">Requerido <span class="glyphicon glyphicon-asterisk icocads"></span></label>
					<input type="text" class="form-control" id="parte2" name="parte2" value="<?php print $parte2 ?>" required>
				</div>
				<div class="form-group col-md-3">
					<label for="titulo">Vincular pasta/arquivo</label>
		<select type="text" class="form-control" id="pasta_id" name="pasta_id">
				<option value=""<?php echo $pasta_id==''?'selected':'';?>>selecionar</option>
				<optgroup label="Nº | Requerente VS Requerido">
			<?
				$sqli = "SELECT *, arquivo.id AS id_pasta FROM arquivo INNER JOIN advogads ON (arquivo.adv_pasta_id = advogads.id) WHERE arquivo.adv_pasta_id = '$adv_id' ORDER BY pasta_n ASC";
				$id_pasta = $row['id_pasta'];
				$pasta_n = $row['pasta_n'];
				$parte_1 = $row['parte_1'];
				$parte_2 = $row['parte_2'];	
					$sqli_result = mysqli_query($conexao, $sqli);
						while ($row = mysqli_fetch_assoc($sqli_result)){
						$id_pasta = $row['id_pasta'];
						$pasta_n = $row['pasta_n'];
						$parte_1 = $row['parte_1'];
						$parte_2 = $row['parte_2'];
			?>

<option value="<?=$id_pasta;?>" <? if($id_pasta==$pasta_id)echo "Selected";?>><?=$pasta_n?> = <?=$parte_1?> VS <?=$parte_2;?></option>
			<?
				}
			?>
		</select>
				</div> 
				<div class="form-group col-md-3">
					<label for="titulo">Andamento processual</label>
					<select type="text" class="form-control" id="andamento" name="andamento">
						<option value=""<?php echo $andamento==''?'selected':'';?>>selecionar</option>
						<option value="01"<?php echo $andamento=='01'?'selected':'';?>>Distribuição</option>
						<option value="02"<?php echo $andamento=='02'?'selected':'';?>>Audiência agendada</option>
						<option value="03"<?php echo $andamento=='03'?'selected':'';?>>Audiência inicial</option>
						<option value="04"<?php echo $andamento=='04'?'selected':'';?>>Audiência de instrução</option>
						<option value="05"<?php echo $andamento=='05'?'selected':'';?>>Audiência de julgamento</option>
						<option value="06"<?php echo $andamento=='06'?'selected':'';?>>Segundo grau</option>
						<option value="07"<?php echo $andamento=='07'?'selected':'';?>>Tribunal superior do trabalho</option>
						<option value="08"<?php echo $andamento=='08'?'selected':'';?>>Execução</option>
						<option value="09"<?php echo $andamento=='09'?'selected':'';?>>Pagamento</option>
						<option value="10"<?php echo $andamento=='10'?'selected':'';?>>Em busca de bens</option>
						<option value="11"<?php echo $andamento=='11'?'selected':'';?>>Ausência de bens</option>
						<option value="12"<?php echo $andamento=='12'?'selected':'';?>>Arquivado</option>
					</select>
				</div> 
				<div class="form-group col-md-5">
					<label for="titulo">Tipo de agendamento <span class="glyphicon glyphicon-asterisk icocads"></label>
					<select type="text" class="form-control" id="classname" name="classname" required>
						<option value="01"<?php echo $classname=='01'?'selected':'';?>>Trabalhista</option>
						<option value="02"<?php echo $classname=='02'?'selected':'';?>>Cívil</option>
						<option value="03"<?php echo $classname=='03'?'selected':'';?>>Familiar</option>
						<option value="04"<?php echo $classname=='04'?'selected':'';?>>Criminal</option>
						<option value="05"<?php echo $classname=='05'?'selected':'';?>>Pequenas causas</option>
						<option value="06"<?php echo $classname=='06'?'selected':'';?>>Outros</option>
					</select>           
				</div> 
				<div class="form-group col-md-2">
					<label for="titulo">Data inicial <span class="glyphicon glyphicon-asterisk icocads"></label>
					<input type="date" class="form-control" id="start_d" name="start_d" value="<?php print $start_d ?>" required>
				</div>
				<div class="form-group col-md-2">
					<label for="titulo">Horario inicial <span class="glyphicon glyphicon-asterisk icocads"></label>
					<input type="time" class="form-control" id="start_h" name="start_h" value="<?php print $start_h ?>" required>
				</div>
				<div class="form-group col-md-1">
					<label for="titulo">Dia inteiro</label>
					<input type="checkbox" class="form-control" <?php echo $allday=='true'?'checked':'';?> id="allday" name="allday" value="true">
					
					
				</div> 
				<div class="form-group col-md-2">
					<label for="titulo">Data final</label>
					<input type="date" class="form-control" id="and_d" name="and_d" value="<?php print $and_d ?>">
				</div>
				<div class="form-group col-md-2">
					<label for="titulo">Horario final</label>
					<input type="time" class="form-control" id="and_h" name="and_h" value="<?php print $and_h ?>">
				</div>                             
				<div class="form-group col-md-12">
					<label for="titulo">Observações Processuais</label>
					<textarea type="time" class="form-control" id="nota" name="nota" rows="5" maxlength="5000" placeholder="Digite sua observação resumida em até 5000 caracteres..."><?php print $nota ?></textarea>
				</div>
		</form>
</div>
</body>
</html>