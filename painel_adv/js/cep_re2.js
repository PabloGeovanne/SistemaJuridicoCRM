$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep_segunda').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep_segunda').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_emp_segunda').val(data.rua);
                        $('#bairro_emp_segunda').val(data.bairro);
                        $('#city_emp_segunda').val(data.cidade);
                        $('#uf_emp_segunda').val(data.estado);

                        $('#num_emp_segunda').focus();
                    }
                }
           });   
   return false;    
   })
});