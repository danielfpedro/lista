<?php $this->Html->script('listas/chamada',array('inline' => false)); ?>
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
			echo $this->Html->link($lista['Evento']['nome'],array(
				'controller' => 'eventos', 'action' => 'view',$lista['Evento']['id']
			));
		?> 
		<span class="divider">/</span>
	</li>
	<li>
	<li class="active">Lista <?=$lista['Lista']['nome'];?></li>
</ul>

<div class="page-header">
	<h3>Lista <?=$lista['Lista']['nome']?></h3>
</div>


<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">Faltam entrar</a></li>
		<li><a href="#tab2" data-toggle="tab">Já entraram</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<table class="table table-bordered table-striped table-hover">
				<tbody>
					<?php if (!empty($lista['Usuario'])): ?>
						<?php foreach ($lista['Usuario'] as $usuario): ?>
							<tr>
								<td style="width: 30px;"><input type="checkbox" id="check"></td>
								<td>
									<?= $usuario['nome'] ?>
								</td>
							</tr>
						<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="2">Esta lista não possui nenhum cliente.</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
		<div class="tab-pane" id="tab2">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Clientes</th>
						<th style="width: 60px;"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td colspan="2">Nenhuma cliente entrou no evento.</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>