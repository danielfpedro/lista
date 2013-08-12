$(function(){
	$('.tt').tooltip();
	$('.ttl').tooltip({'placement': 'left'});
	$('.ttb').tooltip({'placement': 'bottom'});
	$('.ttr').tooltip({'placement': 'right'});
	
	$('table#has-action-btns tr').hover(function(){
		$(this).find('div#btns-action').fadeIn('fast').find('#oi').fadeIn('fast');
	},function(){
		$(this).find('div#btns-action').fadeOut('fast');
	});
});