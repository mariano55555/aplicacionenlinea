<?php
App::uses('AppController', 'Controller');
/**
 * Telefonos Controller
 *
 * @property Telefono $Telefono
 */
class TelefonosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$telefonos = $this->Telefono->find('all');
		$this->set(compact('telefonos'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Telefono->id = $id;
		$telefono = $this->__findTelefono($this->Telefono->id);
		$this->set(compact('telefono'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Telefono->create();
			if ($this->Telefono->save($this->request->data)) {
				$this->Session->setFlash(__('The telefono has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telefono could not be saved. Please, try again.'));
			}
		}
		$this->__lists();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Telefono->id = $id;
		$telefono = $this->__findTelefono($this->Telefono->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Telefono->save($this->request->data)) {
				$this->Session->setFlash(__('The telefono has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telefono could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $telefono;
		}
		$this->__lists();
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Telefono->id = $id;
		$telefono = $this->__findTelefono($this->Telefono->id);
		if ($this->Telefono->delete()) {
			$this->Session->setFlash(__('Telefono deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Telefono was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$users = $this->Telefono->User->find('list');
		$this->set(compact('users'));
	}

	private function __findTelefono($id = NULL)
	{
		$telefono = $this->Telefono->find('first', array('conditions'=>array('Telefono.id =' => $id)));
		if (empty($telefono)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $telefono;
	}
}
