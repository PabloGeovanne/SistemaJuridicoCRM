<html>
<head>
<title>Atualizando...</title>
<script type="text/javascript">
function cadastradocomsucesso() {
	setTimeout("window.location='login.php'", 0);
	}
	
function falhanocadastro() {
	setTimeout("window.location='cadastro.php'", 0);
	}
</script>

</head>
<body>
<?php
include 'config.php';
?>
<?php
$adv_id=$_POST['adv_id'];
$nome=$_POST['nome'];
$adv_sobre_nome=$_POST['adv_sobre_nome'];
	
$sql = mysql_query("UPDATE advogads SET nome='$nome', adv_sobre_nome='$adv_sobre_nome' WHERE id='$adv_id'");

echo"<script type='text/javascript'>";
echo "window.location='index.php';alert('Usuário $nome $adv_sobre_nome atualizado com sucesso!')";
echo "</script>";
?>
</body>
</html>