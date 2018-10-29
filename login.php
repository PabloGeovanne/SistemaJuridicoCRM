<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login - Advogado | Inicial Trabalhista</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
   
<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Roboto:300);
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form select {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {  
font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #3791c0;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #3791c0;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #3791c0;
  text-decoration: none;
}

.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #31a3dd; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #31a3dd, #31a3dd);
  background: -moz-linear-gradient(right, #31a3dd, #31a3dd);
  background: -o-linear-gradient(right, #31a3dd, #31a3dd);
  background: linear-gradient(to left, #31a3dd, #31a3dd);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
	</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/custom.js"></script>   
</head>
<body id="body">
<div class="login-page">
  <div class="form">
    <form class="register-form" name="loginform" method="post" action="cadastro.php">
      <input type="text" id="c_oab" name="c_oab" placeholder="Nº OAB"/>
      <input type="password" id="c_senha" name="c_senha" placeholder="****"/>
      <input type="email" id="c_email" name="c_email" placeholder="E-MAIL"/>
      <button>criar</button>
      <p class="message">Já é registrado? <a href="#">Acesse sua conta</a></p>
    </form>
    <form name="loginform" class="login-form" method="post" action="autenticacao.php">
      <input type="text" id="oab" name="oab" placeholder="OAB"/>
      <select type="text" id="adv_uf_oab" name="adv_uf_oab" placeholder="OAB/UF">
		<option value="" select>OAB/UF</option>
		<option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CA</option>
		<option value="DF">DF</option>
		<option value="ES">ES</option>
		<option value="GO">GO</option>
		<option value="MA">MA</option>
		<option value="MS">MS</option>
		<option value="MT">MT</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="RO">RO</option>
		<option value="RR">RR</option>
		<option value="SC">SC</option>
		<option value="SP">SP</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
	
       </select>	
      <input type="password" id="senha" name="senha" placeholder="****"/>
      <button>login</button>
      <p class="message">Ainda não é registrado? <a class="message" href="#">Crie sua conta</a></p>
    </form>
  </div>
</div>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
	</script>
</body>
</html>