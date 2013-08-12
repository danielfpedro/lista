<?php
App::uses('AppController', 'Controller');
/**
 * ListasUsuarios Controller
 *
 * @property ListasUsuario $ListasUsuario
 */
class ListasUsuariosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ListasUsuario->recursive = 0;
		$this->set('listasUsuarios', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ListasUsuario->exists($id)) {
			throw new NotFoundException(__('Invalid listas usuario'));
		}
		$options = array('conditions' => array('ListasUsuario.' . $this->ListasUsuario->primaryKey => $id));
		$this->set('listasUsuario', $this->ListasUsuario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ListasUsuario->create();
			if ($this->ListasUsuario->save($this->request->data)) {
				$this->Session->setFlash(__('The listas usuario has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The listas usuario could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$listas = $this->ListasUsuario->Listum->find('list');
		$usuarios = $this->ListasUsuario->Usuario->find('list');
		$this->set(compact('listas', 'usuarios'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ListasUsuario->exists($id)) {
			throw new NotFoundException(__('Invalid listas usuario'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ListasUsuario->save($this->request->data)) {
				$this->Session->setFlash(__('The listas usuario has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The listas usuario could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ListasUsuario.' . $this->ListasUsuario->primaryKey => $id));
			$this->request->data = $this->ListasUsuario->find('first', $options);
		}
		$listas = $this->ListasUsuario->Listum->find('list');
		$usuarios = $this->ListasUsuario->Usuario->find('list');
		$this->set(compact('listas', 'usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete() {
		$this->autoRender = false;

		$this->ListasUsuario->id = $this->request->data['id'];
		if (!$this->ListasUsuario->exists()) {
			throw new NotFoundException(__('Invalid listas usuario'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->ListasUsuario->delete()) {
			echo 1;
		}else{
			echo 0;
		}
	}
}
