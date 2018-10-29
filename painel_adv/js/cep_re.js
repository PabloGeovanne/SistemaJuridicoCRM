$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#emp_cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#emp_cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#emp_rua').val(data.rua);
                        $('#emp_bairro').val(data.bairro);
                        $('#emp_city').val(data.cidade);
                        $('#emp_uf').val(data.estado);

                        $('#emp_num').focus();
                    }
                }
           });   
   return false;    
   })
});