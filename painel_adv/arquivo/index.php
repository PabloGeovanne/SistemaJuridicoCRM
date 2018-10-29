<div id="include">
<?php
include '../../sessao/sessao.php';
?>
</div>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>Cadastro de Arquivos - Adv</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
</head>

<body>
	<div class='container cont'>
		<header class="row">
			<h1 class='text-center text-primary'>Cadastro de Pasta aquivos</h1>
		</header>
		<br>
		<div class="row">
		</div>
		<header class="row">
			<h2 class='text-center text-danger'>Dados do arquivo</h2>
		</header>
    </div>

<br>
        <br>
        <div id="for-container">
        <br>
<ol class="breadcrumb">
<li><a href="../index.php">Home</a></li>
<li><a href="arquivos_ver.php">Arquivo geral</a></li>
<li class="active">Adicionar arquivo</li>
</ol>
						<form name="signup" method="post" action="add_pasta.php">
                        <p><input type="submit" class="btn btn-primary" value="Salvar"/></p>
                        <br>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamante</label>
                                    <input type="text" class="form-control" id="parte_1" name="parte_1" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="titulo">Parte Reclamada</label>
                                    <input type="text" class="form-control" id="parte_2" name="parte_2" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Pasta arquivada</label>
               						<input type="text" class="form-control" id="pasta_n" name="pasta_n" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Data Audiencia</label>
               						<input type="date" class="form-control" id="data_audiencia" name="data_audiencia">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titulo">Horas Audiencia</label>
               						<input type="time" class="form-control" id="horas_audiencia" name="horas_audiencia">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="titulo">Situação do Processo</label>
               						<textarea type="time" class="form-control" id="status_proc" name="status_proc" rows="5" maxlength="5000" placeholder="Digite sua observação resumida em até 5000 caracteres..."></textarea>
                                </div>

                        </form>
                </div>
                
</body>
</html>
