<?php
require_once("../config.php");

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Atualizando pasta e arquivos...</title>
</head>
<body>
<?php
$parte_1=$_POST['parte_1'];
$parte_2=$_POST['parte_2'];
$data_audiencia=$_POST['data_audiencia'];
$horas_audiencia=$_POST['horas_audiencia'];
$pasta_n=$_POST['pasta_n'];
$status_proc=$_POST['status_proc'];
$andress_dead=$_POST['andress_dead'];
$andamento=$_POST['andamento'];
$id_arq_hide=$_POST['id_arq_hide'];
	
$sql = ("UPDATE arquivo SET parte_1='$parte_1', parte_2='$parte_2', data_audiencia='$data_audiencia', horas_audiencia='$horas_audiencia', status_proc='$status_proc', andress_dead='$andress_dead', andamento='$andamento' WHERE id='$id_arq_hide'");
	
if ($conexao->query($sql) === TRUE) {
	
echo"<script type='text/javascript'>";
echo "window.location='ver_pasta.php';alert('Pasta/Arquivo nº $pasta_n atualizado com exito.')";
echo "</script>";
	
} else {
    echo "Error updating record: " . $conexao->error;
}
$conexao->close();
?>
</body>
</html>