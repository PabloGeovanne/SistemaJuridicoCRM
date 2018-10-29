<?php 
require_once("../config.php");
require_once("../sessao/sessao.php");
$id_arq_hide = intval($_GET['arquivo']);
$sql_code = "DELETE FROM arquivo WHERE id = '$id_arq_hide'";
$sql_query = $conexao->query($sql_code) or die($conexao->error);
if($sql_query)
  echo "
  <script>
	location.href='ver_pasta.php';
	</script>";
  else
  echo "<script>alert('Não foi possivel excluir o cliente.');
  	location.href='ver_pasta.php?p=editar&arquivo=$id_arq_hide'';
  		</script>";
?>