<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard - Petição Inicial Online</title>
	<link rel="shortcut icon" type="image/png" href="http://inicialtrabalhista.com/wp-content/uploads/2017/04/17800253_1674806762821736_6766560908650358774_n.jpg"/>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    
    <link href="table/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="table/assets/css/fresh-bootstrap-table.css" rel="stylesheet" />
        
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
    <script type="text/javascript" src="js/bootstrap.js"></script>
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
</head>
<body>
<header>
<?php
include 'menu_nav.php';
?>
<br><br><br>
</header>
<?php 
include_once("../config.php");
	
        $sqli = "SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]' LIMIT 1";
        $sqli_result = mysqli_query($conexao, $sqli);
        $resultado = mysqli_fetch_assoc($sqli_result);
	
		$id_adv   = $resultado['id'];
		 


$consulta = "SELECT *, adv_clientes.id AS ac_id FROM adv_clientes 
INNER JOIN advogads ON (adv_clientes.adv_id = advogads.id)
INNER JOIN adv_cargos ON (adv_clientes.cargo_id = adv_cargos.id_cargo)
WHERE adv_clientes.adv_id = '$id_adv'
ORDER BY adv_clientes.data DESC";
$con1 = $conexao->query($consulta) or die($mysqli->error);

$consulta2 = "SELECT * FROM adv_empresas 
INNER JOIN advogads ON (adv_empresas.adv_id = advogads.id) 
WHERE adv_empresas.adv_id = '$id_adv'
ORDER BY adv_empresas.data DESC";
$con2 = $conexao->query($consulta2) or die($mysqli->error);
?>	
<div class="tabbable">
    <ul class="nav nav-tabs"> 
    <li class="active"><a href="#home" data-toggle="tab">Clientes</a></li>
    <li><a href="#reclamada" data-toggle="tab">Empresas</a></li>
    </ul>
    <br>  
<div class="tab-content">
<div class="tab-pane fade in active" id="home">
<div class="lista_cliente">
<div class="wrapper">
    <div class="fresh-table toolbar-color-azure" style="display: block;" class="fresh-table  full-screen-table">
    <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange                  
            Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
    -->
        
        <div class="toolbar">
            <button id="" class="btn btn-default">Reclamantes</button>
        </div>
        <table id="fresh-table" class="table">
            <thead>
                <th data-field="id" data-sortable="true">ID</th>
            	<th data-field="name" data-sortable="true">Nome</th>
            	<th data-field="cpf">CPF</th>
            	<th data-field="cep">CEP</th>
            	<th data-field="number">Nº Endereço</th>
            	<th data-field="saida" data-sortable="true">Prescreverá - <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Art. 11 - CLT inciso I - em cinco anos para o trabalhador urbano, até o limite de dois anos após a extinção do contrato."></span></th>
            	<th data-field="tel">Contato</th>
            	<th data-field="demissão" data-sortable="true">Cadastro</th>
            	<th data-field="actions">Ações</th>
            </thead>
                <tbody>
    <?php while($dado = $con1->fetch_array()){ ?>
                <tr>
                	<td><?php echo $dado["ac_id"]; ?></td>
                	<td><?php echo $dado["nomecompleto"]; ?></td>
                	<td>
<button class="btn btn-success btn-xs" id="cpfcopy<?php echo $dado["ac_id"]; ?>" onclick="copyToClipboard('#cpfcopy<?php echo $dado["ac_id"]; ?>')">
<?php echo $dado["cliente_cpf"]?>
</button>
<script type="text/javascript"> 
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
                	</td>
                	<td><?php echo $dado["cliente_cep"]; ?></td>
					<td><center><?php echo $dado["end_numero"]; ?></center></td>
                	<td>
                	<center>
                	<?php echo date("Y", strtotime($dado["data_saida"]))+2; ?>   -   <span class="glyphicon glyphicon-question-sign" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Demissão: <?php echo date("d/m/Y", strtotime($dado["data_saida"])); ?>"></span>
<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
</script>
              		</center>
               		</td>
                	<td><?php echo $dado["cli_cel"]; ?></td>
					<td>
              		<?php echo date("d/m/Y", strtotime($dado["data"])); ?>&nbsp;às&nbsp;<?php echo date("h:m A", strtotime($dado["data"])); ?>
               		</td>
                	<td>
<div class="btn-group">
  <button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Editar / Excluir <span class="caret"></span>
  </button>
  <ul style="z-index:100;" class="dropdown-menu">
    <li><a class="glyphicon glyphicon-pencil" href="editar.php?p=editar&usuario=<?php echo $dado["ac_id"]; ?>"> Editar</a></li>
    <li role="separator" class="divider"></li>
    <li><a class="glyphicon glyphicon-trash" href="javascript:if(confirm('ATENÇÃO: Tem certeza que deseja excluir? esta ação não podera ser desfeita.')) location.href='deletar.php?p=deletar&usuario=<?php echo $dado["ac_id"]; ?>';"> Remover</a></li>  
  </ul>
</div>		
               		</td>
                </tr>
    <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<div class="tab-pane fade" id="reclamada">
<div class="lista_empresas">
<table class="table table-condensed table-hover" id="fresh-table">
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
    <?php while($dado2 = $con2->fetch_array()){ ?>
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
    <script type="text/javascript" src="table/assets/js/bootstrap-table.js"></script>
<script type="text/javascript">
        var $table = $('#fresh-table'),
            $alertBtn = $('#alertBtn'), 
            full_screen = false,
            window_height;
            
        $().ready(function(){
            
            window_height = $(window).height();
            table_height = window_height - 20;
            
            
            $table.bootstrapTable({
                toolbar: ".toolbar",

                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                striped: true,
                sortable: true,
                height: table_height,
                pageSize: 25,
                pageList: [25,50,100],
                
                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    //do nothing here, we don't want to show the text "showing x of y from..." 
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'fa fa-minus-circle'
                }
            });
            
            window.operateEvents = {
                'click .like': function (e, value, row, index) {
                    alert('You click like icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);
                },
                'click .edit': function (e, value, row, index) {
                    alert('You click edit icon, row: ' + JSON.stringify(row));
                    console.log(value, row, index);    
                },
                'click .remove': function (e, value, row, index) {
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
            
                }
            };
            
            $alertBtn.click(function () {
                alert("You pressed on Alert");
            });
        
            
            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });    
        });
</script>
</html>
<?php
include '../sessao/sessao.php';
?>