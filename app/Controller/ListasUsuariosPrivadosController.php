<?php
App::uses('AppController', 'Controller');
/**
 * ListasUsuariosPrivados Controller
 *
 * @property ListasUsuariosPrivado $ListasUsuariosPrivado
 */
class ListasUsuariosPrivadosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ListasUsuariosPrivado->recursive = 0;
		$this->set('listasUsuariosPrivados', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ListasUsuariosPrivado->exists($id)) {
			throw new NotFoundException(__('Invalid listas usuarios privado'));
		}
		$options = array('conditions' => array('ListasUsuariosPrivado.' . $this->ListasUsuariosPrivado->primaryKey => $id));
		$this->set('listasUsuariosPrivado', $this->ListasUsuariosPrivado->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->autoRender = false;

		if ($this->request->is('post')) {
			$this->ListasUsuariosPrivado->create();
			if ($this->ListasUsuariosPrivado->save($this->request->data)) {
				echo $this->ListasUsuariosPrivado->id;
			} else {
				echo false;
			}
		}else{
			echo false;
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ListasUsuariosPrivado->exists($id)) {
			throw new NotFoundException(__('Invalid listas usuarios privado'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ListasUsuariosPrivado->save($this->request->data)) {
				$this->Session->setFlash(__('The listas usuarios privado has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The listas usuarios privado could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ListasUsuariosPrivado.' . $this->ListasUsuariosPrivado->primaryKey => $id));
			$this->request->data = $this->ListasUsuariosPrivado->find('first', $options);
		}
		$listas = $this->ListasUsuariosPrivado->Listum->find('list');
		$this->set(compact('listas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->autoRender = false;

		$this->ListasUsuariosPrivado->id = $id;
		if (!$this->ListasUsuariosPrivado->exists()) {
			echo false;
		}else{
			if ($this->ListasUsuariosPrivado->delete()) {
				echo true;
			}else{
				echo false;
			}	
		}
	}
}
