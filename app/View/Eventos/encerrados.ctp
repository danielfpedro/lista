<?php echo $this->Html->script(array('eventos/index'),array('inline' => false)); ?>
<br>
<ul class="breadcrumb">
	<li class="active">Eventos</li>
</ul>

<div class="page-header">
	<h3>Eventos encerrados</h3>
</div>

<table id="has-action-btns" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th class="span6">
				Listas: 
				<span class="label label-success">Públicas</span>&nbsp;
				<span class="label label-info">Moderadas</span>&nbsp;
				<span class="label label-important">Privadas</span>
			</th>
			<th style="width: 20px;"></th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($eventos)): ?>
			<?php $i = 0; ?>
			<?php foreach ($eventos as $evento): ?>
				<tr id="linha-listas">
					<td>
						<?php echo $this->Html->link($evento['Evento']['nome'],array(
							'controller' => 'eventos', 'action' => 'view_encerrados',$evento['Evento']['id']
						)); ?>
					</td>
					<td>
						<?php if (empty($evento['Lista'])): ?>
							Este evento ainda não possui listas
						<?php else: ?>
							<?php foreach ($evento['Lista'] as $lista): ?>
								<?php
									switch ($lista['listas_tipo_id']) {
										case 1:
											$label = 'success';
										break;
										case 2:
											$label = 'important';
										break;
										case 3:
											$label = 'info';
										break;
									}
								?>
								<span class="label label-<?=$label?> label-lista">
									<?php
										echo $this->Html->Link($lista['nome'] . ' (100)',
											array('controller' => 'listas', 'action' => 'view',$lista['id']),
											array('id' => 'link-lista','rel' => $i)
											);
									?>
								</span>								
							<?php endforeach ?>
						<?php endif ?>
					</td>
					<td>
						<?php
							echo $this->Html->link('<i class=\'icon-eye-open\'></i>',
								array('controller' => 'eventos', 'action' => 'encerrados_view',$evento['Evento']['id']),
								array('escape' => false,'class' => 'btn btn-mini'));
						?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
				<tr>
					<td colspan="6">Nenhum evento encontrado.</td>
				</tr>
		<?php endif ?>
	</tbody>
</table>