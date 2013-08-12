<?php
App::uses('AppController', 'Controller');
/**
 * Listas Controller
 *
 * @property Lista $Lista
 */
class ListasController extends AppController {

	public $layout = 'empresas/default';

	public function chamada($lista = null){

		$this->Lista->recursive = 1;
		$lista = $this->Lista->find('first', array('conditions' => array('Lista.id' => $lista)));

		$this->set(compact('lista'));

		$this->carregaVariaveisAuth();
	}

	public function encerradas_view($lista = null){

		$this->Lista->recursive = 1;
		$lista = $this->Lista->find('first', array('conditions' => array('Lista.id' => $lista)));

		$this->set(compact('lista'));

		$this->carregaVariaveisAuth();
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Lista->recursive = 0;
		$this->set('listas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function add_nome($id = null) {
		if (!$this->Lista->exists($id)) {
			throw new NotFoundException(__('Invalid lista'));
		}

		$this->carregaVariaveisAuth();

		$options = array('conditions' => array('Lista.' . $this->Lista->primaryKey => $id));
		$this->set('lista', $this->Lista->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($evento_id = null) {
		if ($this->request->is('post')) {
			$this->Lista->create();
			$this->request->data['Lista']['evento_id'] = $evento_id;
			if ($this->Lista->save($this->request->data)) {
				$this->Session->setFlash(__('The lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lista could not be saved. Please, try again.'));
			}
		}
		$eventos = $this->Lista->Evento->find('list');
		$listasTipos = $this->Lista->ListasTipo->find('list');
		//$usuarios = $this->Lista->Usuario->find('list');
		$this->set(compact('eventos', 'listasTipos', 'usuarios'));

		$this->carregaVariaveisAuth();

		$this->render('form');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Lista->exists($id)) {
			throw new NotFoundException(__('Invalid lista'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Lista->save($this->request->data)) {
				$this->Session->setFlash(__('The lista has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lista could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lista.' . $this->Lista->primaryKey => $id));
			$this->request->data = $this->Lista->find('first', $options);
		}
		$eventos = $this->Lista->Evento->find('list');
		$listasTipos = $this->Lista->ListasTipo->find('list');
		$usuarios = $this->Lista->Usuario->find('list');
		$this->set(compact('eventos', 'listasTipos', 'usuarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Lista->id = $id;
		if (!$this->Lista->exists()) {
			throw new NotFoundException(__('Invalid lista'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lista->delete()) {
			$this->Session->setFlash(__('Lista deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Lista was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
