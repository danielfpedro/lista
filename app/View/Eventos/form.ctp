<?php

echo $this->Form->create();
	echo $this->Form->input('nome');
	echo $this->Form->input('data');
	echo $this->Form->submit('Salvar');
echo $this->Form->end();

?>