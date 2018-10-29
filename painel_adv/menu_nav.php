<html>
<head>
<div hidden="true">
<?php
include '../config.php';
include '../sessao/sessao.php';
	
        $sqli = "SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]' LIMIT 1";
        $sqli_result = mysqli_query($conexao, $sqli);
        $linha = mysqli_fetch_assoc($sqli_result);

	$adv_id   = $linha['id'];
	$oab   = $linha['oab'];
	$senha   = $linha['senha'];
	$adv_nome   = $linha['adv_nome'];
	$adv_sobre_nome   = $linha['adv_sobre_nome'];
	$adv_sex   = $linha['adv_sex'];
	$adv_sex_singular   = $linha['adv_sex_singular'];
	$adv_sex_or   = $linha['adv_sex_or'];
	$adv_sobre_nome   = $linha['adv_sobre_nome'];
	$adv_nacionalidade   = $linha['adv_nacionalidade'];
	$adv_estado_civil   = $linha['adv_estado_civil'];
	$adv_cargo   = $linha['adv_cargo'];
	$adv_cpf   = $linha['adv_cpf'];
	$adv_rg   = $linha['adv_rg'];
	$adv_ssp   = $linha['adv_ssp'];
	$adv_rua   = $linha['adv_rua'];
	$adv_numero_casa   = $linha['adv_numero_casa'];
	$adv_bairro   = $linha['adv_bairro'];
	$adv_cidade   = $linha['adv_cidade'];
	$adv_estado   = $linha['adv_estado'];
	$adv_cep   = $linha['adv_cep'];
	$adv_complemento   = $linha['adv_complemento'];
	$adv_email   = $linha['adv_email'];
	$adv_tel1   = $linha['adv_tel1'];
	$adv_tel2   = $linha['adv_tel2'];
	$adv_tel3   = $linha['adv_tel3'];
	$adv_uf_oab   = $linha['adv_uf_oab'];
	$adv_honorario = $linha['adv_honorario'];
?>
</div>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<a class="navbar-brand" href="../../index.php">
					<img alt="Brand" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMi4wMDEgNTEyLjAwMSIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyLjAwMSA1MTIuMDAxOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPGc+Cgk8Zz4KCQk8cGF0aCBzdHlsZT0iZmlsbDojNjQ2NDY0OyIgZD0iTTQwOCwzOTIuMDAxYy01Ny4zNDQsMC0xMDQtMzkuNDc3LTEwNC04OGMwLTQuNDIyLDMuNTc4LTgsOC04aDE5MmM0LjQyMiwwLDgsMy41NzgsOCw4ICAgIEM1MTIsMzUyLjUyNCw0NjUuMzQ0LDM5Mi4wMDEsNDA4LDM5Mi4wMDF6IE0zMjAuNTM5LDMxMi4wMDFjNC44ODMsMzUuOTUzLDQyLjI0Miw2NCw4Ny40NjEsNjRzODIuNTc4LTI4LjA0Nyw4Ny40NjEtNjRIMzIwLjUzOXoiLz4KCTwvZz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojNUM1NDZBOyIgZD0iTTcuOTkzLDMxMi4wMDFjLTEuMTcyLDAtMi4zNTktMC4yNTgtMy40ODQtMC44MDVjLTMuOTc3LTEuOTMtNS42MzMtNi43MTUtMy43MDMtMTAuNjkxICAgICBsODkuMzgzLTE4NGMxLjkyMi0zLjk2OSw2LjcxOS01LjYyNSwxMC42ODgtMy42OTljMy45NzcsMS45Myw1LjYzMyw2LjcxNSwzLjcwMywxMC42OTFsLTg5LjM4MywxODQgICAgIEMxMy44MTMsMzEwLjM0NCwxMC45NjIsMzEyLjAwMSw3Ljk5MywzMTIuMDAxeiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojNUM1NDZBOyIgZD0iTTIwMC4wMDksMzEyLjAwMWMtMi45NjksMC01LjgyLTEuNjU2LTcuMjAzLTQuNTA0bC04OS4zODMtMTg0ICAgICBjLTEuOTMtMy45NzctMC4yNzMtOC43NjIsMy43MDMtMTAuNjkxYzMuOTc3LTEuOTIyLDguNzY2LTAuMjcsMTAuNjg4LDMuNjk5bDg5LjM4MywxODRjMS45MywzLjk3NywwLjI3Myw4Ljc2Mi0zLjcwMywxMC42OTEgICAgIEMyMDIuMzY4LDMxMS43NDMsMjAxLjE4LDMxMi4wMDEsMjAwLjAwOSwzMTIuMDAxeiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojNUM1NDZBOyIgZD0iTTMxMS45OTMsMzEyLjAwMWMtMS4xNzIsMC0yLjM1OS0wLjI1OC0zLjQ4NC0wLjgwNWMtMy45NzctMS45My01LjYzMy02LjcxNS0zLjcwMy0xMC42OTEgICAgIGw4OS4zODMtMTg0YzEuOTMtMy45NjksNi43MTEtNS42MjUsMTAuNjg4LTMuNjk5YzMuOTc3LDEuOTMsNS42MzMsNi43MTUsMy43MDMsMTAuNjkxbC04OS4zODMsMTg0ICAgICBDMzE3LjgxMywzMTAuMzQ0LDMxNC45NjIsMzEyLjAwMSwzMTEuOTkzLDMxMi4wMDF6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1QzU0NkE7IiBkPSJNNTA0LjAwOSwzMTIuMDAxYy0yLjk2OSwwLTUuODItMS42NTYtNy4yMDMtNC41MDRsLTg5LjM4My0xODQgICAgIGMtMS45My0zLjk3Ny0wLjI3My04Ljc2MiwzLjcwMy0xMC42OTFjMy45ODQtMS45MjIsOC43NTgtMC4yNywxMC42ODgsMy42OTlsODkuMzgzLDE4NGMxLjkzLDMuOTc3LDAuMjczLDguNzYyLTMuNzAzLDEwLjY5MSAgICAgQzUwNi4zNjgsMzExLjc0Myw1MDUuMTgsMzEyLjAwMSw1MDQuMDA5LDMxMi4wMDF6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNERTgyMjk7IiBkPSJNODcuOTkzLDEwNy43MjdjLTEuMjM0LDAtMi40OTItMC4yODUtMy42NjQtMC44OTFjLTYuNTg2LTMuNDAyLTEyLjYwMi03Ljc5Ny0xNy44NzUtMTMuMDY2ICAgICBMNTAuMzQ0LDc3LjY1N2MtMy4xMjUtMy4xMjUtMy4xMjUtOC4xODgsMC0xMS4zMTNjMy4xMjUtMy4xMjUsOC4xODgtMy4xMjUsMTEuMzEzLDBsMTYuMTA5LDE2LjEwOSAgICAgYzQuMTAyLDQuMTAyLDguNzgxLDcuNTIsMTMuOTA2LDEwLjE2NGMzLjkyMiwyLjAyNyw1LjQ2MSw2Ljg1MiwzLjQzOCwxMC43NzdDOTMuNjg4LDEwNi4xNDksOTAuODkxLDEwNy43MjcsODcuOTkzLDEwNy43Mjd6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNERTgyMjk7IiBkPSJNMTE5Ljk5MywxMTQuODAxYy00LjI2NiwwLTcuODEzLTMuMzcxLTcuOTg0LTcuNjcyYy0wLjE4LTQuNDE0LDMuMjUtOC4xNDEsNy42NjQtOC4zMiAgICAgYzcuNTM5LTAuMzA5LDE0LjgyOC0yLjEwOSwyMS42NTYtNS4zNDhsODcuMjUtNDEuMzI0YzMuOTg0LTEuODk1LDguNzU4LTAuMTg4LDEwLjY0OCwzLjgwNSAgICAgYzEuODk4LDMuOTkyLDAuMTg4LDguNzY2LTMuODA1LDEwLjY1NmwtODcuMjQyLDQxLjMyNGMtOC43ODEsNC4xNjQtMTguMTU2LDYuNDc3LTI3Ljg1Miw2Ljg3MSAgICAgQzEyMC4yMTksMTE0Ljc5OCwxMjAuMTAyLDExNC44MDEsMTE5Ljk5MywxMTQuODAxeiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojREU4MjI5OyIgZD0iTTQyNC4wMDksMTA3LjcyN2MtMi44OTgsMC01LjY5NS0xLjU3OC03LjExNy00LjMzMmMtMi4wMjMtMy45MjYtMC40ODQtOC43NSwzLjQzOC0xMC43NzcgICAgIGM1LjEyNS0yLjY0NSw5LjgwNS02LjA2MywxMy45MDYtMTAuMTY4bDE2LjEwOS0xNi4xMDVjMy4xMjUtMy4xMjUsOC4xODgtMy4xMjUsMTEuMzEzLDBjMy4xMjUsMy4xMjUsMy4xMjUsOC4xODgsMCwxMS4zMTMgICAgIGwtMTYuMTA5LDE2LjEwOWMtNS4yNzMsNS4yNzMtMTEuMjg5LDkuNjY4LTE3Ljg3NSwxMy4wN0M0MjYuNTAxLDEwNy40NDIsNDI1LjI0MywxMDcuNzI3LDQyNC4wMDksMTA3LjcyN3oiLz4KCQk8L2c+Cgk8L2c+Cgk8Zz4KCQk8Zz4KCQkJPHBhdGggc3R5bGU9ImZpbGw6I0RFODIyOTsiIGQ9Ik0zOTIuMDA5LDExNC44MDFjLTAuMTA5LDAtMC4yMjctMC4wMDQtMC4zMzYtMC4wMDhjLTkuNjk1LTAuMzk1LTE5LjA3LTIuNzA3LTI3Ljg1OS02Ljg3MSAgICAgbC04Ny4yMzQtNDEuMzI0Yy0zLjk5Mi0xLjg5MS01LjcwMy02LjY2NC0zLjgwNS0xMC42NTZzNi42OC01LjY5MSwxMC42NDgtMy44MDVsODcuMjQyLDQxLjMyNCAgICAgYzYuODM2LDMuMjM4LDE0LjEyNSw1LjAzOSwyMS42NjQsNS4zNDhjNC40MTQsMC4xOCw3Ljg0NCwzLjkwNiw3LjY2NCw4LjMyQzM5OS44MjEsMTExLjQzLDM5Ni4yNzQsMTE0LjgwMSwzOTIuMDA5LDExNC44MDF6Ii8+CgkJPC9nPgoJPC9nPgoJPGc+CgkJPHBvbHlsaW5lIHN0eWxlPSJmaWxsOiM1QzU0NkE7IiBwb2ludHM9IjI0MC4wMDEsNDMyLjAwMSAyNDAuMDAxLDY3LjE2NyAyNzIuMDAxLDY3LjE2NyAyNzIuMDAxLDQzMi4wMDEgICAiLz4KCTwvZz4KCTxnPgoJCTxwYXRoIHN0eWxlPSJmaWxsOiM4QTg4OTU7IiBkPSJNMjU2LjAwMSw0MjQuMDAxYy0zNS4yODksMC02NCwyOC43MTEtNjQsNjRjMCw0LjQxOCwzLjU3OCw4LDgsOHM4LTMuNTgyLDgtOGg5NiAgICBjMCw0LjQxOCwzLjU3OCw4LDgsOHM4LTMuNTgyLDgtOEMzMjAuMDAxLDQ1Mi43MTIsMjkxLjI5LDQyNC4wMDEsMjU2LjAwMSw0MjQuMDAxeiIvPgoJPC9nPgoJPGc+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiM1QzU0NkE7IiBkPSJNMzUyLjAwMSw0OTYuMDAxaC0xOTJjLTQuNDIyLDAtOC0zLjU4Mi04LThzMy41NzgtOCw4LThoMTkyYzQuNDIyLDAsOCwzLjU4Miw4LDggICAgIFMzNTYuNDIzLDQ5Ni4wMDEsMzUyLjAwMSw0OTYuMDAxeiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojRkZEMTAwOyIgZD0iTTIwMC4wMDEsMjk2LjAwMWgtMTkyYy00LjQyMiwwLTgsMy41ODItOCw4YzAsNDguNTIzLDQ2LjY1Niw4OCwxMDQsODhzMTA0LTM5LjQ3NywxMDQtODggICAgIEMyMDguMDAxLDI5OS41ODMsMjA0LjQyMywyOTYuMDAxLDIwMC4wMDEsMjk2LjAwMXoiLz4KCQk8L2c+CgkJPGc+CgkJCTxwYXRoIHN0eWxlPSJmaWxsOiNGRjk1MDA7IiBkPSJNOC4wMDEsMjk2LjAwMWMtNC40MjIsMC04LDMuNTgyLTgsOGMwLDQ4LjUyMyw0Ni42NTYsODgsMTA0LDg4di05Nkg4LjAwMXoiLz4KCQk8L2c+Cgk8L2c+Cgk8Zz4KCQk8Zz4KCQkJPHBhdGggc3R5bGU9ImZpbGw6I0ZGRDEwMDsiIGQ9Ik01MDQuMDAxLDI5Ni4wMDFoLTE5MmMtNC40MjIsMC04LDMuNTgyLTgsOGMwLDQ4LjUyMyw0Ni42NTYsODgsMTA0LDg4czEwNC0zOS40NzcsMTA0LTg4ICAgICBDNTEyLjAwMSwyOTkuNTgzLDUwOC40MjMsMjk2LjAwMSw1MDQuMDAxLDI5Ni4wMDF6Ii8+CgkJPC9nPgoJCTxnPgoJCQk8cGF0aCBzdHlsZT0iZmlsbDojRkY5NTAwOyIgZD0iTTMxMi4wMDEsMjk2LjAwMWMtNC40MjIsMC04LDMuNTgyLTgsOGMwLDQ4LjUyMyw0Ni42NTYsODgsMTA0LDg4di05NkgzMTIuMDAxeiIvPgoJCTwvZz4KCTwvZz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6IzhBODg5NTsiIGN4PSIxMDQuMDAxIiBjeT0iMTA0LjAwMSIgcj0iMjQiLz4KCTwvZz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6IzhBODg5NTsiIGN4PSI0MDguMDAxIiBjeT0iMTA0LjAwMSIgcj0iMjQiLz4KCTwvZz4KCTxnPgoJCTxjaXJjbGUgc3R5bGU9ImZpbGw6IzhBODg5NTsiIGN4PSIyNTYuMDAxIiBjeT0iNDguMDAxIiByPSIzMiIvPgoJPC9nPgoJPGc+CgkJPGNpcmNsZSBzdHlsZT0iZmlsbDojNUM1NDZBOyIgY3g9IjI1Ni4wMDEiIGN5PSI0OC4wMDEiIHI9IjE2Ii8+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" width="24" height="24" data-toggle="tooltip" data-placement="right" title="Pagina inicial - ir para site/blog">
			</a>
     </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Dashboard</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FAQ <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Primeiro passo-a-passo</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Dúvidas frequêntes</a></li>
            <li role="separator" class="divider"></li>
            <li><a target="_blank" href="http://inicialtrabalhista.com/aula-de-advogado/recomendacoes-de-compatibilidade/">Recomendações do sistema</a></li>
          </ul>        
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrevista <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="empresa.php">Cadastro da Reclamada</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="cadastro.php">Cadastro do Reclamante</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Serviços <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="procuracao.php">Procuração/Ficha cadastral</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="inicial.php">Petição Inicial</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="add_eventos.php">Adicionar Eventos</a></li>
            <li><a href="audiencia.php">Calendario de Eventos</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="ver_pasta.php">Visualizar pasta & arquivos</a></li>
            <li><a href="cadastrar_pasta.php">Adicionar nova pasta</a></li>
          </ul>
        </li>
      </ul>
      <small>
		<form class="navbar-form navbar-left" role="search" method="get" action="ver_pasta.php">
		  <div class="form-group input-group" id="search_name">
			<input type="text" class="form-control navbar-search" id="termo" name="termo" placeholder="Buscar por nome...">
			<span class="input-group-btn">
			<button class="btn btn-default" type="submit">  Buscar</button>
			</span>
		  </div>
		</form>
	  </small>

	 <ul class="nav navbar-nav nav-pills">
         <script type="text/javascript">
			 
$(document).ready(function(){
 
  $('.nav-pills .dropdown a').on('click',function(){
    
    var jqMenu = $(this).closest('.dropdown').find('.dropdown-menu');
     
    if (jqMenu.length > 0)
      {
        
        if (jqMenu.is(':visible')) {
           jqMenu.hide();
        }
        else
        {
           jqMenu.show();
        }
      } 
  })
})			 
		 </script>
       
        <li role="presentation" class="dropdown">
          <a href="#" class="dropdown-toggle"role="button" aria-haspopup="true" aria-expanded="true">
          Calendário <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span></a>
          <ul id="menu1" class="dropdown-menu" aria-labelledby="drop4">
           <script type="text/javascript">
			  
/**
 * Zabuto Calendar
 *
 * Dependencies
 * - jQuery (2.0.3)
 * - Twitter Bootstrap (3.0.2)
 */

if (typeof jQuery == 'undefined') {
    throw new Error('jQuery is not loaded');
}

/**
 * Create calendar
 *
 * @param options
 * @returns {*}
 */
$.fn.zabuto_calendar = function (options) {
    var opts = $.extend({}, $.fn.zabuto_calendar_defaults(), options);
    var languageSettings = $.fn.zabuto_calendar_language(opts.language);
    opts = $.extend({}, opts, languageSettings);

    this.each(function () {
        var $calendarElement = $(this);
        $calendarElement.attr('id', "zabuto_calendar_" + Math.floor(Math.random() * 99999).toString(36));

        $calendarElement.data('initYear', opts.year);
        $calendarElement.data('initMonth', opts.month);
        $calendarElement.data('monthLabels', opts.month_labels);
        $calendarElement.data('weekStartsOn', opts.weekstartson);
        $calendarElement.data('navIcons', opts.nav_icon);
        $calendarElement.data('dowLabels', opts.dow_labels);
        $calendarElement.data('showToday', opts.today);
        $calendarElement.data('showDays', opts.show_days);
        $calendarElement.data('showPrevious', opts.show_previous);
        $calendarElement.data('showNext', opts.show_next);
        $calendarElement.data('cellBorder', opts.cell_border);
        $calendarElement.data('jsonData', opts.data);
        $calendarElement.data('ajaxSettings', opts.ajax);
        $calendarElement.data('legendList', opts.legend);
        $calendarElement.data('actionFunction', opts.action);
        $calendarElement.data('actionNavFunction', opts.action_nav);

        drawCalendar();

        function drawCalendar() {
            var dateInitYear = parseInt($calendarElement.data('initYear'));
            var dateInitMonth = parseInt($calendarElement.data('initMonth')) - 1;
            var dateInitObj = new Date(dateInitYear, dateInitMonth, 1, 0, 0, 0, 0);
            $calendarElement.data('initDate', dateInitObj);

            var tableClassHtml = ($calendarElement.data('cellBorder') === true) ? ' table-bordered' : '';

            $tableObj = $('<table class="table' + tableClassHtml + '"></table>');
            $tableObj = drawTable($calendarElement, $tableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());

            $legendObj = drawLegend($calendarElement);

            var $containerHtml = $('<div class="zabuto_calendar" id="' + $calendarElement.attr('id') + '"></div>');
            $containerHtml.append($tableObj);
            $containerHtml.append($legendObj);

            $calendarElement.append($containerHtml);

            var jsonData = $calendarElement.data('jsonData');
            if (false !== jsonData) {
                checkEvents($calendarElement, dateInitObj.getFullYear(), dateInitObj.getMonth());
            }
        }

        function drawTable($calendarElement, $tableObj, year, month) {
            var dateCurrObj = new Date(year, month, 1, 0, 0, 0, 0);
            $calendarElement.data('currDate', dateCurrObj);

            $tableObj.empty();
            $tableObj = appendMonthHeader($calendarElement, $tableObj, year, month);
            $tableObj = appendDayOfWeekHeader($calendarElement, $tableObj);
            $tableObj = appendDaysOfMonth($calendarElement, $tableObj, year, month);
            checkEvents($calendarElement, year, month);
            return $tableObj;
        }

        function drawLegend($calendarElement) {
            var $legendObj = $('<div class="legend" id="' + $calendarElement.attr('id') + '_legend"></div>');
            var legend = $calendarElement.data('legendList');
            if (typeof(legend) == 'object' && legend.length > 0) {
                $(legend).each(function (index, item) {
                    if (typeof(item) == 'object') {
                        if ('type' in item) {
                            var itemLabel = '';
                            if ('label' in item) {
                                itemLabel = item.label;
                            }

                            switch (item.type) {
                                case 'text':
                                    if (itemLabel !== '') {
                                        var itemBadge = '';
                                        if ('badge' in item) {
                                            if (typeof(item.classname) === 'undefined') {
                                                var badgeClassName = 'badge-event';
                                            } else {
                                                var badgeClassName = item.classname;
                                            }
                                            itemBadge = '<span class="badge ' + badgeClassName + '">' + item.badge + '</span> ';
                                        }
                                        $legendObj.append('<span class="legend-' + item.type + '">' + itemBadge + itemLabel + '</span>');
                                    }
                                    break;
                                case 'block':
                                    if (itemLabel !== '') {
                                        itemLabel = '<span>' + itemLabel + '</span>';
                                    }
                                    if (typeof(item.classname) === 'undefined') {
                                        var listClassName = 'event';
                                    } else {
                                        var listClassName = 'event-styled ' + item.classname;
                                    }
                                    $legendObj.append('<span class="legend-' + item.type + '"><ul class="legend"><li class="' + listClassName + '"></li></u>' + itemLabel + '</span>');
                                    break;
                                case 'list':
                                    if ('list' in item && typeof(item.list) == 'object' && item.list.length > 0) {
                                        var $legendUl = $('<ul class="legend"></u>');
                                        $(item.list).each(function (listIndex, listClassName) {
                                            $legendUl.append('<li class="' + listClassName + '"></li>');
                                        });
                                        $legendObj.append($legendUl);
                                    }
                                    break;
                                case 'spacer':
                                    $legendObj.append('<span class="legend-' + item.type + '"> </span>');
                                    break;

                            }
                        }
                    }
                });
            }

            return $legendObj;
        }

        function appendMonthHeader($calendarElement, $tableObj, year, month) {
            var navIcons = $calendarElement.data('navIcons');
            var $prevMonthNavIcon = $('<span><span class="glyphicon glyphicon-chevron-left"></span></span>');
            var $nextMonthNavIcon = $('<span><span class="glyphicon glyphicon-chevron-right"></span></span>');
            if (typeof(navIcons) === 'object') {
                if ('prev' in navIcons) {
                    $prevMonthNavIcon.html(navIcons.prev);
                }
                if ('next' in navIcons) {
                    $nextMonthNavIcon.html(navIcons.next);
                }
            }

            var prevIsValid = $calendarElement.data('showPrevious');
            if (typeof(prevIsValid) === 'number' || prevIsValid === false) {
                prevIsValid = checkMonthLimit($calendarElement.data('showPrevious'), true);
            }

            var $prevMonthNav = $('<div class="calendar-month-navigation"></div>');
            $prevMonthNav.attr('id', $calendarElement.attr('id') + '_nav-prev');
            $prevMonthNav.data('navigation', 'prev');
            if (prevIsValid !== false) {
                prevMonth = (month - 1);
                prevYear = year;
                if (prevMonth == -1) {
                    prevYear = (prevYear - 1);
                    prevMonth = 11;
                }
                $prevMonthNav.data('to', {year: prevYear, month: (prevMonth + 1)});
                $prevMonthNav.append($prevMonthNavIcon);
                if (typeof($calendarElement.data('actionNavFunction')) === 'function') {
                    $prevMonthNav.click($calendarElement.data('actionNavFunction'));
                }
                $prevMonthNav.click(function (e) {
                    drawTable($calendarElement, $tableObj, prevYear, prevMonth);
                });
            }

            var nextIsValid = $calendarElement.data('showNext');
            if (typeof(nextIsValid) === 'number' || nextIsValid === false) {
                nextIsValid = checkMonthLimit($calendarElement.data('showNext'), false);
            }

            var $nextMonthNav = $('<div class="calendar-month-navigation"></div>');
            $nextMonthNav.attr('id', $calendarElement.attr('id') + '_nav-next');
            $nextMonthNav.data('navigation', 'next');
            if (nextIsValid !== false) {
                nextMonth = (month + 1);
                nextYear = year;
                if (nextMonth == 12) {
                    nextYear = (nextYear + 1);
                    nextMonth = 0;
                }
                $nextMonthNav.data('to', {year: nextYear, month: (nextMonth + 1)});
                $nextMonthNav.append($nextMonthNavIcon);
                if (typeof($calendarElement.data('actionNavFunction')) === 'function') {
                    $nextMonthNav.click($calendarElement.data('actionNavFunction'));
                }
                $nextMonthNav.click(function (e) {
                    drawTable($calendarElement, $tableObj, nextYear, nextMonth);
                });
            }

            var monthLabels = $calendarElement.data('monthLabels');

            var $prevMonthCell = $('<th></th>').append($prevMonthNav);
            var $nextMonthCell = $('<th></th>').append($nextMonthNav);

            var $currMonthLabel = $('<span>' + monthLabels[month] + ' ' + year + '</span>');
            $currMonthLabel.dblclick(function () {
                var dateInitObj = $calendarElement.data('initDate');
                drawTable($calendarElement, $tableObj, dateInitObj.getFullYear(), dateInitObj.getMonth());
            });

            var $currMonthCell = $('<th colspan="5"></th>');
            $currMonthCell.append($currMonthLabel);

            var $monthHeaderRow = $('<tr class="calendar-month-header"></tr>');
            $monthHeaderRow.append($prevMonthCell, $currMonthCell, $nextMonthCell);

            $tableObj.append($monthHeaderRow);
            return $tableObj;
        }

        function appendDayOfWeekHeader($calendarElement, $tableObj) {
            if ($calendarElement.data('showDays') === true) {
                var weekStartsOn = $calendarElement.data('weekStartsOn');
                var dowLabels = $calendarElement.data('dowLabels');
                if (weekStartsOn === 0) {
                    var dowFull = $.extend([], dowLabels);
                    var sunArray = new Array(dowFull.pop());
                    dowLabels = sunArray.concat(dowFull);
                }

                var $dowHeaderRow = $('<tr class="calendar-dow-header"></tr>');
                $(dowLabels).each(function (index, value) {
                    $dowHeaderRow.append('<th>' + value + '</th>');
                });
                $tableObj.append($dowHeaderRow);
            }
            return $tableObj;
        }

        function appendDaysOfMonth($calendarElement, $tableObj, year, month) {
            var ajaxSettings = $calendarElement.data('ajaxSettings');
            var weeksInMonth = calcWeeksInMonth(year, month);
            var lastDayinMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, lastDayinMonth);
            var currDayOfMonth = 1;

            var weekStartsOn = $calendarElement.data('weekStartsOn');
            if (weekStartsOn === 0) {
                if (lastDow == 6) {
                    weeksInMonth++;
                }
                if (firstDow == 6 && (lastDow == 0 || lastDow == 1 || lastDow == 5)) {
                    weeksInMonth--;
                }
                firstDow++;
                if (firstDow == 7) {
                    firstDow = 0;
                }
            }

            for (var wk = 0; wk < weeksInMonth; wk++) {
                var $dowRow = $('<tr class="calendar-dow"></tr>');
                for (var dow = 0; dow < 7; dow++) {
                    if (dow < firstDow || currDayOfMonth > lastDayinMonth) {
                        $dowRow.append('<td></td>');
                    } else {
                        var dateId = $calendarElement.attr('id') + '_' + dateAsString(year, month, currDayOfMonth);
                        var dayId = dateId + '_day';

                        var $dayElement = $('<div id="' + dayId + '" class="day" >' + currDayOfMonth + '</div>');
                        $dayElement.data('day', currDayOfMonth);

                        if ($calendarElement.data('showToday') === true) {
                            if (isToday(year, month, currDayOfMonth)) {
                                $dayElement.html('<span class="badge badge-today">' + currDayOfMonth + '</span>');
                            }
                        }

                        var $dowElement = $('<td id="' + dateId + '"></td>');
                        $dowElement.append($dayElement);

                        $dowElement.data('date', dateAsString(year, month, currDayOfMonth));
                        $dowElement.data('hasEvent', false);

                        if (typeof($calendarElement.data('actionFunction')) === 'function') {
                            $dowElement.addClass('dow-clickable');
                            $dowElement.click(function () {
                                $calendarElement.data('selectedDate', $(this).data('date'));
                            });
                            $dowElement.click($calendarElement.data('actionFunction'));
                        }

                        $dowRow.append($dowElement);

                        currDayOfMonth++;
                    }
                    if (dow == 6) {
                        firstDow = 0;
                    }
                }

                $tableObj.append($dowRow);
            }
            return $tableObj;
        }

        /* ----- Modal functions ----- */

        function createModal(id, title, body, footer) {
            var $modalHeaderButton = $('<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>');
            var $modalHeaderTitle = $('<h4 class="modal-title" id="' + id + '_modal_title">' + title + '</h4>');

            var $modalHeader = $('<div class="modal-header"></div>');
            $modalHeader.append($modalHeaderButton);
            $modalHeader.append($modalHeaderTitle);

            var $modalBody = $('<div class="modal-body" id="' + id + '_modal_body">' + body + '</div>');

            var $modalFooter = $('<div class="modal-footer" id="' + id + '_modal_footer"></div>');
            if (typeof(footer) !== 'undefined') {
                var $modalFooterAddOn = $('<div>' + footer + '</div>');
                $modalFooter.append($modalFooterAddOn);
            }

            var $modalContent = $('<div class="modal-content"></div>');
            $modalContent.append($modalHeader);
            $modalContent.append($modalBody);
            $modalContent.append($modalFooter);

            var $modalDialog = $('<div class="modal-dialog"></div>');
            $modalDialog.append($modalContent);

            var $modalFade = $('<div class="modal fade" id="' + id + '_modal" tabindex="-1" role="dialog" aria-labelledby="' + id + '_modal_title" aria-hidden="true"></div>');
            $modalFade.append($modalDialog);

            $modalFade.data('dateId', id);
            $modalFade.attr("dateId", id);

            return $modalFade;
        }

        /* ----- Event functions ----- */

        function checkEvents($calendarElement, year, month) {
            var jsonData = $calendarElement.data('jsonData');
            var ajaxSettings = $calendarElement.data('ajaxSettings');

            $calendarElement.data('events', false);

            if (false !== jsonData) {
                return jsonEvents($calendarElement);
            } else if (false !== ajaxSettings) {
                return ajaxEvents($calendarElement, year, month);
            }

            return true;
        }

        function jsonEvents($calendarElement) {
            var jsonData = $calendarElement.data('jsonData');
            $calendarElement.data('events', jsonData);
            drawEvents($calendarElement, 'json');
            return true;
        }

        function ajaxEvents($calendarElement, year, month) {
            var ajaxSettings = $calendarElement.data('ajaxSettings');

            if (typeof(ajaxSettings) != 'object' || typeof(ajaxSettings.url) == 'undefined') {
                alert('Invalid calendar event settings');
                return false;
            }

            var data = {year: year, month: (month + 1)};

            $.ajax({
                type: 'GET',
                url: ajaxSettings.url,
                data: data,
                dataType: 'json'
            }).done(function (response) {
                var events = [];
                $.each(response, function (k, v) {
                    events.push(response[k]);
                });
                $calendarElement.data('events', events);
                drawEvents($calendarElement, 'ajax');
            });

            return true;
        }

        function drawEvents($calendarElement, type) {
            var jsonData = $calendarElement.data('jsonData');
            var ajaxSettings = $calendarElement.data('ajaxSettings');

            var events = $calendarElement.data('events');
            if (events !== false) {
                $(events).each(function (index, value) {
                    var id = $calendarElement.attr('id') + '_' + value.date;
                    var $dowElement = $('#' + id);
                    var $dayElement = $('#' + id + '_day');

                    $dowElement.data('hasEvent', true);

                    if (typeof(value.title) !== 'undefined') {
                        $dowElement.attr('title', value.title);
                    }

                    if (typeof(value.classname) === 'undefined') {
                        $dowElement.addClass('event');
                    } else {
                        $dowElement.addClass('event-styled');
                        $dayElement.addClass(value.classname);
                    }

                    if (typeof(value.badge) !== 'undefined' && value.badge !== false) {
                        var badgeClass = (value.badge === true) ? '' : ' badge-' + value.badge;
                        var dayLabel = $dayElement.data('day');
                        $dayElement.html('<span class="badge badge-event' + badgeClass + '">' + dayLabel + '</span>');
                    }

                    if (typeof(value.body) !== 'undefined') {
                        var modalUse = false;
                        if (type === 'json' && typeof(value.modal) !== 'undefined' && value.modal === true) {
                            modalUse = true;
                        } else if (type === 'ajax' && 'modal' in ajaxSettings && ajaxSettings.modal === true) {
                            modalUse = true;
                        }

                        if (modalUse === true) {
                            $dowElement.addClass('event-clickable');

                            var $modalElement = createModal(id, value.title, value.body, value.footer);
                            $('body').append($modalElement);

                            $('#' + id).click(function () {
                                $('#' + id + '_modal').modal();
                            });
                        }
                    }
                });
            }
        }

        /* ----- Helper functions ----- */

        function isToday(year, month, day) {
            var todayObj = new Date();
            var dateObj = new Date(year, month, day);
            return (dateObj.toDateString() == todayObj.toDateString());
        }

        function dateAsString(year, month, day) {
            d = (day < 10) ? '0' + day : day;
            m = month + 1;
            m = (m < 10) ? '0' + m : m;
            return year + '-' + m + '-' + d;
        }

        function calcDayOfWeek(year, month, day) {
            var dateObj = new Date(year, month, day, 0, 0, 0, 0);
            var dow = dateObj.getDay();
            if (dow == 0) {
                dow = 6;
            } else {
                dow--;
            }
            return dow;
        }

        function calcLastDayInMonth(year, month) {
            var day = 28;
            while (checkValidDate(year, month + 1, day + 1)) {
                day++;
            }
            return day;
        }

        function calcWeeksInMonth(year, month) {
            var daysInMonth = calcLastDayInMonth(year, month);
            var firstDow = calcDayOfWeek(year, month, 1);
            var lastDow = calcDayOfWeek(year, month, daysInMonth);
            var days = daysInMonth;
            var correct = (firstDow - lastDow);
            if (correct > 0) {
                days += correct;
            }
            return Math.ceil(days / 7);
        }

        function checkValidDate(y, m, d) {
            return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
        }

        function checkMonthLimit(count, invert) {
            if (count === false) {
                count = 0;
            }
            var d1 = $calendarElement.data('currDate');
            var d2 = $calendarElement.data('initDate');

            var months;
            months = (d2.getFullYear() - d1.getFullYear()) * 12;
            months -= d1.getMonth() + 1;
            months += d2.getMonth();

            if (invert === true) {
                if (months < (parseInt(count) - 1)) {
                    return true;
                }
            } else {
                if (months >= (0 - parseInt(count))) {
                    return true;
                }
            }
            return false;
        }
    }); // each()

    return this;
};

/**
 * Default settings
 *
 * @returns object
 *   language:          string,
 *   year:              integer,
 *   month:             integer,
 *   show_previous:     boolean|integer,
 *   show_next:         boolean|integer,
 *   cell_border:       boolean,
 *   today:             boolean,
 *   show_days:         boolean,
 *   weekstartson:      integer (0 = Sunday, 1 = Monday),
 *   nav_icon:          object: prev: string, next: string
 *   ajax:              object: url: string, modal: boolean,
 *   legend:            object array, [{type: string, label: string, classname: string}]
 *   action:            function
 *   action_nav:        function
 */
$.fn.zabuto_calendar_defaults = function () {
    var now = new Date();
    var year = now.getFullYear();
    var month = now.getMonth() + 1;
    var settings = {
        language: false,
        year: year,
        month: month,
        show_previous: true,
        show_next: true,
        cell_border: true,
        today: true,
        show_days: true,
        weekstartson: 1,
        nav_icon: false,
        data: false,
        ajax: true,
        legend: false,
        action: false,
        action_nav: false
    };
    return settings;
};

/**
 * Language settings
 *
 * @param lang
 * @returns {{month_labels: Array, dow_labels: Array}}
 */
$.fn.zabuto_calendar_language = function (lang) {
    if (typeof(lang) == 'undefined' || lang === false) {
        lang = 'en';
    }

    switch (lang.toLowerCase()) {
     

        case 'en':
            return {
                month_labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                dow_labels: ["Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom"]
            };
            break;

     
    }

};


   $(document).ready(function () {
    $("#my-calendar").zabuto_calendar({
      legend: [
        {type: "text", label: "Audiências totais", badge: "999"},
 //       {type: "block", label: "Regular event", classname: "purple"},
//        {type: "spacer"},
//        {type: "text", label: "Bad"},
//        {type: "list", list: ["grade-1", "grade-2", "grade-3", "grade-4"]},
//        {type: "text", label: "Good"}
      ],
      ajax: {
        url: "show_data.php?grade=1"
      }
    });
  });
			   
		   </script>
           <style type="text/css">
			  
/**
 * Zabuto Calendar
 */

div.zabuto_calendar {
    margin: 0;
    padding: 0;
}

div.zabuto_calendar .table {
    width: 100%;
    margin: 0;
    padding: 0;
}

div.zabuto_calendar .table th,
div.zabuto_calendar .table td {
    padding: 4px 2px;
    text-align: center;
}

div.zabuto_calendar .table tr th,
div.zabuto_calendar .table tr td {
    background-color: #ffffff;
}

div.zabuto_calendar .table tr.calendar-month-header th {
    background-color: #fafafa;
}

div.zabuto_calendar .table tr.calendar-month-header th span {
    cursor: pointer;
    display: inline-block;
    padding-bottom: 10px;
}

div.zabuto_calendar .table tr.calendar-dow-header th {
    background-color: #f0f0f0;
}

div.zabuto_calendar .table tr:last-child {
    border-bottom: 1px solid #dddddd;
}

div.zabuto_calendar .table tr.calendar-month-header th {
    padding-top: 12px;
    padding-bottom: 4px;
}

div.zabuto_calendar .table-bordered tr.calendar-month-header th {
    border-left: 0;
    border-right: 0;
}

div.zabuto_calendar .table-bordered tr.calendar-month-header th:first-child {
    border-left: 1px solid #dddddd;
}

div.zabuto_calendar div.calendar-month-navigation {
    cursor: pointer;
    margin: 0;
    padding: 0;
    padding-top: 5px;
}

div.zabuto_calendar tr.calendar-dow-header th,
div.zabuto_calendar tr.calendar-dow td {
    width: 14%;
}

div.zabuto_calendar .table tr td div.day {
    margin: 0;
    padding-top: 7px;
    padding-bottom: 7px;
}

/* actions and events */
div.zabuto_calendar .table tr td.event div.day,
div.zabuto_calendar ul.legend li.event {
    background-color: #fff0c3;
}

div.zabuto_calendar .table tr td.dow-clickable,
div.zabuto_calendar .table tr td.event-clickable {
    cursor: pointer;
}

/* badge */
div.zabuto_calendar .badge-today,
div.zabuto_calendar div.legend span.badge-today {
    background-color: #357ebd;
    color: #ffffff;
    text-shadow: none;
}

div.zabuto_calendar .badge-event,
div.zabuto_calendar div.legend span.badge-event {
    background-color: #ff9b08;
    color: #ffffff;
    text-shadow: none;
}

div.zabuto_calendar .badge-event {
    font-size: 0.95em;
    padding-left: 8px;
    padding-right: 8px;
    padding-bottom: 4px;
}

/* legend */
div.zabuto_calendar div.legend {
    margin-top: 5px;
    text-align: right;
}

div.zabuto_calendar div.legend span {
    color: #999999;
    font-size: 10px;
    font-weight: normal;
}

div.zabuto_calendar div.legend span.legend-text:after,
div.zabuto_calendar div.legend span.legend-block:after,
div.zabuto_calendar div.legend span.legend-list:after,
div.zabuto_calendar div.legend span.legend-spacer:after {
    content: ' ';
}

div.zabuto_calendar div.legend span.legend-spacer {
    padding-left: 25px;
}

div.zabuto_calendar ul.legend > span {
    padding-left: 2px;
}

div.zabuto_calendar ul.legend {
    display: inline-block;
    list-style: none outside none;
    margin: 0;
    padding: 0;
}

div.zabuto_calendar ul.legend li {
    display: inline-block;
    height: 11px;
    width: 11px;
    margin-left: 5px;
}

div.zabuto_calendar ul.legend
div.zabuto_calendar ul.legend li:first-child {
    margin-left: 7px;
}

div.zabuto_calendar ul.legend li:last-child {
    margin-right: 5px;
}

div.zabuto_calendar div.legend span.badge {
    font-size: 0.9em;
    border-radius: 5px 5px 5px 5px;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 2px;
    padding-bottom: 3px;
}

/* responsive */
@media (max-width: 979px) {
    div.zabuto_calendar .table th,
    div.zabuto_calendar .table td {
        padding: 2px 1px;
    }
}

			   
		   </style>
            <li>
			<div class="container-fluid">
			  <div class="row"> 
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			<div id="my-calendar"></div>

				</div><!--(./col-lg-12 col-md-12 col-sm-12 col-xs-12"BELOW ROW:)-->
			  </div><!--(./row)-->
			</div><!--(./COntainer")-->
            </li>
          </ul>
        </li>   
	  </ul>  
	  <ul class="nav navbar-nav navbar-right">
        <li role="presentation" class="dropdown">
          <a href="#" class="dropdown-toggle"role="button" aria-haspopup="true" aria-expanded="true">
          Notificação <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
          </a>
          <ul id="menu1" class="dropdown-menu" aria-labelledby="drop4">
            <li>

            </li>
          </ul>
        </li>   
        <li class="divider-vertical"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $adv_nome ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
            <a href="adv_user.php">
            <center>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANEAAADRCAYAAABSOlfvAAAACXBIWXMAAAsTAAALEwEAmpwYAAA4LmlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgICAgICAgICAgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIgogICAgICAgICAgICB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIKICAgICAgICAgICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNyAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhtcDpDcmVhdGVEYXRlPjIwMTctMDgtMDFUMDY6MDQ6MzQtMDM6MDA8L3htcDpDcmVhdGVEYXRlPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNy0wOC0wMVQwNjoxNS0wMzowMDwveG1wOk1vZGlmeURhdGU+CiAgICAgICAgIDx4bXA6TWV0YWRhdGFEYXRlPjIwMTctMDgtMDFUMDY6MTUtMDM6MDA8L3htcDpNZXRhZGF0YURhdGU+CiAgICAgICAgIDxkYzpmb3JtYXQ+aW1hZ2UvcG5nPC9kYzpmb3JtYXQ+CiAgICAgICAgIDxwaG90b3Nob3A6Q29sb3JNb2RlPjM8L3Bob3Rvc2hvcDpDb2xvck1vZGU+CiAgICAgICAgIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6NGVhYWM4ZjgtZDg2ZS0zYTQ3LWI3OTYtOThmY2NlYzQyOThhPC94bXBNTTpJbnN0YW5jZUlEPgogICAgICAgICA8eG1wTU06RG9jdW1lbnRJRD5hZG9iZTpkb2NpZDpwaG90b3Nob3A6MTQ1NjAzZTgtNzY5OS0xMWU3LWE1ZTItZmJjODgxNDMxOTY1PC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPnhtcC5kaWQ6NGVhYWM4ZjgtZDg2ZS0zYTQ3LWI3OTYtOThmY2NlYzQyOThhPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpIaXN0b3J5PgogICAgICAgICAgICA8cmRmOlNlcT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+Y3JlYXRlZDwvc3RFdnQ6YWN0aW9uPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6aW5zdGFuY2VJRD54bXAuaWlkOjRlYWFjOGY4LWQ4NmUtM2E0Ny1iNzk2LTk4ZmNjZWM0Mjk4YTwvc3RFdnQ6aW5zdGFuY2VJRD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OndoZW4+MjAxNy0wOC0wMVQwNjowNDozNC0wMzowMDwvc3RFdnQ6d2hlbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OnNvZnR3YXJlQWdlbnQ+QWRvYmUgUGhvdG9zaG9wIENDIDIwMTcgKFdpbmRvd3MpPC9zdEV2dDpzb2Z0d2FyZUFnZW50PgogICAgICAgICAgICAgICA8L3JkZjpsaT4KICAgICAgICAgICAgPC9yZGY6U2VxPgogICAgICAgICA8L3htcE1NOkhpc3Rvcnk+CiAgICAgICAgIDx0aWZmOk9yaWVudGF0aW9uPjE8L3RpZmY6T3JpZW50YXRpb24+CiAgICAgICAgIDx0aWZmOlhSZXNvbHV0aW9uPjcyMDAwMC8xMDAwMDwvdGlmZjpYUmVzb2x1dGlvbj4KICAgICAgICAgPHRpZmY6WVJlc29sdXRpb24+NzIwMDAwLzEwMDAwPC90aWZmOllSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpSZXNvbHV0aW9uVW5pdD4yPC90aWZmOlJlc29sdXRpb25Vbml0PgogICAgICAgICA8ZXhpZjpDb2xvclNwYWNlPjY1NTM1PC9leGlmOkNvbG9yU3BhY2U+CiAgICAgICAgIDxleGlmOlBpeGVsWERpbWVuc2lvbj4yMDk8L2V4aWY6UGl4ZWxYRGltZW5zaW9uPgogICAgICAgICA8ZXhpZjpQaXhlbFlEaW1lbnNpb24+MjA5PC9leGlmOlBpeGVsWURpbWVuc2lvbj4KICAgICAgPC9yZGY6RGVzY3JpcHRpb24+CiAgIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAg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" alt="140x140" class="img-circle">
				<p class="text-primary">Configuração de usuário</p></center></a>
            </li>
            <li><a href="adv_user_conf.php">Configurações</a></li>
            <li><a href="adv_pw.php">Trocar senha</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="../sair.php">Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><br>
</body>
</html>