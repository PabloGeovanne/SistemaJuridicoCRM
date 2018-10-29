<html>
<head>
<title>Atualizando...</title>
<script type="text/javascript">
</script>

</head>
<body>
<?php
include 'config.php';
?>
<?php
$adv_id=$_POST['adv_id'];
$senha=$_POST['pw_new'];

	
$sql = mysql_query("UPDATE advogads SET senha='$senha' WHERE id='$adv_id'");

echo"<script type='text/javascript'>";
echo "window.location='../sair.php';alert('Senha atualizada com sucesso... realize o login novamente para validar a nova senha!')";
echo "</script>";
?>
</body>
</html>