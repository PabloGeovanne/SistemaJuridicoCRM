<div id="include">
<?php
include_once("../config.php");
include('../sessao/sessao.php');
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Adicionar Evento < Inicial Trabalhista</title>
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
  
}</script>
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
include 'menu_nav.php';
?>
</header>
<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>Adicionar novos eventos</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Adicionar eventos ao calendario</h2>
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
						<form name="add_event" method="post" action="adicionando_eventos.php">
                        <p><input type="submit" class="btn btn-primary" value="Agendar"/></p>
                        <br>
                                <div class="form-group col-md-1" hidden="true">
                                    <label for="titulo">Adv Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php echo $adv_id ?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Nº de Processo</label>
                                    <input type="text" class="form-control" id="proc_num" name="proc_num" OnKeyPress="formatar('#######.##.####.#.##.####', this)" maxlength="25">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Fórum Comarca </label>
                                    <select type="text" class="form-control" id="comarca" name="comarca">
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
                                    <option value="Suzano-SP">Suzano-SP</option>
                                    <option value="Taboão da Serra-SP">Taboão da Serra-SP</option>
									</select>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="titulo">Vara</label>
                                    <input type="number" class="form-control" id="vara" name="vara">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Requerente <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte1" name="parte1" required>
                                </div>                                                                
                                <div class="form-group col-md-3">
                                    <label for="titulo">Requerido <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte2" name="parte2" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Vincular pasta/arquivo</label>
                                    <select type="text" class="form-control" id="pasta_id" name="pasta_id">
                                <optgroup label="vazio">
									<option value="" selected>selecionar</option>
								<optgroup label="Nº = Requerente VS Requerido">
                               <?php 
					$sqli = "SELECT *, arquivo.id AS id_pasta FROM arquivo INNER JOIN advogads ON (arquivo.adv_pasta_id = advogads.id) WHERE arquivo.adv_pasta_id = '$adv_id' ORDER BY pasta_n ASC";
										   
					$sqli_result = mysqli_query($conexao, $sqli);
					while ($row = mysqli_fetch_assoc($sqli_result)){
					$id_pasta = $row['id_pasta'];
					$pasta_n = $row['pasta_n'];
					$parte_1 = $row['parte_1'];
					$parte_2 = $row['parte_2'];
						echo "<option value='$id_pasta'>$pasta_n = $parte_1 VS $parte_2</option>";
					}
                                ?>
									</select>
                                </div> 
                                <div class="form-group col-md-3">
                                    <label for="titulo">Andamento processual</label>
                                    <select type="text" class="form-control" id="andamento" name="andamento">
                                    	<option value="">selecionar</option>
                                    	<option value="01">Distribuição/Marcação de Audiência</option>
                                    	<option value="02">Audiência agendada</option>
                                    	<option value="03">Audiência inicial</option>
                                    	<option value="04">Audiência de instrução</option>
                                    	<option value="05">Audiência de julgamento</option>
                                    	<option value="06">Segundo grau</option>
                                    	<option value="07">Tribunal superior do trabalho</option>
                                    	<option value="08">Execução</option>
                                    	<option value="09">Pagamento</option>
                                    	<option value="10">Em busca de bens</option>
                                    	<option value="11">Ausência de bens</option>
                                    	<option value="12">Arquivado</option>
									</select>
                                </div> 
                                <div class="form-group col-md-5">
                                    <label for="titulo">Tipo de agendamento <span class="glyphicon glyphicon-asterisk icocads"></label>
                                    <select type="text" class="form-control" id="classname" name="classname" required>
                                    	<option value="01" selected>Trabalhista</option>
                                    	<option value="02">Cívil</option>
                                    	<option value="03">Familiar</option>
                                    	<option value="04">Criminal</option>
                                    	<option value="05">Pequenas causas</option>
                                    	<option value="06">Outros</option>
									</select>
                                </div> 
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data inicial <span class="glyphicon glyphicon-asterisk icocads"></label>
               						<input type="date" class="form-control" id="start_d" name="start_d" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horario inicial <span class="glyphicon glyphicon-asterisk icocads"></label>
               						<input type="time" class="form-control" id="start_h" name="start_h" required>
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="titulo">Dia inteiro</label>
                                    <input type="checkbox" class="form-control" id="allday" name="allday" value="true">
                                </div> 
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data final</label>
               						<input type="date" class="form-control" id="and_d" name="and_d">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horario final</label>
               						<input type="time" class="form-control" id="and_h" name="and_h">
                                </div>                                
                                <div class="form-group col-md-12">
                                    <label for="titulo">Observações Processuais</label>
               						<textarea type="time" class="form-control" id="nota" name="nota" rows="5" maxlength="5000" placeholder="Digite sua observação resumida em até 5000 caracteres..."></textarea>
                                </div>
                        </form>
</div>
</body>
</html>