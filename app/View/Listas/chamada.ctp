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

<button class="btn btn-primary pull-right"><i class="icon-print icon-white"></i> Imprimir Chamada</button>
<div class="page-header">
	<h3><?=$lista['Evento']['nome']?> / <span style="text-decoration: underline;">Chamada Lista <?=$lista['Lista']['nome']?></span> <small>(<?=$lista['ListasTipo']['tipo']?>)</small></h3>
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
		<li class="active"><a href="#tab1" data-toggle="tab">Faltam entrar (<?=$total_nao_entrou;?> / <?=$total;?>)</a></li>
		<li><a href="#tab2" data-toggle="tab">Já entraram (<?=$total_entrou;?> / <?=$total;?>)</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab1">
			<table id="nao-entraram" class="table table-bordered table-striped table-hover">
				<tbody>
					<!--Lista usuarios cadastrados-->
					<?php if (!empty($lista[$tipo])): ?>
						<?php
							// 
							$letra_flag = 'A';
							$i = 0;
						?>
						<?php foreach ($lista[$tipo] as $usuario): ?>
							<?php
								if ($tipo == 'Usuario'){
									$entrou = $usuario['ListasUsuario']['entrou'];
								}else{
									$entrou = $usuario['entrou'];
								}
							?>

							<?php if ($entrou == 0): ?>
								<?php if ($letra_flag != strtoupper(substr($usuario['nome'], 0,1)) OR $letra_flag == 'A'): ?>
									<?php $letra_flag =  strtoupper(substr($usuario['nome'], 0,1)); ?>
									<tr>
										<td colspan="2"><b><?=$letra_flag;?></b></td>
									</tr>
								<?php endif ?>
								<tr>
									<td>
										<?php if ($tipo != 'usuarios_privados'): //Usuario manual não exibe imagem ?>
											<?php echo $this->Html->image('img_profile.jpg',
												array('width'=> '50', 'class' => 'img-circle','style' => 'padding-right: 5px;'));
											?>
										<?php endif ?>

										<strong><?=$usuario['nome']?></strong>
									</td>
									<td style="width: 30px;text-align: center;">
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
										<div id="checkbox" entrou="1" pk="<?=$pk;?>" lista-id="<?=$lista_id;?>" usuario-id="<?=$usuario_id;?>" class="chamada-cb">
										</div>	
									</td>
								</tr>
								<?php $i++; ?>
							<?php endif ?>
						<?php endforeach ?>
						<!-- se não ouver cliente  -->
						<?php if ($i == 0): ?>
							<tr>
								<td colspan="2">Esta lista não possui nenhum nome.</td>
							</tr>
						<?php endif ?>
					<?php else: ?>
						<tr>
							<td colspan="2">Esta lista não possui nenhum nome.</td>
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
						<?php
							$letra_flag = 'A';
							$i = 0;
						?>
						<?php foreach ($lista[$tipo] as $usuario): ?>
							<?php
								if ($tipo == 'Usuario'){
									$entrou = $usuario['ListasUsuario']['entrou'];
								}else{
									$entrou = $usuario['entrou'];
								}
							?>

							<?php if ($entrou == 1): ?>
								<?php if ($letra_flag != strtoupper(substr($usuario['nome'], 0,1)) OR $letra_flag == 'A'): ?>
									<?php $letra_flag =  strtoupper(substr($usuario['nome'], 0,1)); ?>
									<tr>
										<td colspan="2"><b><?=$letra_flag;?></b></td>
									</tr>
								<?php endif ?>							
								<tr>
									<td>
										<?php if ($tipo != 'usuarios_privados'): //Usuario manual não exibe imagem ?>
											<?php echo $this->Html->image('img_profile.jpg',
												array('width'=> '50', 'class' => 'img-circle','style' => 'padding-right: 5px;'));
											?>
										<?php endif ?>

										<strong><?=$usuario['nome']?></strong>
									</td>
									<td style="width: 15px;">
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
										<div id="checkbox" entrou="0" pk="<?=$pk;?>" lista-id="<?=$lista_id;?>" usuario-id="<?=$usuario_id;?>" class="chamada-cb active">
											<i class="icon-ok"></i>
										</div>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endif ?>
						<?php endforeach ?>
						<!-- se não ouver cliente  -->
						<?php if ($i == 0): ?>
							<tr>
								<td colspan="2">Esta lista não possui nenhum nome.</td>
							</tr>
						<?php endif ?>
					<?php else: ?>
						<tr>
							<td colspan="2">Esta lista não possui nenhum nome.</td>
						</tr>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>