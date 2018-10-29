$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep_quarta').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep_quarta').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#rua_emp_quarta').val(data.rua);
                        $('#bairro_emp_quarta').val(data.bairro);
                        $('#city_emp_quarta').val(data.cidade);
                        $('#uf_emp_quarta').val(data.estado);

                        $('#num_emp_quarta').focus();
                    }
                }
           });   
   return false;    
   })
});