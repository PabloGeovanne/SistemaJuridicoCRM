<html>
<head>
<title>Cadastrando...</title>
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
$adv_nome=$_POST['adv_nome'];
$adv_sobre_nome=$_POST['adv_sobre_nome'];
$adv_sex=$_POST['adv_sex'];
$adv_sex_singular=$_POST['adv_sex_singular'];
$adv_sex_or=$_POST['adv_sex_or'];
$nacionalidade=$_POST['nacionalidade'];
$estado_civil=$_POST['estado_civil'];
$cargo=$_POST['cargo'];
$cpf=$_POST['cpf'];
$adv_rg=$_POST['adv_rg'];
$adv_ssp=$_POST['adv_ssp'];
$rua=$_POST['rua'];
$numero_casa=$_POST['numero_casa'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$cep=$_POST['cep'];
$complemento=$_POST['complemento'];
$email=$_POST['email'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$tel3=$_POST['tel3'];
$adv_honorario=$_POST['adv_honorario']; 
$uf_oab=$_POST['uf_oab'];
$oab=$_POST['oab'];
$senha_real=$_POST['senha_real'];
	
$sql = mysql_query("UPDATE advogads SET adv_sex='$adv_sex', adv_sex_singular='$adv_sex_singular',  adv_sex_or='$adv_sex_or', adv_nacionalidade='$nacionalidade', adv_estado_civil='$estado_civil', adv_cargo='$cargo', adv_rg='$adv_rg', adv_ssp='$adv_ssp', adv_rua='$rua', adv_numero_casa='$numero_casa', adv_bairro='$bairro', adv_cidade='$cidade',  adv_estado='$estado',  adv_cep='$cep', adv_complemento='$complemento', adv_tel1='$tel1', adv_tel2='$tel2', adv_tel3='$tel3', adv_honorario='$adv_honorario', adv_uf_oab='$uf_oab' WHERE id='$adv_id'");

echo"<script type='text/javascript'>";
echo "window.location='adv_user_conf.php';alert('Doutor$adv_sex_or, $adv_nome $adv_sobre_nome Atualizado com sucesso!')";
echo "</script>";
?>
</body>
</html>