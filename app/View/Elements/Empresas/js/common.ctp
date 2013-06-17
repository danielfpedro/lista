<script type="text/javascript">

$(function(){
	$('.tt').tooltip();
	
	$('table#has-action-btns tr').hover(function(){
		$(this).find('div#btns-action').fadeIn('fast').find('#oi').fadeIn('fast');
	},function(){
		$(this).find('div#btns-action').fadeOut('fast');
	});
});

</script>