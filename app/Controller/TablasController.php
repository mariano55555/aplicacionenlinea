<?php
App::uses('AppController', 'Controller');
/**
 * Tablas Controller
 *
 * @property Tabla $Tabla
 */
class TablasController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tabla->recursive = 0;
		$this->set('tablas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Tabla->exists($id)) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		$options = array('conditions' => array('Tabla.' . $this->Tabla->primaryKey => $id));
		$this->set('tabla', $this->Tabla->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tabla->create();
			if ($this->Tabla->save($this->request->data)) {
				$this->Session->setFlash(__('The tabla has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tabla could not be saved. Please, try again.'));
			}
		}
		$createdBies = $this->Tabla->CreatedBy->find('list');
		$modifiedBies = $this->Tabla->ModifiedBy->find('list');
		$acciones = $this->Tabla->Accione->find('list');
		$users = $this->Tabla->User->find('list');
		$this->set(compact('createdBies', 'modifiedBies', 'acciones', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Tabla->exists($id)) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tabla->save($this->request->data)) {
				$this->Session->setFlash(__('The tabla has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tabla could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tabla.' . $this->Tabla->primaryKey => $id));
			$this->request->data = $this->Tabla->find('first', $options);
		}
		$createdBies = $this->Tabla->CreatedBy->find('list');
		$modifiedBies = $this->Tabla->ModifiedBy->find('list');
		$acciones = $this->Tabla->Accione->find('list');
		$users = $this->Tabla->User->find('list');
		$this->set(compact('createdBies', 'modifiedBies', 'acciones', 'users'));
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
		$this->Tabla->id = $id;
		if (!$this->Tabla->exists()) {
			throw new NotFoundException(__('Invalid tabla'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tabla->delete()) {
			$this->Session->setFlash(__('Tabla deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tabla was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
