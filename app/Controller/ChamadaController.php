<?php
App::uses('AppController', 'Controller');


class ChamadaController extends AppController {

	public function add(){
		$pk = $this->request->data['pk'];
		$lista_id = $this->request->data['lista_id'];
		$usuario_id = $this->request->data['usuario_id'];

		$this->loadModel('Lista');
		$lista = $this->Lista->find('first',array('conditions' => array('Lista.id' => $lista_id)));

		//Se 1 = publica , 2 privada
		if ($lista['ListasTipo']['id'] == 1) {
			$this->loadModel('ListasUsuario');
			$this->ListasUsuario->id = $pk;
			if ($this->ListasUsuario->save($this->request->data)) {
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$this->loadModel('ListasUsuariosPrivado');
			$this->ListasUsuariosPrivado->id = $pk;
			if ($this->ListasUsuariosPrivado->save($this->request->data)) {
				echo 1;
			}else{
				echo 0;
			}
		}


		$this->autoRender = false;
	}

}