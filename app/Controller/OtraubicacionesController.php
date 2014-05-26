<?php
App::uses('AppController', 'Controller');
/**
 * Otraubicaciones Controller
 *
 * @property Otraubicacione $Otraubicacione
 */
class OtraubicacionesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Otraubicacione->recursive = 0;
		$this->set('otraubicaciones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otraubicacione->exists($id)) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		$options = array('conditions' => array('Otraubicacione.' . $this->Otraubicacione->primaryKey => $id));
		$this->set('otraubicacione', $this->Otraubicacione->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Otraubicacione->create();
			if ($this->Otraubicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The otraubicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otraubicacione could not be saved. Please, try again.'));
			}
		}
		$pais = $this->Otraubicacione->Pai->find('list');
		$this->set(compact('pais'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Otraubicacione->exists($id)) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Otraubicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The otraubicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otraubicacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otraubicacione.' . $this->Otraubicacione->primaryKey => $id));
			$this->request->data = $this->Otraubicacione->find('first', $options);
		}
		$pais = $this->Otraubicacione->Pai->find('list');
		$this->set(compact('pais'));
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
		$this->Otraubicacione->id = $id;
		if (!$this->Otraubicacione->exists()) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Otraubicacione->delete()) {
			$this->Session->setFlash(__('Otraubicacione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Otraubicacione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Otraubicacione->recursive = 0;
		$this->set('otraubicaciones', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Otraubicacione->exists($id)) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		$options = array('conditions' => array('Otraubicacione.' . $this->Otraubicacione->primaryKey => $id));
		$this->set('otraubicacione', $this->Otraubicacione->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Otraubicacione->create();
			if ($this->Otraubicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The otraubicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otraubicacione could not be saved. Please, try again.'));
			}
		}
		$pais = $this->Otraubicacione->Pai->find('list');
		$this->set(compact('pais'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Otraubicacione->exists($id)) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Otraubicacione->save($this->request->data)) {
				$this->Session->setFlash(__('The otraubicacione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otraubicacione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otraubicacione.' . $this->Otraubicacione->primaryKey => $id));
			$this->request->data = $this->Otraubicacione->find('first', $options);
		}
		$pais = $this->Otraubicacione->Pai->find('list');
		$this->set(compact('pais'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Otraubicacione->id = $id;
		if (!$this->Otraubicacione->exists()) {
			throw new NotFoundException(__('Invalid otraubicacione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Otraubicacione->delete()) {
			$this->Session->setFlash(__('Otraubicacione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Otraubicacione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
