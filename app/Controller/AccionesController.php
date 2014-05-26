<?php
App::uses('AppController', 'Controller');
/**
 * Acciones Controller
 *
 * @property Accione $Accione
 */
class AccionesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Accione->recursive = 0;
		$this->set('acciones', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Accione->exists($id)) {
			throw new NotFoundException(__('Invalid accione'));
		}
		$options = array('conditions' => array('Accione.' . $this->Accione->primaryKey => $id));
		$this->set('accione', $this->Accione->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Accione->create();
			if ($this->Accione->save($this->request->data)) {
				$this->Session->setFlash(__('The accione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accione could not be saved. Please, try again.'));
			}
		}
		$createdBies = $this->Accione->CreatedBy->find('list');
		$modifiedBies = $this->Accione->ModifiedBy->find('list');
		$users = $this->Accione->User->find('list');
		$tablas = $this->Accione->Tabla->find('list');
		$this->set(compact('createdBies', 'modifiedBies', 'users', 'tablas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Accione->exists($id)) {
			throw new NotFoundException(__('Invalid accione'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accione->save($this->request->data)) {
				$this->Session->setFlash(__('The accione has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accione could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Accione.' . $this->Accione->primaryKey => $id));
			$this->request->data = $this->Accione->find('first', $options);
		}
		$createdBies = $this->Accione->CreatedBy->find('list');
		$modifiedBies = $this->Accione->ModifiedBy->find('list');
		$users = $this->Accione->User->find('list');
		$tablas = $this->Accione->Tabla->find('list');
		$this->set(compact('createdBies', 'modifiedBies', 'users', 'tablas'));
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
		$this->Accione->id = $id;
		if (!$this->Accione->exists()) {
			throw new NotFoundException(__('Invalid accione'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Accione->delete()) {
			$this->Session->setFlash(__('Accione deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accione was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
