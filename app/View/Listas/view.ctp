<script type="text/javascript">
	var webroot = <?php echo $this->webroot; ?>;
	var total = <?php echo count($lista['Usuario']); ?>;
</script>
<?php echo $this->Html->script('listas/view',array('inline' => false)); ?>
<br>
<ul class="breadcrumb">
	<li>
		<?php
			echo $this->Html->link('Eventos',array(
				'controller' => 'eventos', 'action' => 'index'
			));
		?> 
		<span class="divider">/</span>
	</li>
	<li>
		<?php
			echo $this->Html->link($lista['Evento']['nome'], array(
				'controller' => 'eventos', 'action' => 'view',$lista['Evento']['id']
			));
		?> 
		<span class="divider">/</span>
	</li>
	<li>
	<li class="active">Lista <?=$lista['Lista']['nome'];?></li>
</ul>

<div class="page-header">
	<h3><?=$lista['Evento']['nome'];?> / <span style="text-decoration: underline;">Lista <?=$lista['Lista']['nome'];?></span> <small>(<?=$lista['ListasTipo']['tipo'];?>)</small></h3>
</div>

<table  id="table-nomes" class="table table-bordered table-striped table-hover">
	<caption><strong>Encerra <?=$this->Time->format('d/m à\s H:i:s',$lista['Lista']['dt_fim'])?></strong></caption>
	<tbody>
		<?php if (!empty($lista['Usuario'])): ?>
			<?php foreach ($lista['Usuario'] as $key => $usuario): ?>
				<tr>
					<td>
						<?php echo $this->Html->image('img_profile.jpg',array('width' => '60', 'class' => "img-circle",'style' => 'padding-right:5px;'));?>
						<strong><?=$usuario['nome'];?></strnog>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr id="linha-info">
				<td colspan="3">Esta lista não possui clientes.</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>