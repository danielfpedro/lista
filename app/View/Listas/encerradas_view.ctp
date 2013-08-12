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
	<li class="active">Chamada Lista <?=$lista['Lista']['nome'];?></li>
</ul>

<div class="page-header">
	<h3><?=$lista['Evento']['nome']?> / <span style="text-decoration: underline;">Chamada Lista <?=$lista['Lista']['nome']?> </span><small>(<?=$lista['ListasTipo']['tipo']?>)</small></h3>
</div>


<?php
	//Se for privado ele busca usuarios manuais, caso contrario usuarios cadastrados pelo site
	$tipo = ($lista['ListasTipo']['id'] == 2) ? 'usuarios_privados' : 'Usuario' ;

	$total = count($lista[$tipo]);
	$total_entrou = 0;
	$total_nao_entrou = 0;

	foreach ($lista[$tipo] as $valor) {
		if ($tipo == 'Usuario'){
			$entrou = $valor['ListasUsuario']['entrou'];
		}else{
			$entrou = $valor['entrou'];
		}

		if ($entrou == 0) {
			$total_nao_entrou++;
		}else{
			$total_entrou++;
		}
	}

?>

<div class="tabbable"> <!-- Only required for left/right tabs -->
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab">Entraram (<?=$total_nao_entrou;?> / <?=$total;?>)</a></li>
		<li><a href="#tab2" data-toggle="tab">Não entraram (<?=$total_entrou;?> / <?=$total;?>)</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<table id="nao-entraram" class="table table-bordered table-striped table-hover">
				<tbody>
					<!--Lista usuarios cadastrados-->
					<?php if (!empty($lista[$tipo])): ?>
						<?php foreach ($lista[$tipo] as $usuario): ?>
							<?php
								if ($tipo == 'Usuario'){
									$entrou = $usuario['ListasUsuario']['entrou'];
								}else{
									$entrou = $usuario['entrou'];
								}
							?>

							<?php if ($entrou == 0): ?>
								<tr>
									<td>
										<?php if ($tipo != 'usuarios_privados'): //Usuario manual não exibe imagem ?>
											<?php echo $this->Html->image('img_profile.jpg',
												array('width'=> '50', 'class' => 'img-circle','style' => 'padding-right: 5px;'));
											?>
										<?php endif ?>

										<strong><?=$usuario['nome']?></strong>
									</td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
					<?php else: ?>
						<tr>
							<td colspan="2">Esta lista não possui nenhum cliente.</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>

<!-- Tabela dos que nao entraram-->

		<div class="tab-pane" id="tab2">
			<table id="nao-entraram" class="table table-bordered table-striped table-hover">
				<tbody>
					<?php
						//Se for privado ele busca usuarios manuais, caso contrario usuarios cadastrados pelo site
						$tipo = ($lista['ListasTipo']['id'] == 2) ? 'usuarios_privados' : 'Usuario' ;
					?>
					<!--Lista usuarios cadastrados-->
					<?php if (!empty($lista[$tipo])): ?>
						<?php foreach ($lista[$tipo] as $usuario): ?>
							<?php
								if ($tipo == 'Usuario'){
									$entrou = $usuario['ListasUsuario']['entrou'];
								}else{
									$entrou = $usuario['entrou'];
								}
							?>

							<?php if ($entrou == 1): ?>
								<tr>
									<td style="width: 30px;">
										<?php

											if ($tipo == 'usuarios_privados') {
												$pk = $usuario['id'];
												$usuario_id = $usuario['id'];
												$lista_id = $usuario['lista_id'];
											}else{
												$pk = $usuario['ListasUsuario']['id'];
												$usuario_id = $usuario['ListasUsuario']['usuario_id'];
												$lista_id = $usuario['ListasUsuario']['lista_id'];
											}
										?>
										<div id="checkbox" entrou="0" pk="<?=$pk;?>" lista-id="<?=$lista_id;?>" usuario-id="<?=$usuario_id;?>" style="width: 20px; height: 20px;border: solid #000 1px;cursor: pointer;">
										</div>	
									</td>
									<td>
										<?php if ($tipo != 'usuarios_privados'): //Usuario manual não exibe imagem ?>
											<?php echo $this->Html->image('img_profile.jpg',
												array('width'=> '50', 'class' => 'img-circle','style' => 'padding-right: 5px;'));
											?>
										<?php endif ?>

										<strong><?=$usuario['nome']?></strong>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="2">Esta lista não possui nenhum cliente.</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php echo $this->Html->image('load-mini.gif', array('class'=> 'pul-left','id' => 'load','style' => 'display: none;')); ?>