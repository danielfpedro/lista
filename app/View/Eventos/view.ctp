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
	<!-- <thead>
		<tr>
			<th>Tipo</th>
			<th>Período</th>
			<th>Lista (nomes/limite)</th>
			<th>Descrição</th>
			<th>&nbsp;</th>
		</tr>		
	</thead> -->
	<tbody>
		<?php if (!empty($evento['Lista'])): ?>
			<?php foreach ($evento['Lista'] as $key => $lista): ?>
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
					// Tratamente de variaveis para tipos diferentes de listas
					$total = count($lista['Usuario']+$lista['usuarios_privados']);
					if ($lista['listas_tipo_id'] != 2){
						$total_limite = '(' .$total. ' / ' .$lista['limite']. ')';
						
						$data = '<span class=\'label label-info\'>';
							$data .= '<i class=\'icon-calendar icon-white\'></i> ';
							$data .= $this->Time->format('d/m/y',$lista['dt_inicio']);
							$data .= ' <i class=\'icon-time icon-white\'></i> ';
							$data .= $this->Time->format('H:m',$lista['dt_inicio']);
						$data .= '</span>';
						$data .= '<br>';
						$data .= '<span class=\'label label-info\'>';
							$data .= '<i class=\'icon-calendar icon-white\'></i> ';
							$data .= $this->Time->format('d/m/y',$lista['dt_fim']);
							$data .= ' <i class=\'icon-time icon-white\'></i> ';
							$data .= $this->Time->format('H:i',$lista['dt_fim']);
						$data .= '</span>';
					}else{
						$data = '-';
						$total_limite = '';
					}
				?>
				<tr style="min-height: 60px;">
					<td style="width:65px;">
						<span class="label label-<?=$label?> label-lista">
							<?=$lista['ListasTipo']['tipo'];?> <?php echo $total_limite;?>
						</span>
					</td>
					<td style="width:90px;">
						<?php echo $data; ?>
					</td>
					<td style="width:200px;">
						<strong><?=$lista['nome']?></strong>
					</td>
					<td>
						<div style="float: left;width: 85%;">
							<?=$lista['descricao'];?>
						</div>
						<div class="pull-right" id="btns-action" style="width: 15%;display: none;text-align: right;">
							<button class="btn btn-mini tt" title="Editar lista" ><i class="icon-pencil"></i></button>
							<!-- Somente listas publicas podem ser pausadas -->
							<?php if ($lista['listas_tipo_id'] == 1): ?>
								<button class="btn btn-mini tt" title="Pausar lista"><i class="icon-pause"></i></button>
							<?php endif ?>
							<!-- Só tem o botão de inserir pessoa se for privado -->
							<?php if ($lista['listas_tipo_id'] == 2): ?>
								<?=$this->Html->link('<i class=\'icon-plus\'></i>',array(
									'controller' => 'listas', 'action' => 'add_nome',$lista['id']),
									array('escape' => false,'class' => 'btn btn-mini tt', 'title' => 'Inserir pessoas')
								)?>
							<?php endif ?>
						</div>
					</td>
					<td style="width: 25px;">
						<?php
							//Se for privada chama para um view diferente
							$tipo = strtolower($lista['ListasTipo']['tipo']);
						?>
						<?=$this->Html->link('<i class=\'icon-ok\'></i>',array(
							'controller' => 'listas', 'action' => 'chamada',$lista['id']),
							array('escape' => false,'class' => 'btn btn-mini tt', 'title' => 'Chamada')
						)?>
					</td>
				</tr>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="3">Este evento não possui nenhuma lista.</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>