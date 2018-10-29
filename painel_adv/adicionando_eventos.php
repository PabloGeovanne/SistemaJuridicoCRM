<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Agendando evento...</title>
</head>
<body>
<?php
include_once("../config.php");
?>
<?php
$pasta_id=$_POST['pasta_id'];	
$adv_id=$_POST['adv_id'];
$parte1=$_POST['parte1'];
$parte2=$_POST['parte2'];
$start_d=$_POST['start_d'];
$start_h=$_POST['start_h'];
$and_d=$_POST['and_d'];
$and_h=$_POST['and_h'];
$comarca=$_POST['comarca'];
$vara=$_POST['vara'];
if(isset($_POST['allday']) && $_POST['allday'] == "true"){
  $allday = "true";
}else{
  $allday = "false";
}
$classname=$_POST['classname'];
$proc_num=$_POST['proc_num'];
$andamento=$_POST['andamento'];


$nota=$_POST['nota'];
	
$query = "SELECT * FROM agendamentos WHERE proc_num='$proc_num' AND start_d='$start_d'";
$sqli_result = mysqli_query($conexao, $query);
$resultado = mysqli_fetch_assoc($sqli_result);
	
if ($resultado != false) {
echo"<script type='text/javascript'>";
echo "window.history.back();alert('Esse número de processo já foi agendado para essa data! Não é permitido agenda-lo no mesmo dia.')";
echo "</script>";
} else {	
$sql = "INSERT INTO agendamentos(pasta_id, adv_id, parte1, parte2, start_d, start_h, and_d, and_h, comarca, vara, allday, classname, proc_num, andamento, nota)
VALUES('$pasta_id', '$adv_id', '$parte1', '$parte2', '$start_d', '$start_h', '$and_d', '$and_h', '$comarca', '$vara', '$allday', '$classname', '$proc_num', '$andamento', '$nota')";

if (mysqli_query($conexao, $sql)) {
	
echo"<script type='text/javascript'>";
echo "window.location='add_eventos.php';alert('Evento agendado com sucesso')";
echo "</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);	
}
?>
</body>
</html>