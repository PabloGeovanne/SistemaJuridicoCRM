<?php 
include('config2.php');
include('config.php');
include('../sessao/sessao.php');
	
      $sql = mysql_query("SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]'");
	
      while($linha = mysql_fetch_array($sql)){
		  
	$id_adv   = $linha['id'];
	}


$consulta = "SELECT *, adv_clientes.id AS ac_id FROM adv_clientes 
INNER JOIN advogads ON (adv_clientes.adv_id = advogads.id) 
WHERE adv_clientes.adv_id = '$id_adv'
ORDER BY adv_clientes.data DESC LIMIT 9999";
$conexao = $mysqli->query($consulta) or die($mysqli->error);

$consulta2 = "SELECT * FROM adv_empresas 
INNER JOIN advogads ON (adv_empresas.adv_id = advogads.id) 
WHERE adv_empresas.adv_id = '$id_adv'
ORDER BY adv_empresas.data ASC LIMIT 9999";
$conexao2 = $mysqli->query($consulta2) or die($mysqli->error);
?>
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</head>
<body>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs"> 
    <li class="active"><a href="#home" data-toggle="tab">Reclamante cadastrados</a></li>
    <li><a href="#reclamada" data-toggle="tab">Reclamada cadastrados</a></li>
    </ul>
    <br>  
<div class="tab-content">
<div class="tab-pane fade in active" id="home">
<div class="panel panel-default table-responsive">
<div class="panel-heading">Lista de reclamantes cadastrados</div>
<table class="table table-condensed table-hover">
	<tr class="active text-uppercase">
		<td><b><ins><small> </small></ins></b></td>
		<td><b><ins><small>Nome</small></ins></b></td>
		<td class="info"><b><ins><small>CPF</small></ins></b></td>
		<td><b><ins><small>Endereço</small></ins></b></td>
		<td><b><ins><small>Numero</small></ins></b></td>
		<td><b><ins><small>Bairro</small></ins></b></td>
		<td><b><ins><small>Cidade</small></ins></b></td>
		<td><b><ins><small>UF</small></ins></b></td>
		<td><b><ins><small>Celular</small></ins></b></td>
		<td class="info"><b><ins><small>Data de cadastro</small></ins></b></td>
		<td class="danger"><b><ins><small><center>Ação</center></small></ins></b></td>
	</tr>
    <?php while($dado = $conexao->fetch_array()){ ?>
	<tr>
		<td class="danger"><small><center>&nbsp;</center></small></td>
		<td class="danger"><small><?php echo $dado["nomecompleto"]; ?></small></td>
		<td class="info"><small><?php echo $dado["cliente_cpf"]; ?></small></td>
		<td class="danger"><small><?php echo $dado["end_rua"]; ?></small></td>
		<td class="danger"><small><center><?php echo $dado["end_numero"]; ?></center></small></td>
		<td class="danger"><small><?php echo $dado["end_bairro"]; ?></small></td>
		<td class="danger"><small><?php echo $dado["end_cidade"]; ?></small></td>
		<td class="danger"><small><center><?php echo $dado["end_uf"]; ?></center></small></td>
		<td class="danger"><small><?php echo $dado["cli_cel"]; ?></small></td>
		<td class="info"><small><center><?php echo date("d/m/Y", strtotime($dado["data"])); ?>&nbsp;às&nbsp;<?php echo date("h:m A", strtotime($dado["data"])); ?></center></small></td>
        <td class="danger">
        <center>
<div class="btn-group">
  <button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Editar / Excluir <span class="caret"></span>
  </button>
  <ul style="z-index:100;" class="dropdown-menu">
    <li><a class="glyphicon glyphicon-pencil" href="editar.php?p=editar&usuario=<?php echo $dado["ac_id"]; ?>"> Editar</a></li>
    <li role="separator" class="divider"></li>
    <li><a class="glyphicon glyphicon-trash" href="javascript:if(confirm('ATENÇÃO: Tem certeza que deseja excluir? esta ação não podera ser desfeita.')) location.href='deletar.php?p=deletar&usuario=<?php echo $dado["ac_id"]; ?>';"> Remover</a></li>
  </ul>
</div>		
       </center>
        </td>
	</tr>
    <?php } ?>
</table>
</div>
</div>
<div class="tab-pane fade" id="reclamada">
<div class="panel panel-default">
<div class="panel-heading">Lista de reclamadas cadastradas</div>
<table class="table table-condensed table-hover">
	<tr class="active text-uppercase">
		<td><b><ins><small> </small></ins></b></td>
		<td><b><ins><small>Empresa</small></ins></b></td>
		<td class="info"><b><ins><small>CNPJ ou CPF</small></ins></b></td>
		<td><b><ins><small>Endereço</small></ins></b></td>
		<td><b><ins><small>Numero</small></ins></b></td>
		<td><b><ins><small>Bairro</small></ins></b></td>
		<td><b><ins><small>Cidade</small></ins></b></td>
		<td><b><ins><small>UF</small></ins></b></td>
		<td><b><ins><small>Tipo</small></ins></b></td>
		<td><b><ins><small>Telefone</small></ins></b></td>
		<td class="info"><b><ins><small>Data de cadastro</small></ins></b></td>
		<td class="danger"><b><ins><center>Ação</center></ins></b></td>
	</tr>
    <?php while($dado2 = $conexao2->fetch_array()){ ?>
	<tr>
		<td><small><center> </center></small></td>
		<td><small><?php echo $dado2["nome_emp"]; ?></small></td>
		<td class="info"><small><?php echo $dado2["cnpj_cpf"]; ?></small></td>
		<td><small><?php echo $dado2["emp_rua"]; ?></small></td>
		<td><small><?php echo $dado2["emp_num"]; ?></small></td>
		<td><small><?php echo $dado2["emp_bairro"]; ?></small></td>
		<td><small><center><?php echo $dado2["emp_city"]; ?></center></small></td>
		<td><small><?php echo $dado2["emp_uf"]; ?></small></td>
		<td><small><?php echo $dado2["emp_tipo"]; ?></small></td>
		<td><small><center><?php echo $dado2["emp_tel"]; ?></center></small></td>
		<td class="info"><small><center><?php echo date("d/m/Y", strtotime($dado2["data"])); ?>&nbsp;às&nbsp;<?php echo date("h:m A", strtotime($dado2["data"])); ?></center></small></td>
        <td class="danger">
        <center>
<div class="btn-group">
  <button class="btn btn-danger btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Editar / Excluir <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="glyphicon glyphicon-pencil" href="edit_empresa.php?p=editar&empresa=<?php echo $dado2["id_emp"]; ?>"> Editar</a></li>
    <li role="separator" class="divider"></li>
    <li><a class="glyphicon glyphicon-trash" href="javascript:if(confirm('ATENÇÃO: Tem certeza que deseja excluir essa reclamada? Não será possivel gerar nenhum documento para os reclamantes associados a esta até que outra empresa seja cadastrada novamente a cada um.')) location.href='deletar_empresa.php?p=deletar&empresa=<?php echo $dado2["id_emp"]; ?>';"> Remover</a></li>
  </ul>
</div>
		</center>
        </td>
	</tr>
    <?php } ?>
</table>
</div>
</div>
</div>
</div>
</body>
</html>