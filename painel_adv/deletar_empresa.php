<?php 
include('config2.php');
include('../sessao/sessao.php');

$emp = intval($_GET['empresa']);

$sql_code = "DELETE FROM adv_empresas WHERE id_emp = '$emp'";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
if($sql_query)
  echo "
  <script>
	location.href='index.php?p=inicio';
	</script>";
  else
  echo "
  <script>
  	alert('Não foi possivel excluir o cliente.');
  	location.href='index.php?p=inicio';
  </script>";

?>