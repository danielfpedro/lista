<?php echo $this->Html->link('<i class=\'icon icon-plus icon-white\'></i> Criar um novo evento',
			array('controller' => 'eventos', 'action' => 'add'),
			array('class' => 'btn btn-success','escape'=> false,'style'=> 'padding: 10px')
		);
	?>
<br>
<br>

<?php echo $this->Html->link('Eventos',array('controller' => 'eventos','action' => 'index')); ?>
<span class="badge badge-info pull-right">3</span>
<br>
<?php echo $this->Html->link('Eventos encerrados',array('controller' => 'eventos','action' => 'encerrados')); ?>