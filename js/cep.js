$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cliente_cep').blur(function(){
           /* Configura a requisição AJAX */
           $.ajax({
                url : 'consultar_cep.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cliente_cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == 1){
                        $('#end_rua').val(data.rua);
                        $('#end_bairro').val(data.bairro);
                        $('#end_cidade').val(data.cidade);
                        $('#end_uf').val(data.estado);
 
                        $('#end_numero').focus();
                    }
                }
           });   
   return false;    
   })
});