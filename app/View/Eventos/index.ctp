<br>
<ul class="breadcrumb">
	<li class="active">Eventos</li>
</ul>

<div class="page-header">
	<?php echo $this->Html->link('Novo evento',
			array('controller' => 'eventos', 'action' => 'add'),
			array('class' => 'btn btn-success pull-right')
		);
	?>
	<h3>Eventos</h3>
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
			<?php foreach ($eventos as $evento): ?>
				<tr>
					<td>
						<?php echo $this->Html->link($evento['Evento']['nome'],array(
							'controller' => 'eventos', 'action' => 'view',$evento['Evento']['id']
						)); ?>
						<div class="pull-right" id="btns-action" style="display: none;">
							<button class="btn btn-mini"><i class="icon-pencil"></i></button>
							<button class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i></button>
						</div>
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
									<?=$lista['nome'] . ' (100)'?>
								</span>								
							<?php endforeach ?>
							<div class="pull-right" id="btns-action" style="display: none;">
								<?php
									echo $this->Html->link('<i class=\'icon-plus\'></i>',
										array('controller' => 'listas', 'action' => 'add',$evento['Evento']['id']),
										array('escape' => false,'class' => 'btn btn-mini'));
								?>
							</div>
						<?php endif ?>
					</td>
					<td>
						<?php
							echo $this->Html->link('<i class=\'icon-eye-open\'></i>',
								array('controller' => 'eventos', 'action' => 'view',$evento['Evento']['id']),
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