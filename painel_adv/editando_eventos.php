<?php
require_once("../config.php");
require_once("../sessao/sessao.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Atualizando eventos...</title>
</head>
<body>
<?php
$agenda_id=$_POST['agenda_id'];
$pasta_id=$_POST['pasta_id'];
$adv_id=$_POST['adv_id'];
$parte1=$_POST['parte1'];
$parte2=$_POST['parte2'];
$start_d=$_POST['start_d'];
$start_h=$_POST['start_h'];
$and_d=$_POST['and_d'];
$and_h=$_POST['and_h'];
$comarca=$_POST['comarca'];
$vara = $_POST['vara'];
if(isset($_POST['allday']) && $_POST['allday'] == "true"){
  $allday = "true";
}else{
  $allday = "false";
}			
$classname = $_POST['classname'];
$proc_num = $_POST['proc_num'];
$andamento = $_POST['andamento'];
$nota = $_POST['nota'];	
		
	
$sql = ("UPDATE agendamentos SET pasta_id='$pasta_id', parte1='$parte1', parte2='$parte2', start_d='$start_d', start_h='$start_h', and_d='$and_d', and_h='$and_h', comarca='$comarca', vara='$vara', allday='$allday', classname='$classname', proc_num='$proc_num', andamento='$andamento', nota='$nota' WHERE id='$agenda_id'");
	
if ($conexao->query($sql) === TRUE) {

echo"<script type='text/javascript'>";
echo "window.location='edit_eventos.php?p=editar&evento=$agenda_id';alert('Evento atualizado com sucesso.')";
echo "</script>";
	
} else {
    echo "Error updating record: " . $conexao->error;
}
$conexao->close();
?>
</body>
</html>