<?php echo $this->Html->script('listas/lista_privada'); ?>

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
<?php
//Conta quantos tem para passar o valor da variavel total
$total = count($lista['usuarios_privados']);
?>
<input type="text" id="novo-nome" total="<?=$total;?>" class="input-block-level" style="height: 45px;" lista-id="<?=$lista['Lista']['id']?>" root="<?=$this->webroot?>" placeholder="Digite o nome e pressione a tecla enter para inserir na lista...">

<table  id="table-nomes" class="table table-bordered table-striped table-hover">
	<tbody>
		<?php if (!empty($lista['usuarios_privados'])): ?>
			<?php foreach ($lista['usuarios_privados'] as $key => $usuario): ?>
				<tr>
					<td>
						<strong><?=$usuario['nome'];?></strong>
						<button class="btn btn-mini btn-danger pull-right" id="btn-remove" nome-id="<?=$usuario['id']?>"><i class="icon-remove icon-white"></i></button>
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