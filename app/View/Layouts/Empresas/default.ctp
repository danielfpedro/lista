<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('bootstrap.min');
	echo $this->Html->css('bootstrap-responsive.min');
	echo $this->Html->css('empresas');

	echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
	echo $this->Html->script('bootstrap.min');

	echo $this->Html->script('empresas/common');//insere js para todas as paginas que usam este layout

	echo $this->fetch('meta');
	echo $this->fetch('css');

	?>
	<script type="text/javascript">
		var webroot = <?php echo $this->webroot; ?>;
	</script>

	<?php echo $this->fetch('script'); ?>
</head>
<body>
	<?php echo $this->Session->flash(); ?>

	<div class="row-fluid">
		<div class="span12">
			<?php echo $this->element('Empresas/navbar'); ?>
		</div>
	</div>
<br>
	<div class="container-fluid" style="margin-top: 5px;">
		<div class="row-fluid">
			<div class="span2 visible-desktop">
				<?php echo $this->element('Empresas/sidebar'); ?>
			</div>
			<div class="span10">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<div class="row-fluid">
			<?php echo $this->element('sql_dump'); ?>
		</div>
	</div>
</body>
</html>
