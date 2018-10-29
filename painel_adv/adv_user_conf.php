<div id="include">
<?php
include '../sessao/sessao.php';
include 'config.php';


?>
</div>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Configuração do Advogadoª</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>    
    <script type="text/javascript" src="js/cep_adv.js"></script>
<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
	
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<style>
	#bt_cadastro {
	margin-left: 11%;
	margin-top: 8%;
	margin-bottom: 3%;
	}
	select[readonly] {
	  background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
	  pointer-events: none;
	  touch-action: none;
	}
video {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	min-width: 100%;
	min-height: 100%;
	width: auto;
	height: auto;
	z-index: -99;
}
	#for-container {
		position: absolute;
		left: 7%;
		height: 0%;
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
			<small><h1 class='text-center text-primary'>PAGINA DE ATUALIZAÇÃO CADASTRAL</h1></small>
		</header>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Atualização dos dados do usuário</h2>
		</header>
        </div>
        <div id="for-container">
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Configurações</li>
</ol>
						<br><br>
						<form name="signup" method="post" action="update_adv.php" onsubmit="return validateForm()">
                                    <input type="submit" class="btn btn-primary" value="Atualizar" id="bt_update_adv">
                                    <br><br>
					<div class="form-cadastro">
								<div class="form-group col-md-3" hidden="true">
									<label for="titulo">Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php print $id ?>" required>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Nome <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_nome" name="adv_nome" value="<?php print $adv_nome ?>" required readonly>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Sobrenome <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_sobre_nome" name="adv_sobre_nome" value="<?php print $adv_sobre_nome ?>" required readonly>
								</div>
                                <div class="form-group col-md-1">
                <label for="text" class="transparente">Sexo</label>
                                <div class="dropdown" data-toggle="tooltip" data-placement="top" title="Selecione a sua opção sexual">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sexo
                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><a id="adv_masc" href="#aba2">Masculino</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a id="adv_fem" href="#aba2">Feminino</a></li>
                                </ul>
                                </div>
                                <div hidden="true">
                <input type="text" class="form-control" value="<?php print $adv_sex_singular ?>" id="adv_sex_singular" name="adv_sex_singular">
                <input type="text" class="form-control" value="<?php print $adv_sex_or?>" id="adv_sex_or" name="adv_sex_or">
                				</div>
                                
<script type="text/javascript">
$(document).ready(function() {

    $("#adv_masc").click(function (){
                // desabilita o campo 
		$("#").prop("disabled",  true);
		$("#").prop("disabled",  true);
			$('#adv_sex').each(function () {
			$(this).val("masculino");
			});
			$('#cargo').each(function () {
			$(this).val("advogado");
			});
			$('#adv_sex_singular').each(function () {
			$(this).val("o");
			});
			$('#adv_sex_or').each(function () {
			$(this).val("");
			});
	});
	
    $("#adv_fem").click(function (){
                // desabilita o campo 
		$("#").prop("disabled",  false);
		$("#").prop("disabled",  false);
			$('#adv_sex').each(function () {
			$(this).val("feminino");
			});
			$('#cargo').each(function () {
			$(this).val("advogada");
			});
			$('#adv_sex_singular').each(function () {
			$(this).val("a");
			});
			$('#adv_sex_or').each(function () {
			$(this).val("a");
			});
	});
	
});

function validateForm() {
    var x = document.forms["signup"]["adv_sex"].value;
    if (x == null || x == "") {
        alert("Por favor escolha o sexo!");
		document.getElementById("dropdownMenu2").focus();
        return false;
    }
}
</script>
                                
                				</div>							                            
								<div class="form-group col-md-2">
									<label for="titulo">Sexo <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<select type="text" class="form-control" id="adv_sex" name="adv_sex" readonly>
										<option value="masculino" <?php echo $adv_sex=='masculino'?'selected':'';?> >Homem</option>
										<option value="feminino" <?php echo $adv_sex=='feminino'?'selected':'';?> >Mulher</option>
									</select>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Nacionalidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<select type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
			<option value="brasileiro" <?php echo $adv_nacionalidade=='brasileiro'?'selected':'';?> >brasileiro</option>
			<option value="brasileira" <?php echo $adv_nacionalidade=='brasileira'?'selected':'';?> >brasileira</option>
			<option value="estrangeiro" <?php echo $adv_nacionalidade=='estrangeiro'?'selected':'';?> >estrangeiro</option>
									</select>
								</div>
								<div class="form-group col-md-2">
									<label for="titulo">Estado Cívil <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<select type="text" class="form-control" id="estado_civil" name="estado_civil" required>
						<option value="solteiro" <?php echo $adv_estado_civil=='solteiro'?'selected':'';?> >Solteiro</option>
						<option value="solteira" <?php echo $adv_estado_civil=='solteira'?'selected':'';?> >Solteira</option>
						<option value="casado" <?php echo $adv_estado_civil=='casado'?'selected':'';?> >Casado</option>
						<option value="casada" <?php echo $adv_estado_civil=='casada'?'selected':'';?> >Casada</option>
						<option value="separado" <?php echo $adv_estado_civil=='separado'?'selected':'';?> >Separado</option>
						<option value="separada" <?php echo $adv_estado_civil=='separada'?'selected':'';?> >Separada</option>
						<option value="viúvo" <?php echo $adv_estado_civil=='viúvo'?'selected':'';?> >Viúvo</option>
						<option value="viúva" <?php echo $adv_estado_civil=='viúva'?'selected':'';?> >Viúva</option>
						<option value="divorciado" <?php echo $adv_estado_civil=='divorciado'?'selected':'';?> >Divorciado</option>
						<option value="divorciada" <?php echo $adv_estado_civil=='divorciada'?'selected':'';?> >Divorciada</option>
									</select>                                                  
								</div>                    	                               		
								<div class="form-group col-md-3">
									<label for="titulo">Slogan <span class="glyphicon glyphicon-question-sign icocads" data-toggle="tooltip" data-placement="top" title="Frase que será apresentada como subtítulo abaixo do seu nome em cada documento gerado Procuração/Inicial etc.."></span>
									</label>
							<input type="text" class="form-control" id="cargo" name="cargo" required value="<?php print $adv_cargo ?>">
								</div>        	                      	                      	  
								<div class="form-group col-md-2">
									<label for="titulo">OAB <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="oab" name="oab" required OnKeyPress="formatar('###.###', this)" value="<?php print $oab ?>" disabled>
								</div>          	                      	                      	  
								<div class="form-group col-md-2">
									<label for="titulo">OAB/UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<select type="text" class="form-control" id="uf_oab" name="uf_oab" required>
	<option value="AC"<?php echo $adv_uf_oab=='AC'?'selected':'';?>>Acre</option>
	<option value="AL"<?php echo $adv_uf_oab=='AL'?'selected':'';?>>Alagoas</option>
	<option value="AP"<?php echo $adv_uf_oab=='AP'?'selected':'';?>>Amapá</option>
	<option value="AM"<?php echo $adv_uf_oab=='AM'?'selected':'';?>>Amazonas</option>
	<option value="BA"<?php echo $adv_uf_oab=='BA'?'selected':'';?>>Bahia</option>
	<option value="CE"<?php echo $adv_uf_oab=='CE'?'selected':'';?>>Ceará</option>
	<option value="DF"<?php echo $adv_uf_oab=='DF'?'selected':'';?>>Distrito Federal</option>
	<option value="ES"<?php echo $adv_uf_oab=='ES'?'selected':'';?>>Espirito Santo</option>
	<option value="GO"<?php echo $adv_uf_oab=='GO'?'selected':'';?>>Goiás</option>
	<option value="MA"<?php echo $adv_uf_oab=='MA'?'selected':'';?>>Maranhão</option>
	<option value="MS"<?php echo $adv_uf_oab=='MS'?'selected':'';?>>Mato Grosso do Sul</option>
	<option value="MT"<?php echo $adv_uf_oab=='MT'?'selected':'';?>>Mato Grosso</option>
	<option value="MG"<?php echo $adv_uf_oab=='MG'?'selected':'';?>>Minas Gerais</option>
	<option value="PA"<?php echo $adv_uf_oab=='PA'?'selected':'';?>>Pará</option>
	<option value="PB"<?php echo $adv_uf_oab=='PB'?'selected':'';?>>Paraíba</option>
	<option value="PR"<?php echo $adv_uf_oab=='PR'?'selected':'';?>>Paraná</option>
	<option value="PE"<?php echo $adv_uf_oab=='PE'?'selected':'';?>>Pernambuco</option>
	<option value="PI"<?php echo $adv_uf_oab=='PI'?'selected':'';?>>Piauí</option>
	<option value="RJ"<?php echo $adv_uf_oab=='RJ'?'selected':'';?>>Rio de Janeiro</option>
	<option value="RN"<?php echo $adv_uf_oab=='RN'?'selected':'';?>>Rio Grande do Norte</option>
	<option value="RS"<?php echo $adv_uf_oab=='RS'?'selected':'';?>>Rio Grande do Sul</option>
	<option value="RO"<?php echo $adv_uf_oab=='RO'?'selected':'';?>>Rondônia</option>
	<option value="RR"<?php echo $adv_uf_oab=='RR'?'selected':'';?>>Roraima</option>
	<option value="SC"<?php echo $adv_uf_oab=='SC'?'selected':'';?>>Santa Catarina</option>
	<option value="SP"<?php echo $adv_uf_oab=='SP'?'selected':'';?>>São Paulo</option>
	<option value="SE"<?php echo $adv_uf_oab=='SE'?'selected':'';?>>Sergipe</option>
	<option value="TO"<?php echo $adv_uf_oab=='TO'?'selected':'';?>>Tocantins</option>
									</select>
								</div>           	                      	                      	  
								<div class="form-group col-md-3">
									<label for="titulo">CPF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="cpf" name="cpf" required OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" value="<?php print $adv_cpf ?>" disabled>
								</div>          	                      	                      	  
								<div class="form-group col-md-3">
									<label for="titulo">RG <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_rg" name="adv_rg" required OnKeyPress="formatar('##.###.###-#', this)" value="<?php print $adv_rg ?>">
								</div>      	                      	                      	  
								<div class="form-group col-md-2">
									<label for="titulo">SSP <span class="glyphicon glyphicon-asterisk icocads"></span></label>
				<select type="text" class="form-control" id="adv_ssp" name="adv_ssp" required>
	<option value="AC"<?php echo $adv_ssp=='AC'?'selected':'';?>>Acre</option>
	<option value="AL"<?php echo $adv_ssp=='AL'?'selected':'';?>>Alagoas</option>
	<option value="AP"<?php echo $adv_ssp=='AP'?'selected':'';?>>Amapá</option>
	<option value="AM"<?php echo $adv_ssp=='AM'?'selected':'';?>>Amazonas</option>
	<option value="BA"<?php echo $adv_ssp=='BA'?'selected':'';?>>Bahia</option>
	<option value="CE"<?php echo $adv_ssp=='CE'?'selected':'';?>>Ceará</option>
	<option value="DF"<?php echo $adv_ssp=='DF'?'selected':'';?>>Distrito Federal</option>
	<option value="ES"<?php echo $adv_ssp=='ES'?'selected':'';?>>Espirito Santo</option>
	<option value="GO"<?php echo $adv_ssp=='GO'?'selected':'';?>>Goiás</option>
	<option value="MA"<?php echo $adv_ssp=='MA'?'selected':'';?>>Maranhão</option>
	<option value="MS"<?php echo $adv_ssp=='MS'?'selected':'';?>>Mato Grosso do Sul</option>
	<option value="MT"<?php echo $adv_ssp=='MT'?'selected':'';?>>Mato Grosso</option>
	<option value="MG"<?php echo $adv_ssp=='MG'?'selected':'';?>>Minas Gerais</option>
	<option value="PA"<?php echo $adv_ssp=='PA'?'selected':'';?>>Pará</option>
	<option value="PB"<?php echo $adv_ssp=='PB'?'selected':'';?>>Paraíba</option>
	<option value="PR"<?php echo $adv_ssp=='PR'?'selected':'';?>>Paraná</option>
	<option value="PE"<?php echo $adv_ssp=='PE'?'selected':'';?>>Pernambuco</option>
	<option value="PI"<?php echo $adv_ssp=='PI'?'selected':'';?>>Piauí</option>
	<option value="RJ"<?php echo $adv_ssp=='RJ'?'selected':'';?>>Rio de Janeiro</option>
	<option value="RN"<?php echo $adv_ssp=='RN'?'selected':'';?>>Rio Grande do Norte</option>
	<option value="RS"<?php echo $adv_ssp=='RS'?'selected':'';?>>Rio Grande do Sul</option>
	<option value="RO"<?php echo $adv_ssp=='RO'?'selected':'';?>>Rondônia</option>
	<option value="RR"<?php echo $adv_ssp=='RR'?'selected':'';?>>Roraima</option>
	<option value="SC"<?php echo $adv_ssp=='SC'?'selected':'';?>>Santa Catarina</option>
	<option value="SP"<?php echo $adv_ssp=='SP'?'selected':'';?>>São Paulo</option>
	<option value="SE"<?php echo $adv_ssp=='SE'?'selected':'';?>>Sergipe</option>
	<option value="TO"<?php echo $adv_ssp=='TO'?'selected':'';?>>Tocantins</option>
				</select>
								</div> 	                      	                      	  
								<div class="form-group col-md-3">
									<label for="titulo">CEP <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="cep" name="cep" required maxlength="9" OnKeyPress="formatar('#####-###', this)" value="<?php print $adv_cep ?>">
								</div>      	                      	                      	  
								<div class="form-group col-md-3">
									<label for="titulo">Rua</label>
									<input type="text" class="form-control" id="rua" name="rua" value="<?php print $adv_rua ?>">
								</div>                                                            
								<div class="form-group col-md-1">
									<label for="titulo">Nº</label>
									<input type="text" class="form-control" id="numero_casa" name="numero_casa" value="<?php print $adv_numero_casa ?>">
								</div>                     								
								<div class="form-group col-md-2">
									<label for="titulo">Bairro</label>
									<input type="text" class="form-control" id="bairro" name="bairro" value="<?php print $adv_bairro ?>">
								</div>                         								
								<div class="form-group col-md-3">
									<label for="titulo">Cidade <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="cidade" name="cidade" required value="<?php print $adv_cidade ?>">
								</div>                         								
								<div class="form-group col-md-3">
									<label for="titulo">UF <span class="glyphicon glyphicon-asterisk icocads"></span></label>
			<select type="text" class="form-control" id="estado" name="estado" required>
	<option value="AC"<?php echo $adv_estado=='AC'?'selected':'';?>>Acre</option>
	<option value="AL"<?php echo $adv_estado=='AL'?'selected':'';?>>Alagoas</option>
	<option value="AP"<?php echo $adv_estado=='AP'?'selected':'';?>>Amapá</option>
	<option value="AM"<?php echo $adv_estado=='AM'?'selected':'';?>>Amazonas</option>
	<option value="BA"<?php echo $adv_estado=='BA'?'selected':'';?>>Bahia</option>
	<option value="CE"<?php echo $adv_estado=='CE'?'selected':'';?>>Ceará</option>
	<option value="DF"<?php echo $adv_estado=='DF'?'selected':'';?>>Distrito Federal</option>
	<option value="ES"<?php echo $adv_estado=='ES'?'selected':'';?>>Espirito Santo</option>
	<option value="GO"<?php echo $adv_estado=='GO'?'selected':'';?>>Goiás</option>
	<option value="MA"<?php echo $adv_estado=='MA'?'selected':'';?>>Maranhão</option>
	<option value="MS"<?php echo $adv_estado=='MS'?'selected':'';?>>Mato Grosso do Sul</option>
	<option value="MT"<?php echo $adv_estado=='MT'?'selected':'';?>>Mato Grosso</option>
	<option value="MG"<?php echo $adv_estado=='MG'?'selected':'';?>>Minas Gerais</option>
	<option value="PA"<?php echo $adv_estado=='PA'?'selected':'';?>>Pará</option>
	<option value="PB"<?php echo $adv_estado=='PB'?'selected':'';?>>Paraíba</option>
	<option value="PR"<?php echo $adv_estado=='PR'?'selected':'';?>>Paraná</option>
	<option value="PE"<?php echo $adv_estado=='PE'?'selected':'';?>>Pernambuco</option>
	<option value="PI"<?php echo $adv_estado=='PI'?'selected':'';?>>Piauí</option>
	<option value="RJ"<?php echo $adv_estado=='RJ'?'selected':'';?>>Rio de Janeiro</option>
	<option value="RN"<?php echo $adv_estado=='RN'?'selected':'';?>>Rio Grande do Norte</option>
	<option value="RS"<?php echo $adv_estado=='RS'?'selected':'';?>>Rio Grande do Sul</option>
	<option value="RO"<?php echo $adv_estado=='RO'?'selected':'';?>>Rondônia</option>
	<option value="RR"<?php echo $adv_estado=='RR'?'selected':'';?>>Roraima</option>
	<option value="SC"<?php echo $adv_estado=='SC'?'selected':'';?>>Santa Catarina</option>
	<option value="SP"<?php echo $adv_estado=='SP'?'selected':'';?>>São Paulo</option>
	<option value="SE"<?php echo $adv_estado=='SE'?'selected':'';?>>Sergipe</option>
	<option value="TO"<?php echo $adv_estado=='TO'?'selected':'';?>>Tocantins</option>
			</select>
								</div>                         
								<div class="form-group col-md-4">
									<label for="titulo">Complemento</label>
									<input type="text" class="form-control" id="complemento" name="complemento" value="<?php print $adv_complemento ?>">
								</div>                         
								<div class="form-group col-md-3">
									<label for="titulo">Telefone Comercial <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="tel1" name="tel1" OnKeyPress="formatar('## ####-####', this)" required maxlength="12" value="<?php print $adv_tel1 ?>">
								</div>                         								
								<div class="form-group col-md-3">
									<label for="titulo">Celular Comercial</label>
									<input type="text" class="form-control" id="tel2" name="tel2" OnKeyPress="formatar('## #####-####', this)" maxlength="13" value="<?php print $adv_tel2 ?>">
								</div>                         
								<div class="form-group col-md-3">
									<label for="titulo">Outros Telefone</span></label>
									<input type="text" class="form-control" id="tel3" name="tel3" OnKeyPress="formatar('## ####-####', this)" maxlength="13" value="<?php print $adv_tel3 ?>">
								</div>
								<div class="form-group col-md-1">
									<label for="titulo" class="transparente">Lucro</span></label>
						<div class="dropdown" data-toggle="tooltip" data-placement="top" title="Escolher forma de pagamentos dos honôrarios advocaticios cobrado">
						<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
						Ganhos
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
						<li><a id="hono_porc" href="#aba2">Porcentual</a></li>
						<li role="separator" class="divider"></li>
						<li><a id="hono_vl" href="#aba2">Valor Fixo</a></li>						
						</ul>
						</div>	 
								</div>
<script type="text/javascript">
$(document).ready(function() {

    $("#hono_vl").click(function (){
		$("#adv_honorario").prop("disabled",  false);
		$("#adv_honorario2").prop("disabled",  true);
	});
	
    $("#hono_porc").click(function (){
		$("#adv_honorario").prop("disabled",  false);
		$("#adv_honorario2").prop("disabled",  true);
	});
	
});

</script>
								<div class="form-group col-md-2">
									<label for="titulo">Honôrarios <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<select type="text" class="form-control" id="adv_honorario" name="adv_honorario" required>
										<option value="" <?php echo $adv_uf_oab==''?'selected':'';?> >selecionar</option>
										<option value="50%" <?php echo $adv_honorario=='50%'?'selected':'';?> >50%</option>
										<option value="49%" <?php echo $adv_honorario=='49%'?'selected':'';?> >49%</option>
										<option value="48%" <?php echo $adv_honorario=='48%'?'selected':'';?> >48%</option>
										<option value="47%" <?php echo $adv_honorario=='47%'?'selected':'';?> >47%</option>
										<option value="46%" <?php echo $adv_honorario=='46%'?'selected':'';?> >46%</option>
										<option value="45%" <?php echo $adv_honorario=='45%'?'selected':'';?> >45%</option>
										<option value="44%" <?php echo $adv_honorario=='44%'?'selected':'';?> >44%</option>
										<option value="43%" <?php echo $adv_honorario=='43%'?'selected':'';?> >43%</option>
										<option value="42%" <?php echo $adv_honorario=='42%'?'selected':'';?> >42%</option>
										<option value="41%" <?php echo $adv_honorario=='41%'?'selected':'';?> >41%</option>
										<option value="40%" <?php echo $adv_honorario=='40%'?'selected':'';?> >40%</option>
										<option value="39%" <?php echo $adv_honorario=='39%'?'selected':'';?> >39%</option>
										<option value="38%" <?php echo $adv_honorario=='38%'?'selected':'';?> >38%</option>
										<option value="37%" <?php echo $adv_honorario=='37%'?'selected':'';?> >37%</option>
										<option value="36%" <?php echo $adv_honorario=='36%'?'selected':'';?> >36%</option>
										<option value="35%" <?php echo $adv_honorario=='35%'?'selected':'';?> >35%</option>
										<option value="34%" <?php echo $adv_honorario=='34%'?'selected':'';?> >34%</option>
										<option value="33%" <?php echo $adv_honorario=='33%'?'selected':'';?> >33%</option>
										<option value="32%" <?php echo $adv_honorario=='32%'?'selected':'';?> >32%</option>
										<option value="31%" <?php echo $adv_honorario=='31%'?'selected':'';?> >31%</option>
										<option value="30%" <?php echo $adv_honorario=='30%'?'selected':'';?> >30%</option>
										<option value="29%" <?php echo $adv_honorario=='29%'?'selected':'';?> >29%</option>
										<option value="28%" <?php echo $adv_honorario=='28%'?'selected':'';?> >28%</option>
										<option value="27%" <?php echo $adv_honorario=='27%'?'selected':'';?> >27%</option>
										<option value="26%" <?php echo $adv_honorario=='26%'?'selected':'';?> >26%</option>
										<option value="25%" <?php echo $adv_honorario=='25%'?'selected':'';?> >25%</option>
										<option value="24%" <?php echo $adv_honorario=='24%'?'selected':'';?> >24%</option>
										<option value="23%" <?php echo $adv_honorario=='23%'?'selected':'';?> >23%</option>
										<option value="22%" <?php echo $adv_honorario=='22%'?'selected':'';?> >22%</option>
										<option value="21%" <?php echo $adv_honorario=='21%'?'selected':'';?> >21%</option>
										<option value="20%" <?php echo $adv_honorario=='20%'?'selected':'';?> >20%</option>
										<option value="19%" <?php echo $adv_honorario=='19%'?'selected':'';?> >19%</option>
										<option value="18%" <?php echo $adv_honorario=='18%'?'selected':'';?> >18%</option>
										<option value="17%" <?php echo $adv_honorario=='17%'?'selected':'';?> >17%</option>
										<option value="16%" <?php echo $adv_honorario=='16%'?'selected':'';?> >16%</option>
										<option value="15%" <?php echo $adv_honorario=='15%'?'selected':'';?> >15%</option>
										<option value="14%" <?php echo $adv_honorario=='14%'?'selected':'';?> >14%</option>
										<option value="13%" <?php echo $adv_honorario=='13%'?'selected':'';?> >13%</option>
										<option value="12%" <?php echo $adv_honorario=='12%'?'selected':'';?> >12%</option>
										<option value="11%" <?php echo $adv_honorario=='11%'?'selected':'';?> >11%</option>
										<option value="10%" <?php echo $adv_honorario=='10%'?'selected':'';?> >10%</option>
										<option value="9%" <?php echo $adv_honorario=='9%'?'selected':'';?> >9%</option>
										<option value="8%" <?php echo $adv_honorario=='8%'?'selected':'';?> >8%</option>
										<option value="7%" <?php echo $adv_honorario=='7%'?'selected':'';?> >7%</option>
										<option value="6%" <?php echo $adv_honorario=='6%'?'selected':'';?> >6%</option>
										<option value="5%" <?php echo $adv_honorario=='5%'?'selected':'';?> >5%</option>
										<option value="4%" <?php echo $adv_honorario=='4%'?'selected':'';?> >4%</option>
										<option value="3%" <?php echo $adv_honorario=='3%'?'selected':'';?> >3%</option>
										<option value="2%" <?php echo $adv_honorario=='2%'?'selected':'';?> >2%</option>
										<option value="1%" <?php echo $adv_honorario=='1%'?'selected':'';?> >1%</option>
									</select>
									<input type="text" class="form-control" id="adv_honorario2" name="adv_honorario2" value="R$" disabled>
								</div>                         
					</div>
                        </form>
		</div>
</body>
</html>