<?php 
// Dados da conexão com o banco de dados
define('SERVER', 'localhost');
define('DBNAME', 'DBNAME');
define('USER', 'DBUSER');
define('PASSWORD', 'PASSDB');

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';
// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".SERVER."; dbname=".DBNAME, USER, PASSWORD, $opcoes);
// Verifica se foi solicitado uma consulta para o autocomplete
if($acao == 'autocomplete'):
	$where = (!empty($parametro)) ? 'WHERE cliente_cpf LIKE ?' : '';
	$sql = "SELECT * FROM adv_clientes " . $where;

	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);

	echo $json;

endif;
// Verifica se foi solicitado uma consulta para preencher os campos do formulário
if($acao == 'consulta'):
		//inner join - relacionamento com cargo & empresa & advogados & paradigmas
$sql = ("SELECT *,
TIME_FORMAT(desvio_datafim_5, '%d/%m/%Y') AS desvio_datafim_5, 
TIME_FORMAT(desvio_datainicio_5, '%d/%m/%Y') AS desvio_datainicio_5, 
TIME_FORMAT(desvio_datafim_4, '%d/%m/%Y') AS desvio_datafim_4, 
TIME_FORMAT(desvio_datainicio_4, '%d/%m/%Y') AS desvio_datainicio_4, 
TIME_FORMAT(desvio_datafim_3, '%d/%m/%Y') AS desvio_datafim_3, 
TIME_FORMAT(desvio_datainicio_3, '%d/%m/%Y') AS desvio_datainicio_3, 
TIME_FORMAT(desvio_datafim_2, '%d/%m/%Y') AS desvio_datafim_2, 
TIME_FORMAT(desvio_datainicio_2, '%d/%m/%Y') AS desvio_datainicio_2, 
TIME_FORMAT(desvio_datafim_1, '%d/%m/%Y') AS desvio_datafim_1, 
TIME_FORMAT(desvio_datainicio_1, '%d/%m/%Y') AS desvio_datainicio_1, 

TIME_FORMAT(hrs_ent_sem, '%H') AS hrs_ent_sem,
TIME_FORMAT(hrs_ent_sem, '%i') AS hrs_ent_sem2,

TIME_FORMAT(hrs_exit_sem, '%H') AS hrs_exit_sem,
TIME_FORMAT(hrs_exit_sem, '%i') AS hrs_exit_sem2,



TIME_FORMAT(hrs_ent_sab, '%Hh%im') AS hrs_ent_sab, 
TIME_FORMAT(hrs_exit_sab, '%Hh%im') AS hrs_exit_sab, 

TIME_FORMAT(hrs_ent_dom, '%Hh%im') AS hrs_ent_dom, 
TIME_FORMAT(hrs_exit_dom, '%Hh%im') AS hrs_exit_dom,

TIME_FORMAT(noite_ent, '%Hh%im') AS noite_ent,
TIME_FORMAT(noite_exit, '%Hh%im') AS noite_exit,


TIME_FORMAT(hrs_ent_sex, '%H') AS hrs_ent_sex,
TIME_FORMAT(hrs_ent_sex, '%i') AS hrs_ent_sex2,

TIME_FORMAT(hrs_exit_sex, '%H') AS hrs_exit_sex,
TIME_FORMAT(hrs_exit_sex, '%i') AS hrs_exit_sex2,


TIME_FORMAT(hrs_ext_antes, '%Hh%im') AS hrs_ext_antes,
TIME_FORMAT(hrs_ext_apos, '%Hh%im') AS hrs_ext_apos,
DATE_FORMAT(rg_data_exp, '%d/%m/%Y') AS rg_data_exp,

DATE_FORMAT(data_ent, '%d/%m/%Y') AS data_ent_complet,

DATE_FORMAT(data_ent, '%d') AS data_ent_d,
DATE_FORMAT(data_ent, '%m') AS data_ent_m,
DATE_FORMAT(data_ent, '%Y') AS data_ent_y,

DATE_FORMAT(data_reg, '%d/%m/%Y') AS data_reg,
DATE_FORMAT(data_saida, '%d/%m/%Y') AS data_saida_complet,

DATE_FORMAT(data_saida, '%d') AS data_saida_d,
DATE_FORMAT(data_saida, '%m') AS data_saida_m,
DATE_FORMAT(data_saida, '%Y') AS data_saida_y,

DATE_FORMAT(aviso_data, '%d/%m/%Y') AS aviso_data,
DATE_FORMAT(inic_aviso_previo, '%d/%m/%Y') AS inic_aviso_previo,
DATE_FORMAT(data_homo, '%d/%m/%Y') AS data_homo,
DATE_FORMAT(data_quita, '%d/%m/%Y') AS data_quita

FROM adv_clientes ac 
INNER JOIN advogads adv ON (ac.adv_id = adv.id)
INNER JOIN adv_empresas ae ON (ac.trabalho_ID = ae.id_emp) 
INNER JOIN adv_cargos acg ON (ac.cargo_ID = acg.id_cargo)
INNER JOIN paradigmas pag ON (ac.id_paradigmas = pag.paradigmas_id)
");


	$sql .= ("WHERE cliente_cpf LIKE ? LIMIT 1");
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	$json = json_encode($dados);
	echo $json;
endif;
?>

<?php
?>