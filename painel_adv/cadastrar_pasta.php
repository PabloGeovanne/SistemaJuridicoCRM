<div id="include">
<?php
include_once("../config.php");
include('../sessao/sessao.php');

        $sqli = "SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]' LIMIT 1";
        $sqli_result = mysqli_query($conexao, $sqli);
        $resultado = mysqli_fetch_assoc($sqli_result);
	
		$id_adv   = $resultado['id'];

?>
<?php
$consulta1 = "SELECT pasta_n FROM arquivo 
INNER JOIN advogads ON (arquivo.adv_pasta_id = advogads.id) 
WHERE arquivo.adv_pasta_id = '$id_adv'
ORDER BY arquivo.data_cadastro DESC LIMIT 1" or die(mysqli_error($consulta1));
$conexao1 = $conexao->query($consulta1) or die($conexao->error);
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Cadastro de pasta < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
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
include 'menu_nav.php';
?>
</header>
<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>Cadastro de novas pastas</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Cadastro de pasta/arquivos</h2>
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
     <?php while($dado1 = $conexao1->fetch_array()){ ?>
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<p>
	<b>Atenção!</b> A ultima pasta adicionada foi de nº: <b><?php print $dado1["pasta_n"]; ?></b> à proxima deverá ser nº: <b><?php print $dado1["pasta_n"]+1; ?></b>?
</p>
</div>
    <?php } ?>
					<br>					
						<form name="signup" method="post" action="cadastrando_pasta.php">
                        <p><input type="submit" class="btn btn-primary" value="Cadastrar"/></p>
                        <br>
                                <div class="form-group col-md-1" hidden="true">
                                    <label for="titulo">Adv Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php print $adv_id ?>" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte requerente <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte_1" name="parte_1" onkeypress="return sem_acento(event);" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte requerido <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte_2" name="parte_2" onkeypress="return sem_acento(event);" required>
<script type="text/javascript">
	function sem_acento(e,args)
	{		
	if (document.all){var evt=event.keyCode;} // caso seja IE
	else{var evt = e.charCode;}	// do contrário deve ser Mozilla
	var valid_chars = '0123456789abcdefghijlmnopqrstuvxzwykABCDEFGHIJLMNOPQRSTUVXZWYKãõ-_ '+args;	// criando a lista de teclas permitidas
	var chr= String.fromCharCode(evt);	// pegando a tecla digitada
	if (valid_chars.indexOf(chr)>-1 ){return true;}	// se a tecla estiver na lista de permissão permite-a
	// para permitir teclas como <BACKSPACE> adicionamos uma permissão para 
	// códigos de tecla menores que 09 por exemplo (geralmente uso menores que 20)
	if (valid_chars.indexOf(chr)>-1 || evt < 9){return true;}	// se a tecla estiver na lista de permissão permite-a
	return false;	// do contrário nega
	}	
</script>	
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Numero da pasta <span class="glyphicon glyphicon-asterisk icocads"></span> <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="É possivel cadastrar o endereço da pasta apenas por numeração de 0 à indeterminado valores"></span></label>
               						<input type="number" class="form-control" id="pasta_num" name="pasta_num" value="" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data Audiencia</label>
               						<input type="date" class="form-control" id="data_audiencia" name="data_audiencia">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horas Audiencia</label>
               						<input type="time" class="form-control" id="horas_audiencia" name="horas_audiencia">
                                </div>
								<div class="form-group col-md-3 has-warning">
								<label for="titulo">Situação</label>
									<select class="form-control" id="andamento" name="andamento" onChange="OnMorto()">
										<option value="" selected>-- Normal --</option>
										<option value="morto">Arquivo morto</option>
										<option value="desistente">Desistente</option>
										<option value="incompleto">Incompleto</option>
									</select>
								</div>
								<script type="text/javascript">
									function OnMorto() {
									var x = document.getElementById("andamento").value;

								if(x == "") {
										$("#andress_dead").hide();
										}else{
										$("#andress_dead").show();
										}

								}
								</script>
								<div class="form-group col-md-4 has-error" id="andress_dead" hidden="true">
								<label for="titulo">Local do arquivo morto</label>
									<input type="text" class="form-control" id="andress_dead" name="andress_dead">
								</div>
                                                                                               
                                <div class="form-group col-md-12">
                                    <label for="titulo">Observações Processuais</label>
               						<textarea type="time" class="form-control" id="status_proc" name="status_proc" rows="5" maxlength="5000" placeholder="Digite sua observação resumida em até 5000 caracteres..."></textarea>
                                </div>
                        </form>
</div>
</body>
</html>
