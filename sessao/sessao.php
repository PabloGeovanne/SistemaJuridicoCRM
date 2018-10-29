<?php
	session_start();
	if(!isset($_SESSION["oab"]) || !isset($_SESSION["senha"]))
	 {
		header("Location: http://inicialtrabalhista.com/adv/login.php");
		exit;
	}else{
		echo "";
		}
		
		
?>