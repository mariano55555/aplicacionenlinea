<?php
App::uses('AppController', 'Controller');
/**
 * Estudios Controller
 *
 * @property Estudio $Estudio
 */
class EstudiosController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$estudio = $this->Estudio->find("all");
		$this->set(compact('estudios'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Estudio->id = $id;
		$estudio = $this->__findEstudio($this->Estudio->id);
		$this->set(compact('estudio'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Estudio->create();
			if ($this->Estudio->save($this->request->data)) {
				$this->Session->setFlash(__('The estudio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudio could not be saved. Please, try again.'));
			}
		}
		$this->__lists()
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Estudio->id = $id;
		$estudio = $this->__findEstudio($this->Estudio->id);
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Estudio->save($this->request->data)) {
				$this->Session->setFlash(__('The estudio has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estudio could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $estudio;
		}
		$this->__lists();
	}

/**
 * admin_delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Estudio->id = $id;
		$estudio = $this->__findEstudio($this->Estudio->id);
		if ($this->Estudio->delete()) {
			$this->Session->setFlash(__('Estudio deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Estudio was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	private function __lists()
	{
		$users = $this->Estudio->User->find('list');
		$this->set(compact('users'));
	}

	private function __findEstudio($id = NULL)
	{
		$estudio = $this->Estudio->find('first', array('conditions'=>array('Estudio.id =' => $id)));
		if (empty($estudio)) {
			$this->Session->setFlash("La Información solicitada no ha sido encontrada.", "flash_error");
			$this->redirect(array('action'=>'index'));
		}
		return $estudio;
	}
}
