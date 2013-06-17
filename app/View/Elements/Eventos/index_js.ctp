<script type="text/javascript">

$(function(){
	$('table tr').hover(function(){
		$(this).find('#btns-action').fadeIn('fast');
	},function(){
		$(this).find('#btns-action').fadeOut('fast');
	});
});

</script>