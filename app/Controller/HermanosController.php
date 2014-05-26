<?php
App::uses('AppController', 'Controller');
/**
 * Hermanos Controller
 *
 * @property Hermano $Hermano
 */
class HermanosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$hermanos = $this->Hermano->find("all");
		$this->set(compact('hermanos'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Hermano->id = $id;
		$hermano = $this->__findHermano($this->Hermano->id);
		$this->set(compact('hermano'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Hermano->create();
			if ($this->Hermano->save($this->request->data)) {
				$this->Session->setFlash(__('The hermano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hermano could not be saved. Please, try again.'));
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
		$this->Hermano->id = $id;
		$hermano = $this->__findHermano($this->Hermano->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hermano->save($this->request->data)) {
				$this->Session->setFlash(__('The hermano has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hermano could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $hermano;
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
		$this->Hermano->id = $id;
		$hermano = $this->__findHermano($this->Hermano->id);
		if ($this->Hermano->delete()) {
			$this->Session->setFlash(__('Hermano deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Hermano was not deleted'));
		$this->redirect(array('action' => 'index'));
	}


	private function __lists()
	{
		$users = $this->Hermano->User->find('list');
		$this->set(compact('users'));
	}

	private function __findHermano($id = NULL)
	{
		$cargo = $this->Cargo->find('first', array('conditions'=>array('Cargo.id =' => $id)));
		if (empty($cargo)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $cargo;
	}
}
