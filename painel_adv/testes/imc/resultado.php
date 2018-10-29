<!--
Desenvolvido por Designer Lucas
www.designerlucas.net
-->
<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>Calculadora IMC</title>
<link href="enc/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
<!--Content-->
<div id="content">
    <!--Logo-->
    <div id="logo">
    </div>
    <!--Fim Logo-->
   
        <!--IMC-->
        <div id="resultado">
        <?php 
		$salario = $_GET['salario'];
		$dias_mes = $_GET['dias_mes'];
		$temp_aviso = $_GET['temp_aviso'];
		
		$conta1 = $salario/$dias_mes;
		$conta2 = $conta1*$temp_aviso;
		
		$resultado = number_format($conta2);
		
		if(isset($resultado) && $resultado != '0'){;	
			echo '<h1>O valor do aviso prévio é:</h1>';
			echo '<h2>'.$resultado.'</h2>';
		}else{
			echo '<h1>Por favor, utilize apenas numeros!</h1>';	
		}
		?>
			
      <input type="text" name="result" id="result" class="in" value="<?php echo $resultado ?>"> 	
          
           
        </div>
        <!---Fim IMC-->
        
</div>
<!--Fim Content-->   
    
</body>
</html>