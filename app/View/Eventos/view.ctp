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
	<li class="active"><?=$evento['Evento']['nome'];?></li>
</ul>

<div class="page-header">
	<h3>Listas <?=$evento['Evento']['nome'];?></h3>
</div>

<table  id="has-action-btns" class="table table-bordered table-striped table-hover">
	<tbody>
		<?php if (!empty($evento['Lista'])): ?>
			<?php foreach ($evento['Lista'] as $key => $lista): ?>
				<tr>
					<td style="width:65px;">
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
							<?=$lista['ListasTipo']['tipo'];?>
						</span>
					</td>
					<td style="width:25px;">
						<span class="badge badge-info">0</span>
					</td>
					<td style="width:200px;">
						<strong><?=$lista['nome']?></strong>
					</td>
					<td>
						<?=$lista['descricao'];?>
					</td>
					<td style="width: 280px;">
						Encerra <?=$this->Time->format('d/m à\s H:i:s',$lista['dtLimite'])?>
						<div class="pull-right" id="btns-action" style="display: none;">
							<button class="btn btn-mini tt" title="Editar lista" ><i class="icon-pencil"></i></button>
							<button class="btn btn-mini"><i class="icon-pause"></i></button>
							<button class="btn btn-mini"><i class="icon-stop"></i></button>
						</div>
					</td>
					<td style="width: 60px;">
						<?=$this->Html->link('<i class=\'icon-ok\'></i>',array(
							'controller' => 'listas', 'action' => 'chamada',$lista['id']),
							array('escape' => false,'class' => 'btn btn-mini tt', 'title' => 'Chamada')
							)?>
						<?=$this->Html->link('<i class=\'icon-print\'></i>',array(
							'controller' => 'listas', 'action' => 'chamada',$lista['id']),
							array('escape' => false,'class' => 'btn btn-mini tt', 'title' => 'Imprimir lista')
							)
						?>
					</td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr>
				<td colspan="3">Este evento não possui nenhuma lista.</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>