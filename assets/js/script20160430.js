/* Script do Site */

$(document).ready(function(){













	/*




	//Examples of how to assign the Colorbox event to elements
	$(".colorbox").colorbox({width:"80%"});
	$(".ajax").colorbox();
	$(".youtube").colorbox({iframe:true, innerWidth:640, innerHeight:390});
	$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
	$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	$(".inline").colorbox({inline:true, width:"50%"});
	
	//var alturamax = 0;
	//$(".item-infos").each(function( index ) {
	//	if (alturamax < $(this).height()){ alturamax =  $(this).height(); }
	//})
	//$('.item-infos').height(alturamax);
	
	$('.btBeneficios button').on('click', function(){
		var sel = $(this).data('selection');
		$('#beneficios').isotope({ filter: sel });
		$('.btBeneficios button').removeClass('btn-primary').addClass('btn-default');;
		$(this).addClass('btn-primary').removeClass('btn-default');
	})
	
	$('.btVouchers button').on('click', function(){
		var sel = $(this).data('selection');
		$('#vouchers').isotope({ filter: sel });
		$('.btVouchers button').removeClass('btn-primary').addClass('btn-default');;
		$(this).addClass('btn-primary').removeClass('btn-default');
	})
	
	ReIsotope();
	
	$(window).resize(function(){
		setTimeout(function(){ReIsotope();},650);
	});  
	
	
	// SISTEMA DE MASCARA PARA CADASTRO
	$("#txcpf").mask("999.999.999-99");
	$("#txcep, #txemp_cep").mask("99999-999");
	$("#txuf, #emp_uf").mask("aa");	
	$('#txnascimento').mask("99/99/9999");
	$("#txtelefone, #txemp_telefone").mask("(99) 9999-9999");
	$("#txcelular").mask("(99) 99999-9999");
	$("#txemp_cnpj").mask("99.999.999/9999-99");
	
	// SISTEMA DE CADASTRAR NOVA EMPRESA
	$('#CadListEmpresas a').on('click', function(){
		$('#CadListEmpresas').slideUp(500, function(){
			$('#SisCadEmpresa').slideDown(500);
		});
		$('#datacadempresa').val(1);
		return false;
	})
	
	// SISTEMA DE PESQUISAR EMPRESA
	$('#SisCadEmpresa a').on('click', function(){
		$('#SisCadEmpresa').slideUp(500, function(){
			$('#CadListEmpresas').slideDown(500);
		});
		$('#datacadempresa').val(0);
		return false;
	})
	
	
	// chamada do botão de cadastro de novo associado
	$('#btnNovoCadastro').on('click', function(){
		
		var formADDCAD = $('form[name="formNovoCadastro"]');
		
		formADDCAD.ajaxSubmit({
			url: 'http://localhost/clubeempresa2/?page_id=33',
			dataType: 'json',
			
			beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Enviando seu cadastro para o Clube Empresa...'); },
			
			error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
			
			success: function (resp) {
				if (typeof resp.error != 'undefined'){
					mostraModal('fa-times', resp.error[0].mensagem);
					formADDCAD.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
				} else {
					mostraModal('fa-check', resp.sucesso[0].mensagem);
					setInterval(function () {
						window.location.href = "http://www.clubeempresagalleria.com.br/meu-painel";
					},10000);
						
				
				}
		
			}
		});

	});	
	
	// função que remove a classe de erro
	$('input').on('keypress', function(){
		$(this).parent().parent().removeClass('has-error');
	})
	
	
	// chamada do botão de login da página
	$('#btnLoginCE').on('click', function(){
		
		var formLOGIN = $('form[name="formLoginCE"]');
		
		formLOGIN.ajaxSubmit({
			url: 'http://localhost/clubeempresa2/?page_id=36',
			dataType: 'json',
			
			beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Enviando suas informações para login na Central Clube Empresa...'); },
			
			error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
			
			success: function (resp) {
				if (typeof resp.error != 'undefined'){
					mostraModal('fa-times', resp.error[0].mensagem);
					formLOGIN.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
				} else {
					mostraModal('fa-check', resp.sucesso[0].mensagem);
					setInterval(function () {
						window.location.href = "http://www.clubeempresagalleria.com.br/meu-painel";
					},3000);
						
				
				}
		
			}
		});

	});	
	
	
	
	// chamada do botão de lembrete de senha da página
	$('#btnLembreteCE').on('click', function(){
		
		var formLEMBRETE = $('form[name="formLembreteCE"]');
		
		formLEMBRETE.ajaxSubmit({
			url: 'http://localhost/clubeempresa2/?page_id=40',
			dataType: 'json',
			
			beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Enviando suas informações para a Central Clube Empresa...'); },
			
			error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
			
			success: function (resp) {
				if (typeof resp.error != 'undefined'){
					mostraModal('fa-times', resp.error[0].mensagem);
					formLOGIN.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
				} else {
					mostraModal('fa-check', resp.sucesso[0].mensagem);
				}
		
			}
		});

	});	

	
	
	// chamada do botão de alteração de dados pessoais
	$('#btnAlteraCadastro').on('click', function(){
		
		var formALTERA = $('form[name="formAlteraCadastro"]');
		
		formALTERA.ajaxSubmit({
			url: 'http://localhost/clubeempresa2/?page_id=47',
			dataType: 'json',
			
			beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Enviando suas informações para a Central Clube Empresa...'); },
			
			error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
			
			success: function (resp) {
				if (typeof resp.error != 'undefined'){
					mostraModal('fa-times', resp.error[0].mensagem);
					formLOGIN.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
				} else {
					mostraModal('fa-check', resp.sucesso[0].mensagem);
				}
		
			}
		});

	});	
	
	
	
	// chamada do botão de alteração de senha pessoal
	$('#btnAlteraSenha').on('click', function(){
		
		var formALTERAS = $('form[name="formAlteraSenha"]');
		
		formALTERAS.ajaxSubmit({
			url: 'http://localhost/clubeempresa2/?page_id=49',
			dataType: 'json',
			
			beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Enviando suas informações para a Central Clube Empresa...'); },
			
			error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
			
			success: function (resp) {
				if (typeof resp.error != 'undefined'){
					mostraModal('fa-times', resp.error[0].mensagem);
					formLOGIN.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
				} else {
					mostraModal('fa-check', resp.sucesso[0].mensagem);
				}
		
			}
		});

	});	
	
	
	
	// chamada do botão de emissão de voucher
	$('.btnEmitirVoucher').on('click',function(){
		
		var $tit = $(this).data('titulo');
		var $sma = $(this).data('sma');
		var $campID = $(this).data('campanha');
		var $promoID = $(this).data('promocao');
		
		mostraModal('fa-question-circle', 'Deseja emitir o voucher <b>'+$tit+'</b>?</h1><br/>'+
			'<p>'+$sma+'<br/><small><span><i class="fa fa-check-square-o"></i></span> Ao clicar em "EMITIR MEU VOUCHER", você estará concordando com todas as regras da promoção presentes no regulamento do voucher.</small></p><br/><br/>'+
			'<button class="btn btn-primary btnEmiteConf" data-campid="'+$campID+'" data-promoid="'+$promoID+'">EMITIR MEU VOUCHER</button>  '+
			'<button class="btn btn-default btnCancelaEmit">CANCELAR</button><h1>');
		
		// chamada de cancelamento do voucher
		$('.btnCancelaEmit').on('click', function(){
			fechaModal();
		});
		
		// chamada para emissão do voucher
		$('.btnEmiteConf').on('click', function(){
			
			var NovoVoucher = $('form[name="formNovoVoucher"]');
			var $campID = $(this).data('campid');
			var $promoID = $(this).data('promoid');
		
			NovoVoucher.ajaxSubmit({
				url: 'http://localhost/clubeempresa2/?page_id=63',
				data: { campid: $campID, promoid: $promoID },
				dataType: 'json',
				
				beforeSerialize: function (){ mostraModal('fa-spinner fa-spin', 'Solicitando voucher junto ao Clube Empresa Galleria Shopping...'); },
				
				error: function(){ mostraModal('fa-times', 'Um erro ocorreu durante o processo! Verifique sua conexão com a internet.'); }, 
				
				success: function (resp) {
					if (typeof resp.error != 'undefined'){
						mostraModal('fa-times', resp.error[0].mensagem);
						formLOGIN.find('input[name="'+resp.error[0].item+'"]').parent().parent().addClass('has-error');
					} else {
						mostraModal('fa-check', resp.sucesso[0].mensagem);
					}
			
				}
			});
			
		});
	})
	
	
	
	
	*/
	
	
});

function ReIsotope(){
	$posts = $('#beneficios');

	$posts.isotope({
		itemSelector : '.item',
	});
	
}