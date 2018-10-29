<div id="include">
<?php
include '../../sessao/sessao.php';
include '../config.php';
?>
</div>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Cadastro de Clientes - Adv</title>
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../css/jquery-ui.min.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>

<script>
function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}

</script>


</head>

<body>
<header>
<?php
include '../menu_nav.php';
?>
</header>
<?php 

$id_emp_hide = $_GET['empresa'];

      $sql = mysql_query("SELECT * FROM arquivo WHERE id = '$id_pasta_hide'");
	
      while($dado = mysql_fetch_array($sql)){
		  
	$id = $dado['id'];
	$parte_1 = $dado['parte_1'];
	$parte_2 = $dado['parte_2'];
	$data_audiencia = $dado['data_audiencia'];
	$horas_audiencia = $dado['horas_audiencia'];
	$pasta_n = $dado['pasta_n'];
	$status_proc = $dado['status_proc'];

?>

	<div class='container cont'>
		<header class="row">
			<h1 class='text-center text-primary'>ATUALIZAÇÃO DE DADOS RECLAMADA</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Dados da empresa</h2>
		</header>
        </div>
    <br>
    <br>
        <div id="for-container">
    <br>
                <div id="cadastro">
    <ol class="breadcrumb">
    <li><a href="../index.php">Home</a></li>
    <li class="active">Atualizar reclamada</li>
    </ol>
						<form name="signup" method="post" action="../editando_empresa.php">
                        <p><input type="submit" class="btn btn-primary" value="Atualizar"/></p>
                        <br>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamante</label>
                                    <input type="text" class="form-control" value="<?php print $parte_1 ?>" id="parte_1" name="parte_1" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamada</label>
                                    <input type="text" class="form-control" value="<?php print $parte_2 ?>" id="parte_2" name="parte_2" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data Audiencia</label>
               						<input type="date" class="form-control" value="<?php print $data_audiencia ?>" id="data_audiencia" name="data_audiencia">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horas Audiencia</label>
               						<input type="time" class="form-control" value="<?php print $horario_audiencia ?>" id="horas_audiencia" name="horas_audiencia">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Pasta arquivada</label>
               						<input type="text" class="form-control" value="<?php print $pasta_n ?>" id="pasta_n" name="pasta_n" readonly>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="titulo">Situação do Processo</label>
               						<textarea type="time" class="form-control" id="status_proc" name="status_proc" rows="5">
                                    <?php print $status_proc ?>
                                    </textarea>
                                <div class="form-group col-md-4">
                                    <label for="titulo">ID "Digito unico de identificação"</label>
                                    <input type="text" class="form-control" value="<?php print $id ?>" id="parte_1" name="parte_1" required>
                                </div>
                        </form>
               	</div>
                </div>
<?php } ?>
</body>
</html>
