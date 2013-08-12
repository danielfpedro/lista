$(function(){
	//Total de nomes
	var total = $('#novo-nome').attr('total');
	var root = $('#novo-nome').attr('root');
	$('#novo-nome:enabled').keypress(function(e){
		if(e.which == 13 && $(this).val() != "" && $(this).is(':disabled') == false) {

			var nome = $(this).val();
			$(this).val('Adicionando nome, aguarde...').attr('disabled', true);
			var lista_id = $(this).attr('lista-id');
			var url = root + 'listasusuariosprivados/add';

			$.post(url,{lista_id:lista_id, nome:nome},function(retorno){
				//O retorno eh o id do nome, para colocar no id-nome do botao remover
				if (retorno > 0) {
					var btnRemove = '<button id=\'btn-remove\' nome-id='+retorno+' class=\'btn btn-danger btn-mini pull-right\'><i class=\'icon-remove icon-white\'></i></button>';
					$('#linha-info').remove();
					$('#table-nomes').append('<tr><td><strong>'+nome+'</strong>'+btnRemove+'</td></tr>');
					$('#novo-nome').val('').focus();
					total++;
				}else{
					alert('Ocorreu um erro');
				}
				$('#novo-nome').attr('disabled', false);
			});

		}
	});

	$('#table-nomes').on('click','button#btn-remove',function(){

		var btn = $(this);

		$(btn).attr('disabled',true);

		var td = btn.parent();
		var id = $(this).attr('nome-id');
		var url = $('#novo-nome').attr('root') + 'listasusuariosprivados/delete/'+id;

		var load = "<img src='"+root+"img/load-mini.gif' class='pull-right' style='margin: 5px 15px 0 0;'>";

		$(td).append(load);

		$.post(url,null,function(retorno){
			if (retorno == 1) {
				$(btn).parents('tr').remove();
				total--;
				if(total == 0){
					$('#table-nomes').append('<tr id=\'linha-info\'><td>Esta lista não possui clientes.</td></tr>');
				}
			}else{
				alert('Ocorreu um erro');
			};
			$(btn).attr('disabled',false);			
		});
	});

});