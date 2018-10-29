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
<title>Senha do Usuário</title>
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
			<small><h1 class='text-center text-primary'>PAGINA DE SENHA</h1></small>
		</header>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Alteração de senha do usuário</h2>
		</header>
        </div>
        <div id="for-container">
<ol class="breadcrumb">
<li><a href="index.php">Home</a></li>
<li class="active">Alterar senha</li>
</ol>
						<br><br>
						<form name="signup" method="post" action="update_pw.php">
                                    <input type="submit" class="btn btn-primary" value="Alterar" id="bt_update_adv">
                                    <br><br><br>
					<div class="form-cadastro">
								<div class="form-group col-md-3" hidden="true">
									<label for="titulo">Id <span class="glyphicon glyphicon-asterisk icocads"></span></label>
				<input type="text" class="form-control" id="adv_id" name="adv_id" value="<?php print $id ?>" required>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Senha antiga <span class="glyphicon glyphicon-asterisk icocads"></span></label>
				<input type="password" class="form-control" id="pw_ant" name="pw_ant" value="<?php print $senha ?>" required>
								</div> 
								<div class="form-group col-md-3">
									<label for="titulo">Nova senha <span class="glyphicon glyphicon-asterisk icocads"></span></label>
				<input type="password" class="form-control" id="pw_new" name="pw_new" value="" required>
								</div> 
								<div class="form-group col-md-3">
							<label for="titulo">Repetir nova senha <span class="glyphicon glyphicon-asterisk icocads"></span></label>
				<input type="password" class="form-control" id="pw_rep_new" name="pw_rep_new" value="" required>
								</div>
					</div>
                        </form>
		</div>
</body>
</html>