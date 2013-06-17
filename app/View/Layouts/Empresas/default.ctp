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
	echo $this->Html->css('empresas');

	echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js');
	echo $this->Html->script('bootstrap.min');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');


	echo $this->element('empresas/js/common');//insere js para todas as paginas que usam este layout

	?>
</head>
<body>
	<?php echo $this->Session->flash(); ?>

	<div class="row-fluid">
		<div class="span2">
		</div>
		<div class="span10">
			<?php echo $this->element('Empresas/navbar'); ?>
		</div>
	</div>

	<div class="container-fluid" style="margin-top: 5px;">
		<div class="row-fluid">
			<div class="span2">
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
