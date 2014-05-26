<?php
App::uses('AppController', 'Controller');
/**
 * AccionesTablasUsers Controller
 *
 * @property AccionesTablasUser $AccionesTablasUser
 */
class AccionesTablasUsersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AccionesTablasUser->recursive = 0;
		$this->set('accionesTablasUsers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AccionesTablasUser->exists($id)) {
			throw new NotFoundException(__('Invalid acciones tablas user'));
		}
		$options = array('conditions' => array('AccionesTablasUser.' . $this->AccionesTablasUser->primaryKey => $id));
		$this->set('accionesTablasUser', $this->AccionesTablasUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AccionesTablasUser->create();
			if ($this->AccionesTablasUser->save($this->request->data)) {
				$this->Session->setFlash(__('The acciones tablas user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acciones tablas user could not be saved. Please, try again.'));
			}
		}
		$accions = $this->AccionesTablasUser->Accion->find('list');
		$tablas = $this->AccionesTablasUser->Tabla->find('list');
		$users = $this->AccionesTablasUser->User->find('list');
		$this->set(compact('accions', 'tablas', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AccionesTablasUser->exists($id)) {
			throw new NotFoundException(__('Invalid acciones tablas user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AccionesTablasUser->save($this->request->data)) {
				$this->Session->setFlash(__('The acciones tablas user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acciones tablas user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccionesTablasUser.' . $this->AccionesTablasUser->primaryKey => $id));
			$this->request->data = $this->AccionesTablasUser->find('first', $options);
		}
		$accions = $this->AccionesTablasUser->Accion->find('list');
		$tablas = $this->AccionesTablasUser->Tabla->find('list');
		$users = $this->AccionesTablasUser->User->find('list');
		$this->set(compact('accions', 'tablas', 'users'));
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
		$this->AccionesTablasUser->id = $id;
		if (!$this->AccionesTablasUser->exists()) {
			throw new NotFoundException(__('Invalid acciones tablas user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AccionesTablasUser->delete()) {
			$this->Session->setFlash(__('Acciones tablas user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acciones tablas user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
