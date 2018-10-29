<?php 
include('../config2.php');
include('../../sessao/sessao.php');

$consulta3 = "SELECT * FROM arquivo ORDER BY id ASC";
$conexao3 = $mysqli->query($consulta3) or die($mysqli->error);

?>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    
	
    </script>
</head>
<body>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs"> 
    <li class="active"><a href="#home" data-toggle="tab">Lista de arquivo</a></li>
    <li><a href="#reclamada" data-toggle="tab">Aba Vazia</a></li>
    </ul>
    <br>  
<div class="tab-content">
<div class="tab-pane fade in active" id="home">
<div class="panel panel-default">
<div class="panel-heading">Lista de pastas arquivadas</div>
<table class="table table-condensed table-hover">
	<tr class="active text-uppercase">
		<td><b><ins><center><small>ID</small></center></ins></b></td>
		<td><b><ins><center><small>PARTE 1</small></center></ins></b></td>
		<td style="color:#F76466;text-align:center;"><b><small>Vs</small></b></td>
		<td><b><ins><center><small>PARTE 2</small></center></ins></b></td>
		<td><b><ins><small>DATA DE AUDIÊNCIA</small></ins></b></td>
		<td><b><ins><small>HORA DA AUDIÊNCIA</small></ins></b></td>
		<td><b><ins><small>Nº DA PASTA</small></ins></b></td>
		<td><b><ins><center><small>DATA CADASTRADA</small></center></ins></b></td>
	</tr>
    <?php while($dado3 = $conexao3->fetch_array()){ ?>
	<tr>
		<td><small><center><?php echo $dado3["id"]; ?></center></small></td>
		<td><?php echo $dado3["parte_1"]; ?></td>
		<td style="color:#F76466;"><b><center><small>X</small></center></b></td>
		<td><?php echo $dado3["parte_2"]; ?></td>
		<td><small><?php echo $dado3["data_audiencia"]; ?></small></td>
		<td><small><?php echo $dado3["horas_audiencia"]; ?></small></td>
		<td><?php echo $dado3["pasta_n"]; ?></td>
		<td><center><small><?php echo date("d/m/Y", strtotime($dado3["data_cadastro"])); ?>&nbsp;às&nbsp;<?php echo date("h:m A", strtotime($dado2["data_cadastro"])); ?></small></center>
        </td>
       <!-- <td>
        <small>
        <center>
        &nbsp;
        <a href="../edit_empresa.php?p=editar&empresa=<?php echo $dado3["id"]; ?>" class="glyphicon glyphicon-pencil bt_edit" aria-hidden="true" data-toggle="tooltip" data-trigger="hover" title="Editar">
        </a>&nbsp;&nbsp;-&nbsp;&nbsp;
        <a href="javascript:if(confirm('ATENÇÃO: Tem certeza que deseja excluir?')) location.href='deletar_arquivo.php?p=deletar&arquivo=<?php echo $dado3["id"]; ?>';" class="glyphicon glyphicon-trash bt_excluir" aria-hidden="true" data-toggle="tooltip" data-trigger="hover" title="Excluir"></a>&nbsp;
        </center>
        </small>
        </td>-->
	</tr>
    <?php } ?>
</table>
</div>
</div>
</div>
</div>
</body>
</html>