<?php 
include('config2.php');
include('../sessao/sessao.php');

$id_del = intval($_GET['usuario']);

$sql_code = "DELETE adv_clientes.*, adv_cargos.*, paradigmas.* 
FROM adv_clientes, adv_cargos, paradigmas 
WHERE adv_clientes.id = '$id_del' 
AND adv_cargos.id_cargo = adv_clientes.cargo_id
AND paradigmas.paradigmas_id = adv_clientes.id_paradigmas";
	
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