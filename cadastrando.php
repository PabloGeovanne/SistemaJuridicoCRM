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
$nome=$_POST['nome'];
$adv_sobre_nome=$_POST['adv_sobre_nome'];
$adv_sex=$_POST['adv_sex'];
	
if(isset($_POST['adv_sex']) && $_POST['adv_sex'] == "masculino"){
  $adv_sex_singular = "o";
}else{
if(isset($_POST['adv_sex']) && $_POST['adv_sex'] == "feminino"){
$adv_sex_singular = "a";	
}else{
if(!mysql_query($sql)){
    $erro = mysql_error();
    echo "Ocorreu o seguinte erro: ", '"', $erro, '"';
}}}
	
if(isset($_POST['adv_sex']) && $_POST['adv_sex'] == "masculino"){
  $adv_sex_or = "";
}else{
if(isset($_POST['adv_sex']) && $_POST['adv_sex'] == "feminino"){
  $adv_sex_or = "a";
}else{
if(!mysql_query($sql)){
    $erro = mysql_error();
    echo "Ocorreu o seguinte erro: ", '"', $erro, '"';
}}}		
	
$nacionalidade=$_POST['nacionalidade'];
$estado_civil=$_POST['estado_civil'];
$cargo=$_POST['adv_cargo'];
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
$venc_fatura=$_POST['venc_fatura'];
$uf_oab=$_POST['uf_oab'];
$oab=$_POST['oab'];
$senha_real=$_POST['senha_real'];

	
$query = mysql_query("select * from advogads where oab='$oab' AND adv_uf_oab='$uf_oab'");
$rows = mysql_num_rows($query);
if ($rows != false) {
echo"<script type='text/javascript'>";
echo "document.location = 'login.php';alert('Doutor$adv_sex_or, sua OAB já foi cadastrad$adv_sex_singular anteriormente! Acesse ao seu login.')";
echo "</script>";
} else {
$sql = mysql_query("INSERT INTO advogads(adv_nome, adv_sobre_nome, adv_sex, adv_sex_singular, adv_sex_or, adv_nacionalidade, adv_estado_civil, adv_cargo, adv_cpf, adv_rg, adv_ssp, adv_rua, adv_numero_casa, adv_bairro, adv_cidade, adv_estado, adv_cep, adv_complemento, adv_email, adv_tel1, adv_tel2, adv_tel3, adv_honorario, venc_fatura, adv_uf_oab, oab, senha_real, ativo)

VALUES('$nome', '$adv_sobre_nome', '$adv_sex', '$adv_sex_singular', '$adv_sex_or', '$nacionalidade', '$estado_civil', '$cargo', '$cpf', '$adv_rg', '$adv_ssp', '$rua', '$numero_casa', '$bairro', '$cidade', '$estado', '$cep', '$complemento', '$email', '$tel1', '$tel2', '$tel3', '$adv_honorario', '$venc_fatura', '$uf_oab', '$oab', '$senha_real', '0')");

echo"<script type='text/javascript'>";
echo "window.location='login.php';alert('Doutor$adv_sex_or, $nome $adv_sobre_nome cadastrad$adv_sex_singular com sucesso! Aguarde a aprovação do seu cadastro pela equipe da Inicial Trabalhista')";
echo "</script>";
}
?>
</body>
</html>