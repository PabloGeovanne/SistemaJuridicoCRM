<html>
<head>
<title>Autenticando Usuario</title>
<script type="text/javascript">
function logadocomsucesso() {
	setTimeout("window.location='painel_adv/index.php'", 0);
	}
	
function falhanologin() {
	setTimeout("window.location='login.php'", 0);
	}
//sql injection fuction off repair	
function jf_anti_injection($sql) {
    $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|*|--|\)/"),"",$sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    return $sql;
}

function jf_anti_injection($sql) {
    $sql = mysql_real_escape_string($sql);
    return $sql;
}
</script>
</head>
<body>
<?php
    session_start(); 
        //Incluindo a conexão com banco de dados   
    include_once("config.php");    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['oab'])) && (isset($_POST['senha'])) && (isset($_POST['adv_uf_oab']))){
        $usuario = mysqli_real_escape_string($conexao, $_POST['oab']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
       // $senha = md5($senha);
		$uf_oab = mysqli_real_escape_string($conexao, $_POST['adv_uf_oab']);
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM advogads WHERE oab = '$usuario' && senha = '$senha' && adv_uf_oab = '$uf_oab' LIMIT 1";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['id'] = $resultado['id'];
			$_SESSION['oab'] = $resultado['oab'];
			$_SESSION['adv_nome'] = $resultado['adv_nome'];
            $_SESSION['senha'] = $resultado['senha'];
            $_SESSION['usuarioNiveisAcessoId'] = $resultado['ativo'];
            $_SESSION['adv_email'] = $resultado['adv_email'];
			
            if($_SESSION['usuarioNiveisAcessoId'] == "1"){
                header("Location: painel_adv/index.php");
				
            }elseif($_SESSION['usuarioNiveisAcessoId'] != "1"){
				
				echo"<script type='text/javascript'>";
				echo "window.location='login.php';alert('Sua OAB ainda não foi ativada pelo nossos administradores. Aguarde!')";
				echo "</script>";
			
			}
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "OAB ou senha Inválido";
			
				echo"<script type='text/javascript'>";
				echo "alert('OAB, UF/OAB ou a senha estão inválidos. Tente novamente!');window.history.back()";
				echo "</script>";
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "OAB ou senha inválido";

				echo"<script type='text/javascript'>";
				echo "window.location='login.php';alert('OAB ou senha inválidos')";
				echo "</script>";	
    }	
?>	
</body>
</html>