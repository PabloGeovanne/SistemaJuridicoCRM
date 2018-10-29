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
<title>Configuração do Usuário</title>
<link href="css/estilo.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>    
<script>

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
		left: 10%;
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
			<small><h1 class='text-center text-primary'>PAGINA DE USUÁRIO</h1></small>
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
<li class="active">Usuário</li>
</ol>
						<br><br>
						<form name="signup" method="post" action="update_user.php">
                                    <input type="submit" class="btn btn-primary" value="Alterar" id="bt_update_adv">
                                    <br><br><br>
					<div class="form-cadastro">
								<div class="form-group col-md-3" hidden="true">
									<label for="titulo">Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php print $id ?>" required>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo" class="transparente">Foto </label>
									<img src="data:image/png;base64,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" alt="140x140" class="img-circle img-thumbnail">
									<br><br>
									<center>
									<label class="btn btn-danger btn-file disabled">
										Anexar imagem <input type="file" style="display: none;" id="" name="" size="40"  onchange='$("#upload-file-info").html($(this).val());' disabled>
									</label>
									<span class='label label-info' id="upload-file-info"></span>
									</center>
									</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Nome <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="nome" name="nome" value="<?php print $adv_nome ?>" required>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Sobre nome <span class="glyphicon glyphicon-asterisk icocads"></span></label>
									<input type="text" class="form-control" id="adv_sobre_nome" name="adv_sobre_nome" value="<?php print $adv_sobre_nome ?>" required>
								</div>
					</div>
                        </form>
		</div>
</body>
</html>