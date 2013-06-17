<?php


echo $this->Form->create();
	echo $this->Form->input('nome');
	echo $this->Form->input('descricao');
	echo $this->Form->input('listas_tipo_id');
	echo $this->Form->submit('Salvar');
echo $this->Form->end();

?>