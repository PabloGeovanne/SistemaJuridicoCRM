$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#busca').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#busca" ).autocomplete({
	    minLength: 14,
	    source: function( request, response ) {
	        $.ajax({
	            url: "consulta.php",
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
	            url: "consulta.php",
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
					   $('#sexo01').val(data[0].sex_singular);
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
					   $('#data_ent').val(data[0].data_ent_complet);
						//data entrada separado por dia,mês,ano
					   $('#data_ent_d').val(data[0].data_ent_d);
					   $('#data_ent_m').val(data[0].data_ent_m);
					   $('#data_ent_y').val(data[0].data_ent_y);
					
					   $('#data_reg').val(data[0].data_reg);
					   $('#data_saida').val(data[0].data_saida_complet);
						//data saida separado por dia,mês,ano
					   $('#data_saida_d').val(data[0].data_saida_d);
					   $('#data_saida_m').val(data[0].data_saida_m);
					   $('#data_saida_y').val(data[0].data_saida_y);
					
					   $('#cump_aviso_previo').val(data[0].cump_aviso_previo);
					   $('#aviso_data').val(data[0].aviso_data);
					   $('#aviso_valor').val(data[0].aviso_valor);
					   $('#data_homo').val(data[0].data_homo);
					   $('#aviso_reducao').val(data[0].aviso_reducao);
					   $('#qm_homo').val(data[0].qm_homo);
					   $('#recebeu_homo').val(data[0].recebeu_homo);
					   $('#homo_valor').val(data[0].homo_valor);
					   $('#data_quita').val(data[0].data_quita);
					   $('.salario').val(data[0].salario);
					   $('#valor_fora').val(data[0].valor_fora);
					   $('.remu_total').val(data[0].remu_total);
					//horas e min entrada
						//segunda
					   $('#1hrs_ent').val(data[0].hrs_ent_sem);
					   $('#1min_ent').val(data[0].hrs_ent_sem2);
						//terça
					   $('#2hrs_ent').val(data[0].hrs_ent_sem);
					   $('#2min_ent').val(data[0].hrs_ent_sem2);
						//quarta
					   $('#3hrs_ent').val(data[0].hrs_ent_sem);
					   $('#3min_ent').val(data[0].hrs_ent_sem2);
						//quinta
					   $('#4hrs_ent').val(data[0].hrs_ent_sem);
					   $('#4min_ent').val(data[0].hrs_ent_sem2);
					
					   $('#5hrs_ent').val(data[0].hrs_ent_sex);
					   $('#5min_ent').val(data[0].hrs_ent_sex2);
					
					
					//horas e minuto saida
						//segunda
					   $('#1hrs_saida2').val(data[0].hrs_exit_sem);
					   $('#1min_saida2').val(data[0].hrs_exit_sem2);
						//terça
					   $('#2hrs_saida2').val(data[0].hrs_exit_sem);
					   $('#2min_saida2').val(data[0].hrs_exit_sem2);
						//quarta
					   $('#3hrs_saida2').val(data[0].hrs_exit_sem);
					   $('#3min_saida2').val(data[0].hrs_exit_sem2);
						//quinta
					   $('#4hrs_saida2').val(data[0].hrs_exit_sem);
					   $('#4min_saida2').val(data[0].hrs_exit_sem2);
					
					   $('#5hrs_saida2').val(data[0].hrs_exit_sex);					   $('#5min_saida2').val(data[0].hrs_exit_sex2);

					
					
					   $('#hrs_almo_sem').val(data[0].hrs_almo_sem);
					   $('#hrs_almo_sex').val(data[0].hrs_almo_sex);
										
					
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
					   $('#recebeu_adc_noite').val(data[0].recebeu_adc_noite);
					   $('#adc_noite_vl').val(data[0].adc_noite_vl);
					   $('#trab_noite').val(data[0].trab_noite);
					   $('#adc_noite_porc').val(data[0].adc_noite_porc);
					   $('#insalubre').val(data[0].insalubre);
					   $('#periculoso').val(data[0].periculoso);
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
					   $('#dec_data2').val(data[0].dec_data2);
					   $('#dec_data3').val(data[0].dec_data3);
					   $('#dec_data4').val(data[0].dec_data4);
					   $('#dec_data5').val(data[0].dec_data5);
					   $('#tev_ferias').val(data[0].tev_ferias);
					   $('#ferias_quant').val(data[0].ferias_quant);
					   $('#perio_ferias').val(data[0].perio_ferias);
					   $('#trab_ferias').val(data[0].trab_ferias);
					   $('#plr_valor').val(data[0].plr_valor);
					   $('#g_fgts').val(data[0].g_fgts);
					   $('#g_sd').val(data[0].g_sd);
					   $('#filho_14').val(data[0].filho_14);
					   $('#rec_sal_fam').val(data[0].rec_sal_fam);
					   $('#salario_fam').val(data[0].salario_fam);
					   $('#obs_adv').val(data[0].obs_adv);
					   $('#obs_dano').val(data[0].obs_dano);
					   $('#p_nome_1').val(data[0].p_nome_1);
					   $('#p_nome_2').val(data[0].p_nome_2);
					   $('#p_nome_3').val(data[0].p_nome_3);
					   $('#p_nome_4').val(data[0].p_nome_4);
					   $('#p_nome_5').val(data[0].p_nome_5);
					   $('.p_salario_1').val(data[0].p_salario_1);
					   $('.p_salario_2').val(data[0].p_salario_2);
					   $('.p_salario_3').val(data[0].p_salario_3);
					   $('.p_salario_4').val(data[0].p_salario_4);
					   $('.p_salario_5').val(data[0].p_salario_5);
					   $('#p_cargo_1').val(data[0].p_cargo_1);
					   $('#p_cargo_2').val(data[0].p_cargo_2);
					   $('#p_cargo_3').val(data[0].p_cargo_3);
					   $('#p_cargo_4').val(data[0].p_cargo_4);
					   $('#p_cargo_5').val(data[0].p_cargo_5);
					   $('#p_inicio_1').val(data[0].p_inicio_1);
					   $('#p_inicio_2').val(data[0].p_inicio_2);
					   $('#p_inicio_3').val(data[0].p_inicio_3);
					   $('#p_inicio_4').val(data[0].p_inicio_4);
					   $('#p_inicio_5').val(data[0].p_inicio_5);
					   $('#p_tempo_1').val(data[0].p_tempo_1);
					   $('#p_tempo_2').val(data[0].p_tempo_2);
					   $('#p_tempo_3').val(data[0].p_tempo_3);
					   $('#p_tempo_4').val(data[0].p_tempo_4);
					   $('#p_tempo_5').val(data[0].p_tempo_5);
					   
					   $('#desvio_cargo_1').val(data[0].desvio_cargo_1);
					   $('.desvio_salario_1').val(data[0].desvio_salario_1);
					   $('#desvio_datainicio_1').val(data[0].desvio_datainicio_1);
					   $('#desvio_datafim_1').val(data[0].desvio_datafim_1);

					   $('#desvio_cargo_2').val(data[0].desvio_cargo_2);
					   $('.desvio_salario_2').val(data[0].desvio_salario_2);
					   $('#desvio_datainicio_2').val(data[0].desvio_datainicio_2);
					   $('#desvio_datafim_2').val(data[0].desvio_datafim_2);

					   $('#desvio_cargo_3').val(data[0].desvio_cargo_3);
					   $('.desvio_salario_3').val(data[0].desvio_salario_3);
					   $('#desvio_datainicio_3').val(data[0].desvio_datainicio_3);
					   $('#desvio_datafim_3').val(data[0].desvio_datafim_3);

					   $('#desvio_cargo_4').val(data[0].desvio_cargo_4);
					   $('.desvio_salario_4').val(data[0].desvio_salario_4);
					   $('#desvio_datainicio_4').val(data[0].desvio_datainicio_4);
					   $('#desvio_datafim_4').val(data[0].desvio_datafim_4);

					   $('#desvio_cargo_5').val(data[0].desvio_cargo_5);
					   $('.desvio_salario_5').val(data[0].desvio_salario_5);
					   $('#desvio_datainicio_5').val(data[0].desvio_datainicio_5);
					   $('#desvio_datafim_5').val(data[0].desvio_datafim_5);


						$('#emp_segunta').val(data[0].emp_segunta);
						$('#tipo_emp_segunda').val(data[0].tipo_emp_segunda);
						$('#cnpj_segunda').val(data[0].cnpj_segunda);
						$('#cep_segunda').val(data[0].cep_segunda);
						$('#rua_emp_segunda').val(data[0].rua_emp_segunda);
						$('#num_emp_segunda').val(data[0].num_emp_segunda);
						$('#bairro_emp_segunda').val(data[0].bairro_emp_segunda);
						$('#city_emp_segunda').val(data[0].city_emp_segunda);
						$('#uf_emp_segunda').val(data[0].uf_emp_segunda);
						$('#comp_emp_segunda').val(data[0].comp_emp_segunda);

						$('#emp_terceira').val(data[0].emp_terceira);
						$('#tipo_emp_terceira').val(data[0].tipo_emp_terceira);
						$('#cnpj_terceira').val(data[0].cnpj_terceira);
						$('#cep_terceira').val(data[0].cep_terceira);
						$('#rua_emp_terceira').val(data[0].rua_emp_terceira);
						$('#num_emp_terceira').val(data[0].num_emp_terceira);
						$('#bairro_emp_terceira').val(data[0].bairro_emp_terceira);
						$('#city_emp_terceira').val(data[0].city_emp_terceira);
						$('#uf_emp_terceira').val(data[0].uf_emp_terceira);
						$('#comp_emp_terceira').val(data[0].comp_emp_terceira);

						$('#emp_quarta').val(data[0].emp_quarta);
						$('#tipo_emp_quarta').val(data[0].tipo_emp_quarta);
						$('#cnpj_quarta').val(data[0].cnpj_quarta);
						$('#cep_quarta').val(data[0].cep_quarta);
						$('#rua_emp_quarta').val(data[0].rua_emp_quarta);
						$('#num_emp_quarta').val(data[0].num_emp_quarta);
						$('#bairro_emp_quarta').val(data[0].bairro_emp_quarta);
						$('#city_emp_quarta').val(data[0].city_emp_quarta);
						$('#uf_emp_quarta').val(data[0].uf_emp_quarta);
						$('#comp_emp_quarta').val(data[0].comp_emp_quarta);

						$('#escala_trab').val(data[0].escala_trab);
						$('#dom_ext_porc').val(data[0].dom_ext_porc);
						$('#hrs_ext_media').val(data[0].hrs_ext_media);
						$('#hrs_ext_apos').val(data[0].hrs_ext_apos);
						$('#hrs_ext_antes').val(data[0].hrs_ext_antes);
					
						$('#dia_inp02').val(data[0].data_saida_d);
				}
	        });
    	}
    }

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#busca').val();

       if(busca == ""){
					$('#titulo_livro').val('');
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
		   
					$('#data_ent_d').val('');
					$('#data_ent_m').val('');
					$('#data_ent_y').val('');
		   
					$('#data_reg').val('');
					$('#data_saida').val('');

					$('#data_saida_d').val('');
					$('#data_saida_m').val('');
					$('#data_saida_y').val('');
		   
					$('#cump_aviso_previo').val('');
					$('#aviso_data').val('');
					$('#aviso_valor').val('');
					$('#data_homo').val('');
					$('#aviso_reducao').val('');
					$('#qm_homo').val('');
					$('#recebeu_homo').val('');
					$('#homo_valor').val('');
					$('#data_quita').val('');
					$('.salario').val('');
					$('#valor_fora').val('');
					$('.remu_total').val('');
					$('#hrs_ent_sem').val('');
					$('#hrs_exit_sem').val('');
					$('#hrs_almo_sem').val('');
					$('#hrs_ent_sex').val('');
					$('#hrs_exit_sex').val('');
					$('#hrs_almo_sex').val('');
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
					$('#recebeu_adc_noite').val('');
					$('#adc_noite_vl').val('');
					$('#trab_noite').val('');
					$('#adc_noite_porc').val('');
					$('#insalubre').val('');
					$('#periculoso').val('');
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
					$('#dec_data2').val('');
					$('#dec_data3').val('');
					$('#dec_data4').val('');
					$('#dec_data5').val('');
					$('#tev_ferias').val('');
					$('#ferias_quant').val('');
					$('#perio_ferias').val('');
					$('#trab_ferias').val('');
					$('#plr_valor').val('');
					$('#g_fgts').val('');
					$('#g_sd').val('');
					$('#filho_14').val('');
					$('#rec_sal_fam').val('');
					$('#salario_fam').val('');
					$('#obs_adv').val('');
					$('#obs_dano').val('');
		   
					$('#p_nome_1').val('');
					$('#p_nome_2').val('');
					$('#p_nome_3').val('');
					$('#p_nome_4').val('');
					$('#p_nome_5').val('');
					
					$('.p_salario_1').val('');
					$('.p_salario_2').val('');
					$('.p_salario_3').val('');
					$('.p_salario_4').val('');
					$('.p_salario_5').val('');
					
					$('#p_cargo_1').val('');
					$('#p_cargo_2').val('');
					$('#p_cargo_3').val('');
					$('#p_cargo_4').val('');
					$('#p_cargo_5').val('');
					
					$('#p_inicio_1').val('');
					$('#p_inicio_2').val('');
					$('#p_inicio_3').val('');
					$('#p_inicio_4').val('');
					$('#p_inicio_5').val('');

					$('#p_tempo_1').val('');
					$('#p_tempo_2').val('');
					$('#p_tempo_3').val('');
					$('#p_tempo_4').val('');
					$('#p_tempo_5').val('');
					
					
					$('#emp_segunta').val('');
					$('#tipo_emp_segunda').val('');
					$('#cnpj_segunda').val('');
					$('#cep_segunda').val('');
					$('#rua_emp_segunda').val('');
					$('#num_emp_segunda').val('');
					$('#bairro_emp_segunda').val('');
					$('#city_emp_segunda').val('');
					$('#uf_emp_segunda').val('');
					$('#comp_emp_segunda').val('');

					$('#emp_terceira').val('');
					$('#tipo_emp_terceira').val('');
					$('#cnpj_terceira').val('');
					$('#cep_terceira').val('');
					$('#rua_emp_terceira').val('');
					$('#num_emp_terceira').val('');
					$('#num_terceira').val('');
					$('#bairro_emp_terceira').val('');
					$('#city_emp_terceira').val('');
					$('#uf_emp_terceira').val('');
					$('#comp_emp_terceira').val('');

					$('#emp_quarta').val('');
					$('#tipo_emp_quarta').val('');
					$('#cnpj_quarta').val('');
					$('#cep_quarta').val('');
					$('#rua_emp_quarta').val('');
					$('#num_emp_quarta').val('');
					$('#bairro_emp_quarta').val('');
					$('#city_emp_quarta').val('');
					$('#uf_emp_quarta').val('');
					$('#comp_emp_quarta').val('');
		   
					$('#escala_trab').val('');
					$('#dom_ext_porc').val('');
					$('#hrs_ext_media').val('');
					$('#hrs_ext_apos').val('');
					$('#hrs_ext_antes').val('');
		   
		   //inputs novas
		   			$('#ext_pago').val('');
		   			$('#ext_porcento').val('');
		   
		   			$('#desvio_cargo_1').val('');
		   			$('#desvio_cargo_2').val('');
		   			$('#desvio_cargo_3').val('');
		   			$('#desvio_cargo_4').val('');
		   			$('#desvio_cargo_4').val('');
		   
		   			$('.desvio_salario_1').val('');
		   			$('.desvio_salario_2').val('');
		   			$('.desvio_salario_3').val('');
		   			$('.desvio_salario_4').val('');
		   			$('.desvio_salario_5').val('');
		   
		   			$('#desvio_datainicio_1').val('');
		   			$('#desvio_datainicio_2').val('');
		   			$('#desvio_datainicio_3').val('');
		   			$('#desvio_datainicio_4').val('');
		   			$('#desvio_datainicio_5').val('');
		   
		   			$('#desvio_datafim_1').val('');
		   			$('#desvio_datafim_2').val('');
		   			$('#desvio_datafim_3').val('');
		   			$('#desvio_datafim_4').val('');
		   			$('#desvio_datafim_5').val('');
		   			$('#obj_periculoso').val('');
		   			$('#obj_insalubre').val('');
		   			$('#reaj_clausula').val('');
		   			$('#reaj_salbs2').val('');
		   			$('#reaj_%').val('');
		   			$('#vigen_clausula').val('');
		   			$('#vigen_fim_clausula').val('');
		   			/*$('#').val('');
		   			$('#').val('');
		   			$('#').val('');
		   			$('#').val('');*/
      }
    }
});