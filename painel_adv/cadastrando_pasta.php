<?php
require_once("../config.php");	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrando nova pasta...</title>
</head>
<body>
<?php
$adv_pasta_id=$_POST['adv_id'];
$parte_1=$_POST['parte_1'];
$parte_2=$_POST['parte_2'];
$data_audiencia=$_POST['data_audiencia'];
$horas_audiencia=$_POST['horas_audiencia'];
$pasta_n=$_POST['pasta_num'];
$status_proc=$_POST['status_proc'];
$andress_dead=$_POST['andress_dead'];
$andamento=$_POST['andamento'];
	
$query = "SELECT * FROM arquivo WHERE adv_pasta_id='$adv_pasta_id' AND pasta_n='$pasta_n'";
$sqli_result = mysqli_query($conexao, $query);
$rows = mysqli_fetch_assoc($sqli_result);	

if ($rows != false) {
echo"<script type='text/javascript'>";
echo "alert('Ops ah pasta de número: $pasta_n já esta sendo usada!');window.history.back()";
echo "</script>";	
	
} else {	
$sql = ("INSERT INTO arquivo(adv_pasta_id, parte_1, parte_2, data_audiencia, horas_audiencia, pasta_n, status_proc, andress_dead, andamento)
VALUES('$adv_pasta_id', '$parte_1', '$parte_2', '$data_audiencia', '$horas_audiencia', '$pasta_n', '$status_proc', '$andress_dead', '$andamento')");
if (mysqli_query($conexao, $sql)) {
	
echo"<script type='text/javascript'>";
echo "window.location='cadastrar_pasta.php';alert('Pasta $pasta_n cadastrada | $parte_1 X $parte_2')";
echo "</script>";
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
}
mysqli_close($conexao);		
}
?>
</body>
</html>