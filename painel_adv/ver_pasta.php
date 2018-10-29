<?php
include_once("config3.php");
include_once("../config.php");
include_once("../sessao/sessao.php");

        $sqli = "SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]' LIMIT 1";
        $sqli_result = mysqli_query($conexao, $sqli);
        $resultado = mysqli_fetch_assoc($sqli_result);
	
		$id_adv   = $resultado['id'];

// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
 
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
 
	$conexao_1 = conexao::getInstance();
	$sql = "SELECT *, TIME_FORMAT(horas_audiencia, '%H:%i') AS horas_audiencia, DATE_FORMAT(data_audiencia, '%d/%m/%Y') AS data_audiencia FROM arquivo WHERE adv_pasta_id='$id_adv' ORDER BY pasta_n ASC LIMIT 9999";
	$stm = $conexao_1->prepare($sql);
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 
else:
 
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao_1 = conexao::getInstance();
	$sql = "SELECT *, TIME_FORMAT(horas_audiencia, '%H:%i') AS horas_audiencia, DATE_FORMAT(data_audiencia, '%d/%m/%Y') AS data_audiencia FROM arquivo WHERE parte_1 LIKE :parte_1 OR parte_2 LIKE :parte_2 ORDER BY pasta_n ASC LIMIT 9999";
	$stm = $conexao_1->prepare($sql);
	$stm->bindValue(':parte_1', '%'.$termo.'%');
	$stm->bindValue(':parte_2', '%'.$termo.'%');
	$stm->execute();
	$clientes = $stm->fetchAll(PDO::FETCH_OBJ);
 
endif;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Buscar - Arquivo & pasta</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip();
})
</script>
<style type="text/css">
fieldset{margin:1% auto;}
table{ margin-top: 10px;}	
.box-mensagem-crud{ margin-top: 10px;}
.msg-erro{ color: red; }
1
2
3
4
fieldset{margin:1% auto;}
table{ margin-top: 10px;}	
.box-mensagem-crud{ margin-top: 10px;}
.msg-erro{ color: red; }
</style>
</head>
<body>
<header>
<?php
include 'menu_nav.php';
	
	$termo = $_GET['termo'];
		
?>
<br><br><br>
</header>
<div class="lista_cliente">
	<div class='container'>
		<fieldset>
			<legend><h1>Lista de Pastas & Arquivos</h1></legend>
 
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o nome de uma das partes" value="<?php echo $termo ?>">
				</div>
			    <button type="submit" class="btn btn-primary">Pesquisar</button>
			    <a href='ver_pasta.php' class="btn btn-primary">Ver Todos</a>
			</form>
 
			<a href='cadastrar_pasta.php' class="btn btn-success pull-right">Cadastrar Pasta</a>
			<div class='clearfix'></div>
 
			<?php if(!empty($clientes)):?>
 
				<table class="table table-striped">
					<tr class='active'>
						<th>status</th>
						<th style="width:auto;height:auto;">1º Parte</th>
						<th style="width:auto;height:auto;">2º parte</th>
						<th>Data/Horas audiência</th>
						<th>Nº Arquivado</th>
						<th>Ação</th>
					</tr>
					<?php foreach($clientes as $cliente):?>
						<tr>
							<td><small>
							
							<?php
								$andamento=($cliente->{'andamento'});
								if($andamento == "morto"){
				echo '<button type="button" class="btn btn-danger" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Arquivo morto">';
					echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
				echo '</button>';
								}else if($andamento == ""){
				echo '<button type="button" class="btn btn-success" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Em andamento">';
					echo '<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>';
				echo '</button>';
								}else if($andamento == "desistente"){
				echo '<button type="button" class="btn btn-info" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Desistiu">';
					echo '<span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>';
				echo '</button>';
								}else if($andamento == "incompleto"){
				echo '<button type="button" class="btn btn-warning" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Arquivos incompletos">';
					echo '<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>';
				echo '</button>';
								}else{
									
								}
								
							?>	
							</small></td>
							<td style="width:20%;height:auto;"><small><?=$cliente->parte_1?></small></td>
							<td style="width:auto;height:auto;"><small><?=$cliente->parte_2?></small></td>
							<td><small>
							<?=$cliente->data_audiencia?>
							</br>
							<?=$cliente->horas_audiencia?>
							</small></td>
							<td><small><?=$cliente->pasta_n?></small></td>
							<td>
<center>
<div class="btn-group">
<button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Editar / Excluir <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li><a class="glyphicon glyphicon-pencil" href="edit_arq.php?p=editar&arquivo=<?= $cliente->id ?>"> Editar</a></li>
<li role="separator" class="divider"></li>
<li><a class="glyphicon glyphicon-trash" href="javascript:if(confirm('ATENÇÃO: Tem certeza que deseja excluir? Esta ação não poderá ser desfeita.')) location.href='deletar_arq.php?p=deletar&arquivo=<?= $cliente->id ?>';"> Remover</a></li>
</ul>
</div>
</center>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>
			<?php else: ?>
				<h3 class="text-center text-primary">Não existem pastas/arquivos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
</div>
</body>
</html>
<?php
?>