$(function(){
	$('div#checkbox').click(function(){
		var url = webroot + 'chamada/add';

		var pk = $(this).attr('pk');
		var lista_id = $(this).attr('lista-id');
		var usuario_id = $(this).attr('usuario-id');
		var entrou = $(this).attr('entrou');

		var hDocument = $(document).height();
		var load = $('<div>').addClass('overlay').css({height: hDocument});

		$(this).parents('td').append(load);
		$.post(url, {lista_id : lista_id, usuario_id : usuario_id, entrou: entrou, pk : pk}, function(retorno){
			if (retorno == 1) {
				location.reload();
			}else{
				alert(retorno);
			};
		});
	});
});