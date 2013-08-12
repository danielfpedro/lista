$(function(){

	$('button#btn-remove').click(function(){
		var btn = $(this);
		$(btn).attr('disabled',true);
		var td = btn.parent();
		var id = $(this).attr('pk');
		var url = webroot + 'listasusuarios/delete';

		var load = "<img src='"+webroot+"img/load-mini.gif' class='pull-right' style='margin: 25px 15px 0 0;'>";

		$(td).append(load);

		$.post(url,{id:id},function(retorno){
			if (retorno == 1) {
				$(btn).parents('tr').remove();
				total--;
				if(total == 0){
					$('#table-nomes').append('<tr><td>Esta lista não possui clientes.</td></tr>');
				}
			}else{
				alert('Ocorreu um erro');
			};
			$(btn).attr('disabled',false);			
		});

	});
});