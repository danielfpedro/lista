<?php
echo $this->Form->create();
	echo $this->Form->input('username');
	echo $this->Form->input('email');
	echo $this->Form->input('senha');
	echo $this->Form->input('role_id');
	echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>