<div id="include">
<?php
require_once("../sessao/sessao.php");
require_once("../config.php");
?>
</div>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Editar Arquivos/Pastas < Inicial Trabalhista</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
<script type="text/javascript">
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
include 'menu_nav.php';
?>
</header>
<?php 
$id_arq_hide = intval($_GET['arquivo']);

	$sql = ("SELECT *, TIME_FORMAT(horas_audiencia, '%H:%i') AS horas_audiencia FROM arquivo WHERE id = '$id_arq_hide'");
	$sqli_result = mysqli_query($conexao, $sql);
	$dado = mysqli_fetch_assoc($sqli_result);		  
		  
	$parte_1 = $dado['parte_1'];
	$parte_2 = $dado['parte_2'];
	$data_audiencia = $dado['data_audiencia'];
	$horas_audiencia = $dado['horas_audiencia'];
	$pasta_n = $dado['pasta_n'];
	$status_proc = $dado['status_proc'];
	$andress_dead = $dado['andress_dead'];
	if(isset($dado['andamento']) && $dado['andamento'] == "morto" || $dado['andamento'] == "desistente" || $dado['andamento'] == "incompleto"){
		$andress_dead_hide = "";
	}else{
		$andress_dead_hide = "hidden";	
	}
		  
	$andamento = $dado['andamento'];
?>
	<div class='container'>
		<header class="row">
			<h1 class='text-center text-primary'>ATUALIZAÇÃO DE PASTAS E ARQUIVOS</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Informações de arquivo</h2>
		</header>
    </div>
    <br>
    <br>
        <div id="for-container">
    <br>
    <ol class="breadcrumb">
    <li><a href="index.php">Home</a></li>
    <li><a href="ver_pasta.php">Lista pastas & arquivos</a></li>
    <li class="active">Atualizar pastas & arquivos</li>
    </ol>
						<form name="signup" method="post" action="editando_arq.php">
					    <p>
                        <input type="submit" class="btn btn-primary" value="Atualizar"/>
						</p>
                        <br>
                                <div class="form-group col-md-1" hidden="">
                <input type="text" class="form-control" id="id_arq_hide" name="id_arq_hide" required="required" value="<?php print $id_arq_hide ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamante <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte_1" name="parte_1" value="<?php print $parte_1 ?>" onkeypress="return sem_acento(event);" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamada <span class="glyphicon glyphicon-asterisk icocads"></span></label>
                                    <input type="text" class="form-control" id="parte_2" name="parte_2" value="<?php print $parte_2 ?>" onkeypress="return sem_acento(event);" required>
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
                                    <label for="titulo">Numero da pasta <span class="glyphicon glyphicon-asterisk icocads"></span> <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Uma vez que for cadastrado o número da pasta não pode ser alterado"></span></label>
               						<input type="number" class="form-control" id="pasta_n" name="pasta_n" value="<?php print $pasta_n ?>" required readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data Audiencia</label>
               						<input type="date" class="form-control" id="data_audiencia" name="data_audiencia" value="<?php print $data_audiencia ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horas Audiencia</label>
               						<input type="time" class="form-control" id="horas_audiencia" name="horas_audiencia" value="<?php print $horas_audiencia ?>" maxlength="6">
                                </div>
								<div class="form-group col-md-3 has-warning">
								<label for="titulo">Situação</label>
								<select class="form-control" id="andamento" name="andamento" onChange="OnMorto()">
						<option value="" <?php echo $andamento==''?'selected':'';?>>-- Normal --</option>
						<option value="morto" <?php echo $andamento=='morto'?'selected':'';?>>Arquivo morto</option>
						<option value="desistente" <?php echo $andamento=='desistente'?'selected':'';?>>Desistente</option>
						<option value="incompleto" <?php echo $andamento=='incompleto'?'selected':'';?>>Incompleto</option>
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
								
								<div class="form-group col-md-4 has-error" id="andress_dead" <?php echo $andress_dead_hide ?>>
								<label for="titulo">Local do arquivo morto/outros</label>
									<input type="text" class="form-control" id="andress_dead" name="andress_dead" value="<?php print $andress_dead ?>">
								</div>

                                <div class="form-group col-md-12">
                                    <label for="titulo">Observações Processuais</label>
<textarea type="time" class="form-control" id="status_proc" name="status_proc" rows="5" maxlength="5000" placeholder="Digite sua observação resumida em até 5000 caracteres..."><?php print $status_proc ?></textarea>
                                </div>
                        </form>
        </div>
</body>
</html>

