<?php

echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('senha');
	echo $this->Form->submit('Entrar');
echo $this->Form->end();

?>