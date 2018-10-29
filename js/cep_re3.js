$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep_terceira').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep_terceira').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_emp_terceira').val(data.rua);
                        $('#bairro_emp_terceira').val(data.bairro);
                        $('#city_emp_terceira').val(data.cidade);
                        $('#uf_emp_terceira').val(data.estado);

                        $('#num_emp_terceira').focus();
                    }
                }
           });   
   return false;    
   })
});