$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#busca" ).autocomplete({
	    minLength: 3,
	    source: function( request, response ) {
	        $.ajax({
	            url: "consulta_2.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#busca').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#busca").val( ui.item.cliente_cpf );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#busca").val( ui.item.cliente_cpf );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a><b>Nome completo: </b>" + item.nomecompleto + "<br><b>Endereço: </b>" + item.end_rua + " - <b> RG: </b>" + item.rg_num + "  <br><b>CPF: </b>" + item.cliente_cpf + "</a><br>" )
        .appendTo( ul );
    };

    // Função para carregar os dados da consulta nos respectivos campos
    function carregarDados(){
    	var busca = $('#busca').val();

    	if(busca != "" && busca.length >= 2){
    		$.ajax({
	            url: "consulta_2.php",
	            dataType: "json",	
	            data: {
	            	acao: 'consulta',
	                parametro: $('#busca').val()
	            },
	            success: function( data ) {
					   $('#categoria').val(data[0].categoria);
					   $('#valor_compra').val(data[0].valor_compra);
					   $('#valor_venda').val(data[0].valor_venda);
					   $('#data_cadastro').val(data[0].data_cadastro);
					   $('#rg_data_exp').val(data[0].rg_data_exp);
					   $('#nomecompleto').val(data[0].nomecompleto);
					   $('#nacionalidade').val(data[0].nacionalidade);
					   $('#estadocivil').val(data[0].estadocivil);
					   $('#cargo').val(data[0].cargo);
					   $('#nasc_dia').val(data[0].nasc_dia);
					   $('#nasc_mes').val(data[0].nasc_mes);
					   $('#nasc_ano').val(data[0].nasc_ano);
					   $('#rg_num').val(data[0].rg_num);
					   $('#rg_origem').val(data[0].rg_origem);
					   $('#rg_data_exp').val(data[0].rg_data_exp);
					   $('#cliente_cpf_num').val(data[0].cliente_cpf);
					   $('#nome_mae').val(data[0].nome_mae);
					   $('#on_pai').val(data[0].on_pai);
					   $('#nome_pai').val(data[0].nome_pai);
					   $('#pis_num').val(data[0].pis_num);
					   $('#ctps_numero').val(data[0].ctps_numero);
					   $('#ctps_serie').val(data[0].ctps_serie);
					   $('#ctps_uf').val(data[0].ctps_uf);
					   $('#end_rua').val(data[0].end_rua);
					   $('#end_numero').val(data[0].end_numero);
					   $('#end_bairro').val(data[0].end_bairro);
					   $('#end_cidade').val(data[0].end_cidade);
					   $('#cliente_cep').val(data[0].cliente_cep);
					   $('#end_uf').val(data[0].end_uf);
					   $('#end_complemento').val(data[0].end_complemento);
					   $('#nome_emp').val(data[0].nome_empresa);
					   $('#pasta_id').val(data[0].id);
					   $('#sex_or').val(data[0].sex_or);
					   $('#sex_singular').val(data[0].sex_singular);
					   $('#comarca_city').val(data[0].comarca_city);
					   $('#cli_cel').val(data[0].cli_cel);
					   $('#cli_tel').val(data[0].cli_tel);
					   $('#nome_emp').val(data[0].nome_emp);
					   $('#emp_tipo').val(data[0].emp_tipo);
					   $('#cnpj_cpf').val(data[0].cnpj_cpf);
					   $('#emp_rua').val(data[0].emp_rua);
					   $('#emp_num').val(data[0].emp_num);
					   $('#emp_bairro').val(data[0].emp_bairro);
					   $('#emp_city').val(data[0].emp_city);
					   $('#emp_uf').val(data[0].emp_uf);
					   $('#emp_comp').val(data[0].emp_comp);
					   $('#emp_cep').val(data[0].emp_cep);
					   $('#emp_tel').val(data[0].emp_tel);					   
					   $('#nome_cargo').val(data[0].nome_cargo);
					   $('#data_ent').val(data[0].data_ent);
					   $('#data_reg').val(data[0].data_reg);
					   $('#data_saida').val(data[0].data_saida);
					   $('#cump_aviso_previo').val(data[0].cump_aviso_previo);
					   $('#aviso_data').val(data[0].aviso_data);
					   $('#aviso_valor').val(data[0].aviso_valor);
					   $('#data_homo').val(data[0].data_homo);
					   $('#aviso_reducao').val(data[0].aviso_reducao);
					   $('#qm_homo').val(data[0].qm_homo);
					   $('#recebeu_homo').val(data[0].recebeu_homo);
					   $('#salario').val(data[0].salario);
					   $('#valor_fora').val(data[0].valor_fora);
					   $('#remu_total').val(data[0].remu_total);
					   $('#hrs_ent_sem').val(data[0].hrs_ent_sem);
					   $('#hrs_exit_sem').val(data[0].hrs_exit_sem);
					   $('#hrs_almo_sem').val(data[0].hrs_almo_sem);
					   $('#hrs_ent_sab').val(data[0].hrs_ent_sab);
					   $('#hrs_exit_sab').val(data[0].hrs_exit_sab);
					   $('#hrs_almo_sab').val(data[0].hrs_almo_sab);
					   $('#hrs_ent_dom').val(data[0].hrs_ent_dom);
					   $('#hrs_exit_dom').val(data[0].hrs_exit_dom);
					   $('#hrs_almo_dom').val(data[0].hrs_almo_dom);
					   $('#sab_ext_porc').val(data[0].sab_ext_porc);
					   $('#ext_pago').val(data[0].ext_pago);
					   $('#ext_porcento').val(data[0].ext_porcento);
					   $('#noite_ent').val(data[0].noite_ent);
					   $('#noite_exit').val(data[0].noite_exit);
					   $('#noite_almo').val(data[0].noite_almo);
					   $('#adc_noite_vl').val(data[0].adc_noite_vl);
					   $('#trab_noite').val(data[0].trab_noite);
					   $('#adc_noite_porc').val(data[0].adc_noite_porc);
					   $('#insalubre').val(data[0].insalubre);
					   $('#periculoso').val(data[0].periculoso);
					   $('#paradigma_nome').val(data[0].paradigma_nome);
					   $('#paradigma_valor').val(data[0].paradigma_valor);
					   $('#receb_VT').val(data[0].receb_VT);
					   $('#VT_valor').val(data[0].VT_valor);
					   $('#cesta_basica').val(data[0].cesta_basica);
					   $('#cesta_valor').val(data[0].cesta_valor);
					   $('#recebe_VR').val(data[0].recebe_VR);
					   $('#VR_valor').val(data[0].VR_valor);
					   $('#receb_holerith').val(data[0].receb_holerith);
					   $('#receb_aviso_previo').val(data[0].receb_aviso_previo);
					   $('#inic_aviso_previo').val(data[0].inic_aviso_previo);
					   $('#receb_dec').val(data[0].receb_dec);
					   $('#dec_data').val(data[0].dec_data);
					   $('#tev_ferias').val(data[0].tev_ferias);
					   $('#ferias_quant').val(data[0].ferias_quant);
					   $('#perio_ferias').val(data[0].perio_ferias);
					   $('#trab_ferias').val(data[0].trab_ferias);
					   $('#g_fgts').val(data[0].g_fgts);
					   $('#g_sd').val(data[0].g_sd);
					   $('#filho_14').val(data[0].filho_14);
					   $('#rec_sal_fam').val(data[0].rec_sal_fam);
					   $('#salario_fam').val(data[0].salario_fam);
					   $('#obs_adv').val(data[0].obs_adv);

	            }
	        });
    	}
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#busca').val();

       if(busca == ""){
					$('#titulo_livro').val('')
					$('#categoria').val('');
					$('#valor_compra').val('');
					$('#valor_venda').val('');
					$('#data_cadastro').val('');
					$('#rg_data_exp').val('');
					$('#nomecompleto').val('');
					$('#nacionalidade').val('');
					$('#naci_cliente').val('');
					$('#estadocivil').val('');
					$('#cargo').val('');
					$('#nasc_dia').val('');
					$('#nasc_mes').val('');
					$('#nasc_ano').val('');
					$('#rg_num').val('');
					$('#rg_origem').val('');
					$('#rg_data_exp').val('');
					$('#cliente_cpf_num').val('');
					$('#nome_mae').val('');
					$('#on_pai').val('');
					$('#nome_pai').val('');
					$('#pis_num').val('');
					$('#ctps_numero').val('');
					$('#ctps_serie').val('');
					$('#ctps_uf').val('');
					$('#end_rua').val('');
					$('#end_numero').val('');
					$('#end_bairro').val('');
					$('#end_cidade').val('');
					$('#cliente_cep').val('');
					$('#end_uf').val('');
					$('#end_complemento').val('');
					$('#nome_emp').val('');
					$('#pasta_id').val('');
					$('#sex_or').val('');
					$('#sex_singular').val('');
					$('#comarca_city').val('');
					$('#cli_cel').val('');
					$('#cli_tel').val('');
					$('#nome_emp').val('');
					$('#emp_tipo').val('');
					$('#cnpj_cpf').val('');
					$('#emp_rua').val('');
					$('#emp_num').val('');
					$('#emp_bairro').val('');
					$('#emp_city').val('');
					$('#emp_uf').val('');
					$('#emp_comp').val('');
					$('#emp_cep').val('');
					$('#emp_tel').val('');					
					$('#nome_cargo').val('');
					$('#data_ent').val('');
					$('#data_reg').val('');
					$('#data_saida').val('');
					$('#cump_aviso_previo').val('');
					$('#aviso_data').val('');
					$('#aviso_valor').val('');
					$('#data_homo').val('');
					$('#aviso_reducao').val('');
					$('#qm_homo').val('');
					$('#recebeu_homo').val('');
					$('#salario').val('');
					$('#valor_fora').val('');
					$('#remu_total').val('');
					$('#hrs_ent_sem').val('');
					$('#hrs_exit_sem').val('');
					$('#hrs_almo_sem').val('');
					$('#hrs_ent_sab').val('');
					$('#hrs_exit_sab').val('');
					$('#hrs_almo_sab').val('');
					$('#hrs_ent_dom').val('');
					$('#hrs_exit_dom').val('');
					$('#hrs_almo_dom').val('');
					$('#sab_ext_porc').val('');
					$('#extra_pg').val('');
					$('#extra_porc').val('');
					$('#noite_ent').val('');
					$('#noite_exit').val('');
					$('#noite_almo').val('');
					$('#adc_noite_vl').val('');
					$('#trab_noite').val('');
					$('#adc_noite_porc').val('');
					$('#insalubre').val('');
					$('#periculoso').val('');
					$('#paradigma_nome').val('');
					$('#paradigma_valor').val('');
					$('#receb_VT').val('');
					$('#VT_valor').val('');
					$('#cesta_basica').val('');
					$('#cesta_valor').val('');
					$('#recebe_VR').val('');
					$('#VR_valor').val('');
					$('#receb_holerith').val('');
					$('#receb_aviso_previo').val('');
					$('#inic_aviso_previo').val('');
					$('#receb_dec').val('');
					$('#dec_data').val('');
					$('#tev_ferias').val('');
					$('#ferias_quant').val('');
					$('#perio_ferias').val('');
					$('#trab_ferias').val('');
					$('#g_fgts').val('');
					$('#g_sd').val('');
					$('#filho_14').val('');
					$('#rec_sal_fam').val('');
					$('#salario_fam').val('');
					$('#obs_adv').val('');
       }
    }
});