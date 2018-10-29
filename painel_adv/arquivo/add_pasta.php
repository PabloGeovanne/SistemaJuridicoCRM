<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrando Arquivo...</title>
</head>
<body>
<?php
include '../config.php';
?>
<?php
$parte_1=$_POST['parte_1'];
$parte_2=$_POST['parte_2'];
$data_audiencia=$_POST['data_audiencia'];
$horas_audiencia=$_POST['horas_audiencia'];
$pasta_n=$_POST['pasta_n'];
$status_proc=$_POST['status_proc'];

$sql = mysql_query("INSERT INTO arquivo(parte_1, parte_2, data_audiencia, horas_audiencia, pasta_n, status_proc)
VALUES('$parte_1', '$parte_2', '$data_audiencia', '$horas_audiencia', '$pasta_n', '$status_proc')");


echo"<script type='text/javascript'>";
echo "window.location='index.php';alert('Pasta $pasta_n cadastrada | $parte_1 X $parte_2')";
echo "</script>";
?>
</body>
</html>