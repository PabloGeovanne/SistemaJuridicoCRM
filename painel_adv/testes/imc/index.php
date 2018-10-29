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
    
    <!--Calculadora-->
    <div id="calculadora">
    	<!--Formulario-->
        <form name="calc" method="get" enctype="multipart/form-data" action="resultado.php" class="form">
        	
            <fieldset class="f">
            	
                <label>
                <span class="span">Tempo de aviso</span>
                <br/>
                <input type="text" id="temp_aviso" name="temp_aviso" class="in" />
                </label>
                
                <br />
                <label>
                <span class="span">Salário</span>
                <br/>
                <input type="text" id="salario" name="salario" class="in"/>
                </label>
                
                <br />
                <label>
                <span class="span">dias do mês</span>
                <br/>
                <input type="text" id="dias_mes" name="dias_mes" class="in"/>
                </label>
                
                <input type="submit" name="envia" value="aviso_calc!" class="btn">
                
            
            </fieldset>
        
        </form>
        <!--Fim Formulario-->
    </div>
    <!--Fim Calculadora-->
</div>
<!--Fim Content-->   
    
</body>
</html>