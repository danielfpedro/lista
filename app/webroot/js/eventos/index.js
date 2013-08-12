var atual = "";
$(function(){
	$('a#link-lista').click(function(){
		var num = $(this).attr('rel');
		var nome = $(this).text();
		$('td#lista-desc'+num).html(nome).slideDown();
		atual = 'td#lista-desc'+num;
		return false;
	});
});