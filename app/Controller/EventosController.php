<?php
App::uses('AppController', 'Controller');
/**
 * Eventos Controller
 *
 * @property Evento $Evento
 */
class EventosController extends AppController {

	public $layout = 'empresas/default';

	public function beforeFilter(){
		$this->Auth->loginAction = array('controller' => 'Empresas', 'action' => 'login');
		$this->Auth->authenticate = array('Form' => array('userModel' => 'Empresa'));
		$this->Auth->loginRedirect = array('controller' => 'empresas','action' => 'index');
		$this->Auth->logoutRedirect = array('action' => 'login');
		$this->Auth->allow(array('add'));
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evento->recursive = 1;
		$now = date('Y-m-d H:i:s');
		$options = array('Evento.dt_inicio <'=> $now, 'Evento.dt_fim >='=> $now);
		$eventos = $this->paginate('Evento', $options);
		$this->set(compact('eventos'));
		$this->carregaVariaveisAuth();
	}
	public function encerrados() {
		$this->Evento->recursive = 1;
		$now = date('Y-m-d H:i:s');
		$options = array('Evento.dt_fim <='=> $now);
		$eventos = $this->paginate('Evento', $options);
		$this->set(compact('eventos'));
		$this->carregaVariaveisAuth();
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Invalid evento'));
		}
		$this->Evento->recursive = 2;
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));

		$this->carregaVariaveisAuth();
	}
	public function encerrados_view($id = null) {
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Invalid evento'));
		}
		$this->Evento->recursive = 2;
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));

		$this->carregaVariaveisAuth();
	}

/**
 * add method
 *
 * @return void
 */

	public function add() {
		if ($this->request->is('post')) {
			$this->Evento->create();
			$this->request->data['Evento']['empresa_id'] = $this->Auth->user('id');
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('The evento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.'));
			}
		}
		$empresas = $this->Evento->Empresa->find('list');
		$this->set(compact('empresas'));

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
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Invalid evento'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('The evento has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
			$this->request->data = $this->Evento->find('first', $options);
		}
		$empresas = $this->Evento->Empresa->find('list');
		$this->set(compact('empresas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Invalid evento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Evento->delete()) {
			$this->Session->setFlash(__('Evento deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Evento was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
